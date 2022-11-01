# CRUD PHP feito por Lucas de Sena
github.com/lucasbnu

## TABELA MYSQL
  CREATE TABLE `clientes` (
  	`id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  	`nome_cliente` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  	`idade` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
  	`situacao` ENUM('s','n') NOT NULL COLLATE 'utf8_general_ci',
  	`data` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  	PRIMARY KEY (`id_cliente`) USING BTREE
  )
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
  AUTO_INCREMENT=1;
```
