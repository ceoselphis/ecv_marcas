CREATE 
    ALGORITHM = UNDEFINED 
    --DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `tblview_propietarios` AS
    SELECT 
        `a`.`id` AS `id`,
        `a`.`codigo` AS `codigo`,
        `a`.`nombre_propietario` AS `nombre_propietario`,
        (CASE
            WHEN (`a`.`estado_civil` = 1) THEN 'Soltero'
            WHEN (`a`.`estado_civil` = 2) THEN 'Casado'
            WHEN (`a`.`estado_civil` = 3) THEN 'Divorciado'
            WHEN (`a`.`estado_civil` = 4) THEN 'Viudo'
            WHEN (`a`.`estado_civil` = 5) THEN 'Concubinato'
        END) AS `estado_civil`,
        `a`.`representante_legal` AS `representante_legal`,
        `b`.`id` AS `pais_id`,
        `b`.`nombre` AS `pais`,
        `a`.`actividad_comercial` AS `actividad_comercial`
    FROM
        (`tbl_propietarios` `a`
        JOIN `tbl_paises` `b` ON ((`b`.`id` = `a`.`pais_id`)))