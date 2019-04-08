<template>
  <div>
      <div id="militarytime" class="time">
        <h1>{{ time_str }}</h1>
      </div>

    <button class="btn btn-info" @click="isMilitary = !isMilitary">Time Format</button>
  </div>
</template>

<script>
export default {
  name: "curr-time",
  data() {
    return {
      currentTime: new Date(),
      interval: null,
      time_str: "",
      standardTime: "",
      isMilitary: true
    };
  },
  methods: {
    displayTime() {
      this.interval = setInterval(() => {
        this.currentTime = new Date();

        if (this.isMilitary) {
          this.time_str = this.getTime;
        } else {
          this.time_str = this.getStandardTime;
        }
      }, 1000);
    }
  },
  beforeDestroy() {
    clearInterval(this.interval);
  },
  created() {
    this.displayTime();
  },
  computed: {
    hrs() {
      if (this.currentTime.getHours() < 10) {
        return "0" + this.currentTime.getHours();
      } else return this.currentTime.getHours();
    },
    standardHrs() {
      if (this.currentTime.getHours() >= 13) {
        return this.currentTime.getHours() - 12;
      } else if (this.currentTime.getHours() == 0) {
        return 12;
      } else {
        return this.currentTime.getHours();
      }
    },
    meridiem() {
      if (this.currentTime.getHours() >= 12) {
        return "PM";
      } else if (
        this.currentTime.getHours() >= 0 &&
        this.currentTime.getHours() < 12
      ) {
        return "AM";
      }
    },
    mins() {
      if (this.currentTime.getMinutes() < 10) {
        return "0" + this.currentTime.getMinutes();
      } else return this.currentTime.getMinutes();
    },
    sec() {
      if (this.currentTime.getSeconds() < 10) {
        return "0" + this.currentTime.getSeconds();
      } else return this.currentTime.getSeconds();
    },
    getTime() {
      return this.hrs + ":" + this.mins + ":" + this.sec;
    },
    getStandardTime() {
      return (
        this.standardHrs +
        ":" +
        this.mins +
        ":" +
        this.sec +
        " " +
        this.meridiem
      );
    }
  }
};
</script>