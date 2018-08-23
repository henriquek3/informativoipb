@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui segment"><a class="ui right floated blue tiny button" href="/cadastros/sinodos"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Sínodos
            <div class="sub header" style="margin-left: -40px;">Para cadastrar um sínodo informe o nome, sigla e a
                região.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf
            @method("delete")
        </form>
        <form id="formResource" name="formResource" method="POST" action="{{url()->current()}}">@csrf
            <div class="ui form">
                <div class="fields">
                    <div class="eight wide required field">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite o Nome" required="" maxlength="50">
                    </div>
                    <div class="three wide required field">
                        <label>Sigla</label>
                        <input type="text" name="sigla" placeholder="Digite a Sigla" required="" minlength="3"
                               maxlength="10">
                    </div>
                    <div class="six wide required field">
                        <label>Região</label>
                        <select class="ui search dropdown" name="regiao" required="">
                            <option value="">Região</option>
                            <option value="1">NORTE</option>
                            <option value="2">NORDESTE</option>
                            <option value="3">CENTRO-OESTE</option>
                            <option value="4">SUDESTE</option>
                            <option value="5">SUL</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui horizontal segments">
                    <div class="ui segment"><span
                                style="color: lightslategray;"><strong>Usuário:</strong></span><span
                                style="color: lightslategray;">&nbsp; {{ isset($resource) === true ? $resource->usuario_auditoria : ''}}
                            <span id="user_inc"></span>&nbsp;</span><span
                                style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp; {{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}
                            <span id="data_inc"></span></span></div>
                </div>
            </div>
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Gravar</button>
                <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                <button class="ui red right labeled icon button" type="submit" form="formDelete"><i
                            class="remove icon"></i>Excluir
                </button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" async>
        $(document).ready(function () {
        });
    </script>
    @isset($resource)
        <script type="text/javascript" async>
            try {
                var sinodo = JSON.parse('{!! $resource !!}');
                formResource.nome.value = sinodo.nome !== null ? sinodo.nome : '';
                formResource.sigla.value = sinodo.sigla !== null ? sinodo.sigla : '';
                formResource.regiao.value = sinodo.regiao !== null ? sinodo.regiao : '';
                $(formResource).append('<input type="hidden" name="_method" value="put">');
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @endisset
@endsection