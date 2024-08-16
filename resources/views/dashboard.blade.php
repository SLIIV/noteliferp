@extends('layouts.navigation')

@section('content')
    <section class="container">
        <div class="main-description text-center">Панель управления</div>
        <!-- <div class="updates text-center">
            Версия 0.1.5 Добавлена главная страница, регистрация пользователей.
        </div> -->
        <ul
            class="nav nav-tabs justify-content-center pt-4 border-bottom-0 border-radius-0"
            id="navId"
            role="tablist">
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link active text-white rounded-0" data-bs-toggle="tab" aria-current="page">Главная</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tab2Id" class="nav-link text-white rounded-0" data-bs-toggle="tab">Категории</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tab3Id" class="nav-link text-white rounded-0" data-bs-toggle="tab">Статистика</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tab4Id" class="nav-link text-white rounded-0" data-bs-toggle="tab">Сессии</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tab5Id" class="nav-link text-white rounded-0" data-bs-toggle="tab">Профиль</a>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content pt-4" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                <div class="second-description text-start">Главная</div>
                <form action="{{route('dashboard.income.store')}}" method="post">
                    @csrf
                    <div class="row pt-3">
                        <div class="col-3">
                            <div class="mb-3">
                            <input type="hidden" name="user_id" value='{{ Auth::user()->id }}'>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="income"
                                    id="income"
                                    aria-describedby="helpId"
                                    placeholder="Доход или расход"
                                    oninput="CheckForMinus()"
                                />
                            </div>
                        </div>
                        <div class="col-2">
                                <div class="mb-3">
                                <select
                                    class="form-select form-select-md"
                                    name="category_id"
                                    id=""
                                >
                                    <option selected>Выберите категорию</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 fs-5">
                            Сегодня заработано: <span>{{$incomesToday}}$</span>
                        </div>
                        <div class="col-3 fs-5">
                            Всего заработано: <span>{{$allTimeIncomes}}$</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check pt-1">
                                <input class="form-check-input" type="checkbox" name="isIncome" id="checkbox1" checked/>
                                <label class="form-check-label" for=""> Доход </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Сохранить
                            </button>
                        </div>
                        
                    </div>

                    <div class="row pt-5">
                        <div class="col-5">
                            @foreach ($incomes as $income)
                            @if($income->isIncome)
                            <div class="alert alert-success" role="alert">
                            <strong>{{$categories->firstWhere('id', $income->category_id)->name}}: </strong> {{$income->income}}$
                            </div>
                            @else
                            <div
                                class="alert alert-danger"
                                role="alert"
                            >
                                <strong>{{$categories->firstWhere('id', $income->category_id)->name}}: </strong> {{$income->income}}$
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-5 ms-5">
                                <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="tab-pane fade" id="tab2Id" role="tabpanel">
                <div class="second-description text-start">Категории</div>
                <div class="row pt-3">
                    
                    <div class="col-3">
                    <form action="{{route('dashboard.category.store')}}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <input type="hidden" name="user_id" value='{{ Auth::user()->id }}'>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id=""
                                aria-describedby="helpId"
                                placeholder="Название категории"
                            />
                            
                        </div>
                    </div>
                    <div class="col-3">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Добавить
                        </button>
                        </form>
                    </div>
                    <div class="col-6">
                        <div class="second-description text-center">Добавленные категории</div>
                        @foreach ($categories as $category)
                        <div class="alert alert-primary mt-3 d-flex justify-content-between" role="alert">
                            {{$category->name}} 
                            <form action="{{route('dashboard.category.destroy', $category)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <!-- <button type="submit" class="bg-transparent border-0">
                                    <div class="remove">
                                        Удалить
                                    </div>
                                </button> -->
                            </form>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab3Id" role="tabpanel">
                <div class="second-description text-start">Статистика</div>
            </div>
            <div class="tab-pane fade" id="tab4Id" role="tabpanel">
                <div class="second-description text-start">Сессии</div>
            </div>
            <div class="tab-pane fade" id="tab5Id" role="tabpanel">
                <div class="second-description text-start">Профиль</div>
            </div>
        </div>
        
        <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
        <script>
            var triggerEl = document.querySelector("#navId a");
            bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
        </script>
        <script>
            const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: [new Date().getDate()-5, new Date().getDate()-4, new Date().getDate()-3, new Date().getDate()-2, new Date().getDate()-1, new Date().getDate()],
    datasets: [{
      label: 'Прибыль',
      data: ["{{$weekSums[0]}}", "{{$weekSums[1]}}", "{{$weekSums[2]}}", "{{$weekSums[3]}}", "{{$weekSums[4]}}", "{{$weekSums[5]}}"],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
        </script>
    </section>
@endsection
