<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 28/02/2017
 * Time: 12:14
 */
?>
<!-- corpo modais -->
<div class="ui first coupled modal">
    <div class="header">
        Cadastro de Sínodos
    </div>
    <div class="content">
        <div class="description">
            <div class="ui segment">
                <div class="ui form">
                    <div class="fields">
                        <div class="ui column grid computer only">
                            <i class="huge right green arrow icon" style="padding-top:25px"></i>
                        </div>
                        <div class="eight wide field">
                            <label>Sínodo</label>
                            <input type="text" value="Centro América">
                        </div>
                        <div class="four wide field">
                            <label>Sigla</label>
                            <input type="text" value="SNA">
                        </div>
                        <div class="four wide field">
                            <label>Região</label>
                            <select>
                                <option>Sul</option>
                                <option selected>Centro-Oeste</option>
                                <option>Nordeste</option>
                                <option>Norte</option>
                                <option>Sudeste</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui labeled icon button hidemodal"><i class="window close outline icon"></i>Cancelar</div>
        <div class="ui right labeled icon primary button"><i class="write icon"></i>Alterar</div>
    </div>
</div>
<div class="ui small second coupled modal">
    <div class="header">
        Resposta do Servidor
    </div>
    <div class="content">
        <div class="description">
            <p><i class="checkmark box icon"></i>Informações alteradas com sucesso!</p>
        </div>
    </div>
    <div class="actions">
        <div class="ui positive right labeled icon button">
            <i class="checkmark icon"></i>
            Sucesso!
        </div>
    </div>
</div>