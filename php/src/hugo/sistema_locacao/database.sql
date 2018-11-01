CREATE DATABASE locacao;

CREATE TABLE tbcliente(
    cli_id SERIAL,
    cli_nome VARCHAR(30) NOT NULL,
    cli_documento VARCHAR(20) NOT NULL,
    
    CONSTRAINT pk_cli_id PRIMARY KEY (cli_id),


);

CREATE TABLE tbcarro(
    car_id SERIAL,
    car_valor_diaria DECIMAL(10,2) NOT NULL,
    car_modelo VARCHAR(25) NOT NULL,
    car_ano INTEGER NOT NULL,
    car_qtd INTEGER NOT NULL,
    CONSTRAINT pk_car_id PRIMARY KEY (car_id),

);

CREATE TABLE tbaluguel(
    alu_id SERIAL,
    cli_id INTEGER NOT NULL,
    car_id INTEGER NOT NULL,
    alu_qtd_dia INTEGER NOT NULL,
    alu_data_ini TIMESTAMP NOT NULL,
    alu_data_final TIMESTAMP NOT NULL,
    CONSTRAINT pk_alu_id PRIMARY KEY (alu_id),
    CONSTRAINT "TBALUGUEL -> TBCLIENTE" FOREIGN KEY (cli_id)
        REFERENCES locacao.tbcliente(cli_id),
    CONSTRAINT "TBALUGUEL -> TBCARRO" FOREIGN KEY (car_id)
        REFERENCES locacao.tbcarro(car_id),
);