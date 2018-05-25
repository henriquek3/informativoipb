<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Rotas API</title>
</head>
<body>
<script>
    var usuario = {!!(\App\User::with([
        'presbitero', 'presbitero.igreja', 'presbitero.igreja.presbiterio', 'presbitero.igreja.presbiterio.sinodo', 'presbitero.estado',
    ])->where('id',1)->get())!!}


    {{--@dd(\App\User::with('presbitero')->where('id',1)->get())--}}

</script>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>URL</th>
            <th>MÉTHODO</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resource as $rs)
            <tr>
                <td>{{$rs->uri}}</td>
                <td>{{$rs->methods[0]}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/teste.js"></script>
</body>
</html>