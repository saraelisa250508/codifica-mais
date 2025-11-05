SELECT
    hospedagens.cidade,
    COUNT(reservas.id_reserva),
    AVG(reservas.valor_noite)
FROM reservas
JOIN hospedagens ON hospedagens.id_hospedagem = reservas.id_hospedagem
GROUP BY hospedagens.cidade