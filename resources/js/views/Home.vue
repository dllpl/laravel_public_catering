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
import Breadcrumbs from "../components/Breadcrumbs.vue";
import Sidebar from "../components/Sidebar.vue";
import Header from "../components/Header.vue";


export default {
    name: "Home",
    components: {Breadcrumbs, Sidebar,Header}
}
</script>

<style scoped>

</style>
