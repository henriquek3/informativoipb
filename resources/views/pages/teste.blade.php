<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    @foreach($testes as $t)
        <li>
            {{$t}}
        </li>
    @endforeach
</ul>
<form name="sucesso">
    @csrf
    <div>
        <label>Nome</label>
        <input type="text" name="nome">
    </div>
    <div>
        <label>email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label>CPF</label>
        <input type="number" name="cpf">
    </div>
    <div>
        <label>Observações</label>
        <input type="text" name="observacoes">
    </div>
    <button type="submit">Gravar</button>
    <button type="reset">Clean</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(sucesso).on("submit", function () {
        let form = $(sucesso).serializeArray();
        $.post('{{ url()->current() }}', form)
            .done(function (r) {
                console.log(r)
            })
            .fail(function (r) {
                console.log(r)
            })
        ;
        console.log(form);
        return false;
    });


            @if(@isset($testes))
    let data = {!! $testes !!};
    $(document).ready(function () {
        $(sucesso).append('<input type="hidden" name="_method" value="put">');
    });
    console.log(data);
    document.sucesso.nome.value = data[0].nome;
    document.sucesso.email.value = data[0].email;
    document.sucesso.cpf.value = data[0].cpf;
    document.sucesso.password.value = data[0].password;
    document.sucesso.observacoes.value = data[0].observacoes;
    @endif
</script>
</body>
</html>