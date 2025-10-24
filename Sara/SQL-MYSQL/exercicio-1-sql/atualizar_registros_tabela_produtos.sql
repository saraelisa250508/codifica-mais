USE gestao_deprodutos;

UPDATE produtos
SET preco = 899.90, quantidade = 5, 
atualizado_em = CURDATE()
WHERE produto_id = 1;

UPDATE produtos
SET descrição = 'Cadeira com apoio de braços e regulagem',
    preco = 129.90,
    atualizado_em = CURDATE()
WHERE produto_id = 2;

UPDATE produtos
SET preco = 1199.90, categoria = 'Tecnologia',
 atualizado_em = CURDATE()
WHERE produto_id = 3;
