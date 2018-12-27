<template>
<div>
        <div class="page-header">
          <div class="container-fluid">
            <div class="d-flex    align-items-center justify-content-between " >
                <h2 class="h5 no-margin-bottom">PRODUCTORES</h2>
              <button href="" class="btn btn-primary ladda-button" data-toggle="modal" data-target="#modal" @click.prevent="vaciarForm()">Crear</button>
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
                  <table id="" style="width: 100%;" class="table table-striped">
                    <thead>
                                        <tr role="row">
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Cuit</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Activo</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="productor in productores" :key="productor.id" role="row" class="odd">
                                            <td>{{productor.apellido}}</td>
                                            <td> {{productor.nombre}} </td>
                                            <td> {{productor.cuit}} </td>
                                            <td> {{productor.email}} </td>
                                            <td> {{productor.telefono_2}} </td>
                                            <td v-if="productor.activo == 1">SI</td>
                                            <td v-else>NO</td>
                                            <td>
                                                <a href="" @click.prevent="modoEdicion(productor.id)" class="fa fa-edit"></a>
                                                <a href="" @click.prevent="borrarProductor(productor.id)" class="fa fa-trash"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                </div>
            </div>
          </div>
        </section>
    <!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateProductor(productor.id) : crearProductor()">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Productor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Nombre</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.nombre" class="form-control form-control-sm" id="nombre" name="nombre">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="apellido" class="control-label">Apellido</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.apellido" class="form-control form-control-sm" id="apellido" name="apellido" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="control-label">Cuit</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.cuit" class="form-control form-control-sm" id="cuit" name="cuit" placeholder="">
                                                        </div>
                                                        </div>
                                                <div class="form-group">
                                                        <label for="matricula" class="control-label">Matricula</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.matricula" class="form-control form-control-sm" name="matricula">
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="col-md-6">
                                        
                                                <div class="form-group">
                                                        <label for="email" class="control-label">Email</label>
                                                        <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                                </div>
                                                                <input name="email" v-model="productor.email" type="email" class="form-control form-control-sm" id="email" placeholder="Email">
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <label>Telefono</label>
                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" v-model="productor.telefono_1" class="form-control form-control-sm" id="telefono_1" name="telefono_1" placeholder="Telefono">
                                                        </div>
                                                </div>



                                                <div class="form-group">
                                                        <label>Celular</label>
                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" v-model="productor.telefono_2" id="telefono_2" name="telefono_2" placeholder="Celular">
                                                        </div>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value=1 v-model="productor.activo">
                                                    <label class="form-check-label">Activo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value=0 v-model="productor.activo">
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


    </div>


</template>
<script>
export default {
  data() {
    return {
      productores: {},
      productor: {
        nombre: "",
        apellido: "",
        cuit: "",
        matricula: "",
        email: "",
        telefono_1: "",
        telefono_2: "",
        activo: ""
      },
      modoEditar: false
    };
  },
  methods: {
    crearProductor() {
      let self = this;
      axios
        .post(
          "http://127.0.0.1:8000/api/administracion/productores",
          self.productor
        )
        .then(() => {
          $("#modal").modal("hide");
          this.productor = {};
          this.cargarProductores();
          toast({
              type: "success",
              title: "Productor creado!"
            });
        })
        .catch(e => console.log(e));
    },
    vaciarForm() {
      this.productor = {};
      this.modoEditar = false;
    },
    updateProductor(id) {
      let self = this;
      axios
        .put(
          "http://127.0.0.1:8000/api/administracion/productores/" + id,
          this.productor
        )
        .then(() => {
          $("#modal").modal("hide");
          this.cargarProductores();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    modoEdicion(id) {
      (this.modoEditar = true), $("#modal").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores/" + id)
        .then(function(response) {
          self.productor = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarProductor(id) {
      axios
        .delete("http://127.0.0.1:8000/api/administracion/productores/" + id)
        .then(() => {
          this.cargarProductores();
          console.log("borado!");
        });
    },
    cargarProductores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores")
        .then(function(response) {
          self.productores = response.data.data;
        });
    }
  },
  created() {
    this.cargarProductores();
  }
};
</script>

