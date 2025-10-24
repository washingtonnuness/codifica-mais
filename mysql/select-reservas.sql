SELECT T2.id_hospede, T2.nome_completo, T3.titulo, T4.status_nome
FROM reservas AS T1 
INNER JOIN hospedes AS T2 
ON T1.id_hospede = T2.id_hospede
INNER JOIN hospedagens AS T3 ON T1.id_hospedagem = T3.id_hospedagem
INNER JOIN status_reservas AS T4 ON T1.status_id = T4.id_status;