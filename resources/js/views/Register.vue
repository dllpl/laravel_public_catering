<template>
    <header class="p-3 mb-3" style="background-color: #304156">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <router-link to="/" class="text-decoration-none text-light">Складской учет</router-link>
            </ul>
        </div>
    </header>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-sm-9 col-md-6 col-lg-6 col-xl-5 col-10">
            <h2 class="text-center mb-5">Регистрация</h2>
            <form @submit.prevent="register">
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-3 col-4 col-form-label text-end">Email</label>
                    <div class="col-sm-9 col-8">
                        <input type="email" class="form-control" aria-describedby="emailHelp" id="exampleInputEmail1"
                               v-model="email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputPassword1" class="col-sm-3 col-4 col-form-label text-end">Пароль</label>
                    <div class="col-sm-9 col-8">
                        <input type="password" class="form-control" id="exampleInputPassword1" v-model="password"
                               required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputPassword1" class="col-sm-3 col-4 col-form-label text-end">Повторите пароль</label>
                    <div class="col-sm-9 col-8">
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               v-model="password_confirmation" required>
                        <div class="row mt-3 align-items-center">
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary">Регистрация</button>
                            </div>
                            <div class="col-sm-9">
                                <router-link to="/login" class="text-decoration-none">Вход</router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-danger" v-if="error">{{ error_msg }}</div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import VueCookies from "vue-cookies";

export default {
    name: "Register",
    data() {
        return {
            email: '',
            password: '',
            password_confirmation: '',

            error: false,
            error_msg: ''
        }
    },
    watch: {
        password_confirmation(val) {
            if (val !== this.password) {
                this.error_msg = 'Пароли несовпадают'
                this.error = true
            } else {
                this.error = false
            }
        }
    },
    methods: {
        async register() {
            await axios.get('/sanctum/csrf-cookie')
            await axios.post(import.meta.env.VITE_API_URL + '/register', {
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then(({data}) => {
                VueCookies.set('_token', data.data.access_token, data.data.expires_in * 60)
                this.$router.push({name: 'Блюда'})
            }).catch(err => {
                this.error_msg = err.response.data.message
                this.error = true
            })
        }
    }
}
</script>

<style scoped>

</style>
