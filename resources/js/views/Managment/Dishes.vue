<template>
    <div class="shadow p-3 mb-5 rounded">
        <button class="btn btn-primary">Добавить</button>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Сумма</th>
                <th scope="col">Колличество</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>1000</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Dishes"
}
</script>

<style scoped>

</style>
