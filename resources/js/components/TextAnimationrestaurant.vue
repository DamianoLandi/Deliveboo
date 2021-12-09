<template>
  <!-- Text animation Restaurant -->
  <div class="swipe text-center">
    <h1>{{ restaurant.name }}</h1>

    <span class="swipe swipe--delay casa-tua">
      {{restaurant.address }}</span
    >
  </div>
</template>

<script>
export default {
  name: "TextAnimationrestaurant",
  props:['restaurant'],
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

/* TEXT ANIMATOR */
.swipe {
  position: relative;
  width: 100%;
  &::after {
    display: block;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 100%;
    width: 0%;
    height: 100%;
    background-color: #ff5858;
    animation: swipe 1.5s ease-out 1s forwards;
  }
  &--delay {
    &::after {
      background-color: #ff5858;
      animation-delay: 1.5s;
    }
  }
}

h1 {
  display: block;
  color: rgb(255, 255, 255);
  font-size: 72px;
  line-height: 1;
  font-weight: 900;
  text-transform: uppercase;
  padding-top: 20px;
  opacity: 0;
  animation: fade 0.01s ease-out 1.75s forwards;
}

.casa-tua {
  display: block;
  color: rgb(255, 255, 255);
  font-size: 32px;
  line-height: 1;
  font-weight: 900;
  text-transform: uppercase;
  padding-top: 40px;
  padding-bottom: 40px;
  animation: fade 0.01s ease-out 2.25s forwards;
}

@keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes swipe {
  0% {
    right: 100%;
    left: 0;
    width: 0%;
  }
  50% {
    right: 0;
    left: 0;
    width: 100%;
  }
  100% {
    right: 0;
    left: 100%;
    width: 0%;
  }
}
</style>