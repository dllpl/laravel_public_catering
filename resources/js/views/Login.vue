<template>
    <div class="w-25 m-auto mt-5">
        <h2>Вход</h2>
        <form @submit.prevent="login">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" id="exampleInputEmail1"
                       v-model="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" v-model="password" required>
            </div>
            <div class="text-danger" v-if="error">{{error_msg}}</div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
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

            error:false,
            error_msg:''
        }
    },
    methods: {
        async login() {
            await axios.get('/sanctum/csrf-cookie')
            await axios.post(import.meta.env.VITE_API_URL+'/login', {
                email: this.email,
                password: this.password
            }).then(({data})=> {
                console.log(data)
                VueCookies.set('_token', data.data.access_token, data.data.expires_in * 60)
                this.$router.push({name:'Главная'})
            }).catch(err => {
                this.error_msg = err.response.data.message
                this.error = true
            })
        }
    }
}
</script>

