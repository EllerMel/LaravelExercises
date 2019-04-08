<template>
  <div>
    <h2>{{ time_str }}</h2>
  </div>
</template>

<script>
export default {
  name: "countdown",
  data() {
    return {
      interval: null,
      time_str: ""
    };
  },
  methods: {
    displayTime: function() {
      this.interval = setInterval(() => {
        this.time_str--;
        if (this.time_str == 0) {
          clearInterval(this.interval);
          this.time_str = "DONE";
        }
      }, 1000);
    },
    getNumber() {
        this.time_str = prompt("Please enter a full number in seconds greater then 0", "");
        if(this.time_str > 0){
            this.displayTime();
        }
        else{
            this.getNumber();
        }
    }
  },
  created() {
      this.getNumber();
  }
};
</script>