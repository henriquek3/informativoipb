@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/configuracoes/usuarios"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Reuniões do Presbitério
            <div class="sub header" style="margin-left: -40px;">Utilizado para apresentar o resultado de todos os
                relatórios do presbitério.
            </div>
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
                    <div class="two wide field">
                        <label>Ano</label>
                        <input type="text" value="{{Date('Y')}}" name="ano" readonly>
                    </div>
                    <div class="three wide field">
                        <label>Data da Reunião</label>
                        <input type="date" name="data_reuniao">
                    </div>
                    <div class="five wide field">
                        <label>Sínodo</label>
                        <input type="text" @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->sinodo->sigla . ' / ' . auth()->user()->pastor()->igreja->presbiterio->sinodo->nome}}" @endif readonly>
                    </div>
                    <div class="six wide field">
                        <label>Presbitério</label>
                        <input @if(!is_null(auth()->user()->pastor())) value="{{ auth()->user()->pastor()->igreja->presbiterio->sigla . ' / ' . auth()->user()->pastor()->igreja->presbiterio->nome}}"
                               @endif readonly>
                        <input type="hidden" name="id_presbiterio"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->id}}" @endif>
                    </div>
                </div>
                <div class="fields">
                    <div class="four wide field">
                        <label>Estado</label>
                        <select class="ui fluid search dropdown" name="id_estado" required>
                            <option value="">--</option>
                            @forelse($estados as $estado)
                                <option value="{{$estado->id}}" {{isset($resource) ? $estado->id == $resource->id_estado ? ' selected' : '' : ''}}>{{$estado->nome}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="six wide field" id="div_cidade">
                        <label>Cidade</label>
                        <select class="ui fluid search dropdown" name="id_cidade" id="id_cidade" required></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_cidade"></div>
                    </div>
                    <div class="six wide field">
                        <label>Local da Plenária</label>
                        <input type="text" name="local" placeholder="Local" required value="{{$resource->local ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label>Observações</label>
                        <textarea rows="3" name="observacoes"
                                  placeholder="Observações"> {{$resource->observacoes ?? ''}}</textarea>
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
    @include('pages.reunioes-presbiterio.relatorios.index')
@endsection
@section('javascript')
    <script src="{{asset('js/app/reuniao-presbiterio.js')}}"></script>
    @if(isset($resource))
        <script type="text/javascript" async>
            try {
                window.addEventListener("load", function () {


                })
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @endif
@endsection