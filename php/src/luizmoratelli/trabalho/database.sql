CREATE TABLE apartamento (
    id SERIAL,
    numero_quarto INTEGER NOT NULL UNIQUE,
    qtd_cama_solteiro INTEGER NOT NULL,
    qtd_cama_casal INTEGER NOT NULL,
    qtd_banheiro INTEGER NOT NULL,
    qtd_ar_condicionado INTEGER NOT NULL,
    qtd_televisao INTEGER NOT NULL,
    preco_diaria DECIMAL(10, 2) NOT NULL,
    CONSTRAINT pk_apartamento PRIMARY KEY (id)
);

CREATE TABLE hospede (
    id SERIAL,
    nome VARCHAR(40) NOT NULL,
    documento VARCHAR(20) NOT NULL UNIQUE,
    CONSTRAINT pk_hospede PRIMARY KEY (id)
);

CREATE TABLE reserva (
    id SERIAL,
    hos_id INTEGER,
    apt_id INTEGER,
    data_aluguel TIMESTAMP NOT NULL,
    CONSTRAINT pk_reserva PRIMARY KEY (id),
    CONSTRAINT fk_hospede FOREIGN KEY
    	(hos_id) 
    	REFERENCES hospede(id) 
    	ON DELETE NO ACTION
    	ON UPDATE NO ACTION,
    CONSTRAINT fk_apartamento FOREIGN KEY 
    	(apt_id) 
    	REFERENCES apartamento(id) 
    	ON DELETE NO ACTION
    	ON UPDATE NO ACTION
);

CREATE TABLE usuario (
    id SERIAL,
    username VARCHAR(25) NOT NULL,
    pass VARCHAR(50) NOT NULL
)