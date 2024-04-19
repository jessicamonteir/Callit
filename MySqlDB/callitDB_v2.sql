CREATE DATABASE CALLIT_V2;
USE CALLIT_V2;

CREATE TABLE Usuario (
    Id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200),
    Email VARCHAR(100),
    Senha VARCHAR(30)
);

CREATE TABLE Prestador (
    Id_prestador INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200),
    Email VARCHAR(100),
    Servico_Prestado INT, /* Número do serviço prestado, por exemplo => 1 = Jardinagem, 2 = Eletricista,...  */
    Avaliacao INT, /* Média de avaliação do prestador */
    Senha VARCHAR(30)
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

INSERT INTO Servico (Nome_Servico, Descricao)
VALUES ('Jardinagem','Cortar grama');

SELECT * FROM Prestador;
SELECT * FROM AGENDA WHERE FK_ID_Prestador = 1 AND Data_Inicio_Semana = '2024-04-14';

DROP DATABASE CALLIT_V2;
DROP TABLE SERVICO; 
*/