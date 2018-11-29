
CREATE TABLE public.empresa (
                cnpj VARCHAR NOT NULL,
                nome VARCHAR NOT NULL,
                CONSTRAINT cnpj PRIMARY KEY (cnpj)
);


CREATE SEQUENCE public.viagens_viagem_seq;

CREATE TABLE public.viagens (
                viagem INTEGER NOT NULL DEFAULT nextval('public.viagens_viagem_seq'),
                cnpj VARCHAR NOT NULL,
                SAIDA VARCHAR NOT NULL,
                DESTINO VARCHAR NOT NULL,
                CONSTRAINT viagem PRIMARY KEY (viagem, cnpj)
);


ALTER SEQUENCE public.viagens_viagem_seq OWNED BY public.viagens.viagem;

CREATE SEQUENCE public.veiculos_veiculo_seq;

CREATE TABLE public.veiculos (
                veiculo INTEGER NOT NULL DEFAULT nextval('public.veiculos_veiculo_seq'),
                cnpj VARCHAR NOT NULL,
                placa VARCHAR NOT NULL,
                lotacao INTEGER NOT NULL,
                CONSTRAINT veiculo PRIMARY KEY (veiculo, cnpj)
);


ALTER SEQUENCE public.veiculos_veiculo_seq OWNED BY public.veiculos.veiculo;

CREATE SEQUENCE public.usuarios_usuario_seq;

CREATE TABLE public.usuarios (
                usuario INTEGER NOT NULL DEFAULT nextval('public.usuarios_usuario_seq'),
                cnpj VARCHAR NOT NULL,
                nome VARCHAR NOT NULL,
                email VARCHAR NOT NULL,
                senha VARCHAR NOT NULL,
                CONSTRAINT usuario PRIMARY KEY (usuario, cnpj)
);


ALTER SEQUENCE public.usuarios_usuario_seq OWNED BY public.usuarios.usuario;

CREATE SEQUENCE public.viagens_veiculos_motoristas_vvm_seq;

CREATE TABLE public.viagens_veiculos_motoristas (
                cnpj VARCHAR NOT NULL,
                vvm INTEGER NOT NULL DEFAULT nextval('public.viagens_veiculos_motoristas_vvm_seq'),
                viagem INTEGER NOT NULL,
                veiculo INTEGER NOT NULL,
                usuario INTEGER NOT NULL,
                CONSTRAINT vvm PRIMARY KEY (cnpj, vvm, viagem, veiculo, usuario)
);


ALTER SEQUENCE public.viagens_veiculos_motoristas_vvm_seq OWNED BY public.viagens_veiculos_motoristas.vvm;

ALTER TABLE public.usuarios ADD CONSTRAINT empresa_usuarios_fk
FOREIGN KEY (cnpj)
REFERENCES public.empresa (cnpj)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.veiculos ADD CONSTRAINT empresa_veiculos_fk
FOREIGN KEY (cnpj)
REFERENCES public.empresa (cnpj)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.viagens ADD CONSTRAINT empresa_viagens_fk
FOREIGN KEY (cnpj)
REFERENCES public.empresa (cnpj)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.viagens_veiculos_motoristas ADD CONSTRAINT viagens_viagens_veiculos_motoristas_fk
FOREIGN KEY (viagem, cnpj)
REFERENCES public.viagens (viagem, cnpj)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.viagens_veiculos_motoristas ADD CONSTRAINT veiculos_viagens_veiculos_motoristas_fk
FOREIGN KEY (veiculo, cnpj)
REFERENCES public.veiculos (veiculo, cnpj)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.viagens_veiculos_motoristas ADD CONSTRAINT usuarios_viagens_veiculos_motoristas_fk
FOREIGN KEY (usuario, cnpj)
REFERENCES public.usuarios (usuario, cnpj)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

INSERT INTO empresa (cnpj, nome) VALUES ('1','Ismael Informática');
INSERT INTO usuarios (cnpj, nome, email, senha) VALUES ('1', 'Ismael', 'ismael@unidavi.edu.br', '123456');