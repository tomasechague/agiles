<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Profesores</div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['lesson','postalcode'],
        data: function () {
            return {
                lesson: '',
                teachers: 0
            }
        },
        methods: {
            teachersSearch(){
                let url = 'api/teachers/search/'+this.lesson+'/'+this.postalcode
                axios
                .get(url)
                .then(({data}) => {
                    console.log(data);
                    this.teachers = data;
                })
                .catch(e => {
                  console.error(e);
                });
            }
        },
        computed:{
            codeAndLesson(){
                return this.lesson && this.postalcode
            }
        },
        watch:{
            codeAndLesson(value){
                if(value){
                    this.teachersSearch()
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
