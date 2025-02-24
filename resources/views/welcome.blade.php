<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Note Life - лучший калькулятор прибыли GTA 5 RP</title>

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
            <div
                class="alert alert-primary text-center mt-4"
                role="alert"
            >
                Сайт находится в разработке и не отражает финального результата
            </div>
            
            <a href="{{route('register')}}" class="text-decoration-none">
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
                    КАЛЬКУЛЯТОР ПРИБЫЛИ
                <div>
                <div class="row">
                    <div class="col-5">
                        <div class="text-start second-description mt-5">
                            Мы создали лучший калькулятор прибыли GTA 5 RP для анализа своих расходов и доходов. Благодаря функционалу нашего сервиса, 
                            вы сможете удобно оптимизировать свои расходы. А наша статистика поможет выбрать наиболее прибыльные инвестиции.
                        </div>
                    </div>
                    <div class="col-5 ms-auto pt-4">
                        <picture>
                            <img
                                src="{{asset('build/assets/images/main_left.png')}}"
                                class="img-fluid"
                            />
                        </picture>
                    </div>
                </div>
                
                <!-- <div class="text-center main-description mt-5">
                    СОЗДАВАЙТЕ КАТЕГОРИИ
                <div>
                <div class="text-center second-description mt-5">
                Удобный инструмент создания категорий позволит легко анализировать доходы и расходы, собирать статистику за определённый период, а также максимально оптимизировать свой бизнес.
                </div> -->
            </div>
        </section>
        <footer>
            <div>
                Это подвал. На данный момент он бесполезен, но скоро здесь что-то появится :)
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
