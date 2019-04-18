<template>
    <div>
        <div class="container center">
            <img class="mainImg" v-show="this.weatherStockImg" src="img/weather.jpg">
            <h1> Weather App</h1>
            <br>
            <div>
                <input class="box" id="zipcode" name="zipcode" type="text" @keyup.enter="getZipCode" v-model="zipcode">
                <button class="btn btn-info" @click="getZipCode" >Get Weather</button>
                <br>
                <p class="weather-error">{{error}}</p>
            </div>
        </div>
        <br>

        <div id="WeatherStuff" v-show="this.weatherInfoDiv" style="display:none">
            <div class="container">
                <div class="row">
                    <div class="col">
                </div>
                <div class="col center">
                    <img class="weather-Icon" id="weatherIcon" :src="weatherIcon">
                </div>
                    <div class="col">
                </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center weather-purple">
                        <strong>City</strong>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center">
                        <label class="center">{{ city }}</label>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center weather-purple">
                        <strong>Temperature</strong>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        </div>
                    <div class="col center">
                        <label id="kTemp">{{ kelvin }}</label>
                    </div>
                    <div class="col center">
                        <label id="fTemp">{{ fahrenheitDisplay }}</label>
                    </div>
                    <div class="col center">
                        <label id="cTemp">{{ celsius }}</label>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                        </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center weather-purple">
                        <strong>Condition</strong>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center">
                        <label>{{ condition }}</label>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col center">
                        <img class="weather-Img" id="weatherImg" :src="weatherImg">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
        <details>
            <p>Weather API: <a href="https://openweathermap.org/current#zip" target="_blank">https://openweathermap.org/current#zip</a></p>
        </details>
        </footer>
    </div>
</template>

<script>
export default {
  name: "weather-app",
  data() {
    return {
        zipcode: "",
        error: "",
        city: "",
        temp: "",
        kTemp: "",
        fTemp: "",
        cTemp: "",
        kelvin: "",
        fahrenheit: "",
        fahrenheitDisplay: "",
        celsius: "",
        condition: "",
        weatherImg: "",
        weatherIcon: "",
        weatherStockImg: true,
        weatherInfoDiv: false,
        infoToWatch: ""
    }
  }, 
  methods: {
    setData() {
        console.log(this.info);
        
        this.city = this.getCity();
        this.condition = this.getCondition();
        this.kTemp = this.getK();

        this.convertTemp();
        this.getTemperatureImg();
        this.weatherIcon = this.getIcon();

      console.log(this.city, this.condition, this.kTemp);
    },
    getZipCode: function() {
        console.log(this.zipcode);
        if (this.zipcode !== '') {
            let self = this;
            axios
                .get('https://cors-anywhere.herokuapp.com/' 
                + 'http://api.openweathermap.org/data/2.5/weather?zip=' 
                + this.zipcode + ',us&APPID=725c230d9f8717d24b757396af6fdb56')
                .then(response => {
                    self.info = response.data;
                    self.setData();
                });
        //hide stock image
        this.weatherStockImg = false;
        //show info div
        this.weatherInfoDiv = true;
        //hide error
        this.error = "";
        }  
        else {
            this.error = 'Please enter in a zip code';
            this.weatherStockImg = true;
            this.weatherInfo = false;
        }
      },
    getIcon: function(){
        return "http://openweathermap.org/img/w/" + this.info.weather[0].icon + ".png";
    },  
    getCity: function(){
        return this.info.name;
    },
    getCondition: function(){
        return this.info.weather[0].description;
    },
    getK: function(){
        return this.info.main.temp;
    },
    convertTemp() {
        this.kelvin = Math.round(this.kTemp) + "°" + " K";
        this.fahrenheit = Math.round(9 / 5 * (parseInt(this.kTemp) - 273) + 32);
        this.fahrenheitDisplay = this.fahrenheit + "°" + " F";
        this.celsius = Math.round(parseInt(this.kTemp) - 273.15) + "°" + " C";
    }, 
    getTemperatureImg() {
         this.temp = parseInt(this.fahrenheit);
        console.log("Temp", this.temp);
        if (this.temp <= 32) {
            this.weatherImg = "/img/ColdBinx.png";
        }
        else if (this.temp > 32 && this.temp < 65) {
            this.weatherImg = "/img/SpringBinx.png";
        }
        else if (this.temp >= 65) {
            this.weatherImg = "/img/SummerBinx.png";
        }
    },
  }
}
</script>