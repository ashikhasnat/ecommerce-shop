<template>
  <agile
    :nav-buttons="false"
    :autoplay-speed="9000"
    :speed="2500"
    fade="fade"
    pause-on-hover="pause-on-hover"
    pause-on-dots-hover="pause-on-dots-hover"
    autoplay="autoplay"
  >
    <slot name="slide"></slot>
  </agile>
</template>

<script>
import { VueAgile } from 'vue-agile'
export default {
  components: {
    agile: VueAgile,
  },
}
</script>

<style>
.agile__dots {
  bottom: 10px;
  flex-direction: column;
  right: 30px;
  position: absolute;
}
.agile__dot {
  margin: 5px 0;
}
.agile__dot button {
  background-color: #fff;
  border: 1px solid #fff;
  cursor: pointer;
  display: block;
  height: 10px;
  font-size: 0;
  line-height: 0;
  margin: 0;
  padding: 0;
  transition-duration: 0.5s;
  width: 10px;
  border-radius: 5px;
}
.agile__dot--current button,
.agile__dot:hover button {
  background-color: #fff;
  height: 30px;
  border-radius: 5px;
}

.slide {
  display: block;
  -o-object-fit: cover;
  object-fit: cover;
  width: 100%;
}
.home-slide {
  height: 430px;
}
@media (min-width: 640px) {
  .home-slide {
    height: 530px;
  }
}
</style>
