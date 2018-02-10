"use strict";

$(document).ready(function () {
    var link_avatar = void 0,
        name = void 0,
        email = void 0,
        login = void 0,
        password = void 0,
        id = void 0;

    link_avatar = sessionStorage.getItem("bGlua19hdmF0YXI=");
    link_avatar = atob(link_avatar);
    usuarios_criar_usuario.link_avatar.value = link_avatar;

    name = sessionStorage.getItem("c2Vzc2lvbi1uYW1l");
    name = atob(name);
    usuarios_criar_usuario.nome.value = name;

    email = sessionStorage.getItem("c2Vzc2lvbi1lbWFpbA==");
    email = atob(email);
    usuarios_criar_usuario.email.value = email;

    login = sessionStorage.getItem("c2Vzc2lvbi1sb2dpbg==");
    login = atob(login);
    usuarios_criar_usuario.login.value = login;

    password = sessionStorage.getItem("c2Vzc2lvbi1wYXNzd29yZA==");
    password = atob(password);
    usuarios_criar_usuario.password.value = password;

    id = sessionStorage.getItem("c2Vzc2lvbi1pZA==");
    id = atob(id);

    $("#usuarios_criar_usuario").validate({
        invalidHandler: function invalidHandler() {
            setTimeout(function () {
                $('#usuarios_criar_usuario input.error').parent().addClass('has-error');
                $('#usuarios_criar_usuario input.valid').parent().removeClass('has-error').addClass('has-success');
            }, 300);
        },
        submitHandler: function submitHandler() {
            var form = $("#usuarios_criar_usuario").serializeArray();
            form.unshift({name: 'id', value: id});
            $.post('api/usuarios/update', form).done(function (response) {
                if (response.length > 0) {
                    var _login = response[0].login;
                    var _password = response[0].password;
                    var nome = response[0].nome;
                    var _email = response[0].email;
                    var _link_avatar = response[0].link_avatar;
                    sessionStorage.setItem(btoa("session-login"), btoa(_login));
                    sessionStorage.setItem(btoa("session-password"), btoa(_password));
                    sessionStorage.setItem(btoa("session-name"), btoa(nome));
                    sessionStorage.setItem(btoa("session-email"), btoa(_email));
                    sessionStorage.setItem(btoa("link_avatar"), btoa(_link_avatar));
                }
                $.notify({
                    title: "Status OK!<br/>",
                    message: 'Registro editado com sucesso!',
                    icon: 'fa fa-check'
                }, {
                    type: "success"
                });
            }).fail(function (response) {
                $.notify({
                    title: 'Operação não efetuada.<br/>',
                    message: 'Erro: ' + response.status + ', ' + response.statusText
                }, {
                    type: "danger",
                    delay: 10000
                });
            });
        },
        rules: {
            login: {
                required: true,
                minlength: 4,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 255
            },
            nome: {
                required: true,
                minlength: 4,
                maxlength: 255
            },
            email: {
                required: true
            },
            link_avatar: {
                required: true,
                maxlength: 500,
                minlength: 10
            }
        }
    });
});
//# sourceMappingURL=page-user-app.js.map
