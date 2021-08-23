<template>
<div class="container">
      
<publicar-component  @new="addPublicacion"></publicar-component>
<publicacion-component 
 v-for="(publicacion,index) in publicacions"
 :key="publicacions.id"
 :publicacion="publicacion"
 >
</publicacion-component>
</div>
</template>
<script>
    export default {
      data(){
        return{
         publicacions:[]
        }
      },


        mounted() {
         axios.get('/publicaciones').then((response) =>{
          this.publicacions = response.data;
         });
        },
        methods:{
        addPublicacion(publicacion){
          this.publicacions.push(publicacion);
        },
        }
    }
</script>
