<template lang="fr">
<!-- Sections -->
    <div> 
        <h2>{{title}}</h2>
        <div v-html="content"></div>
    </div>
</template>
<script>
export default {
    props:{
        content:{
            default:"content",
            type:String
        },
        title:{
            default:"Title",
            type:String
        },
        slug:{
            default:"slug",
            type:String
        }
    }
}
</script>
<style lang="">
    
</style>