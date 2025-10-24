SELECT COUNT(h.id_anfitriao) AS "Numero de acomodacao", a.nome_completo FROM anfitrioes AS a 
INNER JOIN hospedagens AS h ON a.id_anfitriao = h.id_anfitriao GROUP BY h.id_anfitriao;