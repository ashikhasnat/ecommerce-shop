<template>
  <div class="product-timer bg-white py-2 uppercase">
    <div>
      <div
        class="grid grid-cols-4 gap-x-4 justify-items-center items-center w-max-content"
        v-if="statusType !== 'expired'"
      >
        <div class="product-day flex flex-col items-center">
          <div class="w-14 h-14 border border-teal-400 rounded-full relative">
            <span
              class="product-number absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2"
              >{{ days }}</span
            >
          </div>
          <div class="product-format">{{ wordString.day }}</div>
        </div>
        <div class="product-hour flex flex-col items-center">
          <div class="w-14 h-14 border border-teal-400 rounded-full relative">
            <span
              class="product-number absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2"
              >{{ hours }}</span
            >
          </div>
          <div class="product-format">{{ wordString.hours }}</div>
        </div>
        <div class="product-min flex flex-col items-center">
          <div class="w-14 h-14 border border-teal-400 rounded-full relative">
            <span
              class="product-number absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2"
              >{{ minutes }}</span
            >
          </div>
          <div class="product-format">{{ wordString.minutes }}</div>
        </div>
        <div class="product-sec flex flex-col items-center">
          <div class="w-14 h-14 border border-teal-400 rounded-full relative">
            <span
              class="product-number product-number absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2"
              >{{ seconds }}</span
            >
          </div>
          <div class="product-format">{{ wordString.seconds }}</div>
        </div>
      </div>
      <div v-else>
        <div class="status-tag" :class="statusType">{{ statusText }}</div>
      </div>
      <!-- <div class="message">{{ message }}</div> -->
      <!-- <div class="status-tag" :class="statusType">{{ statusText }}</div> -->
    </div>
  </div>
</template>

<script>
    export default {
        props: ['starttime','endtime','trans'] ,
  data(){
  	return{
    	timer:"",
      wordString: {},
      start: "",
      end: "",
      interval: "",
      days:"",
      minutes:"",
      hours:"",
      seconds:"",
      message:"",
      statusType:"",
      statusText: "",
    
    };
  },
  created () {
        this.wordString = JSON.parse(this.trans);
    },
  mounted(){
    this.start = new Date(this.starttime).getTime();
    this.end = new Date(this.endtime).getTime();
    // Update the count down every 1 second
    this.timerCount(this.start,this.end);
    this.interval = setInterval(() => {
        this.timerCount(this.start,this.end);
    }, 1000);
  },
  methods: {
    timerCount: function(start,end){
        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = start - now;
        var passTime =  end - now;

        if(distance < 0 && passTime < 0){
            this.message = this.wordString.expired;
            this.statusType = "expired";
            this.statusText = this.wordString.status.expired;
            clearInterval(this.interval);
            return;

        }else if(distance < 0 && passTime > 0){
            this.calcTime(passTime);
            this.message = this.wordString.running;
            this.statusType = "running";
            this.statusText = this.wordString.status.running;

        } else if( distance > 0 && passTime > 0 ){
            this.calcTime(distance); 
            this.message = this.wordString.upcoming;
            this.statusType = "upcoming";
            this.statusText = this.wordString.status.upcoming;
        }
    },
    calcTime: function(dist){
      // Time calculations for days, hours, minutes and seconds
        this.days = Math.floor(dist / (1000 * 60 * 60 * 24));
        this.hours = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        this.minutes = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
        this.seconds = Math.floor((dist % (1000 * 60)) / 1000);
    }
    
  }
}
</script>

<style scoped>
.product-timer .product-format {
  font-weight: 400;
  font-size: 12px;
  opacity: 0.8;
  color: rgba(65, 64, 64, 0.808);
  margin-top: 5px;
}
.product-timer .status-tag {
  margin: 5px auto;
  padding: 2px 0;
  font-weight: 500;
  text-align: center;
  border-radius: 15px;
}
.product-timer .status-tag.upcoming {
  color: lightGreen;
}
.product-timer .status-tag.running {
  color: gold;
}
.product-timer .status-tag.expired {
  color: turquoise;
}
</style>