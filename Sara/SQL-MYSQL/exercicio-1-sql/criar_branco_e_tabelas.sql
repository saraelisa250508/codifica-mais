USE gestao_deprodutos;
CREATE TABLE produtos (
produto_id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR (255),
descrição VARCHAR (255),
categoria VARCHAR (255),
preco FLOAT(8,2),
peso FLOAT(8,2),
quantidade INT,
fornecedor_id INT,
criado_em DATE,
atualizado_em DATE,
deletado_em DATE
);

CREATE TABLE fornecedores (
fornecedor_id INT AUTO_INCREMENT PRIMARY KEY,
razao_social VARCHAR (255),
cnpj VARCHAR (14),
criado_em DATE,
atualizado_em DATE,
deletado_em DATE
