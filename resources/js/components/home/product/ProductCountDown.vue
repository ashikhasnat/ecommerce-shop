<template>
  <div class="timer bg-white py-2 uppercase">
    <div>
      <div v-if="statusType !== 'expired'">
        <div class="day">
          <span class="number">{{ days }}</span>
          <div class="format">{{ wordString.day }}</div>
        </div>
        <div class="hour">
          <span class="number">{{ hours }}</span>
          <div class="format">{{ wordString.hours }}</div>
        </div>
        <div class="min">
          <span class="number">{{ minutes }}</span>
          <div class="format">{{ wordString.minutes }}</div>
        </div>
        <div class="sec">
          <span class="number">{{ seconds }}</span>
          <div class="format">{{ wordString.seconds }}</div>
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

<style>
.timer {
  color: #fff;
  text-align: center;
  border: none;
  width: max-content;
}
.timer .day,
.timer .hour,
.timer .min,
.timer .sec {
  display: inline-block;
  font-weight: 500;
  text-align: center;
  margin: 0 8px;
}
.timer .day .format,
.timer .hour .format,
.timer .min .format,
.timer .sec .format {
  font-weight: 500;
  font-size: 12px;
  opacity: 0.8;
  width: 60px;
  color: rgba(65, 64, 64, 0.808);
}
.timer .number {
  /* background: rgba(51, 51, 51, 0.53); */
  padding: 0 5px;
  display: inline-block;
  text-align: center;
  color: #000;
  padding: 15px 7px;
  font-weight: bold;
  font-size: 18px;
  border-radius: 50%;
  border: 1px solid turquoise;
  margin-bottom: 5px;
}
.timer .message {
  font-size: 14px;
  font-weight: 400;
  margin-top: 5px;
  color: #000;
}
.timer .status-tag {
  margin: 5px auto;
  padding: 2px 0;
  font-weight: 500;
  text-align: center;
  border-radius: 15px;
}
.timer .status-tag.upcoming {
  color: lightGreen;
}
.timer .status-tag.running {
  color: gold;
}
.timer .status-tag.expired {
  color: turquoise;
}
</style>