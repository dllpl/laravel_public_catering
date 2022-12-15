<template>
    <div class="shadow p-3 mb-3 rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" v-for="item in breadCrumbs">
                    <router-link :to="item.path">{{ item.name }}</router-link>
                </li>
            </ol>
        </nav>
        <h2>{{$route.name}}</h2>
        <p>Текстовое описание раздела</p>
    </div>
</template>

<script>
export default {
    name: "Breadcrumbs",
    computed: {
        breadCrumbs() {
            if (typeof this.$route.meta.breadCrumb === "function") {
                return this.$route.meta.breadCrumb.call(this, this.$route);
            }
            return this.$route.meta.breadCrumb;
        },
    },
}
</script>

<style scoped>

</style>
