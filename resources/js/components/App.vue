<template>
  <div
    v-if="loader"
    class="w-full h-screen top-0 right-0 bottom-0 left-0 fixed z-index-full"
  >
    <div class="relative bg-white h-full flex items-center justify-center">
      <div class="">
        <div class="spinner-box">
          <div class="configure-border-1">
            <div class="configure-core"></div>
          </div>
          <div class="configure-border-2">
            <div class="configure-core"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    const time = Math.round(performance.now())
    setTimeout(() => {
      return (this.loader = false)
    }, time)
  },
  data() {
    return {
      loader: true,
    }
  },
  computed: {},
}
</script>

<style>
.z-index-full {
  z-index: 999999999999999;
}

@keyframes configure-clockwise {
  0% {
    transform: rotate(0);
  }
  25% {
    transform: rotate(90deg);
  }
  50% {
    transform: rotate(180deg);
  }
  75% {
    transform: rotate(270deg);
  }
  100% {
    transform: rotate(650deg);
  }
}

@keyframes configure-xclockwise {
  0% {
    transform: rotate(45deg);
  }
  25% {
    transform: rotate(-45deg);
  }
  50% {
    transform: rotate(-135deg);
  }
  75% {
    transform: rotate(-225deg);
  }
  100% {
    transform: rotate(-315deg);
  }
}

.configure-border-1 {
  width: 100px;
  height: 100px;
  padding: 2px;
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #fb5b53;
  animation: configure-clockwise 3s ease-in-out 0s infinite alternate;
}

.configure-border-2 {
  width: 100px;
  height: 100px;
  padding: 2px;
  left: -100px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #303030;
  transform: rotate(45deg);
  animation: configure-xclockwise 3s ease-in-out 0s infinite alternate;
}

.configure-core {
  width: 100%;
  height: 100%;
  background-color: #ffffff;
}
</style>
