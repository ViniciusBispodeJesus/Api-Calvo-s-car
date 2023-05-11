CREATE SCHEMA concessionaria;

CREATE TABLE concessionaria.usuario (
	cpf INT,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) NOT NULL,
    sexo CHAR(1),
    email VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(45) NOT NULL,
    telefone VARCHAR(11),
    endereco VARCHAR(50),
    data_nascimento DATE NOT NULL,
    CONSTRAINT pk_cpf PRIMARY KEY(cpf)
);
drop table concessionaria.usuario;
SELECT * FROM concessionaria.usuario;

INSERT INTO concessionaria.usuario(cpf, nome, sobrenome, sexo, email, senha, telefone, endereco, data_nascimento) VALUES(1234, "Joaquim", "Luna", 'M', 'joca@gmail.com', '1234', NULL, NULL, "2001-05-07");
INSERT INTO concessionaria.usuario(cpf, nome, sobrenome, sexo, email, senha, telefone, endereco, data_nascimento) VALUES(112, "Tadeu", "Santana", 'M', 'flut@hotmail.com', '43215', NULL, NULL, "1999-01-09");
INSERT INTO concessionaria.usuario(cpf, nome, sobrenome, sexo, email, senha, telefone, endereco, data_nascimento) VALUES(983, "Fernando", "Clovis", 'M', 'tadeu@yahoo.com', '12345678', NULL, NULL, "2003-12-25");
INSERT INTO concessionaria.usuario(cpf, nome, sobrenome, sexo, email, senha, telefone, endereco, data_nascimento) VALUES(999, "Maria", "Adilsa", 'F', 'mariaadil.com', '12345678', NULL, NULL, "1950-06-19");

CREATE TABLE concessionaria.cliente (
	id_cliente INT NOT NULL AUTO_INCREMENT,
    cpf INT NOT NULL,
    CONSTRAINT pk_cliente PRIMARY KEY(id_cliente),
    CONSTRAINT fk_usuario_cliente FOREIGN KEY(cpf) REFERENCES concessionaria.usuario(cpf) ON DELETE SET NULL ON UPDATE CASCADE
);
drop table concessionaria.cliente;
SELECT * FROM concessionaria.cliente;

INSERT INTO concessionaria.cliente(cpf) VALUES(123);
INSERT INTO concessionaria.cliente(cpf) VALUES(112);
INSERT INTO concessionaria.cliente(cpf) VALUES(983);


CREATE TABLE concessionaria.funcionario(
	matricula INT,
    salario FLOAT,
    cargo VARCHAR(50),
    cpf INT,
    CONSTRAINT pk_matricula PRIMARY KEY(matricula),
    CONSTRAINT fk_usuario_funcionario FOREIGN KEY (cpf) REFERENCES concessionaria.usuario(cpf) ON DELETE SET NULL ON UPDATE CASCADE
);
drop table concessionaria.funcionario;
SELECT * FROM concessionaria.funcionario;

INSERT INTO concessionaria.funcionario(matricula, salario, cargo, cpf) VALUES(123, 1119.56, "Gerente", 999);

CREATE TABLE concessionaria.marca(
	id_marca INT NOT NULL,
    nome VARCHAR(45) UNIQUE,
    CONSTRAINT pk_marca PRIMARY KEY(id_marca)
);
drop table concessionaria.marca;
SELECT * FROM concessionaria.marca;

INSERT INTO concessionaria.marca(id_marca, nome) VALUES(1, "Ferrari");
INSERT INTO concessionaria.marca(id_marca, nome) VALUES(2, "Lamborghini");
INSERT INTO concessionaria.marca(id_marca, nome) VALUES(3, "Volkswagem");
INSERT INTO concessionaria.marca(id_marca, nome) VALUES(4, "Chevrolet");

CREATE TABLE concessionaria.modelo(
	id_modelo INT NOT NULL,
    ano INT,
    versao VARCHAR(45) NOT NULL,
    peso FLOAT,
    cambio VARCHAR(20),
    potencia_motor VARCHAR(10),
    motor VARCHAR(3),
    preco FLOAT,
    ipva FLOAT,
    id_marca INT,
    CONSTRAINT pk_modelo PRIMARY KEY (id_modelo),
    CONSTRAINT fk_marca_modelo FOREIGN KEY(id_marca) REFERENCES concessionaria.marca(id_marca)
);
drop table concessionaria.modelo;
SELECT * FROM concessionaria.modelo;

-- Ferrari
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(1, 2022, "Roma", 1577, "Automatico", "620cv", "V8", 3206558, 128262, 1);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(2, 2022, "296 GTB", 1540, "Automatico", "830cv", "V6", 4800000, 188471, 1);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(3, 2022, "SF90 Stradale", 1675, "Automatico", "780cv", "V8", 6561850, 285945, 1);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(4, 2022, "SF90 Spider", 1670, "Automatico", "1000cv", "V8", 7622701, 301379, 1);

-- Lamborghini
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(5, 2022, "Aventador SVJ", 1625, "Automatico", "759cv", "V12", 8200000, 344400, 2);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(6, 2010, "Gallardo", 1247, "Automatico", "560cv", "V10", 1145988, 45840, 2);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(7, 2022, "Urus", 2200, "Automatico", "666cv", "V8", 3553673, 159915, 2);

-- Volkswagen
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(8, 2022, "Gol", 1001, "Manual", "84cv", "V3", 59942, 2398, 3);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(9, 2022, "Jetta", 1476, "Automatico", "231cv", "V4", 210101, 8404, 3);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(10, 2019, "Golf GTI", 1317, "Automatico", "230cv", "V4", 215164, 8607, 3);

-- Chevrolet
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(11, 2020, "Cobalt", 1104, "Manual", "111cv", "V4", 74037, 2961, 4);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(12, 2020, "Camaro SS", 1709, "Manual", "461cv", "V8", 463219, 18529, 4);
INSERT INTO concessionaria.modelo(id_modelo, ano, versao, peso, cambio, potencia_motor, motor, preco, ipva, id_marca) VALUES(13, 2022, "Onix", 1037, "Manual", "82cv", "V3", 74758, 2990, 4);

CREATE TABLE concessionaria.fornecedor(
	cnpj INT,
    razao_social VARCHAR(45) NOT NULL,
    endereco VARCHAR(50),
    telefone VARCHAR(13),
    id_marca INT,
    CONSTRAINT pk_cnpj PRIMARY KEY (cnpj),
    CONSTRAINT fk_marca_fornecedor FOREIGN KEY (id_marca) REFERENCES concessionaria.marca(id_marca) ON DELETE SET NULL ON UPDATE CASCADE
);
drop table concessionaria.fornecedor;
SELECT * FROM concessionaria.fornecedor;

INSERT INTO concessionaria.fornecedor (cnpj, razao_social, endereco, telefone, id_marca) VALUES (123456789, 'Auto Peças ABC LTDA', 'Rua das Peças, 123, Centro, São Paulo', '79 91111-1111', 1);
INSERT INTO concessionaria.fornecedor (cnpj, razao_social, endereco, telefone, id_marca) VALUES (987654321, 'Auto Parts XYZ S.A.',  NULL, NULL, 2);
INSERT INTO concessionaria.fornecedor (cnpj, razao_social, endereco, telefone, id_marca) VALUES (456789123, 'Peças e Acessórios EFG LTDA', 'Rua do Comércio, 456, Centro, Rio de Janeiro', NULL, 3);
INSERT INTO concessionaria.fornecedor (cnpj, razao_social, endereco, telefone, id_marca) VALUES (789123456, 'Auto Parts LMN EIRELI', 'Rua das Auto Peças, 789, Vila Olímpia, São Paulo', '11 3333-3333', 4);

CREATE TABLE concessionaria.veiculo(
	id_veiculo INT NOT NULL AUTO_INCREMENT,
    ano_fabricacao INT,
    chassi VARCHAR(20) UNIQUE,
    statuss VARCHAR(45),
    vendido BOOLEAN,
    placa VARCHAR(9),
    cor VARCHAR(10),
    id_modelo INT,
    id_cliente INT,
    CONSTRAINT pk_veiculo PRIMARY KEY (id_veiculo),
    CONSTRAINT fk_modelo_veiculo FOREIGN KEY (id_modelo) REFERENCES concessionaria.modelo(id_modelo) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_cliente_veiculo FOREIGN KEY (id_cliente) REFERENCES concessionaria.cliente(id_cliente) ON DELETE SET NULL ON UPDATE CASCADE
);
drop table concessionaria.veiculo;
SELECT * FROM concessionaria.veiculo;

-- Volkswagen
INSERT INTO concessionaria.veiculo(ano_fabricacao, chassi, statuss, placa, cor, id_modelo, id_cliente) VALUES(2022, NULL, "Recem chegado", NULL, "Branco", 3, NULL);

-- Ferrari
INSERT INTO concessionaria.veiculo(ano_fabricacao, chassi, statuss, placa, cor, id_modelo, id_cliente) VALUES(2022, NULL, "Recem chegado", NULL, "Preto", 1, NULL);

-- Chevrolet
INSERT INTO concessionaria.veiculo(ano_fabricacao, chassi, statuss, placa, cor, id_modelo, id_cliente) VALUES(2022, NULL, "Recem chegado", NULL, "Cinza", 4, NULL);

-- Lamborghini
INSERT INTO concessionaria.veiculo(ano_fabricacao, chassi, statuss, placa, cor, id_modelo, id_cliente) VALUES(2022, NULL, "Recem chegado", NULL, "Roxo", 2, NULL);


CREATE TABLE concessionaria.compra(
	id_compra INT NOT NULL AUTO_INCREMENT,
    valor FLOAT NOT NULL,
    id_funcionario INT,
    id_veiculo INT,
    id_fornecedor INT,
    CONSTRAINT pk_compra PRIMARY KEY(id_compra),
    CONSTRAINT fk_veiculo_compra FOREIGN KEY(id_veiculo) REFERENCES concessionaria.veiculo(id_veiculo) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_funcionario_compra FOREIGN KEY(id_funcionario) REFERENCES concessionaria.funcionario(matricula) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_fornecedor_compra FOREIGN KEY(id_fornecedor) REFERENCES concessionaria.fornecedor(cnpj) ON DELETE SET NULL ON UPDATE CASCADE    
);
drop table concessionaria.compra;
SELECT * FROM concessionaria.compra;

CREATE TABLE concessionaria.pagamento(
	id_pagamento INT NOT NULL AUTO_INCREMENT,
    tipo VARCHAR(30) NOT NULL,
    valor FLOAT NOT NULL,
    CONSTRAINT pk_pagamento PRIMARY KEY(id_pagamento)
);
drop table concessionaria.pagamento;
SELECT * FROM concessionaria.pagamento;

CREATE TABLE concessionaria.venda(
	id_venda INT NOT NULL AUTO_INCREMENT,
    datta DATE NOT NULL,
    id_funcionario INT,
    id_veiculo INT,
    id_pagamento INT,
    id_cliente INT,
    CONSTRAINT pk_venda PRIMARY KEY(id_venda, id_funcionario),
    CONSTRAINT fk_veiculo_venda FOREIGN KEY(id_veiculo) REFERENCES concessionaria.veiculo(id_veiculo) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_funcionario_venda FOREIGN KEY(id_funcionario) REFERENCES concessionaria.funcionario(matricula),
	CONSTRAINT fk_cliente_venda FOREIGN KEY (id_cliente) REFERENCES concessionaria.cliente(id_cliente) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_pagamento_venda FOREIGN KEY (id_pagamento) REFERENCES concessionaria.pagamento(id_pagamento) ON DELETE SET NULL ON UPDATE CASCADE
);
drop table concessionaria.venda;
SELECT * FROM concessionaria.venda;

CREATE TABLE concessionaria.servico(
	id_servico INT NOT NULL AUTO_INCREMENT,
    tipo VARCHAR(30) NOT NULL UNIQUE,
    valor FLOAT NOT NULL,
    CONSTRAINT pk_servico PRIMARY KEY (id_servico)
);
drop table concessionaria.servico;
SELECT * FROM concessionaria.servico;

INSERT INTO concessionaria.servico(tipo, valor) VALUES("Troca_oleo", 200);
INSERT INTO concessionaria.servico(tipo, valor) VALUES("Troca_pneus", 130);
INSERT INTO concessionaria.servico(tipo, valor) VALUES("Balanceamento", 370);
INSERT INTO concessionaria.servico(tipo, valor) VALUES("Revisao_completa", 2500);

CREATE TABLE concessionaria.solicitacao(
	id_solicitacao INT NOT NULL AUTO_INCREMENT,
    statuss VARCHAR(45),
    id_servico INT,
    id_funcionario INT,
    id_veiculo INT,
    id_cliente INT,
    CONSTRAINT pk_id_solicitacao PRIMARY KEY(id_solicitacao),
    CONSTRAINT fk_veiculo_solic FOREIGN KEY(id_veiculo) REFERENCES concessionaria.veiculo(id_veiculo) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_funcionario_solic FOREIGN KEY(id_funcionario) REFERENCES concessionaria.funcionario(matricula) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_cliente_solic FOREIGN KEY (id_cliente) REFERENCES concessionaria.cliente(id_cliente) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_servico_solic FOREIGN KEY (id_servico) REFERENCES concessionaria.servico(id_servico) ON DELETE SET NULL ON UPDATE CASCADE
);
drop table concessionaria.solicitacao;
SELECT * FROM concessionaria.solicitacao;