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
                    let email = form_login.email.value;
                    let senha = form_login.password.value;
                    console.log("email: " + email);
                    console.log("senha: " + senha);
                    if (email === 'admin@jksistemas.com.br') {
                        if (senha === 'adminadmin') {
                            sessionStorage.setItem("user-login", 'conectado');
                            document.location.href = '/inicio';
                        } else {
                            $("#msg_error").text("Por favor verifique sua senha");
                            $("#msg_login_error").show();
                        }
                    } else {
                        $("#msg_error").text("Por favor verifique seu login");
                        $("#msg_login_error").show();
                    }
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