-- Arquivo soma-valor-total-recebido.sql: 
-- Mostre o valor total recebido com base nas reservas não deletadas, somando apenas o 
-- valor da diária multiplicado pelo número de noites. 

SELECT CONCAT('R$ ',SUM((noites * valor_noite))) AS 'VALOR TOTAL' FROM reservas WHERE deletado_em IS NULL;