<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

               <b-card-group deck style="max-width: 80rem;" class="mb-2">
                <b-card
                :header="publicacion.user.name"
                header-tag="header"
                > 
                <b-card-text>{{publicacion.mensaje}}</b-card-text>
                 
                <b-img v-if="publicacion.imagen!=null"
                :src="'/images/'+publicacion.imagen" 
                fluid alt="Responsive image"
                style="margin-bottom: 15px;"
                ></b-img>
                <comentarios-component 
                  v-for="(comentario,index) in publicacion.comentarios"
                  :key="comentario.id"
                  :comentario="comentario"
 >
                </comentarios-component>
                <form action="" v-on:submit.prevent="newCommentario()">
                <b-form-textarea
                   id="comentario"
                   name="comentario"
                   v-model="comentario"
                   placeholder="Escribe tu comentario aqui"
                   rows="1"
                   max-rows="2"
                   block
                   style="margin-bottom: 15px;"
            ></b-form-textarea style="text-align: right;">
                
                   <b-button variant="outline-primary"  v-on:click="newComentario()">Comentar</b-button>
                Comentarios : {{this.publicacion.comentarios.length}}
               </form>
               
            </b-card>
        </b-card-group deck>
    </div>
</div>
</div>
</template>

<script>
    export default {
        props:['publicacion'],

        data(){
          return{
            comentario:null,
            id_publicacion:this.publicacion.id,
            name:this.publicacion.user.name,
          };
      },
      mounted() {
        console.log(this.publicacion)
    },
    methods:{
    newComentario(){
          const params = new FormData();
          params.append('comentario',this.comentario)
           params.append('id',this.id_publicacion)
              params.append('name',this.name)
          axios.post('/comentar',params).then((response)=>{
             const comentario_actual = response.data;
              this.publicacion.comentarios.push(comentario_actual);
          });
          this.comentario=null;
         }
    }
}
</script>
