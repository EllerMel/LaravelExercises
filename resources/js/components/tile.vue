<template>
  <button type="button" class="btn btn-secondary color" @click="whoseTurn">{{tileStatus}}</button>
</template>

<script>
export default {
  name: "tile",
  props: ['tileID'],
  data() {
    return {
        whoClicked: 0,
        hasClicked: false,
        tileStatus: "!"
    };
  },
  methods: {
      whoseTurn: function (){
          // set state that I've been clicked
          this.hasClicked = !this.hasClicked;
          console.log(this.hasClicked);
          // emit up to vue that a tile was clicked and pass my tileID
          
          this.$emit("whoseTurn", {'tileID': this.tileID});
          
          // get count from parent
          if(this.$parent.count % 2 == 0)
          {
              this.tileStatus= 'O';
          }
          else
          {
              this.tileStatus= "X";
          }
          
      }
  }
};
</script>