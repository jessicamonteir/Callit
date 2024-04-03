CREATE DATABASE CallIt;
USE CallIt;

CREATE TABLE Usuario (
    Id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200),
    Email VARCHAR(100) UNIQUE
);

CREATE TABLE Prestador (
    Id_prestador INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(200),
    Email VARCHAR(100) UNIQUE,
    Servico_Prestado INT,
    Avaliacao INT,
    fk_Servico_Id_servico INT
);

CREATE TABLE Login (
    Id_Login INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(100) UNIQUE,
    Senha VARCHAR(30)
);

CREATE TABLE Servico (
    Id_servico INT PRIMARY KEY AUTO_INCREMENT,
    Nome_servico VARCHAR(30),
    Descricao TINYTEXT
);

CREATE TABLE Possuem_Usuario_Prestador_Login (
    fk_Usuario_Id_usuario INT,
    fk_Prestador_Id_prestador INT,
    fk_Login_Id_Login INT
);
 
ALTER TABLE Prestador ADD CONSTRAINT FK_Prestador_2
    FOREIGN KEY (fk_Servico_Id_servico)
    REFERENCES Servico (Id_servico)
    ON DELETE SET NULL;
 
ALTER TABLE Possuem_Usuario_Prestador_Login ADD CONSTRAINT FK_Possuem_Usuario_Prestador_Login_1
    FOREIGN KEY (fk_Usuario_Id_usuario)
    REFERENCES Usuario (Id_usuario)
    ON DELETE RESTRICT;
 
ALTER TABLE Possuem_Usuario_Prestador_Login ADD CONSTRAINT FK_Possuem_Usuario_Prestador_Login_2
    FOREIGN KEY (fk_Prestador_Id_prestador)
    REFERENCES Prestador (Id_prestador)
    ON DELETE RESTRICT;
 
ALTER TABLE Possuem_Usuario_Prestador_Login ADD CONSTRAINT FK_Possuem_Usuario_Prestador_Login_3
    FOREIGN KEY (fk_Login_Id_Login)
    REFERENCES Login (Id_Login)
    ON DELETE SET NULL;

SELECT Usuario.nome, Usuario.email, Login.senha
FROM Usuario
INNER JOIN Login ON Usuario.email = Login.email;
