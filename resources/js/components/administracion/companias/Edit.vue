<template>
<div>
        <div>
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">EDITAR COMPAÑIA</h2>
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
                                        <div class="i-checks">
                                                <input class="radio-template" type="radio" value=1 v-model="compania.activo">
                                                <label class="">Activo</label>
                                        </div>
                                        <div class="i-checks">
                                                <input class="radio-template" type="radio" value=0 v-model="compania.activo">
                                                <label class="">Inactivo</label>
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
                <div class="row">
                <div class="container-fluid">
                        <button type="submit" class="mb-3 btn btn-primary ladda-button float-left">Crear</button>
                </div>
                </div>
        </div>


                
</div>
<!-- FIN DATOS COMPANIA -->






<!-- COMIENZO CODIGO ORGANIZADORES -->
        <!-- Tabla de Codigo de Organizadores -->

        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                    <p class="d-inline align-bottom">CODIGOS ORGANIZADOR</p>
                    <button href="" class="btn btn-primary ladda-button float-right" data-toggle="modal" data-target="#modalcodigoorganizador" @click.prevent="vaciarForm()">Crear</button>
            </div>
                 <div class="block">
                  <div class="table-responsive"> 
                    <table class="table table-striped table-sm">
                      <thead>
                              <tr>
                                        <th>Apellido</th>
                                        <th>Nombre</th>
                                        <th>Matricula</th>                                                                                    
                                        <th>Cod. Organizador</th>
                                        <th>Activo</th>
                                        <th>Edicion</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr v-for="codigo_organizador in codigo_organizadores" :key="codigo_organizador.id" role="row" class="odd">
                                        <td>{{codigo_organizador.organizadores.apellido}}</td>
                                        <td>{{codigo_organizador.organizadores.nombre}}</td>
                                        <td>{{codigo_organizador.organizadores.matricula}}</td> 
                                        <td>{{codigo_organizador.codigo_organizador}}</td>
                                        <td v-if="codigo_organizador.activo == 1">SI</td>
                                        <td v-else>NO</td>   
                                <td>
                                        <a @click.prevent="editarCodigo_Organizador(codigo_organizador.id)" class="fa fa-edit"></a>
                                        <a @click.prevent="borrarCodigo_Organizador(codigo_organizador.id)" class="fa fa-trash"></a>   
                                </td>                                                                                  
                                </tr>
                        </tbody>
                        </table>
                </div>
                </div>
        </div>
        </div>               
<!-- MODAL CODIGO ORGANIZADORES -->
<div class="modal fade" id="modalcodigoorganizador" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateCodigo_Organizador(codigo_organizador.id) : crearCodigo_Organizador()">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Codigo Organizador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-9">
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Organizadores</label>
                                                        <div class="">
                                                                <select name='organizador_id' class="form-control form-control-sm"  v-model="codigo_organizador.organizador_id">
                                                                        <option v-for="organizador in organizadores" :key="organizador.id" v-bind:value="organizador.id"> {{organizador.apellido}} {{organizador.nombre}} (Matricula:{{organizador.matricula}}) </option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="control-label">Codigo Organizador</label>
                                                        <div class="">
                                                                <input type="text" v-model="codigo_organizador.codigo_organizador" class="form-control form-control-sm" id="codigo_organizador" name="codigo_organizador" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="i-checks">
                                                    <input class="radio-template" type="radio" value=1 v-model="codigo_organizador.activo">
                                                    <label class="form-check-label">Activo</label>
                                                </div>
                                                <div class="i-checks">
                                                    <input class="radio-template" type="radio" value=0 v-model="codigo_organizador.activo">
                                                    <label class="form-check-label">Inactivo</label>
                                                </div> 
                                        </div>
                                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" v-show="!modoEditar" class="btn btn-primary">Crear</button>
                <button type="submit" v-show="modoEditar" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>
<!--FIN !!! MODAL CODIGO ORGANIZADORES -->
<!-- FIN CODIGO ORGANIZADORES -->
<!-- COMIENZO CODIGO PRODUCTORES         -->
        <!-- Tabla de Codigo de Productores -->

        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                    <p class="d-inline align-bottom">CODIGOS PRODUCTOR</p>
                    <button href="" class="btn btn-primary ladda-button float-right" data-toggle="modal" data-target="#modalcodigoproductor" @click.prevent="vaciarForm()">Crear</button>
            </div>
                 <div class="block">
                  <div class="table-responsive"> 
                    <table class="table table-striped table-sm">
                      <thead>
                              <tr>
                                        <th>Apellido</th>
                                        <th>Nombre</th>
                                        <th>Matricula</th>                                                                                    
                                        <th>Cod. Productor</th>                                                                   
                                        <th>Cod. Organizador</th>
                                        <th>Activo</th>
                                        <th>Edicion</th>
                                </tr>
                        </thead>
                        <tbody>             
                                <tr v-for="codigo_productor in codigo_productores" :key="codigo_productor.id" role="row" class="odd">
                                        <td>{{codigo_productor.productores.apellido}}</td>
                                        <td>{{codigo_productor.productores.nombre}}</td>
                                        <td>{{codigo_productor.productores.matricula}}</td>
                                        <td>{{codigo_productor.codigo_productor}}</td>
                                        <td>{{codigo_productor.codigo_organizador.codigo_organizador}}</td>
                                        <td v-if="codigo_productor.activo == 1">SI</td>
                                        <td v-else>NO</td>                                
                                        <td>
                                           <a @click.prevent="editarCodigo_Productor(codigo_productor.id)" class="fa fa-edit"></a>
                                           <a @click.prevent="borrarCodigo_Productor(codigo_productor.id)" class="fa fa-trash"></a> 
                                        </td>      
                                </tr>
                        </tbody>
                        </table>
                </div>
                </div>
        </div>
        </div>
<!-- MODAL CODIGO PRODUCTOR -->
<div class="modal fade" id="modalcodigoproductor" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateCodigo_Productor(codigo_productor.id) : crearCodigo_Productor()">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Codigo Productor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-9">
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Productores</label>
                                                        <div class="">
                                                                <select name='productor_id' class="form-control form-control-sm"  v-model="codigo_productor.productor_id">
                                                                        <option v-for="productor in productores" :key="productor.id" v-bind:value="productor.id"> {{productor.apellido}} {{productor.nombre}} (Matricula:{{productor.matricula}}) </option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Codigo Organizador</label>
                                                        <div class="">
                                                                <select name='codigo_organizador_id' class="form-control form-control-sm"  v-model="codigo_productor.codigo_organizador_id">
                                                                        <option v-for="codigo_organizador in codigo_organizadores" :key="codigo_organizador.id" v-bind:value="codigo_organizador.id"> {{codigo_organizador.organizadores.apellido}} {{codigo_organizador.organizadores.nombre}} (Codigo Org: {{codigo_organizador.codigo_organizador}}) </option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="control-label">Codigo Productor</label>
                                                        <div class="">
                                                                <input type="text" v-model="codigo_productor.codigo_productor" class="form-control form-control-sm" id="codigo_productor" name="codigo_productor" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-check">
                                                    <input class="radio-template" type="radio" value=1 v-model="codigo_productor.activo">
                                                    <label class="form-check-label">Activo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="radio-template" type="radio" value=0 v-model="codigo_productor.activo">
                                                    <label class="form-check-label">Inactivo</label>
                                                </div>
                                        </div>
                                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" v-show="!modoEditar" class="btn btn-primary">Crear</button>
                <button type="submit" v-show="modoEditar" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>
<!-- FIN !!! MODAL CODIGO PRODUCTOR -->
<!-- FIN CODIGO PRODUCTORES -->

<!-- COMIENZO COBERTURAS -->
        <!-- Tabla de Cobertura -->
        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                    <p class="d-inline align-bottom">COBERTURAS</p>
                    <button href="" class="btn btn-primary ladda-button float-right" data-toggle="modal" data-target="#modalcobertura" @click.prevent="vaciarForm()">Crear</button>
            </div>
                 <div class="block">
                  <div class="table-responsive"> 
                    <table class="table table-striped table-sm">
                      <thead>
                              <tr>
                                        <th>Nombre</th>
                                        <th>Antiguedad</th>
                                        <th>Todo Riesgo</th>                                                                        
                                        <th>Franquicia</th>
                                        <th>Ajuste</th>
                                        <th>Activa</th>
                                        <th>Edicion</th>
                                </tr>
                        </thead>
                        <tbody>             
                                <tr v-for="cobertura in coberturas" :key="cobertura.id" role="row" class="odd">
                                        <td>{{cobertura.nombre}}</td>
                                        <td>{{cobertura.antiguedad}}</td>
                                        <td v-if="cobertura.todo_riesgo == 1">SI</td>
                                        <td v-else>NO</td>
                                        <td>{{cobertura.franquicia}}</td>
                                        <td>{{cobertura.ajuste}}</td>
                                        <td v-if="cobertura.activa == 1">SI</td>
                                        <td v-else>NO</td>
                                        <td>
                                                <a @click.prevent="editarCobertura(cobertura.id)" class="fa fa-edit"></a>
                                                <a @click.prevent="borrarCobertura(cobertura.id)" class="fa fa-trash"></a>  
                                        </td>     
                                </tr>
                        </tbody>
                        </table>
                </div>
                </div>
        </div>
        </div>
            
<!-- MODAL COBERTURA -->
<div class="modal fade" id="modalcobertura" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateCobertura(cobertura.id) : crearCobertura()">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Cobertura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Nombre Cobertura</label>
                                                        <div class="">
                                                                <input type="text" v-model="cobertura.nombre" class="form-control form-control-sm" id="nombre" name="nombre">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="antiguedad" class=" control-label">Antiguedad (En Años)</label>
                                                        <div class="">
                                                                <input type="number" v-model="cobertura.antiguedad" class="form-control form-control-sm" id="antiguedad" name="antiguedad">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="todo_riesgo" class=" control-label">Todo Riesgo</label>
                                                        <div class="">
                                                                <input type="checkbox" v-model="cobertura.todo_riesgo" class="checkbox-template" id="todo_riesgo" name="todo_riesgo">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="franquicia" class=" control-label">Franquicia</label>
                                                        <div class="">
                                                                <input type="text" v-model="cobertura.franquicia" class="form-control form-control-sm" id="franquicia" name="franquicia">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="ajuste" class=" control-label">Ajuste</label>
                                                        <div class="">
                                                                <select name='ajuste' v-model="cobertura.ajuste" class="form-control form-control-sm" >
                                                                        <option > 0 % </option>
                                                                        <option > 10 % </option>
                                                                        <option > 20 % </option>
                                                                        <option > 30 % </option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="detalle" class=" control-label">Detalle</label>
                                                        <div class="">
                                                                <input type="textarea" v-model="cobertura.detalle" class="form-control form-control-sm" id="detalle" name="detalle">
                                                        </div>
                                                </div>
                                                <div class="i-checks">
                                                    <input class="radio-template" type="radio" value=1 v-model="cobertura.activa">
                                                    <label class="form-check-label">Activa</label>
                                                </div>
                                                <div class="i-checks">
                                                    <input class="radio-template" type="radio" value=0 v-model="cobertura.activa">
                                                    <label class="form-check-label">Inactiva</label>
                                                </div>
                                        </div>
                                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" v-show="!modoEditar" class="btn btn-primary">Crear</button>
                <button type="submit" v-show="modoEditar" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
</div>
      </div>

<!-- FIN MODAL COBERTURA -->
<!-- FIN COBERTURA -->


</template>
<script>
export default {
  data() {
    return {
      compania: {
        nombre: "",
        cuit: "",
        direccion: "",
        localidad_id: "",
        codigo_lr: "",
        activo: "",
        telefono_1: "",
        telefono_aux: "",
        telefono_siniestros: "",
        email_emision: "",
        email_siniestros: "",
        id: ""
      },
      modoEditar: false,
      codigo_organizadores: {},
      codigo_organizador: {
        codigo_organizador: "",
        organizador_id: "",
        compania_id: "",
        activo: ""
      },
      codigo_productores: {},
      codigo_productor: {
        codigo_productor: "",
        codigo_organizador_id: "",
        productor_id: "",
        compania_id: "",
        activo: ""
      },
      coberturas: {},
      cobertura: {
        nombre: "",
        compania_id: "",
        antiguedad: "",
        todo_riesgo: "",
        franquicia: "",
        activa: "",
        ajuste: "",
        detalle: ""
      },
      organizadores: {},
      organizador: {},
      productores: {},
      productor: {},
      localidades: {},
      nombreCompania: this.$route.params.nombre
    };
  },
  methods: {
    // FUNCIONES COMPANIA //

    cargarCompania() {
      let self = this;
      axios
        .get(
          "http://127.0.0.1:8000/api/administracion/companias/" +
            this.nombreCompania
        )
        .then(response => {
          self.compania = response.data.data[0];
          axios
            .get(
              "http://127.0.0.1:8000/api/codigoorganizador/compania/" +
                self.compania.id
            )
            .then(response => {
              self.codigo_organizadores = response.data.data;
            })
            .catch(err => {
              console.log(err);
            });
          axios
            .get(
              "http://127.0.0.1:8000/api/codigoproductor/compania/" +
                self.compania.id
            )
            .then(response => {
              self.codigo_productores = response.data.data;
            })
            .catch(err => {
              console.log(err);
            });
          axios
            .get(
              "http://127.0.0.1:8000/api/cobertura/compania/" + self.compania.id
            )
            .then(response => {
              self.coberturas = response.data.data;
            })
            .catch(err => {
              console.log(err);
            });
        });
    },

    updateCompania() {
      let self = this;
      axios
        .put(
          "http://127.0.0.1:8000/api/administracion/companias/" +
            this.compania.id,
          this.compania
        )
        .then(() => {
          console.log("update ok");
          window.location.replace(
            "http://127.0.0.1:8000/administracion/companias/" +
              this.compania.nombre +
              "/edit"
          );
        });
    },

    //FIN - FUNCIONES COMPANIA //

    cargarLocalidades() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/localidades")
        .then(function(response) {
          self.localidades = response.data.data;
        });
    },
    vaciarForm() {
      this.modoEditar = false;
      this.codigo_organizador = {};
      this.codigo_productor = {};
      this.cobertura = {};
      this.compania.activo = 1;
    },

    // FUNCIONES CODIGO ORGANIZADOR //
    cargarCodigo_Organizador() {
      let self = this;
      axios
        .get(
          "http://127.0.0.1:8000/api/codigoorganizador/compania/" +
            self.compania.id
        )
        .then(response => {
          self.codigo_organizadores = response.data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    crearCodigo_Organizador() {
      let self = this;
      self.codigo_organizador.compania_id = self.compania.id;
      axios
        .post(
          "http://127.0.0.1:8000/api/codigoorganizador",
          self.codigo_organizador
        )
        .then(() => {
          $("#modalcodigoorganizador").modal("hide");
          this.codigo_organizador = {};
          this.codigo_organizador.activo = true;
          this.cargarCodigo_Organizador();
        })
        .catch(e => console.log(e));
    },
    updateCodigo_Organizador(id) {
      let self = this;
      axios
        .put(
          "http://127.0.0.1:8000/api/codigoorganizador/" + id,
          this.codigo_organizador
        )
        .then(() => {
          $("#modalcodigoorganizador").modal("hide");
          this.cargarCodigo_Organizador();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    editarCodigo_Organizador(id) {
      (this.modoEditar = true), $("#modalcodigoorganizador").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/codigoorganizador/" + id)
        .then(function(response) {
          self.codigo_organizador = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarCodigo_Organizador(id) {
      axios
        .delete("http://127.0.0.1:8000/api/codigoorganizador/" + id)
        .then(() => {
          this.cargarCodigo_Organizador();
          console.log("borado!");
        });
    },

    // FIN - FUNCIONES CODIGO ORGANIZADOR //

    // FUNCIONES CODIGO PRODUCTOR //
    cargarCodigo_Productor() {
      let self = this;
      axios
        .get(
          "http://127.0.0.1:8000/api/codigoproductor/compania/" +
            self.compania.id
        )
        .then(response => {
          self.codigo_productores = response.data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    crearCodigo_Productor() {
      let self = this;
      self.codigo_productor.compania_id = self.compania.id;
      axios
        .post(
          "http://127.0.0.1:8000/api/codigoproductor",
          self.codigo_productor
        )
        .then(() => {
          $("#modalcodigoproductor").modal("hide");
          this.codigo_productor = {};
          this.codigo_productor.activo = true;
          this.cargarCodigo_Productor();
        })
        .catch(e => console.log(e));
    },
    updateCodigo_Productor(id) {
      let self = this;
      axios
        .put(
          "http://127.0.0.1:8000/api/codigoproductor/" + id,
          this.codigo_productor
        )
        .then(() => {
          $("#modalcodigoproductor").modal("hide");
          this.cargarCodigo_Productor();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    editarCodigo_Productor(id) {
      (this.modoEditar = true), $("#modalcodigoproductor").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/codigoproductor/" + id)
        .then(function(response) {
          self.codigo_productor = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarCodigo_Productor(id) {
      axios
        .delete("http://127.0.0.1:8000/api/codigoproductor/" + id)
        .then(() => {
          this.cargarCodigo_Productor();
          console.log("borado!");
        });
    },
    // FIN - FUNCIONES CODIGO PRODUCTOR

    // FUNCIONES COBERTURAS //
    cargarCobertura() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/cobertura/" + 
        self.compania.id
        )
        .then(response => {
          self.coberturas = response.data.data;
        })
        .catch(e => {
          console.log(e);
        });
    },
    crearCobertura() {
      let self = this;
      self.cobertura.compania_id = self.compania.id;
      axios
        .post("http://127.0.0.1:8000/api/cobertura", self.cobertura)
        .then(() => {
          $("#modalcobertura").modal("hide");
          this.cobertura = {};
          this.cobertura.activo = true;
          this.cargarCobertura();
        })
        .catch(e => console.log(e));
    },
    updateCobertura(id) {
      let self = this;
      axios
        .put("http://127.0.0.1:8000/api/cobertura/" + id, this.cobertura)
        .then(() => {
          $("#modalcobertura").modal("hide");
          this.cargarCobertura();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    editarCobertura(id) {
      (this.modoEditar = true), $("#modalcobertura").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/cobertura/" + id)
        .then(function(response) {
          console.log(response.data.data);
          self.cobertura = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarCobertura(id) {
      axios.delete("http://127.0.0.1:8000/api/cobertura/" + id).then(() => {
        this.cargarCobertura();
        console.log("borado!");
      });
    },
    //FIN - FUNCIONES COBERTURAS //

    cargarOrganizadores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/organizadores")
        .then(response => {
          self.organizadores = response.data.data;
        });
    },
    cargarProductores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores")
        .then(response => {
          self.productores = response.data.data;
        });
    }
   
  },
  created() {
    this.cargarCompania();
    this.cargarLocalidades();
    this.cargarCobertura();
    this.cargarOrganizadores();
    this.cargarProductores();
  }
};
</script>