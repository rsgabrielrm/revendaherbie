@extends('adminlte::page')

@section('title', 'Gráfico de Propostas')

@section('content_header')
    <h1>Gráfico de Propostas
    <a href="{{ route('propostas') }}" 
       class="btn btn-primary pull-right" role="button">Listagem</a>
    </h1>
@endsection

@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Propostas'],
          @foreach ($dados as $linha)
            {!! "['$linha->mes',$linha->total]," !!}
          @endforeach
          
        ]);

        var options = {
          title: 'Nº de proposta por mês',
          is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

@endsection