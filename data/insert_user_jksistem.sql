insert into usuarios (nome, email, cpf, status, nivel, perfil, observacoes, usuario_inclusao, data_inclusao, senha)
values
  ('JK SISTEMAS', 'ATENDIMENTO@JKSISTEMAS.COM.BR', '0000000000', 1, 1, 1, 'TESTE', 1, '08/04/2018', 'ODQwODk1NTQ=');


ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk0` FOREIGN KEY (`id_presbitero`) REFERENCES `presbiteros` (`id`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk1` FOREIGN KEY (`usuario_inclusao`) REFERENCES `usuarios` (`id`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk2` FOREIGN KEY (`usuario_alteracao`) REFERENCES `usuarios` (`id`);