create database Templum;
use Templum;

create table Usuario
(
id_usuario int primary key auto_increment,
Nome varchar(55) not null,
Email varchar(100) not null,
Senha varchar(60) not null
);
