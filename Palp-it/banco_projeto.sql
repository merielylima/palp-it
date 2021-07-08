CREATE TABLE usuario ( 
id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
nome varchar(30) DEFAULT NULL, 
email varchar(40) DEFAULT NULL, 
profissao varchar(30) DEFAULT NULL, 
senha varchar(32) DEFAULT NULL, 
area varchar (30) DEFAULT NULL)
ENGINE=InnoDB DEFAULT CHARSET=utf8
