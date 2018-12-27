<template>
    <div>
            <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">CREAR COMPAÑIA</h2>
          </div>
        </div>
        <div class="container-fluid">
                <form @submit.prevent="crearCompania()">

                <div class="block">
                        <div class="block-body">
                <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                        <label class="col-sm control-label ">Nombre</label>
                                        <div class="col-md-12">
                                                <input type="text" class="form-control form-control-sm" name="nombre" value="" v-model="compania.nombre">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm control-label ">Cuit</label>
                                        <div class="col-md-12">
                                                <input type="text" class="form-control mb-1 form-control-sm" name="cuit" value="" v-model="compania.cuit">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-sm">Cod. Libros Rubricados</label>
                                        <div class="col-md-12">
                                                <input type="text" class="form-control mb-1 form-control-sm" name="codigo_lr" value="" v-model="compania.codigo_lr" >
                                        </div>
                                </div>
                                        
                        </div>
                        <div class="col-md-4"> 
                                <div class="form-group">
                                        <label class="col-sm control-label">Color Principal</label>
                                        <div class="col-md-12 input-group my-colorpicker2">
                                                <input type="text" class="form-control mb-1 form-control-sm" name="color" v-model="compania.color" >
                                                        <div class="input-group-append">
                                                                <span class="input-group-text form-control-sm"><i class="fa fa-square"></i></span>
                                                        </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm control-label">Estado de Compañia</label>
                                        <div class="input-group form-check">
                                                <input class="radio-template" type="radio" value=1 v-model="compania.activo">
                                                <label class="col-sm form-check-label">Activo</label>
                                        </div>
                                        <div class="input-group form-check">
                                                <input class="radio-template" type="radio" value=0 v-model="compania.activo">
                                                <label class="col-sm form-check-label">Inactivo</label>
                                        </div> 
                                </div>                         
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label for="logo" class="col-sm control-label">Logo</label>
                                        <div class="col-md">
                                                <input type="file" class="form-control form-control-sm" id="" name="logo">
                                        </div>
                                </div>
                        </div>
                </div>
                        </div>
                </div>
        

                <div class="block">
                        <div class="block-body">
                <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                        <label class="control-label col-sm">Direccion</label>
                                        <div class="col-md-12">
                                                <input type="text" class="form-control mb-1 form-control-sm" name="direccion" value="" v-model="compania.direccion">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-sm ">Localidad</label>
                                        <div class="col-md-12">
                                                <select name='localidad_id' class="form-control form-control-sm" value='localidad_id' v-model="compania.localidad_id" >
                                                        <option v-for="localidad in localidades" :key="localidad.id" v-bind:value='localidad.id' >{{localidad.nombre}}  / CP: {{localidad.codigo_postal}}</option>
                                                </select>
                                        </div>
                                </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                         <label class="control-label col-sm">Telefono</label>
                                        <div class="input-group col-md-12 mb-1">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                                </div>
                                                        <input type="text" class="form-control form-control-sm" name="telefono_1" v-model="compania.telefono_1">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-sm">Telefono Grua</label>
                                        <div class="input-group col-md-12 mb-1">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                        <input type="text" class="form-control form-control-sm" name="telefono_aux" v-model="compania.telefono_aux">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-sm">Telefono Siniestros</label>
                                        <div class="input-group col-md-12 mb-1">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                        <input type="text" class="form-control form-control-sm" name="telefono_siniestros" v-model="compania.telefono_siniestros">
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label class="control-label col-sm">Email Emision</label>
                                        <div class="input-group col-md-12 mb-1">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                </div>
                                                        <input type="text" class="form-control form-control-sm" name="email_emision" v-model="compania.email_emision">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-sm">Email Siniestros</label>
                                        <div class="input-group col-md-12 mb-1">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                </div>
                                                        <input type="text" class="form-control form-control-sm" name="email_siniestros" v-model="compania.email_siniestros">
                                        </div>
                                </div>
                        </div>
                </div>
                        </div>
                </div>
                </form>
        </div>


                <div class="">
                        <div class="col-md-4">
                                <button type="submit" class="btn btn-primary ladda-button">Crear</button>
                        </div>
                </div>
</div>
</template>
<script>
export default {
  data() {
    return {
      compania: {},
      localidades: {}
    };
  },
  methods: {
    crearCompania() {
      let self = this;
      axios
        .post(
          "http://127.0.0.1:8000/api/administracion/companias",
          self.compania
        )
        .then(() => {
          this.compania = {};
          this.compania.activo = true;
          router.push("http://127.0.0.1:8000/administracion/companias");
        })
        .catch(e => console.log(e));
    },
    cargarLocalidades() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/localidades")
        .then(function(response) {
          console.log(response.data.data);
          self.localidades = response.data.data;
        });
    }
  },
  created() {
    this.cargarLocalidades();
  }
};
</script>