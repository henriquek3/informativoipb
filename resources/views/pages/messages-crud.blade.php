<div class="ui clearing"></div>
<!-- Mensagem caso o registro foi inserido-->@if(session('saved'))
    <div class="ui positive message"><i class="close icon"></i>
        <div class="header">Sucesso!</div>
        <p>Parabéns, o registro foi inserido com sucesso!</p>
    </div>
    <!-- Mensagem caso o registro foi atualizado-->@elseif(session('updated'))
    <div class="ui positive message"><i class="close icon"></i>
        <div class="header">Sucesso!</div>
        <p>Parabéns, o registro foi atualizado com sucesso!</p>
    </div>
    <!-- Mensagem caso o registro foi deletado-->@elseif(session('deleted'))
    <div class="ui positive message"><i class="close icon"></i>
        <div class="header">Sucesso!</div>
        <p>Parabéns, o registro foi apagado com sucesso!</p>
    </div>
    <!-- Mensagens de validação-->@elseif(session('needCompany'))
    <div class="ui warning message"><i class="close icon"></i>
        <div class="header">Atenção!</div>
        <p>Algumas informações estão incorretas, ajuste e tente novamente por favor!</p>
    </div>@endif
<!-- Mensagens de Erro por FormRequest-->@if($errors->form->any())
    <div class="ui negative message"><i class="close icon"></i>
        <div class="header">Falha na validação dos campos!</div>
        <ul>@foreach($errors->form->all() as $error )
                <li>{!! $error !!}</li>@endforeach
        </ul>
    </div>@endif
<!-- Mensagens de Erro-->@if($errors->any())
    <div class="ui negative message"><i class="close icon"></i>
        <div class="header">Falhou!</div>
        <p>Houve algum problema com a solicitação efetuada, tente novamente ou procure o suporte!</p>
        <p>{{ $errors->first() }}</p>
    </div>@endif