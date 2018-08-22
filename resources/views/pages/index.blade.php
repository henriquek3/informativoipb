@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui container">
        <div class="ui one column stackable grid">
            <div class="eight wide column">
                <div class="ui green segment">
                    <h3 class="ui header">Frequência dos Membros</h3>
                    <p></p>
                    <canvas id="lineChartDemo"></canvas>
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui green segment">
                    <h3 class="ui header">Arrecadação Dizímos</h3>
                    <p></p>
                    <canvas id="barChartDemo"></canvas>
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui green segment">
                    <h3 class="ui header">Batismos X Discipulados</h3>
                    <p></p>
                    <canvas id="radarChartDemo"></canvas>
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui green segment">
                    <h3 class="ui header">Despesas Instituição</h3>
                    <p></p>
                    <canvas id="polarChartDemo"></canvas>
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui green segment">
                    <h3 class="ui header">Folha de Pagamento Ministros</h3>
                    <p></p>
                    <canvas id="doughnutChartDemo"></canvas>
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui green segment">
                    <h3 class="ui header">Membros por Presbitérios</h3>
                    <p></p>
                    <canvas id="pieChartDemo"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Page specific javascripts-->
@section('javascript')
    <script>
        window.username = '{{auth()->user()->nome}}';
    </script>
    <script src="{{asset('js/app/index.js')}}"></script>
    @if(session('welcome'))
        <script>
            iziToast.info({
                title: 'Olá',
                message: 'Seja bem vindo ' + username,
                timeout: 10000,
                pauseOnHover: true,
                position: 'topRight',
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp'
            });
        </script>
    @endif
@endsection