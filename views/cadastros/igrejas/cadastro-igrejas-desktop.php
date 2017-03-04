<!-- body desktop mode -->
<div class="ui segment">
    <!-- fieldset -->
    <h2 class="ui floated header">Cadastro de Igrejas</h2>
    <button class="ui compact right floated icon basic button" onclick='location.href="?home/home"'>
        <i class="remove icon"></i>
    </button>
    <div class="ui clearing divider"></div>
    <p></p>
    <div class="ui segment">
        <!-- Tabela -->
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Igrejas</a>
            <a class="item" data-tab="second">Cadastrar</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <table class="ui compact selectable celled green table">
                <thead>
                <tr>
                    <th class="ten wide">Nome</th>
                    <th class="two wide center aligned">Presbitério</th>
                    <th class="two wide center aligned">Sínodo</th>
                    <th class="two wide"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Presbiteriana Luz e Vida</td>
                    <td class="center aligned">PRON</td>
                    <td class="center aligned">SCA</td>
                    <td class="center aligned">
                        <button class="ui icon green button"><i class="edit icon"></i> Editar</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
            <div class="ui segment" style="height: 250px">
                <div class="ui form">
                    <div class="fields">
                        <div class="four wide field">
                            <label>Sinodo</label>
                            <select class="ui fluid search dropdown">
                                <option value=""></option>
                                <option>Sínodos</option>
                                <option>Sínodos</option>
                                <option>Sínodos</option>
                                <option>Sínodos</option>
                                <option>Sínodos</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>Presbitério</label>
                            <select class="ui fluid search dropdown">
                                <option value=""></option>
                                <option>Presbitério</option>
                                <option>Presbitério</option>
                                <option>Presbitério</option>
                                <option>Presbitério</option>
                                <option>Presbitério</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>Estados</label>
                            <select class="ui fluid search dropdown">
                                <option value=""></option>
                                <option>Estados</option>
                                <option>Estados</option>
                                <option>Estados</option>
                                <option>Estados</option>
                                <option>Estados</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>Cidades</label>
                            <select class="ui fluid search dropdown">
                                <option value=""></option>
                                <option value="1">Cidades</option>
                                <option value="1">Cidades</option>
                                <option value="1">Cidades</option>
                                <option value="1">Cidades</option>
                                <option value="1">Cidades</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Nome</label>
                            <input type="text" autofocus>
                        </div>
                        <div class="three wide field">
                            <label>CNPJ</label>
                            <input type="text">
                        </div>
                        <div class="two wide field">
                            <label>Complemento</label>
                            <input type="text">
                        </div>
                        <div class="two wide field">
                            <label>Data Organização</label>
                            <input type="date">
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: right; margin-top: 100px">
                <button class="ui labeled icon button" type="reset"><i class="erase icon"></i> Limpar
                </button>
                <button class="ui green right labeled icon button" type="submit"><i class="plus icon"></i>
                    Gravar
                </button>
            </div>
        </div>
    </div>
</div>