<template>
  <div class="box-footer">
    <div class="d-flex justify-content-between align-items-center w-100">
      <div class="d-flex w-100 px-5">
        <link
          rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <div class="center w-100">
          <div class="social d-flex align-items-center justify-content-between w-100">
            <div class="social-btn-container">
              <p class="social-btn"><i class="fa fa-facebook" aria-hidden="true"></i></p>
              <p class="social-btn"><i class="fa fa-twitter" aria-hidden="true"></i></p>
            </div>

            <div class="social-btn-container">
              <p class="social-btn"><i class="fa fa-instagram" aria-hidden="true"></i></p>
              <p class="social-btn"><i class="fa fa-vimeo" aria-hidden="true"></i></p>              
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped lang="scss">

.box-footer{
  .social {
  display: table-cell;
  text-align: center;
  font-size: 15px;

    .social-btn {
      color: #ffffff;
      list-style-type: none;
      display: inline-block;
      width: 35px;
      height: 35px;
      padding: 8px;

      background-color: #ff5858;
      cursor: pointer;
      margin-left: 10px;

      transition: ease 0.3s;
      opacity: 0.7;
      &:hover{
        opacity: 1;
      }
    }
  }
}

@media screen and (max-width: 991px) {
  .box-footer{
    width: 100%;
  }
}
</style>