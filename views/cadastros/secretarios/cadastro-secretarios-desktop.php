<div class="ui segment">
    <!-- fieldset -->
    <h2 class="ui floated header">Cadastro de Secretários</h2>
    <button class="ui compact right floated icon basic button" onclick='location.href="?home/home"'>
        <i class="remove icon"></i>
    </button>
    <div class="ui clearing divider"></div>
    <p></p>
    <div class="ui segment">
        <!-- Tabela -->
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Secretários</a>
            <a class="item" data-tab="second">Cadastrar</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <table class="ui compact selectable celled green table">
                <thead>
                <tr>
                    <th class="seven wide">Nome</th>
                    <th class="five wide center aligned">Igreja</th>
                    <th class="two wide center aligned">Presbitério</th>
                    <th class="two wide"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jean Freitas</td>
                    <td class="center aligned">Presbiteriana Luz e Vida</td>
                    <td class="center aligned">PRON</td>
                    <td class="center aligned">
                        <button class="mini ui green button"><i class="edit icon"></i> Editar</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
            <div class="ui segment" style="/*height: 250px*/">
                <div class="ui form">
                    <div class="fields">
                        <div class="six wide field">
                            <label>Sínodo</label>
                            <select class="ui fluid search dropdown">
                                <option value=""></option>
                                <option>Sínodo</option>
                                <option>Sínodo</option>
                                <option>Sínodo</option>
                                <option>Sínodo</option>
                                <option>Sínodo</option>
                            </select>
                        </div>
                        <div class="six wide field">
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
                        <div class="six wide field">
                            <label>Igreja</label>
                            <select class="ui fluid search dropdown">
                                <option value=""></option>
                                <option>Igreja</option>
                                <option>Igreja</option>
                                <option>Igreja</option>
                                <option>Igreja</option>
                                <option>Igreja</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Nome</label>
                            <input type="text">
                        </div>
                        <div class="four wide field">
                            <label>Telefone</label>
                            <input type="tel">
                        </div>
                        <div class="four wide field">
                            <label>Celular</label>
                            <input type="tel">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="six wide field">
                            <label>Endereço</label>
                            <input type="text">
                        </div>
                        <div class="two wide field">
                            <label>Número</label>
                            <input type="text">
                        </div>
                        <div class="four wide field">
                            <label>Complemento</label>
                            <input type="text">
                        </div>
                        <div class="four wide field">
                            <label>Bairro</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="fields">
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
                                <option>Cidades</option>
                                <option>Cidades</option>
                                <option>Cidades</option>
                                <option>Cidades</option>
                                <option>Cidades</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>CEP</label>
                            <input type="text">
                        </div>
                        <div class="four wide field">
                            <label>Caixa Postal</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>E-mail</label>
                            <input type="email">
                        </div>
                        <div class="eight wide field">
                            <label>Website</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: right; /*margin-top: 100px*/">
                <button class="ui labeled icon button" type="reset"><i class="erase icon"></i> Limpar
                </button>
                <button class="ui green right labeled icon button" type="submit"><i class="plus icon"></i>
                    Gravar
                </button>
            </div>
        </div>
    </div>
</div>