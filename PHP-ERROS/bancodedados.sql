CREATE DATABASE estoque_cosmeticos;
USE estoque_cosmeticos;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    quantidade INT,
    preco DECIMAL(10,2)
);