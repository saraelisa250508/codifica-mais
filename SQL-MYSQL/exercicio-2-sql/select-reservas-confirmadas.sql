SELECT
  reservas.id_reserva,
  hospedes.nome_completo,
  hospedagens.titulo,
  status_reservas.status_nome,
  reservas.data_checkin,
  reservas.data_checkout
FROM reservas
JOIN hospedes
  ON reservas.id_hospede = hospedes.id_hospede
JOIN hospedagens
  ON reservas.id_hospedagem = hospedagens.id_hospedagem
JOIN status_reservas
  ON reservas.status_id = status_reservas.id_status
WHERE status_reservas.status_nome = 'Confirmada'
  AND reservas.data_checkin >= '2025-06-01'



