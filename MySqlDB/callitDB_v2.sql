CREATE DATABASE CALLIT_V2;
USE CALLIT_V2;

CREATE TABLE Usuario (
    Id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Senha VARCHAR(200) NOT NULL,
    Telefone VARCHAR(20) NOT NULL,
    Foto_Perfil LONGBLOB
);

CREATE TABLE Prestador (
    Id_prestador INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Servico_Prestado VARCHAR(25) NOT NULL,
    Avaliacao DECIMAL(3,2), 
    Avaliacoes TEXT, 
    Senha VARCHAR(200) NOT NULL,
    Telefone VARCHAR(20) NOT NULL,
    Foto_Perfil LONGBLOB
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
    Status_Agendamento VARCHAR(20), -- Se o prestador está disponível no dia ou não
    Cliente VARCHAR(200), -- Nome do usuário que fez o agendamento
    FOREIGN KEY (FK_ID_Prestador) REFERENCES Prestador (Id_prestador),
    FOREIGN KEY (FK_ID_Servico) REFERENCES Servico (Id_servico)
);

DELIMITER $$

CREATE TRIGGER inserir_dia_semana
BEFORE INSERT ON Agenda
FOR EACH ROW
BEGIN
    SET NEW.Dia_da_Semana = CASE DAYOFWEEK(NEW.Data_de_Agendamento)
        WHEN 1 THEN 'Domingo'
        WHEN 2 THEN 'Segunda'
        WHEN 3 THEN 'Terça'
        WHEN 4 THEN 'Quarta'
        WHEN 5 THEN 'Quinta'
        WHEN 6 THEN 'Sexta'
        WHEN 7 THEN 'Sábado'
    END;
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE AddAvaliacao (
    IN prestadoremail VARCHAR(100),
    IN nota DECIMAL(3,1)
)
BEGIN
    DECLARE novas_avaliacoes TEXT;
    DECLARE soma DECIMAL(10,1) DEFAULT 0;
    DECLARE contador INT DEFAULT 0;
    DECLARE nova_media DECIMAL(3,2);
    DECLARE avaliacao_atual TEXT;
    DECLARE temp_val TEXT;

    -- Obtém a lista atual de avaliações
    SELECT Avaliacoes INTO avaliacao_atual FROM Prestador WHERE Email = prestadoremail;

    -- Concatenar a nova nota à lista de avaliações
    IF avaliacao_atual IS NULL OR avaliacao_atual = '' THEN
        SET novas_avaliacoes = CAST(nota AS CHAR);
    ELSE
        SET novas_avaliacoes = CONCAT(avaliacao_atual, ',', CAST(nota AS CHAR));
    END IF;

    -- Atualizar a coluna Avaliacoes
    UPDATE Prestador SET Avaliacoes = novas_avaliacoes WHERE Email = prestadoremail;

    -- Calcular a nova média
    SET temp_val = TRIM(BOTH ',' FROM novas_avaliacoes);
    WHILE LOCATE(',', temp_val) > 0 DO
        SET soma = soma + CAST(SUBSTRING_INDEX(temp_val, ',', 1) AS DECIMAL(3,1));
        SET temp_val = SUBSTRING(temp_val FROM LOCATE(',', temp_val) + 1);
        SET contador = contador + 1;
    END WHILE;

    -- Adicionar a última avaliação
    SET soma = soma + CAST(temp_val AS DECIMAL(3,1));
    SET contador = contador + 1;

    -- Calcular a média
    SET nova_media = IFNULL(soma / contador, 0);

    -- Atualizar a média na tabela Prestador
    UPDATE Prestador SET Avaliacao = nova_media WHERE Email = prestadoremail;
END$$

DELIMITER ;
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