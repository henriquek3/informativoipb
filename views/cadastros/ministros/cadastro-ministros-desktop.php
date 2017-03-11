<div class="ui segment">
    <!-- fieldset -->
    <h2 class="ui floated header">Cadastro de Ministros</h2>
    <button class="ui compact right floated icon basic button" onclick='location.href="?home/home"'>
        <i class="remove icon"></i>
    </button>
    <div class="ui clearing divider"></div>
    <p></p>
    <div class="ui segment">
        <!-- Tabela -->
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Ministros</a>
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
                    <div class="inline fields">
                        <div class="two wide field"><label>Nome</label></div>
                        <div class="fourteen wide field"><input type="text"></div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field">
                            <label>Data de Nascimento</label>
                        </div>
                        <div class="three wide field">
                            <input type="date">
                        </div>
                        <div class="one wide field">
                            <label>Estado</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown">
                                <option>Selecione o Estado</option>
                            </select>
                        </div>
                        <div class="one wide field">
                            <label>Cidade</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown">
                                <option>Selecione a Cidade</option>
                            </select></div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field"><label>RG</label></div>
                        <div class="two wide field"><input type="text"></div>
                        <div class="two wide field"><label>Orgão Emissor</label></div>
                        <div class="two wide field"><input type="text"></div>
                        <div class="one wide field"><label>CPF</label></div>
                        <div class="three wide field"><input type="number"></div>
                        <div class="two wide field"><label>Estado Civil</label></div>
                        <div class="two wide field"><select>
                                <option>Solteiro</option>
                                <option>Casado</option>
                                <option>Viúvo</option>
                            </select></div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="inline fields">
                        <div class="two wide field">
                            <label>Cônjuge</label>
                        </div>
                        <div class="six wide field">
                            <input type="text">
                        </div>
                        <div class="two wide field">
                            <label>Data de Nascimento</label>
                        </div>
                        <div class="two wide field">
                            <input type="number">
                        </div>
                        <div class="two wide field"><label>N&deg; de Dependentes</label></div>
                        <div class="two wide field"><input type="text"></div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field"><label>Nome dos Filhos</label></div>
                        <div class="fourteen wide field"><input type="text" placeholder="Separe cada nome por ;"></div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field">
                            <label>Filiação</label>
                        </div>
                        <div class="seven wide field">
                            <input type="text" placeholder=" Filiação Materna">
                        </div>
                        <!--
                        <div class="field" style="-webkit-margin-start: 10px; -webkit-margin-end: 15px">
                            <label>e</label>
                        </div>
                        -->
                        <div class="seven wide field">
                            <input type="text" placeholder=" Filiação Paterna">
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="inline fields">
                        <div class="two wide field"><label>Endereço</label></div>
                        <div class="four wide field"><input type="text"></div>
                        <div class="one wide field"><label>Número</label></div>
                        <div class="two wide field"><input type="text"></div>
                        <div class="two wide field"><label>Complemento</label></div>
                        <div class="five wide field"><input type="text"></div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field"><label>Bairro</label></div>
                        <div class="three wide field"><input type="text"></div>
                        <div class="one wide field"><label>Estado</label></div>
                        <div class="three wide field"><select>
                                <option>Selecione o Estado</option>
                            </select></div>
                        <div class="one wide field"><label>Cidade</label></div>
                        <div class="three wide field"><select>
                                <option>Selecione a Cidade</option>
                            </select></div>
                        <div class="one wide field"><label>CEP</label></div>
                        <div class="two wide field"><input type="text"></div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field"><label>Telefone - Residencial</label></div>
                        <div class="two wide field"><input type="text"></div>
                        <div class="two wide field"><label>Telefone - Igreja</label></div>
                        <div class="two wide field"><input type="text"></div>
                        <div class="one wide field"><label>E-mail</label></div>
                        <div class="seven wide field"><input type="text"></div>
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