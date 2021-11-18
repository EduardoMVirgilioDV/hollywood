SELECT * FROM premios 
INNER JOIN premios_nominaciones 
ON premios_nominaciones.premio_id = premios.id 
INNER JOIN nominaciones 
ON nominaciones.id = premios_nominaciones.nominacion_id 
WHERE premios.id = 1

-- -------------------
SELECT nominaciones.id,nominaciones.actor_id,nominaciones.fecha,premios.premio,premios.motivo FROM actores INNER JOIN nominaciones ON nominaciones.actor_id = actores.id INNER JOIN premios ON nominaciones.premio_id = premios.id WHERE actores.id = 2;

--------------------------------

INSERT INTO `nominaciones` (`id`, `actor_id`, `premio_id`, `fecha`) VALUES (NULL, '2', '5', '2009');