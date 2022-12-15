import axios from "axios";
import VueCookies from "vue-cookies"

axios.interceptors.request.use((config) => {
    const token = VueCookies.get('_token')
    if (!token) {
        return config
    }
    config.headers["Authorization"] = `Bearer ${token}`
    return config
})

axios.interceptors.response.use(
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

export default axios
