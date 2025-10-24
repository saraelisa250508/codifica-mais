USE gestao_deprodutos;
SELECT 
    produtos.produto_id,
    produtos.nome,
    produtos.descrição,
    produtos.categoria,
    produtos.preco,
    produtos.quantidade,
    fornecedores.razao_social,
    fornecedores.cnpj
FROM produtos
LEFT JOIN fornecedores
