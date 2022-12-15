<template>
    <div class="w-25 m-auto mt-5">
        <h2 class="text-center mb-5">Регистрация</h2>
        <form @submit.prevent="register">
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-3 col-form-label text-end">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" aria-describedby="emailHelp" id="exampleInputEmail1"
                           v-model="email" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputPassword1" class="col-sm-3 col-form-label text-end">Пароль</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="exampleInputPassword1" v-model="password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputPassword1" class="col-sm-3 col-form-label text-end">Повторите пароль</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="exampleInputPassword1" v-model="password_confirmation" required>
                    <div class="row mt-3 align-items-center">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Регистрация</button>
                        </div>
                        <div class="col-sm-8">
                            <router-link to="/login" class="text-decoration-none">Вход</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-danger" v-if="error">{{ error_msg }}</div>
        </form>
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
            password_confirmation:'',

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
