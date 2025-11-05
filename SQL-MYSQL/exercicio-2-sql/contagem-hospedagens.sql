SELECT 
anfitrioes.nome_completo,
COUNT(hospedagens.id_hospedagem) AS total_hospedagens
FROM hospedagens
JOIN anfitrioes ON hospedagens.id_anfitriao = anfitrioes.id_anfitriao
GROUP BY hospedagens.id_anfitriao
 