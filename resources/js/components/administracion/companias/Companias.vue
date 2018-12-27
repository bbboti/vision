    <template>
<div>
          <div class="page-header">
          <div class="container-fluid">
            <div class="d-flex    align-items-center justify-content-between " >
                <h2 class="h5 no-margin-bottom">COMPAÑIAS</h2>
                <router-link to="/administracion/companias/create" class="btn btn-primary ladda-button" >Crear</router-link>
            </div>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="block">
                <div class="table-responsive">
                  <table style="width: 100%;" class="table table-striped">
                                <thead>
                                        <tr role="row">
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Telefono Aux</th>
                                            <th>Telefono Siniestros</th>
                                            <th>Activa</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="compania in companias" :key="compania.id" role="row" class="odd">
                                            <td> {{compania.nombre}} </td>
                                            <td> {{compania.telefono_1}} </td>
                                            <td> {{compania.telefono_aux}} </td>
                                            <td> {{compania.telefono_siniestros}} </td>
                                            <td v-if="compania.activo == 1">SI</td>
                                            <td v-else>NO</td>                                            
                                            <td>
                                                <router-link :to="`/administracion/companias/${compania.nombre}/edit`" class="fa fa-edit"></router-link>
                                                <a href="" class="fa fa-trash"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                               </table>
                </div>
            </div>
          </div>
        </section>

    </div>


</template>
<script>
export default {
  data() {
    return {
      companias: {}
    };
  },
  created() {
    let self = this;
    axios
      .get("http://127.0.0.1:8000/api/administracion/companias")
      .then(function(response) {
        // console.log(response.data.data);
        self.companias = response.data.data;
      });
  }
};
</script>
