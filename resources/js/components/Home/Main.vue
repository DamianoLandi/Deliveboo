<template>
  <div class="bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-5">
              <div
      class="
        text-and-button
        d-flex
        flex-column
        justify-content-around
        align-items-center
        text-center
      "
    >
      <!-- Text animation -->
      <div class="container-fluid text-center">
        <div class="row text-center main-title-container">
          <div class="col-12">
            <TextAnimation />
          </div>
        </div>
      </div>
      <!-- Button modal -->
      <ButtonModal />
      <Footer />
    </div>
        </div>
      </div>
    </div>
    <Modal />
  </div>
</template>

<script>
import TextAnimation from "./TextAnimation.vue";
import ButtonModal from "./ButtonModal.vue";
import Modal from "./Modal.vue";
import Footer from "./Footer.vue";

export default {
  name: "App",
  components: {
    TextAnimation: TextAnimation,
    ButtonModal: ButtonModal,
    Modal: Modal,
    Footer: Footer,
  },
};
</script>

<style scoped lang="scss">
/* Google Font CDN Link */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

/* format */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

// background

.bg {
  height: 100vh;
  width: 100vw;
  overflow-x: hidden;
  background-position: right;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

@media screen and (max-width: 991px) {
  .bg {
    background-image:  url("/img/bg-small.jpg");
  }
}
@media screen and (min-width: 992px) {
  .bg {
    background-image:  url("/img/bg.png");
  }
}

.text-and-button {
  height: 100vh;
}
</style>