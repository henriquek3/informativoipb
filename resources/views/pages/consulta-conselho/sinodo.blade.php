<div class="ui form">
    <div class="fields">
        <div class="eight wide field">
            <label>Sínodo</label>
            <input type="text" readonly="" value="{{auth()->user()->presbitero->igreja->presbiterio->sinodo->nome}}" :readonly="">

            <input type="hidden" name="id_sinodo" value="{{auth()->user()->presbitero->igreja->presbiterio->sinodo->id}}">
            {{--<div class="ui search" title="Digite o nome do sínodo" id="sinodo_search"
                 @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbitero->igreja->presbiterio->sinodo->sigla) ?? ''}}" @endisset>
                <div class="ui left icon input">
                    <input class="prompt" type="text" placeholder="Procurar Sínodo" name="sinodo"
                           @isset($resource)  value="{{$resource->presbitero->igreja->presbiterio->sinodo->nome ?? ''}}" @endisset>
                    <input type="hidden" name="id_sinodo" value="{{$resource->id_sinodo ?? ''}}">
                    <i class="search icon"></i>
                </div>
            </div>--}}
        </div>
        <div class="eight wide field" id="div_presbiterio">
            <label>Presbitério</label>
            <div class="ui search" title="Digite o nome do presbitério" id="presbiterio_search"
                 @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbitero->igreja->presbiterio->sigla) ?? ''}}" @endisset>
                <div class="ui left icon input">
                    <input class="prompt" type="text" placeholder="Procurar Presbitério"
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
            <select class="ui fluid search dropdown" name="id_igreja" ></select>
            <div class="ui active inline small loader" style="display:none" id="loader_igreja"></div>
        </div>
        <div class="eight wide field" id="div_presbitero">
            <label>Presbítero</label>
            <select class="ui fluid search dropdown" name="id_presbitero" ></select>
            <div class="ui active inline small loader" style="display:none" id="loader_presbitero"></div>
        </div>
    </div>
</div>