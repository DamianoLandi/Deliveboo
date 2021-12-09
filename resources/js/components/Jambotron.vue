<template>
  <div>
    <div class="img-bg-restaurant">
      <TextAnimationrestaurant :restaurant="restaurant"/>
    </div>
  </div>
</template>

<script>
import TextAnimationrestaurant from "./TextAnimationrestaurant.vue";

export default {
  name: "Jambotron",
  props:['restaurant'],
  components: {
    TextAnimationrestaurant,
  },
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.img-bg-restaurant {
  background-image: url("/img/bg-restaurant.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  height: 200px;
  width: 100%;
  min-width: 100%;
  background-position: bottom;
}
</style>