<template>
  <div class="header-container">
    <div class="bgt d-flex justify-content-between align-items-center">
      <a href="http://127.0.0.1:8000"
        ><img class="logo" src="/img/logo.png" alt="logo"
      /></a>
      <div class="">
        <a
          class="btnlogin btn btn-outline-light ml-3"
          href="http://127.0.0.1:8000"
        >
          Home</a
        >
        <a
          class="btnlogin btn btn-outline-light ml-3"
          href="http://127.0.0.1:8000/login"
        >
          Login</a
        >
        <a
          class="btnlogin btn btn-outline-light ml-3"
          href="http://127.0.0.1:8000/register"
        >
          Register</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HeaderRestaurant",
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

/* format */

* {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.header-container{
  width: 100%;
  min-width: 100%;
  }

.btnlogin {
  font-size: 13px;
}
.logo {
  height: 45px;
}
.bgt {
  background-color: #ff5858;
  -webkit-box-shadow: 0px 9px 7px 1px #d8d8d8;
  box-shadow: 0px 9px 7px 1px #d8d8d8;
  padding: 5px 70px;
}
</style>