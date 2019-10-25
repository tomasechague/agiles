<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Busqueda de Profesores</div>
                    <div class="card-body">
                        <form>
                          <div class="form-group">
                            <label for="lessonInput">Materia</label>
                            <input type="email" class="form-control" id="lessonInput" aria-describedby="materia" placeholder="Ingrese la materia que desea buscar" v-model="lesson">
                          </div>
                          <div class="form-group">
                            <label for="postalcode">Codigo Postal</label>
                            <input type="number" class="form-control" id="postalcode" placeholder="Ingrese el codigo postal donde desea buscar" v-model="postalcode">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Profesores</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="teacher in teachers">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <img src="http://lorempixel.com/200/150/user" alt="" class="img-rounded img-responsive" />
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <h4>{{ teacher.user.name }}</h4>
                                    <small>
                                        <cite>{{ teacher.address +', '+ teacher.country }}
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                        </cite>
                                    </small>
                                    <p>
                                        <i class="glyphicon glyphicon-envelope"></i>{{ teacher.user.email }}
                                        <br />
                                        <i class="glyphicon glyphicon-globe"></i>Materia: {{ teacher.lesson }}
                                        <br />
                                        <i class="glyphicon glyphicon-globe"></i><a href="">
                                            https://www.linkedin.com/in/{{ teacher.user.name.replace(' ','-') }}
                                        </a> 
                                    </p>
                                    <div class="btn-group">
                                        <a :href="'perfil/'+teacher.id" class="btn btn-primary">Ver Perfil</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <google-map :teachers="teachers"/>
            </div>
        </div>
    </div>
</template>

<script>
    import GoogleMap from "./GoogleMap";
    export default {
        data: function () {
            return {
                lesson: '',
                postalcode: '',
                teachers:{}
            }
        },
        methods: {
            teachersSearch(){
                let url = 'api/teachers/search/'+this.lesson+'/'+this.postalcode
                if(!this.lesson | !this.postalcode){
                    this.teachers = ''
                    return
                }
                axios
                .get(url)
                .then(({data}) => {
                    this.teachers = data;
                })
                .catch(e => {
                  console.error(e);
                });
            }
        },
        watch:{
            lesson(value){
                this.teachersSearch()
            },
            postalcode(value){
                this.teachersSearch()
            }
        },
        components: {
            GoogleMap
        }
    }
</script>
