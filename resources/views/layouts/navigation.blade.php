<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NOTELIFE - лучший калькулятор прибыли GTA 5 RP</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('build/assets/styles.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body class="blue">
        <header>
            <div class="container cont-header"> 
                <div class="logo jost-weight">
                    <a href="{{route('dashboard')}}" class="text-decoration-none text-white">NOTELIFE</a>
                </div>
                <div class="get-started jost-weight">
                    
                    @auth
                    <div class="dropdown">
                        <a class="text-decoration-none btn-secondary" href="#" role="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="loggedin-link">{{ Auth::user()->name }}</div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Панель управления</a></li>
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Настройки</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); this.closest('form').submit();">Выход</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    @endauth
                    @guest
                    <a href="" class="text-decoration-none text-white"><div class="get-started-link">НАЧАТЬ</div></a>
                    @endguest
                    
                </div>
            </div>            
        </header> 
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @yield('content')
    <footer>
        Это подвал. На данный момент он бесполезен, но скоро здесь что-то появится :)
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"> </script>
    <script src="{{asset('build/assets/main.js')}}"></script>
</body>

</html>