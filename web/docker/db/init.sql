CREATE TABLE pessoas (
  id_pessoa serial PRIMARY KEY,
  nome VARCHAR (200) UNIQUE NOT NULL,
  data_nascimento date NOT NULL,
  cpf varchar(11) UNIQUE NOT NULL
);

CREATE TABLE enderecos (
  id_endereco serial PRIMARY KEY,
  id_pessoa int NOT NULL,
  cep varchar(9) NOT NULL,
  rua VARCHAR (200) NOT NULL,
  numero int,
  cidade VARCHAR (200) NOT NULL,
  estado VARCHAR (200) NOT NULL,
  CONSTRAINT fk_pessoa
    FOREIGN KEY(id_pessoa) 
	    REFERENCES pessoas(id_pessoa)
);

CREATE TABLE ceps (
  id_cep serial PRIMARY KEY,
  cep varchar(9) NOT NULL,
  rua VARCHAR (200) NOT NULL,
  cidade VARCHAR (200) NOT NULL,
  estado VARCHAR (200) NOT NULL
);

CREATE TABLE contas (
  id_conta serial PRIMARY KEY,
  data_criacao timestamp NOT NULL,
  cpf varchar(11) NOT NULL,
  conta VARCHAR (11) NOT NULL
);

CREATE TABLE movimentacoes (
  id_movimentacao serial PRIMARY KEY,
  id_conta int NOT NULL,
  data_movimentacao timestamp NOT NULL,
  acao varchar(11) NOT NULL,
  valor decimal NOT NULL,
  CONSTRAINT fk_conta
    FOREIGN KEY(id_conta) 
	    REFERENCES contas(id_conta)
);

INSERT INTO pessoas (nome, data_nascimento, cpf)
 VALUES
  ('Marcelo Ramos', '1988-10-10', '48349778032'),
  ('Renato Silva', '1995-01-14', '76537136024'),
  ('Maria Cordeiro', '1982-06-16', '01054804010');

INSERT INTO enderecos (id_pessoa, cep, rua, numero, cidade, estado)
 VALUES
  (1, '88705-460', 'Rua Luiz Demo', 120, 'Tubarão', 'SC'),
  (2, '88708-420', 'Rua Alexandre de Sá', 98, 'Tubarão', 'SC'),
  (3, '88704-460', 'Rua Júlio Pozza', 450 , 'Tubarão', 'SC');

INSERT INTO ceps (cep, rua, cidade, estado)
 VALUES
  ('88705-460', 'Rua Luiz Demo', 'Tubarão', 'SC'),
  ('88708-420', 'Rua Alexandre de Sá', 'Tubarão', 'SC'),
  ('88704-460', 'Rua Júlio Pozza', 'Tubarão', 'SC');

INSERT INTO contas (data_criacao, cpf, conta)
 VALUES
  ('2023-04-01 10:00:00', '48349778032', '213405-6');

INSERT INTO movimentacoes (id_conta, data_movimentacao, acao, valor)
 VALUES
  (1, '2023-04-01 12:00:00', 'Depositar', 200.5),
  (1, '2023-04-01 13:00:00', 'Retirar', 100);
