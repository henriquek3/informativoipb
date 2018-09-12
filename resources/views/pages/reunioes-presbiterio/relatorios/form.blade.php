@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button"
                                      href="/reunioes/presbiterio/{{\Request::route('id')}}/editar"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Relatório das Igrejas
            <div class="sub header" style="margin-left: -40px;">Relatório das Igrejas.</div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <table class="ui very basic table">
            <tbody>
            @forelse($resources as $rs)
                <tr>
                    <td colspan="2">
                        <div class="ui styled fluid accordion">
                            <div class="title">
                                <i class="dropdown icon"></i>
                                {{mb_strtoupper($rs->nome, 'utf-8')}}
                            </div>
                            <div class="content">
                                <p class="transition hidden">
                                    A dog is a type of domesticated animal. Known for its loyalty and
                                    faithfulness, it can be found as a welcome guest in many households across the
                                    world.</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th colspan="2">
                    <div class="ui right floated pagination menu"> {{$resources->links('pagination::semantic-ui')}}
                        &nbsp;
                    </div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('javascript')
    {{--<script src="{{asset('js/app/cadastros-presbiteros.js')}}"></script>--}}
    <script type="text/javascript">
        try {
            window.addEventListener("load", function () {
                $('.ui.styled').accordion();
            })
        } catch (e) {
            alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
        }
    </script>
    @if(isset($resource))
        <script type="text/javascript">
            try {
                window.addEventListener("load", function () {

                })
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @endif
@endsection