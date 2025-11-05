SELECT
  SUM(reservas.valor_noite * reservas.noites) AS valor_total_recebido
FROM reservas
WHERE reservas.deletado_em IS NULL;