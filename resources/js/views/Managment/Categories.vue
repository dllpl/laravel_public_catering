<template>
    <div class="shadow p-3 mb-5 rounded">
        <button class="btn btn-primary">Добавить</button>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Categories"
}
</script>

<style scoped>
tr {
    cursor: pointer;
}
</style>
