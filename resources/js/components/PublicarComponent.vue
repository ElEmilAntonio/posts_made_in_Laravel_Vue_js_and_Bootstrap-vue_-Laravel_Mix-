<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <b-card tag="article" style="max-width: 100rem;" class="mb-2">
          <form action="" v-on:submit.prevent="newPublicacion()">
            <b-form-textarea
            id="mensaje"
            name="mensaje"
            v-model="mensaje"
            placeholder="¿En que estas pensando?"
            rows="3"
            max-rows="6"
            block
            ></b-form-textarea>
          <input type="file"
           class="form-control"
            id="imagen"
             placeholder="Muestranos un momento inolvidable"
             @change="onFileSelected"/>
            <b-button 
            type="submit" 
            variant="primary" 
            block
            :disabled= "mensaje.length<0"
            style="height:40px;">
              Publicar
            </b-button>
          </form>
        </b-card>


      </div>
    </div>
  </div>
</template>

<script>
    export default {
        data(){return {
         mensaje:'',
         imagen:null
         }
        },
        mounted() {
            console.log(this.imagen)
        },
        methods:{
         newPublicacion(){
          const params = new FormData();
          params.append('mensaje',this.mensaje)
           params.append('imagen',this.imagen)
    
          axios.post('/publicaciones',params).then((response)=>{
             const publicacion = response.data;
             this.$emit('new',publicacion);
       
          });
         },
         onFileSelected(event) {
          console.log("se ejecuto");
         this.imagen=event.target.files[0];
         }
        }
    }
</script>
