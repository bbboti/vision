    <template>
    <div>
        <div class="page-header">
          <div class="container-fluid">
              <div class="d-flex    align-items-center justify-content-between " >
                <h2 class="h5 no-margin-bottom" >POLIZAS - Automotor</h2>
                <router-link to="/polizas/create" class="btn btn-primary ladda-button" >Crear</router-link>
            </div>
          </div>
        </div>
            <section class="no-padding-top">

                    <div class="container-fluid">
                        <div class="block">
                        <!-- <div class="title"><strong>Automotor</strong></div> -->
                            <div class="table-responsive">
                            <table id="" style="width: 100%;" class="table">
                                        <thead>
                                                <tr role="row">
                                                    <th>Poliza</th>
                                                    <th>Patente</th>
                                                    <th>Compañia</th>
                                                    <th>Cliente</th>
                                                    <th>Vigencia</th>
                                                    <th>Desde / Hasta</th>
                                                    <th>Estado</th>
                                                    <th>Envio</th>
                                                    <th>F.Pago</th>
                                                    <th>Edicion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="font-size:80%;"  v-for="poliza in polizas" :key="poliza.id" role="row" class="odd">
                                                    <td> {{poliza.numero}} </td>
                                                    <td> petente </td>
                                                    <td> {{poliza.companias.nombre}} ({{poliza.codigo_productor.codigo_productor}}) </td>
                                                    <td v-if="poliza.clientes.razon_social === null"><a href="" data-toggle="modal" data-target="#modal" @click.prevent="modoEdicion(poliza.clientes.id)">{{poliza.clientes.apellido}} {{poliza.clientes.nombre}}</a></td>
                                                    <td v-else><a href="" data-toggle="modal" data-target="#modal" @click.prevent="modoEdicion(cliente.id)">{{poliza.clientes.razon_social}}</a></td>
                                                    <td> {{poliza.tipo_vigencias.vigencia}} </td>
                                                    <td> {{poliza.vigencia_desde}} / {{poliza.vigencia_hasta}} </td>
                                                    <td> {{poliza.estado_polizas.nombre}} </td>
                                                    <td v-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email === null">Recibida</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email === null">Entregada</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email === null">Correo</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email !== null">Email</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email === null">Entregada / Correo</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email !== null">Entregada / Email</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email !== null">Correo / Email</td>
                                                    <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email !== null">Entregada / Correo / Email</td>
                                                    <td v-else>No recibida</td>
                                                    <td> {{poliza.medio_pago}} </td>
                                                    <td>
                                                        <router-link :to="`/polizas/automotor/${poliza.numero_solicitud}/edit`" class="fa fa-edit"></router-link>
                                                        <a href="" class="fa fa-car"></a>
                                                        <a href="" class="fa fa-folder-plus"></a>
                                                        <a href="" class="fa fa-car-crash"></a>
                                                        <a href="" class="fa fa-trash"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
                <modal-clientes :cliente='cliente'></modal-clientes>

    </div>
</template>
<script>
import ModalClientes from '../clientes/ModalClientes'
export default {
    components:{
        ModalClientes
    },
  data() {
    return {
        cliente:{},
      polizas: {},
      companias: {},
      codigo_productor: {},
      productor: {},
        modoEditar: false
    };
  },
  methods:{
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
  },
  created() {
    let self = this;
    axios.get("http://127.0.0.1:8000/api/polizas").then(response => {
      // console.log(response.data)
      self.polizas = response.data.data;
    });
  }
};
</script>
