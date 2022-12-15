<template>
    <div class="shadow p-3 mb-5">
        <div class="p-2 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight" @click="this.add = true; this.update = false">Добавить
            </button>
            <div class="d-flex justify-content-between">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                </form>
                <form class="d-flex" role="search">
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Категория</option>
                        <option value="1">One</option>
                    </select>
                </form>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #F5F7FA">
                <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Цена</th>
                </tr>
                </thead>
                <tbody v-if="items.length">
                <tr v-for="item in items" :key="item.id" @click="id = item.id; this.update = true; this.add = false" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight">
                    <td>{{ item.name }}</td>
                    <td>{{ item.category.name }}</td>
                    <td>{{ item.price }}&nbsp;₽</td>
                </tr>
                </tbody>
                <tfoot v-else>Нет данных, добавьте блюда</tfoot>
            </table>
        </div>
        <OffCanvas type="dishes" :add="add" :update="update" :dish_id="id"/>
    </div>
</template>

<script>
import axios from "../../plugins/axios";
import OffCanvas from "../../components/OffCanvas.vue";

export default {
    name: "Dishes",
    components: {
        OffCanvas
    },
    data() {
        return {
            items: [],
            open: false,
            id: null,
            add:false,
            update:false,
        }
    },
    mounted() {
        axios.get(import.meta.env.VITE_API_URL + '/dish/all').then(({data}) => {
            this.items = data.data
        }).catch(err => {
            console.log(err)
        })
    }
}
</script>

<style scoped>

</style>
