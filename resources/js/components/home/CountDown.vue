<template>
  <div class="deal-timer absolute bg-white py-2 uppercase">
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
  props: ['starttime', 'endtime', 'trans'],
  data() {
    return {
      timer: '',
      wordString: {},
      start: '',
      end: '',
      interval: '',
      days: '',
      minutes: '',
      hours: '',
      seconds: '',
      message: '',
      statusType: '',
      statusText: '',
    }
  },
  created() {
    this.wordString = JSON.parse(this.trans)
  },
  mounted() {
    this.start = new Date(this.starttime).getTime()
    this.end = new Date(this.endtime).getTime()
    // Update the count down every 1 second
    this.timerCount(this.start, this.end)
    this.interval = setInterval(() => {
      this.timerCount(this.start, this.end)
    }, 1000)
  },
  methods: {
    timerCount: function (start, end) {
      // Get todays date and time
      var now = new Date().getTime()

      // Find the distance between now an the count down date
      var distance = start - now
      var passTime = end - now

      if (distance < 0 && passTime < 0) {
        this.message = this.wordString.expired
        this.statusType = 'expired'
        this.statusText = this.wordString.status.expired
        clearInterval(this.interval)
        return
      } else if (distance < 0 && passTime > 0) {
        this.calcTime(passTime)
        this.message = this.wordString.running
        this.statusType = 'running'
        this.statusText = this.wordString.status.running
      } else if (distance > 0 && passTime > 0) {
        this.calcTime(distance)
        this.message = this.wordString.upcoming
        this.statusType = 'upcoming'
        this.statusText = this.wordString.status.upcoming
      }
    },
    calcTime: function (dist) {
      // Time calculations for days, hours, minutes and seconds
      this.days = Math.floor(dist / (1000 * 60 * 60 * 24))
      this.hours = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
      this.minutes = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60))
      this.seconds = Math.floor((dist % (1000 * 60)) / 1000)
    },
  },
}
</script>

<style scoped>
.deal-timer {
  color: #fff;
  text-align: center;
  border: 2px solid #0d335d;
  right: 15px;
  left: 15px;
  bottom: 20px;
}
.deal-timer .day,
.deal-timer .hour,
.deal-timer .min,
.deal-timer .sec {
  display: inline-block;
  font-weight: 500;
  text-align: center;
  margin: 0 auto;
}
.deal-timer .day .format,
.deal-timer .hour .format,
.deal-timer .min .format,
.deal-timer .sec .format {
  font-weight: 300;
  font-size: 12px;
  opacity: 0.8;
  width: 60px;
  color: rgba(65, 64, 64, 0.808);
}
.deal-timer .number {
  /* background: rgba(51, 51, 51, 0.53); */
  display: inline-block;
  width: 60px;
  text-align: center;
  color: #000;
  font-size: 15px;
}
.deal-timer .message {
  font-size: 14px;
  font-weight: 400;
  margin-top: 5px;
  color: #000;
}
.deal-timer .status-tag {
  margin: 5px auto;
  padding: 2px 0;
  font-weight: 500;
  text-align: center;
  border-radius: 15px;
}
.deal-timer .status-tag.upcoming {
  color: lightGreen;
}
.deal-timer .status-tag.running {
  color: gold;
}
.deal-timer .status-tag.expired {
  color: turquoise;
}
</style>
