import axios from "axios";
import VueCookies from "vue-cookies"

const interceptor = axios.create({})

interceptor.interceptors.request.use((config) => {
    const token = VueCookies.get('_token')
    if (!token) {
        return config
    }
    config.headers.common["Authorization"] = `Bearer ${token}`
    return config
})

interceptor.interceptors.response.use(
    (response) => {
        return response
    },
    async (error) => {
        if (error.response
            && error.response.status === 401
        ) {
            window.location.href = "/login"
        } else {
            return Promise.reject(error)
        }
    }
)

export default interceptor
