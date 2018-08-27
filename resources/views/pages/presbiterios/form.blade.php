@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/cadastros/presbiterios"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Presbitérios
            <div class="sub header" style="margin-left: -40px;">Visualize todos os presbitérios que estão
                cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf @method("delete")
        </form>
        <form id="formResource" name="formResource" action="{{ url()->current() }}" method="post">@csrf
            <div class="ui form">
                <div class="fields">
                    <div class="two wide field">
                        <label>Sigla</label>
                        <input type="text" value="{{$resource->sinodo->sigla ?? ''}}" name="sinodo_sigla" disabled>
                    </div>
                    <div class="fourteen wide required field">
                        <label>Sínodos</label>
                        <div class="ui search" title="Digite o nome do sínodo">
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar" name="sinodo" required
                                       value="{{$resource->sinodo->nome ?? ''}}">
                                <i class="search icon"></i>
                                <input type="hidden" name="id_sinodo" value="{{$resource->id_sinodo ?? ''}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="eight wide required field">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite o Nome"
                               value="{{old('nome', $resource->nome ?? '')}}" required>
                    </div>
                    <div class="three wide required field">
                        <label>Sigla</label>
                        <input type="text" name="sigla" placeholder="Digite a Sigla"
                               value="{{old('sigla', $resource->sigla ?? '')}}" required>
                    </div>
                    <div class="six wide required field">
                        <label>Região</label>
                        <select class="ui fluid dropdown" name="regiao" required>
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
                    <div class="ui segment">
                        <span style="color: lightslategray;">
                            <strong>Usuário inclusão:</strong>
                        </span>
                        <span style="color: lightslategray;">&nbsp;{{isset($resource) === true ? $resource->usuario->nome : ''}}</span>
                        <span style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp;{{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}</span>
                    </div>
                </div>
            </div>
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Gravar</button>
                <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                <button class="ui red right labeled icon button" type="submit"
                        form="formDelete" {{isset($resource) ? $resource->igrejas->count() < 1 ? '' : ' disabled' : 'disabled'}}>
                    <i class="remove icon"></i>Excluir
                </button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <!-- Page specific javascripts-->
    <script src="{{asset('js/app/cadastros-presbiterios.js')}}"></script>
    @isset($resource)
        <script>
            var data = @json($resource);
            formResource.regiao.value = data.regiao !== null ? data.regiao : '';
        </script>
    @endisset
@endsection