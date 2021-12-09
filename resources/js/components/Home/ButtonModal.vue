<template>
  <!-- Text animation -->
  <div>
    <button
      type="button"
      class="btn btn-outline-danger btmain"
      data-toggle="modal"
      data-target="#staticBackdrop"
    >
      <h2>Cerca</h2>
    </button>
  </div>
</template>

<script>
export default {
  name: "ButtonModal",
};
</script>

<style scoped lang="scss">
.btmain {
  padding: 15px 90px;
  border-radius: 10px;
}
</style>