CREATE DATABASE crud_bebidas;

USE crud_bebidas;

CREATE TABLE bebidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2),
    imagem VARCHAR(255)
);
