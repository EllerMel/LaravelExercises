<template>
    <div>
        <div class="container center">
            <img class="mainImg" id="mainImg" src="img/weather.jpg"></img>
            <h1> Weather App</h1>
            <br>
            <div>
                <input class="box" id="zipcode" name="zipcode" type="text" value="">
                <button class="btn btn-info" @click="getZipCode" >Get Weather</button>
                <br>
                <p class="weather-error">{{error}}</p>
            </div>
        </div>
        <br>

        <div id="WeatherStuff" style="display:none">
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
                        <label class="center" id="city"></label>
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
                        <label id="kTemp"></label>
                    </div>
                    <div class="col center">
                        <label id="fTemp"></label>
                    </div>
                    <div class="col center">
                        <label id="cTemp"></label>
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
                        <label id="condition"></label>
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
                        <img class="weather-Img" id="weatherImg" src="/img/SummerBinx.png"></img>
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
        error2: "",
        city: "",
        kTemp: "",
        kelvin: "",
        fahrenheit: "",
        celsius: "",
        condition: "",
        weatherImg: "",
    }
  }, 
  methods: {
    setData() {
      console.log(this.info);
    },
      getZipCode: function() {
        console.log('HERE');
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
        }     
        else {
            this.error = 'Please enter in a zip code';
        }
      },
  }, 
}
</script>