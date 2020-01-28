<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">LISTA VUE</div>

                    <div class="card-body">
                        <form>
                            <label>Nombre</label>
                            <input
                                v-model="alumno.nombre"
                                class="form-control"
                                type="text"
                                name="nombre"
                                id=""
                            />
                            <br>
                            <label>Apellidos</label>
                            <input
                                v-model="alumno.apellidos"
                                class="form-control"
                                type="text"
                                name="apellidos"
                                id=""
                            />
                            <br>
                            <label>Sexo</label>
                            <input
                                v-model="alumno.sexo"
                                class="form-control"
                                type="text"
                                name="sexo"
                                id=""
                            />
                            <label>Edad</label>
                            <input
                                v-model="alumno.edad"
                                class="form-control"
                                type="text"
                                name="edad"
                                id=""
                            />
                            <br>
                            <input type="button" value="Guardar" class="btn btn-success" v-on:click="save">
                            <input v-show="editmode" type="button" v-on:click="Update(alumno.id)" value="Actualizar" class="btn btn-info"> 

                            <!-- <input type="button" value="Guardar cambios" class="btn btn-warning" v-on:click="edit"> -->
                        </form>
                          <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Sexo</th>
                      <th>Edad</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(elemento) in lista" :key="elemento.id">
                      <td>{{elemento.nombre}}</td>
                      <td>{{elemento.apellidos}}</td>
                      <td>{{elemento.sexo}}</td>
                      <td>{{elemento.edad}}</td>
                      <td>
                        <button class="btn btn-danger" v-on:click="Borrar(elemento.id)">Borrar</button>
                         <button class="btn btn-danger" v-on:click="Editar(elemento.id)">Editar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
                       
        </div>

    </div>
</template>

<style>

.F{
    background-color: rgb(235, 50, 235);
    color: black;
}

.M{
    background-color: rgb(0, 174, 255);
    color: black;
    
}
</style>

<script>
export default {
    props: ["datos"],
    mounted() {
        this.lista = JSON.parse(this.datos);
    },
    data() {
        return {
            editmode:false,
            lista:{},
            alumno:{
                nombre:null,
                apellidos:null,
                sexo:null,
                edad:null,
                id:null
            },
            idx: null
        };
    },
    methods:{
        save:function(){
            let self = this;
            axios.post("/Insertar", this.alumno)
            .then(response =>{
                self.lista.push(response.data.alumno)
                // console.log(response.data.alumno)
            })
            .catch(error=>{
                console.log(error)
            })
        },
        loadPersonas(){ 
          axios.get("Two").then(({data})=>(
              this.lista=data
            //   console.log(this.lista)
              ));
        },
        Borrar:function(id){
            axios.get('/Two/borrar/'+id)
            .then(response =>{
               alert(response.data.message);
               this.loadPersonas();
                // console.log(response.data.alumno)
            })
            .catch(error=>{
                console.log(error)
            })
          
        },
        Update(id)
        {
              axios.post('/Two/editar/'+id,this.alumno)
            .then(response =>{
               alert(response.data.message);
               this.loadPersonas();
                // console.log(response.data.alumno)
            })
            .catch(error=>{
                console.log(error)
            })
        },
         Editar:function(id){
          this.lista.forEach(list => {
              if(id==list.id)
              {
                  this.alumno.nombre=list.nombre;
                  this.alumno.apellidos=list.apellidos;
                  this.alumno.sexo=list.sexo;
                  this.alumno.edad=list.edad;
                  this.alumno.id=list.id;
                  this.editmode=true;
              }
              
          });
          
        }
    }
};
</script>