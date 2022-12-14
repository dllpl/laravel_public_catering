<template>
    <div class="shadow p-3 rounded">
        <ul class="list-unstyled">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0"
                        data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Меню
                </button>
                <div class="collapse show" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Блюда</a></li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Категории</a>
                        </li>
                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reports</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>
</template>

<script>
export default {
    name: "Sidebar"
}
</script>

<style scoped>

</style>
