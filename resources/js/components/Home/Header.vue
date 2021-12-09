<template>
  <div>
    <div
      class="bgt d-flex justify-content-between align-items-center px-5 py-3"
    >
      <img class="logo" src="/img/logo.png" alt="logo" />
      <div class="pb-5">
        <a
          class="btnlogin text-decoration-none mx-3 btn btn-outline-danger"
          href="./login"
        >
          Login</a
        >
        <a
          class="btnlogin text-decoration-none btn btn-outline-danger"
          href="./register"
        >
          Register</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style scoped lang="scss">
@import "./resources/sass/app.scss";

.btnlogin {
  font-size: 20px;
}
.logo {
  height: 80px;
}
.bgt {
  background-color: transparent;
  position: fixed;
  width: 100%;
}
</style>