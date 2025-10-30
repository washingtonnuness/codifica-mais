-- Liste o nome do estado, a quantidade total de reservas realizadas em hospedagens
-- localizadas em cada estado e a soma total simples do valor das reservas (valor da diária
-- multiplicado pelo número de noites).
-- Considere apenas as reservas não deletadas e que tenham data de check-in anteriores a
-- ou iguais Junho de 2025.
-- Ordene o resultado de forma que os estados com maior número de reservas apareçam
-- primeiro e, em caso de empate, o estado com maior valor total venha antes.

select t0.estado,count(t0.id_hospedagem), concat('R$ ',sum(t1.noites * t1.valor_noite)) as "Valor" from hospedagens as t0 
INNER join reservas as t1 on t0.id_hospedagem = t1.id_hospedagem 
where t1.deletado_em is NULL and t1.data_checkin <= '2025-06-30' and t1.status_id = 2 or t1.status_id = 3
GROUP BY t0.id_hospedagem ORDER BY count(t0.id_hospedagem) asc;