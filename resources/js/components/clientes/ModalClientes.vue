<template>
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateCliente(cliente.id) : crearCliente()">
      <div class="modal-header">
        <strong id="exampleModalLabel" class="modal-title">Cliente</strong>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!--      Wizard container        -->
            <div class="wizard-container">

                <div class="form wizard-card" data-color="violet" id="wizardProfile">
                    <form action="" method="">
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#datos" data-toggle="tab">Datos</a></li>
	                            <li><a href="#direccion" data-toggle="tab">Direccion</a></li>
	                            <li><a href="#productor" data-toggle="tab">Productor</a></li>
	                            <li><a href="#registro" data-toggle="tab">Registro</a></li>
	                        </ul>

						</div>

        <div class="tab-content">
             <div class="tab-pane" id="datos">
                <!-- <h4 class="info-text"> Datos Personales </h4> -->

                              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo de Persona </label>
                  <select class="form-control form-control-sm" v-model="cliente.tipo_persona">
                        <option value="Persona Fisica">Persona Fisica</option>
                        <option value="Persona Juridica">Persona Juridica</option>
                  </select>
                </div>
                <div class="form-group" v-if="cliente.tipo_persona === 'Persona Juridica'">
                  <label>Razon Social</label>
                    <input type="text" class="form-control form-control-sm" id="razon_social" name="razon_social" v-model="cliente.razon_social"
                    >
                        
                </div>
                <div class="form-group-material">
                  <label>Nombre</label>
                    <input type="text" class="form-control form-control-sm"  id="nombre" name="nombre" v-model="cliente.nombre"
                     >
                </div>
                
                <div class="form-group">
                  <label>Apellido</label>
                    <input type="text" class="form-control form-control-sm" id="nombre" nome="nombre" v-model="cliente.apellido"
                    >
                </div>
                <div class="form-group" v-if="cliente.tipo_persona !== 'Persona Juridica'">
                <label>Documento</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <select class="form-control form-control-sm"  name='tipo_doc' v-model="cliente.tipo_doc">
                                <option>DNI</option>
                                <option>LE</option>
                                <option>Pasaporte</option>
                            </select>                        
                        </div>
                            <input type="text" class="form-control form-control-sm" >
                       
                    </div>
                </div>

                <div class="form-group" v-if="cliente.tipo_persona !== 'Persona Juridica'">
                    <div class="form-check form-check-inline">
                    <label class="form-check-label"> Masculino  
                        <input class="form-check-input" type="radio" id="masculino" name="sexo" v-model="cliente.sexo" value='M' > 
                    </label>
                    </div>
                    <div class="form-check form-check-inline">
                    <label class="form-check-label"> Femenino 
                        <input class="form-check-input" type="radio" id="femenino" name="sexo" v-model="cliente.sexo" value='F' > 
                    </label>
                    </div>
                    
                </div>

                <div class="form-group" v-if="cliente.tipo_persona !== 'Persona Juridica'">
                  <label>Fecha de Nacimiento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input name="nacimiento" type="date" class="form-control form-control-sm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask v-model="cliente.nacimiento" >
                  </div>
                  
                </div>
                </div>
 <div class="col-md-6">
                    <div class="form-group">
                        <label>Condición Fiscal</label>
                            <select class="form-control form-control-sm select2 mb-1" name='condicion_fiscal' style="width: 100%;" v-model="cliente.condicion_fiscal">
                                <option selected="selected">CONSUMIDOR FINAL</option>
                                <option>RESPONSABLE INSCRIPTO</option>
                                <option>MONOTRIBUTO</option>
                            </select>
                    </div>
                    <div class="form-group" v-if="cliente.tipo_persona === 'Persona Juridica'">
                        <label>CUIT</label>
                            <input type="text" class="form-control form-control-sm mb-1" name="cuit" v-model="cliente.cuit" >
                    </div>
                    <div class="form-group" v-if="cliente.tipo_persona === 'Persona Fisica'">
                        <label>CUIT</label>
                            <input type="text" class="form-control form-control-sm mb-1" name="cuit" v-model="cliente.cuit">
                    </div>
                    <label>Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                            <input name="email" type="email" class="form-control form-control-sm" placeholder="Email" v-model="cliente.email"
                            >
                    </div>
                    <label>Email Alternativo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                            <input name="email_alt" type="email" class="form-control form-control-sm" placeholder="Email Alternativo" v-model="cliente.email_alt"
                            >
                    </div>
                    <div class="form-group">
                        <label>Observaciones</label>
                            <textarea class="form-control form-control-sm mb-1" rows="3" name='observaciones_1' v-model="cliente.observaciones_1"></textarea>
                    </div>
                </div>

                                  <!-- <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" id="wizard-picture">
                                          </div>
                                          <h6>Choose Picture</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>First Name <small>(required)</small></label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                      </div>
                                      <div class="form-group">
                                        <label>Last Name <small>(required)</small></label>
                                        <input name="lastname" type="text" class="form-control" placeholder="Smith...">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                      </div>
                                  </div> -->
                              </div>
                            </div>
    <div class="tab-pane" id="direccion">
    <!-- <h4 class="info-text"> Direccion </h4> -->
    <div class="row">

                        <div class="col-md-6">
                <label>Direccion</label>
                <div class="form-group">
                    <div class="input-group mb-12">
                        <div class="input-group-prepend mb-9">
                            <input type="text" class="form-control form-control-sm" placeholder="Calle" id="" name="direccion" v-model="cliente.direccion"
                            >
                        </div>
                        <div class="input-group-prepend mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Nro" id="direccion_nro" name="direccion_nro" 
                            v-model="cliente.direccion_nro"
                           >
                        </div>
                    </div>
                                      
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="">
                            <input type="text" class="form-control form-control-sm" placeholder="Piso" id="direccion_piso" name="direccion_piso" v-model="cliente.direccion_piso">                      
                        </div>
                        <div class="">
                            <input type="text" class="form-control form-control-sm" placeholder="Depto" id="direccion_depto" name="direccion_depto" v-model="cliente.direccion_depto">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                        <label>Localidad</label>
                        <select class="form-control form-control-sm mb-1" name='localidad_id' v-model="cliente.localidad_id" :custom-label="nombreYCodigo" :options="localidades" placeholder="">
                            <option v-for="localidad in localidades" :key="localidad.id" v-bind:value='localidad.id' >{{localidad.nombre}}  / CP: {{localidad.codigo_postal}}</option>
                        </select>
                        
                </div>


                <div class="form-group">
                <label>Country / Barrio Cerrado</label>
                    <div class="input-group mb-12">
                        <div class="input-group-prepend mb-9">
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="barrio_cerrado" name="barrio_cerrado" v-model="cliente.barrio_cerrado">                      
                        </div>
                        <div class="input-group-prepend mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Lote" id="lote" name="lote" v-model="cliente.lote">
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Celular</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="celular" v-model="cliente.celular">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telefono 1</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="telefono_1" v-model="cliente.telefono_1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telefono 2</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="telefono_2" v-model="cliente.telefono_2">
                        </div>
                    </div>
                <div class="form-group">
                    <label>Observaciones</label>
                    <div>
                        <textarea class="form-control form-control-sm mb-1" rows="3" placeholder="" name='observaciones_2' v-model="cliente.observaciones_2"></textarea>
                    </div>
                </div>
            </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="productor">

                                <div class="row">
                                    
<div class="col-md-6">
                <div class="form-group">
                <label>Productor</label>
                    <div>
                        <select name='productor_id' class="form-control form-control-sm mb-1" v-model="cliente.productor_id">
                            <option v-for="productor in productores" :key="productor.id" v-bind:value="productor.id">{{productor.apellido+" "+productor.nombre}}</option>
                        </select>
                        
                    </div>
                </div>
            </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="registro">
    <div class="row">
                                    
                                     <div class="col-md-6">
                <div class="form-group">
                    <label>Numero</label>
                    <div>
                        <input type="text" class="form-control form-control-sm mb-1" id="" name="registro" v-model="cliente.registro">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Vencimiento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input name="vencimiento_registro" type="date" class="form-control form-control-sm" data-inputmask="'alias': 'dd/mm/yyyy'" v-model="cliente.vencimiento_registro">
                  </div>
                </div>
            </div>
        </div>
        <!-- <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group ">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="img_registro">
                        <label class="custom-file-label" for="exampleInputFile">Elegir Archivo</label>
                      </div>
                      <div class="input-group-append ">
                        <span class="input-group-text  " id="">Subir</span>
                      </div>
                    </div>
        </div> -->
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <div class="wizard-footer height-wizard ">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd ' name='Siguiente' value='Siguiente' />
                                    <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Guardar' />
                                    <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Crear' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-primary btn-wd' name='Atras' value='Atras' />
                                </div>
                                <!-- <button type="submit" v-show="!modoEditar" class="btn btn-primary">Crear</button>
                                <button type="submit" v-show="modoEditar" class="btn btn-primary">Guardar</button> -->
                        </div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->

            </form>
            </div>
        </div>
    </div> 
    </template>

    <script>
    export default {
        props:{
            cliente:{}
        },
        data() {
            return {
            productores: {},
            productor: {},
            localidades: [],
            // cliente: {
            //     tipo_persona: "",
            //     nombre: "",
            //     apellido: "",
            //     razon_social: "",
            //     tipo_doc: "",
            //     nro_dni: "",
            //     sexo: "",
            //     nacimiento: "",
            //     condicion_fiscal: "",
            //     cuit: "",
            //     registro: "",
            //     vencimiento_registro: "",
            //     email: "",
            //     email_alt: "",
            //     direccion: "",
            //     direccion_nro: "",
            //     direccion_piso: "",
            //     direccion_depto: "",
            //     localidad_id: "",
            //     barrio_cerrado: "",
            //     lote: "",
            //     celular: "",
            //     telefono_1: "",
            //     telefono_2: "",
            //     img_registro: "",
            //     observaciones_1: "",
            //     obeservaciones_2: "",
            //     productor_id: ""
            // },
            modoEditar: false
            };
  },
    validations() {
        if (this.cliente.tipo_persona === 'Persona Fisica'){
            return {
                cliente: {
                    nombre: {
                        required,
                        alpha
                    },
                    apellido: {
                        required,
                        alpha
                    },
                    nro_dni: {
                        required,
                        numeric
                    },
                    nacimiento: {
                        required
                    },
                    email: {
                        email
                    },
                    sexo: {
                        required
                    },
                    nacimiento: {
                        required
                    },
                    email: {
                        email
                    },
                    email_alt: {
                        email
                    },
                    direccion: {
                        required
                    },
                    direccion_nro: {
                        required
                    },
                    localidad_id:{
                            required
                    },
                    productor_id: {
                        required
                    }
                }
            } 
                } else {
                return {
                    cliente: {
                        nombre: {
                            alpha
                        },
                        apellido: {
                            alpha
                        },
                        nro_dni: {
                            numeric
                        },
                        nacimiento: {
                        },
                        email: {
                            email
                        },
                        cuit: {
                            required
                        },
                        sexo: {
                        },
                        nacimiento: {
                        },
                        email: {
                            email
                        },
                        email_alt: {
                            email
                        },
                        direccion: {
                            required
                        },
                        direccion_nro: {
                            required
                        },
                        localidad_id:{
                            required
                        },
                        productor_id: {
                            required
                        },
                        razon_social: {
                            required
                        }
                        }
                }
            }
  },
  methods: {
    crearCliente() {
      let self = this;
      this.$Progress.start();
      
        axios
          .post("http://127.0.0.1:8000/api/clientes", self.cliente)
          .then(() => {
            $("#modal").modal("hide");
            this.$Progress.finish();
            this.cliente = {};
            this.cargarClientes();
            toast({
              type: "success",
              title: "Cliente creado!"
            });
          })
          .catch(error => {
            console.log(error.response.data);
            this.errors = error.response.data;
          });
      
    },
    cambiarACondicionJuridica() {
      this.tipo_persona = 2;
    },
    // vaciarForm() {
    //   this.cliente = {
    //     tipo_persona: "Persona Fisica",
    //     condicion_fiscal: "CONSUMIDOR FINAL",
    //     tipo_doc: "DNI"
    //   };
    //   this.errors = [];
    //   this.modoEditar = false;
    // },
    updateCliente(id) {
      let self = this;
      axios
        .put("http://127.0.0.1:8000/api/clientes/" + id, this.cliente)
        .then(() => {
          $("#modal").modal("hide");
          this.cargarClientes();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    modoEdicion(id) {
      (this.modoEditar = true), $("#modal").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/clientes/" + id)
        .then(function(response) {
          self.cliente = response.data.data;
        })
        .catch(e => console.log(e));
    },
    // borrarCliente(id) {
    //   axios.delete("http://127.0.0.1:8000/api/clientes/" + id).then(() => {
    //     this.cargarClientes();
    //     console.log("borado!");
    //   });
    // },
    // cargarClientes() {
    //   let self = this;
    //   axios.get("http://127.0.0.1:8000/api/clientes").then(function(response) {
    //     self.clientes = response.data.data;
    //   });
    // },
    cargarProductores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores")
        .then(function(response) {
          self.productores = response.data.data;
        });
    },
    cargarLocalidades() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/localidades")
        .then(function(response) {
          self.localidades = response.data.data;
        });
    },
    nombreYCodigo({ nombre, codigo_postal }) {
      return `${nombre} — (CP:${codigo_postal})`;
    }
  },
  created() {
    this.cargarProductores();
    this.cargarLocalidades();
  }
    }
    </script>