<template>
    <div class="container-fluid">
    <Header/>
        <div class="row">
            <div class="col-2">
                <Sidebar/>
            </div>
            <div class="col-10">
                <Breadcrumbs/>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import Breadcrumbs from "./components/Breadcrumbs.vue";

export default {
    name: "App",
    components: {Breadcrumbs, Sidebar, Header}
}
</script>

<style scoped>

</style>
