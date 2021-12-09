<template>
  <div>
    <div class="container mt-3">
      <div class="d-flex">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
          <ModalCart
            class="mt-5 text-center"
            :shoppingCart="shoppingCart"
            :totalPrice="totalPrice"
          />
        </div>
        <div v-if="form" class="form col-xl-10 col-lg-9 col-md-8 col-sm-7 ml-5">
          <h2 class="text-center">Inserisci i tuoi dati</h2>
          <div class="mb-1">
            <label for="name"></label>
            <input
              type="text"
              class="form-control"
              placeholder="Nome..."
              id="name"
              v-model="customer_name"
            />
          </div>
          <div class="mb-1">
            <label for="Surname"></label>
            <input
              type="text"
              class="form-control"
              placeholder="Cognome..."
              id="Surname"
              v-model="customer_lastname"
            />
          </div>
          <div class="mb-1">
            <label for="Address"></label>
            <input
              type="text"
              class="form-control"
              placeholder="Indirizzo..."
              id="Address"
              v-model="customer_address"
            />
          </div>
          <div class="mb-1">
            <label for="customer_email" class="form-label"></label>
            <input
              type="email"
              class="form-control"
              id="customer_email"
              aria-describedby="emailHelp"
              placeholder="Email.."
              v-model="customer_email"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-primary" type="submit" @click="createOrder">
              Crea Ordine
            </button>
            <a class="btn btn-danger" href="http://127.0.0.1:8000/"
              >Cancella ordine</a
            >
          </div>
        </div>
        <div class="form col-xl-10 col-lg-9 col-md-8 col-sm-7 ml-5">
          <div v-if="payment" class="payment">
            <v-braintree
              :authorization="token"
              @success="onSuccess"
              @error="onError"
              locale="it_IT"
              :card="{
                cardholderName: {
                  required: true,
                },
              }"
            ></v-braintree>
          </div>
            <Thanks v-if="thanks" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Thanks from "./Thanks.vue";
import ModalCart from "./ModalCart.vue";

export default {
  name: "Checkout",
  components: {
    ModalCart,
    Thanks,
  },
  props: ["shoppingCart", "totalPrice"],
  data() {
    return {
      token: "",
      order_id: "",
      customer_name: "",
      customer_lastname: "",
      customer_phone_number: "",
      customer_email: "",
      customer_address: "",
      order: {},
      form: true,
      payment: false,
      thanks: false,
    };
  },
  methods: {
    clearLocalStorage() {
      this.shoppingCart = [];
      this.totalPrice = 0;
      localStorage.setItem("cart", JSON.stringify(this.shoppingCart));
      localStorage.setItem("amount", JSON.stringify(this.totalPrice));
    },
    showConsoleLog(cart, amount) {
      console.log(cart);
      console.log(amount);
    },
    onSuccess(payload) {
      let nonce = payload.nonce;
      axios({
        method: "post",
        url: "http://127.0.0.1:8000/api/payments",
        data: {
          token: nonce,
          id: this.orderId,
        },
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      }).then((res) => {
        this.payment = false;
        this.thanks = true;
        // this.clearLocalStorage();
        console.log(res);
      });
    },
    onError(error) {
      let message = error.message;
      console.log(message);
    },
    createOrder() {
      // user info
      let order = {
        customer_name: this.customer_name,
        customer_lastname: this.customer_lastname,
        customer_address: this.customer_address,
        customer_email: this.customer_email,
        amount: this.totalPrice,
        isPayed: false,
      };
      let ogg = {};
      this.shoppingCart.forEach((el) => {
        ogg[el.id] = el.quantity;
      });
      console.log(ogg);
      order.order_details = ogg;
      this.order = order;
      console.log("ordine:  ", this.order);
      //  this.isLoading = true;
      setTimeout(() => {
        axios;
        axios({
          method: "post",
          url: "http://127.0.0.1:8000/api/orders",
          data: this.order,
        })
          .then((res) => {
            console.log(res);
            this.orderId = res.data.Order_number;
            this.form = false;
            this.payment = true;
          })
          .catch((error) => {
            console.log(error.response.data);
          })
          .then(() => {
            // this.isLoading = false;
          });
      }, 2500);

      // order complete
      this.order = order;
    },
    getTokenFromApi() {
      axios
        .get("http://127.0.0.1:8000/api/payments")
        .then((res) => {
          this.token = res.data.clientToken;
        })
        .catch()
        .then(() => {
          // this.isLoading = false;
        });
    },
  },
  created() {
    console.log(this.shoppingCart);
    // this.showConsoleLog(this.shoppingCart, this.totalPrice);
    this.getTokenFromApi();
  },
};
</script>

<style lang="scss">
@import "../../sass/app.scss";
</style>