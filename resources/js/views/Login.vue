<template>
    <header class="p-3 mb-3" style="background-color: #304156">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <router-link to="/" class="text-decoration-none text-light">Складской учет</router-link>
            </ul>
        </div>
    </header>
    <div class="d-flex justify-content-center m-auto mt-5">
        <div class="col-sm-9 col-md-6 col-lg-6 col-xl-5 col-10">
            <h2 class="text-center mb-5">Авторизация</h2>
            <form @submit.prevent="login">
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-2 col-form-label text-end">Email</label>
                    <div class="col-sm-10 col-10">
                        <input type="email" class="form-control" aria-describedby="emailHelp" id="exampleInputEmail1"
                               v-model="email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-2 col-form-label text-end">Пароль</label>
                    <div class="col-sm-10 col-10">
                        <input type="password" class="form-control" id="exampleInputPassword1" v-model="password"
                               required>
                        <div class="row mt-3 align-items-center">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </div>
                            <div class="col-sm-10">
                                <router-link to="/register" class="text-decoration-none">Регистрация</router-link>
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
    name: "Login",
    data() {
        return {
            email: '',
            password: '',

            error: false,
            error_msg: ''
        }
    },
    methods: {
        async login() {
            await axios.get('/sanctum/csrf-cookie')
            await axios.post(import.meta.env.VITE_API_URL + '/login', {
                email: this.email,
                password: this.password
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

