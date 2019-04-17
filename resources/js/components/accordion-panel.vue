<template>
    <div class="card container">
        <div class="card-header" :id="getHeadingID">
            <h5 class="mb-0">
                <button class="btn btn-link restaurant-group" data-toggle="collapse" :data-target="getCollaspe"
                    aria-expanded="false" :aria-controls="getCollaspeID">
                    {{MenuValue}}
                </button>
            </h5>
        </div>

        <div :id="getCollaspeID" class="collapse" :aria-labelledby="getHeadingID" data-parent="#accordion">
        <!-- class="collapse show" defaults to the accordion being open-->
            <div class="card-body">

                <div v-for="n in 4" :key="n" class="row">
                    <div class="col">
                        <div class="card-body">
                        <img class="card-img-top" :src="setRandomPath(8)" alt="Food image" style="width:100%" v-show="showImage">
                        <p><food-card></food-card></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                        <img class="card-img-top" :src="setRandomPath(4)" alt="Food image" style="width:100%" v-show="showImage">
                        <p><food-card></food-card></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>


<script>
export default {
    name: "accordionPanel",
    props: ['MenuID', 'MenuValue'],    
    data() {
        return {
            image: true,
            imgpath: "http://lorempixel.com/",
            img: "",
        };
    },
    methods: {
        // setters, I set data
        setRandomPath: function(n){
            this.img = this.imgpath + "40" + String(Math.floor(Math.random() * Math.floor(n))) +  "/20" + String(Math.floor(Math.random() * Math.floor(n))) + "/food";
            return this.img;
        }
    },
    created () {
        this.setRandomPath(9);
    },
    computed: {
        // getters, I format and return data
        getCollaspe: function(){
            return "#collapse" + this.MenuID
        },
        getCollaspeID: function(){
            return "collapse" + this.MenuID
        },
        getHeadingID: function(){
            return "heading" + this.MenuID
        }, 
        showImage: function(){
            if(this.MenuID=="Two")
            {
                return this.image;
            } 
            else 
            {
                return !this.image;
            }
        }
    }
}
</script>