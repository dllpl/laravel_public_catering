<template>
    <header class="p-3 mb-3" style="background-color: #304156">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <router-link to="/" class="text-decoration-none text-light">Складской учет</router-link>
                </ul>
                <div v-if="email" class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>{{email}}</span>
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" @click="logout" style="cursor: pointer">Выйти</a></li>
                    </ul>
                </div>
            </div>
    </header>
</template>

<script>
import axios from "axios";
import VueCookies from "vue-cookies";

export default {
    name: "Header",
    data() {
        return {
            email: '',
        }
    },
    methods: {
        async logout() {
            await axios.post(import.meta.env.VITE_API_URL + '/logout').then(() => {
                VueCookies.remove('_token')
                this.$router.push({name: 'Login'})
                this.email = ''
            }).catch(err => {
                console.log(err)
                this.error_msg = err.response.data.message
                this.error = true
            })
        }
    },
    mounted() {
        if (VueCookies.get('_token')) {
            axios.get(import.meta.env.VITE_API_URL + '/user').then(({data})=>{
                console.log(data)
                this.email = data.email
            })
        }
    }
}
</script>

<style scoped>

</style>
