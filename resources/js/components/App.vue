<template>
  <div id="app">
    <Header />
    <Main />
  </div>
</template>

<script>
import Header from "./Home/Header.vue";
import Main from "./Home/Main.vue";

export default {
  name: "App",
  data() {},
  components: {
    Header: Header,
    Main: Main,
  },
};
</script>
