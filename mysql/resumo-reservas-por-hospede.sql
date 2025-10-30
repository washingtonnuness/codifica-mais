-- Monte um relatório que exiba, para cada hóspede: 
-- • O ID e o nome do hóspede; 
-- • O total de reservas confirmadas (excluindo as canceladas, deletadas e 
-- pendentes); 
-- • A primeira data de check-in registrada; 
-- • A última data de check-out registrada. 
-- Utilize junções adequadas entre as tabelas reservas, hospedes e status_reservas. 
-- Agrupe os resultados por hóspede e ordene de forma decrescente pelo número total 
-- de reservas, e em ordem alfabética pelo nome em caso de empate. 

SELECT sum(T2.id_hospede), T2.nome_completo ,T1.status_nome, T0.data_checkin, T0.data_checkout FROM reservas AS T0
INNER JOIN status_reservas AS T1 ON T1.id_status = T0.status_id
INNER JOIN hospedes AS T2 ON T2.id_hospede = T0.id_hospede
WHERE T0.status_id = 2
GROUP BY T2.id_hospede,T0.data_checkin, T0.data_checkout ORDER BY T2.id_hospede DESC;