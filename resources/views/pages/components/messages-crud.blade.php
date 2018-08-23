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
@endif

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