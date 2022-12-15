<template>
    <header class="p-3 bg-primary mb-3 rounded-bottom">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <router-link to="/" class="text-decoration-none text-light">Складской учет</router-link>
                </ul>
                <div class="dropdown text-end ">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>email</span>
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" @click="logout">Выйти</a></li>
                    </ul>
                </div>
            </div>
    </header>
</template>

<script>
export default {
    name: "Header",
    methods: {
        logout() {

        }
    }
}
</script>

<style scoped>

</style>
