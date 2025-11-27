create database bd_chamados;
use bd_chamados;

create table user(
	id int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(100) not null,
    senha varchar(255) not null, 
    telefone varchar(11),
    setor varchar(50)	
);

select * from user;