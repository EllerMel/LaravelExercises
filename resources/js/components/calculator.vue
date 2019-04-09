<template>
    <div>
    <h1>Calculator</h1>
    <div class="Calculator" id='calc-contain'>
        <p id="calculator-display" class="text">{{ this.calDisplay }}</p>
        <div class="calculator-keys">
            <button type="button" @click="myClear()"> C</button>
            <button type="button" value=" "> </button>
            <button type="button" value=" "> </button>
            <button type="button" @click="mySwitch('divide')">/</button>

            <button type="button" @click="myFunction(7)">7</button>
            <button type="button" @click="myFunction(8)">8</button>
            <button type="button" @click="myFunction(9)">9</button>
            <button type="button" @click="mySwitch('multiply')">x</button>

            <button type="button" @click="myFunction(4)">4</button>
            <button type="button" @click="myFunction(5)">5</button>
            <button type="button" @click="myFunction(6)">6</button>
            <button type="button" @click="mySwitch('subtract')">-</button>

            <button type="button" @click="myFunction(1)">1</button>
            <button type="button" @click="myFunction(2)">2</button>
            <button type="button" @click="myFunction(3)">3</button>
            <button type="button" @click="mySwitch('add')">+</button>


            <button type="button" @click="myFunction(0)">0</button>
            <button type="button" value=" "> </button>
            <button type="button" @click="myFunction('.')">.</button>
            <button type="button" @click="myEqual()">=</button>
        </div>
    </div>
    </div>
</template>

<script>
export default {
  name: "calculator",
  data() {
    return {
        num1: [],
        operator: "",
        calDisplay: "", 
    };
  },
  methods:{
    myClear: function(){
        this.num1 = [];
        this.calDisplay = "";
    },
    myFunction: function(x) {
        //collect numbers from buttons pressed and push them ito an array
        this.calDisplay += x;

        this.num1.push(x);
        console.log(this.num1);
    },
    mySwitch: function(y) {
        //turn first array into number
        this.number1 = Number(this.num1.join(''));
        console.log(this.number1);

        //show if it is addition, subtraction...
        this.operator = y;
        console.log(this.operator);

        this.myClear();
        console.log(this.num1);
    },
    myEqual: function() {
        //turn second array into number
        this.number2 = Number(this.num1.join(''));
        console.log(this.number2);
        console.log(this.number1);

        this.calDisplay = "";

        switch (this.operator) {
            case 'add':
                var sum = this.number1 + this.number2;
                break;
            case 'subtract':
                var sum = this.number1 - this.number2;
                break;
            case 'multiply':
                var sum = this.number1 * this.number2;
                break;     
            case 'divide':
                var sum = this.number1 / this.number2;
                break;                     
            default:
        }
        console.log(sum);
        this.calDisplay = sum;
        this.operator = "";
    }
  }
}
</script>