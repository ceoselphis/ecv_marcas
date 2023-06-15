<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
//We set the prefix in an variable for to insert into the script
$dbPrefix = db_prefix();

//Load Tables
if(!$CI->db->table_exists("{$dbPrefix}_paises"))
{
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_paises` (
      `pais_id` INT NOT NULL,
      `nombre` VARCHAR(60) NOT NULL,
      PRIMARY KEY (`pais_id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla maestra de paises';
    ");
}

if(!$CI->db->table_exists("{$dbPrefix}_boletines"))
{
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_boletines` (
      `boletin_id` INT NOT NULL AUTO_INCREMENT,
      `fecha_publicacion` DATE NOT NULL,
      `nombre` VARCHAR(60) NOT NULL,
      `pais_id` INT NOT NULL,
      PRIMARY KEY (`boletin_id`),
      INDEX `paises_boletines_fk` (`pais_id` ASC) VISIBLE,
      CONSTRAINT `paises_boletines_fk`
        FOREIGN KEY (`pais_id`)
        REFERENCES `{$dbPrefix}_paises` (`pais_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'tabla de almacenamiento de boletines';
    ");
}

if(!$CI->db->table_exists("{$dbPrefix}_clase_niza"))
{
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_clase_niza` (
        `niza_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        `descripcion` LONGTEXT NULL,
        PRIMARY KEY (`niza_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las clases de niza;
    ");
}

if(!$CI->db->table_exists("{$dbPrefix}_marcas"))
{
    $CI->db->query(
        "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas` (
          `marca_id` INT NOT NULL AUTO_INCREMENT,
          `nombre` VARCHAR(60) NOT NULL,
          `clase_niza_id` INT NOT NULL,
          PRIMARY KEY (`marca_id`),
          INDEX `clasniza_marcas_fk` (`clase_niza_id` ASC) VISIBLE,
          CONSTRAINT `clasniza_marcas_fk`
            FOREIGN KEY (`clase_niza_id`)
            REFERENCES `{$dbPrefix}_clase_niza` (`niza_id`)
            ON DELETE CASCADE
            ON UPDATE CASCADE)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8mb4
        COLLATE = utf8mb4_0900_ai_ci
        COMMENT = 'Tabla de marcas';
        "
    );
}

if(!$CI->db->table_exists("{$dbPrefix}_oficinas"))
{
    $CI->db->query(
        "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_oficinas` (
          `oficina_id` INT NOT NULL,
          `direccion` VARCHAR(512) NOT NULL,
          PRIMARY KEY (`oficina_id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8mb4
        COLLATE = utf8mb4_0900_ai_ci
        COMMENT = 'Tabla de almacenamiento de Oficinas';
        "
    );
}

if(!$CI->db->table_exists("{$dbPrefix}_tipo_solicitud"))
{
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_solicitud` (
      `tipo_id` INT NOT NULL AUTO_INCREMENT,
      `nombre` VARCHAR(60) NOT NULL,
      PRIMARY KEY (`tipo_id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla Maestra de tipo de solicitudes';"
    );
}

if(!$CI->db->table_exists("{$dbPrefix}_acciones_marcas_terceros"))
{
  $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_acciones_marcas_terceros` (
    `accion_id` INT NOT NULL,
    `tipo_id` INT NOT NULL,
    `oficina_id` INT NOT NULL,
    `marca_id_base` INT NULL DEFAULT NULL COMMENT 'marca base',
    `marca_id_opuesta` INT NULL DEFAULT NULL COMMENT 'marca opuesta',
    `boletin_id` INT NOT NULL,
    `customer_id` INT NOT NULL,
    `staff_id` INT NOT NULL,
    PRIMARY KEY (`accion_id`),
    INDEX `oficinas_accion_id_fk` (`oficina_id` ASC) VISIBLE,
    INDEX `tipo_solicitud_accion_id_fk` (`tipo_id` ASC) VISIBLE,
    INDEX `boletines_accion_id_fk` (`boletin_id` ASC) VISIBLE,
    INDEX `marcas_accion_id_fk` (`marca_id_base` ASC) VISIBLE,
    INDEX `marcas_accion_id_fk1` (`marca_id_opuesta` ASC) VISIBLE,
    CONSTRAINT `boletines_accion_id_fk`
      FOREIGN KEY (`boletin_id`)
      REFERENCES `{$dbPrefix}_tm_boletines` (`boletin_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `marcas_accion_id_fk`
      FOREIGN KEY (`marca_id_base`)
      REFERENCES `{$dbPrefix}_marcas` (`marca_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `marcas_accion_id_fk1`
      FOREIGN KEY (`marca_id_opuesta`)
      REFERENCES `{$dbPrefix}_marcas` (`marca_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `oficinas_accion_id_fk`
      FOREIGN KEY (`oficina_id`)
      REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `tipo_solicitud_accion_id_fk`
      FOREIGN KEY (`tipo_id`)
      REFERENCES `{$dbPrefix}_tipo_solicitud` (`tipo_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci
  COMMENT = 'Tabla de acciones a terceros';"
  );

  if(!$CI->db->table_exists("{$dbPrefix}_materias"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_materias` (
        `materia_id` INT NOT NULL AUTO_INCREMENT,
        `descripcion` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`materia_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de las materias';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_evento"))
  {
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_evento` (
      `tipo_eve_id` INT NOT NULL AUTO_INCREMENT,
      `nombre` VARCHAR(60) NOT NULL,
      `materia_id` INT NOT NULL,
      `created_at` DATE NOT NULL,
      `modified_at` DATE NOT NULL,
      `created_by` INT NULL DEFAULT NULL COMMENT 'FK with staff_id',
      PRIMARY KEY (`tipo_eve_id`),
      INDEX `materias_tipo_evento_fk` (`materia_id` ASC) VISIBLE,
      CONSTRAINT `materias_tipo_evento_fk`
        FOREIGN KEY (`materia_id`)
        REFERENCES `{$dbPrefix}_materias` (`materia_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla maestra  de eventos';");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_eventos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_eventos` (
        `eve_id` INT NOT NULL AUTO_INCREMENT,
        `tipo_eve_id` INT NOT NULL,
        `created_at` DATE NOT NULL,
        `staff_id` INT NULL DEFAULT NULL COMMENT 'FK with Staff_id',
        PRIMARY KEY (`eve_id`),
        INDEX `tipo_evento_eventos_fk` (`tipo_eve_id` ASC) VISIBLE,
        CONSTRAINT `tipo_evento_eventos_fk`
          FOREIGN KEY (`tipo_eve_id`)
          REFERENCES `{$dbPrefix}_tipo_evento` (`tipo_eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de eventos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_acciones_terceros_eventos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_acciones_terceros_eventos` (
        `acc_ter_id` INT NOT NULL AUTO_INCREMENT,
        `accion_id` INT NOT NULL,
        `eve_id` INT NOT NULL,
        PRIMARY KEY (`acc_ter_id`),
        INDEX `eventos_acciones_terceros_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `accion_id_acciones_terceros_eventos_fk` (`accion_id` ASC) VISIBLE,
        CONSTRAINT `accion_id_acciones_terceros_eventos_fk`
          FOREIGN KEY (`accion_id`)
          REFERENCES `{$dbPrefix}_acciones_marcas_terceros` (`accion_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `eventos_acciones_terceros_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los eventos de marcas de terceros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_expedientes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_expedientes` (
      `exp_id` INT NOT NULL AUTO_INCREMENT,
      `solicitud` VARCHAR(255) NOT NULL,
      `fecha_solicitud` DATE NOT NULL,
      `registro` VARCHAR(255) NOT NULL,
      `fecha_registro` DATE NOT NULL,
      `certificado` VARCHAR(255) NOT NULL,
      `fecha_emision_certificado` DATE NOT NULL,
      `fecha_vencimiento_certificado` DATE NOT NULL,
      PRIMARY KEY (`exp_id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de almacenamiento de todos los expedientes\n';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_acciones_terceros_expedientes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_acciones_terceros_expedientes` (
        `acc_ter_id` INT NOT NULL AUTO_INCREMENT,
        `ref_interna` VARCHAR(255) NOT NULL,
        `ref_cliente` VARCHAR(255) NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `exp_id` INT NOT NULL,
        PRIMARY KEY (`acc_ter_id`),
        INDEX `expediente_acciones_terceros_expedientes_fk` (`exp_id` ASC) VISIBLE,
        CONSTRAINT `expediente_acciones_terceros_expedientes_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los expedientes de terceros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_estados_solicitudes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_estados_solicitudes` (
        `cod_estado_id` INT NOT NULL AUTO_INCREMENT,
        `descripcion` VARCHAR(255) NULL DEFAULT NULL,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`cod_estado_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de estados de solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_anexos"))
  {
    $CI->db->query("
    CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_anexos` (
      `anexo_id` INT NOT NULL AUTO_INCREMENT,
      `customer_id` INT NOT NULL,
      `oficina_gestora` INT NOT NULL,
      `fecha_resolucion` DATE NOT NULL,
      `nro_resolucion` INT NOT NULL,
      `cod_estado_id` INT NOT NULL,
      PRIMARY KEY (`anexo_id`),
      INDEX `oficinas_anexos_solicitudes_fk` (`oficina_gestora` ASC) VISIBLE,
      INDEX `estados_solicitudes_anexos_solicitudes_fk` (`cod_estado_id` ASC) VISIBLE,
      CONSTRAINT `estados_solicitudes_anexos_solicitudes_fk`
        FOREIGN KEY (`cod_estado_id`)
        REFERENCES `{$dbPrefix}_estados_solicitudes` (`cod_estado_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
      CONSTRAINT `oficinas_anexos_solicitudes_fk`
        FOREIGN KEY (`oficina_gestora`)
        REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de almacenamiento de los anexos de las solicitudes y patentes';
    ");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_anexo"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_anexo` (
        `tip_ax_id` INT NOT NULL AUTO_INCREMENT,
        `nombre_anexo` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tip_ax_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla con los tipos de anexos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipos_participacion"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipos_participacion` (
        `tipo_part_id` INT NOT NULL AUTO_INCREMENT,
        `nombre_tipo` VARCHAR(60) NOT NULL,
        `tip_ax_id` INT NOT NULL,
        PRIMARY KEY (`tipo_part_id`),
        INDEX `tipo_anexo_part_id_fk` (`tip_ax_id` ASC) VISIBLE,
        CONSTRAINT `tipo_anexo_part_id_fk`
          FOREIGN KEY (`tip_ax_id`)
          REFERENCES `{$dbPrefix}_tipo_anexo` (`tip_ax_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los tipos de participacion';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_anexo_participante"))
  {
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_anexo_participante` (
      `ax_part_id` INT NOT NULL AUTO_INCREMENT,
      `anexo_id` INT NOT NULL,
      `nombre_participante` VARCHAR(60) NOT NULL,
      `tipo_part_id` INT NOT NULL,
      PRIMARY KEY (`ax_part_id`),
      INDEX `part_id_anexo_participante_fk` (`tipo_part_id` ASC) VISIBLE,
      INDEX `anexos_solicitudes_anexo_participante_fk` (`anexo_id` ASC) VISIBLE,
      CONSTRAINT `anexos_solicitudes_anexo_participante_fk`
        FOREIGN KEY (`anexo_id`)
        REFERENCES `{$dbPrefix}_tm_anexos` (`anexo_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
      CONSTRAINT `part_id_anexo_participante_fk`
        FOREIGN KEY (`tipo_part_id`)
        REFERENCES `{$dbPrefix}_tipos_participacion` (`tipo_part_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de participantes en los anexos';
    ");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_registros_principales"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_registros_principales` (
        `reg_num_id` INT NOT NULL,
        `staff_id` INT NULL DEFAULT NULL COMMENT 'FK to staff_id',
        `client_id` INT NULL DEFAULT NULL COMMENT 'FK with Client_id',
        `oficina_id` INT NOT NULL,
        `ref_interna` VARCHAR(40) NOT NULL,
        `ref_cliente` VARCHAR(40) NOT NULL,
        `carpeta` VARCHAR(40) NOT NULL,
        `libro` INT NOT NULL,
        `tomo` INT NOT NULL,
        `folio` INT NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        PRIMARY KEY (`reg_num_id`),
        INDEX `oficinas_registros_fk` (`oficina_id` ASC) VISIBLE,
        CONSTRAINT `oficinas_registros_fk`
          FOREIGN KEY (`oficina_id`)
          REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los elementos basicos de las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipos_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipos_patentes` (
        `tip_pat_id` INT NOT NULL AUTO_INCREMENT,
        `nombre_tipo` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tip_pat_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de tipos de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_solicitud_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_solicitud_patentes` (
        `sol_pat_id` INT NOT NULL AUTO_INCREMENT,
        `tip_pat_id` INT NOT NULL,
        `pais_pat` INT NOT NULL,
        `titulo` VARCHAR(60) NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `clasificacion` VARCHAR(40) NOT NULL,
        `reg_num_id` INT NOT NULL,
        PRIMARY KEY (`sol_pat_id`),
        INDEX `tipos_patentes_solicitud_patentes_fk` (`tip_pat_id` ASC) VISIBLE,
        INDEX `registros_solicitud_patentes_fk` (`reg_num_id` ASC) VISIBLE,
        INDEX `paises_solicitud_patentes_fk` (`pais_pat` ASC) VISIBLE,
        CONSTRAINT `paises_solicitud_patentes_fk`
          FOREIGN KEY (`pais_pat`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitud_patentes_fk`
          FOREIGN KEY (`reg_num_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipos_patentes_solicitud_patentes_fk`
          FOREIGN KEY (`tip_pat_id`)
          REFERENCES `{$dbPrefix}_tipos_patentes` (`tip_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de solicitudes de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_anexos_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_anexos_patentes` (
        `anx_pat_id` INT NOT NULL AUTO_INCREMENT,
        `num_anexo` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        PRIMARY KEY (`anx_pat_id`),
        INDEX `anexos_anexos_patentes_fk` (`num_anexo` ASC) VISIBLE,
        INDEX `solicitud_patentes_anexos_patentes_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `anexos_anexos_patentes_fk`
          FOREIGN KEY (`num_anexo`)
          REFERENCES `{$dbPrefix}_tm_anexos` (`anexo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_anexos_patentes_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de union entre los anexos y las patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_solicitudes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_solicitudes` (
        `solicitud_id` INT NOT NULL AUTO_INCREMENT,
        `reg_num_id` INT NOT NULL,
        `tipo_id` INT NOT NULL,
        `cod_estado_id` INT NOT NULL,
        `tipo_solicitud_1` INT NOT NULL,
        `primer_uso` DATE NOT NULL,
        `prueba_uso` DATE NOT NULL,
        `carpeta` VARCHAR(40) NOT NULL,
        `numero_solicitud` VARCHAR(40) NOT NULL,
        `fecha_solicitud` DATE NOT NULL,
        `fecha_registro` DATE NULL DEFAULT NULL,
        `fecha_certificado` DATE NULL DEFAULT NULL,
        `num_certificado` VARCHAR(255) NOT NULL,
        `fecha_vencimiento` DATE NOT NULL,
        PRIMARY KEY (`solicitud_id`),
        INDEX `registros_marcas_solicitudes_fk` (`reg_num_id` ASC) VISIBLE,
        INDEX `estados_solicitudes_solicitudes_fk` (`cod_estado_id` ASC) VISIBLE,
        INDEX `tipo_solicitud_solicitudes_fk` (`tipo_id` ASC) VISIBLE,
        CONSTRAINT `estados_solicitudes_solicitudes_fk`
          FOREIGN KEY (`cod_estado_id`)
          REFERENCES `{$dbPrefix}_estados_solicitudes` (`cod_estado_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_marcas_solicitudes_fk`
          FOREIGN KEY (`reg_num_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_solicitud_solicitudes_fk`
          FOREIGN KEY (`tipo_id`)
          REFERENCES `{$dbPrefix}_tipo_solicitud` (`tipo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_anexos_solicitudes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_anexos_solicitudes` (
        `anx_sol_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `anexo_id` INT NOT NULL,
        PRIMARY KEY (`anx_sol_id`),
        INDEX `anexos_anexos_solicitudes_fk` (`anexo_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_anexos_solicitudes_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `anexos_anexos_solicitudes_fk`
          FOREIGN KEY (`anexo_id`)
          REFERENCES `{$dbPrefix}_tm_anexos` (`anexo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_anexos_solicitudes_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de union entre solicitudes y los anexos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_busqueda_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_busqueda_marcas` (
        `busq_id` INT NOT NULL AUTO_INCREMENT,
        `customer_id` INT NOT NULL,
        `fecha_solicitud` DATE NOT NULL,
        `fecha_respuesta` DECIMAL(10,0) NOT NULL,
        `has_backgrounds` TINYINT(1) NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `pais_id` INT NOT NULL,
        PRIMARY KEY (`busq_id`),
        INDEX `paises_marbusq_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_marbusq_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de busqueda de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_busqueda"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_busqueda` (
        `tipo_busq_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tipo_busq_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de los tipo de busqueda';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_busqueda_tipo"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_busqueda_tipo` (
        `busq_tipo_id` INT NOT NULL,
        `busq_id` INT NOT NULL,
        `tipo_busq_id` INT NOT NULL,
        PRIMARY KEY (`busq_tipo_id`),
        INDEX `tipo_busqueda_busqieda_tipo_fk` (`tipo_busq_id` ASC) VISIBLE,
        INDEX `marbusq_busqieda_tipo_fk` (`busq_id` ASC) VISIBLE,
        CONSTRAINT `marbusq_busqieda_tipo_fk`
          FOREIGN KEY (`busq_id`)
          REFERENCES `{$dbPrefix}_busqueda_marcas` (`busq_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_busqueda_busqieda_tipo_fk`
          FOREIGN KEY (`tipo_busq_id`)
          REFERENCES `{$dbPrefix}_tipo_busqueda` (`tipo_busq_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla que almacena que tipo de busqueda por cada busqueda';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_contacto_registro"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_contacto_registro` (
        `con_reg_id` INT NOT NULL AUTO_INCREMENT,
        `num_reg_id` INT NOT NULL,
        `client_id` INT NOT NULL,
        `contact_id` INT NULL DEFAULT NULL COMMENT 'FK to contacts module',
        PRIMARY KEY (`con_reg_id`),
        INDEX `registros_contacto_registro_fk` (`num_reg_id` ASC) VISIBLE,
        CONSTRAINT `registros_contacto_registro_fk`
          FOREIGN KEY (`num_reg_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los contactos de los clientes en los registros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_documentos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_documentos` (
        `doc_id` INT NOT NULL AUTO_INCREMENT,
        `doc_hash` VARCHAR(64) NULL DEFAULT NULL COMMENT 'Must be sha256 or sha512',
        `path` VARCHAR(255) NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `created_at` DATE NOT NULL,
        `created_by` INT NULL DEFAULT NULL COMMENT 'FK with Staff member',
        PRIMARY KEY (`doc_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de rutas de documentos';"
    );
  }
  
  if(!$CI->db->table_exists("{$dbPrefix}_documentos_accion_terceros"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_documentos_accion_terceros` (
        `doc_acc_id` INT NOT NULL AUTO_INCREMENT,
        `accion_id` INT NOT NULL,
        `doc_id` INT NOT NULL,
        PRIMARY KEY (`doc_acc_id`),
        INDEX `documentos_doc_acc_ter_fk` (`doc_id` ASC) VISIBLE,
        INDEX `accion_id_doc_acc_ter_fk` (`accion_id` ASC) VISIBLE,
        CONSTRAINT `accion_id_doc_acc_ter_fk`
          FOREIGN KEY (`accion_id`)
          REFERENCES `{$dbPrefix}_acciones_marcas_terceros` (`accion_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `documentos_doc_acc_ter_fk`
          FOREIGN KEY (`doc_id`)
          REFERENCES `{$dbPrefix}_tm_documentos` (`doc_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de documentos de terceros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_docu_solicitudes_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_docu_solicitudes_marcas` (
        `doc_sol_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `doc_id` INT NOT NULL,
        PRIMARY KEY (`doc_sol_id`),
        INDEX `documentos_doc_solicitud_fk` (`doc_id` ASC) VISIBLE,
        INDEX `solicitudes_doc_solicitud_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `documentos_doc_solicitud_fk`
          FOREIGN KEY (`doc_id`)
          REFERENCES `{$dbPrefix}_tm_documentos` (`doc_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_doc_solicitud_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de documentos de solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_grupos_registros_sanitarios"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_grupos_registros_sanitarios` (
        `grupo_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`grupo_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los grupos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_registros_sanitarios"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_registros_sanitarios` (
        `reg_san_id` INT NOT NULL AUTO_INCREMENT,
        `reg_num_id` INT NOT NULL,
        `staff_id` INT NOT NULL,
        `pais_id` INT NOT NULL,
        `grupo_id` INT NOT NULL,
        PRIMARY KEY (`reg_san_id`),
        INDEX `registros_grupos_registros_sanitarios_fk` (`grupo_id` ASC) VISIBLE,
        INDEX `registros_registros_sanitarios_fk` (`reg_num_id` ASC) VISIBLE,
        INDEX `paises_registros_sanitarios_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_registros_sanitarios_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_grupos_registros_sanitarios_fk`
          FOREIGN KEY (`grupo_id`)
          REFERENCES `{$dbPrefix}_grupos_registros_sanitarios` (`grupo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_registros_sanitarios_fk`
          FOREIGN KEY (`reg_num_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los registros sanitarios';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_registros_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_registros_solicitantes` (
        `reg_sol_id` INT NOT NULL AUTO_INCREMENT,
        `reg_san_id` INT NOT NULL,
        `pais_id` INT NOT NULL,
        `marca_id` INT NOT NULL,
        `client_id` INT NULL DEFAULT NULL COMMENT 'FK to client_id',
        `fabricante_nombre` VARCHAR(60) NOT NULL,
        `fabricante_ciudad` VARCHAR(60) NOT NULL,
        `fecha_orden_muestra` DATE NOT NULL,
        `fecha_presentacion_muestra` DATE NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        PRIMARY KEY (`reg_sol_id`),
        INDEX `paises_registros_solicitantes_fk` (`pais_id` ASC) VISIBLE,
        INDEX `registros_sanitarios_registros_solicitantes_fk` (`reg_san_id` ASC) VISIBLE,
        INDEX `marcas_registros_solicitantes_fk` (`marca_id` ASC) VISIBLE,
        CONSTRAINT `marcas_registros_solicitantes_fk`
          FOREIGN KEY (`marca_id`)
          REFERENCES `{$dbPrefix}_marcas` (`marca_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `paises_registros_solicitantes_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_sanitarios_registros_solicitantes_fk`
          FOREIGN KEY (`reg_san_id`)
          REFERENCES `{$dbPrefix}_registros_sanitarios` (`reg_san_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los registros de los solicitantes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_documentos_registros"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_documentos_registros` (
        `doc_reg_id` INT NOT NULL AUTO_INCREMENT,
        `reg_sol_id` INT NOT NULL,
        `doc_id` INT NOT NULL,
        PRIMARY KEY (`doc_reg_id`),
        INDEX `documentos_documentos_registros_fk` (`doc_id` ASC) VISIBLE,
        INDEX `registros_solicitantes_documentos_registros_fk` (`reg_sol_id` ASC) VISIBLE,
        CONSTRAINT `documentos_documentos_registros_fk`
          FOREIGN KEY (`doc_id`)
          REFERENCES `{$dbPrefix}_tm_documentos` (`doc_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitantes_documentos_registros_fk`
          FOREIGN KEY (`reg_sol_id`)
          REFERENCES `{$dbPrefix}_tm_registros_solicitantes` (`reg_sol_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de registros de los documentos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_estados"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_estados` (
        `estado_id` INT NOT NULL AUTO_INCREMENT,
        `materia_id` INT NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `created_at` DATE NOT NULL,
        `last_modified` DATE NOT NULL,
        `created_by` INT NULL DEFAULT NULL COMMENT 'FK to staff_id',
        PRIMARY KEY (`estado_id`),
        INDEX `materias_estados_fk` (`materia_id` ASC) VISIBLE,
        CONSTRAINT `materias_estados_fk`
          FOREIGN KEY (`materia_id`)
          REFERENCES `{$dbPrefix}_materias` (`materia_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de estados';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_expedientes_registros"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_expedientes_registros` (
        `exp_reg_id` INT NOT NULL AUTO_INCREMENT,
        `reg_sol_id` INT NOT NULL,
        `exp_id` INT NOT NULL,
        PRIMARY KEY (`exp_reg_id`),
        INDEX `expediente_expedientes_registros_fk` (`exp_id` ASC) VISIBLE,
        INDEX `registros_solicitantes_expedientes_registros_fk` (`reg_sol_id` ASC) VISIBLE,
        CONSTRAINT `expediente_expedientes_registros_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitantes_expedientes_registros_fk`
          FOREIGN KEY (`reg_sol_id`)
          REFERENCES `{$dbPrefix}_tm_registros_solicitantes` (`reg_sol_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los expedientes de los registros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_expedientes_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_expedientes_marcas` (
        `mar_exp_id` INT NOT NULL AUTO_INCREMENT,
        `exp_id` INT NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`mar_exp_id`),
        INDEX `expediente_marcas_expedientes_fk` (`exp_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_marcas_expedientes_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `expediente_marcas_expedientes_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_marcas_expedientes_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de expedientes de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_prioridad"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_prioridad` (
        `prioridad_id` INT NOT NULL AUTO_INCREMENT,
        `pais_id` INT NOT NULL,
        `num_prioridad` VARCHAR(255) NOT NULL,
        `fecha_prioridad` DATE NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`prioridad_id`),
        INDEX `solicitudes_prioridad_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `paises_prioridad_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_prioridad_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_prioridad_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'tabla de prioridad de la solicitud de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_publicacion"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_publicacion` (
        `tipo_pub_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tipo_pub_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de tipo de publicacion';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_publicaciones"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_publicaciones` (
        `pub_id` INT NOT NULL AUTO_INCREMENT,
        `boletin_id` INT NOT NULL,
        `tomo` VARCHAR(10) NOT NULL,
        `pagina` VARCHAR(2) NOT NULL,
        `tipo_pub_id` INT NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`pub_id`),
        INDEX `tipo_publicacion_publicaciones_fk` (`tipo_pub_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_marcas_publicaciones_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `boletines_publicaciones_fk` (`boletin_id` ASC) VISIBLE,
        CONSTRAINT `boletines_publicaciones_fk`
          FOREIGN KEY (`boletin_id`)
          REFERENCES `{$dbPrefix}_tm_boletines` (`boletin_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_marcas_publicaciones_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_publicacion_publicaciones_fk`
          FOREIGN KEY (`tipo_pub_id`)
          REFERENCES `{$dbPrefix}_tipo_publicacion` (`tipo_pub_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de manejo de publicaciones de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_solicitantes` (
        `solicit_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`solicit_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los solicitantes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_solicitantes` (
        `mar_sol_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `solicit_id` INT NOT NULL,
        PRIMARY KEY (`mar_sol_id`),
        INDEX `solicitantes_marcas_solicitantes_fk` (`solicit_id` ASC) VISIBLE,
        INDEX `solicitudes_marcas_solicitantes_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `solicitantes_marcas_solicitantes_fk`
          FOREIGN KEY (`solicit_id`)
          REFERENCES `{$dbPrefix}_solicitantes` (`solicit_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_marcas_solicitantes_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de marcas de solicitantes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_niza_productos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_niza_productos` (
        `prod_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        `clase_niza_id` INT NOT NULL,
        PRIMARY KEY (`prod_id`),
        INDEX `clasniza_niza_productos_fk` (`clase_niza_id` ASC) VISIBLE,
        CONSTRAINT `clasniza_niza_productos_fk`
          FOREIGN KEY (`clase_niza_id`)
          REFERENCES `{$dbPrefix}_clase_niza` (`niza_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de productos permitidos por la clase niza';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_oficinas_contactos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_oficinas_contactos` (
        `ofi_cont_id` INT NOT NULL AUTO_INCREMENT,
        `oficina_id` INT NOT NULL,
        `contact_id` INT NOT NULL,
        PRIMARY KEY (`ofi_cont_id`),
        INDEX `oficinas_oficinas_contactos_fk` (`oficina_id` ASC) VISIBLE,
        CONSTRAINT `oficinas_oficinas_contactos_fk`
          FOREIGN KEY (`oficina_id`)
          REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de contactos de oficinas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_paises_designados"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_paises_designados` (
        `pais_design_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `pais_id` INT NOT NULL,
        PRIMARY KEY (`pais_design_id`),
        INDEX `tipo_solicitud_paises_designados_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `paises_paises_designados_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_paises_designados_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_solicitud_paises_designados_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'tabla de paises designados';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_eventos_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_eventos_patentes` (
        `eve_pat_id` INT NOT NULL AUTO_INCREMENT,
        `eve_id` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        PRIMARY KEY (`eve_pat_id`),
        INDEX `eventos_patentes_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_eventos_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `eventos_patentes_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_eventos_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los eventos de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_expediente"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_expediente` (
        `pat_exp_id` INT NOT NULL AUTO_INCREMENT,
        `exp_id` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        `nro_soli_pat` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Nro solicitud SAPI',
        `fecha_solicitud` DATE NOT NULL,
        `nro_publicacion` VARCHAR(255) NOT NULL,
        `fecha_publicacion` DATE NOT NULL,
        PRIMARY KEY (`pat_exp_id`),
        INDEX `expediente_patentes_expediente_fk` (`exp_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_expediente_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `expediente_patentes_expediente_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_expediente_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los expedientes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_inventores"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_inventores` (
        `inventor_id` INT NOT NULL AUTO_INCREMENT,
        `pais_id` INT NOT NULL,
        `nombre` VARCHAR(60) NOT NULL,
        `apellid` VARCHAR(60) NOT NULL,
        `direccion` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`inventor_id`),
        INDEX `paises_patentes_inventores_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_patentes_inventores_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de inventores';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_prioridad"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_prioridad` (
        `pri_pat_id` INT NOT NULL AUTO_INCREMENT,
        `sol_pat_id` INT NOT NULL,
        `fecha` DATE NOT NULL,
        `pais_id` INT NOT NULL,
        PRIMARY KEY (`pri_pat_id`),
        INDEX `paises_patentes_prioridad_fk` (`pais_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_prioridad_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `paises_patentes_prioridad_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_prioridad_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las prioridades de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_publicaciones"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_publicaciones` (
        `pat_pub_id` INT NOT NULL AUTO_INCREMENT,
        `tipo_pub_id` INT NOT NULL,
        `boletin_id` INT NOT NULL,
        `tomo` INT NOT NULL,
        `pagina` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        PRIMARY KEY (`pat_pub_id`),
        INDEX `tipo_publicacion_patentes_publicaciones_fk` (`tipo_pub_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_publicaciones_fk` (`sol_pat_id` ASC) VISIBLE,
        INDEX `boletines_patentes_publicaciones_fk` (`boletin_id` ASC) VISIBLE,
        CONSTRAINT `boletines_patentes_publicaciones_fk`
          FOREIGN KEY (`boletin_id`)
          REFERENCES `{$dbPrefix}_tm_boletines` (`boletin_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_publicaciones_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_publicacion_patentes_publicaciones_fk`
          FOREIGN KEY (`tipo_pub_id`)
          REFERENCES `{$dbPrefix}_tipo_publicacion` (`tipo_pub_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las publicaciones de patentes.';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_solicitantes` (
        `pat_solic_id` INT NOT NULL AUTO_INCREMENT,
        `sol_pat_id` INT NOT NULL,
        `pat_sol_id` INT NOT NULL,
        PRIMARY KEY (`pat_solic_id`),
        INDEX `solicitantes_patentes_solicitantes_fk` (`pat_sol_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_solicitantes_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `solicitantes_patentes_solicitantes_fk`
          FOREIGN KEY (`pat_sol_id`)
          REFERENCES `{$dbPrefix}_solicitantes` (`solicit_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_solicitantes_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los solicitantes de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_eventos_registros_sanitarios"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_eventos_registros_sanitarios` (
        `reg_eve_id` INT NOT NULL AUTO_INCREMENT,
        `reg_sol_id` INT NOT NULL,
        `eve_id` INT NOT NULL,
        PRIMARY KEY (`reg_eve_id`),
        INDEX `eventos_registros_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `registros_solicitantes_registros_eventos_fk` (`reg_sol_id` ASC) VISIBLE,
        CONSTRAINT `eventos_registros_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitantes_registros_eventos_fk`
          FOREIGN KEY (`reg_sol_id`)
          REFERENCES `{$dbPrefix}_tm_registros_solicitantes` (`reg_sol_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de eventos de los registros sanitarios';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_servicios"))
  {
    $CI->db->query("CREATE TABLE IF NOT EXISTS `{$dbPrefix}_servicios` (
      `codigo` INT NOT NULL AUTO_INCREMENT,
      `materia_id` INT NOT NULL,
      `created_by` INT NULL DEFAULT NULL COMMENT 'FK with staff_id',
      `descripcion` VARCHAR(255) NOT NULL,
      `created_at` DATETIME NOT NULL,
      `modified_at` DATETIME NOT NULL,
      PRIMARY KEY (`codigo`),
      INDEX `materias_servicios_fk` (`materia_id` ASC) VISIBLE,
      CONSTRAINT `materias_servicios_fk`
        FOREIGN KEY (`materia_id`)
        REFERENCES `{$dbPrefix}_materias` (`materia_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de almacenaje de los servicios';");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipos_signos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipos_signos` (
        `tipos_signo_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tipos_signo_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de los tipos de signos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_signos_solicitud_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_signos_solicitud_marcas` (
        `signos_solicitud_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `tipo_signo_id` INT NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `clasificacion` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`signos_solicitud_id`),
        INDEX `tipos_signos_signos_solicitud_fk` (`tipo_signo_id` ASC) VISIBLE,
        INDEX `tipo_solicitud_signos_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `tipo_solicitud_signos_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipos_signos_signos_solicitud_fk`
          FOREIGN KEY (`tipo_signo_id`)
          REFERENCES `{$dbPrefix}_tipos_signos` (`tipos_signo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de signos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_solicitudes_clases"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_solicitudes_clases` (
        `sol_cla_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `clase_niza_id` INT NOT NULL,
        PRIMARY KEY (`sol_cla_id`),
        INDEX `solicitudes_solicitudes_clases_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `clasniza_solicitudes_clases_fk` (`clase_niza_id` ASC) VISIBLE,
        CONSTRAINT `clasniza_solicitudes_clases_fk`
          FOREIGN KEY (`clase_niza_id`)
          REFERENCES `{$dbPrefix}_clase_niza` (`niza_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_solicitudes_clases_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las clases de niza en las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_solicitudes_eventos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_solicitudes_eventos` (
        `sol_eve_id` INT NOT NULL AUTO_INCREMENT,
        `eve_id` INT NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`sol_eve_id`),
        INDEX `eventos_solicitudes_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_solicitudes_eventos_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `eventos_solicitudes_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_solicitudes_eventos_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de registro de los eventos en las solicitudes';"
    );
  }

  return redirect(base_url('admin'));

}