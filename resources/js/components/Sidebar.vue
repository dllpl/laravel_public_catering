<template>
    <div class="shadow p-3">
        <ul class="list-unstyled ps-0">
            <li class="mb-1 fs-5">
                <button class="btn btn-toggle align-items-center rounded fs-4" data-bs-toggle="collapse"
                        data-bs-target="#home-collapse" aria-expanded="true">
                    Меню
                </button>
                <div class="collapse show" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <router-link to="/dashboard/dishes" class="link-dark rounded">Блюда</router-link>
                        </li>
                        <li>
                            <router-link to="/dashboard/categories" class="link-dark rounded">Категории</router-link>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <ul class="list-unstyled ps-0">
            <li class="mb-1 fs-5">
                <button class="btn btn-toggle align-items-center rounded fs-4" data-bs-toggle="collapse"
                        data-bs-target="#second-collapse" aria-expanded="true">
                    Отчеты
                </button>
                <div class="collapse show" id="second-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <router-link to="/dashboard/totalCost" class="link-dark rounded">Стоимость блюд</router-link>
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
.btn-toggle {
    display: inline-flex;
    align-items: center;
    padding: .25rem .5rem;
    font-weight: 600;
    color: rgba(0, 0, 0, .65);
    background-color: transparent;
    border: 0;
}

.btn-toggle:hover,
.btn-toggle:focus {
    color: rgba(0, 0, 0, .85);
    background-color: #d2f4ea;
}

.btn-toggle::before {
    width: 1.25em;
    line-height: 0;
    content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
    transition: transform .35s ease;
    transform-origin: .5em 50%;
}

.btn-toggle[aria-expanded="true"] {
    color: rgba(0, 0, 0, .85);
}

.btn-toggle[aria-expanded="true"]::before {
    transform: rotate(90deg);
}

.btn-toggle-nav a {
    display: inline-flex;
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
    text-decoration: none;
}

.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
    background-color: #d2f4ea;
}
</style>
