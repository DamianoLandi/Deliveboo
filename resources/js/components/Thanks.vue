<template>
  <div>
    <div
      class="
        container
        d-flex
        flex-column
        justify-content-center
        align-items-center
      "
    >
      <div class="bg img-fluid"></div>
      <div>
        <a class="btn d-block btn-primary mt-1" href="http://127.0.0.1:8000/"
          >Torna alla home</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Thanks",
  methods: {},
  created() {
    console.log(this.shoppingCart);
  },
};
</script>

<style scoped lang="scss">
.bg {
  height: 600px;
  width: 1000px;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("/img/tk.png");
  border-radius: 20px;
}
</style>