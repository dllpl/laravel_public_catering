import {createRouter, createWebHistory} from 'vue-router'

import Home from "../views/Home.vue"
import Register from "../views/Register.vue"
import Login from "../views/Login.vue"
import Dishes from "../views/Managment/Dishes.vue";
import Categories from "../views/Managment/Categories.vue";

const routes = [
    {
        path: "/",
        name: "Главная",
        component: Home,
        meta: {
            isAuth: true,
        }
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: {
            isAuth: false,
        }
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {
            isAuth: false,
        }
    },
    {
        path: "/dishes",
        name: "Блюда",
        component: Dishes,
        meta: {
            breadCrumb() {
                return [
                    {
                        name: 'Главная',
                        path: '/'
                    },
                    {
                        name: 'Блюда',
                        path: '/dishes'
                    },

                ]
            },
            isAuth: true,
        },
    },
    {
        path: "/categories",
        name: "Категории",
        component: Categories,
        meta: {
            breadCrumb() {
                return [
                    {
                        name: 'Главная',
                        path: '/'
                    },
                    {
                        name: 'Категории',
                        path: '/category'
                    },

                ]
            },
            isAuth: true,
        },
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
