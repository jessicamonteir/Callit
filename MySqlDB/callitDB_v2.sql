CREATE DATABASE CALLIT_V2;
USE CALLIT_V2;

CREATE TABLE Usuario (
    Id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Senha VARCHAR(200) NOT NULL,
    Telefone VARCHAR(10) NOT NULL,
    Foto_Perfil BLOB
);

CREATE TABLE Prestador (
    Id_prestador INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Servico_Prestado VARCHAR(25) NOT NULL,
    Avaliacao INT, /* Média de avaliação do prestador */
    Senha VARCHAR(200) NOT NULL,
    Telefone VARCHAR(10) NOT NULL,
    Foto_Perfil BLOB
);

CREATE TABLE Servico (
    Id_servico INT PRIMARY KEY AUTO_INCREMENT,
    Nome_servico VARCHAR(30),
    Descricao TINYTEXT
);

CREATE TABLE Agenda (
	Id_Agendamento INT PRIMARY KEY AUTO_INCREMENT,
    FK_ID_Prestador INT,
    FK_ID_Servico INT,
    Dia_da_Semana VARCHAR(20), -- Segunda,Terça,...
    Data_de_Agendamento DATE, -- Data do agendamento
    Data_Inicio_Semana DATE,  -- Data do início da semana (Facilita agrupamento de agendamentos)
    Disponibilidade BOOLEAN, -- Se o prestador está disponível no dia ou não
    Cliente VARCHAR(200), -- Nome do usuário que fez o agendamento
	FOREIGN KEY (FK_ID_Prestador) REFERENCES Prestador (Id_prestador),
	FOREIGN KEY (FK_ID_Servico) REFERENCES Servico (Id_servico)
);
/*
INSERT INTO Agenda (FK_ID_Prestador, FK_ID_Servico, Dia_da_Semana, Disponibilidade, Data_de_Agendamento, Data_Inicio_Semana)
VALUES (1, 1, 'Segunda', TRUE, '2024-04-15', '2024-04-14');
INSERT INTO Agenda (FK_ID_Prestador, FK_ID_Servico, Dia_da_Semana, Disponibilidade, Data_de_Agendamento, Data_Inicio_Semana)
VALUES (1, 1, 'Terça', TRUE, '2024-04-16', '2024-04-14');
INSERT INTO Agenda (FK_ID_Prestador, FK_ID_Servico, Dia_da_Semana, Disponibilidade, Data_de_Agendamento, Data_Inicio_Semana)
VALUES (1, 1, 'Segunda', TRUE, '2024-04-22', '2024-04-21');

INSERT INTO Prestador (Nome, Email, Servico_Prestado,Avaliacao,Senha)
VALUES ('Felipe','felipe@gmail.com',1,10,'afdasfafa');
*/
INSERT INTO Servico (Nome_servico, Descricao)
VALUES ('Jardinagem','Cortar grama'),
('Encanador','Revisão do encanamento'),
('Eletricista','Revisa a parte elétrica do local'),
('Pedreiro','Construção e Planejamento'),
('Pintor','Realiza a pintura do local desejado');

SELECT * FROM Agenda;
SELECT * FROM Prestador;
SELECT * FROM Usuario;

SELECT Nome_servico FROM Servico;
SELECT * FROM AGENDA WHERE FK_ID_Prestador = 1 AND Data_Inicio_Semana = '2024-04-14';

ALTER TABLE Prestador
MODIFY Servico_prestado VARCHAR(25);
ALTER TABLE Prestador
MODIFY Senha VARCHAR(200);
ALTER TABLE Usuario
MODIFY Senha VARCHAR(200);

DELETE FROM AGENDA;
DELETE FROM Servico;

DROP DATABASE CALLIT_V2;
DROP TABLE SERVICO; 