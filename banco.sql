create database programa;
use programa;

create table empresa(
cnpj char(18) not null,
nm_empresa varchar(45) not null,
nr_telefone char(15) not null,
nm_endereco varchar(45) not null,
nr_endereco int not null,
nm_bairro varchar(45) not null,
cep char(9) not null,
nm_cidade varchar(45) not null,
nm_estado varchar (45) not null,
email varchar(45) not null,
senha varchar(45) not null,
primary key (cnpj)
);

create table funcionario(
id_funcionario int auto_increment,
nm_funcinario varchar(45) not null,
dt_nasc date not null,
nr_telefone char(15) not null,
rg varchar(12) not null,
cpf char(14) not null,
nm_endereco varchar(45) not null,
nr_endereco int not null,
nm_bairro varchar(45) not null,
cep char(9) not null,
nm_cidade varchar(45) not null,
nm_estado varchar(45) not null,
email varchar(45) not null,
cnpj_empresa char(18) not null,
foreign key (cnpj_empresa) references empresa (cnpj),
primary key (id_funcionario) 
);

create table ficha(
cd_ficha int auto_increment,
id_funcionario int not null,
foto blob,
funcao varchar(45) not null,
setor varchar(45) not null,
apto tinyint not null,
foreign key (id_funcionario) references funcionario (id_funcionario),
primary key (cd_ficha)
);

create table exames(
cd_exame int auto_increment,
cd_ficha int not null,
nm_exame varchar(45) not null,
img_exame blob,
hr_atualizacao datetime not null,
foreign key (cd_ficha) references ficha (cd_ficha),
primary key (cd_exame)
);
