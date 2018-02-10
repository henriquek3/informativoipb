$(document).ready(function () {
    let colaborador_nivel;
    let modulo_cadastros, modulo_rh, modulo_financeiro, modulo_comercial, modulo_engenharia, modulo_administrativo,
        link_avatar, user_name;
    /**
     * @description Função sair do sistema
     */
    //if (window.location.href != "http://tecman.servidordiegorohden.com.br/login") {
    if (window.location.href !== "http://app.tecman.com/login") {
        let $sair = document.getElementById("sair_sistema");
        if ($sair) {
            document.getElementById("sair_sistema").addEventListener("click", function () {
                sessionStorage.clear();
                //window.location.href = "http://tecman.servidordiegorohden.com.br/login";
                window.location.href = "http://app.tecman.com/login";
            });
        }

        //colaborador_nivel = sessionStorage.getItem("colaborador_nivel");
        colaborador_nivel = sessionStorage.getItem("Y29sYWJvcmFkb3Jfbml2ZWw=");
        colaborador_nivel = atob(colaborador_nivel);

        //modulo_cadastros = sessionStorage.getItem("modulo_cadastros");
        modulo_cadastros = sessionStorage.getItem("bW9kdWxvX2NhZGFzdHJvcw==");
        modulo_cadastros = atob(modulo_cadastros);

        //modulo_rh = sessionStorage.getItem("modulo_rh");
        modulo_rh = sessionStorage.getItem("bW9kdWxvX3Jo");
        modulo_rh = atob(modulo_rh);

        //modulo_financeiro = sessionStorage.getItem("modulo_financeiro");
        modulo_financeiro = sessionStorage.getItem("bW9kdWxvX2ZpbmFuY2Vpcm8=");
        modulo_financeiro = atob(modulo_financeiro);


        //modulo_comercial = sessionStorage.getItem("modulo_comercial");
        modulo_comercial = sessionStorage.getItem("bW9kdWxvX2NvbWVyY2lhbA==");
        modulo_comercial = atob(modulo_comercial);

        //modulo_engenharia = sessionStorage.getItem("modulo_engenharia");
        modulo_engenharia = sessionStorage.getItem("bW9kdWxvX2VuZ2VuaGFyaWE=");
        modulo_engenharia = atob(modulo_engenharia);

        //modulo_administrativo = sessionStorage.getItem("modulo_administrativo");
        modulo_administrativo = sessionStorage.getItem("bW9kdWxvX2FkbWluaXN0cmF0aXZv");
        modulo_administrativo = atob(modulo_administrativo);

        //link_avatar = sessionStorage.getItem("link_avatar");
        link_avatar = sessionStorage.getItem("bGlua19hdmF0YXI=");
        link_avatar = atob(link_avatar);

        //user_name = sessionStorage.getItem("session-name");
        user_name = sessionStorage.getItem("c2Vzc2lvbi1uYW1l");
        user_name = atob(user_name);

        $("a[href='sistema-parametros']").click(function () {
            if (colaborador_nivel !== "Administrador") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Usuário com nivel de acesso insuficiente',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 5000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            }
        });

        $("#cadastros").click(function () {
            if (modulo_cadastros !== "S") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Opção não liberada, caso seja necessário contate um usuário com nível Administrador!',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 10000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            } else {
                return true;
            }
        });

        $("#rh").click(function () {
            if (modulo_rh !== "S") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Opção não liberada, caso seja necessário contate um usuário com nível Administrador!',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 10000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            }
        });

        $("#financeiro_").click(function () {
            if (modulo_financeiro !== "S") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Opção não liberada, caso seja necessário contate um usuário com nível Administrador!',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 10000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            }
        });

        $("#comercial").click(function () {
            if (modulo_comercial !== "S") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Opção não liberada, caso seja necessário contate um usuário com nível Administrador!',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 10000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            }
        });

        $("#engenharia").click(function () {
            if (modulo_engenharia !== "S") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Opção não liberada, caso seja necessário contate um usuário com nível Administrador!',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 10000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            }
        });

        $("#administrativo").click(function () {
            if (modulo_administrativo !== "S") {
                $.notify({
                    title: "Acesso indisponível!<br/>",
                    message: 'Opção não liberada, caso seja necessário contate um usuário com nível Administrador!',
                    icon: 'fa fa-exclamation-triangle'
                }, {
                    type: "warning",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 10000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
                return false;
            }
        });

        $("#user_img, #user_img_page-user").attr({src: link_avatar, alt: "teste"});

        $("#user_name, #user_name_page-user").text(user_name.substr(0, 15));

        switch (colaborador_nivel) {
            case '1':
                colaborador_nivel = "Em Treinamento";
                $("#user_design").text(colaborador_nivel);
                $("#user_design_page-user").text(colaborador_nivel);
                break;
            case '2':
                colaborador_nivel = "Normal";
                $("#user_design").text(colaborador_nivel);
                $("#user_design_page-user").text(colaborador_nivel);
                break;
            case '3':
                colaborador_nivel = "Superior";
                $("#user_design").text(colaborador_nivel);
                $("#user_design_page-user").text(colaborador_nivel);
                break;
            case '4':
                colaborador_nivel = "Administrador";
                $("#user_design").text(colaborador_nivel);
                $("#user_design_page-user").text(colaborador_nivel);
                break;
            default:
                $("#user_design").text("Erro Login");
                $("#user_design_page-user").text("Erro Login");
        }

    }
});