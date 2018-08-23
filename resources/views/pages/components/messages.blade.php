@if(session('saved'))
    <div class="ui icon success message">
        <i class="check icon"></i>
        <i class="close icon"></i>
        <div class="content">
            <div class="header">Sucesso!</div>
            <p>As informações foram salvas com sucesso!</p>
        </div>
    </div>
@elseif(session('updated'))
    <div class="ui icon success message">
        <i class="check icon"></i>
        <i class="close icon"></i>
        <div class="content">
            <div class="header">Sucesso!</div>
            <p>As informações foram atualizadas com sucesso!</p>
        </div>
    </div>
@elseif(session('deleted'))
    <div class="ui icon success message">
        <i class="check icon"></i>
        <i class="close icon"></i>
        <div class="content">
            <div class="header">Sucesso!</div>
            <p>As informações foram deletadas com sucesso!</p>
        </div>
    </div>
@elseif($errors->form->any()) {{--Mensagem de erro na validação do formRequest--}}
<div class="ui negative message"><i class="close icon"></i>
    <div class="header">Falha na validação dos campos!</div>
    <ul>
        @foreach($errors->form->all() as $error )
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@elseif($errors->any()) {{-- Primeira Mensagem de erro --}}
<div class="ui negative message"><i class="close icon"></i>
    <div class="header">Falhou!</div>
    <p>Houve algum problema com a solicitação efetuada, tente novamente ou procure o suporte!</p>
    <p>{{ $errors->first() }}</p>
</div>
@endif
{{--Javascript para fechar o div.message--}}
<script>
    window.addEventListener("load", function () {
        $('.message .close')
            .on('click', function () {
                $(this)
                    .closest('.message')
                    .transition('fade')
            })
    })
</script>