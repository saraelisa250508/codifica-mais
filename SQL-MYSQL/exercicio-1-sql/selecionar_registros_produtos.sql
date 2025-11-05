USE gestao_deprodutos;

SELECT produto_id, nome, descrição, categoria, preco, quantidade, atualizado_em
FROM produtos
WHERE quantidade > 5
