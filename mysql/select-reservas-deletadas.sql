-- Arquivo select-reservas-deletadas.sql: 
-- Liste todas as reservas marcadas como deletadas, com o nome do hóspede, nome do 
-- anfitrião, título da hospedagem e data de exclusão. 
SELECT T3.nome_completo ,T0.nome_completo, T1.titulo, T2.deletado_em FROM anfitrioes AS T0 
    INNER JOIN hospedagens AS T1 ON T0.id_anfitriao = T1.id_anfitriao 
    INNER JOIN reservas AS T2 ON T1.id_hospedagem = T2.id_hospedagem
    INNER JOIN hospedes AS T3 ON T2.id_hospede = T3.id_hospede
WHERE T2.deletado_em IS NOT NULL;