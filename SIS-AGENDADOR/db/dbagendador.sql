CREATE DATABASE IF NOT EXISTS dbsisagendador;

USE dbsisagendador;

CREATE TABLE IF NOT EXISTS tbcontatos (
    idContato INT AUTO_INCREMENT PRIMARY KEY,
    nomeContato VARCHAR(200),
    emailContato VARCHAR(100),
    telefoneContato VARCHAR(50),
    enderecoContato VARCHAR(200),
    sexoContato CHAR(1),
    dataNascContato DATE,
    flagFavoritoContato TINYINT(1),
    nomeFotoContato VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tbtarefas (
    idTarefa INT AUTO_INCREMENT PRIMARY KEY,
    tituloTarefa VARCHAR(255),
    descricaoTarefa TEXT,
    dataConclusaoTarefa DATE,
    horaConclusaoTarefa TIME,
    dataLembreteTarefa DATE,
    horaLembreteTarefa TIME,
    recorrenciaTarefa INT(11),
    statusTarefa TINYINT(1)
);

CREATE TABLE IF NOT EXISTS tbeventos (
    idEvento INT AUTO_INCREMENT PRIMARY KEY,
    tituloEvento VARCHAR(255) NOT NULL,
    descricaoEvento TEXT,
    dataInicioEvento DATE,
    horaInicioEvento TIME,
    dataFimEvento DATE,
    horaFimEvento TIME,
    statusEvento INT
);

CREATE TABLE IF NOT EXISTS tbusuarios (
    loginUser VARCHAR(45) NOT NULL PRIMARY KEY,
    senhaUser VARCHAR(64) NOT NULL,
    nomeUser VARCHAR(45) NOT NULL
);