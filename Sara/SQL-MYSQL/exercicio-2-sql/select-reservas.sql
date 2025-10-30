SELECT
    hospedes.nome_completo,
    hospedagens.titulo,
    status_reservas.status_nome
FROM reservas
JOIN hospedes ON reservas.id_hospede = hospedes.id_hospede
JOIN hospedagens ON hospedagens.id_hospedagem = hospedagens.id_hospedagem
JOIN status_reservas ON status_reservas.id_status = status_reservas.id_status;



