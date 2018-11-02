CREATE DATABASE hotel;

CREATE TABLE apartamento (
    id SERIAL,
    qtd_cama_solteiro INTEGER NOT NULL,
    qtd_cama_casal INTEGER NOT NULL,
    capacidade_total INTEGER NOT NULL,
    qtd_banheiro INTEGER NOT NULL,
    qtd_ar_codicionado INTEGER NOT NULL,-
    qtd_televisao INTEGER NOT NULL,
    preco_diaria DECIMAL(10, 2) NOT NULL,
    CONSTRAINT pk_apartamento PRIMARY KEY (id)
);

CREATE TABLE hospede (
    id SERIAL,
    nome VARCHAR(40) NOT NULL,
    documento VARCHAR(20) NOT NULL,
    CONSTRAINT pk_hospede PRIMARY KEY (id)
);

CREATE TABLE reserva (
    id SERIAL,
    hos_id INTEGER NOT NULL,
    ape_id INTEGER NOT NULL,
    data_inicio TIMESTAMP NOT NULL,
    data_termino TIMESTAMP NOT NULL,
    valor_total DECIMAL(10, 2),
    CONSTRAINT pk_reserva PRIMARY KEY (id)
    CONSTRAINT fk_hospede FOREIGN KEY (hos_id) REFERENCES hospede(id),
    CONSTRAINT fk_apartamento FOREIGN KEY (ape_id) REFERENCES apartamento(id)
);