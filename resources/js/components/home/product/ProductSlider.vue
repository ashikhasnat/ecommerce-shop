<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
import { VueAgile } from 'vue-agile'
export default {
  props: {
    slider_image_to_show: {
      type: Number,
    },
  },
  components: {
    agile: VueAgile,
  },
  data() {
    return {
      asNavFor1: [],
      asNavFor2: [],
      options1: {
        dots: false,
        fade: true,
        navButtons: false,
      },
      options2: {
        dots: false,
        infinite: true,
        navButtons: false,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: this.slider_image_to_show,
            },
          },
          {
            breakpoint: 1000,
            settings: {
              navButtons: false,
            },
          },
        ],
      },
    }
  },
  mounted() {
    this.asNavFor1.push(this.$refs.thumbnails)
    this.asNavFor2.push(this.$refs.main)
  },
}
</script>

<style>
.main {
  margin-bottom: 30px;
}

.thumbnails {
  margin: 0 -5px;
  /* width: calc(100% + 10px); */
  margin-top: -10px;
}

.slide {
  align-items: center;
  box-sizing: border-box;
  color: #fff;
  display: flex;
  justify-content: center;
}
.product-slide {
  height: 450px;
}
.slide--thumbniail {
  cursor: pointer;
  height: 100px;
  padding: 0 8px;
  /* margin: 0 2px; */
  transition: opacity 0.3s;
}

.slide--thumbniail:hover {
  opacity: 0.75;
}
.slide img {
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
  -o-object-position: center;
  object-position: center;
  width: 100%;
}
</style>
