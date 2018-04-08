-- Exportado do dbdesigner.net dia 08/04/2018

CREATE TABLE `igrejas` (
  `id`                      int          NOT NULL AUTO_INCREMENT,
  `id_presbiterio`          int          NOT NULL,
  `id_sinodo`               int          NOT NULL,
  `id_estado`               int          NOT NULL,
  `id_cidade`               int          NOT NULL,
  `congregacao_presbiterio` int,
  `cnpj`                    varchar(20)  NOT NULL UNIQUE,
  `nome`                    varchar(255) NOT NULL,
  `data_organizacao`        varchar(10),
  `endereco`                varchar(255) NOT NULL,
  `endereco_numero`         varchar(5),
  `endereco_complemento`    varchar(255),
  `endereco_bairro`         varchar(255),
  `endereco_cep`            varchar(20),
  `endereco_cx_postal`      varchar(20),
  `telefone`                varchar(20),
  `email`                   varchar(255),
  `homepage`                varchar(255),
  `usuario_inclusao`        int          NOT NULL,
  `data_inclusao`           varchar(10)  NOT NULL,
  `usuario_alteracao`       int,
  `data_alteracao`          varchar(10),
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `presbiterios` (
  `id`                 int          NOT NULL AUTO_INCREMENT,
  `id_sinodo`          int          NOT NULL,
  `nome`               varchar(255) NOT NULL,
  `sigla`              varchar(10)  NOT NULL,
  `regiao`             int          NOT NULL,
  `usuario_lancamento` int          NOT NULL,
  `data_lancamento`    varchar(10)  NOT NULL,
  `usuario_alteracao`  int,
  `data_alteracao`     varchar(10),
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `sinodos` (
  `id`                 int          NOT NULL AUTO_INCREMENT,
  `nome`               varchar(255) NOT NULL,
  `sigla`              varchar(10)  NOT NULL UNIQUE,
  `regiao`             int          NOT NULL,
  `usuario_lancamento` int          NOT NULL,
  `data_lancamento`    varchar(10)  NOT NULL,
  `usuario_alteracao`  int,
  `data_alteracao`     varchar(10),
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `presbiteros` (
  `id`                    int          NOT NULL AUTO_INCREMENT,
  `id_igreja`             int          NOT NULL,
  `nome`                  varchar(255) NOT NULL,
  `nome_mae`              varchar(255),
  `nome_pai`              varchar(255),
  `nascimento_data`       varchar(10),
  `nascimento_id_cidade`  int,
  `nacionalidade`         int          NOT NULL,
  `rg`                    varchar(20),
  `rg_emissor`            varchar(20),
  `cpf`                   varchar(20),
  `estado_civil`          int,
  `conjuge_nome`          varchar(255),
  `conjuge_nascimento`    varchar(10),
  `nome_filhos`           longtext,
  `endereco`              varchar(255),
  `endereco_nr`           varchar(10),
  `endereco_complemento`  varchar(255),
  `endereco_bairro`       varchar(255),
  `endereco_id_cidade`    int,
  `cep`                   varchar(20),
  `telefone`              varchar(20),
  `celular`               varchar(20),
  `email`                 varchar(255),
  `cx_postal`             varchar(20),
  `cx_postal_cep`         varchar(20),
  `ordenacao_data`        varchar(10),
  `ordenacao_presbiterio` int,
  `ativo`                 varchar(1),
  `tipo`                  int          NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `igrejas_congregacoes` (
  `id`                   int          NOT NULL AUTO_INCREMENT,
  `id_igreja`            int          NOT NULL,
  `id_estado`            int          NOT NULL,
  `id_cidade`            int          NOT NULL,
  `nome`                 varchar(255),
  `endereco`             varchar(255) NOT NULL,
  `endereco_numero`      varchar(10)  NOT NULL,
  `endereco_complemento` varchar(255),
  `endereco_bairro`      varchar(255) NOT NULL,
  `endereco_cep`         varchar(20),
  `endereco_cx_postal`   varchar(20),
  `data_organizacao`     varchar(10),
  `telefone`             varchar(100),
  `email`                varchar(20),
  `website`              varchar(255),
  `usuario_inclusao`     int          NOT NULL,
  `data_inclusao`        varchar(10)  NOT NULL,
  `usuario_alteracao`    int,
  `data_alteracao`       varchar(10),
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `paises` (
  `id`   int          NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `estados` (
  `id`        int          NOT NULL AUTO_INCREMENT,
  `id_pais`   int          NOT NULL,
  `uf_codigo` varchar(2)   NOT NULL,
  `nome`      varchar(255) NOT NULL,
  `uf_nome`   varchar(2)   NOT NULL,
  `regiao`    varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `cidades` (
  `id`               int          NOT NULL AUTO_INCREMENT,
  `id_estado`        int          NOT NULL,
  `cidade_codigo`    int          NOT NULL,
  `municipio_codigo` int          NOT NULL,
  `nome`             varchar(255) NOT NULL,
  `uf_estado`        varchar(2)   NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `presbiteros_campos` (
  `id`            int NOT NULL AUTO_INCREMENT,
  `id_presbitero` int NOT NULL,
  `id_igreja`     int,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `relatorios_ministros` (
  `id`                               int         NOT NULL AUTO_INCREMENT,
  `id_presbitero`                    int         NOT NULL,
  `ano`                              varchar(10) NOT NULL,
  `id_igrej`                         int         NOT NULL,
  `nr_dependentes`                   int,
  `condicao_moradia`                 int,
  `ferias`                           int,
  `congruas`                         varchar(10),
  `previdencia_publica`              int,
  `previdencia_privada`              int,
  `plano_saude`                      int,
  `congruas_contribui_inss`          int,
  `previdencia_publica_valor`        int,
  `contribui_prev_privada`           int,
  `dedicacao_ministerio`             int,
  `pregacoes`                        int,
  `palestras_prelecoes`              int,
  `ebd`                              int,
  `msg_radio`                        int,
  `evangelizacao`                    int,
  `artigos_boletins_revistas`        int,
  `estudos_biblicos`                 int,
  `entrevistas`                      int,
  `santa_ceia`                       int,
  `batismos`                         int,
  `bencaos_nupciais`                 int,
  `profissoes_fe`                    int,
  `funerais`                         int,
  `profissoes_batismos`              int,
  `aconselhamentos`                  int,
  `visitas_lares`                    int,
  `visitas_igrejas`                  int,
  `departamentos_internos`           int,
  `descricao_atividades`             longtext,
  `reunioes_conselho`                int,
  `diaconos_ordenados_investidos`    int,
  `presbiteros_ordenados_investidos` int,
  `assembleias`                      int,
  `reunioes_presbiterio`             int,
  `reunioes_sinodo`                  int,
  `reunioes_concilio`                int,
  `comentarios`                      longtext,
  `cargos_presbiterio`               longtext,
  `cargos_sinodo`                    longtext,
  `cargos_concilio`                  longtext,
  `cargos_outros`                    longtext,
  `texto_complementar`               longtext,
  `atualizacao_aperfeicoamento`      longtext,
  `atividades_para_eclesiasticas`    longtext,
  `atividades_extras_ministeriais`   longtext,
  `atividades_outros`                longtext,
  `usuario_lancamento`               int         NOT NULL,
  `data_lancamento`                  varchar(10) NOT NULL,
  `usuario_alteracao`                int         NOT NULL,
  `data_alteracao`                   varchar(10) NOT NULL,
  `status_relatorio`                 int,
  `tipo_relatorio`                   int         NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `relatorios_conselhos` (
  `id`                              int         NOT NULL AUTO_INCREMENT,
  `ano`                             varchar(10) NOT NULL,
  `id_igreja`                       int         NOT NULL,
  `or_imovel_documentado`           int,
  `or_declaracao_ano_anterior`      int,
  `or_inventario_existe`            int,
  `or_inventario_atualizado`        int,
  `or_rol_membros_atualizado`       int,
  `or_nr_congregacoes`              int,
  `se_santaceia_grupos`             int,
  `se_santaceia_individual`         int,
  `se_atividades_evangelisticas`    int,
  `se_textos_distribuidos_biblia`   int,
  `se_textos_distribuidos_nt`       int,
  `se_textos_distribuidos_folhetos` int,
  `se_textos_distribuidos_outros`   int,
  `se_trabalho_missionario`         int,
  `se_trabalho_misisonario_outros`  longtext,
  `se_professores_ebd`              int,
  `se_grupos_corais`                int,
  `se_equipes_musicas`              int,
  `se_conjuntos_musicas`            int,
  `se_oficiais`                     int,
  `se_lideranca`                    int,
  `se_beneficientes_jdiaconal`      int,
  `se_beneficientes_outros`         int,
  `se_visitas_presbiteros_diaconos` int,
  `se_visitas_outros`               int,
  `sa_dizimo_fidelidade`            int,
  `sa_reunioes_conselho`            int,
  `sa_reunioes_jdiaconal`           int,
  `sa_reunioes_assembleia`          int,
  `sa_reunioes_mesa_administrativa` int,
  `sa_reunioes_tesouraria`          int,
  `sa_balancete_tesouraria`         int,
  `sa_officiais_venc`               int,
  `sa_officiais_venc_presbiteros`   int,
  `sa_officiais_venc_diaconos`      int,
  `sa_id_oficiais_vencimento`       int,
  `sa_idem_livros_sociedades`       int,
  `sa_nomeacao`                     int,
  `sa_contribuicao_extra`           int,
  `sa_contribuicao_previdencia`     int,
  `sa_fap`                          int,
  `sa_ipb_prev`                     int,
  `sa_reforma_construcao_projeto`   int,
  `sa_reforma_construcao_andamento` int,
  `pe_exite_pe`                     int,
  `pe_objetivos_sucesso`            longtext,
  `pe_objetivos_falha_dificuldades` longtext,
  `pa_seguro_patrimonial`           int,
  `pa_licenca_bombeiros`            int,
  `pa_alvara`                       int,
  `pa_certificado_digital`          int,
  `usuario_lancamento`              int         NOT NULL,
  `data_lancamento`                 varchar(10) NOT NULL,
  `usuario_alteracao`               int,
  `data_alteracao`                  varchar(10),
  `status_relatorio`                int,
  `tipo_relatorio`                  int         NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `usuarios` (
  `id`                 int          NOT NULL AUTO_INCREMENT,
  `id_presbitero`      int,
  `nome`               varchar(255) NOT NULL,
  `email`              varchar(255) NOT NULL,
  `senha`              varchar(255) NOT NULL,
  `cpf`                varchar(15)  NOT NULL,
  `status`             int,
  `nivel`              int,
  `perfil`             int,
  `observacoes`        longtext,
  `usuario_lancamento` int          NOT NULL,
  `data_lancamento`    varchar(10)  NOT NULL,
  `usuario_alteracao`  int,
  `data_alteracao`     varchar(10),
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `oficiais_vencimento` (
  `id`                    int NOT NULL AUTO_INCREMENT,
  `id_presbitero`         int NOT NULL,
  `id_relatorio_conselho` int NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `relatorios_estatisticas` (
  `id`                              int         NOT NULL AUTO_INCREMENT,
  `ano`                             varchar(10) NOT NULL,
  `id_igreja`                       int         NOT NULL,
  `ec_pastores`                     int,
  `ecl_licenciados`                 int,
  `ecl_presbiteros`                 int,
  `ecl_diaconos`                    int,
  `ecl_evangelistas`                int,
  `ecl_missionarios`                int,
  `ecl_candidatos`                  int,
  `ect_congregacoes`                int,
  `ect_pontos_pregacao`             int,
  `ect_ebd`                         int,
  `ect_alunos_ebd`                  int,
  `ecd_departamentos`               int,
  `ecd_ucp`                         int,
  `ecd_upa`                         int,
  `ecd_ump`                         int,
  `ecd_saf`                         int,
  `ecd_uph`                         int,
  `ecd_outras`                      int,
  `rma_profissao_fe_masc`           int,
  `rma_profissao_fe_fem`            int,
  `rma_profissao_batismo_masc`      int,
  `rma_profissao_batismo_fem`       int,
  `rma_jurisdicao_masc`             int,
  `rma_jurisdicao_fem`              int,
  `rma_restauracao_masc`            int,
  `rma_restauracao_fem`             int,
  `rma_designacao_masc`             int,
  `rma_designacao_fem`              int,
  `rma_batismo_masc`                int,
  `rma_batismo_fem`                 int,
  `rma_transferencia_masc`          int,
  `rma_transferencia_fem`           int,
  `rma_jurisdicao_ex_masc`          int,
  `rma_jurisdicao_ex_fem`           int,
  `rmd_transferencia_masc`          int,
  `rmd_transferencia_fem`           int,
  `rmd_falecimento_masc`            int,
  `rmd_falecimento_fem`             int,
  `rmd_exclucao_masc`               int,
  `rmd_exclucao_fem`                int,
  `rmd_ordenacao_masc`              int,
  `rmd_ordenacao_fem`               int,
  `rmd_profissao_masc`              int,
  `rmd_profissao_fem`               int,
  `rmd_transferencia_masc__ncomumg` int,
  `rmd_transferencia_fem__ncomumg`  int,
  `rmd_falecimento_masc_ncomumg`    int,
  `rmd_falecimento_fem_ncomumg`     int,
  `rmd_exclusao_masc`               int,
  `rmd_exclusao_fem`                int,
  `fina_dizimos`                    varchar(20),
  `fina_ofertas_especificas`        varchar(20),
  `fina_patrimonio`                 varchar(20),
  `fina_causas`                     varchar(20),
  `fina_evangelismo`                varchar(20),
  `fina_missoes`                    varchar(20),
  `fina_sustento_pastoral`          varchar(20),
  `fina_verba_presbiterial`         varchar(20),
  `fina_dizimo_supremo`             varchar(20),
  `finp_dizimos`                    varchar(20),
  `finp_ofertas_especificas`        varchar(20),
  `finp_patrimonio`                 varchar(20),
  `finp_causas`                     varchar(20),
  `finp_evangelismo`                varchar(20),
  `finp_missoes`                    varchar(20),
  `finp_sustento_pastoral`          varchar(20),
  `finp_verba_presbiterial`         varchar(20),
  `finp_dizimo_supremo`             varchar(20),
  `id_presbitero_conselho`          int         NOT NULL,
  `usuario_lancamento`              int         NOT NULL,
  `data_lancamento`                 varchar(10) NOT NULL,
  `usuario_ultima_alteracao`        int         NOT NULL,
  `data_alteracao`                  varchar(10) NOT NULL,
  `status_relatorio`                int,
  `tipo_relatorio`                  int         NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `reunioes_presbiterios` (
  `id`                 int         NOT NULL AUTO_INCREMENT,
  `id_presbiterio`     int         NOT NULL,
  `data_reuniao`       varchar(10) NOT NULL,
  `id_local_reuniao`   int         NOT NULL,
  `ano`                varchar(10) NOT NULL,
  `status`             int         NOT NULL,
  `usuario_lancamento` int         NOT NULL,
  `usuario_alteracao`  int         NOT NULL,
  `data_alteracao`     varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `reunioes_presbiterios_relatorios` (
  `id`                       int NOT NULL AUTO_INCREMENT,
  `id_reuniao_presbiterio`   int NOT NULL,
  `id_relatorio_conselho`    int NOT NULL,
  `id_relatorio_estatistica` int NOT NULL,
  `id_relatorio_ministro`    int NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `reunioes_sinodos` (
  `id`                 int         NOT NULL AUTO_INCREMENT,
  `id_sinodo`          int         NOT NULL,
  `data_reuniao`       varchar(10) NOT NULL,
  `id_local_reuniao`   int         NOT NULL,
  `ano`                varchar(10) NOT NULL,
  `status`             int         NOT NULL,
  `usuario_lancamento` int         NOT NULL,
  `data_lancamento`    varchar(10) NOT NULL,
  `usuario_alteracao`  int         NOT NULL,
  `data_alteracao`     varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `reunioes_sinodos_relatorios` (
  `id`                     int NOT NULL AUTO_INCREMENT,
  `id_reuniao_sinodo`      int NOT NULL,
  `id_reuniao_presbiterio` int NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

ALTER TABLE `igrejas`
  ADD CONSTRAINT `igrejas_fk0` FOREIGN KEY (`id_presbiterio`) REFERENCES `presbiterios` (`id`);

ALTER TABLE `igrejas`
  ADD CONSTRAINT `igrejas_fk1` FOREIGN KEY (`id_sinodo`) REFERENCES `sinodos` (`id`);

ALTER TABLE `igrejas`
  ADD CONSTRAINT `igrejas_fk2` FOREIGN KEY (`usuario_inclusao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `igrejas`
  ADD CONSTRAINT `igrejas_fk3` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `presbiterios`
  ADD CONSTRAINT `presbiterios_fk0` FOREIGN KEY (`id_sinodo`) REFERENCES `sinodos` (`id`);

ALTER TABLE `presbiterios`
  ADD CONSTRAINT `presbiterios_fk1` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `presbiterios`
  ADD CONSTRAINT `presbiterios_fk2` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `sinodos`
  ADD CONSTRAINT `sinodos_fk0` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `sinodos`
  ADD CONSTRAINT `sinodos_fk1` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `presbiteros`
  ADD CONSTRAINT `presbiteros_fk0` FOREIGN KEY (`id_igreja`) REFERENCES `igrejas` (`id`);

ALTER TABLE `presbiteros`
  ADD CONSTRAINT `presbiteros_fk1` FOREIGN KEY (`nascimento_id_cidade`) REFERENCES `cidades` (`id`);

ALTER TABLE `presbiteros`
  ADD CONSTRAINT `presbiteros_fk2` FOREIGN KEY (`nacionalidade`) REFERENCES `paises` (`id`);

ALTER TABLE `presbiteros`
  ADD CONSTRAINT `presbiteros_fk3` FOREIGN KEY (`endereco_id_cidade`) REFERENCES `cidades` (`id`);

ALTER TABLE `presbiteros`
  ADD CONSTRAINT `presbiteros_fk4` FOREIGN KEY (`ordenacao_presbiterio`) REFERENCES `presbiterios` (`id`);

ALTER TABLE `igrejas_congregacoes`
  ADD CONSTRAINT `igrejas_congregacoes_fk0` FOREIGN KEY (`id_igreja`) REFERENCES `igrejas` (`id`);

ALTER TABLE `igrejas_congregacoes`
  ADD CONSTRAINT `igrejas_congregacoes_fk1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`);

ALTER TABLE `igrejas_congregacoes`
  ADD CONSTRAINT `igrejas_congregacoes_fk2` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id`);

ALTER TABLE `igrejas_congregacoes`
  ADD CONSTRAINT `igrejas_congregacoes_fk3` FOREIGN KEY (`usuario_inclusao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `igrejas_congregacoes`
  ADD CONSTRAINT `igrejas_congregacoes_fk4` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `estados`
  ADD CONSTRAINT `estados_fk0` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id`);

ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_fk0` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`);

ALTER TABLE `presbiteros_campos`
  ADD CONSTRAINT `presbiteros_campos_fk0` FOREIGN KEY (`id_presbitero`) REFERENCES `presbiteros` (`id`);

ALTER TABLE `presbiteros_campos`
  ADD CONSTRAINT `presbiteros_campos_fk1` FOREIGN KEY (`id_igreja`) REFERENCES `igrejas` (`id`);

ALTER TABLE `relatorios_ministros`
  ADD CONSTRAINT `relatorios_ministros_fk0` FOREIGN KEY (`id_presbitero`) REFERENCES `presbiteros` (`id`);

ALTER TABLE `relatorios_ministros`
  ADD CONSTRAINT `relatorios_ministros_fk1` FOREIGN KEY (`id_igrej`) REFERENCES `igrejas` (`id`);

ALTER TABLE `relatorios_ministros`
  ADD CONSTRAINT `relatorios_ministros_fk2` FOREIGN KEY (`dedicacao_ministerio`) REFERENCES `presbiteros_campos` (`id`);

ALTER TABLE `relatorios_ministros`
  ADD CONSTRAINT `relatorios_ministros_fk3` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `relatorios_ministros`
  ADD CONSTRAINT `relatorios_ministros_fk4` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `relatorios_conselhos`
  ADD CONSTRAINT `relatorios_conselhos_fk0` FOREIGN KEY (`id_igreja`) REFERENCES `igrejas` (`id`);

ALTER TABLE `relatorios_conselhos`
  ADD CONSTRAINT `relatorios_conselhos_fk1` FOREIGN KEY (`sa_id_oficiais_vencimento`) REFERENCES `oficiais_vencimento` (`id`);

ALTER TABLE `relatorios_conselhos`
  ADD CONSTRAINT `relatorios_conselhos_fk2` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `relatorios_conselhos`
  ADD CONSTRAINT `relatorios_conselhos_fk3` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk0` FOREIGN KEY (`id_presbitero`) REFERENCES `presbiteros` (`id`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk1` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk2` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `oficiais_vencimento`
  ADD CONSTRAINT `oficiais_vencimento_fk0` FOREIGN KEY (`id_presbitero`) REFERENCES `presbiteros` (`id`);

ALTER TABLE `oficiais_vencimento`
  ADD CONSTRAINT `oficiais_vencimento_fk1` FOREIGN KEY (`id_relatorio_conselho`) REFERENCES `relatorios_conselhos` (`id`);

ALTER TABLE `relatorios_estatisticas`
  ADD CONSTRAINT `relatorios_estatisticas_fk0` FOREIGN KEY (`id_igreja`) REFERENCES `igrejas` (`id`);

ALTER TABLE `relatorios_estatisticas`
  ADD CONSTRAINT `relatorios_estatisticas_fk1` FOREIGN KEY (`id_presbitero_conselho`) REFERENCES `presbiteros` (`id`);

ALTER TABLE `relatorios_estatisticas`
  ADD CONSTRAINT `relatorios_estatisticas_fk2` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `relatorios_estatisticas`
  ADD CONSTRAINT `relatorios_estatisticas_fk3` FOREIGN KEY (`usuario_ultima_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `reunioes_presbiterios`
  ADD CONSTRAINT `reunioes_presbiterios_fk0` FOREIGN KEY (`id_presbiterio`) REFERENCES `presbiterios` (`id`);

ALTER TABLE `reunioes_presbiterios`
  ADD CONSTRAINT `reunioes_presbiterios_fk1` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `reunioes_presbiterios`
  ADD CONSTRAINT `reunioes_presbiterios_fk2` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `reunioes_presbiterios_relatorios`
  ADD CONSTRAINT `reunioes_presbiterios_relatorios_fk0` FOREIGN KEY (`id_reuniao_presbiterio`) REFERENCES `reunioes_presbiterios` (`id`);

ALTER TABLE `reunioes_presbiterios_relatorios`
  ADD CONSTRAINT `reunioes_presbiterios_relatorios_fk1` FOREIGN KEY (`id_relatorio_conselho`) REFERENCES `relatorios_conselhos` (`id`);

ALTER TABLE `reunioes_presbiterios_relatorios`
  ADD CONSTRAINT `reunioes_presbiterios_relatorios_fk2` FOREIGN KEY (`id_relatorio_estatistica`) REFERENCES `relatorios_estatisticas` (`id`);

ALTER TABLE `reunioes_presbiterios_relatorios`
  ADD CONSTRAINT `reunioes_presbiterios_relatorios_fk3` FOREIGN KEY (`id_relatorio_ministro`) REFERENCES `relatorios_ministros` (`id`);

ALTER TABLE `reunioes_sinodos`
  ADD CONSTRAINT `reunioes_sinodos_fk0` FOREIGN KEY (`id_sinodo`) REFERENCES `sinodos` (`id`);

ALTER TABLE `reunioes_sinodos`
  ADD CONSTRAINT `reunioes_sinodos_fk1` FOREIGN KEY (`usuario_lancamento`) REFERENCES `usuarios` (`id`);

ALTER TABLE `reunioes_sinodos`
  ADD CONSTRAINT `reunioes_sinodos_fk2` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `reunioes_sinodos_relatorios`
  ADD CONSTRAINT `reunioes_sinodos_relatorios_fk0` FOREIGN KEY (`id_reuniao_sinodo`) REFERENCES `reunioes_sinodos` (`id`);

ALTER TABLE `reunioes_sinodos_relatorios`
  ADD CONSTRAINT `reunioes_sinodos_relatorios_fk1` FOREIGN KEY (`id_reuniao_presbiterio`) REFERENCES `reunioes_presbiterios` (`id`);
