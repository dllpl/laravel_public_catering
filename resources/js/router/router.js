import {createRouter, createWebHistory} from 'vue-router'

import Home from "../views/Home.vue"
import Register from "../views/Register.vue"
import Login from "../views/Login.vue"
import Dishes from "../views/Managment/Dishes.vue";
import Categories from "../views/Managment/Categories.vue";
import VueCookies from "vue-cookies";

const routes = [
    {
        path:'/dashboard',
        name: 'Главная',
        component: Home,
        children: [
            {
                path: "dishes",
                name: "Блюда",
                component: Dishes,
                meta: {
                    breadCrumb() {
                        return [
                            {
                                name: 'Главная',
                                path: '/dashboard'
                            },
                            {
                                name: 'Блюда',
                                path: '/dishes'
                            },

                        ]
                    },
                },
            },
            {
                path: "categories",
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
                },
            }
        ],
        meta: {
            isAuth: true,
        }
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: {
            guest: true,
        }
    },
    {
        path: "/",
        name: "Login",
        component: Login,
        meta: {
            guest: true,
        }
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {
            guest: true,
        }
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach(async (to, from, next) => {

    const isAuth = VueCookies.get('_token')

    const requiredAuth = to.matched.some(record => record.meta.isAuth)
    const requiredGuest = to.matched.some(record => record.meta.guest)

    console.log(isAuth, requiredAuth, requiredGuest)
    if (requiredAuth && !isAuth) {
        next('/login')
    } else if (requiredGuest && isAuth) { //если юзер уже в системе и пытается получить доступ до роутов гостя
        next('/dashboard/categories')
    }
    next()
})

export default router
