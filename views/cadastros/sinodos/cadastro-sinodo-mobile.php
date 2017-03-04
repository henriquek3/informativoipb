<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 27/02/2017
 * Time: 13:24
 */
?>
<div class="sixteen wide column">
    <!-- body -->
    <div class="ui segment">
        <!-- fieldset -->
        <h2 class="ui floated header">Cadastro de Sínodos</h2>
        <div class="ui clearing divider"></div>
        <p></p>
        <div class="ui segment">
            <!-- Tabela -->
            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Sínodos</a>
                <a class="item" data-tab="second">Cadastrar</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                <table class="ui compact unstackable selectable celled green table">
                    <thead>
                    <tr>
                        <th class="eleven wide">Nome</th>
                        <th class="two wide center aligned">Sigla</th>
                        <th class="one wide"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>John</td>
                        <td class="center aligned">No Action</td>
                        <td class="center aligned">
                            <button class="ui icon green button"><i class="edit icon"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="ui bottom attached tab segment" data-tab="second">
                <div class="ui segment" style="/*height: 250px */">
                    <div class="ui form">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nome</label>
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="four wide field">
                                <label>Sigla</label>
                                <input type="text" placeholder="Middle Name">
                            </div>
                            <div class="four wide field">
                                <label>Região</label>
                                <select class="ui fluid search dropdown">
                                    <option value=""></option>
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
                <div style="text-align: right; /* margin-top: 100px*/ ">
                    <button class="ui labeled icon button" type="reset"><i class="erase icon"></i> Limpar
                    </button>
                    <button class="ui green right labeled icon button" type="submit"><i class="plus icon"></i>
                        Gravar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>