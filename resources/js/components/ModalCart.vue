<template>
  <div>
    <div class="ck">
      <div class="quantity-indicator">
        {{ getQuantityTotal() }}
      </div>
      <div>
        <h4>
          <i class="fas fa-cart-arrow-down pt-4 bg-gradient-secondary"></i>
          Carrello
        </h4>
      </div>
      <hr />
      <ul v-for="item in shoppingCart" :key="item.id">
        <div class="d-flex justify-content-between align-items-center px-3">
          <li v-if="item.quantity">
            {{ item.name }}
          </li>
          <li v-if="item.quantity">
            {{ item.quantity }}
          </li>
        </div>
        <hr />
      </ul>
      <h4 class="card-header font-weight-bold">Totale: € {{ totalPrice }}</h4>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModalCart",
  props: ["shoppingCart", "totalPrice"],
  methods: {
    getQuantityTotal(){
      var sum = 0;
      if(this.shoppingCart.length){
        for (let i = 0; i < this.shoppingCart.length; i++){
            sum += this.shoppingCart[i].quantity;
        };
      }
      return sum;
    },
  },
  /*   methods: {
      removePlateToCart(plate, index) {
      if (this.shoppingCart.includes(plate) && plate.quantity > 0) {
        plate.quantity--;
        this.totalPrice = this.totalPrice - plate.price;
        this.shoppingCart.split(1, 1);
      } else if (plate.quantity == 0) {
        // console.log("rimosso" + this.shoppingCart);
        this.shoppingCart.split(index, 1);
        this.totalPrice = this.totalPrice - plate.price;
        console.log(this.shoppingCart.length);
      } else if (this.shoppingCart.length == 0) {
        this.totalPrice = 0;
        console.log(this.totalPrice);
        console.log(this.shoppingCart);
        // this.showModal = false;
      }
    },
  }, */
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
.shopping-cart {
  width: 100%;
  max-width: 100%;
}
.ck {
  height: auto;
  width: 200px;
  background: white;
  border-radius: 20px;
  -webkit-box-shadow: -2px 5px 11px 0px rgba(64, 64, 64, 0.62);
  box-shadow: -2px 5px 11px 0px rgba(64, 64, 64, 0.62);
  position: relative;
  ul {
    list-style-type: none;
  }
  .quantity-indicator{
    position: absolute;
    top: -10px;
    left: -10px;
    height: 45px;
    width: 45px;
    font-size: 20px;
    border-radius: 50%;
    background-color: #ff5858;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
</style>