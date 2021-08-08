SELECT * FROM premios 
INNER JOIN premios_nominaciones 
ON premios_nominaciones.premio_id = premios.id 
INNER JOIN nominaciones 
ON nominaciones.id = premios_nominaciones.nominacion_id 
WHERE premios.id = 1

-- -------------------
SELECT * FROM actores 
INNER JOIN actores_premios 
ON actores_premios.actor_id = actores.id 
INNER JOIN premios_nominaciones 
ON premios_nominaciones.id = actores_premios.premio_nominacion_id 
INNER JOIN premios 
ON premios.id = premios_nominaciones.premio_id 
INNER JOIN nominaciones 
ON nominaciones.id = premios_nominaciones.nominacion_id 
WHERE actores.id = 1
