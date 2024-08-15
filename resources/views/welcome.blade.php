<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Note Life - лучший инструмент финансовый инструмент в мире GTA 5 RP</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('build/assets/styles.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <meta name="yandex-verification" content="97dd009a02b03990" />
    </head>
    <body class="blue">
        <header>
            <div class="container cont-header"> 
                <div class="logo jost-weight">
                    <a href="" class="text-decoration-none text-white">NOTELIFE</a>
                </div>
                <div class="get-started jost-weight">
                    @auth
                    <a href="{{route('dashboard')}}" class="text-decoration-none text-white"><div class="loggedin-link">{{ Auth::user()->name }}</div></a>
                    @endauth
                    @guest
                    <a href="{{route('register')}}" class="text-decoration-none text-white"><div class="get-started-link">НАЧАТЬ</div></a>
                    @endguest
                    
                </div>
            </div>            
        </header> 
        <section class="container jost-weight section1">
            <h1 class="d-none">Калькулятор заработка GTA 5 RP</h1>
            <div class="text-center main-description">
                ЛУЧШИЙ ФИНАНСОВЫЙ ИНСТРУМЕНТ В МИРЕ GTA 5 RP
            </div>
            <div class="text-center second-description">
                ДОСТИГАЙТЕ УСПЕХА С НАМИ!
            </div>
            <a href="" class="text-decoration-none">
                <div class="mx-auto get-started-button">
                    НАЧАТЬ
                </div>
            </a>
            <div class="row">
                <ul class="first-list col">
                    <li>
                        Учёт доходов и расходов
                    </li>
                    <li>
                        Создание категорий
                    </li>
                    <li>
                        Просмотр статистики
                    </li>
                    <li>
                        Аналитика
                    </li>
                </ul>
                <ul class="first-list col">
                    <li>
                        Удобный интерфейс
                    </li>
                    <li>
                        Безопасность
                    </li>
                    <li>
                        Интерактивные инструменты
                    </li>
                    <li>
                        От фармил для фармил
                    </li>
                </ul>
            </div>
        </section>
        <section class="section2">
            <div class="container">
                <div class="text-center main-description">
                    ОТ ФАРМИЛ ДЛЯ ФАРМИЛ
                <div>
                <div class="text-center second-description mt-5">
                    Мы создали лучший инструмент для анализа своих расходов и доходов. Благодаря функционалу нашего сервиса, 
                    вы сможете удобно оптимизировать свои расходы и определять наиболее прибыльные инвестиции.
                </div>
                <div class="text-center main-description mt-5">
                    СОЗДАВАЙТЕ КАТЕГОРИИ
                <div>
                <div class="text-center second-description mt-5">
                Удобный инструмент создания категорий позволит легко анализировать доходы и расходы, собирать статистику за определённый период, а также максимально оптимизировать свой бизнес.
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
