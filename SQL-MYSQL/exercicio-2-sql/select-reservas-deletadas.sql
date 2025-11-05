SELECT
  reservas.id_reserva,
  hospedes.nome_completo,
  anfitrioes.nome_completo,
  hospedagens.titulo,
  reservas.deletado_em
  
FROM reservas
JOIN hospedes ON hospedes.id_hospede = reservas.id_hospede
JOIN hospedagens ON hospedagens.id_hospedagem = reservas.id_hospedagem
JOIN anfitrioes ON anfitrioes.id_anfitriao = hospedagens.id_anfitriao
WHERE reservas.deletado_em IS NOT NULL