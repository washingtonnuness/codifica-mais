SELECT T1.* FROM reservas AS T1 
WHERE T1.status_id = 2 AND T1.data_checkin >= '2025-06-01' AND T1.deletado_em IS NULL ORDER BY T1.data_checkin ASC;