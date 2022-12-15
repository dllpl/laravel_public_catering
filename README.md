<h1>Laravel catering</h1>
<hr>
<p>Предисловие: задачка выполнялась  в крайней спешке, ввиду отсутствия у разработчика какого либо времени на доп. разработку из-за основной фулл-тайм работы. Некоторые детали упрощены и умышлено пропущены.<br> 
Было написано REST API, а также полноценное SPA приложение на стеке Laravel 9 + Vue 3. Документация по методам API сформирована автоматически средствами Postman. Проект развернут на домене разработчика, для теста. Проект имеет небольшие проблемы с мобильной адаптацией сайдбара - рекомендуется десктопная версия :)
</p>
<hr>

<h2>Документация API</h2>
<a href='https://documenter.getpostman.com/view/14700873/2s8YzWTLu3' target='_blank'>Ссылка</a>

<h2>Ссылка для теста</h2>
<a href='https://laravel.scordata.ru' target='_blank'>Ссылка</a>


<h2>Как развернуть проект?</h2>
<small>Степ-by-степ</small>
<ol>
    <li>
        git clone https://github.com/dllpl/laravel_public_catering.git
    </li>
    <li>
        composer install
    </li>
    <li>
        npm install
    </li>
    <li>
        cp .env.example .env
    </li>
    <li>
        php artisan key:generate
    </li>
    <li>
        Настройка БД
    </li>
    <li>
        php artisan serve
    </li>
    <li>
        npm run dev
    </li>
</ol>
