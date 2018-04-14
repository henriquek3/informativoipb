$(document)
    .ready(function () {
        $('.ui.form')
            .form({
                fields: {
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor, insira o seu e-mail'
                            },
                            {
                                type: 'email',
                                prompt: 'Por favor, insira uma conta de e-mail válida'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor, entre com sua senha'
                            },
                            {
                                type: 'length[6]',
                                prompt: 'Sua senha deve ter mais que 6 caracteres'
                            }
                        ]
                    }
                },
                onSuccess: function () {
                    let form = $(form_login).serializeArray();
                    $.post('/api/connect', form)
                        .done(function (response) {
                            console.log(response);
                            let data = JSON.stringify(response[0]);
                            sessionStorage.setItem(btoa("user-data"), btoa(data));
                            //let json = JSON.parse(sessionStorage.getItem("user-data"))
                            document.location.href = '/inicio';
                        })
                        .fail(function () {
                            $("#msg_error").text("E-mail ou Senha incorretos!");
                            $("#msg_login_error").show();
                        })
                    ;
                    return false;
                }
            })
        ;


        $("#give_pass").click(function () {
            swal({
                title: "Esqueceu a senha?",
                text: "Informe o endereço de e-mail vinculado a conta para que seja enviado um link de redefinição de senha.",
                icon: "info",
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Digite aqui o seu e-mail!",
                        type: "email",
                        required: true
                    }
                },
                buttons: {
                    cancel: true,
                    confirm: true
                },
                closeOnClickOutside: false
            });
        });
        $('.message .close')
            .on('click', function () {
                $(this)
                    .closest('.message')
                    .transition('fade')
                ;
            })
        ;
    })
;