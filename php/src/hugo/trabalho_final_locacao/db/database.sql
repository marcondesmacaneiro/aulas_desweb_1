CREATE TABLE IF NOT EXISTS tbpessoa (
pescodigo integer NOT NULL,
pesnome varchar(50) NOT NULL,
pesmail text,
pessenha text,
CONSTRAINT pk_pessoa PRIMARY KEY (pescodigo)
);
CREATE TABLE IF NOT EXISTS tbcliente (
clicodigo integer NOT NULL, 
pescodigo integer NOT NULL,
clicredito numeric(17,2),
CONSTRAINT pk_cliente PRIMARY KEY (clicodigo),
CONSTRAINT fk_pessoa FOREIGN KEY (pescodigo) REFERENCES tbpessoa (pescodigo)
);
CREATE TABLE IF NOT EXISTS tbcarro (
carcodigo integer NOT NULL, 
cardescricao varchar(50),
carvalor numeric(17,2), 
CONSTRAINT pk_tbcarro PRIMARY KEY (carcodigo)
);
CREATE TABLE IF NOT EXISTS tbpedido (
pedcodigo integer NOT NULL, 
clicodigo integer NOT NULL,
peddata date NOT NULL,
CONSTRAINT pk_tbpedido PRIMARY KEY (pedcodigo),
CONSTRAINT fk_tbcliente FOREIGN KEY (clicodigo) REFERENCES tbcliente (clicodigo)
);
CREATE TABLE IF NOT EXISTS tbpedidocarro (
pedcodigo integer NOT NULL,
carcodigo integer NOT NULL,
pepquantidade smallint,
CONSTRAINT pk_pedido_carro PRIMARY KEY (pedcodigo, carcodigo),
CONSTRAINT fk_tbpedido FOREIGN KEY (pedcodigo) REFERENCES tbpedido (pedcodigo) ON DELETE CASCADE,
CONSTRAINT fk_tbcarro FOREIGN KEY (carcodigo) REFERENCES tbcarro (carcodigo)
);
