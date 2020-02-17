create database bancophp;

use bancophp;

create table usuario (
 id_usuario int auto_increment primary key,
 nome varchar(50),
 senha varchar(50)
);

alter table usuario add sexo varchar(50);

alter table usuario add email varchar(100);