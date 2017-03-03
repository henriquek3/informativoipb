<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 27/02/2017
 * Time: 13:56
 */
?>
<!-- body desktop mode -->
<div class="ui segment">
    <!-- fieldset -->
    <h2 class="ui floated header">Cadastro de Sínodos</h2>
    <button class="ui compact right floated icon basic button" onclick='location.href="?home/home"'>
        <i class="remove icon"></i>
    </button>
    <div class="ui clearing divider"></div>
    <p></p>
    <div class="ui segment">
        <!-- Tabela -->
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Sínodos</a>
            <a class="item" data-tab="second">Cadastrar</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <table class="ui compact selectable celled green table">
                <thead>
                <tr>
                    <th class="eight wide">Nome</th>
                    <th class="two wide center aligned">Sigla</th>
                    <th class="four wide center aligned">Região</th>
                    <th class="two wide"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Centro América</td>
                    <td class="center aligned">SNA</td>
                    <td class="center aligned">Centro-Oeste</td>
                    <td class="center aligned">
                        <button class="mini ui green button"><i class="edit icon"></i> Editar</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
            <div class="ui segment" style="height: 250px">
                <div class="ui form">
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Nome</label>
                            <input type="text" autofocus>
                        </div>
                        <div class="two wide field">
                            <label>Sigla</label>
                            <input type="text">
                        </div>
                        <div class="four wide field">
                            <label>Região</label>
                            <select>
                                <option selected>- escolha -</option>
                                <option>Sul</option>
                                <option>Centro-Oeste</option>
                                <option>Nordeste</option>
                                <option>Norte</option>
                                <option>Sudeste</option>
                            </select>
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