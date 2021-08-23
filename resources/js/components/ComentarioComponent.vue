<template>
    <b-card-text>
     <b>{{comentario.name}} : </b>{{comentario.comentario}}
    </b-card-text>
  </b-card>
</template>

<script>
    export default {
        props:['comentario'],

        data(){
          return{
          };
      }
}
</script>