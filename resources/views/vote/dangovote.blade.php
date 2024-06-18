<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LaravelとGoogle円グラフ</title>

    <!-- Scripts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/forum.css') }}" rel="stylesheet">

</head>
<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['dango name', 'number'],

            @php
                foreach ($dangos as $dango) {
                    echo "['" . $dango->dango . "', " . $dango->number . '],';
                }
            @endphp
        ]);

        var options = {
            title: '好きなお団子統計',
            is3D: true,

            // ラベル不要なとき
            // legend: 'none',

            // パイの中にラベルをつける
            // pieSliceText: 'label',

            // パイの中に数字と項目を両方入れる
            // legend: {
            // position: 'labeled'
            // },

            // ラベルを左側につける
            // legend: {
            // position: 'left'
            // },

            chartArea: {
                width: '70%',
                height: '70%',
                alignment: 'center',
            }
        };

        var chart_div = document.getElementById('chart_div');
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>

<body>

    <div class="container">
        好きなお団子に清き一票をいれてくださいね<br>
        LaravelとGoogle PieChartを使って作成しています。
    </div>

    <div class="container py-3">
        <div class="form-group box2  col-12 col-md-10 col-lg-10" style="width:800px;">
            <form method="post" action="{{ route('dango.vote') }}">
                @csrf
                @method('put')
                <div class="form-check">
                    <input name="dango" value="みたらし" type="radio">
                    <label class="form-check-label" for="みたらし">みたらし</label>
                </div>

                <div class="form-check">
                    <input name="dango" value="きなこ" type="radio">
                    <label class="form-check-label" for="きなこ">きなこ</label>
                </div>

                <div class="form-check">
                    <input name="dango" value="しょうゆ" type="radio">
                    <label class="form-check-label" for="しょうゆ">しょうゆ</label>
                </div>

                <div class="form-check">
                    <input name="dango" value="あんこ" type="radio">
                    <label class="form-check-label" for="あんこ">あんこ</label>
                </div>

                <div class="text-right">
                    <button type=”submit” class="btn btn-danger btn-primary">投票する</button>
                </div>

            </form>
        </div>

        <div id="chart_div" style="height:500px;width:800px;"></div>

    </div>

</body>

</html>
