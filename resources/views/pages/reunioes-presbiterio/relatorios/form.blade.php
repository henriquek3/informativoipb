@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/configuracoes/usuarios"><i
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
            <tr>
                <td colspan="2">
                    <div class="ui styled fluid accordion">
                        <div class="title">
                            <i class="dropdown icon"></i>
                            What is a dog?
                        </div>
                        <div class="content">
                            <p class="transition hidden">A dog is a type of domesticated animal. Known for its loyalty
                                and
                                faithfulness, it can be found as a welcome guest in many households across the
                                world.</p>
                        </div>
                        <div class="title">
                            <i class="dropdown icon"></i>
                            What kinds of dogs are there?
                        </div>
                        <div class="content">
                            <p class="transition hidden">There are many breeds of dogs. Each breed varies in size and
                                temperament.
                                Owners often select a breed of dog that they find to be compatible with their own
                                lifestyle and
                                desires from a companion.</p>
                        </div>
                        <div class="title">
                            <i class="dropdown icon"></i>
                            How do you acquire a dog?
                        </div>
                        <div class="content">
                            <p class="transition hidden">Three common ways for a prospective owner to acquire a dog is
                                from pet
                                shops, private owners, or shelters.</p>
                            <p class="transition hidden">A pet shop may be the most convenient way to buy a dog. Buying
                                a dog from a
                                private owner allows you to assess the pedigree and upbringing of your dog before
                                choosing to take
                                it home. Lastly, finding your dog from a shelter, helps give a good home to a dog who
                                may not find
                                one so readily.</p>
                        </div>
                    </div>
                </td>
            </tr>
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