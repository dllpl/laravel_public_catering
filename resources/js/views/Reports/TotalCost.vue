<template>
    <div class="shadow p-3 mb-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Общая стоимость всех блюд</h5>
                        <p class="card-text h2">{{sum}}&nbsp;₽</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "TotalCost",
    data() {
        return {
            sum:''
        }
    },
    mounted() {
        axios.get(import.meta.env.VITE_API_URL + '/report/totalCost')
            .then(({data})=> {
                this.sum = data.data
            })
    }
}
</script>

<style scoped>

</style>
