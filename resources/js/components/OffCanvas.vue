<template>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div v-if="type === 'dishes'">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel" v-if="add">Добавление блюда</h5>
                <h5 class="offcanvas-title" id="offcanvasRightLabel" v-else>Редактирование блюда</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form @submit.prevent="dishAction(add,update)">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Название позиции</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               v-model="dish.name" required>
                    </div>
                    <div class="d-flex mb-3 justify-content-between">
                        <div>
                            <label for="exampleInputPassword1" class="form-label">Цена</label>
                            <input type="number" class="w-75 form-control" id="exampleInputPassword1"
                                   v-model="dish.price" required placeholder="₽">
                        </div>
                        <div>
                            <label for="exampleInputPassword1" class="form-label">Колличество</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" v-model="dish.count"
                                   required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Категория</label>
                        <select class="form-select" aria-label="Default select example" v-model="dish.category_id"
                                required>
                            <option selected disabled>{{ dish.category }}</option>
                            <option v-for="category in categories" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" v-if="add">Сохранить</button>
                    <button type="submit" class="btn btn-primary" v-else>Обновить</button>
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">Отменить</button>
                </form>
                <button type="button" class="btn btn-danger mt-3" v-if="update" @click="dishDelete">Удалить</button>
            </div>
        </div>
        <div v-else-if="type === 'categories'">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel" v-if="add">Добавление категории</h5>
                <h5 class="offcanvas-title" id="offcanvasRightLabel" v-else>Редактирование категории</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form @submit.prevent="categoryAction(add,update)">
                    <div class="mb-3">
                        <div class="text-danger" v-if="error_msg">{{error_msg}}</div>
                        <label for="exampleInputEmail1" class="form-label">Название категории</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               v-model="category.name" required>
                    </div>
                    <button type="submit" class="btn btn-primary" v-if="add">Сохранить</button>
                    <button type="submit" class="btn btn-primary" v-else>Обновить</button>
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">Отменить</button>
                </form>
                <button type="button" class="btn btn-danger mt-3" v-if="update" @click="categoryDelete">Удалить</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "OffCanvas",
    props: {
        type: {
            type: Boolean,
            default: 'dishes'
        },
        dish_id: {
            type: Number,
            default: null
        },
        category_id: {
            type: Number,
            default: null
        },
        add: {
            type: Boolean,
            default: false
        },
        update: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            name: '',
            dish: {
                name: '',
                price: null,
                count: 1,
                category: 'Выберите категорию',
                category_id: null
            },
            category: {
                name: ''
            },
            categories: [],

            error_msg:'',
        }
    },
    methods: {
        dishAction(add, update) {
            if (add) {
                this.dishCreate()
            } else if (update) {
                this.dishUpdate()
            }
        },
        categoryAction(add, update) {
            if (add) {
                this.categoryCreate()
            } else if (update) {
                this.categoryUpdate()
            }
        },

        async dishCreate() {
            await axios.post(import.meta.env.VITE_API_URL + '/dish/create', {
                name: this.dish.name,
                price: this.dish.price,
                count: this.dish.count,
                category_id: this.dish.category_id
            }).then(({data}) => {
                window.location.href = '/dashboard/dishes'
            }).catch(err => {
                this.error_msg = err.response.data.message
            })
        },
        async dishUpdate() {
            await axios.post(import.meta.env.VITE_API_URL + '/dish/update', {
                id: this.dish_id,
                name: this.dish.name,
                price: this.dish.price,
                count: this.dish.count,
                category_id: this.dish.category_id
            }).then(({data}) => {
                window.location.href = '/dashboard/dishes'
            }).catch(err => {
                this.error_msg = err.response.data.message
            })
        },
        async dishDelete(){

            await axios.post(import.meta.env.VITE_API_URL + '/dish/delete', {
                id: this.dish_id,
            }).then(({data}) => {
                window.location.href = '/dashboard/dishes'
            }).catch(err => {
                this.error_msg = err.response.data.message
            })
        },

        async categoryCreate() {
            await axios.post(import.meta.env.VITE_API_URL + '/category/create', {
                name: this.category.name,
            }).then(({data}) => {
                window.location.href = '/dashboard/categories'
            }).catch(err => {
                this.error_msg = err.response.data.message
            })
        },
        async categoryUpdate() {
            await axios.post(import.meta.env.VITE_API_URL + '/category/update', {
                id: this.category_id,
                name: this.category.name,
            }).then(({data}) => {
                window.location.href = '/dashboard/categories'
            }).catch(err => {
                this.error_msg = err.response.data.message
            })
        },
        async categoryDelete(){
            await axios.post(import.meta.env.VITE_API_URL + '/category/delete', {
                id: this.category_id,
            }).then(({data}) => {
                window.location.href = '/dashboard/categories'
            }).catch(err => {
                this.error_msg = err.response.data.message
            })
        }
    },
    async mounted() {
        await axios.get(import.meta.env.VITE_API_URL + '/category/all')
            .then(({data}) => {
                this.categories = data.data
            })

    },
    watch: {
        dish_id(val) {
            axios.post(import.meta.env.VITE_API_URL + '/dish/show', {
                id: val
            }).then(({data}) => {
                this.dish.name = data.data.name
                this.dish.price = data.data.price
                this.dish.count = data.data.count
                this.dish.category = data.data.category.name
                this.dish.category_id = data.data.category.id
            })
        },
        category_id(val) {
            axios.post(import.meta.env.VITE_API_URL + '/category/show', {
                id: val
            }).then(({data}) => {
                this.category.name = data.data.name
            })
        }
    }
}
</script>

<style scoped>

</style>
