<template>
  <div class="container-fluid center justify-content-center">
    <h1>Tic Tac Toe</h1>
    <br>
    <h4>{{ this.turnMsg }}</h4>
    <br>
    <h2>{{ this.winMsg }}</h2>
    <br>

    <div class="container">
      <div class="row" v-for="value_r in num" :key="value_r">
        <div class="col" v-for="value_c in num" :key="value_c">
          <tile
            v-bind:tileID="value_r * 3 + value_c"
            ref="tile_{{ value_r * 3 + value_c }}"
            v-on:whoseTurn="onClickTile"
          ></tile>
        </div>
      </div>
    </div>

    <br>
    <button class="btn btn-info fas fa-redo-alt" onclick="location.reload()"></button>
  </div>
</template>

<script>
import tile from "./tile";

export default {
  name: "tic-tac-toe",
  components: {
    tile
  },
  data() {
    return {
      num: [0, 1, 2],
      count: 0,
      clickValue: 0,
      arrWinner: [0, 0, 0, 0, 0, 0, 0, 0, 0],
      sum: 0,
      turnMsg: "First it's X's turn",
      winMsg: ""
    };
  },
  methods: {
    onClickTile: function(tileID) {
      this.count++;

      if (this.count % 2 == 0) {
        // O
        this.clickValue = 1;
        this.turnMsg = "Now it's X's turn";
      } else {
        //X
        this.clickValue = 2;
        this.turnMsg = "Now it's O's turn";
      }
      this.arrWinner[tileID.tileID] = this.clickValue;
      console.log(this.arrWinner);
      this.evalWinCondition();
    },
    evalWinCondition: function() {
      // check 3 indexes if equal to 3 or 6 and none are 0, winner
      for (let i = 0; i < 7; i++) {
        if (
          i % 3 == 0 &&
          this.arrWinner[i] != 0 &&
          this.arrWinner[i + 1] != 0 &&
          this.arrWinner[i + 2] != 0
        ) {
          this.sum = this.arrWinner[i] + this.arrWinner[i + 1] + this.arrWinner[i + 2];
          this.findWinner(this.sum);
        }
        if (i == 0 || i == 1 || i == 2) {
          if (
            this.arrWinner[i] != 0 &&
            this.arrWinner[i + 3] != 0 &&
            this.arrWinner[i + 6] != 0
          ) {
            this.sum = this.arrWinner[i] + this.arrWinner[i + 3] + this.arrWinner[i + 6];
            this.findWinner(this.sum);
          }
          if (i == 0) {
            if (
              this.arrWinner[i] != 0 &&
              this.arrWinner[i + 4] != 0 &&
              this.arrWinner[i + 8] != 0
            ) {
              this.sum = this.arrWinner[i] + this.arrWinner[i + 4] + this.arrWinner[i + 8];
              this.findWinner(this.sum);
            }
          }
          if (i == 2) {
            if (
              this.arrWinner[i] != 0 &&
              this.arrWinner[i + 2] != 0 &&
              this.arrWinner[i + 4] != 0
            ) {
              this.sum = this.arrWinner[i] + this.arrWinner[i + 2] + this.arrWinner[i + 4];
              this.findWinner(this.sum);
            }
          }
        }
      }
    },
    findWinner: function() {
      if (this.sum == 3) {
        this.winMsg = "Winner is O!";
        this.turnMsg = "";
      }
      if (this.sum == 6) {
        this.winMsg = "Winner is X!";
        this.turnMsg = "";
      }
      this.tieGame();
    },
    tieGame: function() {
        if(this.count == 9 && this.winMsg == "")
        {
            this.turnMsg = "";
            this.winMsg = "Draw! Please Play Again!";
        }
    }
  }
};
</script>

<style scoped>
</style>