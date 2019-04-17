<template>
    <div id="accordion">
        <div v-for="group in MenuGroups" :key="group">
            <accordionPanel
                v-bind:MenuID="group.id" v-bind:MenuValue="group.value">
            </accordionPanel>
        </div>
    </div>

</template>


<script>
import accordionPanel from "./accordion-panel";
export default {
    name: "accordion",
    components: {
        accordionPanel
    },
    data() {
        return {
            MenuGroups: [{id:"One", value:"Un amuse-bouche"}, 
                         {id:"Two", value:"Le plat principal"}, 
                         {id:"Three", value:"Le dessert"},
                         {id:"Four", value:"Le brunch"}]
        };
    },
    methods: {
    }
}
</script>