<template>
    <div>
        <h1>Calculator</h1>
        <div class="calcContainer">
            <h2 class="calcDisplayText">{{ this.calDisplay }}</h2>
            <br>
            <div class="container">
                <div class="row" v-for="rowLine in buttonArray" :key="rowLine">
                    <div class="col" v-for="characterCol in rowLine" :key="characterCol">

                        <calculatorButton
                        v-bind:buttonID="characterCol"
                        v-on:theButton="clickedButton"
                        class="calcButton"
                        ></calculatorButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import calculatorButton from "./calculatorButton";

export default {
  name: "calculator",
  components: {
    calculatorButton
  },
  data() {
    return {
        buttonArray: [  ["C", "", "", "/"], 
                        ["7", "8", "9", "*"], 
                        ["4", "5", "6", "-"], 
                        ["1", "2", "3", "+"], 
                        ["0", "", ".", "="]
                    ],
        num1: [],
        number1: 0,
        operator: "",
        calDisplay: "", 
    };
  },
  methods:{
    myClear: function(){
        this.num1 = [];
        this.number1 = "";
        this.calDisplay = "";
    },
    clickedButton: function(buttonID) {
        if(buttonID.buttonID == "=")
        {
            //turns array into number
            this.number1 = (this.num1.join(''));
            this.calDisplay = eval(this.number1);
            
            //clear array and push sum as first value
            this.num1 = [];
            this.num1.push(this.calDisplay);
            console.log(this.num1);
        }
        else if(buttonID.buttonID == "C")
        {
            this.myClear();
        }
        else 
        {
            //collect numbers from buttons pressed and push them ito an array
            this.calDisplay += buttonID.buttonID;

            this.num1.push(buttonID.buttonID);
            console.log(this.num1);
        }
    }
  }
}
</script>

<style>
    .calcContainer{
        position: relative;
        width: 400px;
        border: 2px solid black;
        border-radius: 12px;
        margin: 0px auto;
        padding: 20px 20px 100px 20px;
        background: lightgray;
  }

    .calcButton {
        background: rgb(87, 58, 87);
        width: 75%;
        height: 45px;
        font-size: 20px;
        font-weight: 900;
        border-radius: 7px;
        margin-left: 13px;
        margin-top: 10px;
  }

    .calcDisplayText {
        position: relative;
        display: block;
        width: 80%;
        height: 45px;
        margin: 5px auto;
        font-size: 20px;
        padding: 10px;
        box-shadow: 4px 0px 12px black inset;
        text-align: right;
  }
</style>