CREATE DATABASE  crud_2025b;
USE crud_2025b;

CREATE TABLE user(
id INT AUTO_INCREMENT PRIMARY KEY, 
nome VARCHAR(50) NOT NULL,
senha VARCHAR(50) NOT NULL
);

SELECT * FROM user;
TRUNCATE TABLE user;

INSERT INTO user(id, nome, senha) VALUES(1, 'Fulano', '123');
INSERT INTO user(id, nome, senha) VALUES(2, 'Ciclano', '124');