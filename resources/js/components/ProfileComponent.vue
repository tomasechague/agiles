<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> -->
                                    <img :src="'https://ui-avatars.com/api/?size=250&name='+ profile.user.name" alt="">
                                </div>
                                <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-success mt-4 btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Contactame
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#" @click="sendEmail()" :disabled="enviando == 1">Email</a>
                                    <a class="dropdown-item" :href="'https://wa.me/'+ profile.phone+'?text=Buenos dias '+ profile.user.name+', vi tu perfil en Steacher y deseo contactarme contigo'" target="_blank">Whatsapp</a>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                    <h5>{{ profile.user.name | capitalize }}</h5>
                                    <h6>{{ profile.lesson | capitalize }}</h6>
                                    <p>Ratings
                                        <a href="#"><i class="far fa-star"></i></a>
                                        <a href="#"><i class="far fa-star"></i></a>
                                        <a href="#"><i class="far fa-star"></i></a>
                                        <a href="#"><i class="far fa-star"></i></a>
                                        <a href="#"><i class="far fa-star"></i></a>
                                    </p>
                                </div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="personal-information-tab" data-toggle="tab" href="#personal-information" role="tab" aria-controls="personal-information" aria-selected="true">Datos Personales</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contacto</a>
                                  </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="personal-information" role="tabpanel" aria-labelledby="personal-information-tab">
                                      <div class="row">
                                        <div class="col-md-6 mt-2">Pais</div><div class="col-md-6">{{ profile.country | capitalize }}</div>
                                        <div class="col-md-6 mt-2">Provincia</div><div class="col-md-6">{{ profile.province | capitalize }}</div>
                                        <div class="col-md-6 mt-2">Codigo Postal</div><div class="col-md-6">{{ profile.postalCode }}</div>
                                        <div class="col-md-6 mt-2">Direccion</div><div class="col-md-6">{{ profile.address }}</div>
                                      </div>

                                  </div>
                                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                      <div class="col-md-6 mt-2">Email</div>
                                      <div class="col-md-6">{{ profile.user.email }}</div>
                                      <div class="col-md-6 mt-2">Linkedin</div>
                                      <div class="col-md-6">https://www.linkedin.com/in/{{ profile.user.name.replace(' ','-') }}</div>  
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <loading :active.sync="isLoading" 
        :can-cancel="true" 
        :on-cancel="onCancel"
        :is-full-page="fullPage"></loading>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        props:['profile'],
        data: function () {
            return {
              enviando : 0,
              isLoading: false,
              fullPage: true
            }
        },
         methods: {
          sendEmail(){
            let url = '/email';
            this.enviando = 1;
            this.isLoading = true;
            axios
            .post(url,{
                teacherName : this.profile.user.name,
                teacherEmail : this.profile.user.email
              })
            .then((response) => {
                this.isLoading = false
                this.$swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Su email ha sido enviado',
                    showConfirmButton: false,
                    timer: 1500
                  }
                )
            })
            .catch(e => {
              console.error(e);
              this.enviando = 0
              this.isLoading = false
            });
          },
          onCancel() {
            this.isLoading = false
              console.log('User cancelled the loader.')
            }
         },
        filters: {
          capitalize: function (value) {
            if (!value) return ''
            value = value.toString()
            return value.charAt(0).toUpperCase() + value.slice(1)
          }
        },
        components: {
            Loading
        },
    }
</script>
