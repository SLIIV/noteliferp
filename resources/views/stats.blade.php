@extends('layouts.navigation')

@section('content')

    <section class="container">
        <div class="main-description text-center">Панель управления</div>
        <div class="updates text-center">   
            Статистика сейчас в разработке. Доступен лишь минимальный функционал.
        </div> 
        <ul
            class="nav nav-tabs justify-content-center pt-4 border-bottom-0 border-radius-0"
            id="navId"
            role="tablist">
            <li class="nav-item">
                <a href="" class="nav-link text-white rounded-0">Главная</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="" class="nav-link text-white rounded-0" >Категории</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="" class="nav-link active text-white rounded-0" >Статистика</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="" class="nav-link text-white rounded-0">Сессии</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="" class="nav-link text-white rounded-0">Профиль</a>
            </li>
        </ul>
        
        <div class="text-start pt-5">
            <h2>Статистика</h2>
            <div class="row">
                <div class="col-5 dates">
                    <h3 class="pt-2">Общая статистика</h3>
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                        <form>
                            <input type="hidden" id="mainStatsDateStart" name="mainStatsDateStart" value="">
                            <input type="hidden" id="mainStatsDateEnd" name="mainStatsDateEnd" value="">
                        </form>
                    </div>

                    <script type="text/javascript">
                    $(function() {

                        var start = moment().subtract(29, 'days');
                        var end = moment();

                        function cb(start, end) {
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                            $('#mainStatsDateStart').val(start.format('DD/MM/YYYY'));
                            $('#mainStatsDateEnd').val(end.format('DD/MM/YYYY'));
                        }

                        $('#reportrange').daterangepicker({
                            startDate: start,
                            endDate: end,
                            ranges: {
                            'Сегодня': [moment(), moment()],
                            'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Последние 7 дней': [moment().subtract(6, 'days'), moment()],
                            'Последние 30 дней': [moment().subtract(29, 'days'), moment()],
                            'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
                            'Прошлый месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            "locale": {
                                "format": "DD/MM/YYYY",
                                "separator": " - ",
                                "applyLabel": "Применить",
                                "cancelLabel": "Отмена",
                                "fromLabel": "От",
                                "toLabel": "До",
                                "customRangeLabel": "Выбрать период",
                                "weekLabel": "W",
                                "daysOfWeek": [
                                    "Вс",
                                    "Пн",
                                    "Вт",
                                    "Ср",
                                    "Чт",
                                    "Пт",
                                    "Сб"
                                ],
                                "monthNames": [
                                    "Январь",
                                    "Февраль",
                                    "Март",
                                    "Апрель",
                                    "Май",
                                    "Июнь",
                                    "Июль",
                                    "Август",
                                    "Сентябрь",
                                    "Октябрь",
                                    "Ноябрь",
                                    "Декабрь"
                                ],
                                "firstDay": 1
                            },
                        }, cb);

                        cb(start, end);

                    });
                    </script>
                    <div id="mainChart">
                        Заработно всего:
                    </div>
                    <div>
                        Лучший день по прибыли:
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <h3 class="pt-2">Статистика по категориям</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">Категории:</label>
                        <form>
                        <select
                        multiple
                            class="form-select form-select-lg"
                            name="categoryId"
                            id="categoryId"
                        >
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                        </form>
                    </div>
                </div>
                <div class="col-5">
                    <div id="txt">
                        ...
                    </div>
                </div>
            </div>
            <script>
                $('#categoryId').on('change', function(event) {
                    let categoryId = $("#categoryId").val();
                    $.ajax({
                        url: "{{route('categoryStats')}}",
                        type: "GET",
                        data: {
                            "_token": "{{csrf_token()}}",
                             "categoryId":categoryId,
                        },
                        success:function(response) {
                            $("#txt").html(response);
                        },
                    });
                });
                
            </script>
            <script>
            const ctx = document.getElementById('mainChart');

            new Chart(ctx, {
            type: 'line',
            data: {
                labels: [new Date().getDate()-5, new Date().getDate()-4, new Date().getDate()-3, new Date().getDate()-2, new Date().getDate()-1, new Date().getDate()],
                datasets: [{
                label: 'Прибыль',
                data: [],
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
        </div>
        
    </section>
@endsection
