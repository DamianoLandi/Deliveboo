<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="staticBackdrop"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true"></span>
      </button>
    </div>

    <div
      class="modal-body d-flex justify-content-center align-items-center mt-5"
    >
      <div class="container box">
        <div class="topic text-center d-flex justify-content-around">
          Cerca il ristorante che preferisci!
          <button type="button" class="btn" data-dismiss="modal">Chiudi</button>
        </div>

        <div class="content">
          <input type="radio" name="slider" checked id="tutti" />
          <input type="radio" name="slider" id="Italian" />
          <input type="radio" name="slider" id="Japanese" />
          <input type="radio" name="slider" id="Mexican" />
          <input type="radio" name="slider" id="French" />
          <input type="radio" name="slider" id="Turkish" />

          <!-- Colonna Tipologie ristoranti -->

          <div class="list">
            <label for="tutti" class="tutti">
              <span class="title" @click="searchAllRestaurants">Tutti</span>
            </label>

            <label
              v-for="type in typesRestaurants"
              :key="type.id"
              :for="type.name"
              :class="type.name"
            >
              <span class="title" @click="searchRestaurantsByType(type.id)">
                {{ type.name }}</span
              >
            </label>
            <div class="slider"></div>
          </div>
          <!-- filter restaurant -->
          <div class="text-content w-100">
            <div>
              <div class="row w-100 justify-content-around">
                <div v-if="filteredRestaurants.length < 1">
                  <p class="text-center w-100">
                    Non ci sono Ristoranti corrispondenti a questa categoria!
                  </p>
                </div>
                <div
                  v-for="restaurant in filteredRestaurants"
                  :key="restaurant.id"
                  class="d-flex justify-content-between flex-wrap"
                >
                  <div class="card m-2">
                    <div class="cover">
                      <div class="img-container">
                        <img
                          class="img-fluid"
                          :src="restaurant.logo"
                          :alt="restaurant.name"
                        />
                      </div>
                    </div>
                    <div class="details">
                      <h3>{{ restaurant.name }}</h3>
                      <div>
                        <a
                          :href="`http://127.0.0.1:8000/restaurants/${restaurant.id}`"
                          >Vai al menù</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  data() {
    return {
      typesRestaurants: [],
      filteredRestaurants: [],
    };
  },
  methods: {
    getTypesFromApi() {
      axios
        .get("http://127.0.0.1:8000/api/types")
        .then((res) => {
          this.typesRestaurants = res.data;
        })
        .catch(() => {});
    },
    searchAllRestaurants() {
      axios
        .get(`http://127.0.0.1:8000/api/restaurants`)
        .then((res) => {
          this.filteredRestaurants = res.data;
          console.log(this.filteredRestaurants);
        })
        .catch(() => {});
    },
    searchRestaurantsByType(id) {
      axios
        .get(`http://127.0.0.1:8000/api/types/${id}`)
        .then((res) => {
          this.filteredRestaurants = res.data;
          console.log(this.filteredRestaurants);
        })
        .catch(() => {});
    },
  },
  created() {
    this.getTypesFromApi();
    this.searchAllRestaurants();
  },
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

/* format */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

// MODAL
.box {
  max-width: 950px;
  width: 100%;
  padding: 40px 50px 40px 40px;
  background: #fff;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.box .topic {
  font-size: 30px;
  font-weight: 500;
  margin-bottom: 20px;
}
.content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-height: 450px;
  min-height: 450px;
}
.content .list {
  display: flex;
  flex-direction: column;
  max-height: 400px;
  width: 20%;
  margin-right: 20px;
  padding-right: 20px;
  position: relative;
}
.content .list label {
  height: 60px;
  font-size: 22px;
  font-weight: 500;
  line-height: 60px;
  cursor: pointer;
  padding-left: 25px;
  transition: all 0.5s ease;
  color: #333;
  z-index: 12;
}
#tutti:checked ~ .list label.tutti,
#Italian:checked ~ .list label.Italian,
#Japanese:checked ~ .list label.Japanese,
#Mexican:checked ~ .list label.Mexican,
#French:checked ~ .list label.French,
#Turkish:checked ~ .list label.Turkish {
  color: #fff;
}
.content .list label:hover {
  color: #ff5858;
}
.content .slider {
  position: absolute;
  left: 0;
  top: 0;
  height: 60px;
  width: 100%;
  border-radius: 12px;
  background: #ff5858;
  transition: all 0.4s ease;
}
#tutti:checked ~ .list .slider {
  top: 0;
}
#Italian:checked ~ .list .slider {
  top: 60px;
}
#Japanese:checked ~ .list .slider {
  top: 120px;
}
#Mexican:checked ~ .list .slider {
  top: 180px;
}
#French:checked ~ .list .slider {
  top: 240px;
}
#Turkish:checked ~ .list .slider {
  top: 300px;
}

.content .text-content {
  width: 80%;
  max-height: 450px;
  overflow: auto;
  padding-bottom: 15px;
}
.content .text {
  display: none;
}
.content .text .title {
  font-size: 25px;
  margin-bottom: 10px;
  font-weight: 500;
}
.content .text p {
  text-align: justify;
}
.content .text-content .tutti {
  display: block;
}
#tutti:checked ~ .text-content .tutti,
#Italian:checked ~ .text-content .Italian,
#Japanese:checked ~ .text-content .Japanese,
#Mexican:checked ~ .text-content .Mexican,
#French:checked ~ .text-content .French,
#Turkish:checked ~ .text-content .Turkish {
  display: block;
}

#Italian:checked ~ .text-content .tutti,
#Japanese:checked ~ .text-content .tutti,
#Mexican:checked ~ .text-content .tutti,
#French:checked ~ .text-content .tutti,
#Turkish:checked ~ .text-content .tutti {
  display: none;
}
.content input {
  display: none;
}

/* CARD */
.card {
  position: relative;
  width: 200px;
  height: 200px;
  background-color: rgb(255, 255, 255);
  transform-style: preserve-3d;
  transform: perspective (2000px);
  transition: 1s;
  box-shadow: inset 300px 0 20px rgba(0, 0, 0, 0.15),
    0 10px 25px rgba(0, 0, 0, 0.15);
}

.card:hover {
  transform: perspective (2000px) translate(50%);
  box-shadow: inset 20px 0 50px rgba(0, 0, 0, 0.15),
    0 10px 25px rgba(0, 0, 0, 0.15);
}

.card .cover {
  position: relative;
  width: 100%;
  height: 100%;
  background-color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  transform-style: preserve-3d;
  overflow: hidden;
  z-index: 2;
  transition: 0.8s ease-in-out;
  transform-origin: left;
}

.card:hover .cover {
  transform: rotateY(-95deg);
}

.card .cover h5 {
  background-color: rgb(255, 255, 255);
  max-width: 100%;
  z-index: 1;
  padding: 10px;
}

.card .cover::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 150%;
  background: white;
  transform: rotate(120deg);
  box-shadow: 0 0 0 20px #ff5858;
  transition: 0.5s;
  transition-delay: 1s;
}

.card:hover .cover img {
  opacity: 0;
  transition: 1.5s;
}

.card:hover .cover::before {
  width: 0;
  box-shadow: 0 0 0 250px #ff5858;
  transform: rotate(120deg);
}

.card .details {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgb(255, 255, 255);
  transform-style: preserve-3d;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  text-align: center;
  z-index: 1;
}

.card .details h3 {
  font-weight: 500;
  margin: 5px 0;
}

.card .details h2 {
  font-weight: 600;
  font-size: 1.5rem;
  color: rgb(42, 95, 165);
}

.card .details a {
  display: inline-block;
  padding: 8px 20px;
  background: rgb(42, 95, 165);
  color: white;
  margin-top: 5px;
  letter-spacing: 1px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 500;
  text-decoration: none;
}

.img-container {
  height: 150px;
  width: 150px;
  margin: auto;
  overflow: hidden;
  z-index: 20;
  img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 8px solid #ff5858;
  }
}
</style>