<template>
    <Header/>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-12">
            <Sidebar/>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10 col-12">
            <Breadcrumbs/>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from "../components/Breadcrumbs.vue";
import Sidebar from "../components/Sidebar.vue";
import Header from "../components/Header.vue";


export default {
    name: "Home",
    components: {Breadcrumbs, Sidebar, Header},
    data() {
        return {
            isMobile: false,
        }
    }
}
</script>

<style scoped>

</style>
