<template>
  <button type="button" class="btn btn-secondary color" @click="theButton">{{buttonID}}</button>
</template>

<script>
export default {
  name: "calculator-button",
  props: ['buttonID'],
  data() {
    return {
        buttonID: 0,
        isOperator: false,
    };
  },
  methods: {
      theButton: function (){
          // emit up to vue that a tile was clicked and pass my buttonID
          this.$emit("theButton", {'buttonID': this.buttonID});
      }
  }
};
</script>