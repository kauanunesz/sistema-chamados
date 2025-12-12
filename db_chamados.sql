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

CREATE TABLE chamados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  tipo VARCHAR(50),
  categoria VARCHAR(100),
  urgencia VARCHAR(50),
  titulo VARCHAR(255) NOT NULL,
  descricao TEXT NOT NULL,
  status VARCHAR(30) DEFAULT 'novo',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id)
);