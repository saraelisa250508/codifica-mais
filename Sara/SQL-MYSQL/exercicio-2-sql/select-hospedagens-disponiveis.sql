SELECT
  h.id_hospedagem,
  h.titulo,
  h.cidade,
  h.preco_noite,
  a.nome_completo AS nome_anfitriao
FROM hospedagens h
INNER JOIN anfitrioes a 
  ON h.id_anfitriao = a.id_anfitriao
WHERE h.disponivel = 1
  AND h.preco_noite < 300
ORDER BY h.preco_noite;
