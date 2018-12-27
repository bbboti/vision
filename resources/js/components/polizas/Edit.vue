<template>
        <div>
                <form @submit.prevent="updatePoliza()">
                        <div class="page-header no-margin-bottom">
                                <div class="container-fluid">
                                        <h2 class="h5 no-margin-bottom">POLIZA {{poliza.numero}}</h2>
                                </div>
                        </div>
                        <div class="container-fluid">
                                <div class="block">
                                        <div class="block-body">
                                        <div class="row">
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="cliente" class="control-label">Cliente</label>
                                                        <div class="mb-1">
                                                                <select name='cliente_id' class="form-control form-control-sm mb-1 selectbuscador" value="cliente_id" v-model="poliza.cliente_id">
                                                                        <option v-for="cliente in clientes" :key="cliente.id" v-bind:value="cliente.id">{{cliente.apellido}} {{cliente.nombre}} //DNI:{{cliente.nro_dni}}</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="riesgo" class=" control-label">Riesgo</label>
                                                        <div class=" mb-1">
                                                                <select name='tipo_riesgo_id' class="form-control form-control-sm select2" value="tipo_riesgo_id" v-model="poliza.tipo_riesgo_id">
                                                                        <option v-for="tipo_riesgo in tipo_riesgos" :key="tipo_riesgo.id" v-bind:value="tipo_riesgo.id">{{tipo_riesgo.nombre}}</option>
                                                                </select>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <label for="compania" class=" control-label">Compañia</label>
                                                        <div class=" mb-1">
                                                                <select name='compania_id' class="form-control form-control-sm select2" value="compania_id" id="compania_id" v-model="poliza.compania_id"  @change='cargarCodigos_ProductorOnChange(poliza.compania_id)'>
                                                                        <option v-for="compania in companias" :key="compania.id" v-bind:value="compania.id">{{compania.nombre}}</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="codigo_productor_id" class=" control-label">Codigo Productor</label>
                                                        <div class=" mb-1">
                                                                <select name='codigo_productor_id' class="form-control form-control-sm select2" value="codigo_productor_id" id="codigo_productor_id" v-model="poliza.codigo_productor_id">
                                                                        <option v-for="codigo_productor in codigo_productores" :key="codigo_productor.id" v-bind:value="codigo_productor.id">{{codigo_productor.productores.apellido}} {{codigo_productor.productores.nombre}} ((Cod.{{codigo_productor.codigo_productor}}))</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="numero" class=" control-label">Poliza N:</label>
                                                        <div class="mb-1">
                                                                <input type="text" class="form-control form-control-sm" id="numero" name="numero" value="" v-model="poliza.numero">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="tipo_vigencia_id" class=" control-label">Vigencia</label>
                                                        <div class="mb-1">
                                                                <select name='tipo_vigencia_id' class="form-control form-control-sm select2" value="tipo_vigencia_id" v-model="poliza.tipo_vigencia_id" @change='sumarMes(poliza.tipo_vigencia_id)'>
                                                                        <option v-for="tipo_vigencia in tipo_vigencias" :key="tipo_vigencia.id" v-bind:value="tipo_vigencia.id">{{tipo_vigencia.vigencia}}</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="vigencia_desde" class=" control-label">Desde:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="vigencia_desde" name="vigencia_desde" v-model="poliza.vigencia_desde" @change='sumarMes(poliza.vigencia_desde)'>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="vigencia_hasta" class=" control-label">Hasta:</label>
                                                        <div class="">
                                                                <input type="date" class="form-control form-control-sm" id="vigencia_hasta" name="vigencia_hasta" v-model="poliza.vigencia_hasta">
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="numero_solicitud" class="">Nro de Solicitud:</label>
                                                        <div class="mb-1">
                                                                <p>{{poliza.numero_solicitud}}</p>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="fecha_solicitud" class=" control-label">Fecha de Solicitud:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="fecha_solicitud" name="fecha_solicitud" v-model="poliza.fecha_solicitud">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="fecha_emision" class=" control-label">Emision:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="fecha_emision" name="fecha_emision" v-model="poliza.fecha_emision">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="fecha_recepcion" class=" control-label">Recepcion:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="fecha_recepcion" name="fecha_recepcion" v-model="poliza.fecha_recepcion">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="fecha_entrega_original" class=" control-label">Entrega de Original:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="fecha_entrega_original" name="fecha_entrega_original" v-model="poliza.fecha_entrega_original">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="fecha_entrega_email" class=" control-label">Envio x Email:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="fecha_entrega_email" name="fecha_entrega_email" v-model="poliza.fecha_entrega_email">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="fecha_entrega_correo" class=" control-label">Envio x Correo:</label>
                                                        <div class="mb-1">
                                                                <input type="date" class="form-control form-control-sm" id="fecha_entrega_correo" name="fecha_entrega_correo" v-model="poliza.fecha_entrega_correo">
                                                        </div>
                                                </div>
                                        </div>
                                        </div>
                                </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="card p-3">
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <label for="premio" class="control-label">Premio:</label>
                                                                                <div class="mb-1">
                                                                                        <input type="number" class="form-control form-control-sm" id="premio" name="premio" v-model="poliza.premio">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                        <div class="form-group">
                                                                                <label for="prima" class="control-label">Prima:</label>
                                                                                <div class="mb-1">
                                                                                        <input type="number" class="form-control form-control-sm" id="prima" name="prima" v-model="poliza.prima">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                        
                                                                        <div class="form-group">
                                                                                <label for="comision" class="control-label">Comision:</label>
                                                                                <div class="mb-1">
                                                                                        <input type="number" class="form-control form-control-sm" id="comision" name="comision" v-model="poliza.comision">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6">      
                                                                        <div class="form-group">
                                                                                <label for="descuento" class="control-label">Descuento:</label>
                                                                                <div class="mb-1">
                                                                                        <input type="number" class="form-control form-control-sm" id="descuento" name="descuento" v-model="poliza.descuento">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                
                                                        </div>
                                                        
                                                </div>
                                                <div class="row">    
                                                        <div class="col-md-6 pt-sm-4">
                                                               
                                                        
                                                        <div class="pt-sm-3">
                                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>  
                                                        </div> 
                                                </div>    

                                        </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                                <div class="card p-3">
                                                        <div class="form-group">
                                                                <label for="medio_pago" class=" control-label">Medio de Pago:</label>
                                                                <div class=" mb-1">
                                                                        <select name='medio_pago' class="form-control form-control-sm " v-model="poliza.medio_pago">
                                                                                <option value='TC'>TARJETA DE CREDITO</option>
                                                                                <option value='DC'>DEBITO EN CUENTA</option>
                                                                                <option value='EFT'>PAGO EFECTIVO / PAGO FACIL</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-8">
                                                        <div class="form-group">
                                                                <label for="plan_pago" class=" control-label">Plan de Pago:</label>
                                                                <div class=" mb-1">
                                                                        <select name='plan_pago' class="form-control form-control-sm " v-model="poliza.plan_pago">
                                                                                <option value='MENSUAL'>MENSUAL</option>
                                                                                <option value='TRIMESTRAL'>TRIMESTRAL</option>
                                                                                <option value='SEMESTRAL'>SEMESTRAL</option>
                                                                                <option value='TOTAL'>TOTAL</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                        <label for="cantidad_cuotas" class=" control-label">Cant. Cuotas:</label>
                                                                        <div class=" mb-1">
                                                                                <input type="text" class=" form-control form-control-sm" id="cantidad_cuotas" name="cantidad_cuotas" v-model="poliza.cantidad_cuotas">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="">
                                                                
                                                                <div class="form-group">
                                                                        <label for="detalle_medio_pago" class="control-label">Detalle:</label>
                                                                        <div class="">
                                                                                <textarea class="form-control form-control-sm mb-1" rows="3" id="detalle_medio_pago" name='detalle_medio_pago' v-model="poliza.detalle_medio_pago"></textarea>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div>
                                        
                                </div>
                        </div>
                                </form>
                <div class="container-fluid">               
                <div class="card">
                        <div class="card-header">
                        <div class="d-flex  align-items-center justify-content-between">
                                        <p class="">RIESGO</p>
                                        <toggle-button class="v-switch-label v-left" :value="true" 
                                                :sync="false"
                                                :labels="{checked: 'Individual', unchecked: 'Flota'}" 
                                                :color="{checked: '#9055A2', unchecked: '#f704e4'}" 
                                                :width=80
                                                v-model="poliza.flota"
                                                 >
                                        </toggle-button>
                                        <button class="btn btn-primary float-right">Crear</button>
                        </div>
                        </div>
                                <div class="block">
                                        <div class="table-responsive"> 

                                        <table id="example2" class="table table-striped table-sm" role="grid"
                                        aria-describedby="example2_info">
                                        <thead class="">
                                                <tr role="row">
                                                                                <th>Marca / Modelo / Version</th>
                                                                                <th>Patente</th>
                                                                                <th>Motor</th>
                                                                                <th>Chasis</th>
                                                                                <th>Tipo</th>
                                                                                <th>Cobertura</th>
                                                                                <th>Franquicia</th>
                                                                                <th>Edicion</th>

                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                                <td>dds</td>
                                                                                <td>dddddd</td>
                                                                                <td>dddddd</td> 
                                                                                <td>dddddd</td>
                                                                                <td>dddddd</td>
                                                                                <td>dddddd</td>   
                                                                                <td>dddddd</td>   
                                                                                <td>dddddd</td>                                                                                 
                                                                        </tr>
                                                                </tbody>
                                                        </table>
                                        </div>


                                </div>
                        </div>
                </div> 
                <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                                <p class="d-inline align-bottom">ENDOSOS</p>
                                <button class="btn btn-primary float-right">Crear</button>
                        </div>
                        <div class="block">
                                <div class="table-responsive">
                                        <table id="example2" class="table table-striped table-sm" role="grid"
                                        aria-describedby="example2_info">
                                        <thead class="">
                                                <tr role="row">
                                                                                <th>Fecha de Pedido</th>
                                                                                <th>Motivo</th>
                                                                                <th>Nro Endoso</th>
                                                                                <th>Fecha de Emision</th>
                                                                                <th>Completo</th>
                                                                                <th>Edicion</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                                <td>dddd</td>
                                                                                <td>dddd</td>
                                                                                <td>dddd</td> 
                                                                                <td>dddd</td>
                                                                                <td>dddd</td>
                                                                                <td>dddd</td>                                                                                
                                                                        </tr>
                                                                </tbody>
                                                        </table>
                                        </div>


                                </div>
                        </div>
                </div>
                <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                                <p class="d-inline align-bottom">SINIESTROS</p>
                                <button class="btn btn-primary float-right">Crear</button>
                        </div>
                        <div class="block" id="bloquespoliza">
                                        <div class="table-responsive">
                                        <table id="example2" class="table table-striped table-sm" role="grid"
                                        aria-describedby="example2_info">
                                        <thead class="">
                                                <tr role="row">
                                                                                <th>F. Denuncia</th>
                                                                                <th>F. Ocurrencia</th>
                                                                                <th>Nro Siniestro</th>
                                                                                <th>Cobertura</th>
                                                                                <th>Cerrado</th>
                                                                                <th>Edicion</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                                <td>ddddd</td>
                                                                                <td>ddddd</td>
                                                                                <td>ddddd</td> 
                                                                                <td>ddddd</td>
                                                                                <td>ddddd</td>
                                                                                <td>ddddd</td>   
                                                                                                                                                      
                                                                        </tr>
                                                                </tbody>
                                                        </table>
                                        </div>


                                </div>
                        </div>
                </div>
                </div>
                
                
</template>
<script>
export default {
  data() {
    return {
      poliza: {
        cliente_id: "",
        tipo_riesgo_id: "",
        compania_id: "",
        codigo_productor_id: "",
        numero: "",
        tipo_vigencia_id: "",
        vigencia_desde: "",
        vigencia_hasta: "",
        numero_solicitud: "",
        estado_poliza_id: "",
        fecha_solicitud: "",
        fecha_emision: "",
        fecha_recepcion: "",
        fecha_entrega_original: "",
        fecha_entrega_email: "",
        fecha_entrega_correo: "",
        premio: "",
        prima: "",
        comision: "",
        descuento: "",
        medio_pago: "",
        plan_pago: "",
        cantidad_cuotas: "",
        detalle_medio_pago: "",
        flota: ""
      },
      cliente: {},
      clientes: {},
      companias: {},
      compania: {},
      tipo_riesgos: {},
      codigo_productores: {},
      tipo_vigencias: {},
      numeroSolicitud: this.$route.params.numero_solicitud
    };
  },
  methods: {
    sumarMes(mes) {
      let self = this;
      var mes;

      switch (this.poliza.tipo_vigencia_id) {
        case 6:
          var mes = 12;
          break;
        case 5:
          var mes = 6;
          break;
        case 4:
          var mes = 4;
          break;
        case 3:
          var mes = 3;
          break;
        case 2:
          var mes = 2;
          break;
        case 1:
          var mes = 1;
          break;
      }
      this.poliza.vigencia_hasta = addMonths(this.poliza.vigencia_desde, mes)
        .toISOString()
        .slice(0, 10);
    },

    //     sumarSoloMes(mes){
    //        this.poliza.vigencia_hasta = addMonths(this.poliza.vigencia_desde, mes)
    //         .toISOString()
    //         .slice(0, 10);
    //     },

    cargarPoliza() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/polizas/" + this.numeroSolicitud)
        .then(function(response) {
          self.poliza = response.data.data[0];
        //   console.log(self.poliza.compania_id);
          axios
            .get(
              "http://127.0.0.1:8000/api/codigoproductor/compania/" +
                self.poliza.compania_id
            )
            .then(response => {
              // console.log(response.data.data);
              self.codigo_productores = response.data.data;
            })
            .catch(err => {
              // console.log(err);
            });
        });
    },
    updatePoliza(){
            let self = this;
            axios
            .put("http://127.0.0.1:8000/api/polizas/" + this.numeroSolicitud, 
            this.poliza)
                .then(() => {
                        console.log("update ok");
                        windows.location.replace(
                        "http://127.0.0.1:8000/api/polizas/" + this.numeroSolicitud + "/edit"
                        );
                });
    },
    cargarClientes() {
      let self = this;
      axios.get("http://127.0.0.1:8000/api/clientes").then(function(response) {
        self.clientes = response.data.data;
      });
    },
    cargarTipo_Riesgos() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/tiporiesgo")
        .then(function(response) {
          self.tipo_riesgos = response.data.data;
        });
    },
    cargarTipo_Vigencias() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/tipovigencia")
        .then(function(response) {
          self.tipo_vigencias = response.data.data;
        });
    },
    cargarCompanias() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/companias")
        .then(function(response) {
          self.companias = response.data.data;
        });
    },
    cargarCodigos_ProductorOnChange(id) {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/codigoproductor/compania/" + id)
        .then(response => {
          // console.log(response.data.data);
          self.codigo_productores = response.data.data;
        })
        .catch(err => {
          // console.log(err);
        });
    }
  },

  created() {
    this.cargarPoliza();
    this.cargarClientes();
    this.cargarTipo_Riesgos();
    this.cargarCompanias();
    this.cargarTipo_Vigencias();
    //     this.cargarCodigos_Productor();
  },
  mounted() {}
};
</script>