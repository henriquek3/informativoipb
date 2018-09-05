@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/configuracoes/usuarios"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Usuários
            <div class="sub header" style="margin-left: -40px;">Visualize todos os usuários que estão cadastrados.</div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf @method("delete")
        </form>
        <form id="formResource" name="formResource" method="POST" action="{{url()->current()}}">
            @csrf @isset($resource) @method('put') @endisset
            <div class="ui form">
                <div class="fields">
                    <div class="eight wide field">
                        <label>Sínodo</label>
                        <div class="ui search" title="Digite o nome do sínodo" id="sinodo_search"
                             @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbitero->igreja->presbiterio->sinodo->sigla) ?? ''}}" @endisset>
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Sínodo" name="sinodo" required
                                       @isset($resource)  value="{{$resource->presbitero->igreja->presbiterio->sinodo->nome ?? ''}}" @endisset>
                                <input type="hidden" name="id_sinodo" value="{{$resource->id_sinodo ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="eight wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <div class="ui search" title="Digite o nome do presbitério" id="presbiterio_search"
                             @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbitero->igreja->presbiterio->sigla) ?? ''}}" @endisset>
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Presbitério" required
                                       name="presbiterio"
                                       @isset($resource)  value="{{$resource->presbitero->igreja->presbiterio->nome ?? ''}}" @endisset>
                                <input type="hidden" name="id_presbiterio" value="{{$resource->id_presbiterio ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="eight wide field" id="div_igreja">
                        <label>Igreja</label>
                        <select class="ui fluid search dropdown" name="id_igreja" required></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_igreja"></div>
                    </div>
                    <div class="eight wide field" id="div_presbitero">
                        <label>Presbítero</label>
                        <select class="ui fluid search dropdown" name="id_presbitero" required></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_presbitero"></div>
                    </div>
                </div>
                <div class="fields">
                    <div class="seven wide field required">
                        <label>Nome</label>
                        <input type="text" name="nome" value="{{$resource->nome ?? ''}}">
                    </div>
                    <div class="six wide field required">
                        <label>E-Mail</label>
                        <input type="email" name="email" value="{{$resource->email ?? ''}}">
                    </div>
                    <div class="three wide field required" id="fcpf">
                        <label>CPF</label>
                        <input type="text" name="cpf" value="{{$resource->cpf ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="five wide field">
                        <label for="sstatus">Status do Usuário</label>
                        <select class="ui fluid dropdown" name="status" id="sstatus">
                            <option></option>
                            <option value="1" @isset($resource) {{$resource->status == 1 ? ' selected' : ''}} @endisset>
                                Ativo
                            </option>
                            <option value="0" @isset($resource) {{$resource->status == 0 ? ' selected' : ''}} @endisset>
                                Inativo
                            </option>
                        </select>
                    </div>
                    <div class="five wide field">
                        <label for="snivel">Nível</label>
                        <select class="ui fluid dropdown" name="nivel" id="snivel">
                            <option></option>
                            <option value="0" @isset($resource) {{$resource->nivel == 0 ? ' selected' : ''}} @endisset>
                                Comum
                            </option>
                            <option value="1" @isset($resource) {{$resource->nivel == 1 ? ' selected' : ''}} @endisset>
                                Superior
                            </option>
                        </select>
                    </div>
                    <div class="six wide field">
                        <label for="sperfil">Perfil</label>
                        <select class="ui fluid dropdown" name="perfil" id="sperfil">
                            <option></option>
                            <option value="1" @isset($resource) {{$resource->perfil == 1 ? ' selected' : ''}} @endisset>
                                Secretário Igreja
                            </option>
                            <option value="2" @isset($resource) {{$resource->perfil == 2 ? ' selected' : ''}} @endisset>
                                Secretário Presbitério
                            </option>
                            <option value="3" @isset($resource) {{$resource->perfil == 3 ? ' selected' : ''}} @endisset>
                                Secretário Sínodo
                            </option>
                            <option value="4" @isset($resource) {{$resource->perfil == 4 ? ' selected' : ''}} @endisset>
                                Secretário Supremo
                            </option>
                            <option value="5" @isset($resource) {{$resource->perfil == 5 ? ' selected' : ''}} @endisset>
                                Supervisão Geral
                            </option>
                        </select>
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label>Observações</label>
                        <textarea rows="3" name="observacoes"> {{$resource->observacoes ?? ''}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui horizontal segments">
                    <div class="ui segment"><span
                                style="color: lightslategray;"><strong>Usuário:</strong></span><span
                                style="color: lightslategray;">&nbsp; {{ isset($resource) === true ? $resource->usuario->nome : ''}}
                            <span id="user_inc"></span>&nbsp;</span><span
                                style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp; {{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}
                            <span id="data_inc"></span></span></div>
                </div>
            </div>
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Salvar</button>
                <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                <button class="ui red right labeled icon button" type="submit" form="formDelete"
                        {{isset($resource) ? $resource->presbiterios->count() < 1 ? '' : ' disabled' : 'disabled'}}>
                    <i class="remove icon"></i>Excluir
                </button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/plugins/jquery.mask.min.js')}}" async></script>
    <script src="{{asset('js/plugins/CPF.js')}}" async></script>
    <script src="{{asset('js/app/usuarios.js')}}"></script>
    @isset($resource)
        <script type="text/javascript">
            window.addEventListener("load", function () {
                try {
                    //Function para o select IGREJA
                    window.id_igreja = '{{$resource->id_igreja}}';
                    window.id_presbitero = '{{$resource->id_presbitero}}';
                    $('[name="id_presbiterio"]').trigger('change');
                } catch (e) {
                    alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
                }
            });
        </script>
    @endisset
    @if(session('email'))
        <script type="text/javascript">
            swal("Atenção!", "O usuário foi cadastrado, porém não podemos enviar o e-mail com a confirmação da senha, " +
                "por favor, peça para o usuário acessar o link de recuperação de senha a partir da tela de login.!",
                "info");
        </script>
    @endif
@endsection