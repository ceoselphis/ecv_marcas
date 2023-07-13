-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: crm
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_acciones_marcas_terceros`
--

DROP TABLE IF EXISTS `tbl_acciones_marcas_terceros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_acciones_marcas_terceros` (
  `accion_id` int NOT NULL,
  `tipo_id` int NOT NULL,
  `oficina_id` int NOT NULL,
  `marca_id_base` int DEFAULT NULL COMMENT 'marca base',
  `marca_id_opuesta` int DEFAULT NULL COMMENT 'marca opuesta',
  `boletin_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`accion_id`),
  KEY `oficinas_accion_id_fk` (`oficina_id`),
  KEY `tipo_solicitud_accion_id_fk` (`tipo_id`),
  KEY `boletines_accion_id_fk` (`boletin_id`),
  KEY `marcas_accion_id_fk` (`marca_id_base`),
  KEY `marcas_accion_id_fk1` (`marca_id_opuesta`),
  CONSTRAINT `boletines_accion_id_fk` FOREIGN KEY (`boletin_id`) REFERENCES `tbl_tm_boletines` (`boletin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marcas_accion_id_fk` FOREIGN KEY (`marca_id_base`) REFERENCES `tbl_marcas` (`marca_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marcas_accion_id_fk1` FOREIGN KEY (`marca_id_opuesta`) REFERENCES `tbl_marcas` (`marca_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `oficinas_accion_id_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficinas` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_solicitud_accion_id_fk` FOREIGN KEY (`tipo_id`) REFERENCES `tbl_tipo_solicitud` (`tipo_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de acciones a terceros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_acciones_marcas_terceros`
--

LOCK TABLES `tbl_acciones_marcas_terceros` WRITE;
/*!40000 ALTER TABLE `tbl_acciones_marcas_terceros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_acciones_marcas_terceros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_acciones_terceros_eventos`
--

DROP TABLE IF EXISTS `tbl_acciones_terceros_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_acciones_terceros_eventos` (
  `acc_ter_id` int NOT NULL AUTO_INCREMENT,
  `accion_id` int NOT NULL,
  `eve_id` int NOT NULL,
  PRIMARY KEY (`acc_ter_id`),
  KEY `eventos_acciones_terceros_eventos_fk` (`eve_id`),
  KEY `accion_id_acciones_terceros_eventos_fk` (`accion_id`),
  CONSTRAINT `accion_id_acciones_terceros_eventos_fk` FOREIGN KEY (`accion_id`) REFERENCES `tbl_acciones_marcas_terceros` (`accion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eventos_acciones_terceros_eventos_fk` FOREIGN KEY (`eve_id`) REFERENCES `tbl_eventos` (`eve_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los eventos de marcas de terceros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_acciones_terceros_eventos`
--

LOCK TABLES `tbl_acciones_terceros_eventos` WRITE;
/*!40000 ALTER TABLE `tbl_acciones_terceros_eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_acciones_terceros_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_acciones_terceros_expedientes`
--

DROP TABLE IF EXISTS `tbl_acciones_terceros_expedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_acciones_terceros_expedientes` (
  `acc_ter_id` int NOT NULL AUTO_INCREMENT,
  `ref_interna` varchar(255) NOT NULL,
  `ref_cliente` varchar(255) NOT NULL,
  `comentarios` varchar(4000) NOT NULL,
  `exp_id` int NOT NULL,
  PRIMARY KEY (`acc_ter_id`),
  KEY `expediente_acciones_terceros_expedientes_fk` (`exp_id`),
  CONSTRAINT `expediente_acciones_terceros_expedientes_fk` FOREIGN KEY (`exp_id`) REFERENCES `tbl_expedientes` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los expedientes de terceros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_acciones_terceros_expedientes`
--

LOCK TABLES `tbl_acciones_terceros_expedientes` WRITE;
/*!40000 ALTER TABLE `tbl_acciones_terceros_expedientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_acciones_terceros_expedientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_anexo_participante`
--

DROP TABLE IF EXISTS `tbl_anexo_participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_anexo_participante` (
  `ax_part_id` int NOT NULL AUTO_INCREMENT,
  `anexo_id` int NOT NULL,
  `nombre_participante` varchar(60) NOT NULL,
  `tipo_part_id` int NOT NULL,
  PRIMARY KEY (`ax_part_id`),
  KEY `part_id_anexo_participante_fk` (`tipo_part_id`),
  KEY `anexos_solicitudes_anexo_participante_fk` (`anexo_id`),
  CONSTRAINT `anexos_solicitudes_anexo_participante_fk` FOREIGN KEY (`anexo_id`) REFERENCES `tbl_tm_anexos` (`anexo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `part_id_anexo_participante_fk` FOREIGN KEY (`tipo_part_id`) REFERENCES `tbl_tipos_participacion` (`tipo_part_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de participantes en los anexos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anexo_participante`
--

LOCK TABLES `tbl_anexo_participante` WRITE;
/*!40000 ALTER TABLE `tbl_anexo_participante` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_anexo_participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_anexos_patentes`
--

DROP TABLE IF EXISTS `tbl_anexos_patentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_anexos_patentes` (
  `anx_pat_id` int NOT NULL AUTO_INCREMENT,
  `num_anexo` int NOT NULL,
  `sol_pat_id` int NOT NULL,
  PRIMARY KEY (`anx_pat_id`),
  KEY `anexos_anexos_patentes_fk` (`num_anexo`),
  KEY `solicitud_patentes_anexos_patentes_fk` (`sol_pat_id`),
  CONSTRAINT `anexos_anexos_patentes_fk` FOREIGN KEY (`num_anexo`) REFERENCES `tbl_tm_anexos` (`anexo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_patentes_anexos_patentes_fk` FOREIGN KEY (`sol_pat_id`) REFERENCES `tbl_tm_solicitud_patentes` (`sol_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de union entre los anexos y las patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anexos_patentes`
--

LOCK TABLES `tbl_anexos_patentes` WRITE;
/*!40000 ALTER TABLE `tbl_anexos_patentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_anexos_patentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_anexos_solicitudes`
--

DROP TABLE IF EXISTS `tbl_anexos_solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_anexos_solicitudes` (
  `anx_sol_id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `anexo_id` int NOT NULL,
  PRIMARY KEY (`anx_sol_id`),
  KEY `anexos_anexos_solicitudes_fk` (`anexo_id`),
  KEY `marcas_solicitudes_anexos_solicitudes_fk` (`solicitud_id`),
  CONSTRAINT `anexos_anexos_solicitudes_fk` FOREIGN KEY (`anexo_id`) REFERENCES `tbl_tm_anexos` (`anexo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marcas_solicitudes_anexos_solicitudes_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de union entre solicitudes y los anexos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anexos_solicitudes`
--

LOCK TABLES `tbl_anexos_solicitudes` WRITE;
/*!40000 ALTER TABLE `tbl_anexos_solicitudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_anexos_solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_busqueda_marcas`
--

DROP TABLE IF EXISTS `tbl_busqueda_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_busqueda_marcas` (
  `busq_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_respuesta` decimal(10,0) NOT NULL,
  `has_backgrounds` tinyint(1) NOT NULL,
  `comentarios` varchar(4000) NOT NULL,
  `pais_id` int NOT NULL,
  PRIMARY KEY (`busq_id`),
  KEY `paises_marbusq_fk` (`pais_id`),
  CONSTRAINT `paises_marbusq_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de busqueda de marcas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_busqueda_marcas`
--

LOCK TABLES `tbl_busqueda_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_busqueda_marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_busqueda_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_busqueda_tipo`
--

DROP TABLE IF EXISTS `tbl_busqueda_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_busqueda_tipo` (
  `busq_tipo_id` int NOT NULL,
  `busq_id` int NOT NULL,
  `tipo_busq_id` int NOT NULL,
  PRIMARY KEY (`busq_tipo_id`),
  KEY `tipo_busqueda_busqieda_tipo_fk` (`tipo_busq_id`),
  KEY `marbusq_busqieda_tipo_fk` (`busq_id`),
  CONSTRAINT `marbusq_busqieda_tipo_fk` FOREIGN KEY (`busq_id`) REFERENCES `tbl_busqueda_marcas` (`busq_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_busqueda_busqieda_tipo_fk` FOREIGN KEY (`tipo_busq_id`) REFERENCES `tbl_tipo_busqueda` (`tipo_busq_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla que almacena que tipo de busqueda por cada busqueda';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_busqueda_tipo`
--

LOCK TABLES `tbl_busqueda_tipo` WRITE;
/*!40000 ALTER TABLE `tbl_busqueda_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_busqueda_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_clase_niza`
--

DROP TABLE IF EXISTS `tbl_clase_niza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_clase_niza` (
  `niza_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` longtext NOT NULL,
  `version` varchar(3) NOT NULL DEFAULT '23',
  `is_activate` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`niza_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de las clases de niza';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clase_niza`
--

LOCK TABLES `tbl_clase_niza` WRITE;
/*!40000 ALTER TABLE `tbl_clase_niza` DISABLE KEYS */;
INSERT INTO `tbl_clase_niza` VALUES (1,'Clase 1','Productos químicos para la industria, la ciencia y la fotografía, así como para la agricultura, la horticultura y la silvicultura; resinas artificiales en bruto, materias plásticas en bruto; compuestos para la extinción de incendios y la prevención de incendios; preparaciones para templar y soldar metales; sustancias para curtir cueros y pieles de animales; adhesivos (pegamentos) para la industria; masillas y otras materias de relleno en pasta; compost, abonos, fertilizantes; preparaciones biológicas para la industria y la ciencia. ','23',1),(2,'Clase 2','Pinturas, barnices, lacas; productos contra la herrumbre y el deterioro de la madera; colorantes, tintes; tintas de imprenta, tintas de marcado y tintas de grabado; resinas naturales en bruto; metales en hojas y en polvo para la pintura, la decoración, la imprenta y trabajos artísticos.','23',1),(4,'Clase 3','Productos cosméticos y preparaciones de tocador no medicinales; dentífricos no medicinales; productos de perfumería, aceites esenciales; preparaciones para blanquear y otras sustancias para lavar la ropa; preparaciones para limpiar, pulir, desengrasar y raspar.','23',1),(5,'Clase 4','Aceites y grasas para uso industrial, ceras; lubricantes; compuestos para absorber, rociar y asentar el polvo; combustibles y materiales de alumbrado; velas y mechas de iluminación.','23',1),(7,'Clase 5','Productos farmacéuticos, preparaciones para uso médico y veterinario; productos higiénicos y sanitarios para uso médico; alimentos y sustancias dietéticas para uso médico o veterinario, alimentos para bebés; suplementos alimenticios para personas o animales; emplastos, material para apósitos; material para empastes e impresiones dentales; desinfectantes; productos para eliminar animales dañinos; fungicidas, herbicidas.','23',1),(10,'Clase 6','Metales comunes y sus aleaciones, menas; materiales de construcción y edificación metálicos; construcciones transportables metálicas; cables e hilos metálicos no eléctricos; pequeños artículos de ferretería metálicos; contenedores metálicos de almacenamiento y transporte; cajas de caudales.','23',1),(11,'Clase 7','Máquinas, máquinas herramientas y herramientas mecánicas; motores, excepto motores para vehículos terrestres; acoplamientos y elementos de transmisión, excepto para vehículos terrestres; instrumentos agrícolas que no sean herramientas de mano que funcionan manualmente; incubadoras de huevos; distribuidores automáticos.','23',1),(12,'Clase 8','Herramientas e instrumentos de mano que funcionan manualmente; artículos de cuchillería, tenedores y cucharas; armas blancas; maquinillas de afeitar.','23',1),(13,'Clase 9','Aparatos e instrumentos científicos, de investigación, de navegación, geodésicos, fotográficos, cinematográficos, audiovisuales, ópticos, de pesaje, de medición, de señalización, de detección, de pruebas, de inspección, de salvamento y de enseñanza; aparatos e instrumentos de conducción, distribución, transformación, acumulación, regulación o control de la distribución o del consumo de electricidad; aparatos e instrumentos de grabación, transmisión, reproducción o tratamiento de sonidos, imágenes o datos; soportes grabados o descargables, software, soportes de registro y almacenamiento digitales o análogos vírgenes; mecanismos para aparatos que funcionan con monedas; cajas registradoras, dispositivos de cálculo; ordenadores y periféricos de ordenador; trajes de buceo, máscaras de buceo, tapones auditivos para buceo, pinzas nasales para submarinistas y nadadores, guantes de buceo, aparatos de respiración para la natación subacuática; extintores.','23',1),(14,'Clase 10','Aparatos e instrumentos quirúrgicos, médicos, odontológicos y veterinarios; miembros, ojos y dientes artificiales; artículos ortopédicos; material de sutura; dispositivos terapéuticos y de asistencia para personas discapacitadas; aparatos de masaje; aparatos, dispositivos y artículos de puericultura; aparatos, dispositivos y artículos para actividades sexuales.','23',1);
/*!40000 ALTER TABLE `tbl_clase_niza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contacto_registro`
--

DROP TABLE IF EXISTS `tbl_contacto_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_contacto_registro` (
  `con_reg_id` int NOT NULL AUTO_INCREMENT,
  `num_reg_id` int NOT NULL,
  `client_id` int NOT NULL,
  `contact_id` int DEFAULT NULL COMMENT 'FK to contacts module',
  PRIMARY KEY (`con_reg_id`),
  KEY `registros_contacto_registro_fk` (`num_reg_id`),
  CONSTRAINT `registros_contacto_registro_fk` FOREIGN KEY (`num_reg_id`) REFERENCES `tbl_tm_registros_principales` (`reg_num_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los contactos de los clientes en los registros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contacto_registro`
--

LOCK TABLES `tbl_contacto_registro` WRITE;
/*!40000 ALTER TABLE `tbl_contacto_registro` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contacto_registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_docu_solicitudes_marcas`
--

DROP TABLE IF EXISTS `tbl_docu_solicitudes_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_docu_solicitudes_marcas` (
  `doc_sol_id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `doc_id` int NOT NULL,
  PRIMARY KEY (`doc_sol_id`),
  KEY `documentos_doc_solicitud_fk` (`doc_id`),
  KEY `solicitudes_doc_solicitud_fk` (`solicitud_id`),
  CONSTRAINT `documentos_doc_solicitud_fk` FOREIGN KEY (`doc_id`) REFERENCES `tbl_tm_documentos` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitudes_doc_solicitud_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de documentos de solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_docu_solicitudes_marcas`
--

LOCK TABLES `tbl_docu_solicitudes_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_docu_solicitudes_marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_docu_solicitudes_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_documentos_accion_terceros`
--

DROP TABLE IF EXISTS `tbl_documentos_accion_terceros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_documentos_accion_terceros` (
  `doc_acc_id` int NOT NULL AUTO_INCREMENT,
  `accion_id` int NOT NULL,
  `doc_id` int NOT NULL,
  PRIMARY KEY (`doc_acc_id`),
  KEY `documentos_doc_acc_ter_fk` (`doc_id`),
  KEY `accion_id_doc_acc_ter_fk` (`accion_id`),
  CONSTRAINT `accion_id_doc_acc_ter_fk` FOREIGN KEY (`accion_id`) REFERENCES `tbl_acciones_marcas_terceros` (`accion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `documentos_doc_acc_ter_fk` FOREIGN KEY (`doc_id`) REFERENCES `tbl_tm_documentos` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de documentos de terceros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_documentos_accion_terceros`
--

LOCK TABLES `tbl_documentos_accion_terceros` WRITE;
/*!40000 ALTER TABLE `tbl_documentos_accion_terceros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_documentos_accion_terceros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_documentos_registros`
--

DROP TABLE IF EXISTS `tbl_documentos_registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_documentos_registros` (
  `doc_reg_id` int NOT NULL AUTO_INCREMENT,
  `reg_sol_id` int NOT NULL,
  `doc_id` int NOT NULL,
  PRIMARY KEY (`doc_reg_id`),
  KEY `documentos_documentos_registros_fk` (`doc_id`),
  KEY `registros_solicitantes_documentos_registros_fk` (`reg_sol_id`),
  CONSTRAINT `documentos_documentos_registros_fk` FOREIGN KEY (`doc_id`) REFERENCES `tbl_tm_documentos` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_solicitantes_documentos_registros_fk` FOREIGN KEY (`reg_sol_id`) REFERENCES `tbl_tm_registros_solicitantes` (`reg_sol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de registros de los documentos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_documentos_registros`
--

LOCK TABLES `tbl_documentos_registros` WRITE;
/*!40000 ALTER TABLE `tbl_documentos_registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_documentos_registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estados`
--

DROP TABLE IF EXISTS `tbl_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_estados` (
  `estado_id` int NOT NULL AUTO_INCREMENT,
  `materia_id` int NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `last_modified` date NOT NULL,
  `created_by` int DEFAULT NULL COMMENT 'FK to staff_id',
  `codigo` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`estado_id`),
  KEY `materias_estados_fk` (`materia_id`),
  CONSTRAINT `materias_estados_fk` FOREIGN KEY (`materia_id`) REFERENCES `tbl_materias` (`materia_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de estados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estados`
--

LOCK TABLES `tbl_estados` WRITE;
/*!40000 ALTER TABLE `tbl_estados` DISABLE KEYS */;
INSERT INTO `tbl_estados` VALUES (1,1,'0 - SOLICITUD NO INGRESADA AL SISTEMA ','2023-06-21','2023-06-21',1,0),(2,1,'1 - SOLICITUD PRESENTADA','2023-06-21','2023-06-21',1,1),(3,1,'101 - SOLICITUD CON EXAMEN DE FONDO/POR PUBLICAR DECISION','2023-06-21','2023-06-21',1,101),(4,1,'102 - SOLICITUD CON EXAMEN DE FONDO/ NEGAR','2023-06-21','2023-06-21',1,102),(5,4,'1-SOLICITUD DE PATENTE PRESENTADA.','2023-06-21','2023-06-21',1,1),(6,4,'210 -  SOLICITUD DE PRORROGA APROBADA NOTIFICADA','2023-06-21','2023-06-21',1,210);
/*!40000 ALTER TABLE `tbl_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estados_solicitudes`
--

DROP TABLE IF EXISTS `tbl_estados_solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_estados_solicitudes` (
  `cod_estado_id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de estados de solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estados_solicitudes`
--

LOCK TABLES `tbl_estados_solicitudes` WRITE;
/*!40000 ALTER TABLE `tbl_estados_solicitudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_estados_solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_eventos`
--

DROP TABLE IF EXISTS `tbl_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_eventos` (
  `eve_id` int NOT NULL AUTO_INCREMENT,
  `tipo_eve_id` int NOT NULL,
  `created_at` date NOT NULL,
  `staff_id` int DEFAULT NULL COMMENT 'FK with Staff_id',
  PRIMARY KEY (`eve_id`),
  KEY `tipo_evento_eventos_fk` (`tipo_eve_id`),
  CONSTRAINT `tipo_evento_eventos_fk` FOREIGN KEY (`tipo_eve_id`) REFERENCES `tbl_tipo_evento` (`tipo_eve_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de eventos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_eventos`
--

LOCK TABLES `tbl_eventos` WRITE;
/*!40000 ALTER TABLE `tbl_eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_eventos_patentes`
--

DROP TABLE IF EXISTS `tbl_eventos_patentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_eventos_patentes` (
  `eve_pat_id` int NOT NULL AUTO_INCREMENT,
  `eve_id` int NOT NULL,
  `sol_pat_id` int NOT NULL,
  PRIMARY KEY (`eve_pat_id`),
  KEY `eventos_patentes_eventos_fk` (`eve_id`),
  KEY `solicitud_patentes_patentes_eventos_fk` (`sol_pat_id`),
  CONSTRAINT `eventos_patentes_eventos_fk` FOREIGN KEY (`eve_id`) REFERENCES `tbl_eventos` (`eve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_patentes_patentes_eventos_fk` FOREIGN KEY (`sol_pat_id`) REFERENCES `tbl_tm_solicitud_patentes` (`sol_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los eventos de patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_eventos_patentes`
--

LOCK TABLES `tbl_eventos_patentes` WRITE;
/*!40000 ALTER TABLE `tbl_eventos_patentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_eventos_patentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_eventos_registros_sanitarios`
--

DROP TABLE IF EXISTS `tbl_eventos_registros_sanitarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_eventos_registros_sanitarios` (
  `reg_eve_id` int NOT NULL AUTO_INCREMENT,
  `reg_sol_id` int NOT NULL,
  `eve_id` int NOT NULL,
  PRIMARY KEY (`reg_eve_id`),
  KEY `eventos_registros_eventos_fk` (`eve_id`),
  KEY `registros_solicitantes_registros_eventos_fk` (`reg_sol_id`),
  CONSTRAINT `eventos_registros_eventos_fk` FOREIGN KEY (`eve_id`) REFERENCES `tbl_eventos` (`eve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_solicitantes_registros_eventos_fk` FOREIGN KEY (`reg_sol_id`) REFERENCES `tbl_tm_registros_solicitantes` (`reg_sol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de eventos de los registros sanitarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_eventos_registros_sanitarios`
--

LOCK TABLES `tbl_eventos_registros_sanitarios` WRITE;
/*!40000 ALTER TABLE `tbl_eventos_registros_sanitarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_eventos_registros_sanitarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_expedientes`
--

DROP TABLE IF EXISTS `tbl_expedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_expedientes` (
  `exp_id` int NOT NULL AUTO_INCREMENT,
  `solicitud` varchar(255) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `registro` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL,
  `certificado` varchar(255) NOT NULL,
  `fecha_emision_certificado` date NOT NULL,
  `fecha_vencimiento_certificado` date NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de todos los expedientes\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_expedientes`
--

LOCK TABLES `tbl_expedientes` WRITE;
/*!40000 ALTER TABLE `tbl_expedientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_expedientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_expedientes_marcas`
--

DROP TABLE IF EXISTS `tbl_expedientes_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_expedientes_marcas` (
  `mar_exp_id` int NOT NULL AUTO_INCREMENT,
  `exp_id` int NOT NULL,
  `solicitud_id` int NOT NULL,
  PRIMARY KEY (`mar_exp_id`),
  KEY `expediente_marcas_expedientes_fk` (`exp_id`),
  KEY `marcas_solicitudes_marcas_expedientes_fk` (`solicitud_id`),
  CONSTRAINT `expediente_marcas_expedientes_fk` FOREIGN KEY (`exp_id`) REFERENCES `tbl_expedientes` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marcas_solicitudes_marcas_expedientes_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de expedientes de marcas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_expedientes_marcas`
--

LOCK TABLES `tbl_expedientes_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_expedientes_marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_expedientes_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_expedientes_registros`
--

DROP TABLE IF EXISTS `tbl_expedientes_registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_expedientes_registros` (
  `exp_reg_id` int NOT NULL AUTO_INCREMENT,
  `reg_sol_id` int NOT NULL,
  `exp_id` int NOT NULL,
  PRIMARY KEY (`exp_reg_id`),
  KEY `expediente_expedientes_registros_fk` (`exp_id`),
  KEY `registros_solicitantes_expedientes_registros_fk` (`reg_sol_id`),
  CONSTRAINT `expediente_expedientes_registros_fk` FOREIGN KEY (`exp_id`) REFERENCES `tbl_expedientes` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_solicitantes_expedientes_registros_fk` FOREIGN KEY (`reg_sol_id`) REFERENCES `tbl_tm_registros_solicitantes` (`reg_sol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los expedientes de los registros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_expedientes_registros`
--

LOCK TABLES `tbl_expedientes_registros` WRITE;
/*!40000 ALTER TABLE `tbl_expedientes_registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_expedientes_registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_grupos_registros_sanitarios`
--

DROP TABLE IF EXISTS `tbl_grupos_registros_sanitarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_grupos_registros_sanitarios` (
  `grupo_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los grupos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_grupos_registros_sanitarios`
--

LOCK TABLES `tbl_grupos_registros_sanitarios` WRITE;
/*!40000 ALTER TABLE `tbl_grupos_registros_sanitarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_grupos_registros_sanitarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_marcas`
--

DROP TABLE IF EXISTS `tbl_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_marcas` (
  `marca_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `clase_niza_id` int NOT NULL,
  PRIMARY KEY (`marca_id`),
  KEY `clasniza_marcas_fk` (`clase_niza_id`),
  CONSTRAINT `clasniza_marcas_fk` FOREIGN KEY (`clase_niza_id`) REFERENCES `tbl_clase_niza` (`niza_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de marcas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_marcas`
--

LOCK TABLES `tbl_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_marcas_prioridad`
--

DROP TABLE IF EXISTS `tbl_marcas_prioridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_marcas_prioridad` (
  `prioridad_id` int NOT NULL AUTO_INCREMENT,
  `pais_id` int NOT NULL,
  `num_prioridad` varchar(255) NOT NULL,
  `fecha_prioridad` date NOT NULL,
  `solicitud_id` int NOT NULL,
  PRIMARY KEY (`prioridad_id`),
  KEY `solicitudes_prioridad_fk` (`solicitud_id`),
  KEY `paises_prioridad_fk` (`pais_id`),
  CONSTRAINT `paises_prioridad_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitudes_prioridad_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla de prioridad de la solicitud de marcas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_marcas_prioridad`
--

LOCK TABLES `tbl_marcas_prioridad` WRITE;
/*!40000 ALTER TABLE `tbl_marcas_prioridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marcas_prioridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_marcas_publicaciones`
--

DROP TABLE IF EXISTS `tbl_marcas_publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_marcas_publicaciones` (
  `pub_id` int NOT NULL AUTO_INCREMENT,
  `boletin_id` int NOT NULL,
  `tomo` varchar(10) NOT NULL,
  `pagina` varchar(2) NOT NULL,
  `tipo_pub_id` int NOT NULL,
  `solicitud_id` int NOT NULL,
  PRIMARY KEY (`pub_id`),
  KEY `tipo_publicacion_publicaciones_fk` (`tipo_pub_id`),
  KEY `marcas_solicitudes_marcas_publicaciones_fk` (`solicitud_id`),
  KEY `boletines_publicaciones_fk` (`boletin_id`),
  CONSTRAINT `boletines_publicaciones_fk` FOREIGN KEY (`boletin_id`) REFERENCES `tbl_tm_boletines` (`boletin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marcas_solicitudes_marcas_publicaciones_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_publicacion_publicaciones_fk` FOREIGN KEY (`tipo_pub_id`) REFERENCES `tbl_tipo_publicacion` (`tipo_pub_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de manejo de publicaciones de marcas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_marcas_publicaciones`
--

LOCK TABLES `tbl_marcas_publicaciones` WRITE;
/*!40000 ALTER TABLE `tbl_marcas_publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marcas_publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_marcas_solicitantes`
--

DROP TABLE IF EXISTS `tbl_marcas_solicitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_marcas_solicitantes` (
  `mar_sol_id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `solicit_id` int NOT NULL,
  PRIMARY KEY (`mar_sol_id`),
  KEY `solicitantes_marcas_solicitantes_fk` (`solicit_id`),
  KEY `solicitudes_marcas_solicitantes_fk` (`solicitud_id`),
  CONSTRAINT `solicitantes_marcas_solicitantes_fk` FOREIGN KEY (`solicit_id`) REFERENCES `tbl_solicitantes` (`solicit_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitudes_marcas_solicitantes_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de marcas de solicitantes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_marcas_solicitantes`
--

LOCK TABLES `tbl_marcas_solicitantes` WRITE;
/*!40000 ALTER TABLE `tbl_marcas_solicitantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marcas_solicitantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_marcas_solicitudes`
--

DROP TABLE IF EXISTS `tbl_marcas_solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_marcas_solicitudes` (
  `solicitud_id` int NOT NULL AUTO_INCREMENT,
  `reg_num_id` int NOT NULL,
  `tipo_id` int NOT NULL,
  `cod_estado_id` int NOT NULL,
  `primer_uso` date NOT NULL,
  `prueba_uso` date NOT NULL,
  `carpeta` varchar(40) NOT NULL,
  `numero_solicitud` varchar(40) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_certificado` date DEFAULT NULL,
  `num_certificado` varchar(255) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  PRIMARY KEY (`solicitud_id`),
  KEY `registros_marcas_solicitudes_fk` (`reg_num_id`),
  KEY `estados_solicitudes_solicitudes_fk_idx` (`cod_estado_id`),
  KEY `tipo_solicitud_solicitudes_fk` (`tipo_id`),
  CONSTRAINT `estados_solicitudes_solicitudes_fk` FOREIGN KEY (`cod_estado_id`) REFERENCES `tbl_estados` (`estado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_marcas_solicitudes_fk` FOREIGN KEY (`reg_num_id`) REFERENCES `tbl_tm_registros_principales` (`reg_num_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_solicitud_solicitudes_fk` FOREIGN KEY (`tipo_id`) REFERENCES `tbl_tipo_solicitud` (`tipo_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de las solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_marcas_solicitudes`
--

LOCK TABLES `tbl_marcas_solicitudes` WRITE;
/*!40000 ALTER TABLE `tbl_marcas_solicitudes` DISABLE KEYS */;
INSERT INTO `tbl_marcas_solicitudes` VALUES (3,2,1,1,'0000-00-00','0000-00-00','','','0000-00-00','0000-00-00','0000-00-00','','0000-00-00');
/*!40000 ALTER TABLE `tbl_marcas_solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materias`
--

DROP TABLE IF EXISTS `tbl_materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_materias` (
  `materia_id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`materia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de las materias';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materias`
--

LOCK TABLES `tbl_materias` WRITE;
/*!40000 ALTER TABLE `tbl_materias` DISABLE KEYS */;
INSERT INTO `tbl_materias` VALUES (1,'General'),(2,'Marcas'),(3,'Oposiciones'),(4,'Patentes');
/*!40000 ALTER TABLE `tbl_materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_niza_productos`
--

DROP TABLE IF EXISTS `tbl_niza_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_niza_productos` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `clase_niza_id` int NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `clasniza_niza_productos_fk` (`clase_niza_id`),
  CONSTRAINT `clasniza_niza_productos_fk` FOREIGN KEY (`clase_niza_id`) REFERENCES `tbl_clase_niza` (`niza_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de productos permitidos por la clase niza';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_niza_productos`
--

LOCK TABLES `tbl_niza_productos` WRITE;
/*!40000 ALTER TABLE `tbl_niza_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_niza_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_oficinas`
--

DROP TABLE IF EXISTS `tbl_oficinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_oficinas` (
  `oficina_id` int NOT NULL,
  `direccion` varchar(512) NOT NULL,
  PRIMARY KEY (`oficina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de Oficinas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_oficinas`
--

LOCK TABLES `tbl_oficinas` WRITE;
/*!40000 ALTER TABLE `tbl_oficinas` DISABLE KEYS */;
INSERT INTO `tbl_oficinas` VALUES (1,'ECV Asociados');
/*!40000 ALTER TABLE `tbl_oficinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_oficinas_contactos`
--

DROP TABLE IF EXISTS `tbl_oficinas_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_oficinas_contactos` (
  `ofi_cont_id` int NOT NULL AUTO_INCREMENT,
  `oficina_id` int NOT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`ofi_cont_id`),
  KEY `oficinas_oficinas_contactos_fk` (`oficina_id`),
  CONSTRAINT `oficinas_oficinas_contactos_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficinas` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de contactos de oficinas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_oficinas_contactos`
--

LOCK TABLES `tbl_oficinas_contactos` WRITE;
/*!40000 ALTER TABLE `tbl_oficinas_contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_oficinas_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paises`
--

DROP TABLE IF EXISTS `tbl_paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_paises` (
  `pais_id` int NOT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`pais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de paises';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paises`
--

LOCK TABLES `tbl_paises` WRITE;
/*!40000 ALTER TABLE `tbl_paises` DISABLE KEYS */;
INSERT INTO `tbl_paises` VALUES (1,'Andorra '),(2,'Emiratos Árabes Unidos '),(3,'Afganistán '),(4,'Antigua y Barbuda '),(5,'Anguila '),(6,'Albania '),(7,'Armenia '),(8,'Antillas Holandesas '),(9,'Angola '),(10,'Antártida '),(11,'Argentina '),(12,'Samoa Americana '),(13,'Austria '),(14,'Australia '),(15,'Aruba '),(16,'Azerbaiyán '),(17,'Bosnia y Herzegovina '),(18,'Barbados '),(19,'Bangladesh '),(20,'Bélgica '),(21,'Burkina Faso '),(22,'Bahrein '),(23,'Burundi '),(24,'Benin '),(25,'Bermudas '),(26,'Bolivia '),(27,'Brasil '),(28,'Bahamas '),(29,'Bután '),(30,'Isla Bouvet '),(31,'Bulgaria '),(32,'Botswana '),(33,'Brunei Darussalam '),(34,'Bielorrusia '),(35,'Belice '),(36,'Canadá '),(37,'Cocos (Keeling) '),(38,'República Centroafricana '),(39,'Congo '),(40,'Suiza '),(41,'Cote D\'Ivoire (Costa de Marfil) '),(42,'Islas Cook '),(43,'Chile '),(44,'Camerún '),(45,'China '),(46,'Colombia '),(47,'Costa Rica '),(48,'Cuba '),(49,'Cabo Verde '),(50,'Isla de Navidad '),(51,'Chipre '),(52,'República Checa '),(53,'Alemania '),(54,'Djibouti '),(55,'Dinamarca '),(56,'Dominica '),(57,'República Dominicana '),(58,'Argelia '),(59,'Ecuador '),(60,'Estonia '),(61,'Egipto '),(62,'Sáhara Occidental '),(63,'Eritrea '),(64,'España '),(65,'Etiopía '),(66,'Finlandia '),(67,'Fiji '),(68,'Islas Malvinas (Falkland) '),(69,'Micronesia '),(70,'Islas Feroe '),(71,'Francia '),(72,'Gabón '),(73,'Gran Bretaña (Reino Unido) '),(74,'Granada '),(75,'Georgia '),(76,'Guayana Francesa'),(77,'Ghana '),(78,'Gibraltar '),(79,'Groenlandia '),(80,'Gambia '),(81,'Guinea '),(82,'Guadalupe '),(83,'Guinea Ecuatorial '),(84,'Grecia '),(85,'Georgia del Sur y Islas Sandwich del Sur '),(86,'Guatemala '),(87,'Guam '),(88,'Guinea-Bissau '),(89,'Guayana '),(90,'Hong Kong '),(91,'Islas Heard y McDonald '),(92,'Honduras '),(93,'Croacia'),(94,'Haití '),(95,'Hungría '),(96,'Indonesia '),(97,'Irlanda '),(98,'Israel '),(99,'India '),(100,'Territorio Británico del Océano Índico'),(101,'Irak '),(102,'Irán '),(103,'Islandia '),(104,'Italia '),(105,'Jamaica '),(106,'Jordania '),(107,'Japón '),(108,'Kenia '),(109,'Kirguistán '),(110,'Camboya '),(111,'Kiribati '),(112,'Comoras '),(113,'Saint Kitts y Nevis '),(114,'Corea del Norte '),(115,'Corea del Sur '),(116,'Kuwait '),(117,'Las Islas Caimán '),(118,'Kazajstán '),(119,'Laos '),(120,'Líbano '),(121,'Santa Lucía '),(122,'Liechtenstein '),(123,'Sri Lanka '),(124,'Liberia '),(125,'Lesoto '),(126,'Lituania '),(127,'Luxemburgo '),(128,'Letonia '),(129,'Libia '),(130,'Marruecos '),(131,'Mónaco '),(132,'Moldavia '),(133,'Madagascar '),(134,'Islas Marshall '),(135,'Macedonia '),(136,'Malí '),(137,'Myanmar '),(138,'Mongolia '),(139,'Macao '),(140,'Islas Marianas del Norte '),(141,'Martinica '),(142,'Mauritania '),(143,'Montserrat '),(144,'Malta '),(145,'Mauricio '),(146,'Maldivas '),(147,'Malawi '),(148,'México '),(149,'Malasia '),(150,'Mozambique '),(151,'Namibia '),(152,'Nueva Caledonia '),(153,'Níger '),(154,'Norfolk Island '),(155,'Nigeria '),(156,'Nicaragua '),(157,'Países Bajos '),(158,'Noruega '),(159,'Nepal '),(160,'Nauru '),(161,'Niue '),(162,'Nueva Zelanda '),(163,'Omán '),(164,'Panamá '),(165,'Perú '),(166,'Polinesia francés '),(167,'Papua Nueva Guinea '),(168,'Filipinas '),(169,'Pakistán '),(170,'Polonia '),(171,'San Pedro y Miquelón '),(172,'Pitcairn '),(173,'Puerto Rico '),(174,'Portugal '),(175,'Palau '),(176,'Paraguay '),(177,'Qatar '),(178,'Reunión '),(179,'Rumania '),(180,'La Federación de Rusia '),(181,'Ruanda '),(182,'Arabia Saudita '),(183,'Las Islas Salomón '),(184,'Seychelles '),(185,'Sudán '),(186,'Suecia '),(187,'Singapur '),(188,'Santa Elena '),(189,'Eslovenia '),(190,'Svalbard y Jan Mayen '),(191,'República Eslovaca '),(192,'Sierra Leona '),(193,'San Marino '),(194,'Senegal '),(195,'Somalia '),(196,'Suriname '),(197,'Santo Tomé y Príncipe '),(198,'El Salvador '),(199,'Siria '),(200,'Swazilandia '),(201,'Islas Turcas y Caicos '),(202,'Chad '),(203,'Territorios del sur francés '),(204,'Togo '),(205,'Tailandia '),(206,'Tayikistán '),(207,'Tokelau '),(208,'Turkmenistán '),(209,'Túnez '),(210,'Tonga '),(211,'Timor Oriental '),(212,'Turquía '),(213,'Trinidad y Tobago '),(214,'Tuvalu '),(215,'Taiwan '),(216,'Tanzania '),(217,'Ucrania '),(218,'Uganda '),(219,'Reino Unido '),(220,'Islas menores  de EE.UU.'),(221,'Estados Unidos de América (EE.UU.) '),(222,'Uruguay '),(223,'Uzbekistán '),(224,'Ciudad del Vaticano '),(225,'San Vicente y las Granadinas '),(226,'Venezuela '),(227,'Islas Vírgenes (Británicas) '),(228,'Vietnam '),(229,'Vanuatu '),(230,'Islas Wallis y Futuna '),(231,'Samoa '),(232,'Yemen '),(233,'Mayotte '),(234,'Yugoslavia '),(235,'Sudáfrica '),(236,'Zambia '),(237,'Zaire '),(238,'Zimbabue ');
/*!40000 ALTER TABLE `tbl_paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patentes_expediente`
--

DROP TABLE IF EXISTS `tbl_patentes_expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_patentes_expediente` (
  `pat_exp_id` int NOT NULL AUTO_INCREMENT,
  `exp_id` int NOT NULL,
  `sol_pat_id` int NOT NULL,
  `nro_soli_pat` varchar(255) DEFAULT NULL COMMENT 'Nro solicitud SAPI',
  `fecha_solicitud` date NOT NULL,
  `nro_publicacion` varchar(255) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  PRIMARY KEY (`pat_exp_id`),
  KEY `expediente_patentes_expediente_fk` (`exp_id`),
  KEY `solicitud_patentes_patentes_expediente_fk` (`sol_pat_id`),
  CONSTRAINT `expediente_patentes_expediente_fk` FOREIGN KEY (`exp_id`) REFERENCES `tbl_expedientes` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_patentes_patentes_expediente_fk` FOREIGN KEY (`sol_pat_id`) REFERENCES `tbl_tm_solicitud_patentes` (`sol_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los expedientes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patentes_expediente`
--

LOCK TABLES `tbl_patentes_expediente` WRITE;
/*!40000 ALTER TABLE `tbl_patentes_expediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_patentes_expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patentes_inventores`
--

DROP TABLE IF EXISTS `tbl_patentes_inventores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_patentes_inventores` (
  `inventor_id` int NOT NULL AUTO_INCREMENT,
  `pais_id` int NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellid` varchar(60) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `nacionalidad` varchar(60) NOT NULL,
  PRIMARY KEY (`inventor_id`),
  KEY `paises_patentes_inventores_fk` (`pais_id`),
  CONSTRAINT `paises_patentes_inventores_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de inventores';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patentes_inventores`
--

LOCK TABLES `tbl_patentes_inventores` WRITE;
/*!40000 ALTER TABLE `tbl_patentes_inventores` DISABLE KEYS */;
INSERT INTO `tbl_patentes_inventores` VALUES (5,1,'Bryan','Useche','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','Venezolana');
/*!40000 ALTER TABLE `tbl_patentes_inventores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patentes_prioridad`
--

DROP TABLE IF EXISTS `tbl_patentes_prioridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_patentes_prioridad` (
  `pri_pat_id` int NOT NULL AUTO_INCREMENT,
  `sol_pat_id` int NOT NULL,
  `fecha` date NOT NULL,
  `pais_id` int NOT NULL,
  PRIMARY KEY (`pri_pat_id`),
  KEY `paises_patentes_prioridad_fk` (`pais_id`),
  KEY `solicitud_patentes_patentes_prioridad_fk` (`sol_pat_id`),
  CONSTRAINT `paises_patentes_prioridad_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_patentes_patentes_prioridad_fk` FOREIGN KEY (`sol_pat_id`) REFERENCES `tbl_tm_solicitud_patentes` (`sol_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de las prioridades de patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patentes_prioridad`
--

LOCK TABLES `tbl_patentes_prioridad` WRITE;
/*!40000 ALTER TABLE `tbl_patentes_prioridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_patentes_prioridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patentes_publicaciones`
--

DROP TABLE IF EXISTS `tbl_patentes_publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_patentes_publicaciones` (
  `pat_pub_id` int NOT NULL AUTO_INCREMENT,
  `tipo_pub_id` int NOT NULL,
  `boletin_id` int NOT NULL,
  `tomo` int NOT NULL,
  `pagina` int NOT NULL,
  `sol_pat_id` int NOT NULL,
  PRIMARY KEY (`pat_pub_id`),
  KEY `tipo_publicacion_patentes_publicaciones_fk` (`tipo_pub_id`),
  KEY `solicitud_patentes_patentes_publicaciones_fk` (`sol_pat_id`),
  KEY `boletines_patentes_publicaciones_fk` (`boletin_id`),
  CONSTRAINT `boletines_patentes_publicaciones_fk` FOREIGN KEY (`boletin_id`) REFERENCES `tbl_tm_boletines` (`boletin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_patentes_patentes_publicaciones_fk` FOREIGN KEY (`sol_pat_id`) REFERENCES `tbl_tm_solicitud_patentes` (`sol_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_publicacion_patentes_publicaciones_fk` FOREIGN KEY (`tipo_pub_id`) REFERENCES `tbl_tipo_publicacion` (`tipo_pub_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de las publicaciones de patentes.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patentes_publicaciones`
--

LOCK TABLES `tbl_patentes_publicaciones` WRITE;
/*!40000 ALTER TABLE `tbl_patentes_publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_patentes_publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patentes_solicitantes`
--

DROP TABLE IF EXISTS `tbl_patentes_solicitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_patentes_solicitantes` (
  `pat_solic_id` int NOT NULL AUTO_INCREMENT,
  `sol_pat_id` int NOT NULL,
  `pat_sol_id` int NOT NULL,
  PRIMARY KEY (`pat_solic_id`),
  KEY `solicitantes_patentes_solicitantes_fk` (`pat_sol_id`),
  KEY `solicitud_patentes_patentes_solicitantes_fk` (`sol_pat_id`),
  CONSTRAINT `solicitantes_patentes_solicitantes_fk` FOREIGN KEY (`pat_sol_id`) REFERENCES `tbl_solicitantes` (`solicit_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_patentes_patentes_solicitantes_fk` FOREIGN KEY (`sol_pat_id`) REFERENCES `tbl_tm_solicitud_patentes` (`sol_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de los solicitantes de patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patentes_solicitantes`
--

LOCK TABLES `tbl_patentes_solicitantes` WRITE;
/*!40000 ALTER TABLE `tbl_patentes_solicitantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_patentes_solicitantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_registros_sanitarios`
--

DROP TABLE IF EXISTS `tbl_registros_sanitarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_registros_sanitarios` (
  `reg_san_id` int NOT NULL AUTO_INCREMENT,
  `reg_num_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `pais_id` int NOT NULL,
  `grupo_id` int NOT NULL,
  PRIMARY KEY (`reg_san_id`),
  KEY `registros_grupos_registros_sanitarios_fk` (`grupo_id`),
  KEY `registros_registros_sanitarios_fk` (`reg_num_id`),
  KEY `paises_registros_sanitarios_fk` (`pais_id`),
  CONSTRAINT `paises_registros_sanitarios_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_grupos_registros_sanitarios_fk` FOREIGN KEY (`grupo_id`) REFERENCES `tbl_grupos_registros_sanitarios` (`grupo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_registros_sanitarios_fk` FOREIGN KEY (`reg_num_id`) REFERENCES `tbl_tm_registros_principales` (`reg_num_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los registros sanitarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_registros_sanitarios`
--

LOCK TABLES `tbl_registros_sanitarios` WRITE;
/*!40000 ALTER TABLE `tbl_registros_sanitarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_registros_sanitarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_servicios`
--

DROP TABLE IF EXISTS `tbl_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_servicios` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `materia_id` int NOT NULL,
  `created_by` int DEFAULT NULL COMMENT 'FK with staff_id',
  `descripcion` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `materias_servicios_fk` (`materia_id`),
  CONSTRAINT `materias_servicios_fk` FOREIGN KEY (`materia_id`) REFERENCES `tbl_materias` (`materia_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los servicios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_servicios`
--

LOCK TABLES `tbl_servicios` WRITE;
/*!40000 ALTER TABLE `tbl_servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_signos_solicitud_marcas`
--

DROP TABLE IF EXISTS `tbl_signos_solicitud_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_signos_solicitud_marcas` (
  `signos_solicitud_id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `tipo_signo_id` int NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `clasificacion` varchar(255) NOT NULL,
  PRIMARY KEY (`signos_solicitud_id`),
  KEY `tipos_signos_signos_solicitud_fk` (`tipo_signo_id`),
  KEY `tipo_solicitud_signos_fk` (`solicitud_id`),
  CONSTRAINT `tipo_solicitud_signos_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipos_signos_signos_solicitud_fk` FOREIGN KEY (`tipo_signo_id`) REFERENCES `tbl_tipos_signos` (`tipos_signo_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de signos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_signos_solicitud_marcas`
--

LOCK TABLES `tbl_signos_solicitud_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_signos_solicitud_marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_signos_solicitud_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_solicitantes`
--

DROP TABLE IF EXISTS `tbl_solicitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_solicitantes` (
  `solicit_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`solicit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de los solicitantes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_solicitantes`
--

LOCK TABLES `tbl_solicitantes` WRITE;
/*!40000 ALTER TABLE `tbl_solicitantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_solicitantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_solicitudes_clases`
--

DROP TABLE IF EXISTS `tbl_solicitudes_clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_solicitudes_clases` (
  `sol_cla_id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `clase_niza_id` int NOT NULL,
  PRIMARY KEY (`sol_cla_id`),
  KEY `solicitudes_solicitudes_clases_fk` (`solicitud_id`),
  KEY `clasniza_solicitudes_clases_fk` (`clase_niza_id`),
  CONSTRAINT `clasniza_solicitudes_clases_fk` FOREIGN KEY (`clase_niza_id`) REFERENCES `tbl_clase_niza` (`niza_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitudes_solicitudes_clases_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de las clases de niza en las solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_solicitudes_clases`
--

LOCK TABLES `tbl_solicitudes_clases` WRITE;
/*!40000 ALTER TABLE `tbl_solicitudes_clases` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_solicitudes_clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_solicitudes_eventos`
--

DROP TABLE IF EXISTS `tbl_solicitudes_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_solicitudes_eventos` (
  `sol_eve_id` int NOT NULL AUTO_INCREMENT,
  `eve_id` int NOT NULL,
  `solicitud_id` int NOT NULL,
  PRIMARY KEY (`sol_eve_id`),
  KEY `eventos_solicitudes_eventos_fk` (`eve_id`),
  KEY `marcas_solicitudes_solicitudes_eventos_fk` (`solicitud_id`),
  CONSTRAINT `eventos_solicitudes_eventos_fk` FOREIGN KEY (`eve_id`) REFERENCES `tbl_eventos` (`eve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marcas_solicitudes_solicitudes_eventos_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de registro de los eventos en las solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_solicitudes_eventos`
--

LOCK TABLES `tbl_solicitudes_eventos` WRITE;
/*!40000 ALTER TABLE `tbl_solicitudes_eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_solicitudes_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_anexo`
--

DROP TABLE IF EXISTS `tbl_tipo_anexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipo_anexo` (
  `tip_ax_id` int NOT NULL AUTO_INCREMENT,
  `nombre_anexo` varchar(60) NOT NULL,
  PRIMARY KEY (`tip_ax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla con los tipos de anexos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_anexo`
--

LOCK TABLES `tbl_tipo_anexo` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_anexo` DISABLE KEYS */;
INSERT INTO `tbl_tipo_anexo` VALUES (7,'Renovacion'),(8,'Cesion'),(9,'Licencia'),(10,'Fusion'),(11,'Cambio Nombre'),(12,'Cambio Domicilio');
/*!40000 ALTER TABLE `tbl_tipo_anexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_busqueda`
--

DROP TABLE IF EXISTS `tbl_tipo_busqueda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipo_busqueda` (
  `tipo_busq_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`tipo_busq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de los tipo de busqueda';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_busqueda`
--

LOCK TABLES `tbl_tipo_busqueda` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_busqueda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_busqueda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_evento`
--

DROP TABLE IF EXISTS `tbl_tipo_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipo_evento` (
  `tipo_eve_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(160) NOT NULL,
  `materia_id` int NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL,
  `created_by` int DEFAULT NULL COMMENT 'FK with staff_id',
  PRIMARY KEY (`tipo_eve_id`),
  KEY `materias_tipo_evento_fk` (`materia_id`),
  CONSTRAINT `materias_tipo_evento_fk` FOREIGN KEY (`materia_id`) REFERENCES `tbl_materias` (`materia_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra  de eventos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_evento`
--

LOCK TABLES `tbl_tipo_evento` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_evento` DISABLE KEYS */;
INSERT INTO `tbl_tipo_evento` VALUES (9,'AMPLIACION DE FORMULACION DE OPOSICION ',1,'2023-06-21','2023-07-04',1),(10,'AMPLIACIÓN DE CONTESTACIÓN DE OPOSICIÓN',1,'2023-06-21','2023-07-04',1),(11,'AMPLIACIÓN DEL RECURSO DE RECONSIDERACIÓN',1,'2023-06-21','2023-06-21',1),(12,'AMPLIACIÓN Y AGILIZACIÓN DE RECURSO DE RECONSIDERACIÓN',1,'2023-06-21','2023-06-21',1),(13,'ARCHIVO MUERTO',1,'2023-06-21','2023-06-21',1),(14,'CERTIFICACIÓN DE CERTIFICADO DE PRIORIDAD EXTRANJERA',4,'2023-06-21','2023-06-21',1),(21,'BUSQUEDA DISPONIBLE ',1,'2023-07-04','2023-07-04',1);
/*!40000 ALTER TABLE `tbl_tipo_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_publicacion`
--

DROP TABLE IF EXISTS `tbl_tipo_publicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipo_publicacion` (
  `tipo_pub_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`tipo_pub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de tipo de publicacion';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_publicacion`
--

LOCK TABLES `tbl_tipo_publicacion` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_publicacion` DISABLE KEYS */;
INSERT INTO `tbl_tipo_publicacion` VALUES (1,'Aviso de Nulidad'),(2,'Caduca'),(3,'Cancelacion por falta de uso'),(4,'Correccion de Error'),(5,'Desistida Publicada'),(6,'Ratificacion Observada');
/*!40000 ALTER TABLE `tbl_tipo_publicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_registro`
--

DROP TABLE IF EXISTS `tbl_tipo_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipo_registro` (
  `tipo_registro_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `materia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`tipo_registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_registro`
--

LOCK TABLES `tbl_tipo_registro` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_registro` DISABLE KEYS */;
INSERT INTO `tbl_tipo_registro` VALUES (1,'SISTEMA UNICLASE','MARCAS'),(2,'SISTEMA MULTICLASE','MARCAS'),(3,'PROTOCOLO MADRID','MARCAS');
/*!40000 ALTER TABLE `tbl_tipo_registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_solicitud`
--

DROP TABLE IF EXISTS `tbl_tipo_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipo_solicitud` (
  `tipo_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla Maestra de tipo de solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_solicitud`
--

LOCK TABLES `tbl_tipo_solicitud` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_solicitud` DISABLE KEYS */;
INSERT INTO `tbl_tipo_solicitud` VALUES (1,'Marca de Producto'),(2,'Marca de Servicio'),(3,'Lema Comercial'),(4,'Nombre Comercial'),(5,'Enseña Comercial'),(6,'Denominacion de Origen'),(7,'Nombre de Dominio');
/*!40000 ALTER TABLE `tbl_tipo_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipos_participacion`
--

DROP TABLE IF EXISTS `tbl_tipos_participacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipos_participacion` (
  `tipo_part_id` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(60) NOT NULL,
  `tip_ax_id` int NOT NULL,
  PRIMARY KEY (`tipo_part_id`),
  KEY `tipo_anexo_part_id_fk` (`tip_ax_id`),
  CONSTRAINT `tipo_anexo_part_id_fk` FOREIGN KEY (`tip_ax_id`) REFERENCES `tbl_tipo_anexo` (`tip_ax_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de los tipos de participacion';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipos_participacion`
--

LOCK TABLES `tbl_tipos_participacion` WRITE;
/*!40000 ALTER TABLE `tbl_tipos_participacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipos_participacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipos_patentes`
--

DROP TABLE IF EXISTS `tbl_tipos_patentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipos_patentes` (
  `tip_pat_id` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(60) NOT NULL,
  PRIMARY KEY (`tip_pat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de tipos de patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipos_patentes`
--

LOCK TABLES `tbl_tipos_patentes` WRITE;
/*!40000 ALTER TABLE `tbl_tipos_patentes` DISABLE KEYS */;
INSERT INTO `tbl_tipos_patentes` VALUES (2,'Diseño Industrial'),(3,'PCT'),(4,'Modelo de Utilidad'),(5,'Invención');
/*!40000 ALTER TABLE `tbl_tipos_patentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipos_signos`
--

DROP TABLE IF EXISTS `tbl_tipos_signos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tipos_signos` (
  `tipos_signo_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`tipos_signo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de los tipos de signos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipos_signos`
--

LOCK TABLES `tbl_tipos_signos` WRITE;
/*!40000 ALTER TABLE `tbl_tipos_signos` DISABLE KEYS */;
INSERT INTO `tbl_tipos_signos` VALUES (1,'Nominativa'),(2,'Mixta'),(3,'Figurativa'),(4,'Tridimensional'),(5,'Sonora'),(6,'Olfativa');
/*!40000 ALTER TABLE `tbl_tipos_signos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_anexos`
--

DROP TABLE IF EXISTS `tbl_tm_anexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_anexos` (
  `anexo_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `oficina_gestora` int NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `nro_resolucion` int NOT NULL,
  `cod_estado_id` int NOT NULL,
  PRIMARY KEY (`anexo_id`),
  KEY `oficinas_anexos_solicitudes_fk` (`oficina_gestora`),
  KEY `estados_solicitudes_anexos_solicitudes_fk` (`cod_estado_id`),
  CONSTRAINT `estados_solicitudes_anexos_solicitudes_fk` FOREIGN KEY (`cod_estado_id`) REFERENCES `tbl_estados_solicitudes` (`cod_estado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `oficinas_anexos_solicitudes_fk` FOREIGN KEY (`oficina_gestora`) REFERENCES `tbl_oficinas` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de los anexos de las solicitudes y patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_anexos`
--

LOCK TABLES `tbl_tm_anexos` WRITE;
/*!40000 ALTER TABLE `tbl_tm_anexos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tm_anexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_boletines`
--

DROP TABLE IF EXISTS `tbl_tm_boletines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_boletines` (
  `boletin_id` int NOT NULL AUTO_INCREMENT,
  `fecha_publicacion` date NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `pais_id` int NOT NULL,
  PRIMARY KEY (`boletin_id`),
  KEY `paises_boletines_fk` (`pais_id`),
  CONSTRAINT `paises_boletines_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=652 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla de almacenamiento de boletines';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_boletines`
--

LOCK TABLES `tbl_tm_boletines` WRITE;
/*!40000 ALTER TABLE `tbl_tm_boletines` DISABLE KEYS */;
INSERT INTO `tbl_tm_boletines` VALUES (0,'2005-12-12','000',226),(305,'1900-01-01','305',226),(364,'1991-12-13','364',226);
/*!40000 ALTER TABLE `tbl_tm_boletines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_documentos`
--

DROP TABLE IF EXISTS `tbl_tm_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_documentos` (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `doc_hash` varchar(64) DEFAULT NULL COMMENT 'Must be sha256 or sha512',
  `path` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `comentarios` varchar(4000) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int DEFAULT NULL COMMENT 'FK with Staff member',
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de rutas de documentos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_documentos`
--

LOCK TABLES `tbl_tm_documentos` WRITE;
/*!40000 ALTER TABLE `tbl_tm_documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tm_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_paises_designados`
--

DROP TABLE IF EXISTS `tbl_tm_paises_designados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_paises_designados` (
  `pais_design_id` int NOT NULL AUTO_INCREMENT,
  `solicitud_id` int NOT NULL,
  `pais_id` int NOT NULL,
  PRIMARY KEY (`pais_design_id`),
  KEY `tipo_solicitud_paises_designados_fk` (`solicitud_id`),
  KEY `paises_paises_designados_fk` (`pais_id`),
  CONSTRAINT `paises_paises_designados_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_solicitud_paises_designados_fk` FOREIGN KEY (`solicitud_id`) REFERENCES `tbl_marcas_solicitudes` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla de paises designados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_paises_designados`
--

LOCK TABLES `tbl_tm_paises_designados` WRITE;
/*!40000 ALTER TABLE `tbl_tm_paises_designados` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tm_paises_designados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_registros_principales`
--

DROP TABLE IF EXISTS `tbl_tm_registros_principales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_registros_principales` (
  `reg_num_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int DEFAULT NULL COMMENT 'FK to staff_id',
  `client_id` int DEFAULT NULL COMMENT 'FK with Client_id',
  `oficina_id` int NOT NULL,
  `ref_interna` varchar(40) NOT NULL,
  `ref_cliente` varchar(40) NOT NULL,
  `carpeta` varchar(40) NOT NULL,
  `libro` int NOT NULL,
  `tomo` int NOT NULL,
  `folio` int NOT NULL,
  `comentarios` varchar(4000) NOT NULL,
  `tipo_registro_id` int NOT NULL,
  PRIMARY KEY (`reg_num_id`),
  KEY `oficinas_registros_fk` (`oficina_id`),
  KEY `tipo_registro_fk_idx` (`tipo_registro_id`),
  CONSTRAINT `oficinas_registros_fk` FOREIGN KEY (`oficina_id`) REFERENCES `tbl_oficinas` (`oficina_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipo_registro_fk` FOREIGN KEY (`tipo_registro_id`) REFERENCES `tbl_tipo_registro` (`tipo_registro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenaje de los elementos basicos de las solicitudes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_registros_principales`
--

LOCK TABLES `tbl_tm_registros_principales` WRITE;
/*!40000 ALTER TABLE `tbl_tm_registros_principales` DISABLE KEYS */;
INSERT INTO `tbl_tm_registros_principales` VALUES (2,1,1,1,'','','',0,0,0,'',1);
/*!40000 ALTER TABLE `tbl_tm_registros_principales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_registros_solicitantes`
--

DROP TABLE IF EXISTS `tbl_tm_registros_solicitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_registros_solicitantes` (
  `reg_sol_id` int NOT NULL AUTO_INCREMENT,
  `reg_san_id` int NOT NULL,
  `pais_id` int NOT NULL,
  `marca_id` int NOT NULL,
  `client_id` int DEFAULT NULL COMMENT 'FK to client_id',
  `fabricante_nombre` varchar(60) NOT NULL,
  `fabricante_ciudad` varchar(60) NOT NULL,
  `fecha_orden_muestra` date NOT NULL,
  `fecha_presentacion_muestra` date NOT NULL,
  `comentarios` varchar(4000) NOT NULL,
  PRIMARY KEY (`reg_sol_id`),
  KEY `paises_registros_solicitantes_fk` (`pais_id`),
  KEY `registros_sanitarios_registros_solicitantes_fk` (`reg_san_id`),
  KEY `marcas_registros_solicitantes_fk` (`marca_id`),
  CONSTRAINT `marcas_registros_solicitantes_fk` FOREIGN KEY (`marca_id`) REFERENCES `tbl_marcas` (`marca_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `paises_registros_solicitantes_fk` FOREIGN KEY (`pais_id`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_sanitarios_registros_solicitantes_fk` FOREIGN KEY (`reg_san_id`) REFERENCES `tbl_registros_sanitarios` (`reg_san_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de almacenamiento de los registros de los solicitantes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_registros_solicitantes`
--

LOCK TABLES `tbl_tm_registros_solicitantes` WRITE;
/*!40000 ALTER TABLE `tbl_tm_registros_solicitantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tm_registros_solicitantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tm_solicitud_patentes`
--

DROP TABLE IF EXISTS `tbl_tm_solicitud_patentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tm_solicitud_patentes` (
  `sol_pat_id` int NOT NULL AUTO_INCREMENT,
  `tip_pat_id` int NOT NULL,
  `pais_pat` int NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `clasificacion` varchar(40) NOT NULL,
  `reg_num_id` int NOT NULL,
  PRIMARY KEY (`sol_pat_id`),
  KEY `tipos_patentes_solicitud_patentes_fk` (`tip_pat_id`),
  KEY `registros_solicitud_patentes_fk` (`reg_num_id`),
  KEY `paises_solicitud_patentes_fk` (`pais_pat`),
  CONSTRAINT `paises_solicitud_patentes_fk` FOREIGN KEY (`pais_pat`) REFERENCES `tbl_paises` (`pais_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_solicitud_patentes_fk` FOREIGN KEY (`reg_num_id`) REFERENCES `tbl_tm_registros_principales` (`reg_num_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipos_patentes_solicitud_patentes_fk` FOREIGN KEY (`tip_pat_id`) REFERENCES `tbl_tipos_patentes` (`tip_pat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla de solicitudes de patentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tm_solicitud_patentes`
--

LOCK TABLES `tbl_tm_solicitud_patentes` WRITE;
/*!40000 ALTER TABLE `tbl_tm_solicitud_patentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tm_solicitud_patentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblactivity_log`
--

DROP TABLE IF EXISTS `tblactivity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblactivity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `staffid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staffid` (`staffid`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblactivity_log`
--

LOCK TABLES `tblactivity_log` WRITE;
/*!40000 ALTER TABLE `tblactivity_log` DISABLE KEYS */;
INSERT INTO `tblactivity_log` VALUES (1,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-22 09:10:06','Administrador Local'),(2,'New Customer Group Created [ID:1, Name:IT]','2023-05-22 10:18:51','Administrador Local'),(3,'New Client Created [ID: 1, From Staff: 1]','2023-05-22 10:19:41','Administrador Local'),(4,'Non Existing User Tried to Login [Email: admin@some-domain.net, Is Staff Member: No, IP: 127.0.0.1]','2023-05-22 10:28:30','Administrador Local'),(5,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-23 08:32:49','Administrador Local'),(6,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-23 08:32:49','Administrador Local'),(7,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-25 14:10:56','Administrador Local'),(8,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-26 13:06:02','Administrador Local'),(9,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-29 08:59:06','Administrador Local'),(10,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-05-31 15:14:31','Administrador Local'),(11,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-06 08:32:43','Administrador Local'),(12,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-07 16:01:00','Administrador Local'),(13,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-12 15:04:11','Administrador Local'),(14,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-12 16:20:53','Administrador Local'),(15,'Non Existing User Tried to Login [Email: admin@some-domain.com, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-13 10:47:53',NULL),(16,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-13 10:48:05','Administrador Local'),(17,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-14 09:41:54','Administrador Local'),(18,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-15 08:43:50','Administrador Local'),(19,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-19 08:47:46','Administrador Local'),(20,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-21 09:05:33','Administrador Local'),(21,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-23 08:15:50','Administrador Local'),(22,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-29 08:14:22','Administrador Local'),(23,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-06-30 09:30:49','Administrador Local'),(24,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-03 10:41:04','Administrador Local'),(25,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-04 07:50:29','Administrador Local'),(26,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-04 15:39:37','Administrador Local'),(27,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-05 08:35:21','Administrador Local'),(28,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:36:26','Administrador Local'),(29,'Contact Created [ID: 1]','2023-07-05 08:36:26','Administrador Local'),(30,'User Successfully Logged In [User Id: 1, Is Staff Member: No, IP: ::1]','2023-07-05 08:36:58','Bryan Useche'),(31,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(32,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(33,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(34,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(35,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(36,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(37,'Failed to send email template - SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting<br /><pre>\n\n</pre>','2023-07-05 08:37:45','Bryan Useche'),(38,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-06 08:15:12','Administrador Local'),(39,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-10 08:45:39','Administrador Local'),(40,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-11 08:45:15','Administrador Local'),(41,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: 127.0.0.1]','2023-07-13 08:16:09','Administrador Local');
/*!40000 ALTER TABLE `tblactivity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblallowance_type`
--

DROP TABLE IF EXISTS `tblallowance_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblallowance_type` (
  `type_id` int unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(200) NOT NULL,
  `allowance_val` decimal(15,2) NOT NULL,
  `taxable` tinyint(1) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblallowance_type`
--

LOCK TABLES `tblallowance_type` WRITE;
/*!40000 ALTER TABLE `tblallowance_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblallowance_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblannouncements`
--

DROP TABLE IF EXISTS `tblannouncements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblannouncements` (
  `announcementid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `message` text,
  `showtousers` int NOT NULL,
  `showtostaff` int NOT NULL,
  `showname` int NOT NULL,
  `dateadded` datetime NOT NULL,
  `userid` varchar(100) NOT NULL,
  PRIMARY KEY (`announcementid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblannouncements`
--

LOCK TABLES `tblannouncements` WRITE;
/*!40000 ALTER TABLE `tblannouncements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblannouncements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblclients`
--

DROP TABLE IF EXISTS `tblclients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblclients` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `company` varchar(191) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `country` int NOT NULL DEFAULT '0',
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `leadid` int DEFAULT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT '0',
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT '0',
  `longitude` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `default_language` varchar(40) DEFAULT NULL,
  `default_currency` int NOT NULL DEFAULT '0',
  `show_primary_contact` int NOT NULL DEFAULT '0',
  `stripe_id` varchar(40) DEFAULT NULL,
  `registration_confirmed` int NOT NULL DEFAULT '1',
  `addedfrom` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `country` (`country`),
  KEY `leadid` (`leadid`),
  KEY `company` (`company`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblclients`
--

LOCK TABLES `tblclients` WRITE;
/*!40000 ALTER TABLE `tblclients` DISABLE KEYS */;
INSERT INTO `tblclients` VALUES (1,'Bucketcode','15467897','04141256752',242,'caracas','1010','capital district','somewhere place in the f***** world','bucketcode.com','2023-05-22 10:19:41',1,NULL,'','','','',0,'','','','',0,NULL,NULL,'spanish',1,0,NULL,1,1);
/*!40000 ALTER TABLE `tblclients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblconsent_purposes`
--

DROP TABLE IF EXISTS `tblconsent_purposes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblconsent_purposes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `date_created` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblconsent_purposes`
--

LOCK TABLES `tblconsent_purposes` WRITE;
/*!40000 ALTER TABLE `tblconsent_purposes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblconsent_purposes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblconsents`
--

DROP TABLE IF EXISTS `tblconsents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblconsents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `action` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(40) NOT NULL,
  `contact_id` int NOT NULL DEFAULT '0',
  `lead_id` int NOT NULL DEFAULT '0',
  `description` text,
  `opt_in_purpose_description` text,
  `purpose_id` int NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purpose_id` (`purpose_id`),
  KEY `contact_id` (`contact_id`),
  KEY `lead_id` (`lead_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblconsents`
--

LOCK TABLES `tblconsents` WRITE;
/*!40000 ALTER TABLE `tblconsents` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblconsents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontact_permissions`
--

DROP TABLE IF EXISTS `tblcontact_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontact_permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `permission_id` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontact_permissions`
--

LOCK TABLES `tblcontact_permissions` WRITE;
/*!40000 ALTER TABLE `tblcontact_permissions` DISABLE KEYS */;
INSERT INTO `tblcontact_permissions` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1);
/*!40000 ALTER TABLE `tblcontact_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontacts`
--

DROP TABLE IF EXISTS `tblcontacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `is_primary` int NOT NULL DEFAULT '1',
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `email_verification_key` varchar(32) DEFAULT NULL,
  `email_verification_sent_at` datetime DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `profile_image` varchar(191) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `invoice_emails` tinyint(1) NOT NULL DEFAULT '1',
  `estimate_emails` tinyint(1) NOT NULL DEFAULT '1',
  `credit_note_emails` tinyint(1) NOT NULL DEFAULT '1',
  `contract_emails` tinyint(1) NOT NULL DEFAULT '1',
  `task_emails` tinyint(1) NOT NULL DEFAULT '1',
  `project_emails` tinyint(1) NOT NULL DEFAULT '1',
  `ticket_emails` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `email` (`email`),
  KEY `is_primary` (`is_primary`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontacts`
--

LOCK TABLES `tblcontacts` WRITE;
/*!40000 ALTER TABLE `tblcontacts` DISABLE KEYS */;
INSERT INTO `tblcontacts` VALUES (1,1,1,'Bryan','Useche','bryan.useche.10@gmail.com','+584141256752','CEO','2023-07-05 08:36:25','$2a$08$g5rBv.ze/1OXxTl8MTkDVujE/y844iiPj8mGO83fsVimaAF.70WPi',NULL,NULL,'2023-07-05 08:36:25',NULL,NULL,'::1','2023-07-05 08:36:58',NULL,1,NULL,'',1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `tblcontacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontract_comments`
--

DROP TABLE IF EXISTS `tblcontract_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontract_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` mediumtext,
  `contract_id` int NOT NULL,
  `staffid` int NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontract_comments`
--

LOCK TABLES `tblcontract_comments` WRITE;
/*!40000 ALTER TABLE `tblcontract_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcontract_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontract_renewals`
--

DROP TABLE IF EXISTS `tblcontract_renewals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontract_renewals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contractid` int NOT NULL,
  `old_start_date` date NOT NULL,
  `new_start_date` date NOT NULL,
  `old_end_date` date DEFAULT NULL,
  `new_end_date` date DEFAULT NULL,
  `old_value` decimal(15,2) DEFAULT NULL,
  `new_value` decimal(15,2) DEFAULT NULL,
  `date_renewed` datetime NOT NULL,
  `renewed_by` varchar(100) NOT NULL,
  `renewed_by_staff_id` int NOT NULL DEFAULT '0',
  `is_on_old_expiry_notified` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontract_renewals`
--

LOCK TABLES `tblcontract_renewals` WRITE;
/*!40000 ALTER TABLE `tblcontract_renewals` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcontract_renewals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontracts`
--

DROP TABLE IF EXISTS `tblcontracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontracts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `description` text,
  `subject` varchar(191) DEFAULT NULL,
  `client` int NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `contract_type` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `dateadded` datetime NOT NULL,
  `isexpirynotified` int NOT NULL DEFAULT '0',
  `contract_value` decimal(15,2) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT '0',
  `not_visible_to_client` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(32) DEFAULT NULL,
  `signed` tinyint(1) NOT NULL DEFAULT '0',
  `signature` varchar(40) DEFAULT NULL,
  `marked_as_signed` tinyint(1) NOT NULL DEFAULT '0',
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  KEY `contract_type` (`contract_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontracts`
--

LOCK TABLES `tblcontracts` WRITE;
/*!40000 ALTER TABLE `tblcontracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcontracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontracts_types`
--

DROP TABLE IF EXISTS `tblcontracts_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontracts_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontracts_types`
--

LOCK TABLES `tblcontracts_types` WRITE;
/*!40000 ALTER TABLE `tblcontracts_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcontracts_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcountries`
--

DROP TABLE IF EXISTS `tblcountries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcountries` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `iso2` char(2) DEFAULT NULL,
  `short_name` varchar(80) NOT NULL DEFAULT '',
  `long_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(6) DEFAULT NULL,
  `un_member` varchar(12) DEFAULT NULL,
  `calling_code` varchar(8) DEFAULT NULL,
  `cctld` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcountries`
--

LOCK TABLES `tblcountries` WRITE;
/*!40000 ALTER TABLE `tblcountries` DISABLE KEYS */;
INSERT INTO `tblcountries` VALUES (1,'AF','Afghanistan','Islamic Republic of Afghanistan','AFG','004','yes','93','.af'),(2,'AX','Aland Islands','&Aring;land Islands','ALA','248','no','358','.ax'),(3,'AL','Albania','Republic of Albania','ALB','008','yes','355','.al'),(4,'DZ','Algeria','People\'s Democratic Republic of Algeria','DZA','012','yes','213','.dz'),(5,'AS','American Samoa','American Samoa','ASM','016','no','1+684','.as'),(6,'AD','Andorra','Principality of Andorra','AND','020','yes','376','.ad'),(7,'AO','Angola','Republic of Angola','AGO','024','yes','244','.ao'),(8,'AI','Anguilla','Anguilla','AIA','660','no','1+264','.ai'),(9,'AQ','Antarctica','Antarctica','ATA','010','no','672','.aq'),(10,'AG','Antigua and Barbuda','Antigua and Barbuda','ATG','028','yes','1+268','.ag'),(11,'AR','Argentina','Argentine Republic','ARG','032','yes','54','.ar'),(12,'AM','Armenia','Republic of Armenia','ARM','051','yes','374','.am'),(13,'AW','Aruba','Aruba','ABW','533','no','297','.aw'),(14,'AU','Australia','Commonwealth of Australia','AUS','036','yes','61','.au'),(15,'AT','Austria','Republic of Austria','AUT','040','yes','43','.at'),(16,'AZ','Azerbaijan','Republic of Azerbaijan','AZE','031','yes','994','.az'),(17,'BS','Bahamas','Commonwealth of The Bahamas','BHS','044','yes','1+242','.bs'),(18,'BH','Bahrain','Kingdom of Bahrain','BHR','048','yes','973','.bh'),(19,'BD','Bangladesh','People\'s Republic of Bangladesh','BGD','050','yes','880','.bd'),(20,'BB','Barbados','Barbados','BRB','052','yes','1+246','.bb'),(21,'BY','Belarus','Republic of Belarus','BLR','112','yes','375','.by'),(22,'BE','Belgium','Kingdom of Belgium','BEL','056','yes','32','.be'),(23,'BZ','Belize','Belize','BLZ','084','yes','501','.bz'),(24,'BJ','Benin','Republic of Benin','BEN','204','yes','229','.bj'),(25,'BM','Bermuda','Bermuda Islands','BMU','060','no','1+441','.bm'),(26,'BT','Bhutan','Kingdom of Bhutan','BTN','064','yes','975','.bt'),(27,'BO','Bolivia','Plurinational State of Bolivia','BOL','068','yes','591','.bo'),(28,'BQ','Bonaire, Sint Eustatius and Saba','Bonaire, Sint Eustatius and Saba','BES','535','no','599','.bq'),(29,'BA','Bosnia and Herzegovina','Bosnia and Herzegovina','BIH','070','yes','387','.ba'),(30,'BW','Botswana','Republic of Botswana','BWA','072','yes','267','.bw'),(31,'BV','Bouvet Island','Bouvet Island','BVT','074','no','NONE','.bv'),(32,'BR','Brazil','Federative Republic of Brazil','BRA','076','yes','55','.br'),(33,'IO','British Indian Ocean Territory','British Indian Ocean Territory','IOT','086','no','246','.io'),(34,'BN','Brunei','Brunei Darussalam','BRN','096','yes','673','.bn'),(35,'BG','Bulgaria','Republic of Bulgaria','BGR','100','yes','359','.bg'),(36,'BF','Burkina Faso','Burkina Faso','BFA','854','yes','226','.bf'),(37,'BI','Burundi','Republic of Burundi','BDI','108','yes','257','.bi'),(38,'KH','Cambodia','Kingdom of Cambodia','KHM','116','yes','855','.kh'),(39,'CM','Cameroon','Republic of Cameroon','CMR','120','yes','237','.cm'),(40,'CA','Canada','Canada','CAN','124','yes','1','.ca'),(41,'CV','Cape Verde','Republic of Cape Verde','CPV','132','yes','238','.cv'),(42,'KY','Cayman Islands','The Cayman Islands','CYM','136','no','1+345','.ky'),(43,'CF','Central African Republic','Central African Republic','CAF','140','yes','236','.cf'),(44,'TD','Chad','Republic of Chad','TCD','148','yes','235','.td'),(45,'CL','Chile','Republic of Chile','CHL','152','yes','56','.cl'),(46,'CN','China','People\'s Republic of China','CHN','156','yes','86','.cn'),(47,'CX','Christmas Island','Christmas Island','CXR','162','no','61','.cx'),(48,'CC','Cocos (Keeling) Islands','Cocos (Keeling) Islands','CCK','166','no','61','.cc'),(49,'CO','Colombia','Republic of Colombia','COL','170','yes','57','.co'),(50,'KM','Comoros','Union of the Comoros','COM','174','yes','269','.km'),(51,'CG','Congo','Republic of the Congo','COG','178','yes','242','.cg'),(52,'CK','Cook Islands','Cook Islands','COK','184','some','682','.ck'),(53,'CR','Costa Rica','Republic of Costa Rica','CRI','188','yes','506','.cr'),(54,'CI','Cote d\'ivoire (Ivory Coast)','Republic of C&ocirc;te D\'Ivoire (Ivory Coast)','CIV','384','yes','225','.ci'),(55,'HR','Croatia','Republic of Croatia','HRV','191','yes','385','.hr'),(56,'CU','Cuba','Republic of Cuba','CUB','192','yes','53','.cu'),(57,'CW','Curacao','Cura&ccedil;ao','CUW','531','no','599','.cw'),(58,'CY','Cyprus','Republic of Cyprus','CYP','196','yes','357','.cy'),(59,'CZ','Czech Republic','Czech Republic','CZE','203','yes','420','.cz'),(60,'CD','Democratic Republic of the Congo','Democratic Republic of the Congo','COD','180','yes','243','.cd'),(61,'DK','Denmark','Kingdom of Denmark','DNK','208','yes','45','.dk'),(62,'DJ','Djibouti','Republic of Djibouti','DJI','262','yes','253','.dj'),(63,'DM','Dominica','Commonwealth of Dominica','DMA','212','yes','1+767','.dm'),(64,'DO','Dominican Republic','Dominican Republic','DOM','214','yes','1+809, 8','.do'),(65,'EC','Ecuador','Republic of Ecuador','ECU','218','yes','593','.ec'),(66,'EG','Egypt','Arab Republic of Egypt','EGY','818','yes','20','.eg'),(67,'SV','El Salvador','Republic of El Salvador','SLV','222','yes','503','.sv'),(68,'GQ','Equatorial Guinea','Republic of Equatorial Guinea','GNQ','226','yes','240','.gq'),(69,'ER','Eritrea','State of Eritrea','ERI','232','yes','291','.er'),(70,'EE','Estonia','Republic of Estonia','EST','233','yes','372','.ee'),(71,'ET','Ethiopia','Federal Democratic Republic of Ethiopia','ETH','231','yes','251','.et'),(72,'FK','Falkland Islands (Malvinas)','The Falkland Islands (Malvinas)','FLK','238','no','500','.fk'),(73,'FO','Faroe Islands','The Faroe Islands','FRO','234','no','298','.fo'),(74,'FJ','Fiji','Republic of Fiji','FJI','242','yes','679','.fj'),(75,'FI','Finland','Republic of Finland','FIN','246','yes','358','.fi'),(76,'FR','France','French Republic','FRA','250','yes','33','.fr'),(77,'GF','French Guiana','French Guiana','GUF','254','no','594','.gf'),(78,'PF','French Polynesia','French Polynesia','PYF','258','no','689','.pf'),(79,'TF','French Southern Territories','French Southern Territories','ATF','260','no',NULL,'.tf'),(80,'GA','Gabon','Gabonese Republic','GAB','266','yes','241','.ga'),(81,'GM','Gambia','Republic of The Gambia','GMB','270','yes','220','.gm'),(82,'GE','Georgia','Georgia','GEO','268','yes','995','.ge'),(83,'DE','Germany','Federal Republic of Germany','DEU','276','yes','49','.de'),(84,'GH','Ghana','Republic of Ghana','GHA','288','yes','233','.gh'),(85,'GI','Gibraltar','Gibraltar','GIB','292','no','350','.gi'),(86,'GR','Greece','Hellenic Republic','GRC','300','yes','30','.gr'),(87,'GL','Greenland','Greenland','GRL','304','no','299','.gl'),(88,'GD','Grenada','Grenada','GRD','308','yes','1+473','.gd'),(89,'GP','Guadaloupe','Guadeloupe','GLP','312','no','590','.gp'),(90,'GU','Guam','Guam','GUM','316','no','1+671','.gu'),(91,'GT','Guatemala','Republic of Guatemala','GTM','320','yes','502','.gt'),(92,'GG','Guernsey','Guernsey','GGY','831','no','44','.gg'),(93,'GN','Guinea','Republic of Guinea','GIN','324','yes','224','.gn'),(94,'GW','Guinea-Bissau','Republic of Guinea-Bissau','GNB','624','yes','245','.gw'),(95,'GY','Guyana','Co-operative Republic of Guyana','GUY','328','yes','592','.gy'),(96,'HT','Haiti','Republic of Haiti','HTI','332','yes','509','.ht'),(97,'HM','Heard Island and McDonald Islands','Heard Island and McDonald Islands','HMD','334','no','NONE','.hm'),(98,'HN','Honduras','Republic of Honduras','HND','340','yes','504','.hn'),(99,'HK','Hong Kong','Hong Kong','HKG','344','no','852','.hk'),(100,'HU','Hungary','Hungary','HUN','348','yes','36','.hu'),(101,'IS','Iceland','Republic of Iceland','ISL','352','yes','354','.is'),(102,'IN','India','Republic of India','IND','356','yes','91','.in'),(103,'ID','Indonesia','Republic of Indonesia','IDN','360','yes','62','.id'),(104,'IR','Iran','Islamic Republic of Iran','IRN','364','yes','98','.ir'),(105,'IQ','Iraq','Republic of Iraq','IRQ','368','yes','964','.iq'),(106,'IE','Ireland','Ireland','IRL','372','yes','353','.ie'),(107,'IM','Isle of Man','Isle of Man','IMN','833','no','44','.im'),(108,'IL','Israel','State of Israel','ISR','376','yes','972','.il'),(109,'IT','Italy','Italian Republic','ITA','380','yes','39','.jm'),(110,'JM','Jamaica','Jamaica','JAM','388','yes','1+876','.jm'),(111,'JP','Japan','Japan','JPN','392','yes','81','.jp'),(112,'JE','Jersey','The Bailiwick of Jersey','JEY','832','no','44','.je'),(113,'JO','Jordan','Hashemite Kingdom of Jordan','JOR','400','yes','962','.jo'),(114,'KZ','Kazakhstan','Republic of Kazakhstan','KAZ','398','yes','7','.kz'),(115,'KE','Kenya','Republic of Kenya','KEN','404','yes','254','.ke'),(116,'KI','Kiribati','Republic of Kiribati','KIR','296','yes','686','.ki'),(117,'XK','Kosovo','Republic of Kosovo','---','---','some','381',''),(118,'KW','Kuwait','State of Kuwait','KWT','414','yes','965','.kw'),(119,'KG','Kyrgyzstan','Kyrgyz Republic','KGZ','417','yes','996','.kg'),(120,'LA','Laos','Lao People\'s Democratic Republic','LAO','418','yes','856','.la'),(121,'LV','Latvia','Republic of Latvia','LVA','428','yes','371','.lv'),(122,'LB','Lebanon','Republic of Lebanon','LBN','422','yes','961','.lb'),(123,'LS','Lesotho','Kingdom of Lesotho','LSO','426','yes','266','.ls'),(124,'LR','Liberia','Republic of Liberia','LBR','430','yes','231','.lr'),(125,'LY','Libya','Libya','LBY','434','yes','218','.ly'),(126,'LI','Liechtenstein','Principality of Liechtenstein','LIE','438','yes','423','.li'),(127,'LT','Lithuania','Republic of Lithuania','LTU','440','yes','370','.lt'),(128,'LU','Luxembourg','Grand Duchy of Luxembourg','LUX','442','yes','352','.lu'),(129,'MO','Macao','The Macao Special Administrative Region','MAC','446','no','853','.mo'),(130,'MK','North Macedonia','Republic of North Macedonia','MKD','807','yes','389','.mk'),(131,'MG','Madagascar','Republic of Madagascar','MDG','450','yes','261','.mg'),(132,'MW','Malawi','Republic of Malawi','MWI','454','yes','265','.mw'),(133,'MY','Malaysia','Malaysia','MYS','458','yes','60','.my'),(134,'MV','Maldives','Republic of Maldives','MDV','462','yes','960','.mv'),(135,'ML','Mali','Republic of Mali','MLI','466','yes','223','.ml'),(136,'MT','Malta','Republic of Malta','MLT','470','yes','356','.mt'),(137,'MH','Marshall Islands','Republic of the Marshall Islands','MHL','584','yes','692','.mh'),(138,'MQ','Martinique','Martinique','MTQ','474','no','596','.mq'),(139,'MR','Mauritania','Islamic Republic of Mauritania','MRT','478','yes','222','.mr'),(140,'MU','Mauritius','Republic of Mauritius','MUS','480','yes','230','.mu'),(141,'YT','Mayotte','Mayotte','MYT','175','no','262','.yt'),(142,'MX','Mexico','United Mexican States','MEX','484','yes','52','.mx'),(143,'FM','Micronesia','Federated States of Micronesia','FSM','583','yes','691','.fm'),(144,'MD','Moldava','Republic of Moldova','MDA','498','yes','373','.md'),(145,'MC','Monaco','Principality of Monaco','MCO','492','yes','377','.mc'),(146,'MN','Mongolia','Mongolia','MNG','496','yes','976','.mn'),(147,'ME','Montenegro','Montenegro','MNE','499','yes','382','.me'),(148,'MS','Montserrat','Montserrat','MSR','500','no','1+664','.ms'),(149,'MA','Morocco','Kingdom of Morocco','MAR','504','yes','212','.ma'),(150,'MZ','Mozambique','Republic of Mozambique','MOZ','508','yes','258','.mz'),(151,'MM','Myanmar (Burma)','Republic of the Union of Myanmar','MMR','104','yes','95','.mm'),(152,'NA','Namibia','Republic of Namibia','NAM','516','yes','264','.na'),(153,'NR','Nauru','Republic of Nauru','NRU','520','yes','674','.nr'),(154,'NP','Nepal','Federal Democratic Republic of Nepal','NPL','524','yes','977','.np'),(155,'NL','Netherlands','Kingdom of the Netherlands','NLD','528','yes','31','.nl'),(156,'NC','New Caledonia','New Caledonia','NCL','540','no','687','.nc'),(157,'NZ','New Zealand','New Zealand','NZL','554','yes','64','.nz'),(158,'NI','Nicaragua','Republic of Nicaragua','NIC','558','yes','505','.ni'),(159,'NE','Niger','Republic of Niger','NER','562','yes','227','.ne'),(160,'NG','Nigeria','Federal Republic of Nigeria','NGA','566','yes','234','.ng'),(161,'NU','Niue','Niue','NIU','570','some','683','.nu'),(162,'NF','Norfolk Island','Norfolk Island','NFK','574','no','672','.nf'),(163,'KP','North Korea','Democratic People\'s Republic of Korea','PRK','408','yes','850','.kp'),(164,'MP','Northern Mariana Islands','Northern Mariana Islands','MNP','580','no','1+670','.mp'),(165,'NO','Norway','Kingdom of Norway','NOR','578','yes','47','.no'),(166,'OM','Oman','Sultanate of Oman','OMN','512','yes','968','.om'),(167,'PK','Pakistan','Islamic Republic of Pakistan','PAK','586','yes','92','.pk'),(168,'PW','Palau','Republic of Palau','PLW','585','yes','680','.pw'),(169,'PS','Palestine','State of Palestine (or Occupied Palestinian Territory)','PSE','275','some','970','.ps'),(170,'PA','Panama','Republic of Panama','PAN','591','yes','507','.pa'),(171,'PG','Papua New Guinea','Independent State of Papua New Guinea','PNG','598','yes','675','.pg'),(172,'PY','Paraguay','Republic of Paraguay','PRY','600','yes','595','.py'),(173,'PE','Peru','Republic of Peru','PER','604','yes','51','.pe'),(174,'PH','Philippines','Republic of the Philippines','PHL','608','yes','63','.ph'),(175,'PN','Pitcairn','Pitcairn','PCN','612','no','NONE','.pn'),(176,'PL','Poland','Republic of Poland','POL','616','yes','48','.pl'),(177,'PT','Portugal','Portuguese Republic','PRT','620','yes','351','.pt'),(178,'PR','Puerto Rico','Commonwealth of Puerto Rico','PRI','630','no','1+939','.pr'),(179,'QA','Qatar','State of Qatar','QAT','634','yes','974','.qa'),(180,'RE','Reunion','R&eacute;union','REU','638','no','262','.re'),(181,'RO','Romania','Romania','ROU','642','yes','40','.ro'),(182,'RU','Russia','Russian Federation','RUS','643','yes','7','.ru'),(183,'RW','Rwanda','Republic of Rwanda','RWA','646','yes','250','.rw'),(184,'BL','Saint Barthelemy','Saint Barth&eacute;lemy','BLM','652','no','590','.bl'),(185,'SH','Saint Helena','Saint Helena, Ascension and Tristan da Cunha','SHN','654','no','290','.sh'),(186,'KN','Saint Kitts and Nevis','Federation of Saint Christopher and Nevis','KNA','659','yes','1+869','.kn'),(187,'LC','Saint Lucia','Saint Lucia','LCA','662','yes','1+758','.lc'),(188,'MF','Saint Martin','Saint Martin','MAF','663','no','590','.mf'),(189,'PM','Saint Pierre and Miquelon','Saint Pierre and Miquelon','SPM','666','no','508','.pm'),(190,'VC','Saint Vincent and the Grenadines','Saint Vincent and the Grenadines','VCT','670','yes','1+784','.vc'),(191,'WS','Samoa','Independent State of Samoa','WSM','882','yes','685','.ws'),(192,'SM','San Marino','Republic of San Marino','SMR','674','yes','378','.sm'),(193,'ST','Sao Tome and Principe','Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe','STP','678','yes','239','.st'),(194,'SA','Saudi Arabia','Kingdom of Saudi Arabia','SAU','682','yes','966','.sa'),(195,'SN','Senegal','Republic of Senegal','SEN','686','yes','221','.sn'),(196,'RS','Serbia','Republic of Serbia','SRB','688','yes','381','.rs'),(197,'SC','Seychelles','Republic of Seychelles','SYC','690','yes','248','.sc'),(198,'SL','Sierra Leone','Republic of Sierra Leone','SLE','694','yes','232','.sl'),(199,'SG','Singapore','Republic of Singapore','SGP','702','yes','65','.sg'),(200,'SX','Sint Maarten','Sint Maarten','SXM','534','no','1+721','.sx'),(201,'SK','Slovakia','Slovak Republic','SVK','703','yes','421','.sk'),(202,'SI','Slovenia','Republic of Slovenia','SVN','705','yes','386','.si'),(203,'SB','Solomon Islands','Solomon Islands','SLB','090','yes','677','.sb'),(204,'SO','Somalia','Somali Republic','SOM','706','yes','252','.so'),(205,'ZA','South Africa','Republic of South Africa','ZAF','710','yes','27','.za'),(206,'GS','South Georgia and the South Sandwich Islands','South Georgia and the South Sandwich Islands','SGS','239','no','500','.gs'),(207,'KR','South Korea','Republic of Korea','KOR','410','yes','82','.kr'),(208,'SS','South Sudan','Republic of South Sudan','SSD','728','yes','211','.ss'),(209,'ES','Spain','Kingdom of Spain','ESP','724','yes','34','.es'),(210,'LK','Sri Lanka','Democratic Socialist Republic of Sri Lanka','LKA','144','yes','94','.lk'),(211,'SD','Sudan','Republic of the Sudan','SDN','729','yes','249','.sd'),(212,'SR','Suriname','Republic of Suriname','SUR','740','yes','597','.sr'),(213,'SJ','Svalbard and Jan Mayen','Svalbard and Jan Mayen','SJM','744','no','47','.sj'),(214,'SZ','Swaziland','Kingdom of Swaziland','SWZ','748','yes','268','.sz'),(215,'SE','Sweden','Kingdom of Sweden','SWE','752','yes','46','.se'),(216,'CH','Switzerland','Swiss Confederation','CHE','756','yes','41','.ch'),(217,'SY','Syria','Syrian Arab Republic','SYR','760','yes','963','.sy'),(218,'TW','Taiwan','Republic of China (Taiwan)','TWN','158','former','886','.tw'),(219,'TJ','Tajikistan','Republic of Tajikistan','TJK','762','yes','992','.tj'),(220,'TZ','Tanzania','United Republic of Tanzania','TZA','834','yes','255','.tz'),(221,'TH','Thailand','Kingdom of Thailand','THA','764','yes','66','.th'),(222,'TL','Timor-Leste (East Timor)','Democratic Republic of Timor-Leste','TLS','626','yes','670','.tl'),(223,'TG','Togo','Togolese Republic','TGO','768','yes','228','.tg'),(224,'TK','Tokelau','Tokelau','TKL','772','no','690','.tk'),(225,'TO','Tonga','Kingdom of Tonga','TON','776','yes','676','.to'),(226,'TT','Trinidad and Tobago','Republic of Trinidad and Tobago','TTO','780','yes','1+868','.tt'),(227,'TN','Tunisia','Republic of Tunisia','TUN','788','yes','216','.tn'),(228,'TR','Turkey','Republic of Turkey','TUR','792','yes','90','.tr'),(229,'TM','Turkmenistan','Turkmenistan','TKM','795','yes','993','.tm'),(230,'TC','Turks and Caicos Islands','Turks and Caicos Islands','TCA','796','no','1+649','.tc'),(231,'TV','Tuvalu','Tuvalu','TUV','798','yes','688','.tv'),(232,'UG','Uganda','Republic of Uganda','UGA','800','yes','256','.ug'),(233,'UA','Ukraine','Ukraine','UKR','804','yes','380','.ua'),(234,'AE','United Arab Emirates','United Arab Emirates','ARE','784','yes','971','.ae'),(235,'GB','United Kingdom','United Kingdom of Great Britain and Nothern Ireland','GBR','826','yes','44','.uk'),(236,'US','United States','United States of America','USA','840','yes','1','.us'),(237,'UM','United States Minor Outlying Islands','United States Minor Outlying Islands','UMI','581','no','NONE','NONE'),(238,'UY','Uruguay','Eastern Republic of Uruguay','URY','858','yes','598','.uy'),(239,'UZ','Uzbekistan','Republic of Uzbekistan','UZB','860','yes','998','.uz'),(240,'VU','Vanuatu','Republic of Vanuatu','VUT','548','yes','678','.vu'),(241,'VA','Vatican City','State of the Vatican City','VAT','336','no','39','.va'),(242,'VE','Venezuela','Bolivarian Republic of Venezuela','VEN','862','yes','58','.ve'),(243,'VN','Vietnam','Socialist Republic of Vietnam','VNM','704','yes','84','.vn'),(244,'VG','Virgin Islands, British','British Virgin Islands','VGB','092','no','1+284','.vg'),(245,'VI','Virgin Islands, US','Virgin Islands of the United States','VIR','850','no','1+340','.vi'),(246,'WF','Wallis and Futuna','Wallis and Futuna','WLF','876','no','681','.wf'),(247,'EH','Western Sahara','Western Sahara','ESH','732','no','212','.eh'),(248,'YE','Yemen','Republic of Yemen','YEM','887','yes','967','.ye'),(249,'ZM','Zambia','Republic of Zambia','ZMB','894','yes','260','.zm'),(250,'ZW','Zimbabwe','Republic of Zimbabwe','ZWE','716','yes','263','.zw');
/*!40000 ALTER TABLE `tblcountries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcreditnote_refunds`
--

DROP TABLE IF EXISTS `tblcreditnote_refunds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcreditnote_refunds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `credit_note_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `refunded_on` date NOT NULL,
  `payment_mode` varchar(40) NOT NULL,
  `note` text,
  `amount` decimal(15,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcreditnote_refunds`
--

LOCK TABLES `tblcreditnote_refunds` WRITE;
/*!40000 ALTER TABLE `tblcreditnote_refunds` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcreditnote_refunds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcreditnotes`
--

DROP TABLE IF EXISTS `tblcreditnotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcreditnotes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clientid` int NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int NOT NULL DEFAULT '1',
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `adminnote` text,
  `terms` text,
  `clientnote` text,
  `currency` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int DEFAULT NULL,
  `status` int DEFAULT '1',
  `project_id` int NOT NULL DEFAULT '0',
  `discount_percent` decimal(15,2) DEFAULT '0.00',
  `discount_total` decimal(15,2) DEFAULT '0.00',
  `discount_type` varchar(30) NOT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_credit_note` tinyint(1) NOT NULL DEFAULT '1',
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `reference_no` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency` (`currency`),
  KEY `clientid` (`clientid`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcreditnotes`
--

LOCK TABLES `tblcreditnotes` WRITE;
/*!40000 ALTER TABLE `tblcreditnotes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcreditnotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcredits`
--

DROP TABLE IF EXISTS `tblcredits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcredits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` int NOT NULL,
  `credit_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `date` date NOT NULL,
  `date_applied` datetime NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcredits`
--

LOCK TABLES `tblcredits` WRITE;
/*!40000 ALTER TABLE `tblcredits` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcredits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcurrencies`
--

DROP TABLE IF EXISTS `tblcurrencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcurrencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decimal_separator` varchar(5) DEFAULT NULL,
  `thousand_separator` varchar(5) DEFAULT NULL,
  `placement` varchar(10) DEFAULT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcurrencies`
--

LOCK TABLES `tblcurrencies` WRITE;
/*!40000 ALTER TABLE `tblcurrencies` DISABLE KEYS */;
INSERT INTO `tblcurrencies` VALUES (1,'$','USD','.',',','before',1),(2,'€','EUR',',','.','before',0);
/*!40000 ALTER TABLE `tblcurrencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomer_admins`
--

DROP TABLE IF EXISTS `tblcustomer_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomer_admins` (
  `staff_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `date_assigned` text NOT NULL,
  KEY `customer_id` (`customer_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomer_admins`
--

LOCK TABLES `tblcustomer_admins` WRITE;
/*!40000 ALTER TABLE `tblcustomer_admins` DISABLE KEYS */;
INSERT INTO `tblcustomer_admins` VALUES (1,1,'2023-05-22 10:20:01');
/*!40000 ALTER TABLE `tblcustomer_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomer_groups`
--

DROP TABLE IF EXISTS `tblcustomer_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomer_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `groupid` int NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupid` (`groupid`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomer_groups`
--

LOCK TABLES `tblcustomer_groups` WRITE;
/*!40000 ALTER TABLE `tblcustomer_groups` DISABLE KEYS */;
INSERT INTO `tblcustomer_groups` VALUES (1,1,1);
/*!40000 ALTER TABLE `tblcustomer_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomers_groups`
--

DROP TABLE IF EXISTS `tblcustomers_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomers_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomers_groups`
--

LOCK TABLES `tblcustomers_groups` WRITE;
/*!40000 ALTER TABLE `tblcustomers_groups` DISABLE KEYS */;
INSERT INTO `tblcustomers_groups` VALUES (1,'IT');
/*!40000 ALTER TABLE `tblcustomers_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomfields`
--

DROP TABLE IF EXISTS `tblcustomfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomfields` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fieldto` varchar(30) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL,
  `options` mediumtext,
  `display_inline` tinyint(1) NOT NULL DEFAULT '0',
  `field_order` int DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `show_on_pdf` int NOT NULL DEFAULT '0',
  `show_on_ticket_form` tinyint(1) NOT NULL DEFAULT '0',
  `only_admin` tinyint(1) NOT NULL DEFAULT '0',
  `show_on_table` tinyint(1) NOT NULL DEFAULT '0',
  `show_on_client_portal` int NOT NULL DEFAULT '0',
  `disalow_client_to_edit` int NOT NULL DEFAULT '0',
  `bs_column` int NOT NULL DEFAULT '12',
  `default_value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomfields`
--

LOCK TABLES `tblcustomfields` WRITE;
/*!40000 ALTER TABLE `tblcustomfields` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcustomfields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomfieldsvalues`
--

DROP TABLE IF EXISTS `tblcustomfieldsvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcustomfieldsvalues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `relid` int NOT NULL,
  `fieldid` int NOT NULL,
  `fieldto` varchar(15) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `relid` (`relid`),
  KEY `fieldto` (`fieldto`),
  KEY `fieldid` (`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomfieldsvalues`
--

LOCK TABLES `tblcustomfieldsvalues` WRITE;
/*!40000 ALTER TABLE `tblcustomfieldsvalues` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcustomfieldsvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblday_off`
--

DROP TABLE IF EXISTS `tblday_off`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblday_off` (
  `id` int NOT NULL AUTO_INCREMENT,
  `off_reason` varchar(255) NOT NULL,
  `off_type` varchar(100) NOT NULL,
  `break_date` date NOT NULL,
  `timekeeping` varchar(45) DEFAULT NULL,
  `department` int DEFAULT '0',
  `position` int DEFAULT '0',
  `add_from` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblday_off`
--

LOCK TABLES `tblday_off` WRITE;
/*!40000 ALTER TABLE `tblday_off` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblday_off` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldepartments`
--

DROP TABLE IF EXISTS `tbldepartments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldepartments` (
  `departmentid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `imap_username` varchar(191) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_from_header` tinyint(1) NOT NULL DEFAULT '0',
  `host` varchar(150) DEFAULT NULL,
  `password` mediumtext,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(191) NOT NULL DEFAULT 'INBOX',
  `delete_after_import` int NOT NULL DEFAULT '0',
  `calendar_id` mediumtext,
  `hidefromclient` tinyint(1) NOT NULL DEFAULT '0',
  `manager_id` int DEFAULT '0',
  `parent_id` int DEFAULT '0',
  PRIMARY KEY (`departmentid`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldepartments`
--

LOCK TABLES `tbldepartments` WRITE;
/*!40000 ALTER TABLE `tbldepartments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldepartments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldismissed_announcements`
--

DROP TABLE IF EXISTS `tbldismissed_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldismissed_announcements` (
  `dismissedannouncementid` int NOT NULL AUTO_INCREMENT,
  `announcementid` int NOT NULL,
  `staff` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`dismissedannouncementid`),
  KEY `announcementid` (`announcementid`),
  KEY `staff` (`staff`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldismissed_announcements`
--

LOCK TABLES `tbldismissed_announcements` WRITE;
/*!40000 ALTER TABLE `tbldismissed_announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldismissed_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblemaillists`
--

DROP TABLE IF EXISTS `tblemaillists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblemaillists` (
  `listid` int NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `creator` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL,
  PRIMARY KEY (`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblemaillists`
--

LOCK TABLES `tblemaillists` WRITE;
/*!40000 ALTER TABLE `tblemaillists` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblemaillists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblemailtemplates`
--

DROP TABLE IF EXISTS `tblemailtemplates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblemailtemplates` (
  `emailtemplateid` int NOT NULL AUTO_INCREMENT,
  `type` mediumtext NOT NULL,
  `slug` varchar(100) NOT NULL,
  `language` varchar(40) DEFAULT NULL,
  `name` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fromname` mediumtext NOT NULL,
  `fromemail` varchar(100) DEFAULT NULL,
  `plaintext` int NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '0',
  `order` int NOT NULL,
  PRIMARY KEY (`emailtemplateid`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblemailtemplates`
--

LOCK TABLES `tblemailtemplates` WRITE;
/*!40000 ALTER TABLE `tblemailtemplates` DISABLE KEYS */;
INSERT INTO `tblemailtemplates` VALUES (1,'client','new-client-created','english','New Contact Added/Registered (Welcome Email)','Welcome aboard','Dear {contact_firstname} {contact_lastname}<br /><br />Thank you for registering on the <strong>{companyname}</strong> CRM System.<br /><br />We just wanted to say welcome.<br /><br />Please contact us if you need any help.<br /><br />Click here to view your profile: <a href=\"{crm_url}\">{crm_url}</a><br /><br />Kind Regards, <br />{email_signature}<br /><br />(This is an automated email, so please don\'t reply to this email address)','{companyname} | CRM','',0,1,0),(2,'invoice','invoice-send-to-client','english','Send Invoice to Customer','Invoice with number {invoice_number} created','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">We have prepared the following invoice for you: <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Invoice status</strong>: {invoice_status}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(3,'ticket','new-ticket-opened-admin','english','New Ticket Opened (Opened by Staff, Sent to Customer)','New Support Ticket Opened','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">New support ticket has been opened.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department:</strong> {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a><br /><br />Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(4,'ticket','ticket-reply','english','Ticket Reply (Sent to Customer)','New Ticket Reply','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">You have a new ticket reply to ticket <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket Subject:</strong> {ticket_subject}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(5,'ticket','ticket-autoresponse','english','New Ticket Opened - Autoresponse','New Support Ticket Opened','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(6,'invoice','invoice-payment-recorded','english','Invoice Payment Recorded (Sent to Customer)','Invoice Payment Recorded','<span style=\"font-size: 12pt;\">Hello {contact_firstname}&nbsp;{contact_lastname}<br /><br /></span>Thank you for the payment. Find the payment details below:<br /><br />-------------------------------------------------<br /><br />Amount:&nbsp;<strong>{payment_total}<br /></strong>Date:&nbsp;<strong>{payment_date}</strong><br />Invoice number:&nbsp;<span style=\"font-size: 12pt;\"><strong># {invoice_number}<br /><br /></strong></span>-------------------------------------------------<br /><br />You can always view the invoice for this payment at the following link:&nbsp;<a href=\"{invoice_link}\"><span style=\"font-size: 12pt;\">{invoice_number}</span></a><br /><br />We are looking forward working with you.<br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(7,'invoice','invoice-overdue-notice','english','Invoice Overdue Notice','Invoice Overdue Notice - {invoice_number}','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">This is an overdue notice for invoice <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\">This invoice was due: {invoice_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(8,'invoice','invoice-already-send','english','Invoice Already Sent to Customer','Invoice # {invoice_number} ','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">At your request, here is the invoice with number <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(9,'ticket','new-ticket-created-staff','english','New Ticket Created (Opened by Customer, Sent to Staff Members)','New Ticket Created','<p><span style=\"font-size: 12pt;\">A new support ticket has been opened.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),(10,'estimate','estimate-send-to-client','english','Send Estimate to Customer','Estimate # {estimate_number} created','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Please find the attached estimate <strong># {estimate_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Estimate status:</strong> {estimate_status}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">We look forward to your communication.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}<br /></span>','{companyname} | CRM','',0,1,0),(11,'ticket','ticket-reply-to-admin','english','Ticket Reply (Sent to Staff)','New Support Ticket Reply','<span style=\"font-size: 12pt;\">A new support ticket reply from {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(12,'estimate','estimate-already-send','english','Estimate Already Sent to Customer','Estimate # {estimate_number} ','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /> <br /><span style=\"font-size: 12pt;\">Thank you for your estimate request.</span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(13,'contract','contract-expiration','english','Contract Expiration Reminder (Sent to Customer Contacts)','Contract Expiration Reminder','<span style=\"font-size: 12pt;\">Dear {client_company}</span><br /><br /><span style=\"font-size: 12pt;\">This is a reminder that the following contract will expire soon:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {contract_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Description:</strong> {contract_description}</span><br /><span style=\"font-size: 12pt;\"><strong>Date Start:</strong> {contract_datestart}</span><br /><span style=\"font-size: 12pt;\"><strong>Date End:</strong> {contract_dateend}</span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(14,'tasks','task-assigned','english','New Task Assigned (Sent to Staff)','New Task Assigned to You - {task_name}','<span style=\"font-size: 12pt;\">Dear {staff_firstname}</span><br /><br /><span style=\"font-size: 12pt;\">You have been assigned to a new task:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}<br /></span><strong>Start Date:</strong> {task_startdate}<br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {task_priority}<br /><br /></span><span style=\"font-size: 12pt;\"><span>You can view the task on the following link</span>: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(15,'tasks','task-added-as-follower','english','Staff Member Added as Follower on Task (Sent to Staff)','You are added as follower on task - {task_name}','<span style=\"font-size: 12pt;\">Hi {staff_firstname}<br /></span><br /><span style=\"font-size: 12pt;\">You have been added as follower on the following task:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Start date:</strong> {task_startdate}</span><br /><br /><span>You can view the task on the following link</span><span>: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(16,'tasks','task-commented','english','New Comment on Task (Sent to Staff)','New Comment on Task - {task_name}','Dear {staff_firstname}<br /><br />A comment has been made on the following task:<br /><br /><strong>Name:</strong> {task_name}<br /><strong>Comment:</strong> {task_comment}<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(17,'tasks','task-added-attachment','english','New Attachment(s) on Task (Sent to Staff)','New Attachment on Task - {task_name}','Hi {staff_firstname}<br /><br /><strong>{task_user_take_action}</strong> added an attachment on the following task:<br /><br /><strong>Name:</strong> {task_name}<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(18,'estimate','estimate-declined-to-staff','english','Estimate Declined (Sent to Staff)','Customer Declined Estimate','<span style=\"font-size: 12pt;\">Hi</span><br /> <br /><span style=\"font-size: 12pt;\">Customer ({client_company}) declined estimate with number <strong># {estimate_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(19,'estimate','estimate-accepted-to-staff','english','Estimate Accepted (Sent to Staff)','Customer Accepted Estimate','<span style=\"font-size: 12pt;\">Hi</span><br /> <br /><span style=\"font-size: 12pt;\">Customer ({client_company}) accepted estimate with number <strong># {estimate_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(20,'proposals','proposal-client-accepted','english','Customer Action - Accepted (Sent to Staff)','Customer Accepted Proposal','<div>Hi<br /> <br />Client <strong>{proposal_proposal_to}</strong> accepted the following proposal:<br /> <br /><strong>Number:</strong> {proposal_number}<br /><strong>Subject</strong>: {proposal_subject}<br /><strong>Total</strong>: {proposal_total}<br /> <br />View the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /> <br />Kind Regards,<br />{email_signature}</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>','{companyname} | CRM','',0,1,0),(21,'proposals','proposal-send-to-customer','english','Send Proposal to Customer','Proposal With Number {proposal_number} Created','Dear {proposal_proposal_to}<br /><br />Please find our attached proposal.<br /><br />This proposal is valid until: {proposal_open_till}<br />You can view the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />Please don\'t hesitate to comment online if you have any questions.<br /><br />We look forward to your communication.<br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(22,'proposals','proposal-client-declined','english','Customer Action - Declined (Sent to Staff)','Client Declined Proposal','Hi<br /> <br />Customer <strong>{proposal_proposal_to}</strong> declined the proposal <strong>{proposal_subject}</strong><br /> <br />View the proposal on the following link <a href=\"{proposal_link}\">{proposal_number}</a>&nbsp;or from the admin area.<br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(23,'proposals','proposal-client-thank-you','english','Thank You Email (Sent to Customer After Accept)','Thank for you accepting proposal','Dear {proposal_proposal_to}<br /> <br />Thank for for accepting the proposal.<br /> <br />We look forward to doing business with you.<br /> <br />We will contact you as soon as possible<br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(24,'proposals','proposal-comment-to-client','english','New Comment  (Sent to Customer/Lead)','New Proposal Comment','Dear {proposal_proposal_to}<br /> <br />A new comment has been made on the following proposal: <strong>{proposal_number}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(25,'proposals','proposal-comment-to-admin','english','New Comment (Sent to Staff) ','New Proposal Comment','Hi<br /> <br />A new comment has been made to the proposal <strong>{proposal_subject}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{proposal_link}\">{proposal_number}</a>&nbsp;or from the admin area.<br /> <br />{email_signature}','{companyname} | CRM','',0,1,0),(26,'estimate','estimate-thank-you-to-customer','english','Thank You Email (Sent to Customer After Accept)','Thank for you accepting estimate','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /> <br /><span style=\"font-size: 12pt;\">Thank for for accepting the estimate.</span><br /> <br /><span style=\"font-size: 12pt;\">We look forward to doing business with you.</span><br /> <br /><span style=\"font-size: 12pt;\">We will contact you as soon as possible.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(27,'tasks','task-deadline-notification','english','Task Deadline Reminder - Sent to Assigned Members','Task Deadline Reminder','Hi {staff_firstname}&nbsp;{staff_lastname}<br /><br />This is an automated email from {companyname}.<br /><br />The task <strong>{task_name}</strong> deadline is on <strong>{task_duedate}</strong>. <br />This task is still not finished.<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(28,'contract','send-contract','english','Send Contract to Customer','Contract - {contract_subject}','<p><span style=\"font-size: 12pt;\">Hi&nbsp;{contact_firstname}&nbsp;{contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Please find the <a href=\"{contract_link}\">{contract_subject}</a> attached.<br /><br />Description: {contract_description}<br /><br /></span><span style=\"font-size: 12pt;\">Looking forward to hear from you.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),(29,'invoice','invoice-payment-recorded-to-staff','english','Invoice Payment Recorded (Sent to Staff)','New Invoice Payment','<span style=\"font-size: 12pt;\">Hi</span><br /><br /><span style=\"font-size: 12pt;\">Customer recorded payment for invoice <strong># {invoice_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(30,'ticket','auto-close-ticket','english','Auto Close Ticket','Ticket Auto Closed','<p><span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Ticket {ticket_subject} has been auto close due to inactivity.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket #</strong>: <a href=\"{ticket_public_url}\">{ticket_id}</a></span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),(31,'project','new-project-discussion-created-to-staff','english','New Project Discussion (Sent to Project Members)','New Project Discussion Created - {project_name}','<p>Hi {staff_firstname}<br /><br />New project discussion created from <strong>{discussion_creator}</strong><br /><br /><strong>Subject:</strong> {discussion_subject}<br /><strong>Description:</strong> {discussion_description}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(32,'project','new-project-discussion-created-to-customer','english','New Project Discussion (Sent to Customer Contacts)','New Project Discussion Created - {project_name}','<p>Hello {contact_firstname} {contact_lastname}<br /><br />New project discussion created from <strong>{discussion_creator}</strong><br /><br /><strong>Subject:</strong> {discussion_subject}<br /><strong>Description:</strong> {discussion_description}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(33,'project','new-project-file-uploaded-to-customer','english','New Project File(s) Uploaded (Sent to Customer Contacts)','New Project File(s) Uploaded - {project_name}','<p>Hello {contact_firstname} {contact_lastname}<br /><br />New project file is uploaded on <strong>{project_name}</strong> from <strong>{file_creator}</strong><br /><br />You can view the project on the following link: <a href=\"{project_link}\">{project_name}</a><br /><br />To view the file in our CRM you can click on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(34,'project','new-project-file-uploaded-to-staff','english','New Project File(s) Uploaded (Sent to Project Members)','New Project File(s) Uploaded - {project_name}','<p>Hello&nbsp;{staff_firstname}</p>\r\n<p>New project&nbsp;file is uploaded on&nbsp;<strong>{project_name}</strong> from&nbsp;<strong>{file_creator}</strong></p>\r\n<p>You can view the project on the following link: <a href=\"{project_link}\">{project_name}<br /></a><br />To view&nbsp;the file you can click on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a></p>\r\n<p>Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(35,'project','new-project-discussion-comment-to-customer','english','New Discussion Comment  (Sent to Customer Contacts)','New Discussion Comment','<p><span style=\"font-size: 12pt;\">Hello {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">New discussion comment has been made on <strong>{discussion_subject}</strong> from <strong>{comment_creator}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Discussion subject:</strong> {discussion_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Comment</strong>: {discussion_comment}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),(36,'project','new-project-discussion-comment-to-staff','english','New Discussion Comment (Sent to Project Members)','New Discussion Comment','<p>Hi {staff_firstname}<br /><br />New discussion comment has been made on <strong>{discussion_subject}</strong> from <strong>{comment_creator}</strong><br /><br /><strong>Discussion subject:</strong> {discussion_subject}<br /><strong>Comment:</strong> {discussion_comment}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(37,'project','staff-added-as-project-member','english','Staff Added as Project Member','New project assigned to you','<p>Hi {staff_firstname}<br /><br />New project has been assigned to you.<br /><br />You can view the project on the following link <a href=\"{project_link}\">{project_name}</a><br /><br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(38,'estimate','estimate-expiry-reminder','english','Estimate Expiration Reminder','Estimate Expiration Reminder','<p><span style=\"font-size: 12pt;\">Hello {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">The estimate with <strong># {estimate_number}</strong> will expire on <strong>{estimate_expirydate}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),(39,'proposals','proposal-expiry-reminder','english','Proposal Expiration Reminder','Proposal Expiration Reminder','<p>Hello {proposal_proposal_to}<br /><br />The proposal {proposal_number}&nbsp;will expire on <strong>{proposal_open_till}</strong><br /><br />You can view the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(40,'staff','new-staff-created','english','New Staff Created (Welcome Email)','You are added as staff member','Hi {staff_firstname}<br /><br />You are added as member on our CRM.<br /><br />Please use the following logic credentials:<br /><br /><strong>Email:</strong> {staff_email}<br /><strong>Password:</strong> {password}<br /><br />Click <a href=\"{admin_url}\">here </a>to login in the dashboard.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(41,'client','contact-forgot-password','english','Forgot Password','Create New Password','<h2>Create a new password</h2>\r\nForgot your password?<br /> To create a new password, just follow this link:<br /> <br /><a href=\"{reset_password_url}\">Reset Password</a><br /> <br /> You received this email, because it was requested by a {companyname}&nbsp;user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same. <br /><br /> {email_signature}','{companyname} | CRM','',0,1,0),(42,'client','contact-password-reseted','english','Password Reset - Confirmation','Your password has been changed','<strong><span style=\"font-size: 14pt;\">You have changed your password.</span><br /></strong><br /> Please, keep it in your records so you don\'t forget it.<br /> <br /> Your email address for login is: {contact_email}<br /><br />If this wasnt you, please contact us.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),(43,'client','contact-set-password','english','Set New Password','Set new password on {companyname} ','<h2><span style=\"font-size: 14pt;\">Setup your new password on {companyname}</span></h2>\r\nPlease use the following link to set up your new password:<br /><br /><a href=\"{set_password_url}\">Set new password</a><br /><br />Keep it in your records so you don\'t forget it.<br /><br />Please set your new password in <strong>48 hours</strong>. After that, you won\'t be able to set your password because this link will expire.<br /><br />You can login at: <a href=\"{crm_url}\">{crm_url}</a><br />Your email address for login: {contact_email}<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),(44,'staff','staff-forgot-password','english','Forgot Password','Create New Password','<h2><span style=\"font-size: 14pt;\">Create a new password</span></h2>\r\nForgot your password?<br /> To create a new password, just follow this link:<br /> <br /><a href=\"{reset_password_url}\">Reset Password</a><br /> <br /> You received this email, because it was requested by a <strong>{companyname}</strong>&nbsp;user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same. <br /><br /> {email_signature}','{companyname} | CRM','',0,1,0),(45,'staff','staff-password-reseted','english','Password Reset - Confirmation','Your password has been changed','<span style=\"font-size: 14pt;\"><strong>You have changed your password.<br /></strong></span><br /> Please, keep it in your records so you don\'t forget it.<br /> <br /> Your email address for login is: {staff_email}<br /><br /> If this wasnt you, please contact us.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),(46,'project','assigned-to-project','english','New Project Created (Sent to Customer Contacts)','New Project Created','<p>Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}</p>\r\n<p>New project is assigned to your company.<br /><br /><strong>Project Name:</strong>&nbsp;{project_name}<br /><strong>Project Start Date:</strong>&nbsp;{project_start_date}</p>\r\n<p>You can view the project on the following link:&nbsp;<a href=\"{project_link}\">{project_name}</a></p>\r\n<p>We are looking forward hearing from you.<br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(47,'tasks','task-added-attachment-to-contacts','english','New Attachment(s) on Task (Sent to Customer Contacts)','New Attachment on Task - {task_name}','<span>Hi {contact_firstname} {contact_lastname}</span><br /><br /><strong>{task_user_take_action}</strong><span> added an attachment on the following task:</span><br /><br /><strong>Name:</strong><span> {task_name}</span><br /><br /><span>You can view the task on the following link: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span>Kind Regards,</span><br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),(48,'tasks','task-commented-to-contacts','english','New Comment on Task (Sent to Customer Contacts)','New Comment on Task - {task_name}','<span>Dear {contact_firstname} {contact_lastname}</span><br /><br /><span>A comment has been made on the following task:</span><br /><br /><strong>Name:</strong><span> {task_name}</span><br /><strong>Comment:</strong><span> {task_comment}</span><br /><br /><span>You can view the task on the following link: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span>Kind Regards,</span><br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),(49,'leads','new-lead-assigned','english','New Lead Assigned to Staff Member','New lead assigned to you','<p>Hello {lead_assigned}<br /><br />New lead is assigned to you.<br /><br /><strong>Lead Name:</strong>&nbsp;{lead_name}<br /><strong>Lead Email:</strong>&nbsp;{lead_email}<br /><br />You can view the lead on the following link: <a href=\"{lead_link}\">{lead_name}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(50,'client','client-statement','english','Statement - Account Summary','Account Statement from {statement_from} to {statement_to}','Dear {contact_firstname} {contact_lastname}, <br /><br />Its been a great experience working with you.<br /><br />Attached with this email is a list of all transactions for the period between {statement_from} to {statement_to}<br /><br />For your information your account balance due is total:&nbsp;{statement_balance_due}<br /><br />Please contact us if you need more information.<br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(51,'ticket','ticket-assigned-to-admin','english','New Ticket Assigned (Sent to Staff)','New support ticket has been assigned to you','<p><span style=\"font-size: 12pt;\">Hi</span></p>\r\n<p><span style=\"font-size: 12pt;\">A new support ticket&nbsp;has been assigned to you.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),(52,'client','new-client-registered-to-admin','english','New Customer Registration (Sent to admins)','New Customer Registration','Hello.<br /><br />New customer registration on your customer portal:<br /><br /><strong>Firstname:</strong>&nbsp;{contact_firstname}<br /><strong>Lastname:</strong>&nbsp;{contact_lastname}<br /><strong>Company:</strong>&nbsp;{client_company}<br /><strong>Email:</strong>&nbsp;{contact_email}<br /><br />Best Regards','{companyname} | CRM','',0,1,0),(53,'leads','new-web-to-lead-form-submitted','english','Web to lead form submitted - Sent to lead','{lead_name} - We Received Your Request','Hello {lead_name}.<br /><br /><strong>Your request has been received.</strong><br /><br />This email is to let you know that we received your request and we will get back to you as soon as possible with more information.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,0,0),(54,'staff','two-factor-authentication','english','Two Factor Authentication','Confirm Your Login','<p>Hi {staff_firstname}</p>\r\n<p style=\"text-align: left;\">You received this email because you have enabled two factor authentication in your account.<br />Use the following code to confirm your login:</p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: 18pt;\"><strong>{two_factor_auth_code}<br /><br /></strong><span style=\"font-size: 12pt;\">{email_signature}</span><strong><br /><br /><br /><br /></strong></span></p>','{companyname} | CRM','',0,1,0),(55,'project','project-finished-to-customer','english','Project Marked as Finished (Sent to Customer Contacts)','Project Marked as Finished','<p>Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}</p>\r\n<p>You are receiving this email because project&nbsp;<strong>{project_name}</strong> has been marked as finished. This project is assigned under your company and we just wanted to keep you up to date.<br /><br />You can view the project on the following link:&nbsp;<a href=\"{project_link}\">{project_name}</a></p>\r\n<p>If you have any questions don\'t hesitate to contact us.<br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(56,'credit_note','credit-note-send-to-client','english','Send Credit Note To Email','Credit Note With Number #{credit_note_number} Created','Dear&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />We have attached the credit note with number <strong>#{credit_note_number} </strong>for your reference.<br /><br /><strong>Date:</strong>&nbsp;{credit_note_date}<br /><strong>Total Amount:</strong>&nbsp;{credit_note_total}<br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(57,'tasks','task-status-change-to-staff','english','Task Status Changed (Sent to Staff)','Task Status Changed','<span style=\"font-size: 12pt;\">Hi {staff_firstname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>{task_user_take_action}</strong> marked task as <strong>{task_status}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(58,'tasks','task-status-change-to-contacts','english','Task Status Changed (Sent to Customer Contacts)','Task Status Changed','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>{task_user_take_action}</strong> marked task as <strong>{task_status}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(59,'staff','reminder-email-staff','english','Staff Reminder Email','You Have a New Reminder!','<p>Hello&nbsp;{staff_firstname}<br /><br /><strong>You have a new reminder&nbsp;linked to&nbsp;{staff_reminder_relation_name}!<br /><br />Reminder description:</strong><br />{staff_reminder_description}<br /><br />Click <a href=\"{staff_reminder_relation_link}\">here</a> to view&nbsp;<a href=\"{staff_reminder_relation_link}\">{staff_reminder_relation_name}</a><br /><br />Best Regards<br /><br /></p>','{companyname} | CRM','',0,1,0),(60,'contract','contract-comment-to-client','english','New Comment  (Sent to Customer Contacts)','New Contract Comment','Dear {contact_firstname} {contact_lastname}<br /> <br />A new comment has been made on the following contract: <strong>{contract_subject}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{contract_link}\">{contract_subject}</a><br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(61,'contract','contract-comment-to-admin','english','New Comment (Sent to Staff) ','New Contract Comment','Hi {staff_firstname}<br /><br />A new comment has been made to the contract&nbsp;<strong>{contract_subject}</strong><br /><br />You can view and reply to the comment on the following link: <a href=\"{contract_link}\">{contract_subject}</a>&nbsp;or from the admin area.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),(62,'subscriptions','send-subscription','english','Send Subscription to Customer','Subscription Created','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />We have prepared the subscription&nbsp;<strong>{subscription_name}</strong> for your company.<br /><br />Click <a href=\"{subscription_link}\">here</a> to review the subscription and subscribe.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(63,'subscriptions','subscription-payment-failed','english','Subscription Payment Failed','Your most recent invoice payment failed','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br br=\"\" />Unfortunately, your most recent invoice payment for&nbsp;<strong>{subscription_name}</strong> was declined.<br /><br />This could be due to a change in your card number, your card expiring,<br />cancellation of your credit card, or the card issuer not recognizing the<br />payment and therefore taking action to prevent it.<br /><br />Please update your payment information as soon as possible by logging in here:<br /><a href=\"{crm_url}/login\">{crm_url}/login</a><br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(64,'subscriptions','subscription-canceled','english','Subscription Canceled (Sent to customer primary contact)','Your subscription has been canceled','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />Your subscription&nbsp;<strong>{subscription_name} </strong>has been canceled, if you have any questions don\'t hesitate to contact us.<br /><br />It was a pleasure doing business with you.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(65,'subscriptions','subscription-payment-succeeded','english','Subscription Payment Succeeded (Sent to customer primary contact)','Subscription  Payment Receipt - {subscription_name}','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />This email is to let you know that we received your payment for subscription&nbsp;<strong>{subscription_name}&nbsp;</strong>of&nbsp;<strong><span>{payment_total}<br /><br /></span></strong>The invoice associated with it is now with status&nbsp;<strong>{invoice_status}<br /></strong><br />Thank you for your confidence.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),(66,'contract','contract-expiration-to-staff','english','Contract Expiration Reminder (Sent to Staff)','Contract Expiration Reminder','Hi {staff_firstname}<br /><br /><span style=\"font-size: 12pt;\">This is a reminder that the following contract will expire soon:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {contract_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Description:</strong> {contract_description}</span><br /><span style=\"font-size: 12pt;\"><strong>Date Start:</strong> {contract_datestart}</span><br /><span style=\"font-size: 12pt;\"><strong>Date End:</strong> {contract_dateend}</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(67,'gdpr','gdpr-removal-request','english','Removal Request From Contact (Sent to administrators)','Data Removal Request Received','Hello&nbsp;{staff_firstname}&nbsp;{staff_lastname}<br /><br />Data removal has been requested by&nbsp;{contact_firstname} {contact_lastname}<br /><br />You can review this request and take proper actions directly from the admin area.','{companyname} | CRM','',0,1,0),(68,'gdpr','gdpr-removal-request-lead','english','Removal Request From Lead (Sent to administrators)','Data Removal Request Received','Hello&nbsp;{staff_firstname}&nbsp;{staff_lastname}<br /><br />Data removal has been requested by {lead_name}<br /><br />You can review this request and take proper actions directly from the admin area.<br /><br />To view the lead inside the admin area click here:&nbsp;<a href=\"{lead_link}\">{lead_link}</a>','{companyname} | CRM','',0,1,0),(69,'client','client-registration-confirmed','english','Customer Registration Confirmed','Your registration is confirmed','<p>Dear {contact_firstname} {contact_lastname}<br /><br />We just wanted to let you know that your registration at&nbsp;{companyname} is successfully confirmed and your account is now active.<br /><br />You can login at&nbsp;<a href=\"{crm_url}\">{crm_url}</a> with the email and password you provided during registration.<br /><br />Please contact us if you need any help.<br /><br />Kind Regards, <br />{email_signature}</p>\r\n<p><br />(This is an automated email, so please don\'t reply to this email address)</p>','{companyname} | CRM','',0,1,0),(70,'contract','contract-signed-to-staff','english','Contract Signed (Sent to Staff)','Customer Signed a Contract','Hi {staff_firstname}<br /><br />A contract with subject&nbsp;<strong>{contract_subject} </strong>has been successfully signed by the customer.<br /><br />You can view the contract at the following link: <a href=\"{contract_link}\">{contract_subject}</a>&nbsp;or from the admin area.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),(71,'subscriptions','customer-subscribed-to-staff','english','Customer Subscribed to a Subscription (Sent to administrators and subscription creator)','Customer Subscribed to a Subscription','The customer <strong>{client_company}</strong> subscribed to a subscription with name&nbsp;<strong>{subscription_name}</strong><br /><br /><strong>ID</strong>:&nbsp;{subscription_id}<br /><strong>Subscription name</strong>:&nbsp;{subscription_name}<br /><strong>Subscription description</strong>:&nbsp;{subscription_description}<br /><br />You can view the subscription by clicking <a href=\"{subscription_link}\">here</a><br />\r\n<div style=\"text-align: center;\"><span style=\"font-size: 10pt;\">&nbsp;</span></div>\r\nBest Regards,<br />{email_signature}<br /><br /><span style=\"font-size: 10pt;\"><span style=\"color: #999999;\">You are receiving this email because you are either administrator or you are creator of the subscription.</span></span>','{companyname} | CRM','',0,1,0),(72,'client','contact-verification-email','english','Email Verification (Sent to Contact After Registration)','Verify Email Address','<p>Hello&nbsp;{contact_firstname}<br /><br />Please click the button below to verify your email address.<br /><br /><a href=\"{email_verification_url}\">Verify Email Address</a><br /><br />If you did not create an account, no further action is required</p>\r\n<p><br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(73,'client','new-customer-profile-file-uploaded-to-staff','english','New Customer Profile File(s) Uploaded (Sent to Staff)','Customer Uploaded New File(s) in Profile','Hi!<br /><br />New file(s) is uploaded into the customer ({client_company}) profile by&nbsp;{contact_firstname}<br /><br />You can check the uploaded files into the admin area by clicking <a href=\"{customer_profile_files_admin_link}\">here</a> or at the following link:&nbsp;{customer_profile_files_admin_link}<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),(74,'staff','event-notification-to-staff','english','Event Notification (Calendar)','Upcoming Event - {event_title}','Hi {staff_firstname}! <br /><br />This is a reminder for event <a href=\\\"{event_link}\\\">{event_title}</a> scheduled at {event_start_date}. <br /><br />Regards.','','',0,1,0),(75,'subscriptions','subscription-payment-requires-action','english','Credit Card Authorization Required - SCA','Important: Confirm your subscription {subscription_name} payment','<p>Hello {contact_firstname}</p>\r\n<p><strong>Your bank sometimes requires an additional step to make sure an online transaction was authorized.</strong><br /><br />Because of European regulation to protect consumers, many online payments now require two-factor authentication. Your bank ultimately decides when authentication is required to confirm a payment, but you may notice this step when you start paying for a service or when the cost changes.<br /><br />In order to pay the subscription <strong>{subscription_name}</strong>, you will need to&nbsp;confirm your payment by clicking on the follow link: <strong><a href=\"{subscription_authorize_payment_link}\">{subscription_authorize_payment_link}</a></strong><br /><br />To view the subscription, please click at the following link: <a href=\"{subscription_link}\"><span>{subscription_link}</span></a><br />or you can login in our dedicated area here: <a href=\"{crm_url}/login\">{crm_url}/login</a> in case you want to update your credit card or view the subscriptions you are subscribed.<br /><br />Best Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),(76,'invoice','invoice-due-notice','english','Invoice Due Notice','Your {invoice_number} will be due soon','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}<br /><br /></span>You invoice <span style=\"font-size: 12pt;\"><strong># {invoice_number} </strong>will be due on <strong>{invoice_duedate}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),(77,'estimate_request','estimate-request-submitted-to-staff','english','Estimate Request Submitted (Sent to Staff)','New Estimate Request Submitted','<span> Hello,&nbsp;</span><br /><br />{estimate_request_email} submitted an estimate request via the {estimate_request_form_name} form.<br /><br />You can view the request at the following link: <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />==<br /><br />{estimate_request_submitted_data}<br /><br />Kind Regards,<br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),(78,'estimate_request','estimate-request-assigned','english','Estimate Request Assigned (Sent to Staff)','New Estimate Request Assigned','<span> Hello {estimate_request_assigned},&nbsp;</span><br /><br />Estimate request #{estimate_request_id} has been assigned to you.<br /><br />You can view the request at the following link: <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />Kind Regards,<br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),(79,'estimate_request','estimate-request-received-to-user','english','Estimate Request Received (Sent to User)','Estimate Request Received','Hello,<br /><br /><strong>Your request has been received.</strong><br /><br />This email is to let you know that we received your request and we will get back to you as soon as possible with more information.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,0,0),(80,'notifications','non-billed-tasks-reminder','english','Non-billed tasks reminder (sent to selected staff members)','Action required: Completed tasks are not billed','Hello {staff_firstname}<br><br>The following tasks are marked as complete but not yet billed:<br><br>{unbilled_tasks_list}<br><br>Kind Regards,<br><br>{email_signature}','{companyname} | CRM','',0,1,0),(81,'invoice','invoices-batch-payments','english','Invoices Payments Recorded in Batch (Sent to Customer)','We have received your payments','Hello {contact_firstname} {contact_lastname}<br><br>Thank you for the payments. Please find the payments details below:<br><br>{batch_payments_list}<br><br>We are looking forward working with you.<br><br>Kind Regards,<br><br>{email_signature}','{companyname} | CRM','',0,1,0),(82,'file_sharing','fs-share-staff','english','Shared to staff','File Sharing','<span></span><br /><br /><span>Have files that have just been shared with you: {share_link}.</span>','{companyname} | CRM',NULL,0,1,0),(83,'file_sharing','fs-share-client','english','Shared to client','File Sharing','<span></span><br /><br /><span>Have files that have just been shared with you: {share_link}.</span>','{companyname} | CRM',NULL,0,1,0),(84,'file_sharing','fs-share-public','english','Shared to public','File Sharing','<span></span><br /><br /><span>Have files that have just been shared with you: {share_link}.</span>','{companyname} | CRM',NULL,0,1,0),(85,'approve','send-request-approve','english','Send Approval Request','Require Approval','<p>Hi {staff_firstname}<br /><br />You have received a request to approve the {object_type}.<br /><br />You can view the {object_type} on the following link <a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}</p>','{companyname} | CRM',NULL,0,1,0),(86,'approve','send-request-approve','vietnamese','Gửi yêu cầu phê duyệt','Yêu cầu phê duyệt','Xin ch&agrave;o {staff_firstname} {staff_lastname}<br /><br />Bạn đã nhận được yêu cầu phê duyệt {object_type} mới.<br /><br />Bạn c&oacute; thể xem hóa đơn tại đ&acirc;y&nbsp;<a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}','{companyname} | CRM',NULL,0,1,0),(87,'approve','send_rejected','english','Send Rejected','The {object_type} has been rejected','<p>Hi {staff_firstname}<br /><br />Your {object_type} has been rejected.<br /><br />You can view the {object_type} on the following link <a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}</p>','{companyname} | CRM',NULL,0,1,0),(88,'approve','send_rejected','vietnamese','Gửi từ chối','{object_type} đã bị từ chối','Xin ch&agrave;o {staff_firstname} {staff_lastname}<br /><br />{object_type} của bạn đã bị từ chối.<br /><br />Bạn c&oacute; thể xem {object_type} tại đ&acirc;y&nbsp;<a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}','{companyname} | CRM',NULL,0,1,0),(89,'approve','send_approve','english','Send Approve','The {object_type} has been approved','<p>Hi {staff_firstname}<br /><br />Your {object_type} has been approved.<br /><br />You can view the {object_type} on the following link <a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}</p>','{companyname} | CRM',NULL,0,1,0),(90,'approve','send_approve','vietnamese','Gửi phê duyệt','{object_type} đã được phê duyệt','Xin ch&agrave;o {staff_firstname} {staff_lastname}<br /><br />{object_type} của bạn đã được phê duyệt.<br /><br />Bạn c&oacute; thể xem {object_type} tại đ&acirc;y&nbsp;<a href=\"{object_link}\">{object_name}</a><br /><br />{email_signature}','{companyname} | CRM',NULL,0,1,0);
/*!40000 ALTER TABLE `tblemailtemplates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestimate_request_forms`
--

DROP TABLE IF EXISTS `tblestimate_request_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblestimate_request_forms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `form_key` varchar(32) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `form_data` mediumtext,
  `recaptcha` int DEFAULT NULL,
  `status` int NOT NULL,
  `submit_btn_name` varchar(100) DEFAULT NULL,
  `submit_btn_bg_color` varchar(10) DEFAULT '#84c529',
  `submit_btn_text_color` varchar(10) DEFAULT '#ffffff',
  `success_submit_msg` text,
  `submit_action` int DEFAULT '0',
  `submit_redirect_url` mediumtext,
  `language` varchar(100) DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  `notify_type` varchar(100) DEFAULT NULL,
  `notify_ids` mediumtext,
  `responsible` int DEFAULT NULL,
  `notify_request_submitted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestimate_request_forms`
--

LOCK TABLES `tblestimate_request_forms` WRITE;
/*!40000 ALTER TABLE `tblestimate_request_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblestimate_request_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestimate_request_status`
--

DROP TABLE IF EXISTS `tblestimate_request_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblestimate_request_status` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `statusorder` int DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `flag` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestimate_request_status`
--

LOCK TABLES `tblestimate_request_status` WRITE;
/*!40000 ALTER TABLE `tblestimate_request_status` DISABLE KEYS */;
INSERT INTO `tblestimate_request_status` VALUES (1,'Cancelled',1,'#808080','cancelled'),(2,'Processing',2,'#007bff','processing'),(3,'Completed',3,'#28a745','completed');
/*!40000 ALTER TABLE `tblestimate_request_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestimate_requests`
--

DROP TABLE IF EXISTS `tblestimate_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblestimate_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `submission` longtext NOT NULL,
  `last_status_change` datetime DEFAULT NULL,
  `date_estimated` datetime DEFAULT NULL,
  `from_form_id` int DEFAULT NULL,
  `assigned` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `default_language` int NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestimate_requests`
--

LOCK TABLES `tblestimate_requests` WRITE;
/*!40000 ALTER TABLE `tblestimate_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblestimate_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestimates`
--

DROP TABLE IF EXISTS `tblestimates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblestimates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `datesend` datetime DEFAULT NULL,
  `clientid` int NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `number` int NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int NOT NULL DEFAULT '0',
  `hash` varchar(32) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `expirydate` date DEFAULT NULL,
  `currency` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `clientnote` text,
  `adminnote` text,
  `discount_percent` decimal(15,2) DEFAULT '0.00',
  `discount_total` decimal(15,2) DEFAULT '0.00',
  `discount_type` varchar(30) DEFAULT NULL,
  `invoiceid` int DEFAULT NULL,
  `invoiced_date` datetime DEFAULT NULL,
  `terms` text,
  `reference_no` varchar(100) DEFAULT NULL,
  `sale_agent` int NOT NULL DEFAULT '0',
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_estimate` tinyint(1) NOT NULL DEFAULT '1',
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `pipeline_order` int DEFAULT '1',
  `is_expiry_notified` int NOT NULL DEFAULT '0',
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `currency` (`currency`),
  KEY `project_id` (`project_id`),
  KEY `sale_agent` (`sale_agent`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestimates`
--

LOCK TABLES `tblestimates` WRITE;
/*!40000 ALTER TABLE `tblestimates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblestimates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblevents`
--

DROP TABLE IF EXISTS `tblevents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblevents` (
  `eventid` int NOT NULL AUTO_INCREMENT,
  `title` mediumtext NOT NULL,
  `description` text,
  `userid` int NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `public` int NOT NULL DEFAULT '0',
  `color` varchar(10) DEFAULT NULL,
  `isstartnotified` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_before` int NOT NULL DEFAULT '0',
  `reminder_before_type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblevents`
--

LOCK TABLES `tblevents` WRITE;
/*!40000 ALTER TABLE `tblevents` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblevents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblexpenses`
--

DROP TABLE IF EXISTS `tblexpenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblexpenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL,
  `currency` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` int DEFAULT NULL,
  `tax2` int NOT NULL DEFAULT '0',
  `reference_no` varchar(100) DEFAULT NULL,
  `note` text,
  `expense_name` varchar(191) DEFAULT NULL,
  `clientid` int NOT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `billable` int DEFAULT '0',
  `invoiceid` int DEFAULT NULL,
  `paymentmode` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int DEFAULT NULL,
  `recurring` int NOT NULL DEFAULT '0',
  `cycles` int NOT NULL DEFAULT '0',
  `total_cycles` int NOT NULL DEFAULT '0',
  `custom_recurring` int NOT NULL DEFAULT '0',
  `last_recurring_date` date DEFAULT NULL,
  `create_invoice_billable` tinyint(1) DEFAULT NULL,
  `send_invoice_to_customer` tinyint(1) NOT NULL,
  `recurring_from` int DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `addedfrom` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `project_id` (`project_id`),
  KEY `category` (`category`),
  KEY `currency` (`currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblexpenses`
--

LOCK TABLES `tblexpenses` WRITE;
/*!40000 ALTER TABLE `tblexpenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblexpenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblexpenses_categories`
--

DROP TABLE IF EXISTS `tblexpenses_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblexpenses_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblexpenses_categories`
--

LOCK TABLES `tblexpenses_categories` WRITE;
/*!40000 ALTER TABLE `tblexpenses_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblexpenses_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfiles`
--

DROP TABLE IF EXISTS `tblfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(40) DEFAULT NULL,
  `visible_to_customer` int NOT NULL DEFAULT '0',
  `attachment_key` varchar(32) DEFAULT NULL,
  `external` varchar(40) DEFAULT NULL,
  `external_link` text,
  `thumbnail_link` text COMMENT 'For external usage',
  `staffid` int NOT NULL,
  `contact_id` int DEFAULT '0',
  `task_comment_id` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfiles`
--

LOCK TABLES `tblfiles` WRITE;
/*!40000 ALTER TABLE `tblfiles` DISABLE KEYS */;
INSERT INTO `tblfiles` VALUES (1,1,'customer','test.txt','text/plain',1,'19909bb8593ba768a9fa9e878894c5fa',NULL,NULL,NULL,0,1,0,'2023-07-05 08:37:45');
/*!40000 ALTER TABLE `tblfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblform_question_box`
--

DROP TABLE IF EXISTS `tblform_question_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblform_question_box` (
  `boxid` int NOT NULL AUTO_INCREMENT,
  `boxtype` varchar(10) NOT NULL,
  `questionid` int NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblform_question_box`
--

LOCK TABLES `tblform_question_box` WRITE;
/*!40000 ALTER TABLE `tblform_question_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblform_question_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblform_question_box_description`
--

DROP TABLE IF EXISTS `tblform_question_box_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblform_question_box_description` (
  `questionboxdescriptionid` int NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `boxid` mediumtext NOT NULL,
  `questionid` int NOT NULL,
  PRIMARY KEY (`questionboxdescriptionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblform_question_box_description`
--

LOCK TABLES `tblform_question_box_description` WRITE;
/*!40000 ALTER TABLE `tblform_question_box_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblform_question_box_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblform_questions`
--

DROP TABLE IF EXISTS `tblform_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblform_questions` (
  `questionid` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `question` mediumtext NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `question_order` int NOT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblform_questions`
--

LOCK TABLES `tblform_questions` WRITE;
/*!40000 ALTER TABLE `tblform_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblform_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblform_results`
--

DROP TABLE IF EXISTS `tblform_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblform_results` (
  `resultid` int NOT NULL AUTO_INCREMENT,
  `boxid` int NOT NULL,
  `boxdescriptionid` int DEFAULT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `questionid` int NOT NULL,
  `answer` text,
  `resultsetid` int NOT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblform_results`
--

LOCK TABLES `tblform_results` WRITE;
/*!40000 ALTER TABLE `tblform_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblform_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_downloads`
--

DROP TABLE IF EXISTS `tblfs_downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_downloads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hash_share` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `browser_name` varchar(45) DEFAULT NULL,
  `http_user_agent` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_downloads`
--

LOCK TABLES `tblfs_downloads` WRITE;
/*!40000 ALTER TABLE `tblfs_downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfs_downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_file_overview`
--

DROP TABLE IF EXISTS `tblfs_file_overview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_file_overview` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fileid` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` text,
  `number` int NOT NULL DEFAULT '0',
  `created_at` varchar(11) DEFAULT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash` varchar(250) NOT NULL DEFAULT '',
  `dir` int NOT NULL DEFAULT '0',
  `hash_share` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_file_overview`
--

LOCK TABLES `tblfs_file_overview` WRITE;
/*!40000 ALTER TABLE `tblfs_file_overview` DISABLE KEYS */;
INSERT INTO `tblfs_file_overview` VALUES (1,'1686601270','directory','Main File Sharing/administrador-local',0,'1','2023-06-12 20:21:10','2023-06-12 20:21:10','',1,'Pui5IM'),(2,'168660127094','directory','modules/file_sharing/uploads/Main File Sharing/administrador-local/Shared',0,'1','2023-06-12 20:21:10','2023-06-12 20:21:10','',1,'XTChXp'),(3,'168660127078','directory','modules/file_sharing/uploads/Main File Sharing/.trash/administrador-local',0,'1','2023-06-12 20:21:10','2023-06-12 20:21:10','',1,'FrR4rM'),(4,'1686601297','directory','C:\\wamp64\\www\\ecv_marcas\\code\\crm\\modules/file_sharing/uploads/Main File Sharing/administrador-local',0,'1','2023-06-12 20:21:37','2023-06-12 20:21:37','',1,'sTJW6D'),(5,'168660129727','directory','modules/file_sharing/uploads/Main File Sharing/administrador-local/Shared',0,'1','2023-06-12 20:21:37','2023-06-12 20:21:37','',1,'3ENVAg');
/*!40000 ALTER TABLE `tblfs_file_overview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_genenal_ip_share`
--

DROP TABLE IF EXISTS `tblfs_genenal_ip_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_genenal_ip_share` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parrent_id` varchar(11) NOT NULL,
  `ip_share` varchar(20) DEFAULT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_genenal_ip_share`
--

LOCK TABLES `tblfs_genenal_ip_share` WRITE;
/*!40000 ALTER TABLE `tblfs_genenal_ip_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfs_genenal_ip_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_setting_configuration`
--

DROP TABLE IF EXISTS `tblfs_setting_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_setting_configuration` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `is_upload` int NOT NULL DEFAULT '0',
  `is_download` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `is_write` int NOT NULL DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `max_size` int NOT NULL DEFAULT '2',
  `min_size` int NOT NULL DEFAULT '1',
  `created_at` varchar(11) DEFAULT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_share` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_setting_configuration`
--

LOCK TABLES `tblfs_setting_configuration` WRITE;
/*!40000 ALTER TABLE `tblfs_setting_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfs_setting_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_setting_configuration_relationship`
--

DROP TABLE IF EXISTS `tblfs_setting_configuration_relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_setting_configuration_relationship` (
  `id` int NOT NULL AUTO_INCREMENT,
  `configuration_id` int NOT NULL,
  `rel_type` varchar(45) NOT NULL,
  `rel_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_setting_configuration_relationship`
--

LOCK TABLES `tblfs_setting_configuration_relationship` WRITE;
/*!40000 ALTER TABLE `tblfs_setting_configuration_relationship` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfs_setting_configuration_relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_sharing_relationship`
--

DROP TABLE IF EXISTS `tblfs_sharing_relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_sharing_relationship` (
  `id` int NOT NULL AUTO_INCREMENT,
  `share_id` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_sharing_relationship`
--

LOCK TABLES `tblfs_sharing_relationship` WRITE;
/*!40000 ALTER TABLE `tblfs_sharing_relationship` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfs_sharing_relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfs_sharings`
--

DROP TABLE IF EXISTS `tblfs_sharings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfs_sharings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_read` int NOT NULL DEFAULT '0',
  `is_upload` int NOT NULL DEFAULT '0',
  `is_download` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `is_write` int NOT NULL DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `expiration_date_apply` int DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `expiration_date_delete` int DEFAULT NULL,
  `download_limits_apply` int DEFAULT NULL,
  `download_limits` int DEFAULT NULL,
  `download_limits_delete` int DEFAULT NULL,
  `hash_share` varchar(255) DEFAULT NULL,
  `created_at` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `isowner` tinyint DEFAULT NULL,
  `phash` text,
  `locked` tinyint DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `read` tinyint DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `ts` varchar(255) DEFAULT NULL,
  `write` tinyint DEFAULT NULL,
  `hash` text,
  `url` text,
  `has_been_deleted` int NOT NULL DEFAULT '0',
  `downloads` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfs_sharings`
--

LOCK TABLES `tblfs_sharings` WRITE;
/*!40000 ALTER TABLE `tblfs_sharings` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblfs_sharings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgdpr_requests`
--

DROP TABLE IF EXISTS `tblgdpr_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblgdpr_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clientid` int NOT NULL DEFAULT '0',
  `contact_id` int NOT NULL DEFAULT '0',
  `lead_id` int NOT NULL DEFAULT '0',
  `request_type` varchar(191) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `request_date` datetime NOT NULL,
  `request_from` varchar(150) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgdpr_requests`
--

LOCK TABLES `tblgdpr_requests` WRITE;
/*!40000 ALTER TABLE `tblgdpr_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblgdpr_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgoals`
--

DROP TABLE IF EXISTS `tblgoals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblgoals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `goal_type` int NOT NULL,
  `contract_type` int NOT NULL DEFAULT '0',
  `achievement` int NOT NULL,
  `notify_when_fail` tinyint(1) NOT NULL DEFAULT '1',
  `notify_when_achieve` tinyint(1) NOT NULL DEFAULT '1',
  `notified` int NOT NULL DEFAULT '0',
  `staff_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgoals`
--

LOCK TABLES `tblgoals` WRITE;
/*!40000 ALTER TABLE `tblgoals` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblgoals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblhrm_option`
--

DROP TABLE IF EXISTS `tblhrm_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblhrm_option` (
  `option_id` int unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_val` longtext,
  `auto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblhrm_option`
--

LOCK TABLES `tblhrm_option` WRITE;
/*!40000 ALTER TABLE `tblhrm_option` DISABLE KEYS */;
INSERT INTO `tblhrm_option` VALUES (1,'hrm_contract_form','[]',1),(2,'hrm_leave_position','[]',1),(3,'hrm_leave_contract_type','[]',1),(4,'hrm_leave_start_date',NULL,1),(5,'hrm_max_leave_in_year',NULL,1),(6,'hrm_start_leave_from_month',NULL,1),(7,'hrm_start_leave_to_month',NULL,1),(8,'hrm_add_new_leave_month_from_date',NULL,1),(9,'hrm_accumulated_leave_to_month',NULL,1),(10,'hrm_leave_contract_sign_day',NULL,1),(11,'hrm_start_date_seniority',NULL,1),(12,'hrm_seniority_year',NULL,1),(13,'hrm_seniority_year_leave',NULL,1),(14,'hrm_next_year',NULL,1),(15,'hrm_next_year_leave',NULL,1),(16,'alow_borrow_leave',NULL,1),(17,'contract_type_borrow','[]',1),(18,'max_leave_borrow',NULL,1),(19,'day_increases_monthly','15',1),(20,'sign_a_labor_contract','1',1),(21,'maternity_leave_to_return_to_work','1',1),(22,'unpaid_leave_to_return_to_work','1',1),(23,'increase_the_premium','1',1),(24,'day_decreases_monthly','5',1),(25,'contract_paid_for_unemployment','1',1),(26,'maternity_leave_regime','1',1),(27,'unpaid_leave_of_more_than','10',1),(28,'reduced_premiums','1',1);
/*!40000 ALTER TABLE `tblhrm_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblhrm_timesheet`
--

DROP TABLE IF EXISTS `tblhrm_timesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblhrm_timesheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `date_work` date NOT NULL,
  `value` text,
  `type` varchar(45) DEFAULT NULL,
  `add_from` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblhrm_timesheet`
--

LOCK TABLES `tblhrm_timesheet` WRITE;
/*!40000 ALTER TABLE `tblhrm_timesheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblhrm_timesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinsurance_type`
--

DROP TABLE IF EXISTS `tblinsurance_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblinsurance_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from_month` date NOT NULL,
  `social_company` varchar(15) DEFAULT NULL,
  `social_staff` varchar(15) DEFAULT NULL,
  `labor_accident_company` varchar(15) DEFAULT NULL,
  `labor_accident_staff` varchar(15) DEFAULT NULL,
  `health_company` varchar(15) DEFAULT NULL,
  `health_staff` varchar(15) DEFAULT NULL,
  `unemployment_company` varchar(15) DEFAULT NULL,
  `unemployment_staff` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinsurance_type`
--

LOCK TABLES `tblinsurance_type` WRITE;
/*!40000 ALTER TABLE `tblinsurance_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblinsurance_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinvoicepaymentrecords`
--

DROP TABLE IF EXISTS `tblinvoicepaymentrecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblinvoicepaymentrecords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoiceid` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymentmode` varchar(40) DEFAULT NULL,
  `paymentmethod` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `daterecorded` datetime NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `transactionid` mediumtext,
  PRIMARY KEY (`id`),
  KEY `invoiceid` (`invoiceid`),
  KEY `paymentmethod` (`paymentmethod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinvoicepaymentrecords`
--

LOCK TABLES `tblinvoicepaymentrecords` WRITE;
/*!40000 ALTER TABLE `tblinvoicepaymentrecords` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblinvoicepaymentrecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinvoices`
--

DROP TABLE IF EXISTS `tblinvoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblinvoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `datesend` datetime DEFAULT NULL,
  `clientid` int NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `currency` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `status` int DEFAULT '1',
  `clientnote` text,
  `adminnote` text,
  `last_overdue_reminder` date DEFAULT NULL,
  `last_due_reminder` date DEFAULT NULL,
  `cancel_overdue_reminders` int NOT NULL DEFAULT '0',
  `allowed_payment_modes` mediumtext,
  `token` mediumtext,
  `discount_percent` decimal(15,2) DEFAULT '0.00',
  `discount_total` decimal(15,2) DEFAULT '0.00',
  `discount_type` varchar(30) NOT NULL,
  `recurring` int NOT NULL DEFAULT '0',
  `recurring_type` varchar(10) DEFAULT NULL,
  `custom_recurring` tinyint(1) NOT NULL DEFAULT '0',
  `cycles` int NOT NULL DEFAULT '0',
  `total_cycles` int NOT NULL DEFAULT '0',
  `is_recurring_from` int DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `terms` text,
  `sale_agent` int NOT NULL DEFAULT '0',
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_invoice` tinyint(1) NOT NULL DEFAULT '1',
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `project_id` int DEFAULT '0',
  `subscription_id` int NOT NULL DEFAULT '0',
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency` (`currency`),
  KEY `clientid` (`clientid`),
  KEY `project_id` (`project_id`),
  KEY `sale_agent` (`sale_agent`),
  KEY `total` (`total`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinvoices`
--

LOCK TABLES `tblinvoices` WRITE;
/*!40000 ALTER TABLE `tblinvoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblinvoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblitem_tax`
--

DROP TABLE IF EXISTS `tblitem_tax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblitem_tax` (
  `id` int NOT NULL AUTO_INCREMENT,
  `itemid` int NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL,
  `taxname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemid` (`itemid`),
  KEY `rel_id` (`rel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblitem_tax`
--

LOCK TABLES `tblitem_tax` WRITE;
/*!40000 ALTER TABLE `tblitem_tax` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblitem_tax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblitemable`
--

DROP TABLE IF EXISTS `tblitemable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblitemable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(15) NOT NULL,
  `description` mediumtext NOT NULL,
  `long_description` mediumtext,
  `qty` decimal(15,2) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `item_order` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `qty` (`qty`),
  KEY `rate` (`rate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblitemable`
--

LOCK TABLES `tblitemable` WRITE;
/*!40000 ALTER TABLE `tblitemable` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblitemable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblitems`
--

DROP TABLE IF EXISTS `tblitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblitems` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `long_description` text,
  `rate` decimal(15,2) NOT NULL,
  `tax` int DEFAULT NULL,
  `tax2` int DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `group_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tax` (`tax`),
  KEY `tax2` (`tax2`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblitems`
--

LOCK TABLES `tblitems` WRITE;
/*!40000 ALTER TABLE `tblitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblitems_groups`
--

DROP TABLE IF EXISTS `tblitems_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblitems_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblitems_groups`
--

LOCK TABLES `tblitems_groups` WRITE;
/*!40000 ALTER TABLE `tblitems_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblitems_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbljob_position`
--

DROP TABLE IF EXISTS `tbljob_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbljob_position` (
  `position_id` int unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(200) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbljob_position`
--

LOCK TABLES `tbljob_position` WRITE;
/*!40000 ALTER TABLE `tbljob_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbljob_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblknowedge_base_article_feedback`
--

DROP TABLE IF EXISTS `tblknowedge_base_article_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblknowedge_base_article_feedback` (
  `articleanswerid` int NOT NULL AUTO_INCREMENT,
  `articleid` int NOT NULL,
  `answer` int NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`articleanswerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblknowedge_base_article_feedback`
--

LOCK TABLES `tblknowedge_base_article_feedback` WRITE;
/*!40000 ALTER TABLE `tblknowedge_base_article_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblknowedge_base_article_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblknowledge_base`
--

DROP TABLE IF EXISTS `tblknowledge_base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblknowledge_base` (
  `articleid` int NOT NULL AUTO_INCREMENT,
  `articlegroup` int NOT NULL,
  `subject` mediumtext NOT NULL,
  `description` text NOT NULL,
  `slug` mediumtext NOT NULL,
  `active` tinyint NOT NULL,
  `datecreated` datetime NOT NULL,
  `article_order` int NOT NULL DEFAULT '0',
  `staff_article` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblknowledge_base`
--

LOCK TABLES `tblknowledge_base` WRITE;
/*!40000 ALTER TABLE `tblknowledge_base` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblknowledge_base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblknowledge_base_groups`
--

DROP TABLE IF EXISTS `tblknowledge_base_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblknowledge_base_groups` (
  `groupid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `group_slug` text,
  `description` mediumtext,
  `active` tinyint NOT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `group_order` int DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblknowledge_base_groups`
--

LOCK TABLES `tblknowledge_base_groups` WRITE;
/*!40000 ALTER TABLE `tblknowledge_base_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblknowledge_base_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllead_activity_log`
--

DROP TABLE IF EXISTS `tbllead_activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbllead_activity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `leadid` int NOT NULL,
  `description` mediumtext NOT NULL,
  `additional_data` text,
  `date` datetime NOT NULL,
  `staffid` int NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `custom_activity` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllead_activity_log`
--

LOCK TABLES `tbllead_activity_log` WRITE;
/*!40000 ALTER TABLE `tbllead_activity_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbllead_activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllead_integration_emails`
--

DROP TABLE IF EXISTS `tbllead_integration_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbllead_integration_emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` mediumtext,
  `body` mediumtext,
  `dateadded` datetime NOT NULL,
  `leadid` int NOT NULL,
  `emailid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllead_integration_emails`
--

LOCK TABLES `tbllead_integration_emails` WRITE;
/*!40000 ALTER TABLE `tbllead_integration_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbllead_integration_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblleads`
--

DROP TABLE IF EXISTS `tblleads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblleads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hash` varchar(65) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `company` varchar(191) DEFAULT NULL,
  `description` text,
  `country` int NOT NULL DEFAULT '0',
  `zip` varchar(15) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `assigned` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  `from_form_id` int NOT NULL DEFAULT '0',
  `status` int NOT NULL,
  `source` int NOT NULL,
  `lastcontact` datetime DEFAULT NULL,
  `dateassigned` date DEFAULT NULL,
  `last_status_change` datetime DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `leadorder` int DEFAULT '1',
  `phonenumber` varchar(50) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `lost` tinyint(1) NOT NULL DEFAULT '0',
  `junk` int NOT NULL DEFAULT '0',
  `last_lead_status` int NOT NULL DEFAULT '0',
  `is_imported_from_email_integration` tinyint(1) NOT NULL DEFAULT '0',
  `email_integration_uid` varchar(30) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `default_language` varchar(40) DEFAULT NULL,
  `client_id` int NOT NULL DEFAULT '0',
  `lead_value` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `company` (`company`),
  KEY `email` (`email`),
  KEY `assigned` (`assigned`),
  KEY `status` (`status`),
  KEY `source` (`source`),
  KEY `lastcontact` (`lastcontact`),
  KEY `dateadded` (`dateadded`),
  KEY `leadorder` (`leadorder`),
  KEY `from_form_id` (`from_form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblleads`
--

LOCK TABLES `tblleads` WRITE;
/*!40000 ALTER TABLE `tblleads` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblleads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblleads_email_integration`
--

DROP TABLE IF EXISTS `tblleads_email_integration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblleads_email_integration` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'the ID always must be 1',
  `active` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `imap_server` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `check_every` int NOT NULL DEFAULT '5',
  `responsible` int NOT NULL,
  `lead_source` int NOT NULL,
  `lead_status` int NOT NULL,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(100) NOT NULL,
  `last_run` varchar(50) DEFAULT NULL,
  `notify_lead_imported` tinyint(1) NOT NULL DEFAULT '1',
  `notify_lead_contact_more_times` tinyint(1) NOT NULL DEFAULT '1',
  `notify_type` varchar(20) DEFAULT NULL,
  `notify_ids` mediumtext,
  `mark_public` int NOT NULL DEFAULT '0',
  `only_loop_on_unseen_emails` tinyint(1) NOT NULL DEFAULT '1',
  `delete_after_import` int NOT NULL DEFAULT '0',
  `create_task_if_customer` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblleads_email_integration`
--

LOCK TABLES `tblleads_email_integration` WRITE;
/*!40000 ALTER TABLE `tblleads_email_integration` DISABLE KEYS */;
INSERT INTO `tblleads_email_integration` VALUES (1,0,'','','',10,0,0,0,'tls','INBOX','',1,1,'assigned','',0,1,0,1);
/*!40000 ALTER TABLE `tblleads_email_integration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblleads_sources`
--

DROP TABLE IF EXISTS `tblleads_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblleads_sources` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblleads_sources`
--

LOCK TABLES `tblleads_sources` WRITE;
/*!40000 ALTER TABLE `tblleads_sources` DISABLE KEYS */;
INSERT INTO `tblleads_sources` VALUES (2,'Facebook'),(1,'Google');
/*!40000 ALTER TABLE `tblleads_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblleads_status`
--

DROP TABLE IF EXISTS `tblleads_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblleads_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `statusorder` int DEFAULT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `isdefault` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblleads_status`
--

LOCK TABLES `tblleads_status` WRITE;
/*!40000 ALTER TABLE `tblleads_status` DISABLE KEYS */;
INSERT INTO `tblleads_status` VALUES (1,'Customer',1000,'#7cb342',1);
/*!40000 ALTER TABLE `tblleads_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllistemails`
--

DROP TABLE IF EXISTS `tbllistemails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbllistemails` (
  `emailid` int NOT NULL AUTO_INCREMENT,
  `listid` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllistemails`
--

LOCK TABLES `tbllistemails` WRITE;
/*!40000 ALTER TABLE `tbllistemails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbllistemails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmail_queue`
--

DROP TABLE IF EXISTS `tblmail_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmail_queue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `engine` varchar(40) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `cc` text,
  `bcc` text,
  `message` mediumtext NOT NULL,
  `alt_message` mediumtext,
  `status` enum('pending','sending','sent','failed') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `headers` text,
  `attachments` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmail_queue`
--

LOCK TABLES `tblmail_queue` WRITE;
/*!40000 ALTER TABLE `tblmail_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmail_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmaillistscustomfields`
--

DROP TABLE IF EXISTS `tblmaillistscustomfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmaillistscustomfields` (
  `customfieldid` int NOT NULL AUTO_INCREMENT,
  `listid` int NOT NULL,
  `fieldname` varchar(150) NOT NULL,
  `fieldslug` varchar(100) NOT NULL,
  PRIMARY KEY (`customfieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmaillistscustomfields`
--

LOCK TABLES `tblmaillistscustomfields` WRITE;
/*!40000 ALTER TABLE `tblmaillistscustomfields` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmaillistscustomfields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmaillistscustomfieldvalues`
--

DROP TABLE IF EXISTS `tblmaillistscustomfieldvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmaillistscustomfieldvalues` (
  `customfieldvalueid` int NOT NULL AUTO_INCREMENT,
  `listid` int NOT NULL,
  `customfieldid` int NOT NULL,
  `emailid` int NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`customfieldvalueid`),
  KEY `listid` (`listid`),
  KEY `customfieldid` (`customfieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmaillistscustomfieldvalues`
--

LOCK TABLES `tblmaillistscustomfieldvalues` WRITE;
/*!40000 ALTER TABLE `tblmaillistscustomfieldvalues` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmaillistscustomfieldvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmanage_leave`
--

DROP TABLE IF EXISTS `tblmanage_leave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmanage_leave` (
  `leave_id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_staff` int NOT NULL,
  `leave_date` int DEFAULT NULL,
  `leave_year` int DEFAULT NULL,
  `accumulated_leave` int DEFAULT NULL,
  `seniority_leave` int DEFAULT NULL,
  `borrow_leave` int DEFAULT NULL,
  `actual_leave` int DEFAULT NULL,
  `expected_leave` int DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmanage_leave`
--

LOCK TABLES `tblmanage_leave` WRITE;
/*!40000 ALTER TABLE `tblmanage_leave` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmanage_leave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmigrations`
--

DROP TABLE IF EXISTS `tblmigrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmigrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmigrations`
--

LOCK TABLES `tblmigrations` WRITE;
/*!40000 ALTER TABLE `tblmigrations` DISABLE KEYS */;
INSERT INTO `tblmigrations` VALUES (304);
/*!40000 ALTER TABLE `tblmigrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmilestones`
--

DROP TABLE IF EXISTS `tblmilestones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmilestones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text,
  `description_visible_to_customer` tinyint(1) DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `due_date` date NOT NULL,
  `project_id` int NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `milestone_order` int NOT NULL DEFAULT '0',
  `datecreated` date NOT NULL,
  `hide_from_customer` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmilestones`
--

LOCK TABLES `tblmilestones` WRITE;
/*!40000 ALTER TABLE `tblmilestones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmilestones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmindmap`
--

DROP TABLE IF EXISTS `tblmindmap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmindmap` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `staffid` int DEFAULT '0',
  `mindmap_group_id` int DEFAULT '0',
  `mindmap_content` text,
  `dateadded` datetime DEFAULT NULL,
  `dateaupdated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staffid` (`staffid`),
  KEY `mindmap_group_id` (`mindmap_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmindmap`
--

LOCK TABLES `tblmindmap` WRITE;
/*!40000 ALTER TABLE `tblmindmap` DISABLE KEYS */;
INSERT INTO `tblmindmap` VALUES (1,'Sales','Sales process',0,0,'{\"nodeData\":{\"id\":\"root\",\"topic\":\"Sales process\",\"root\":true,\"children\":[{\"topic\":\"1. Initital contact\",\"id\":\"360d8067c3cc3810\",\"direction\":0,\"style\":{\"fontSize\":\"15\"},\"expanded\":true,\"children\":[{\"topic\":\"Cold call\",\"id\":\"360ef1e3318798a3\"},{\"topic\":\"Log call\",\"id\":\"360ef3dc879d78fe\"}]},{\"topic\":\"5.Negotiation\",\"id\":\"360d80a4bcea0675\",\"direction\":1,\"style\":{\"background\":\"#27ae61\",\"color\":\"#ecf0f1\"},\"expanded\":true,\"children\":[{\"topic\":\"Agreement\",\"id\":\"360f24a7e876629b\"},{\"topic\":\"Price\",\"id\":\"360f259fa25b8317\"},{\"topic\":\"Conditions\",\"id\":\"360f2648418e21b7\"}]},{\"topic\":\"2. BANT\",\"id\":\"360d80b74c078666\",\"direction\":0,\"style\":{\"background\":\"#c0392c\",\"color\":\"#ecf0f1\",\"fontSize\":\"15\"},\"expanded\":true,\"children\":[{\"topic\":\"Budget\",\"id\":\"360f0024dd662756\"},{\"topic\":\"Authority\",\"id\":\"360f013f626125b1\"},{\"topic\":\"Need\",\"id\":\"360f01cdacc46787\"},{\"topic\":\"Timeframe\",\"id\":\"360f0268b333cddb\"}]},{\"topic\":\"6.Deal\",\"id\":\"360d80c99c9c8578\",\"direction\":1,\"style\":{\"background\":\"#3298db\",\"color\":\"#ecf0f1\"},\"expanded\":true,\"children\":[{\"topic\":\"Price\",\"id\":\"360f2f94b7617209\",\"expanded\":true,\"children\":[{\"topic\":\"Deal\",\"id\":\"360f32575ead64f0\"},{\"topic\":\"No deal\",\"id\":\"360f35924cb070ea\"}]}]},{\"topic\":\"3. Investigation\",\"id\":\"360d80dc3965b973\",\"direction\":0,\"style\":{\"color\":\"#ecf0f1\",\"background\":\"#34495e\",\"fontSize\":\"15\"},\"expanded\":true,\"children\":[{\"topic\":\"Need\",\"id\":\"360f0b5fa80de3af\"}]},{\"topic\":\"4. Proposal\",\"id\":\"360d8109885c4059\",\"direction\":0,\"style\":{\"background\":\"#f39c11\",\"color\":\"#ecf0f1\",\"fontSize\":\"15\",\"fontWeight\":\"bold\"},\"expanded\":true,\"children\":[{\"topic\":\"Offer\",\"id\":\"360f128176e23b5b\"},{\"topic\":\"Budget\",\"id\":\"360f12f6243ed6d5\"},{\"topic\":\"Timeframe\",\"id\":\"360f136731ae8f86\"}]}],\"expanded\":true},\"linkData\":{}}','2023-05-31 17:13:54',NULL);
/*!40000 ALTER TABLE `tblmindmap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmindmap_groups`
--

DROP TABLE IF EXISTS `tblmindmap_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmindmap_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmindmap_groups`
--

LOCK TABLES `tblmindmap_groups` WRITE;
/*!40000 ALTER TABLE `tblmindmap_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmindmap_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmodules`
--

DROP TABLE IF EXISTS `tblmodules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmodules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module_name` varchar(55) NOT NULL,
  `installed_version` varchar(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmodules`
--

LOCK TABLES `tblmodules` WRITE;
/*!40000 ALTER TABLE `tblmodules` DISABLE KEYS */;
INSERT INTO `tblmodules` VALUES (1,'pi','2.3.0',1),(2,'menu_setup','2.3.0',1),(3,'goals','2.3.0',1),(4,'exports','1.0.0',1),(5,'backup','2.3.0',1),(6,'surveys','2.3.0',1),(7,'theme_style','2.3.0',1),(8,'mindmap','1.0.3',1),(9,'file_sharing','1.0.6',1),(10,'hrm','2.3.0',1);
/*!40000 ALTER TABLE `tblmodules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnewsfeed_comment_likes`
--

DROP TABLE IF EXISTS `tblnewsfeed_comment_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblnewsfeed_comment_likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postid` int NOT NULL,
  `commentid` int NOT NULL,
  `userid` int NOT NULL,
  `dateliked` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnewsfeed_comment_likes`
--

LOCK TABLES `tblnewsfeed_comment_likes` WRITE;
/*!40000 ALTER TABLE `tblnewsfeed_comment_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblnewsfeed_comment_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnewsfeed_post_comments`
--

DROP TABLE IF EXISTS `tblnewsfeed_post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblnewsfeed_post_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text,
  `userid` int NOT NULL,
  `postid` int NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnewsfeed_post_comments`
--

LOCK TABLES `tblnewsfeed_post_comments` WRITE;
/*!40000 ALTER TABLE `tblnewsfeed_post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblnewsfeed_post_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnewsfeed_post_likes`
--

DROP TABLE IF EXISTS `tblnewsfeed_post_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblnewsfeed_post_likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postid` int NOT NULL,
  `userid` int NOT NULL,
  `dateliked` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnewsfeed_post_likes`
--

LOCK TABLES `tblnewsfeed_post_likes` WRITE;
/*!40000 ALTER TABLE `tblnewsfeed_post_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblnewsfeed_post_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnewsfeed_posts`
--

DROP TABLE IF EXISTS `tblnewsfeed_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblnewsfeed_posts` (
  `postid` int NOT NULL AUTO_INCREMENT,
  `creator` int NOT NULL,
  `datecreated` datetime NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `pinned` int NOT NULL,
  `datepinned` datetime DEFAULT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnewsfeed_posts`
--

LOCK TABLES `tblnewsfeed_posts` WRITE;
/*!40000 ALTER TABLE `tblnewsfeed_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblnewsfeed_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnotes`
--

DROP TABLE IF EXISTS `tblnotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblnotes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `description` text,
  `date_contacted` datetime DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnotes`
--

LOCK TABLES `tblnotes` WRITE;
/*!40000 ALTER TABLE `tblnotes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblnotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnotifications`
--

DROP TABLE IF EXISTS `tblnotifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblnotifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isread` int NOT NULL DEFAULT '0',
  `isread_inline` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `fromuserid` int NOT NULL,
  `fromclientid` int NOT NULL DEFAULT '0',
  `from_fullname` varchar(100) NOT NULL,
  `touserid` int NOT NULL,
  `fromcompany` int DEFAULT NULL,
  `link` mediumtext,
  `additional_data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnotifications`
--

LOCK TABLES `tblnotifications` WRITE;
/*!40000 ALTER TABLE `tblnotifications` DISABLE KEYS */;
INSERT INTO `tblnotifications` VALUES (1,1,1,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',1,NULL,'clients/client/1?group=attachments',NULL),(2,0,0,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',7,NULL,'clients/client/1?group=attachments',NULL),(3,0,0,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',8,NULL,'clients/client/1?group=attachments',NULL),(4,0,0,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',11,NULL,'clients/client/1?group=attachments',NULL),(5,0,0,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',21,NULL,'clients/client/1?group=attachments',NULL),(6,0,0,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',22,NULL,'clients/client/1?group=attachments',NULL),(7,0,0,'2023-07-05 08:37:45','not_customer_uploaded_file',0,1,'Bryan Useche',37,NULL,'clients/client/1?group=attachments',NULL);
/*!40000 ALTER TABLE `tblnotifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbloptions`
--

DROP TABLE IF EXISTS `tbloptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbloptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `value` longtext NOT NULL,
  `autoload` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbloptions`
--

LOCK TABLES `tbloptions` WRITE;
/*!40000 ALTER TABLE `tbloptions` DISABLE KEYS */;
INSERT INTO `tbloptions` VALUES (1,'dateformat','Y-m-d|%Y-%m-%d',1),(2,'companyname','',1),(3,'services','1',1),(4,'maximum_allowed_ticket_attachments','4',1),(5,'ticket_attachments_file_extensions','.jpg,.png,.pdf,.doc,.zip,.rar',1),(6,'staff_access_only_assigned_departments','1',1),(7,'use_knowledge_base','1',1),(8,'smtp_email','',1),(9,'smtp_password','',1),(10,'company_info_format','{company_name}<br />\r\n{address}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{vat_number_with_label}',0),(11,'smtp_port','',1),(12,'smtp_host','',1),(13,'smtp_email_charset','utf-8',1),(14,'default_timezone','America/Caracas',1),(15,'clients_default_theme','perfex',1),(16,'company_logo','',1),(17,'tables_pagination_limit','25',1),(18,'main_domain','',1),(19,'allow_registration','0',1),(20,'knowledge_base_without_registration','1',1),(21,'email_signature','',1),(22,'default_staff_role','1',1),(23,'newsfeed_maximum_files_upload','10',1),(24,'contract_expiration_before','4',1),(25,'invoice_prefix','INV-',1),(26,'decimal_separator','.',1),(27,'thousand_separator',',',1),(28,'invoice_company_name','',1),(29,'invoice_company_address','',1),(30,'invoice_company_city','',1),(31,'invoice_company_country_code','',1),(32,'invoice_company_postal_code','',1),(33,'invoice_company_phonenumber','',1),(34,'view_invoice_only_logged_in','0',1),(35,'invoice_number_format','1',1),(36,'next_invoice_number','1',0),(37,'active_language','spanish',1),(38,'invoice_number_decrement_on_delete','1',1),(39,'automatically_send_invoice_overdue_reminder_after','1',1),(40,'automatically_resend_invoice_overdue_reminder_after','3',1),(41,'expenses_auto_operations_hour','21',1),(42,'delete_only_on_last_invoice','1',1),(43,'delete_only_on_last_estimate','1',1),(44,'create_invoice_from_recurring_only_on_paid_invoices','0',1),(45,'allow_payment_amount_to_be_modified','1',1),(46,'rtl_support_client','0',1),(47,'limit_top_search_bar_results_to','10',1),(48,'estimate_prefix','EST-',1),(49,'next_estimate_number','1',0),(50,'estimate_number_decrement_on_delete','1',1),(51,'estimate_number_format','1',1),(52,'estimate_auto_convert_to_invoice_on_client_accept','1',1),(53,'exclude_estimate_from_client_area_with_draft_status','1',1),(54,'rtl_support_admin','0',1),(55,'last_cron_run','',1),(56,'show_sale_agent_on_estimates','1',1),(57,'show_sale_agent_on_invoices','1',1),(58,'predefined_terms_invoice','',1),(59,'predefined_terms_estimate','',1),(60,'default_task_priority','2',1),(61,'dropbox_app_key','',1),(62,'show_expense_reminders_on_calendar','1',1),(63,'only_show_contact_tickets','1',1),(64,'predefined_clientnote_invoice','',1),(65,'predefined_clientnote_estimate','',1),(66,'custom_pdf_logo_image_url','',1),(67,'favicon','',1),(68,'invoice_due_after','30',1),(69,'google_api_key','',1),(70,'google_calendar_main_calendar','',1),(71,'default_tax','a:0:{}',1),(72,'show_invoices_on_calendar','1',1),(73,'show_estimates_on_calendar','1',1),(74,'show_contracts_on_calendar','1',1),(75,'show_tasks_on_calendar','1',1),(76,'show_customer_reminders_on_calendar','1',1),(77,'output_client_pdfs_from_admin_area_in_client_language','0',1),(78,'show_lead_reminders_on_calendar','1',1),(79,'send_estimate_expiry_reminder_before','4',1),(80,'leads_default_source','',1),(81,'leads_default_status','',1),(82,'proposal_expiry_reminder_enabled','1',1),(83,'send_proposal_expiry_reminder_before','4',1),(84,'default_contact_permissions','a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}',1),(85,'pdf_logo_width','150',1),(86,'access_tickets_to_none_staff_members','0',1),(87,'customer_default_country','',1),(88,'view_estimate_only_logged_in','0',1),(89,'show_status_on_pdf_ei','1',1),(90,'email_piping_only_replies','0',1),(91,'email_piping_only_registered','0',1),(92,'default_view_calendar','dayGridMonth',1),(93,'email_piping_default_priority','2',1),(94,'total_to_words_lowercase','0',1),(95,'show_tax_per_item','1',1),(96,'total_to_words_enabled','0',1),(97,'receive_notification_on_new_ticket','1',0),(98,'autoclose_tickets_after','0',1),(99,'media_max_file_size_upload','10',1),(100,'client_staff_add_edit_delete_task_comments_first_hour','0',1),(101,'show_projects_on_calendar','1',1),(102,'leads_kanban_limit','50',1),(103,'tasks_reminder_notification_before','2',1),(104,'pdf_font','freesans',1),(105,'pdf_table_heading_color','#323a45',1),(106,'pdf_table_heading_text_color','#ffffff',1),(107,'pdf_font_size','10',1),(108,'default_leads_kanban_sort','leadorder',1),(109,'default_leads_kanban_sort_type','asc',1),(110,'allowed_files','.png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt',1),(111,'show_all_tasks_for_project_member','1',1),(112,'email_protocol','smtp',1),(113,'calendar_first_day','0',1),(114,'recaptcha_secret_key','',1),(115,'show_help_on_setup_menu','1',1),(116,'show_proposals_on_calendar','1',1),(117,'smtp_encryption','',1),(118,'recaptcha_site_key','',1),(119,'smtp_username','',1),(120,'auto_stop_tasks_timers_on_new_timer','1',1),(121,'notification_when_customer_pay_invoice','1',1),(122,'calendar_invoice_color','#FF6F00',1),(123,'calendar_estimate_color','#FF6F00',1),(124,'calendar_proposal_color','#84c529',1),(125,'new_task_auto_assign_current_member','1',1),(126,'calendar_reminder_color','#03A9F4',1),(127,'calendar_contract_color','#B72974',1),(128,'calendar_project_color','#B72974',1),(129,'update_info_message','',1),(130,'show_estimate_reminders_on_calendar','1',1),(131,'show_invoice_reminders_on_calendar','1',1),(132,'show_proposal_reminders_on_calendar','1',1),(133,'proposal_due_after','7',1),(134,'allow_customer_to_change_ticket_status','0',1),(135,'lead_lock_after_convert_to_customer','0',1),(136,'default_proposals_pipeline_sort','pipeline_order',1),(137,'default_proposals_pipeline_sort_type','asc',1),(138,'default_estimates_pipeline_sort','pipeline_order',1),(139,'default_estimates_pipeline_sort_type','asc',1),(140,'use_recaptcha_customers_area','0',1),(141,'remove_decimals_on_zero','0',1),(142,'remove_tax_name_from_item_table','0',1),(143,'pdf_format_invoice','A4-PORTRAIT',1),(144,'pdf_format_estimate','A4-PORTRAIT',1),(145,'pdf_format_proposal','A4-PORTRAIT',1),(146,'pdf_format_payment','A4-PORTRAIT',1),(147,'pdf_format_contract','A4-PORTRAIT',1),(148,'swap_pdf_info','0',1),(149,'exclude_invoice_from_client_area_with_draft_status','1',1),(150,'cron_has_run_from_cli','0',1),(151,'hide_cron_is_required_message','0',0),(152,'auto_assign_customer_admin_after_lead_convert','1',1),(153,'show_transactions_on_invoice_pdf','1',1),(154,'show_pay_link_to_invoice_pdf','1',1),(155,'tasks_kanban_limit','50',1),(156,'purchase_key','',1),(157,'estimates_pipeline_limit','50',1),(158,'proposals_pipeline_limit','50',1),(159,'proposal_number_prefix','PRO-',1),(160,'number_padding_prefixes','6',1),(161,'show_page_number_on_pdf','0',1),(162,'calendar_events_limit','4',1),(163,'show_setup_menu_item_only_on_hover','0',1),(164,'company_requires_vat_number_field','1',1),(165,'company_is_required','1',1),(166,'allow_contact_to_delete_files','0',1),(167,'company_vat','',1),(168,'di','1684760896',1),(169,'invoice_auto_operations_hour','21',1),(170,'use_minified_files','1',1),(171,'only_own_files_contacts','0',1),(172,'allow_primary_contact_to_view_edit_billing_and_shipping','0',1),(173,'estimate_due_after','7',1),(174,'staff_members_open_tickets_to_all_contacts','1',1),(175,'time_format','24',1),(176,'delete_activity_log_older_then','1',1),(177,'disable_language','0',1),(178,'company_state','',1),(179,'email_header','<!doctype html>\r\n                            <html>\r\n                            <head>\r\n                              <meta name=\"viewport\" content=\"width=device-width\" />\r\n                              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n                              <style>\r\n                                body {\r\n                                 background-color: #f6f6f6;\r\n                                 font-family: sans-serif;\r\n                                 -webkit-font-smoothing: antialiased;\r\n                                 font-size: 14px;\r\n                                 line-height: 1.4;\r\n                                 margin: 0;\r\n                                 padding: 0;\r\n                                 -ms-text-size-adjust: 100%;\r\n                                 -webkit-text-size-adjust: 100%;\r\n                               }\r\n                               table {\r\n                                 border-collapse: separate;\r\n                                 mso-table-lspace: 0pt;\r\n                                 mso-table-rspace: 0pt;\r\n                                 width: 100%;\r\n                               }\r\n                               table td {\r\n                                 font-family: sans-serif;\r\n                                 font-size: 14px;\r\n                                 vertical-align: top;\r\n                               }\r\n                                   /* -------------------------------------\r\n                                     BODY & CONTAINER\r\n                                     ------------------------------------- */\r\n                                     .body {\r\n                                       background-color: #f6f6f6;\r\n                                       width: 100%;\r\n                                     }\r\n                                     /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\r\n\r\n                                     .container {\r\n                                       display: block;\r\n                                       margin: 0 auto !important;\r\n                                       /* makes it centered */\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                       width: 680px;\r\n                                     }\r\n                                     /* This should also be a block element, so that it will fill 100% of the .container */\r\n\r\n                                     .content {\r\n                                       box-sizing: border-box;\r\n                                       display: block;\r\n                                       margin: 0 auto;\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     HEADER, FOOTER, MAIN\r\n                                     ------------------------------------- */\r\n\r\n                                     .main {\r\n                                       background: #fff;\r\n                                       border-radius: 3px;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .wrapper {\r\n                                       box-sizing: border-box;\r\n                                       padding: 20px;\r\n                                     }\r\n                                     .footer {\r\n                                       clear: both;\r\n                                       padding-top: 10px;\r\n                                       text-align: center;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .footer td,\r\n                                     .footer p,\r\n                                     .footer span,\r\n                                     .footer a {\r\n                                       color: #999999;\r\n                                       font-size: 12px;\r\n                                       text-align: center;\r\n                                     }\r\n                                     hr {\r\n                                       border: 0;\r\n                                       border-bottom: 1px solid #f6f6f6;\r\n                                       margin: 20px 0;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     RESPONSIVE AND MOBILE FRIENDLY STYLES\r\n                                     ------------------------------------- */\r\n\r\n                                     @media only screen and (max-width: 620px) {\r\n                                       table[class=body] .content {\r\n                                         padding: 0 !important;\r\n                                       }\r\n                                       table[class=body] .container {\r\n                                         padding: 0 !important;\r\n                                         width: 100% !important;\r\n                                       }\r\n                                       table[class=body] .main {\r\n                                         border-left-width: 0 !important;\r\n                                         border-radius: 0 !important;\r\n                                         border-right-width: 0 !important;\r\n                                       }\r\n                                     }\r\n                                   </style>\r\n                                 </head>\r\n                                 <body class=\"\">\r\n                                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\">\r\n                                    <tr>\r\n                                     <td>&nbsp;</td>\r\n                                     <td class=\"container\">\r\n                                      <div class=\"content\">\r\n                                        <!-- START CENTERED WHITE CONTAINER -->\r\n                                        <table class=\"main\">\r\n                                          <!-- START MAIN CONTENT AREA -->\r\n                                          <tr>\r\n                                           <td class=\"wrapper\">\r\n                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                              <tr>\r\n                                               <td>',1),(180,'show_pdf_signature_invoice','1',0),(181,'show_pdf_signature_estimate','1',0),(182,'signature_image','',0),(183,'email_footer','</td>\r\n                             </tr>\r\n                           </table>\r\n                         </td>\r\n                       </tr>\r\n                       <!-- END MAIN CONTENT AREA -->\r\n                     </table>\r\n                     <!-- START FOOTER -->\r\n                     <div class=\"footer\">\r\n                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                          <td class=\"content-block\">\r\n                            <span>{companyname}</span>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </div>\r\n                    <!-- END FOOTER -->\r\n                    <!-- END CENTERED WHITE CONTAINER -->\r\n                  </div>\r\n                </td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            </body>\r\n            </html>',1),(184,'exclude_proposal_from_client_area_with_draft_status','1',1),(185,'pusher_app_key','',1),(186,'pusher_app_secret','',1),(187,'pusher_app_id','',1),(188,'pusher_realtime_notifications','0',1),(189,'pdf_format_statement','A4-PORTRAIT',1),(190,'pusher_cluster','',1),(191,'show_table_export_button','to_all',1),(192,'allow_staff_view_proposals_assigned','1',1),(193,'show_cloudflare_notice','1',0),(194,'task_modal_class','modal-lg',1),(195,'lead_modal_class','modal-lg',1),(196,'show_timesheets_overview_all_members_notice_admins','0',1),(197,'desktop_notifications','0',1),(198,'hide_notified_reminders_from_calendar','1',0),(199,'customer_info_format','{company_name}<br />\r\n{street}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{vat_number_with_label}',0),(200,'timer_started_change_status_in_progress','1',0),(201,'default_ticket_reply_status','3',1),(202,'default_task_status','auto',1),(203,'email_queue_skip_with_attachments','1',1),(204,'email_queue_enabled','0',1),(205,'last_email_queue_retry','',1),(206,'auto_dismiss_desktop_notifications_after','0',1),(207,'proposal_info_format','{proposal_to}<br />\r\n{address}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{phone}<br />\r\n{email}',0),(208,'ticket_replies_order','asc',1),(209,'new_recurring_invoice_action','generate_and_send',0),(210,'bcc_emails','',0),(211,'email_templates_language_checks','',0),(212,'proposal_accept_identity_confirmation','1',0),(213,'estimate_accept_identity_confirmation','1',0),(214,'new_task_auto_follower_current_member','0',1),(215,'task_biillable_checked_on_creation','1',1),(216,'predefined_clientnote_credit_note','',1),(217,'predefined_terms_credit_note','',1),(218,'next_credit_note_number','1',1),(219,'credit_note_prefix','CN-',1),(220,'credit_note_number_decrement_on_delete','1',1),(221,'pdf_format_credit_note','A4-PORTRAIT',1),(222,'show_pdf_signature_credit_note','1',0),(223,'show_credit_note_reminders_on_calendar','1',1),(224,'show_amount_due_on_invoice','1',1),(225,'show_total_paid_on_invoice','1',1),(226,'show_credits_applied_on_invoice','1',1),(227,'staff_members_create_inline_lead_status','1',1),(228,'staff_members_create_inline_customer_groups','1',1),(229,'staff_members_create_inline_ticket_services','1',1),(230,'staff_members_save_tickets_predefined_replies','1',1),(231,'staff_members_create_inline_contract_types','1',1),(232,'staff_members_create_inline_expense_categories','1',1),(233,'show_project_on_credit_note','1',1),(234,'proposals_auto_operations_hour','21',1),(235,'estimates_auto_operations_hour','21',1),(236,'contracts_auto_operations_hour','21',1),(237,'credit_note_number_format','1',1),(238,'allow_non_admin_members_to_import_leads','0',1),(239,'e_sign_legal_text','By clicking on \"Sign\", I consent to be legally bound by this electronic representation of my signature.',1),(240,'show_pdf_signature_contract','1',1),(241,'view_contract_only_logged_in','0',1),(242,'show_subscriptions_in_customers_area','1',1),(243,'calendar_only_assigned_tasks','0',1),(244,'after_subscription_payment_captured','send_invoice_and_receipt',1),(245,'mail_engine','phpmailer',1),(246,'gdpr_enable_terms_and_conditions','0',1),(247,'privacy_policy','',1),(248,'terms_and_conditions','',1),(249,'gdpr_enable_terms_and_conditions_lead_form','0',1),(250,'gdpr_enable_terms_and_conditions_ticket_form','0',1),(251,'gdpr_contact_enable_right_to_be_forgotten','0',1),(252,'show_gdpr_in_customers_menu','1',1),(253,'show_gdpr_link_in_footer','1',1),(254,'enable_gdpr','0',1),(255,'gdpr_on_forgotten_remove_invoices_credit_notes','0',1),(256,'gdpr_on_forgotten_remove_estimates','0',1),(257,'gdpr_enable_consent_for_contacts','0',1),(258,'gdpr_consent_public_page_top_block','',1),(259,'gdpr_page_top_information_block','',1),(260,'gdpr_enable_lead_public_form','0',1),(261,'gdpr_show_lead_custom_fields_on_public_form','0',1),(262,'gdpr_lead_attachments_on_public_form','0',1),(263,'gdpr_enable_consent_for_leads','0',1),(264,'gdpr_lead_enable_right_to_be_forgotten','0',1),(265,'allow_staff_view_invoices_assigned','1',1),(266,'gdpr_data_portability_leads','0',1),(267,'gdpr_lead_data_portability_allowed','',1),(268,'gdpr_contact_data_portability_allowed','',1),(269,'gdpr_data_portability_contacts','0',1),(270,'allow_staff_view_estimates_assigned','1',1),(271,'gdpr_after_lead_converted_delete','0',1),(272,'gdpr_show_terms_and_conditions_in_footer','0',1),(273,'save_last_order_for_tables','0',1),(274,'company_logo_dark','',1),(275,'customers_register_require_confirmation','0',1),(276,'allow_non_admin_staff_to_delete_ticket_attachments','0',1),(277,'receive_notification_on_new_ticket_replies','1',0),(278,'google_client_id','',1),(279,'enable_google_picker','1',1),(280,'show_ticket_reminders_on_calendar','1',1),(281,'ticket_import_reply_only','0',1),(282,'visible_customer_profile_tabs','all',0),(283,'show_project_on_invoice','1',1),(284,'show_project_on_estimate','1',1),(285,'staff_members_create_inline_lead_source','1',1),(286,'lead_unique_validation','[\"email\"]',1),(287,'last_upgrade_copy_data','',1),(288,'custom_js_admin_scripts','',1),(289,'custom_js_customer_scripts','0',1),(290,'stripe_webhook_id','',1),(291,'stripe_webhook_signing_secret','',1),(292,'stripe_ideal_webhook_id','',1),(293,'stripe_ideal_webhook_signing_secret','',1),(294,'show_php_version_notice','1',0),(295,'recaptcha_ignore_ips','',1),(296,'show_task_reminders_on_calendar','1',1),(297,'customer_settings','true',1),(298,'tasks_reminder_notification_hour','21',1),(299,'allow_primary_contact_to_manage_other_contacts','0',1),(300,'items_table_amounts_exclude_currency_symbol','1',1),(301,'round_off_task_timer_option','0',1),(302,'round_off_task_timer_time','5',1),(303,'bitly_access_token','',1),(304,'enable_support_menu_badges','0',1),(305,'attach_invoice_to_payment_receipt_email','0',1),(306,'invoice_due_notice_before','2',1),(307,'invoice_due_notice_resend_after','0',1),(308,'_leads_settings','true',1),(309,'show_estimate_request_in_customers_area','0',1),(310,'gdpr_enable_terms_and_conditions_estimate_request_form','0',1),(311,'upgraded_from_version','',0),(312,'identification_key','13481422651684761006646b69ae8f967',1),(313,'automatically_stop_task_timer_after_hours','8',1),(314,'automatically_assign_ticket_to_first_staff_responding','0',1),(315,'reminder_for_completed_but_not_billed_tasks','0',1),(316,'staff_notify_completed_but_not_billed_tasks','',1),(317,'reminder_for_completed_but_not_billed_tasks_days','',1),(318,'tasks_reminder_notification_last_notified_day','',1),(319,'staff_related_ticket_notification_to_assignee_only','0',1),(320,'show_pdf_signature_proposal','1',1),(321,'enable_honeypot_spam_validation','0',1),(322,'sms_clickatell_api_key','',1),(323,'sms_clickatell_active','0',1),(324,'sms_clickatell_initialized','1',1),(325,'sms_msg91_sender_id','',1),(326,'sms_msg91_api_type','api',1),(327,'sms_msg91_auth_key','',1),(328,'sms_msg91_active','0',1),(329,'sms_msg91_initialized','1',1),(330,'sms_twilio_account_sid','',1),(331,'sms_twilio_auth_token','',1),(332,'sms_twilio_phone_number','',1),(333,'sms_twilio_sender_id','',1),(334,'sms_twilio_active','0',1),(335,'sms_twilio_initialized','1',1),(336,'aside_menu_active','{\"HRM\":{\"id\":\"HRM\",\"icon\":\"\",\"disabled\":\"true\",\"position\":\"5\",\"children\":{\"hrm_dashboard\":{\"disabled\":\"false\",\"id\":\"hrm_dashboard\",\"icon\":\"\",\"position\":\"5\"},\"hrm_staff\":{\"disabled\":\"false\",\"id\":\"hrm_staff\",\"icon\":\"\",\"position\":\"10\"},\"hrm_staff_contract\":{\"disabled\":\"false\",\"id\":\"hrm_staff_contract\",\"icon\":\"\",\"position\":\"15\"},\"hrm_insurrance\":{\"disabled\":\"false\",\"id\":\"hrm_insurrance\",\"icon\":\"\",\"position\":\"20\"},\"hrm_timekeeping\":{\"disabled\":\"false\",\"id\":\"hrm_timekeeping\",\"icon\":\"\",\"position\":\"25\"},\"hrm_payroll\":{\"disabled\":\"false\",\"id\":\"hrm_payroll\",\"icon\":\"\",\"position\":\"30\"},\"hrm_setting\":{\"disabled\":\"false\",\"id\":\"hrm_setting\",\"icon\":\"\",\"position\":\"35\"}}},\"dashboard\":{\"id\":\"dashboard\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"10\"},\"53\":{\"id\":\"53\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"15\",\"children\":{\"anexos-before\":{\"disabled\":\"false\",\"id\":\"anexos-before\",\"icon\":\"\",\"position\":\"5\"},\"anexos-after\":{\"disabled\":\"false\",\"id\":\"anexos-after\",\"icon\":\"\",\"position\":\"10\"},\"publicaciones-marcas\":{\"disabled\":\"false\",\"id\":\"publicaciones-marcas\",\"icon\":\"\",\"position\":\"15\"}}},\"54\":{\"id\":\"54\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"20\",\"children\":{\"patentes-prioridad\":{\"disabled\":\"false\",\"id\":\"patentes-prioridad\",\"icon\":\"\",\"position\":\"5\"}}},\"52\":{\"id\":\"52\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"25\",\"children\":{\"clases\":{\"disabled\":\"false\",\"id\":\"clases\",\"icon\":\"\",\"position\":\"5\"},\"tipos-eventos\":{\"disabled\":\"false\",\"id\":\"tipos-eventos\",\"icon\":\"\",\"position\":\"10\"},\"inventores\":{\"disabled\":\"false\",\"id\":\"inventores\",\"icon\":\"\",\"position\":\"15\"},\"patentes-prioridad\":{\"disabled\":\"false\",\"id\":\"patentes-prioridad\",\"icon\":\"\",\"position\":\"20\"},\"publicaciones\":{\"disabled\":\"false\",\"id\":\"publicaciones\",\"icon\":\"\",\"position\":\"25\"},\"solicitantes\":{\"disabled\":\"false\",\"id\":\"solicitantes\",\"icon\":\"\",\"position\":\"30\"},\"materias\":{\"disabled\":\"false\",\"id\":\"materias\",\"icon\":\"\",\"position\":\"35\"},\"estados\":{\"disabled\":\"false\",\"id\":\"estados\",\"icon\":\"\",\"position\":\"40\"},\"boletines\":{\"disabled\":\"false\",\"id\":\"boletines\",\"icon\":\"\",\"position\":\"45\"},\"tipos-patentes\":{\"disabled\":\"false\",\"id\":\"tipos-patentes\",\"icon\":\"\",\"position\":\"50\"},\"tipos-publicaciones\":{\"disabled\":\"false\",\"id\":\"tipos-publicaciones\",\"icon\":\"\",\"position\":\"55\"}}},\"customers\":{\"id\":\"customers\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"30\"},\"FILE_SHARING\":{\"id\":\"FILE_SHARING\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"35\",\"children\":{\"file_sharing_management\":{\"disabled\":\"false\",\"id\":\"file_sharing_management\",\"icon\":\"\",\"position\":\"5\"},\"file_sharing_sharings\":{\"disabled\":\"false\",\"id\":\"file_sharing_sharings\",\"icon\":\"\",\"position\":\"10\"},\"file_sharing_download_management\":{\"disabled\":\"false\",\"id\":\"file_sharing_download_management\",\"icon\":\"\",\"position\":\"15\"},\"file_sharing_report\":{\"disabled\":\"false\",\"id\":\"file_sharing_report\",\"icon\":\"\",\"position\":\"20\"},\"file_sharing_setting\":{\"disabled\":\"false\",\"id\":\"file_sharing_setting\",\"icon\":\"\",\"position\":\"25\"}}},\"sales\":{\"id\":\"sales\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"40\",\"children\":{\"proposals\":{\"disabled\":\"false\",\"id\":\"proposals\",\"icon\":\"\",\"position\":\"5\"},\"estimates\":{\"disabled\":\"false\",\"id\":\"estimates\",\"icon\":\"\",\"position\":\"10\"},\"invoices\":{\"disabled\":\"false\",\"id\":\"invoices\",\"icon\":\"\",\"position\":\"15\"},\"payments\":{\"disabled\":\"false\",\"id\":\"payments\",\"icon\":\"\",\"position\":\"20\"},\"credit_notes\":{\"disabled\":\"false\",\"id\":\"credit_notes\",\"icon\":\"\",\"position\":\"25\"},\"items\":{\"disabled\":\"false\",\"id\":\"items\",\"icon\":\"\",\"position\":\"30\"}}},\"mindmap_menu\":{\"id\":\"mindmap_menu\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"45\"},\"subscriptions\":{\"id\":\"subscriptions\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"50\"},\"expenses\":{\"id\":\"expenses\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"55\"},\"contracts\":{\"id\":\"contracts\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"60\"},\"projects\":{\"id\":\"projects\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"65\"},\"tasks\":{\"id\":\"tasks\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"70\"},\"support\":{\"id\":\"support\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"75\"},\"leads\":{\"id\":\"leads\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"80\"},\"estimate_request\":{\"id\":\"estimate_request\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"85\"},\"knowledge-base\":{\"id\":\"knowledge-base\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"90\"},\"utilities\":{\"id\":\"utilities\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"95\",\"children\":{\"media\":{\"disabled\":\"false\",\"id\":\"media\",\"icon\":\"\",\"position\":\"5\"},\"bulk-pdf-exporter\":{\"disabled\":\"false\",\"id\":\"bulk-pdf-exporter\",\"icon\":\"\",\"position\":\"10\"},\"csv-export\":{\"disabled\":\"false\",\"id\":\"csv-export\",\"icon\":\"\",\"position\":\"15\"},\"calendar\":{\"disabled\":\"false\",\"id\":\"calendar\",\"icon\":\"\",\"position\":\"20\"},\"announcements\":{\"disabled\":\"false\",\"id\":\"announcements\",\"icon\":\"\",\"position\":\"25\"},\"goals-tracking\":{\"disabled\":\"false\",\"id\":\"goals-tracking\",\"icon\":\"\",\"position\":\"30\"},\"activity-log\":{\"disabled\":\"false\",\"id\":\"activity-log\",\"icon\":\"\",\"position\":\"35\"},\"surveys\":{\"disabled\":\"false\",\"id\":\"surveys\",\"icon\":\"\",\"position\":\"40\"},\"utility_backup\":{\"disabled\":\"false\",\"id\":\"utility_backup\",\"icon\":\"\",\"position\":\"45\"},\"ticket-pipe-log\":{\"disabled\":\"false\",\"id\":\"ticket-pipe-log\",\"icon\":\"\",\"position\":\"50\"}}},\"reports\":{\"id\":\"reports\",\"icon\":\"\",\"disabled\":\"false\",\"position\":\"100\",\"children\":{\"sales-reports\":{\"disabled\":\"false\",\"id\":\"sales-reports\",\"icon\":\"\",\"position\":\"5\"},\"expenses-reports\":{\"disabled\":\"false\",\"id\":\"expenses-reports\",\"icon\":\"\",\"position\":\"10\"},\"expenses-vs-income-reports\":{\"disabled\":\"false\",\"id\":\"expenses-vs-income-reports\",\"icon\":\"\",\"position\":\"15\"},\"leads-reports\":{\"disabled\":\"false\",\"id\":\"leads-reports\",\"icon\":\"\",\"position\":\"20\"},\"timesheets-reports\":{\"disabled\":\"false\",\"id\":\"timesheets-reports\",\"icon\":\"\",\"position\":\"25\"},\"knowledge-base-reports\":{\"disabled\":\"false\",\"id\":\"knowledge-base-reports\",\"icon\":\"\",\"position\":\"30\"}}}}',1),(337,'setup_menu_active','[]',1),(338,'auto_backup_enabled','0',1),(339,'auto_backup_every','7',1),(340,'last_auto_backup','',1),(341,'delete_backups_older_then','0',1),(342,'auto_backup_hour','6',1),(343,'survey_send_emails_per_cron_run','100',1),(344,'last_survey_send_cron','',1),(345,'theme_style','[]',1),(346,'theme_style_custom_admin_area','',1),(347,'theme_style_custom_clients_area','',1),(348,'theme_style_custom_clients_and_admin_area','',1),(349,'paymentmethod_authorize_acceptjs_active','0',1),(350,'paymentmethod_authorize_acceptjs_label','Authorize.net Accept.js',1),(351,'paymentmethod_authorize_acceptjs_public_key','',0),(352,'paymentmethod_authorize_acceptjs_api_login_id','',0),(353,'paymentmethod_authorize_acceptjs_api_transaction_key','',0),(354,'paymentmethod_authorize_acceptjs_description_dashboard','Payment for Invoice {invoice_number}',0),(355,'paymentmethod_authorize_acceptjs_currencies','USD',0),(356,'paymentmethod_authorize_acceptjs_test_mode_enabled','0',0),(357,'paymentmethod_authorize_acceptjs_default_selected','1',1),(358,'paymentmethod_authorize_acceptjs_initialized','1',1),(359,'paymentmethod_instamojo_active','0',1),(360,'paymentmethod_instamojo_label','Instamojo',1),(361,'paymentmethod_instamojo_api_key','',0),(362,'paymentmethod_instamojo_auth_token','',0),(363,'paymentmethod_instamojo_description_dashboard','Payment for Invoice {invoice_number}',0),(364,'paymentmethod_instamojo_currencies','INR',0),(365,'paymentmethod_instamojo_test_mode_enabled','1',0),(366,'paymentmethod_instamojo_default_selected','1',1),(367,'paymentmethod_instamojo_initialized','1',1),(368,'paymentmethod_mollie_active','0',1),(369,'paymentmethod_mollie_label','Mollie',1),(370,'paymentmethod_mollie_api_key','',0),(371,'paymentmethod_mollie_description_dashboard','Payment for Invoice {invoice_number}',0),(372,'paymentmethod_mollie_currencies','EUR',0),(373,'paymentmethod_mollie_test_mode_enabled','1',0),(374,'paymentmethod_mollie_default_selected','1',1),(375,'paymentmethod_mollie_initialized','1',1),(376,'paymentmethod_paypal_braintree_active','0',1),(377,'paymentmethod_paypal_braintree_label','Braintree',1),(378,'paymentmethod_paypal_braintree_merchant_id','',0),(379,'paymentmethod_paypal_braintree_api_public_key','',0),(380,'paymentmethod_paypal_braintree_api_private_key','',0),(381,'paymentmethod_paypal_braintree_currencies','USD',0),(382,'paymentmethod_paypal_braintree_paypal_enabled','1',0),(383,'paymentmethod_paypal_braintree_test_mode_enabled','1',0),(384,'paymentmethod_paypal_braintree_default_selected','1',1),(385,'paymentmethod_paypal_braintree_initialized','1',1),(386,'paymentmethod_paypal_checkout_active','0',1),(387,'paymentmethod_paypal_checkout_label','Paypal Smart Checkout',1),(388,'paymentmethod_paypal_checkout_client_id','',0),(389,'paymentmethod_paypal_checkout_secret','',0),(390,'paymentmethod_paypal_checkout_payment_description','Payment for Invoice {invoice_number}',0),(391,'paymentmethod_paypal_checkout_currencies','USD,CAD,EUR',0),(392,'paymentmethod_paypal_checkout_test_mode_enabled','1',0),(393,'paymentmethod_paypal_checkout_default_selected','1',1),(394,'paymentmethod_paypal_checkout_initialized','1',1),(395,'paymentmethod_paypal_active','0',1),(396,'paymentmethod_paypal_label','Paypal',1),(397,'paymentmethod_paypal_username','',0),(398,'paymentmethod_paypal_password','',0),(399,'paymentmethod_paypal_signature','',0),(400,'paymentmethod_paypal_description_dashboard','Payment for Invoice {invoice_number}',0),(401,'paymentmethod_paypal_currencies','EUR,USD',0),(402,'paymentmethod_paypal_test_mode_enabled','1',0),(403,'paymentmethod_paypal_default_selected','1',1),(404,'paymentmethod_paypal_initialized','1',1),(405,'paymentmethod_payu_money_active','0',1),(406,'paymentmethod_payu_money_label','PayU Money',1),(407,'paymentmethod_payu_money_key','',0),(408,'paymentmethod_payu_money_salt','',0),(409,'paymentmethod_payu_money_description_dashboard','Payment for Invoice {invoice_number}',0),(410,'paymentmethod_payu_money_currencies','INR',0),(411,'paymentmethod_payu_money_test_mode_enabled','1',0),(412,'paymentmethod_payu_money_default_selected','1',1),(413,'paymentmethod_payu_money_initialized','1',1),(414,'paymentmethod_stripe_active','0',1),(415,'paymentmethod_stripe_label','Stripe Checkout',1),(416,'paymentmethod_stripe_api_publishable_key','',0),(417,'paymentmethod_stripe_api_secret_key','',0),(418,'paymentmethod_stripe_description_dashboard','Payment for Invoice {invoice_number}',0),(419,'paymentmethod_stripe_currencies','USD,CAD',0),(420,'paymentmethod_stripe_allow_primary_contact_to_update_credit_card','1',0),(421,'paymentmethod_stripe_default_selected','1',1),(422,'paymentmethod_stripe_initialized','1',1),(423,'paymentmethod_stripe_ideal_active','0',1),(424,'paymentmethod_stripe_ideal_label','Stripe iDEAL',1),(425,'paymentmethod_stripe_ideal_api_secret_key','',0),(426,'paymentmethod_stripe_ideal_api_publishable_key','',0),(427,'paymentmethod_stripe_ideal_description_dashboard','Payment for Invoice {invoice_number}',0),(428,'paymentmethod_stripe_ideal_statement_descriptor','Payment for Invoice {invoice_number}',0),(429,'paymentmethod_stripe_ideal_currencies','EUR',0),(430,'paymentmethod_stripe_ideal_default_selected','1',1),(431,'paymentmethod_stripe_ideal_initialized','1',1),(432,'paymentmethod_two_checkout_active','0',1),(433,'paymentmethod_two_checkout_label','2Checkout',1),(434,'paymentmethod_two_checkout_merchant_code','',0),(435,'paymentmethod_two_checkout_secret_key','',0),(436,'paymentmethod_two_checkout_description','Payment for Invoice {invoice_number}',0),(437,'paymentmethod_two_checkout_currencies','USD, EUR, GBP',0),(438,'paymentmethod_two_checkout_test_mode_enabled','1',0),(439,'paymentmethod_two_checkout_default_selected','1',1),(440,'paymentmethod_two_checkout_initialized','1',1),(441,'staff_members_create_inline_mindmap_group','1',1),(442,'fs_global_max_size','2',1),(443,'fs_global_extension','.jpg,.png,.pdf,.doc,.zip,.rar',1),(444,'fs_global_amount_expiration','3',1),(445,'fs_global_notification','1',1),(446,'fs_global_email','0',1),(447,'fs_client_visible','0',1),(448,'fs_permisstion_staff_view','1',1),(449,'fs_permisstion_staff_upload_and_override','1',1),(450,'fs_permisstion_staff_delete','1',1),(451,'fs_permisstion_staff_upload','1',1),(452,'fs_permisstion_staff_download','1',1),(453,'fs_permisstion_staff_share','1',1),(454,'fs_permisstion_client_view','1',1),(455,'fs_permisstion_client_upload_and_override','1',1),(456,'fs_permisstion_client_delete','1',1),(457,'fs_permisstion_client_upload','1',1),(458,'fs_permisstion_client_download','1',1),(459,'file_sharing_security','?3HTtb?HgTA@%7zm',1),(460,'fs_the_administrator_of_the_public_folder','',1);
/*!40000 ALTER TABLE `tbloptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpayment_modes`
--

DROP TABLE IF EXISTS `tblpayment_modes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpayment_modes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `show_on_pdf` int NOT NULL DEFAULT '0',
  `invoices_only` int NOT NULL DEFAULT '0',
  `expenses_only` int NOT NULL DEFAULT '0',
  `selected_by_default` int NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpayment_modes`
--

LOCK TABLES `tblpayment_modes` WRITE;
/*!40000 ALTER TABLE `tblpayment_modes` DISABLE KEYS */;
INSERT INTO `tblpayment_modes` VALUES (1,'Bank',NULL,0,0,0,1,1);
/*!40000 ALTER TABLE `tblpayment_modes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpayroll_table`
--

DROP TABLE IF EXISTS `tblpayroll_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpayroll_table` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payroll_month` date NOT NULL,
  `payroll_type` int unsigned DEFAULT NULL,
  `template_data` longtext,
  `status` int unsigned DEFAULT '0' COMMENT '1:đã chốt 0:chưa chốt',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpayroll_table`
--

LOCK TABLES `tblpayroll_table` WRITE;
/*!40000 ALTER TABLE `tblpayroll_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblpayroll_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpayroll_type`
--

DROP TABLE IF EXISTS `tblpayroll_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpayroll_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payroll_type_name` varchar(100) NOT NULL,
  `department_id` longtext,
  `role_id` longtext,
  `position_id` longtext,
  `salary_form_id` int unsigned DEFAULT NULL COMMENT '1:Chính 2:Phụ cấp',
  `manager_id` int unsigned DEFAULT NULL,
  `follower_id` int unsigned DEFAULT NULL,
  `template` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpayroll_type`
--

LOCK TABLES `tblpayroll_type` WRITE;
/*!40000 ALTER TABLE `tblpayroll_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblpayroll_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpinned_projects`
--

DROP TABLE IF EXISTS `tblpinned_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpinned_projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpinned_projects`
--

LOCK TABLES `tblpinned_projects` WRITE;
/*!40000 ALTER TABLE `tblpinned_projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblpinned_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproject_activity`
--

DROP TABLE IF EXISTS `tblproject_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproject_activity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `staff_id` int NOT NULL DEFAULT '0',
  `contact_id` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) DEFAULT NULL,
  `visible_to_customer` int NOT NULL DEFAULT '0',
  `description_key` varchar(191) NOT NULL COMMENT 'Language file key',
  `additional_data` text,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproject_activity`
--

LOCK TABLES `tblproject_activity` WRITE;
/*!40000 ALTER TABLE `tblproject_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproject_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproject_files`
--

DROP TABLE IF EXISTS `tblproject_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproject_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) NOT NULL,
  `original_file_name` mediumtext,
  `subject` varchar(191) DEFAULT NULL,
  `description` text,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `project_id` int NOT NULL,
  `visible_to_customer` tinyint(1) DEFAULT '0',
  `staffid` int NOT NULL,
  `contact_id` int NOT NULL DEFAULT '0',
  `external` varchar(40) DEFAULT NULL,
  `external_link` text,
  `thumbnail_link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproject_files`
--

LOCK TABLES `tblproject_files` WRITE;
/*!40000 ALTER TABLE `tblproject_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproject_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproject_members`
--

DROP TABLE IF EXISTS `tblproject_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproject_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproject_members`
--

LOCK TABLES `tblproject_members` WRITE;
/*!40000 ALTER TABLE `tblproject_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproject_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproject_notes`
--

DROP TABLE IF EXISTS `tblproject_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproject_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `content` text NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproject_notes`
--

LOCK TABLES `tblproject_notes` WRITE;
/*!40000 ALTER TABLE `tblproject_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproject_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproject_settings`
--

DROP TABLE IF EXISTS `tblproject_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproject_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproject_settings`
--

LOCK TABLES `tblproject_settings` WRITE;
/*!40000 ALTER TABLE `tblproject_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproject_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprojectdiscussioncomments`
--

DROP TABLE IF EXISTS `tblprojectdiscussioncomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprojectdiscussioncomments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `discussion_id` int NOT NULL,
  `discussion_type` varchar(10) NOT NULL,
  `parent` int DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `content` text NOT NULL,
  `staff_id` int NOT NULL,
  `contact_id` int DEFAULT '0',
  `fullname` varchar(191) DEFAULT NULL,
  `file_name` varchar(191) DEFAULT NULL,
  `file_mime_type` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprojectdiscussioncomments`
--

LOCK TABLES `tblprojectdiscussioncomments` WRITE;
/*!40000 ALTER TABLE `tblprojectdiscussioncomments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblprojectdiscussioncomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprojectdiscussions`
--

DROP TABLE IF EXISTS `tblprojectdiscussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprojectdiscussions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `show_to_customer` tinyint(1) NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `staff_id` int NOT NULL DEFAULT '0',
  `contact_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprojectdiscussions`
--

LOCK TABLES `tblprojectdiscussions` WRITE;
/*!40000 ALTER TABLE `tblprojectdiscussions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblprojectdiscussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprojects`
--

DROP TABLE IF EXISTS `tblprojects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprojects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text,
  `status` int NOT NULL DEFAULT '0',
  `clientid` int NOT NULL,
  `billing_type` int NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `project_created` date NOT NULL,
  `date_finished` datetime DEFAULT NULL,
  `progress` int DEFAULT '0',
  `progress_from_tasks` int NOT NULL DEFAULT '1',
  `project_cost` decimal(15,2) DEFAULT NULL,
  `project_rate_per_hour` decimal(15,2) DEFAULT NULL,
  `estimated_hours` decimal(15,2) DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `contact_notification` int DEFAULT '1',
  `notify_contacts` text,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprojects`
--

LOCK TABLES `tblprojects` WRITE;
/*!40000 ALTER TABLE `tblprojects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblprojects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproposal_comments`
--

DROP TABLE IF EXISTS `tblproposal_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproposal_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` mediumtext,
  `proposalid` int NOT NULL,
  `staffid` int NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproposal_comments`
--

LOCK TABLES `tblproposal_comments` WRITE;
/*!40000 ALTER TABLE `tblproposal_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproposal_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproposals`
--

DROP TABLE IF EXISTS `tblproposals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblproposals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) DEFAULT NULL,
  `content` longtext,
  `addedfrom` int NOT NULL,
  `datecreated` datetime NOT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `adjustment` decimal(15,2) DEFAULT NULL,
  `discount_percent` decimal(15,2) NOT NULL,
  `discount_total` decimal(15,2) NOT NULL,
  `discount_type` varchar(30) DEFAULT NULL,
  `show_quantity_as` int NOT NULL DEFAULT '1',
  `currency` int NOT NULL,
  `open_till` date DEFAULT NULL,
  `date` date NOT NULL,
  `rel_id` int DEFAULT NULL,
  `rel_type` varchar(40) DEFAULT NULL,
  `assigned` int DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `proposal_to` varchar(191) DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `country` int NOT NULL DEFAULT '0',
  `zip` varchar(50) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `status` int NOT NULL,
  `estimate_id` int DEFAULT NULL,
  `invoice_id` int DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `pipeline_order` int DEFAULT '1',
  `is_expiry_notified` int NOT NULL DEFAULT '0',
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproposals`
--

LOCK TABLES `tblproposals` WRITE;
/*!40000 ALTER TABLE `tblproposals` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproposals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprovince_city`
--

DROP TABLE IF EXISTS `tblprovince_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprovince_city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_code` varchar(45) NOT NULL,
  `province_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprovince_city`
--

LOCK TABLES `tblprovince_city` WRITE;
/*!40000 ALTER TABLE `tblprovince_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblprovince_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrelated_items`
--

DROP TABLE IF EXISTS `tblrelated_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrelated_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(30) NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrelated_items`
--

LOCK TABLES `tblrelated_items` WRITE;
/*!40000 ALTER TABLE `tblrelated_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrelated_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreminders`
--

DROP TABLE IF EXISTS `tblreminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblreminders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `date` datetime NOT NULL,
  `isnotified` int NOT NULL DEFAULT '0',
  `rel_id` int NOT NULL,
  `staff` int NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `notify_by_email` int NOT NULL DEFAULT '1',
  `creator` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `staff` (`staff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreminders`
--

LOCK TABLES `tblreminders` WRITE;
/*!40000 ALTER TABLE `tblreminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblreminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest`
--

DROP TABLE IF EXISTS `tblrequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `request_type_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `approval_deadline` datetime DEFAULT NULL,
  `addedfrom` int DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT '',
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest`
--

LOCK TABLES `tblrequest` WRITE;
/*!40000 ALTER TABLE `tblrequest` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_approval_details`
--

DROP TABLE IF EXISTS `tblrequest_approval_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_approval_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` int NOT NULL,
  `staffid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `approve` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `date` datetime DEFAULT NULL,
  `approve_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `approve_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `staff_approve` int DEFAULT '0',
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_approval_details`
--

LOCK TABLES `tblrequest_approval_details` WRITE;
/*!40000 ALTER TABLE `tblrequest_approval_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_approval_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_files`
--

DROP TABLE IF EXISTS `tblrequest_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` int NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `filetype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_files`
--

LOCK TABLES `tblrequest_files` WRITE;
/*!40000 ALTER TABLE `tblrequest_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_follow`
--

DROP TABLE IF EXISTS `tblrequest_follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_follow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `staffid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_follow`
--

LOCK TABLES `tblrequest_follow` WRITE;
/*!40000 ALTER TABLE `tblrequest_follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_form`
--

DROP TABLE IF EXISTS `tblrequest_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `slug` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_form`
--

LOCK TABLES `tblrequest_form` WRITE;
/*!40000 ALTER TABLE `tblrequest_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_log`
--

DROP TABLE IF EXISTS `tblrequest_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `staffid` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_log`
--

LOCK TABLES `tblrequest_log` WRITE;
/*!40000 ALTER TABLE `tblrequest_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_related`
--

DROP TABLE IF EXISTS `tblrequest_related`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_related` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` int NOT NULL,
  `rel_type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `rel_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_related`
--

LOCK TABLES `tblrequest_related` WRITE;
/*!40000 ALTER TABLE `tblrequest_related` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_related` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_type`
--

DROP TABLE IF EXISTS `tblrequest_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `maximum_number_day` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `data_chart` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `active` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  `related_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_type`
--

LOCK TABLES `tblrequest_type` WRITE;
/*!40000 ALTER TABLE `tblrequest_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_type_form`
--

DROP TABLE IF EXISTS `tblrequest_type_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_type_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_type_id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_type_form`
--

LOCK TABLES `tblrequest_type_form` WRITE;
/*!40000 ALTER TABLE `tblrequest_type_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_type_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequest_type_workflow`
--

DROP TABLE IF EXISTS `tblrequest_type_workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrequest_type_workflow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_type_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `staffid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `approve_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `approve_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reject_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequest_type_workflow`
--

LOCK TABLES `tblrequest_type_workflow` WRITE;
/*!40000 ALTER TABLE `tblrequest_type_workflow` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrequest_type_workflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblroles`
--

DROP TABLE IF EXISTS `tblroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblroles` (
  `roleid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `permissions` longtext,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblroles`
--

LOCK TABLES `tblroles` WRITE;
/*!40000 ALTER TABLE `tblroles` DISABLE KEYS */;
INSERT INTO `tblroles` VALUES (1,'Employee',NULL);
/*!40000 ALTER TABLE `tblroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsalary_form`
--

DROP TABLE IF EXISTS `tblsalary_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsalary_form` (
  `form_id` int unsigned NOT NULL AUTO_INCREMENT,
  `form_name` varchar(200) NOT NULL,
  `salary_val` decimal(15,2) NOT NULL,
  `tax` tinyint(1) NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsalary_form`
--

LOCK TABLES `tblsalary_form` WRITE;
/*!40000 ALTER TABLE `tblsalary_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsalary_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsales_activity`
--

DROP TABLE IF EXISTS `tblsales_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsales_activity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_type` varchar(20) DEFAULT NULL,
  `rel_id` int NOT NULL,
  `description` text NOT NULL,
  `additional_data` text,
  `staffid` varchar(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsales_activity`
--

LOCK TABLES `tblsales_activity` WRITE;
/*!40000 ALTER TABLE `tblsales_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsales_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblscheduled_emails`
--

DROP TABLE IF EXISTS `tblscheduled_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblscheduled_emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(15) NOT NULL,
  `scheduled_at` datetime NOT NULL,
  `contacts` varchar(197) NOT NULL,
  `cc` text,
  `attach_pdf` tinyint(1) NOT NULL DEFAULT '1',
  `template` varchar(197) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblscheduled_emails`
--

LOCK TABLES `tblscheduled_emails` WRITE;
/*!40000 ALTER TABLE `tblscheduled_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblscheduled_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblservices` (
  `serviceid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblservices`
--

LOCK TABLES `tblservices` WRITE;
/*!40000 ALTER TABLE `tblservices` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblservices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsessions`
--

DROP TABLE IF EXISTS `tblsessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsessions`
--

LOCK TABLES `tblsessions` WRITE;
/*!40000 ALTER TABLE `tblsessions` DISABLE KEYS */;
INSERT INTO `tblsessions` VALUES ('008nmt2hlf8fpfbqin19iq9grtg7cnfu','127.0.0.1',1687372243,_binary '__ci_last_regenerate|i:1687372243;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('043q5hlqtco3ha9v8nbqss2hstpnue0q','127.0.0.1',1688154630,_binary '__ci_last_regenerate|i:1688154630;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('068cg8dhaupfnv8hd1taau7dspqo4epa','127.0.0.1',1688155756,_binary '__ci_last_regenerate|i:1688155756;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('0875auds1u4730o0en775kdul2su0llc','127.0.0.1',1688654650,_binary '__ci_last_regenerate|i:1688654650;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('0aejhpjon9ip8dc1jjj306tli23enplj','127.0.0.1',1689090510,_binary '__ci_last_regenerate|i:1689090510;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0bus1o1n1qv0klji5aolvnoorr403od5','127.0.0.1',1688562830,_binary '__ci_last_regenerate|i:1688562830;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0fq4tsb68ttg2htv8hke1q1pllhhkuj3','127.0.0.1',1689082722,_binary '__ci_last_regenerate|i:1689082722;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0gm8u1sdih9sm35trtmi2q3o0mpdfpm1','127.0.0.1',1689089866,_binary '__ci_last_regenerate|i:1689089866;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0h2737s46kopi28arka3auj862dhk4d5','127.0.0.1',1688483866,_binary '__ci_last_regenerate|i:1688483866;red_url|s:58:\"http://crm.localhost/admin/pi/boletinescontroller/edit/305\";'),('0hu9k57h1je5capefbfbda2jo2akhmn2','127.0.0.1',1687206533,_binary '__ci_last_regenerate|i:1687206533;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('0jmellfrdnd4s74774cjpeldmjvrf01k','127.0.0.1',1688413254,_binary '__ci_last_regenerate|i:1688413254;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('0klnke8rtcdu8vpgmeqt1p8vqkmf9fqs','127.0.0.1',1688491847,_binary '__ci_last_regenerate|i:1688491847;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0o03786iupt2b5aejjuiu5va3ocbqejo','127.0.0.1',1688477408,_binary '__ci_last_regenerate|i:1688477408;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0qot8gbgq4rs4kjltiqouvv8avgtdcj7','127.0.0.1',1689091664,_binary '__ci_last_regenerate|i:1689091664;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('0s7h93i61tquh4gi3o0ugbupv82e8v3k','127.0.0.1',1687186989,_binary '__ci_last_regenerate|i:1687186989;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('11v3usu4i3apincfouah3h831u2lehvu','127.0.0.1',1689014318,_binary '__ci_last_regenerate|i:1689014318;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('12imf6bdsrrfdnv8nacshds7uu61b1mo','127.0.0.1',1688651436,_binary '__ci_last_regenerate|i:1688651436;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('1686l9kad36ki36hgpi9d42ktah177lb','127.0.0.1',1688145079,_binary '__ci_last_regenerate|i:1688145079;'),('17l2e4q13h1nlog7rlc8mg7t6l3dp4hj','127.0.0.1',1688998018,_binary '__ci_last_regenerate|i:1688998018;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('198n8vps5bgb1ehkcgg818ncpfu6oj3p','127.0.0.1',1688490829,_binary '__ci_last_regenerate|i:1688490829;'),('19n69gpnio49td0o4lmcflscbae25tcf','127.0.0.1',1687380373,_binary '__ci_last_regenerate|i:1687380373;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('1dpgmcr7uih0n3c18e8q7pa0s962vj0c','127.0.0.1',1688657237,_binary '__ci_last_regenerate|i:1688657237;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('1ime8gj0rdr4bo76qg23b2tp61p09ot7','127.0.0.1',1688154275,_binary '__ci_last_regenerate|i:1688154275;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('1nreur462bcpqgdlgdcd5ot09vrd6n70','127.0.0.1',1688654977,_binary '__ci_last_regenerate|i:1688654977;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('1vt5ker2qdfahne7s0b0mf72pulhi08d','127.0.0.1',1688670924,_binary '__ci_last_regenerate|i:1688670923;red_url|s:58:\"http://crm.localhost/admin/pi/tipossignoscontroller/edit/1\";'),('23cb31gp0v0401q8h62mab2mkd6h1994','127.0.0.1',1688148533,_binary '__ci_last_regenerate|i:1688148533;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('23kbt29g2uhu051ro4235ms6rj9831el','127.0.0.1',1687356260,_binary '__ci_last_regenerate|i:1687356260;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('268ds1pts1nbj9is4bhvpu68777ot2gf','127.0.0.1',1687183862,_binary '__ci_last_regenerate|i:1687183862;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('26rn1o26ec20o2efm7bsl369f0e5engk','127.0.0.1',1688565673,_binary '__ci_last_regenerate|i:1688565673;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('279lka9pqivq3l9p08l7uot6smhq4a5o','127.0.0.1',1688580695,_binary '__ci_last_regenerate|i:1688580695;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('27me0qkh8vm444vmlba19n95hscfo1b4','127.0.0.1',1688396337,_binary '__ci_last_regenerate|i:1688396337;red_url|s:40:\"http://crm.localhost/admin/reports/sales\";'),('29n6a2i95b48bubeme91lhuhr69h5ohs','127.0.0.1',1688494039,_binary '__ci_last_regenerate|i:1688494039;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('2cjln9gg0r4pdpvfnkr71takq8acmjbp','127.0.0.1',1688665671,_binary '__ci_last_regenerate|i:1688665671;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('2jnbv765p1p4oecmui6vniu8aifsd7um','127.0.0.1',1688412594,_binary '__ci_last_regenerate|i:1688412594;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('2l4cin2fi11n2vsk59kpn9b59h8kg3vg','127.0.0.1',1688490411,_binary '__ci_last_regenerate|i:1688490411;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('2nskb8bn4h1e8qdaaqa8q3iml31gtsp6','127.0.0.1',1688043891,_binary '__ci_last_regenerate|i:1688043891;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('2pbh1t6k1vem2ksm1tt0ei6ojrgba177','127.0.0.1',1688055116,_binary '__ci_last_regenerate|i:1688055116;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('2vdphv6uaesidbaasbm6ch3reqfp2l0t','127.0.0.1',1689019718,_binary '__ci_last_regenerate|i:1689019718;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('319jrcngnd97clm9dj2tr6pglo1acdq2','127.0.0.1',1687381303,_binary '__ci_last_regenerate|i:1687381134;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('31aub6ogp8atnu3t7joopg2fpl581a71','127.0.0.1',1687372528,_binary '__ci_last_regenerate|i:1687372527;'),('34cv7kv52the5lhmd2j4ncpmd0egvfhb','127.0.0.1',1687372981,_binary '__ci_last_regenerate|i:1687372981;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('34id5cd1ldhsejahuss0lt7bvnu7u5ra','127.0.0.1',1689016012,_binary '__ci_last_regenerate|i:1689016012;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('354irdfe17ui935jb65j86m9924gn2hc','127.0.0.1',1687199351,_binary '__ci_last_regenerate|i:1687199351;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('381sltcjpqsf663hjfdkdmv3euqgvg9c','127.0.0.1',1688156939,_binary '__ci_last_regenerate|i:1688156939;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('3aialpejotba1561eqdu2mfvv3ofj1s1','127.0.0.1',1688495080,_binary '__ci_last_regenerate|i:1688495080;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|b:1;'),('3bm1a0d69b7gtnf28pnrec8p939napmg','127.0.0.1',1689001778,_binary '__ci_last_regenerate|i:1689001778;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('3cfq0fdjhtmj61s4oqi06jlle0g9aafb','127.0.0.1',1688414245,_binary '__ci_last_regenerate|i:1688414245;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('3ga3vpkpv3hvjf4m3pa0gd67kgmn68dr','127.0.0.1',1688158385,_binary '__ci_last_regenerate|i:1688158339;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('3geaudgiv4u0lat246g7lh8un1egqp2m','127.0.0.1',1688158114,_binary '__ci_last_regenerate|i:1688158114;red_url|s:54:\"http://crm.localhost/admin/pi/estadoscontroller/edit/1\";'),('3hfka2mqa6326olo0fp137t5k9n3uf21','127.0.0.1',1688405023,_binary '__ci_last_regenerate|i:1688405023;red_url|s:53:\"http://crm.localhost/admin/pi/clasescontroller/create\";'),('3ndt5jj9685ght7mfoms7uiihvr4napk','127.0.0.1',1688670924,_binary '__ci_last_regenerate|i:1688670924;'),('3qtaltkm4qblgor4plqu9gucah8bk6sr','127.0.0.1',1688409794,_binary '__ci_last_regenerate|i:1688409794;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('3r0e5oae0a0tqfdf1oougaadplgo21mf','127.0.0.1',1688568002,_binary '__ci_last_regenerate|i:1688568002;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('3rrvsjef4of5inqs66j3rreq3avfinkh','127.0.0.1',1688419228,_binary '__ci_last_regenerate|i:1688419228;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('41c73cm53oitop20c7sgqcumv44qgfh7','127.0.0.1',1688585120,_binary '__ci_last_regenerate|i:1688585120;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('41e55bmftll7ccmqfehoh193rutdfapr','127.0.0.1',1687185294,_binary '__ci_last_regenerate|i:1687185294;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('42i6rmsatrmg7t01fvav25147a2r4l4u','127.0.0.1',1689010611,_binary '__ci_last_regenerate|i:1689010611;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('43j7qq3kjg2lqte2igsim9r9nbt1mkgq','127.0.0.1',1687199043,_binary '__ci_last_regenerate|i:1687199043;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('444s7oq1b810aaqu1me4uc9kvcjigprs','127.0.0.1',1687360752,_binary '__ci_last_regenerate|i:1687360752;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('47lrvih524hds27755pkpqn5v7dashjo','127.0.0.1',1687186406,_binary '__ci_last_regenerate|i:1687186406;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('47t1jo9r8s2bd2dpel4ortofdhf03mpb','127.0.0.1',1689010276,_binary '__ci_last_regenerate|i:1689010276;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('4e2lo32332mo7gqrogp7olhbgc9m8suf','127.0.0.1',1689084404,_binary '__ci_last_regenerate|i:1689084404;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('4ef37dkucr8qlroc7uavgil7cppth8me','127.0.0.1',1689253148,_binary '__ci_last_regenerate|i:1689253148;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('4fffbc1i5bagg0ga70ls5svhefb75mlh','127.0.0.1',1688397277,_binary '__ci_last_regenerate|i:1688397277;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('4fle6ls3lntn6pt89ahaliiob5tclldp','127.0.0.1',1687207243,_binary '__ci_last_regenerate|i:1687207243;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('4gbecv3m7l5ds7vup05aa1ri49l3qnc8','127.0.0.1',1688137678,_binary '__ci_last_regenerate|i:1688137678;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('4jp401iajgedrd77rs9phqvg9p93f1i1','127.0.0.1',1688476282,_binary '__ci_last_regenerate|i:1688476282;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('4l071mt97hrlhlr4dndveg4vetd66ks0','127.0.0.1',1687353749,_binary '__ci_last_regenerate|i:1687353749;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('4nqt9akb7ls1fsnn8mc248iorph77urb','127.0.0.1',1689080164,_binary '__ci_last_regenerate|i:1689080164;red_url|s:68:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create?s=1\";'),('4pqvgmhjj5nbdtuoj323o9ulqdmfvrc9','127.0.0.1',1688655386,_binary '__ci_last_regenerate|i:1688655386;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('4qs72f9bph736c5bef212mc368r9ome4','127.0.0.1',1688144978,_binary '__ci_last_regenerate|i:1688144978;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('4r1q4tbuje77mvjgeh89su7ia0qh4r1f','127.0.0.1',1688650974,_binary '__ci_last_regenerate|i:1688650974;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('4rdqi6pognuehi7bajbp5mtpgeh0tpjl','127.0.0.1',1688396337,_binary '__ci_last_regenerate|i:1688396337;'),('4s0a1dd9ppptv4n83cvm236sep7jbn69','127.0.0.1',1687199695,_binary '__ci_last_regenerate|i:1687199695;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('4v767pbsr8dcqvn06eghhd70g54krid1','127.0.0.1',1688411941,_binary '__ci_last_regenerate|i:1688411941;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('507b584jbvapigcmu0s5sidci9jn75nt','127.0.0.1',1688414634,_binary '__ci_last_regenerate|i:1688414634;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('53ri6f8n02trij1krbti5tocn7vphh7p','127.0.0.1',1688561654,_binary '__ci_last_regenerate|i:1688561654;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('54olkasg8c3u9u9cufpcn65qaka39ap5','127.0.0.1',1688072699,_binary '__ci_last_regenerate|i:1688072699;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('574rfvfj37l6ufqga5kl3ifio97v5lh2','127.0.0.1',1688145078,_binary '__ci_last_regenerate|i:1688145078;red_url|s:63:\"http://crm.localhost/admin/pi/patenteprioridadcontroller/create\";'),('59i8j687gckqpndmrlepj50ac73d1mp5','127.0.0.1',1688477044,_binary '__ci_last_regenerate|i:1688477044;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('5a2qbe1rk717qabbuqer659o370s2b9j','127.0.0.1',1689016635,_binary '__ci_last_regenerate|i:1689016635;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('5aaotaocaubm0fpn043rp7aojf9ea4uh','127.0.0.1',1687188959,_binary '__ci_last_regenerate|i:1687188959;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('5aqkb6lh3slqquiagd4rjk2iiongvr4s','127.0.0.1',1688151982,_binary '__ci_last_regenerate|i:1688151982;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('5ar4b8l83tt3pk8fi9pr95lgadq5k847','127.0.0.1',1688483849,_binary '__ci_last_regenerate|i:1688483849;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|b:1;'),('5botqcf7kalqv1ge629epo7jg4i2tesa','127.0.0.1',1688646200,_binary '__ci_last_regenerate|i:1688646200;red_url|s:64:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create\";'),('5dh201gafs593qbpibg1q2e8stv8j3j3','127.0.0.1',1688563514,_binary '__ci_last_regenerate|i:1688563514;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('5egjf0op464ogbdpntbs69anas4k5kgg','127.0.0.1',1688486086,_binary '__ci_last_regenerate|i:1688486086;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('5gv8442oj53kfnh86ahv9k0ohlfn9ali','127.0.0.1',1688996283,_binary '__ci_last_regenerate|i:1688996283;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('5m52si0joa7mdj49m86bac4ggppo5ec5','127.0.0.1',1688579850,_binary '__ci_last_regenerate|i:1688579850;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('5orv8lros10b1rovaoc9p177sr2f0f3l','127.0.0.1',1688412900,_binary '__ci_last_regenerate|i:1688412900;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('60q61i47dkbfojs6latidk1rgm2813m5','127.0.0.1',1689252003,_binary '__ci_last_regenerate|i:1689252003;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('6184n8tmi8n1bcm1vp1de226k5050ntn','127.0.0.1',1688410412,_binary '__ci_last_regenerate|i:1688410412;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('63hd61i6uoa565875p00ph8t6aq4ggcv','127.0.0.1',1687203839,_binary '__ci_last_regenerate|i:1687203839;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('641fn8932nj2cntsl2silcri5gevqnee','127.0.0.1',1688586946,_binary '__ci_last_regenerate|i:1688586946;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('65nq5066p0ndg12099l4g8vhub3lelro','127.0.0.1',1687188167,_binary '__ci_last_regenerate|i:1687188167;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('66lpm5hjr7a0kumtfnt13iiovt90i6nd','127.0.0.1',1687357546,_binary '__ci_last_regenerate|i:1687357546;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('66s6kna5cbtsthrb694blqq4iuoedtvj','127.0.0.1',1687372527,_binary '__ci_last_regenerate|i:1687372527;red_url|s:43:\"http://crm.localhost/pi/boletinescontroller\";'),('6ac5hvuaeuorpenbd33qukc3kdrsqfnk','127.0.0.1',1688478138,_binary '__ci_last_regenerate|i:1688478138;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('6ecq4kamam9a9oqtqa2cld9547v8rkiu','127.0.0.1',1688157619,_binary '__ci_last_regenerate|i:1688157619;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('6h70diphfklqa1jcej5ts065763tr73s','127.0.0.1',1687191052,_binary '__ci_last_regenerate|i:1687191052;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('6m5u32vo00peoi7p68kukv0b423vsr47','127.0.0.1',1688413925,_binary '__ci_last_regenerate|i:1688413925;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('6outpgqmhd702ueg60234hik3rdbmusk','127.0.0.1',1689101105,_binary '__ci_last_regenerate|i:1689101104;'),('6vkbmim2q4qu97eugm5bq3csdm9m3bq6','127.0.0.1',1688396848,_binary '__ci_last_regenerate|i:1688396848;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('6vphl1d5788lo3qqrb78ivbdrseklija','127.0.0.1',1689009685,_binary '__ci_last_regenerate|i:1689009685;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('70i80b3js2c7p3cdugaf231uu0e8f3k8','127.0.0.1',1688395296,_binary '__ci_last_regenerate|i:1688395296;red_url|s:40:\"http://crm.localhost/pi/clasescontroller\";'),('74gd36sjpb5gutidkc75gdac856qrtjd','127.0.0.1',1688042036,_binary '__ci_last_regenerate|i:1688042036;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('7550qjq19nn4sst0fk0fl030o0oa7q1i','127.0.0.1',1689020977,_binary '__ci_last_regenerate|i:1689020977;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('758c29ithia0ocj5011nnarb780f9utn','127.0.0.1',1689081362,_binary '__ci_last_regenerate|i:1689081362;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('75duq856rnfo8n11i0elnjvam9aib1hq','127.0.0.1',1688490067,_binary '__ci_last_regenerate|i:1688490067;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('79bjf3ku9h991u2jcaiepe14h6lpjrrn','127.0.0.1',1688152688,_binary '__ci_last_regenerate|i:1688152688;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('79culn50js11v4d58lhscq8qani60lov','127.0.0.1',1688671346,_binary '__ci_last_regenerate|i:1688671346;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('7fba77fvs74i2pdg2fhp3ra0r8n1uk3p','127.0.0.1',1688645708,_binary '__ci_last_regenerate|i:1688645705;red_url|s:64:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create\";'),('7fenbbqod22m3mi4is8o82tdam49vmh9','127.0.0.1',1689088120,_binary '__ci_last_regenerate|i:1689088120;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('7gebj11dbpnhm87o6qo6f7srq9gf0gbo','127.0.0.1',1687187818,_binary '__ci_last_regenerate|i:1687187818;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('7kmo305eidjaljeda3180frq9dd72ojt','127.0.0.1',1688490829,_binary '__ci_last_regenerate|i:1688490828;red_url|s:63:\"http://crm.localhost/admin/pi/patenteprioridadcontroller/create\";'),('7unc6a6ih854su8shgl1tjtnpujnm951','127.0.0.1',1689089498,_binary '__ci_last_regenerate|i:1689089498;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('82itkgi0kuro9d7hrd7t24ctrmc1p7a3','127.0.0.1',1688998975,_binary '__ci_last_regenerate|i:1688998975;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('852n9pf154rj44qbf5k8qhd4h2eela5o','127.0.0.1',1689017992,_binary '__ci_last_regenerate|i:1689017992;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('86hpchroqdgnkb226oheaiqb0hmp94ur','127.0.0.1',1688054472,_binary '__ci_last_regenerate|i:1688054472;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('89451oil8v9euonlfteuf5punlbp7896','127.0.0.1',1687353442,_binary '__ci_last_regenerate|i:1687353442;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('8bo07duv7dcicfce1d1cr7di8lfidk8t','127.0.0.1',1687372622,_binary '__ci_last_regenerate|i:1687372622;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('8e2rdvj0qq21pti0omsh5i42hnm4537h','127.0.0.1',1688483249,_binary '__ci_last_regenerate|i:1688483249;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|b:1;'),('8h5iqe085n7bim1njt90b8eakts8fo0g','127.0.0.1',1688417907,_binary '__ci_last_regenerate|i:1688417907;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('8kbp98p4ef8rn1amls47nrbim5kob73k','127.0.0.1',1688406387,_binary '__ci_last_regenerate|i:1688406387;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('8m8c72jf6imbu6q2vn9v674213kku309','127.0.0.1',1687195031,_binary '__ci_last_regenerate|i:1687195031;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('8mu769nfihkvn2m07tn7eidlp882ko56','127.0.0.1',1687204863,_binary '__ci_last_regenerate|i:1687204863;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('8pjr40qp8v17li1g9o53iegehaeqn73u','127.0.0.1',1688404788,_binary '__ci_last_regenerate|i:1688404788;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('8t171kl6hdm2rsrjks9id8moagso1j4v','127.0.0.1',1688491140,_binary '__ci_last_regenerate|i:1688491140;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('8vefbtals9ugm3se3nd9skj5n66bhtni','127.0.0.1',1688562385,_binary '__ci_last_regenerate|i:1688562385;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('93ksq3i9m5b9harb18dd948k9pjt3481','127.0.0.1',1688055803,_binary '__ci_last_regenerate|i:1688055803;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('995vt14o7og8kknnb7ot8ns2ncdir5pd','127.0.0.1',1689099673,_binary '__ci_last_regenerate|i:1689099673;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('9clh0ifb8fjsh43isgs4h2ap1534j3rc','127.0.0.1',1687377252,_binary '__ci_last_regenerate|i:1687377252;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('9epmitfaauh6sptj1esf2itpsvuon1of','127.0.0.1',1688493224,_binary '__ci_last_regenerate|i:1688493224;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('9evt6avdhtftfn9amhrb5ek9qu4esc4o','127.0.0.1',1688053003,_binary '__ci_last_regenerate|i:1688053003;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('9kol0i468pr02vebkqkt82bct59qlff0','127.0.0.1',1688158114,_binary '__ci_last_regenerate|i:1688158114;'),('9m57sutje59dp1equvt8b0b3lk835var','127.0.0.1',1687184980,_binary '__ci_last_regenerate|i:1687184980;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('9p8h7h18849a0os5gnqcq448sba548c6','127.0.0.1',1689003899,_binary '__ci_last_regenerate|i:1689003899;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('9tlea4milgne8ro13stqb80r3652fv9p','127.0.0.1',1689251577,_binary '__ci_last_regenerate|i:1689251577;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('a17vuq25l8uqtcmqtd1sq3vn95mlee55','127.0.0.1',1688404068,_binary '__ci_last_regenerate|i:1688404068;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('a237431iqav9mnqoidffn6geb36durdl','127.0.0.1',1688054793,_binary '__ci_last_regenerate|i:1688054793;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('a4qqtssf5vdp0s5ggvlgb5smts54lf1p','127.0.0.1',1688653285,_binary '__ci_last_regenerate|i:1688653285;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('abe2shf4d7som0gj820eg26m8jtg1u09','127.0.0.1',1689086793,_binary '__ci_last_regenerate|i:1689086793;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ac37ogg6nb2id19900k0qf071stgefbv','127.0.0.1',1689020022,_binary '__ci_last_regenerate|i:1689020022;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('ae76pt4erp8vj3uitukeu5qndue90jpv','127.0.0.1',1687198732,_binary '__ci_last_regenerate|i:1687198732;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('aejtmcpokj8stibn4rel8ne3nbho60a3','127.0.0.1',1689256918,_binary '__ci_last_regenerate|i:1689256861;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('afearo259toicav2sdplf118dmvgme27','127.0.0.1',1688588761,_binary '__ci_last_regenerate|i:1688588761;'),('afhvmc6l14td1r5n09jf2us6qjueq06r','127.0.0.1',1688409140,_binary '__ci_last_regenerate|i:1688409140;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('air3a7pdnnfd7g3e0f83cbcfuvb3qoo5','127.0.0.1',1688403766,_binary '__ci_last_regenerate|i:1688403766;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('aknua9nuofb449p3esgq3mbj7s798rr0','127.0.0.1',1688141202,_binary '__ci_last_regenerate|i:1688141202;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('alcecp28iicqvsvq3hp58mqnarmgms50','127.0.0.1',1688395297,_binary '__ci_last_regenerate|i:1688395296;'),('alvomsmcukgo6lc35qhsskm5ugg53c78','127.0.0.1',1688588761,_binary '__ci_last_regenerate|i:1688588761;red_url|s:64:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create\";'),('amrbn4k90t0ngh1nego0ghl55u6jp28f','127.0.0.1',1688071113,_binary '__ci_last_regenerate|i:1688071113;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('atl4aqq2al3bqfhhp5ganmq2jjtl0tp6','127.0.0.1',1687201580,_binary '__ci_last_regenerate|i:1687201580;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('auvb9lhrn8nt825r94nlrgp5ilg8cclc','127.0.0.1',1688581098,_binary '__ci_last_regenerate|i:1688581098;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('avnvs4eqoh40t14c1nd23knduat8vc4p','127.0.0.1',1688132866,_binary '__ci_last_regenerate|i:1688132866;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),('b4a2nr9kkgf5gpa8fk49n3rr1g68b43e','127.0.0.1',1689013979,_binary '__ci_last_regenerate|i:1689013979;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('b597vnb89iao5ikuuuk291hq7soi5gov','127.0.0.1',1687180465,_binary '__ci_last_regenerate|i:1687180465;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('bbfb74supvd2rdhv8n3mng88veh9me3r','127.0.0.1',1688138718,_binary '__ci_last_regenerate|i:1688138718;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('bgmgqmupqecda250ptitjf3e8sb8v6d1','127.0.0.1',1689101947,_binary '__ci_last_regenerate|i:1689101947;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('bkn6nfgt89v1glqcn83qrbjoehjk6ltq','127.0.0.1',1687179486,_binary '__ci_last_regenerate|i:1687179486;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('bkrthoortjq3pdv4h6kq25ac80mds5t8','127.0.0.1',1687371892,_binary '__ci_last_regenerate|i:1687371892;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('bm8238vlpnv05b3nt038mubsacm00qvu','127.0.0.1',1688147189,_binary '__ci_last_regenerate|i:1688147189;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('bod10nrokinrjd1to8on32iiqjssol82','127.0.0.1',1688479281,_binary '__ci_last_regenerate|i:1688479281;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('bqenbglfhqqvopff3nlr75fo8dhg054f','127.0.0.1',1688411286,_binary '__ci_last_regenerate|i:1688411286;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('c30cmdo0emp6fc9docetvpq374n3t1vj','127.0.0.1',1687368667,_binary '__ci_last_regenerate|i:1687368667;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('c39j7n0niqm5o91u1honfubmn6u2jhdm','127.0.0.1',1688053038,_binary '__ci_last_regenerate|i:1688053038;red_url|s:40:\"http://crm.localhost/pi/anexoscontroller\";'),('c5ssu3ol3pfas892c7kvef59qhmfq05k','127.0.0.1',1688568350,_binary '__ci_last_regenerate|i:1688568350;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('cgv38854bpcapq4mq81hrh1io3i7p839','127.0.0.1',1687179165,_binary '__ci_last_regenerate|i:1687179165;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ck6hl4uibmga0lgd4h5aq1m84ep2ge40','127.0.0.1',1687362285,_binary '__ci_last_regenerate|i:1687362285;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('cm0nvsar4fppft8bo4tne1dtb4999tu7','127.0.0.1',1688646143,_binary '__ci_last_regenerate|i:1688646143;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('cs8kk350o1b7rq8heg4v01lt03u3srll','127.0.0.1',1688414976,_binary '__ci_last_regenerate|i:1688414976;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('csm2j0cha7o62fdj2kfu5rf0f1dr5v2e','127.0.0.1',1689101820,_binary '__ci_last_regenerate|i:1689101820;red_url|s:64:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create\";'),('cvlge6b3rff88d5qcq7obv73qpuqlg0s','127.0.0.1',1687183484,_binary '__ci_last_regenerate|i:1687183484;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('d1of3lj86bm6rdm1kccm48437va39mmh','127.0.0.1',1688140405,_binary '__ci_last_regenerate|i:1688140405;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('d3584qjo6s4ggbdqarg7qn6h71omu3jm','127.0.0.1',1688485112,_binary '__ci_last_regenerate|i:1688485112;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('d6pbm5kbjhtttvj1hg1mhtv549n638gr','127.0.0.1',1687357125,_binary '__ci_last_regenerate|i:1687357125;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('daub4tt20noh0fjq927gn8sjicvmg005','127.0.0.1',1688138024,_binary '__ci_last_regenerate|i:1688138024;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('db3fc2o7m16ul3haq5kg12til6p58hk1','127.0.0.1',1688477709,_binary '__ci_last_regenerate|i:1688477709;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('dd5dfb3c78kvb5utvqivcgk1275gphv7','127.0.0.1',1688415284,_binary '__ci_last_regenerate|i:1688415284;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('dhrkkjn8ia98ih8dqq5m64por1h6sm8u','127.0.0.1',1688056533,_binary '__ci_last_regenerate|i:1688056533;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('dm27u1j0ktsikr5f7g792tj2da7cn49h','127.0.0.1',1687375812,_binary '__ci_last_regenerate|i:1687375812;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('dp3dtvm7oevpvq9upgifji1sjp3iqgeq','127.0.0.1',1689021111,_binary '__ci_last_regenerate|i:1689020977;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('dpshp1nd8aehqnmkkcac63i95t80n1bl','127.0.0.1',1689080164,_binary '__ci_last_regenerate|i:1689080164;'),('dq8ifh1fb3tkb17ea163e7nmoprvjja3','127.0.0.1',1687207830,_binary '__ci_last_regenerate|i:1687207830;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('dqbp8q0o289kkp39vkt1ej8otffjlbfp','::1',1688041484,_binary '__ci_last_regenerate|i:1688041483;red_url|s:21:\"http://crm.localhost/\";'),('dsdgod86798enfb80l9mstnalqn8bnb4','127.0.0.1',1688479621,_binary '__ci_last_regenerate|i:1688479621;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('e02nt6hllqdun24t4a39c49oecnsg28d','127.0.0.1',1687524030,_binary '__ci_last_regenerate|i:1687524030;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('eauj3csgqneest9tifbijdst42a4vsvg','127.0.0.1',1689013504,_binary '__ci_last_regenerate|i:1689013504;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('eckgot8ac3kgmlmgqgfbkh1soach2d8p','127.0.0.1',1687206912,_binary '__ci_last_regenerate|i:1687206912;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ef7b8rt4ef231hdf2t9k4oraisep5epd','127.0.0.1',1687180778,_binary '__ci_last_regenerate|i:1687180778;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('eha7g7390tv4bl5iltnrka3p1ai690oe','127.0.0.1',1688158003,_binary '__ci_last_regenerate|i:1688158003;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ejv3l2khjc9vhimj8lqcnmitaeo4qfl2','127.0.0.1',1688657549,_binary '__ci_last_regenerate|i:1688657549;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ekd4leotgs0mqurgb2378rddvj1c3l0j','127.0.0.1',1688408349,_binary '__ci_last_regenerate|i:1688408349;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ekt9c6015k5m6afs6pb0ra4e71vegb0j','127.0.0.1',1687202386,_binary '__ci_last_regenerate|i:1687202386;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('epa1falqpuforlee4a2vpvti8b2r6mr2','127.0.0.1',1688157296,_binary '__ci_last_regenerate|i:1688157296;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('eq3speec38idl79d60ap9vadklkna5ct','127.0.0.1',1687203141,_binary '__ci_last_regenerate|i:1687203141;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('erucvmbfsaacr8rf6nnvo2kg9g15qtj1','127.0.0.1',1688153972,_binary '__ci_last_regenerate|i:1688153972;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ev57k0eg2fslk90aht6oaja2mckj7h7n','127.0.0.1',1688571333,_binary '__ci_last_regenerate|i:1688571333;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('f2lle4m07m2elq9ho991rl6kum00s5lb','127.0.0.1',1689099986,_binary '__ci_last_regenerate|i:1689099986;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('f4rm2adi3cl9sjorfggeioo5n8p8oti0','127.0.0.1',1688408048,_binary '__ci_last_regenerate|i:1688408048;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('f8ok835md6so988n61fqra6363jn370h','127.0.0.1',1689019396,_binary '__ci_last_regenerate|i:1689019396;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('f9rmlv77rdrhi72bc8hl4vgg6ur6609t','127.0.0.1',1687202084,_binary '__ci_last_regenerate|i:1687202084;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('fd8dtca215ojvkdmn2evcbd6m3c78vgp','127.0.0.1',1688648885,_binary '__ci_last_regenerate|i:1688648885;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('fg3vm578m3dcv291i1bvsjboaso7t6lh','127.0.0.1',1688579028,_binary '__ci_last_regenerate|i:1688579028;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('fh72qpp7bss48o0l8krumlnii7iivnbg','127.0.0.1',1688133733,_binary '__ci_last_regenerate|i:1688133733;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('fje5fmisj2990ru2jgbcgm2e7hsabi64','127.0.0.1',1688397781,_binary '__ci_last_regenerate|i:1688397781;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ftgn32ugrrdqum4ff936liere5tf7upi','127.0.0.1',1687358262,_binary '__ci_last_regenerate|i:1687358262;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('fvut23rdts4ikv8tj79977299fl5jc9v','127.0.0.1',1687354850,_binary '__ci_last_regenerate|i:1687354850;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('g1ldguv8fk4jvpvbs8d821p4hvra7dba','127.0.0.1',1688490740,_binary '__ci_last_regenerate|i:1688490740;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('g4jk498tond0hsa7idvfhtoqgf0bt1nj','127.0.0.1',1688478466,_binary '__ci_last_regenerate|i:1688478466;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('g6fjkj7ra4ige4kdgbckfev48g8e0fib','127.0.0.1',1688477717,_binary '__ci_last_regenerate|i:1688477717;red_url|s:66:\"http://crm.localhost/admin/pi/publicacionesmarcascontroller/create\";'),('gaebfb0vqopv7204j611j19bmgeddefi','127.0.0.1',1688419593,_binary '__ci_last_regenerate|i:1688419532;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('gbksl91c7nlm6po68ru18b863b4pb8p8','127.0.0.1',1688406855,_binary '__ci_last_regenerate|i:1688406855;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('gcl4cnbse4dvehcq1c6u3ab8cjr5p5ob','127.0.0.1',1687201272,_binary '__ci_last_regenerate|i:1687201272;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('gd2mjj5jbpsaj5d467jpg07g1el3m21p','127.0.0.1',1688484731,_binary '__ci_last_regenerate|i:1688484731;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|b:1;'),('gde56f5bh9u6hddmtaumaolgt1dmc6f9','127.0.0.1',1688405462,_binary '__ci_last_regenerate|i:1688405462;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ge8j10ci19p47de6oc7rerg6l967i8uf','127.0.0.1',1687357943,_binary '__ci_last_regenerate|i:1687357943;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('giuh6t7nkvlj6299dih6dkmqb1a4g5nt','127.0.0.1',1689084357,_binary '__ci_last_regenerate|i:1689084357;red_url|s:68:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create?s=1\";'),('gu9i10a36lpi4jrnqr5v85ncn0np30fn','127.0.0.1',1688152359,_binary '__ci_last_regenerate|i:1688152359;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('h0dem94amj426e8afb0vtgd0j2hu0vmn','127.0.0.1',1687200643,_binary '__ci_last_regenerate|i:1687200643;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('h3c89eauprgs8b0ev28kttvhilv006ql','127.0.0.1',1689252826,_binary '__ci_last_regenerate|i:1689252826;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('h63rgv1r3bvp6fg9000ge4kha5vgp0bv','127.0.0.1',1687181846,_binary '__ci_last_regenerate|i:1687181846;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('hcbnvbagkgc59qgm4m6l4uotktmulme5','127.0.0.1',1688997415,_binary '__ci_last_regenerate|i:1688997415;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('he2ajbgffmdamlidd9mqlbsjl60fof7p','127.0.0.1',1689003203,_binary '__ci_last_regenerate|i:1689003203;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('herd9uifq76qhi2keha5l2eop7kkjmiq','127.0.0.1',1687379129,_binary '__ci_last_regenerate|i:1687379129;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('hf3siuif0l2d526kicanku1blhvk2lle','127.0.0.1',1689251255,_binary '__ci_last_regenerate|i:1689251255;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('hmattr5kk6qaf3ohccod8bdh3mbdj6e7','127.0.0.1',1688472131,_binary '__ci_last_regenerate|i:1688472131;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('hn6r6u87emq8o9n3llk5a68ik5tl2ud6','127.0.0.1',1688153078,_binary '__ci_last_regenerate|i:1688153078;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('hos8acrc46m98c1mkt3hte1fd7luse2q','127.0.0.1',1687378456,_binary '__ci_last_regenerate|i:1687378456;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('hqkj878pc6p6v0s1ct3q94peoif7dnhg','127.0.0.1',1688485415,_binary '__ci_last_regenerate|i:1688485415;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('hrih5aq2s4frk67gkkcc54tvdusjf7s1','127.0.0.1',1687181408,_binary '__ci_last_regenerate|i:1687181408;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('i3pil4shkt13n6svc8k85rpehla38fbq','127.0.0.1',1688481136,_binary '__ci_last_regenerate|i:1688481136;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('i497j714m9phehna2q3h3mo8suf9b1td','127.0.0.1',1688995434,_binary '__ci_last_regenerate|i:1688995434;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('i5fh9md5l3s2i4jjn5t3pv24pj8pab15','127.0.0.1',1689254060,_binary '__ci_last_regenerate|i:1689254060;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('i6n7oofv302tqcijb4gv9s4uvg87ear4','127.0.0.1',1687208142,_binary '__ci_last_regenerate|i:1687208142;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ia642na4b4a0rdvjnqm3961k9oc1ptl3','127.0.0.1',1688587258,_binary '__ci_last_regenerate|i:1688587258;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ib68bl9cdu7oghmvpbnr7tsus3ohr3vp','127.0.0.1',1689012310,_binary '__ci_last_regenerate|i:1689012310;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('ibhqvvmvqko8cus7gppkisigt3bhmk9s','127.0.0.1',1688148071,_binary '__ci_last_regenerate|i:1688148071;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ifekilbres9rdvsotclo19d6drbc2ukd','127.0.0.1',1688477717,_binary '__ci_last_regenerate|i:1688477717;'),('ig3gra0eusivr3dtgiqm78kjiadc801b','127.0.0.1',1689090204,_binary '__ci_last_regenerate|i:1689090204;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ig9omvlsf1le3o2sur9mav10j3flsava','127.0.0.1',1689084769,_binary '__ci_last_regenerate|i:1689084769;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ighgck61lp6f5vuphukd9stgtbflprp4','127.0.0.1',1688145823,_binary '__ci_last_regenerate|i:1688145823;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('iiuslbkdep6l33t4f3kh3ovc8c7m35l3','127.0.0.1',1689084357,_binary '__ci_last_regenerate|i:1689084357;'),('ikq019vk0eoahjcklvd59c2dcqhgqasf','127.0.0.1',1688071512,_binary '__ci_last_regenerate|i:1688071512;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('il2nar9ts6kh4s6b553i69im67b28ilj','127.0.0.1',1687376123,_binary '__ci_last_regenerate|i:1687376123;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('iselkremdoriddrku4gb52fjsakmpkq8','127.0.0.1',1688670981,_binary '__ci_last_regenerate|i:1688670981;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('isrq2sfj1t3oijsdakckqnd7n9nntebu','127.0.0.1',1688582131,_binary '__ci_last_regenerate|i:1688582131;'),('iveq7fc5iifh6kd6hdh8nc7gn41uo81n','127.0.0.1',1688147500,_binary '__ci_last_regenerate|i:1688147500;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('j3m8cosc46enu0683ckb46q798nu4j8c','127.0.0.1',1688411622,_binary '__ci_last_regenerate|i:1688411622;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('j473v68ftgussvotp4n899d99c81s3up','127.0.0.1',1688651771,_binary '__ci_last_regenerate|i:1688651771;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('j4q4t9p3ddmkq4b6lpatm4j66d363akt','127.0.0.1',1689254911,_binary '__ci_last_regenerate|i:1689254911;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('j7png9r7tu8doker8djkhg668crqciqu','127.0.0.1',1688133195,_binary '__ci_last_regenerate|i:1688133195;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('jdpd1np4263n8vtlifbrqrghhmqttmad','127.0.0.1',1688656881,_binary '__ci_last_regenerate|i:1688656881;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('jhcvok186p7msamnttd3vgbdjsh2ievb','127.0.0.1',1688647916,_binary '__ci_last_regenerate|i:1688647916;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('jk55dohfahm7itlb61fsqarq0nk5e41f','127.0.0.1',1689103080,_binary '__ci_last_regenerate|i:1689103077;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('jl5vk8r8rl2nvlckbrsfkf9seheocujn','127.0.0.1',1687353132,_binary '__ci_last_regenerate|i:1687353132;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('jlet7e4ll0hj2sch3plpgt22tvh3f8m7','127.0.0.1',1689013053,_binary '__ci_last_regenerate|i:1689013053;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('jn6t1sgfh2jq7768epnhscmfdum2meh9','127.0.0.1',1687381134,_binary '__ci_last_regenerate|i:1687381134;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('jpv5oovvn7mtnjjrsstotq2li0dhiid0','127.0.0.1',1687206190,_binary '__ci_last_regenerate|i:1687206190;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('jq6t8a26vmvaoc8c19fvc73otlg67qp0','127.0.0.1',1687371214,_binary '__ci_last_regenerate|i:1687371214;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ju1jsrd06nmckbbfk0ndn6h6kvr9rn3h','127.0.0.1',1687376549,_binary '__ci_last_regenerate|i:1687376549;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('jvbrjv9b40v63j98fjj21dg8pmp6djp7','127.0.0.1',1688410975,_binary '__ci_last_regenerate|i:1688410975;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('k2qo1mcsbkmfo8pnf397ro8i2tqb7bev','127.0.0.1',1688572610,_binary '__ci_last_regenerate|i:1688572610;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('k472m4d2rclll4dqge8j98jkrgp9u9na','127.0.0.1',1688587964,_binary '__ci_last_regenerate|i:1688587964;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('k6okgncvcarjv8epa2ia9ervp1n2df8k','127.0.0.1',1689086443,_binary '__ci_last_regenerate|i:1689086443;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('k7g851cdafn4gghceugpn2mkue1cst1g','127.0.0.1',1689084091,_binary '__ci_last_regenerate|i:1689084091;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('kbk77ugman11avgegf02noqspoeveaig','127.0.0.1',1688405023,_binary '__ci_last_regenerate|i:1688405023;'),('kg3733uf8bsq5t05nnejpdrvn7bgao95','127.0.0.1',1687205174,_binary '__ci_last_regenerate|i:1687205174;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('kifaqas0eopvncm79f65q6bkmniknatr','127.0.0.1',1688408749,_binary '__ci_last_regenerate|i:1688408749;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('kp1799va2r13mt3g3man9745r06lmnhn','127.0.0.1',1688495386,_binary '__ci_last_regenerate|i:1688495080;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ks6iga5n5jtu6rseligic15uisskd002','127.0.0.1',1687370465,_binary '__ci_last_regenerate|i:1687370465;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('kug4icusgn3su5131aai8d3fs8ms5oh7','127.0.0.1',1688478893,_binary '__ci_last_regenerate|i:1688478893;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('l0s18isv1jlsolmipu10ubm5tb7pduv0','127.0.0.1',1687197387,_binary '__ci_last_regenerate|i:1687197387;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('l4ujlvnoskpefvshitijgkdlikd0f88o','127.0.0.1',1687524034,_binary '__ci_last_regenerate|i:1687524030;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('lcnq0ittl4a2gvt0trf4micnm9fdt98g','127.0.0.1',1688158339,_binary '__ci_last_regenerate|i:1688158339;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ljmt1714bpkreiugrt7q0qajdv52h8n5','127.0.0.1',1687360319,_binary '__ci_last_regenerate|i:1687360319;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('lr8upq9fb0ivkid4p8nig0tv5rk6j494','127.0.0.1',1687194579,_binary '__ci_last_regenerate|i:1687194579;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ls9u1c9hgml9s40st6eebeu2954ju2hc','127.0.0.1',1689253722,_binary '__ci_last_regenerate|i:1689253722;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('lv5ejdkqgnpek71c57tdpa9ipacoaabg','127.0.0.1',1688413610,_binary '__ci_last_regenerate|i:1688413610;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('lvi64c22nv33je5ud0t93ffaph23b16t','127.0.0.1',1688156375,_binary '__ci_last_regenerate|i:1688156375;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('m1st8t8na06sn8ivlnm6o5pb4h4o1559','127.0.0.1',1688483867,_binary '__ci_last_regenerate|i:1688483867;'),('m4abhrkpeuq6299crlf6c65snhth9kvf','127.0.0.1',1688072279,_binary '__ci_last_regenerate|i:1688072279;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('m7e8vgsmiql03j3uaq775ji1564go6dk','127.0.0.1',1688657900,_binary '__ci_last_regenerate|i:1688657900;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('m7v8456c10o96u340p4ffhscjteu17r0','127.0.0.1',1688482424,_binary '__ci_last_regenerate|i:1688482424;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('m8p35b8b01hnkuivhuuj8tjgohmc2uv6','127.0.0.1',1688140097,_binary '__ci_last_regenerate|i:1688140097;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('mc2vchrja2kkekfrmto2v58t6k4o35du','127.0.0.1',1689004439,_binary '__ci_last_regenerate|i:1689004439;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('mdq65f7afgesn8ukrbh2d55q2adu3rir','127.0.0.1',1687355855,_binary '__ci_last_regenerate|i:1687355855;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('mdvep1nr7t8f5q7jn59kf3vn7qcfas1o','127.0.0.1',1688582131,_binary '__ci_last_regenerate|i:1688582131;red_url|s:43:\"http://crm.localhost/admin/clients/client/1\";'),('me5t2k7m4m13t7rpp9mrjtfru4mus6c5','127.0.0.1',1688145389,_binary '__ci_last_regenerate|i:1688145389;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('mfaavpk9nsaakp0m138k52eonunrl27a','127.0.0.1',1689101820,_binary '__ci_last_regenerate|i:1689101820;'),('mfn1qp13ble86qht7v1jbhafhdsi6f3o','127.0.0.1',1687373296,_binary '__ci_last_regenerate|i:1687373296;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('mgfd0sqaoe0ghfuj9uikdjch5rvfdcv8','127.0.0.1',1688396547,_binary '__ci_last_regenerate|i:1688396547;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('mi46ori8nfj3kd31ds1nbcnr4h1514tm','127.0.0.1',1689256861,_binary '__ci_last_regenerate|i:1689256861;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('mlkqj5e74gt00vf5kj5k6r1r88gkt9m5','127.0.0.1',1688653835,_binary '__ci_last_regenerate|i:1688653835;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('morltq8nbcfmqjq6s8k495mgiatrtp0b','127.0.0.1',1688675319,_binary '__ci_last_regenerate|i:1688675269;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('mpc0r3ep1h11fn3cu1mfhjku577tii84','127.0.0.1',1688418919,_binary '__ci_last_regenerate|i:1688418919;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('mpmla3lmi1tgfb91538lnklodhfrg4io','127.0.0.1',1689083191,_binary '__ci_last_regenerate|i:1689083191;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('n07hbqor0uo05tc54630qmv6e0k9sr1u','127.0.0.1',1688146652,_binary '__ci_last_regenerate|i:1688146652;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('n28tkccfk41akno9snkoovg96ep2sfu0','127.0.0.1',1688670602,_binary '__ci_last_regenerate|i:1688670602;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('n2lcjivumcmiq2rj6j01b3f1f9dl1ooe','127.0.0.1',1689080093,_binary '__ci_last_regenerate|i:1689080093;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('n45fo5f3u8tbeluigft3onth7psgokis','127.0.0.1',1688658279,_binary '__ci_last_regenerate|i:1688658279;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('n4seq1rqdah77r3025l3rqnrsasmf4t8','127.0.0.1',1688675269,_binary '__ci_last_regenerate|i:1688675269;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('n5jc9f8kkqvjt3rhs22r7mje18n3odi1','127.0.0.1',1688563204,_binary '__ci_last_regenerate|i:1688563204;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('nburai8lusqlelvh2s1vqlmproh022fs','127.0.0.1',1688070454,_binary '__ci_last_regenerate|i:1688070454;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('neqlveatach7halvcooal7gq1t4ggveo','127.0.0.1',1688582121,_binary '__ci_last_regenerate|i:1688582121;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('nk80gracelf4luvaoohbb3j2463f3k38','127.0.0.1',1689087368,_binary '__ci_last_regenerate|i:1689087368;red_url|s:68:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create?s=1\";'),('nlaf74idenuor45op7i4i19mlmq2oa6r','127.0.0.1',1688409441,_binary '__ci_last_regenerate|i:1688409441;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('o00m5k7efuo5k5eua7ub4mj57nj3qjul','127.0.0.1',1687379554,_binary '__ci_last_regenerate|i:1687379554;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('o064s5gq6kurc4tur1k6ntlrgsepf5br','127.0.0.1',1687181508,_binary '__ci_last_regenerate|i:1687181507;'),('o4jtr6dpmdevj9dakko2unalmba043qi','127.0.0.1',1688419532,_binary '__ci_last_regenerate|i:1688419532;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('o9rhk1i5jq7jj1p5me6963iqbqhtcket','127.0.0.1',1689087143,_binary '__ci_last_regenerate|i:1689087143;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ofv6t04hnut38mhovtoev9oiqsfa6sf4','127.0.0.1',1688146154,_binary '__ci_last_regenerate|i:1688146154;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('olam6o7bulqjejvqipd2cqq3b3tvr2lc','127.0.0.1',1688654256,_binary '__ci_last_regenerate|i:1688654256;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('onpq9lngn6mce6bq0slrc8da1ai1vfil','127.0.0.1',1688646201,_binary '__ci_last_regenerate|i:1688646201;'),('op52md8ei8dvd37q6m19fh0hs6p8gusn','127.0.0.1',1687186091,_binary '__ci_last_regenerate|i:1687186091;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ovjvr02p03bhrttc1jppqn5hblfna9p5','127.0.0.1',1688405865,_binary '__ci_last_regenerate|i:1688405865;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ovl0fir1hm7j0n1tmdsjeriou2cvmapl','127.0.0.1',1688395740,_binary '__ci_last_regenerate|i:1688395740;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('p0co9vrmup0jlhhg1theehdt5ofhs5t7','127.0.0.1',1689087543,_binary '__ci_last_regenerate|i:1689087543;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('p3ntvubk4ftgahkftunpq2moe7kg7bec','127.0.0.1',1687189634,_binary '__ci_last_regenerate|i:1687189634;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('p5sat8r8l9ldlm3srnb60m2oe6vbe6o8','127.0.0.1',1687203442,_binary '__ci_last_regenerate|i:1687203442;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('p7p71pu7ubu4499begio4hdftvrdn8qc','127.0.0.1',1688139553,_binary '__ci_last_regenerate|i:1688139553;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('p7rl1nkmc6vcj1rinm7s4a9v5pplg8k5','127.0.0.1',1687376909,_binary '__ci_last_regenerate|i:1687376909;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('p8b8rnbt31g3mfo9bo65vi305699mors','127.0.0.1',1689011947,_binary '__ci_last_regenerate|i:1689011947;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('p9buo0uq0ig11196qugkltpgk1d44hbv','127.0.0.1',1688589007,_binary '__ci_last_regenerate|i:1688589007;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('pa8rn4vbk94442huo7a11bmjl5hoq52c','127.0.0.1',1687181507,_binary '__ci_last_regenerate|i:1687181507;red_url|s:59:\"http://crm.localhost/admin/pi/tiposeventoscontroller/create\";'),('pbj5q92gsrm1do4eqt0tm1hk3cb0tgo6','127.0.0.1',1688561352,_binary '__ci_last_regenerate|i:1688561352;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('pd402r6ab1i9ssajgdekd63bbnag051t','127.0.0.1',1688396108,_binary '__ci_last_regenerate|i:1688396108;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('pg5dothaq7fp0j8fsct08cih0d3mb739','127.0.0.1',1688132181,_binary '__ci_last_regenerate|i:1688132181;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('pnrscr4fvt2topktebgnjaqoab684s1r','127.0.0.1',1689017455,_binary '__ci_last_regenerate|i:1689017455;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('po4cr3rcb0cgdnb9l7idi2vnbrg9vf5o','127.0.0.1',1689018298,_binary '__ci_last_regenerate|i:1689018298;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('ppkjg761mbpq26t79co2iim5hirfjbm1','127.0.0.1',1688153648,_binary '__ci_last_regenerate|i:1688153648;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('pu3v87d3ekrt31ms22l5eqllr3rq2u50','127.0.0.1',1688405131,_binary '__ci_last_regenerate|i:1688405131;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('pvfninqv9nrjvsed508641lq2s0n60b3','127.0.0.1',1689089184,_binary '__ci_last_regenerate|i:1689089184;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('q0u6qmk817r6a4ece38ieaa76tb0iptr','127.0.0.1',1688072699,_binary '__ci_last_regenerate|i:1688072699;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('q2a161i9s30et9v15vkkf5ksvul2dp8a','127.0.0.1',1687359648,_binary '__ci_last_regenerate|i:1687359648;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('q3b9r3l9i01jole2phce94m0pp3bevo7','127.0.0.1',1688993581,_binary '__ci_last_regenerate|i:1688993581;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('q6pk9geflmq8bhbn2oseidvs2v8g6d7m','127.0.0.1',1687182149,_binary '__ci_last_regenerate|i:1687182149;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('qboa03dom37qj3gn10hfdvmubg81spm4','127.0.0.1',1688398414,_binary '__ci_last_regenerate|i:1688398414;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('qciv9ot10vh0eq1ktj6uarhig6o9t2r4','127.0.0.1',1687377622,_binary '__ci_last_regenerate|i:1687377622;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('qetb06lhrde3n2s9h36q3tepftr5nrft','127.0.0.1',1687185781,_binary '__ci_last_regenerate|i:1687185781;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('qf88or36r9c08q8kbeiro24i999oc40s','127.0.0.1',1688134169,_binary '__ci_last_regenerate|i:1688134169;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('qfc5jje25prsfuut407k7j0lplulbt6d','127.0.0.1',1688492153,_binary '__ci_last_regenerate|i:1688492153;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('qklj3itnfjs7djvh86uvvkc7ae1thfma','127.0.0.1',1688156073,_binary '__ci_last_regenerate|i:1688156073;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('qmt2oqcm2li7pgmbk71or3jjttcns298','127.0.0.1',1688407699,_binary '__ci_last_regenerate|i:1688407699;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('qoq9ecp9uu8jl2pfsmi666bmi9jhf0ir','127.0.0.1',1689101104,_binary '__ci_last_regenerate|i:1689101104;red_url|s:64:\"http://crm.localhost/admin/pi/marcassolicitudescontroller/create\";'),('qp9dlueljbmtqaok2str3sc68dsdjq8i','127.0.0.1',1688482061,_binary '__ci_last_regenerate|i:1688482061;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('qvkfj3gcmaqr8qqansd197f5hnsj0jhp','127.0.0.1',1689103077,_binary '__ci_last_regenerate|i:1689103077;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('qvsv4lfsu4pii344p48v2d7ipt7uar9a','127.0.0.1',1687371555,_binary '__ci_last_regenerate|i:1687371555;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('r15hs2q64gk3uuefk3n06k5pecg3va7u','127.0.0.1',1689101065,_binary '__ci_last_regenerate|i:1689101065;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('r1hfgbrqu2kvgggqibju3r7tugimro0k','127.0.0.1',1688132482,_binary '__ci_last_regenerate|i:1688132482;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('r2k2iita2c7gae00l70btm79dtfmu6i7','127.0.0.1',1687196151,_binary '__ci_last_regenerate|i:1687196151;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('r5k3sj3972qfk2g5sbv7ui98c275h3o3','127.0.0.1',1687380676,_binary '__ci_last_regenerate|i:1687380676;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('r7ucfpq9181bnmgt5mg6i34om1tp48tg','127.0.0.1',1688486395,_binary '__ci_last_regenerate|i:1688486395;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('r9v4cber74vgqrsq5lptg9qft18pehj3','127.0.0.1',1688493693,_binary '__ci_last_regenerate|i:1688493693;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('rgvefb5am31m7abul2jp3a8kafjqrh61','127.0.0.1',1688492902,_binary '__ci_last_regenerate|i:1688492902;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('rinurcr87n4964m6sglqonavuqc1opa4','127.0.0.1',1688475234,_binary '__ci_last_regenerate|i:1688475234;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('rjvab22386ttspnn1pqa1frikj36883j','127.0.0.1',1688492558,_binary '__ci_last_regenerate|i:1688492558;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('rkka7eo8kjfg0ra8k1v283ou94o11imu','127.0.0.1',1688499586,_binary '__ci_last_regenerate|i:1688499577;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),('roda616o1mhoq9ophgm2bskuvgbopjgn','127.0.0.1',1687196664,_binary '__ci_last_regenerate|i:1687196664;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('rrebamqpqu9516o4rs72ne8nvb8hsjgo','::1',1688560679,_binary '__ci_last_regenerate|i:1688560608;client_user_id|s:1:\"1\";contact_user_id|s:1:\"1\";client_logged_in|b:1;'),('rrg53cuqhbqpqqjt6n93igmkl38ihr3o','127.0.0.1',1689101644,_binary '__ci_last_regenerate|i:1689101644;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('rv35uqb1o8kugus85hun5nsd3vfd4i50','127.0.0.1',1687190716,_binary '__ci_last_regenerate|i:1687190716;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('s1aie5hn0v0fmo8e9ho7dhsk7dn5g3ef','127.0.0.1',1689015552,_binary '__ci_last_regenerate|i:1689015552;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('s4tk2527ndm8vmq33438guti8j5nhpd4','127.0.0.1',1689016331,_binary '__ci_last_regenerate|i:1689016331;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('s5m3tf6656kgd7vvnggmie87clhfuhve','127.0.0.1',1688412284,_binary '__ci_last_regenerate|i:1688412284;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('s5qd0nodqdkm5h8qr2q4osrb3alibcr4','127.0.0.1',1688399596,_binary '__ci_last_regenerate|i:1688399596;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('s5rjnm16erebm1es6hfn7bspvv6akvmu','127.0.0.1',1688482838,_binary '__ci_last_regenerate|i:1688482838;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|b:1;'),('s94l9q257ojuf4ediof5d4gjimrerigm','127.0.0.1',1689011193,_binary '__ci_last_regenerate|i:1689011193;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('scukm66f415f67r394p86u7uht36lm5b','127.0.0.1',1688481520,_binary '__ci_last_regenerate|i:1688481520;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('sdcs349eoq55gjh9hdsnj7o4ptjlab99','127.0.0.1',1688398111,_binary '__ci_last_regenerate|i:1688398111;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('sf8ska58nuu1nvbgko3rg8b11vtavr7g','127.0.0.1',1688054142,_binary '__ci_last_regenerate|i:1688054142;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('sj1fpucjqihemvoq2d20s16cgnfqt5uh','127.0.0.1',1688055499,_binary '__ci_last_regenerate|i:1688055499;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('sjjt2kgtund5v4bj3v1vu80jrvgqq0di','127.0.0.1',1688646630,_binary '__ci_last_regenerate|i:1688646630;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('sn0vd6noj71plrpbuer5veo4mfno8oj6','127.0.0.1',1688994751,_binary '__ci_last_regenerate|i:1688994751;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('spgcm0gm2d0vmrmot3h648lomrkcbn2l','127.0.0.1',1689015059,_binary '__ci_last_regenerate|i:1689015059;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('sqmjv1oeqdgat8m3cur0aabnd8d4ntr6','127.0.0.1',1688666985,_binary '__ci_last_regenerate|i:1688666985;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('srp1q4ddgp0ho13ug2l9cq0pa1tt84f2','127.0.0.1',1687359059,_binary '__ci_last_regenerate|i:1687359059;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('stgr2goqs30hkpmnln7d09jvl3t1o4ro','127.0.0.1',1687190224,_binary '__ci_last_regenerate|i:1687190224;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('t1hsl865kii535obifdnj8jg2a3dsn6l','127.0.0.1',1688995922,_binary '__ci_last_regenerate|i:1688995922;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('t7o1m24riq53a9iv44mdh1fd17lh6b94','127.0.0.1',1688410108,_binary '__ci_last_regenerate|i:1688410108;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('t8k5rrt14dm5dv52he520b8n9d6mo009','127.0.0.1',1689088783,_binary '__ci_last_regenerate|i:1689088783;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('tp9566ikpmmfpogcm2ver32ug8diou90','127.0.0.1',1688398720,_binary '__ci_last_regenerate|i:1688398720;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('tr7v9hrjidrsij0hadj761qatvi8qqnr','127.0.0.1',1688996994,_binary '__ci_last_regenerate|i:1688996994;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('tvoas3m7ta5gt39jn9q4kolj4putdulc','127.0.0.1',1687184173,_binary '__ci_last_regenerate|i:1687184173;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('u4bi82u58m89e21da2i7maeosjg3bc3r','127.0.0.1',1688588581,_binary '__ci_last_regenerate|i:1688588581;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('u4pmm8o3h1kfcn06kpc9rsmc2n38dlih','127.0.0.1',1688404391,_binary '__ci_last_regenerate|i:1688404391;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('u719rr72i6fls8cdu3n0bq72ouismded','127.0.0.1',1688568707,_binary '__ci_last_regenerate|i:1688568707;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('u7k1qbeprh971mce8q896sie30dum4g0','127.0.0.1',1688053038,_binary '__ci_last_regenerate|i:1688053038;'),('u95m8jor3r0bqoqtm2jdc2msg2id615a','127.0.0.1',1688134477,_binary '__ci_last_regenerate|i:1688134477;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('uba4h3j1uggokca7vqvcf2620k0o259b','127.0.0.1',1687202739,_binary '__ci_last_regenerate|i:1687202739;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('ucdtid71sc9023ferfkqkqn9jtb0jtmc','127.0.0.1',1689087368,_binary '__ci_last_regenerate|i:1689087368;'),('unjfn93s0r5mtgnd01qh3em37jmjktim','127.0.0.1',1687359956,_binary '__ci_last_regenerate|i:1687359956;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('uot4i9l11c19ql7eg7qrv7jj8up6bc06','127.0.0.1',1688580160,_binary '__ci_last_regenerate|i:1688580160;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('v1bv7kidr3fkajcunhb0apmvmhjb4eo8','127.0.0.1',1689017104,_binary '__ci_last_regenerate|i:1689017104;staff_user_id|s:1:\"1\";staff_logged_in|b:1;'),('v436i4t4hcrj3e468vsgqgqdk1so0uu0','127.0.0.1',1687378827,_binary '__ci_last_regenerate|i:1687378827;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('vdgptjgcfp1208t08qddk5k9h8leom5c','127.0.0.1',1689085207,_binary '__ci_last_regenerate|i:1689085207;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('ve1m9b3k0c5f9u4eah5kgd7khvn99tep','127.0.0.1',1687380057,_binary '__ci_last_regenerate|i:1687380057;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('vfurep5u2hia9v3h3rb81lgopum9673k','127.0.0.1',1687195349,_binary '__ci_last_regenerate|i:1687195349;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('vk24hrv0frg8t5v0sqpp66v1rtntamc3','127.0.0.1',1688473332,_binary '__ci_last_regenerate|i:1688473332;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('vkk1mvo252g1jdejfok715l8n2h1i5qe','127.0.0.1',1688572308,_binary '__ci_last_regenerate|i:1688572308;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('vl703k9jfdukju9smr3grc9s97b9qmrf','127.0.0.1',1687179791,_binary '__ci_last_regenerate|i:1687179791;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('vm7lk6v6ngu0gi8cushch6o3b1g5enev','127.0.0.1',1688491456,_binary '__ci_last_regenerate|i:1688491456;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('vou7ttddppdv1i3f356rk09ka7a7uo9e','127.0.0.1',1687208351,_binary '__ci_last_regenerate|i:1687208142;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),('vvk0ttr7tvdf3k34am9s6um3tel6eco3','127.0.0.1',1688589164,_binary '__ci_last_regenerate|i:1688589007;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";'),('vvqfrmtha21c5ipl47711lqiqppmtjml','127.0.0.1',1688561987,_binary '__ci_last_regenerate|i:1688561987;staff_user_id|s:1:\"1\";staff_logged_in|b:1;red_url|s:21:\"http://crm.localhost/\";setup-menu-open|s:0:\"\";');
/*!40000 ALTER TABLE `tblsessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblshared_customer_files`
--

DROP TABLE IF EXISTS `tblshared_customer_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblshared_customer_files` (
  `file_id` int NOT NULL,
  `contact_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblshared_customer_files`
--

LOCK TABLES `tblshared_customer_files` WRITE;
/*!40000 ALTER TABLE `tblshared_customer_files` DISABLE KEYS */;
INSERT INTO `tblshared_customer_files` VALUES (1,1);
/*!40000 ALTER TABLE `tblshared_customer_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblspam_filters`
--

DROP TABLE IF EXISTS `tblspam_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblspam_filters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `rel_type` varchar(10) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblspam_filters`
--

LOCK TABLES `tblspam_filters` WRITE;
/*!40000 ALTER TABLE `tblspam_filters` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblspam_filters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff`
--

DROP TABLE IF EXISTS `tblstaff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff` (
  `staffid` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `facebook` mediumtext,
  `linkedin` mediumtext,
  `phonenumber` varchar(30) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `datecreated` datetime NOT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `role` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `default_language` varchar(40) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `media_path_slug` varchar(191) DEFAULT NULL,
  `is_not_staff` int NOT NULL DEFAULT '0',
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `two_factor_auth_enabled` tinyint(1) DEFAULT '0',
  `two_factor_auth_code` varchar(100) DEFAULT NULL,
  `two_factor_auth_code_requested` datetime DEFAULT NULL,
  `email_signature` text,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(200) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `marital_status` varchar(25) DEFAULT NULL,
  `nation` varchar(25) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `identification` varchar(100) DEFAULT NULL,
  `days_for_identity` date DEFAULT NULL,
  `home_town` varchar(200) DEFAULT NULL,
  `resident` varchar(200) DEFAULT NULL,
  `current_address` varchar(200) DEFAULT NULL,
  `literacy` varchar(50) DEFAULT NULL,
  `orther_infor` text,
  `job_position` int DEFAULT NULL,
  `workplace` int DEFAULT NULL,
  `place_of_issue` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `name_account` varchar(50) DEFAULT NULL,
  `issue_bank` varchar(200) DEFAULT NULL,
  `records_received` longtext,
  `Personal_tax_code` varchar(50) DEFAULT NULL,
  `google_auth_secret` text,
  `team_manage` int DEFAULT '0',
  `staff_identifi` varchar(25) DEFAULT NULL,
  `status_work` varchar(100) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `saas_tenant_id` varchar(255) NOT NULL DEFAULT 'crm',
  PRIMARY KEY (`staffid`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff`
--

LOCK TABLES `tblstaff` WRITE;
/*!40000 ALTER TABLE `tblstaff` DISABLE KEYS */;
INSERT INTO `tblstaff` VALUES (1,'admin@some-domain.net','Administrador','Local',NULL,NULL,NULL,NULL,'$2a$08$cmZkKiChN.z8bvERJr4BgOOBW3cdO0diYdwFwE8IbZzA/H/vuAsLK','2023-05-22 13:08:16',NULL,'127.0.0.1','2023-07-13 08:16:09','2023-07-13 10:01:58',NULL,NULL,NULL,1,NULL,1,NULL,NULL,'administrador-local',0,0.00,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'crm'),(3,'rvj.ecv@gmail.com','Robert Alberto ','Vanegas Jiménez','','','+584127275027','','$2a$08$wBg07d5b43Jr02Q3hEhIJ..rueDwCfmqcsJAV5uOVX3VwpkyzKBqG','2022-11-01 12:39:30','Robert Vanegas Jiménez.jpg','190.97.225.122','2023-07-04 11:25:37','2023-07-04 11:25:47','2023-03-17 11:22:45',NULL,NULL,0,0,1,'','','robert-alberto-vanegas-jimenez',0,125.00,0,NULL,NULL,'','1998-11-03','Carcas','male','single','venezolana','católica','V-29.621.228','2022-09-19','','','','','',2,1,'Caracas','','','',NULL,'V-29621228-4',NULL,0,'ECV-CORP-002','working','2023-03-17','corporativo'),(5,'iterra@ecv.com.ve','Irina ','Terra Porley','','','+584122209015','','$2a$08$Wg1bbtloLpbIhmMpfW6mAeLrwuYgKWKUMvX5HzXvoOW5aHojyZwZi','2022-11-01 13:22:48','Irina.png','190.97.225.123','2023-02-02 11:52:59','2023-02-02 12:02:09',NULL,NULL,NULL,0,0,1,'','','irina-terra-porley',0,175.00,0,NULL,NULL,'',NULL,'Caracas','female','married','venezolana','católica','V-16.813.998',NULL,'','','','','',3,1,'','','','',NULL,'',NULL,0,'ECV-CORP-004','working','2022-11-29','corporativo'),(6,'cfd.ecv@gmail.com','Cristina Miranda ','Fernández De Sousa','','','+584141988526','','$2a$08$X4wi15oYNJEbL/5trjuMW.bDeb1HNdrdqfG2xw4MZoq/5Te1XH5.6','2022-11-01 13:40:06','Cristina Miranda Fernández De Sousa (2).jpg','216.24.219.138','2023-06-19 14:39:45','2023-06-19 17:43:05','2022-11-24 09:55:30','27ea470f003be0170db6403d75f8a092','2022-11-23 13:58:30',0,0,0,'','','cristina-miranda-fernandez-de-sousa',0,65.00,0,NULL,NULL,'','2000-05-08','Caracas','female','single','venezolana','católica','',NULL,'','','','','',6,0,'Caracas','','','',NULL,'',NULL,0,'ECV-CORP-005','working','2023-06-05','corporativo'),(7,'echeang@ecv.com.ve','Enrique José','Cheang Vera','','','+584122388862','','$2a$08$9SfVJEJMS1g43ME6Zo2lnuvt4Ba1dKrcGSRVA.R2yRFc9vKqM4pj.','2022-11-04 13:03:47','Enrique Cheang Vera (2).jpg',NULL,NULL,NULL,NULL,NULL,NULL,1,0,1,'','','enrique-cheang-vera',0,250.00,0,NULL,NULL,'',NULL,'','','','','','',NULL,'','','','','',0,0,'','','','',NULL,'',NULL,0,'','','2022-11-29','corporativo'),(8,'mmontilla@ecv.com.ve','Marianella','Montilla Ríos','','','+584122388808','','$2a$08$ex3BC5tarZ0tGHlo7YqzM.ONp/3SvxP35FsgZUr2vpPC4g.wingLO','2022-11-04 13:05:51','MMR.jpg','190.97.225.122','2023-06-20 11:27:39','2023-06-20 12:56:06','2023-06-20 11:26:43',NULL,NULL,1,0,1,'','','marianella-montilla-rios',0,250.00,0,NULL,NULL,'',NULL,'','','','','','',NULL,'','','','','',0,0,'','','','',NULL,'',NULL,0,'','','2023-06-20','corporativo'),(10,'corporativo@ecv.com.ve','Marisol Ornela',' Rodríguez','','','+584166121201','','$2a$08$MFTSLFZOcCV4N5WQy9XTYeC.9Ts9Tdv3m1.YZYVupjWQYDH5.qsdy','2023-02-03 11:50:31','Marisol Ornella Rodríguez (2).jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,0,1,'','','marisol-ornela-rodriguez',0,250.00,0,NULL,NULL,'Marisol Ornela Rodríguez<br />\r\nBanca y Finanzas','1973-06-28','Caracas','female','married','venezolana','católica','',NULL,'','','','','',0,0,'','','','',NULL,'',NULL,0,'ECV-CORP-007','working','2023-07-03','corporativo'),(11,'marcas@ecv.com.ve','ECV','&','MECV','MECV','234234234','MCV','$2a$08$s/DlX6VD54uz3TKrznlsj.TaIhmKPkQYnmHPyGVjfg4VC.Q3ji3We','2023-02-05 13:34:33',NULL,'190.97.225.122','2023-06-05 13:24:34','2023-06-05 13:44:11','2023-02-17 11:18:12','f63baffeff99ea4facf9d876aa1abf68','2023-02-17 08:52:52',1,0,1,'spanish','ltr','ecv',0,118.00,0,NULL,NULL,'ddawdadaw@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'marcas'),(15,'ecv.gaby@gmail.com','María Gabriela ','Origuen Pimentel','','','+584249035468','','$2a$08$hV284bttlkn9vbjiA9xc2uc7VyG6L1ch1SVTOBahMidfaGxH5mHfe','2023-02-22 16:45:29','1-DSC_7097.jpg','190.97.225.122','2023-06-12 13:17:16','2023-06-12 13:17:20',NULL,NULL,NULL,0,19,1,'','','maria-gabriela-origuen-pimentel',0,0.00,0,NULL,NULL,'María Gabriela Origuen Pimentel<br />\r\nParalegal<br />\r\nGerencia de Propiedad Intelectual','1977-04-10','Caracas','female','married','venezolana','católica','V-12.686.306',NULL,'Caracas','','Blanquita de Pérez, Vereda 4, casa N° 52, Caraballeda la Guaira','','',24,2,'Caracas','0108-0023-48-0200268607','Corriente','BBVA Provincial',NULL,'',NULL,0,'ECV-PI-011','working','2023-06-13','marcas'),(16,'patent@ecv.com.ve','Nathaly Estefani','Prasca','','','+584242950071','','$2a$08$L0D0VR5Kt2NWCuXI97wJ7ePNvE30sHxXogFx68HMmc33efbNQLBIO','2023-02-22 17:59:27','ECV_-14.jpg','190.97.225.122','2023-06-12 13:13:09','2023-06-12 13:13:28',NULL,NULL,NULL,0,19,1,'','','nathaly-estefani-prasca',0,0.00,0,NULL,NULL,'Nathaly Prasca<br />\r\nParalegal<br />\r\nGerencia de Propiedad Intelectual','1993-03-19','Caracas','female','single','venezolana','católica','V-20.304.805',NULL,'Caracas','','Palo Verde Guaicoco, Calle la Rubia, Qta San Judas Tadeo','','',24,2,'Caracas','0108-0011-53-60100202230','Corriente','BBVA Provincial',NULL,'V-20304805-6',NULL,0,'ECV-PI-013','working','2023-06-14','marcas'),(17,'ecv.osolar@gmail.com','Onasis Yaqueline','Solar Sánchez','','','+584241224844','','$2a$08$wztqkaDdE75YyTPV3a1AJ.ZzKT/IuWNTvRb1oQdB43sBJmZ1SscoO','2023-02-22 18:03:36','Onasis (2).jpg','190.97.225.122','2023-06-15 13:37:07','2023-06-15 13:39:43',NULL,NULL,NULL,0,21,1,'','','onasis-yakeline-solar-sanchez',0,0.00,0,NULL,NULL,'Onasis Solar<br />\r\nAbogado<br />\r\nGerencia de Propiedad Intelectual','1998-04-04','Caracas','female','single','venezolana','católica','V-26.022.400',NULL,'Caracas','','Calle Caracas  con Calle Argentina, Urb. El Calvario, Res. Pilín, Piso 1, Guarenas ','','',17,2,'Caracas','0191-0019-75-1019054359','Corriente','Banco Nacional de Crédito (BNC)',NULL,'V-26022400-6',NULL,0,'ECV-PI-014','working','2023-06-14','marcas'),(18,'ecv.barbarag@gmail.com','Bárbara Alejandra','González Cordero','','','+584242563513','','$2a$08$kq1N3rHFY8ktwA6FeiAQ/.5GhLF/W5wgy.rbZ7V.bTYD/hkemYH4y','2023-02-22 18:08:58','ECV_-11.jpg','190.97.225.122','2023-06-12 13:16:38','2023-06-12 13:16:43',NULL,NULL,NULL,0,21,1,'','','barbara-alejandra-gonzalez-cordero',0,0.00,0,NULL,NULL,'Bárbara A. González Cordero<br />\r\nAbogado<br />\r\nGerencia de Propiedad Intelectual','1993-10-29','Caracas','female','single','venezolana','católica','V-22.918.537',NULL,'Caracas','','Urb. La Quebradita I. Bloque 4, Piso 15, Apto 1504','','',17,2,'Caracas','0108-0002-16-0100418895','Corriente','BBVA Provincial',NULL,'V-22918537-0',NULL,0,'ECV-PI-005','working','2023-03-28','marcas'),(19,'trademark@ecv.com.ve','Amanda Isabel','Guerra León','','','+584144740321','','$2a$08$9pIBLrvZpnA6.iS0BGMIgOkYOZDWTDjnf2Vl.4IOYPDzyLmqUQ1TG','2023-02-22 18:15:06','ECV_-17.jpg','190.97.225.122','2023-06-13 15:40:46','2023-06-13 15:49:07','2023-03-28 17:40:11',NULL,NULL,0,22,1,'','','amanda-isabel-guerra-leon',0,0.00,0,NULL,NULL,'Amanda Guerra León<br />\r\nGerente de Propiedad Intelectual<br />\r\nGerencia de Propiedad Intelectual','1998-04-23','Caracas','female','single','venezolana','católica','V-25.991.357',NULL,'Caracas','','Urb. Nueva Casarapa, Sector el Alambique Edif. 6D, Guarenas Edo. Miranda ','','',10,2,'Caracas','0108-0015-35-0100194025','Corriente','BBVA Provincial',NULL,'V-25991357-4',NULL,0,'ECV-PI-006','working','2023-03-28','marcas'),(20,'mvalentinaorozco@gmail.com','Valentina','Orozco Duarte','','','+584242745402','','$2a$08$MQtGL63LG1ZIRyZSElIo/uWkOdbCBymCSnScPhxr3/FkCjr3hV2Ea','2023-02-22 18:18:26','5-DSC_7261.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,19,1,'','','maria-valentina-orozco-duarte',0,0.00,0,NULL,NULL,'Valentina Orozco Duarte<br />\r\nAsistente Legal<br />\r\nGerencia de Propiedad Intelectual','2001-08-11','Caracas','female','single','venezolana','católica','V-27.671.488',NULL,'Caracas','','Calle 10 de lo Ruices ','','',24,2,'Caracas','001751028577','Corriente','Mercantil',NULL,'',NULL,0,'ECV-PI-012','working','2023-03-28','marcas'),(21,'mmontilla@ecv.com.ve','Marianella ','Montilla Ríos','','','+584122388808','','$2a$08$M6KXEt1K3nlhp3/APzCmf.boRKMms9CVLn17ZfTLFXFMgZvbDNoJO','2023-02-22 18:21:04','2-DSC_6966.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1,25,1,'','','marianella-montilla-rios',0,0.00,0,NULL,NULL,'Marianella Montilla Ríos<br />\r\nSenior Operating Partner','1974-01-05','Valera, Trujillo','female','single','venezolana','católica','V-11.307.067',NULL,'Valera','','CALLE EL ANGEL EDIF CARABALI, TORRE A PISO 01 APT 2 URB LAS ESMERALDAS CARACAS MIRANDA ZONA POSTAL 1080','','',9,2,'Trujillo','0108-0021-81-0100179282','Corriente','BBVA Provincial',NULL,'V-11307067-2',NULL,0,'ECV-PI-008','working','2023-03-28','marcas'),(22,'echeang@ecv.com.ve','Enrique José','Cheang Vera','','','+584122388862','','$2a$08$r4wpGv1MWuKhZSDLwy9D6.ZLwDyDXvi0LWrkKmLQ/IIK/moUxVQb2','2023-02-22 18:23:25','ECV_-02.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1,24,1,'','','enrique-jose-cheang-vera',0,0.00,0,NULL,NULL,'Enrique Cheang Vera<br />\r\nSenior Managing Partner','1966-02-03','Caracas','male','single','venezolana','católica','V-6.976.602',NULL,'Caracas','','CALLE 13 CASA QUINTA LENINA URB LA BOYERA CARACAS (EL HATILLO MIRANDA ZONA POSTAL 1083','','',8,2,'Caracas','0108-0021-86-0100150845','Corriente','BBVA Provincial',NULL,'V-06976602-8',NULL,0,'ECV-PI-002','working','2023-03-28','marcas'),(23,'ecv.yennytello@gmail.com','Yenny Carolina','Tello Gamarra','','','+584242238766','','$2a$08$aI0RL32J.0mPPxvSjBURm.p85Q3kR9a3lEMQF1brA76tWGs7Rlfvi','2023-02-24 15:58:11','ECV_-09.jpg','190.97.225.122','2023-06-13 10:10:57','2023-06-13 10:17:31','2023-03-28 18:03:31',NULL,NULL,0,29,1,'','','yeny-carolina-tello-gamarra',0,0.00,0,NULL,NULL,'Yenny Tello Gamarra<br />\r\nAsistente<br />\r\nGerencia de Administración y Finanzas','1976-10-09','Caracas','female','single','venezolana','católica','V-13.564.973',NULL,'Caracas','','Parque Central','','',16,2,'Caracas','0108-0002-19-0100387329','Corriente','BBVA Provincial',NULL,'V-13564973-9',NULL,0,'ECV-PI-015','working','2023-03-28','marcas'),(24,'anarocioescalante@gmail.com','Ana Rocío','Escalante Márquez','','','+584242982111','','$2a$08$xer.61S9A5BSD8D3pm8S1uCa0bLz0V8XPfMuu6zhPkcPu0D78uaY.','2023-02-24 17:39:15','ECV_-07.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,30,1,'','','ana-rocio-escalante-marquez',0,0.00,0,NULL,NULL,'Rocío Escalante Márquez','1983-10-15','','female','single','venezolana','católica','V-15.695.055',NULL,'','','Autopista Caracas la Guaira, Barrio Tcagua Vieja, Casa N° 4-01','','',14,2,'','0108-0002-14-0100422043','Corriente','BBVA Provincial',NULL,'V-15695055-2',NULL,0,'ECV-PI-004','working','2023-03-28','marcas'),(25,'jvanmarauji7@gmail.com','Juan Miguel','Araujo Pabón','','','+584241518946','','$2a$08$ZhHch2Ppz99YbKYLWs7hluOvcCBJCZezH0gGd3rW8kjLXg.NX3hHW','2023-02-24 17:46:45','Juan.png',NULL,NULL,NULL,NULL,NULL,NULL,0,31,1,'','','juan-miguel-araujo-pabon',0,0.00,0,NULL,NULL,'Juan Araujo Pabón<br />\r\nMensajería<br />\r\nGerencia de Administración y Finanzas','1999-07-18','Caracas','male','single','venezolana','católica','V-27.784.527',NULL,'Caracas','','Calle Negro Primero Casa N°5 Capilla el Carmen, los Rosales ','','',23,2,'Caracas','0108-0015-34-0100193983','Corriente','BBVA Provincial',NULL,'',NULL,0,'ECV-PI-001','working','2023-03-28','marcas'),(26,'reinaldovl1@gmail.com','Reinaldo René','Veliz Luna','','','+584242730249','','$2a$08$4/Bh2nSimkNtG85r7exWCObfPxTdrkcwfNWfqwHBzNfZZQ1qcBQx2','2023-02-24 18:05:35','ECV_-12.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,26,1,'','','reinaldo-rene-veliz-luna',0,0.00,0,NULL,NULL,'Reinaldo Veliz Luna<br />\r\nSupervisor de Servicios Generales<br />\r\nGerencia de Administración','1981-05-05','Caracas','male','single','venezolana','católica','V-15.201.139',NULL,'Caracas','','Edi. Yocoima, Piso 1 Apto 0104, Cochecito Caracas','','',22,2,'Caracas','0108-0002-19-0100294231','Corriente','BBVA Provincial',NULL,'',NULL,0,'ECV-PI-016','working','2023-03-28','marcas'),(27,'ecv.rosam@gmail.com','Rosa Yamilet','Mora López','','','+584242744457','','$2a$08$UUjrN0kEWaY1vIOmIG9JYOPycboqQZnrCs48S8yyWAWmzwqfyWSwO','2023-02-24 18:13:49','ECV_-20.jpg',NULL,NULL,NULL,'2023-03-28 18:28:15',NULL,NULL,0,27,1,'','','rosa-yamilet-mora-lopez',0,0.00,0,NULL,NULL,'Rosa Mora López<br />\r\nAdministradora<br />\r\nGerencia de Administración y Finanzas','1984-03-26','San Cristobal','female','single','venezolana ','católica','V-17.057.443',NULL,'San Cristobal','','23 de Enero Callejón el Pino Casa N°16 ','','',21,2,'San Cristóbal','0108-0015-39-0100196869','Corriente','BBVA Provincial',NULL,'V-17057443-1',NULL,0,'ECV-PI-009','working','2023-03-28','marcas'),(28,'accounting@ecv.com.ve','Bárbara Juhany','Córdova Moreno','','','+584242744457','','$2a$08$gLViELN8H3qej03hksAFFO1FA4dTTaxusKK7jtTFYyCv4chF0nHHm','2023-02-24 18:26:44','ECV_-13.jpg','190.97.225.122','2023-06-21 09:18:21','2023-06-21 09:47:39','2023-03-28 18:34:55',NULL,NULL,0,27,1,'','','barbara-juhany-cordova-moreno',0,0.00,0,NULL,NULL,'Bárbara Córdova Moreno<br />\r\nAdministradora<br />\r\nGerencia de Administración y Finanzas','1998-12-04','Caracas','female','single','venezolana','católica','V-27.235.387',NULL,'Caracas','','Guarenas, Sector Trapichito.','','',21,2,'Caracas','0108-0001-30-1500028809','Corriente','BBVA Provincial',NULL,'V-27235387-1',NULL,0,'ECV-PI-003','working','2023-03-28','marcas'),(32,'ecv.arp@gmail.com','Angelina Rodríguez Petrillo','','','','+584241884414','','$2a$08$A2PR1DMUU.OsqfDU1qtNhuTnBRXsMkeWiJkOQS9T3TJANERs8X6/.','2023-03-14 10:48:52',NULL,'190.97.225.122','2023-07-04 11:28:07','2023-07-04 11:28:21','2023-07-04 11:27:38',NULL,NULL,0,4,1,'','','angelina-rodriguez-petrillo',0,65.00,0,NULL,NULL,'Angelina Rodríguez Petrillo<br />\r\nAsistente Legal<br />\r\nDerecho Corporativo','2003-10-15','Caracas','female','single','venezolana','católica','V-30.224.333',NULL,'Caracas','','Terrazas del Ávila','','',6,0,'Caracas','','','',NULL,'',NULL,0,'ECV-CORP-006','working','2023-07-04','corporativo'),(33,'ecv.erikal@gmail.com','Erika Maria ','Liendo Ramirez ','','','+584242460008','','$2a$08$spmEXvOcJpfYGA3j3ly.1um3PA/NyZoJHJdVlBxyaP7KLnxE.IZbW','2023-03-28 18:43:46','ECV_-10.jpg','190.97.225.122','2023-06-12 13:16:03','2023-06-12 13:16:08',NULL,NULL,NULL,0,20,1,'','','erika-maria-liendo-ramirez',0,0.00,0,NULL,NULL,'Erika Liendo<br />\r\nArchivo<br />\r\nGerencia de Propiedad Intelectual','1992-09-15','Caracas','female','single','venezolana','católica','V-23.200.534',NULL,'Caracas','','Petare Calle las Damas Casa N° 40','','',18,2,'Caracas','0108-0002-10-0100418909','Corriente','BBVA Provincial',NULL,'V-23200534-0',NULL,0,'ECV-PI-007','working','2023-04-12','marcas'),(34,'ecv.cristobal@gmail.com','Cristóbal Alberto Aladejo González','','','','+58412 048 2685 / 58 414 585 2','','$2a$08$EXGfoIOGAJlS0Sqcw/pqV.YWGT6INSDd5LT8wLt5Gvm8PnKRu1Eka','2023-03-29 12:24:18','Cristóbal Aladejo.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,0,1,'','','cristobal-alberto-aladejo-gonzalez',0,0.00,0,NULL,NULL,'Cristóbal Aladejo González<br />\r\nGerente Sucursal Valencia','1956-05-11','Valencia','male','single','venezolana','católica','V-4.678.204',NULL,'Valencia','',' CALLE CANTAURA, SECTOR LA CANDELARIA, VALENCIA, EDO. CARABOBO','','',13,3,'Valencia','0105-0040-15-40574636','Corriente','Mercantil',NULL,' V-04678204-2',NULL,0,'ECV-PI-VAL-001','working','2023-04-12','marcas'),(35,'ecv.lenys@gmail.com','Lenys Yolanda ','Serrano Iztúriz','','','+58 412 411 5680','','$2a$08$KAz3ZgV7HBCjJ/2L5NBvruH2ME0rgxIchmdfHdl60AQg1i.rB2COi','2023-03-29 12:27:32','Lenys Serrano.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,0,1,'','','lenys-yolanda-serrano-izturiz',0,0.00,0,NULL,NULL,'','1976-04-10','Valencia','female','single','veenzolana ','católica','V-12.304.738',NULL,'Valencia','',' San Diego, Los Jarales, Valencia, Edo. Carabobo','','',16,3,'Valencia',' 0108-0015-35-0100193991','Corriente','BBVA Provincial',NULL,' V-12304738-5',NULL,0,'ECV-PI-VAL-002','working','2023-04-12','marcas'),(36,'administracion@ecv.com.ve','Yoelys Andreina ','Morey González','','','+58 414 117 8917','','$2a$08$hIMrmnOEzYDkEBKKRW5R4ele5yKyZ8ffODAqHhYfn/vXZfkUPEW9.','2023-04-12 13:03:25','ECV_-22.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,28,1,'','','yoelys-andreina-morey-gonzalez',0,0.00,0,NULL,NULL,'Andreina Morey<br />\r\nLic. en Administración<br />\r\nAdministración','1986-09-19','Caracas','female','single','venezolana','católica','V-18.413.634',NULL,'Caracas','','Carretera Panamericana KM 7, Urbanización Felipe Acosta, Residencia D, piso 1, apto 7A','','',25,2,'Caracas','0108-0134-61-0200183664','Corriente','BBVA Provincial',NULL,'',NULL,0,'ECV-PI-017','maternity_leave',NULL,'marcas'),(37,'empresas@ecv.com.ve','Miguel Ángel Domínguez Franchi','','','','+584126063863','','$2a$08$hZah7WP582i.Pup3Y3d36e35ampTugaq.sqx9THA8K66IszUUalb.','2023-04-12 13:19:05','ECV_-03.jpg','190.97.225.122','2023-07-04 10:45:03','2023-07-04 10:51:18',NULL,NULL,NULL,1,25,1,'','','miguel-angel-dominguez-franchi',0,250.00,0,NULL,NULL,'Miguel A. Domínguez Franchi.<br />\r\nDerecho Corporativo.','1979-03-05','Caracas','male','single','venezolana','católica','V-13.339.139',NULL,'Caracas','','Avenida Principal del Ávila, Residencias Doravila, apto 42. El Ávila, Alta','','',9,2,'Caracas','0108-0015-33-0100199663','Corriente','BBVA Provincial',NULL,'V-13339139-4',NULL,0,'ECV-CORP-001','working','2023-04-12','marcas'),(39,'ecv.anavel@gmail.com','Anavel Haideé Suárez Rojas','','','','+584128228423','','$2a$08$Zb4m1I6sngcKUohgZP66QO8HpYLqh02GW.PJJnfL/1q0R5ra6/NJi','2023-06-21 17:02:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,21,1,'','','aanavel-haidee-suarez-rojas',0,0.00,0,NULL,NULL,'Anavel Suárez Rojas<br />\r\nAbogado<br />\r\nGerencia de Propiedad Intelectual','1981-08-14','Caracas','female','single','venezolana','católica','V-15.504.344',NULL,'Caracas','','','','',17,2,'Caracas','0108-0003-0001-0030-2167','Corriente','BBV Provincial',NULL,'V-15504344-6',NULL,0,'ECV-PI-0018','working','2023-06-21','marcas'),(40,'ecv.csa@gmail.com','César Guillermo Sánchez Aure','','','','','','$2a$08$w9Hu0.cANJ3HGgDbEzSCEOcSEIfsPhCUd3Vr2Qh26q0IZnbgiXwzm','2023-07-03 13:12:55',NULL,'190.97.225.122','2023-07-04 13:27:03','2023-07-04 13:30:39','2023-07-04 11:28:39',NULL,NULL,0,0,1,'','','cesar-guillermo-sanchez-aure',0,0.00,0,NULL,NULL,'','2004-05-21','Caracas','male','single','venezolaan','Católico','V-30.496.708',NULL,'venezolano','','Avenida Principal Las Esmeraldas, Residencias Cima Esmerald, Municipio Baruta. Caracas','','',6,0,'Caracas','','','',NULL,'',NULL,0,'ECV-CORP-008','working','2023-07-04','corporativo'),(41,'ilg.ecv@gmail.com','Isabel Cristina Locci Galarza','','','','','','$2a$08$.wm22I43HFGLkUkY.ESome4Sv584iNCPYudBjMB9iVZAg1LO7JL0i','2023-07-03 13:16:57',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,1,'','','isabel-cristina-locci-galarza',0,0.00,0,NULL,NULL,'Isabel Locci Galarza\r\nAsistente Legal\r\nDerecho Corporativo\r\nE.C.V. & Asociados Abogados\r\n\r\n\r\n','2002-04-24','Caracas','female','single','venezolana','católica','V-28.327.822',NULL,'venezolan','','Colinas de Tamanaco','','',6,0,'Caracas','','','',NULL,'',NULL,0,'ECV-CORP-009','working',NULL,'corporativo');
/*!40000 ALTER TABLE `tblstaff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_contract`
--

DROP TABLE IF EXISTS `tblstaff_contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_contract` (
  `id_contract` int unsigned NOT NULL AUTO_INCREMENT,
  `contract_code` varchar(15) NOT NULL,
  `name_contract` int NOT NULL,
  `staff` int NOT NULL,
  `contract_form` varchar(191) DEFAULT NULL,
  `start_valid` date DEFAULT NULL,
  `end_valid` date DEFAULT NULL,
  `contract_status` varchar(100) DEFAULT NULL,
  `salary_form` int DEFAULT NULL,
  `allowance_type` varchar(11) DEFAULT NULL,
  `sign_day` date DEFAULT NULL,
  `staff_delegate` int DEFAULT NULL,
  `staff_role` int DEFAULT NULL,
  PRIMARY KEY (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_contract`
--

LOCK TABLES `tblstaff_contract` WRITE;
/*!40000 ALTER TABLE `tblstaff_contract` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_contract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_contract_detail`
--

DROP TABLE IF EXISTS `tblstaff_contract_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_contract_detail` (
  `contract_detail_id` int unsigned NOT NULL AUTO_INCREMENT,
  `staff_contract_id` int unsigned NOT NULL,
  `since_date` date DEFAULT NULL,
  `contract_note` varchar(100) DEFAULT NULL,
  `contract_salary_expense` longtext,
  `contract_allowance_expense` longtext,
  PRIMARY KEY (`contract_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_contract_detail`
--

LOCK TABLES `tblstaff_contract_detail` WRITE;
/*!40000 ALTER TABLE `tblstaff_contract_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_contract_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_contracttype`
--

DROP TABLE IF EXISTS `tblstaff_contracttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_contracttype` (
  `id_contracttype` int unsigned NOT NULL AUTO_INCREMENT,
  `name_contracttype` varchar(200) NOT NULL,
  `contracttype` varchar(200) NOT NULL,
  `duration` int DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `insurance` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_contracttype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_contracttype`
--

LOCK TABLES `tblstaff_contracttype` WRITE;
/*!40000 ALTER TABLE `tblstaff_contracttype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_contracttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_departments`
--

DROP TABLE IF EXISTS `tblstaff_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_departments` (
  `staffdepartmentid` int NOT NULL AUTO_INCREMENT,
  `staffid` int NOT NULL,
  `departmentid` int NOT NULL,
  PRIMARY KEY (`staffdepartmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_departments`
--

LOCK TABLES `tblstaff_departments` WRITE;
/*!40000 ALTER TABLE `tblstaff_departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_insurance`
--

DROP TABLE IF EXISTS `tblstaff_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_insurance` (
  `insurance_id` int unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int unsigned NOT NULL,
  `insurance_book_num` varchar(100) DEFAULT NULL,
  `health_insurance_num` varchar(100) DEFAULT NULL,
  `city_code` varchar(100) DEFAULT NULL,
  `registration_medical` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`insurance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_insurance`
--

LOCK TABLES `tblstaff_insurance` WRITE;
/*!40000 ALTER TABLE `tblstaff_insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_insurance_history`
--

DROP TABLE IF EXISTS `tblstaff_insurance_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_insurance_history` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `insurance_id` int unsigned NOT NULL,
  `staff_id` int unsigned DEFAULT NULL,
  `from_month` date DEFAULT NULL,
  `formality` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `premium_rates` varchar(100) DEFAULT NULL,
  `payment_company` varchar(100) DEFAULT NULL,
  `payment_worker` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`insurance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_insurance_history`
--

LOCK TABLES `tblstaff_insurance_history` WRITE;
/*!40000 ALTER TABLE `tblstaff_insurance_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_insurance_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstaff_permissions`
--

DROP TABLE IF EXISTS `tblstaff_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstaff_permissions` (
  `staff_id` int NOT NULL,
  `feature` varchar(40) NOT NULL,
  `capability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstaff_permissions`
--

LOCK TABLES `tblstaff_permissions` WRITE;
/*!40000 ALTER TABLE `tblstaff_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstaff_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubscriptions`
--

DROP TABLE IF EXISTS `tblsubscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsubscriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text,
  `description_in_item` tinyint(1) NOT NULL DEFAULT '0',
  `clientid` int NOT NULL,
  `date` date DEFAULT NULL,
  `terms` text,
  `currency` int NOT NULL,
  `tax_id` int NOT NULL DEFAULT '0',
  `stripe_tax_id` varchar(50) DEFAULT NULL,
  `tax_id_2` int NOT NULL DEFAULT '0',
  `stripe_tax_id_2` varchar(50) DEFAULT NULL,
  `stripe_plan_id` text,
  `stripe_subscription_id` text NOT NULL,
  `next_billing_cycle` bigint DEFAULT NULL,
  `ends_at` bigint DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `project_id` int NOT NULL DEFAULT '0',
  `hash` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `created_from` int NOT NULL,
  `date_subscribed` datetime DEFAULT NULL,
  `in_test_environment` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `currency` (`currency`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubscriptions`
--

LOCK TABLES `tblsubscriptions` WRITE;
/*!40000 ALTER TABLE `tblsubscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsubscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsurveyresultsets`
--

DROP TABLE IF EXISTS `tblsurveyresultsets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsurveyresultsets` (
  `resultsetid` int NOT NULL AUTO_INCREMENT,
  `surveyid` int NOT NULL,
  `ip` varchar(40) NOT NULL,
  `useragent` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`resultsetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsurveyresultsets`
--

LOCK TABLES `tblsurveyresultsets` WRITE;
/*!40000 ALTER TABLE `tblsurveyresultsets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsurveyresultsets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsurveys`
--

DROP TABLE IF EXISTS `tblsurveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsurveys` (
  `surveyid` int NOT NULL AUTO_INCREMENT,
  `subject` mediumtext NOT NULL,
  `slug` mediumtext NOT NULL,
  `description` text NOT NULL,
  `viewdescription` text,
  `datecreated` datetime NOT NULL,
  `redirect_url` varchar(100) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `onlyforloggedin` int DEFAULT '0',
  `fromname` varchar(100) DEFAULT NULL,
  `iprestrict` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`surveyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsurveys`
--

LOCK TABLES `tblsurveys` WRITE;
/*!40000 ALTER TABLE `tblsurveys` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsurveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsurveysemailsendcron`
--

DROP TABLE IF EXISTS `tblsurveysemailsendcron`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsurveysemailsendcron` (
  `id` int NOT NULL AUTO_INCREMENT,
  `surveyid` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailid` int DEFAULT NULL,
  `listid` varchar(11) DEFAULT NULL,
  `log_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsurveysemailsendcron`
--

LOCK TABLES `tblsurveysemailsendcron` WRITE;
/*!40000 ALTER TABLE `tblsurveysemailsendcron` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsurveysemailsendcron` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsurveysendlog`
--

DROP TABLE IF EXISTS `tblsurveysendlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsurveysendlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `surveyid` int NOT NULL,
  `total` int NOT NULL,
  `date` datetime NOT NULL,
  `iscronfinished` int NOT NULL DEFAULT '0',
  `send_to_mail_lists` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsurveysendlog`
--

LOCK TABLES `tblsurveysendlog` WRITE;
/*!40000 ALTER TABLE `tblsurveysendlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsurveysendlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltaggables`
--

DROP TABLE IF EXISTS `tbltaggables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltaggables` (
  `rel_id` int NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `tag_id` int NOT NULL,
  `tag_order` int NOT NULL DEFAULT '0',
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltaggables`
--

LOCK TABLES `tbltaggables` WRITE;
/*!40000 ALTER TABLE `tbltaggables` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltaggables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltags`
--

DROP TABLE IF EXISTS `tbltags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltags`
--

LOCK TABLES `tbltags` WRITE;
/*!40000 ALTER TABLE `tbltags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltask_assigned`
--

DROP TABLE IF EXISTS `tbltask_assigned`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltask_assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staffid` int NOT NULL,
  `taskid` int NOT NULL,
  `assigned_from` int NOT NULL DEFAULT '0',
  `is_assigned_from_contact` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `taskid` (`taskid`),
  KEY `staffid` (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltask_assigned`
--

LOCK TABLES `tbltask_assigned` WRITE;
/*!40000 ALTER TABLE `tbltask_assigned` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltask_assigned` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltask_checklist_items`
--

DROP TABLE IF EXISTS `tbltask_checklist_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltask_checklist_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taskid` int NOT NULL,
  `description` text NOT NULL,
  `finished` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  `addedfrom` int NOT NULL,
  `finished_from` int DEFAULT '0',
  `list_order` int NOT NULL DEFAULT '0',
  `assigned` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taskid` (`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltask_checklist_items`
--

LOCK TABLES `tbltask_checklist_items` WRITE;
/*!40000 ALTER TABLE `tbltask_checklist_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltask_checklist_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltask_comments`
--

DROP TABLE IF EXISTS `tbltask_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltask_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `taskid` int NOT NULL,
  `staffid` int NOT NULL,
  `contact_id` int NOT NULL DEFAULT '0',
  `file_id` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `file_id` (`file_id`),
  KEY `taskid` (`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltask_comments`
--

LOCK TABLES `tbltask_comments` WRITE;
/*!40000 ALTER TABLE `tbltask_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltask_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltask_followers`
--

DROP TABLE IF EXISTS `tbltask_followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltask_followers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staffid` int NOT NULL,
  `taskid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltask_followers`
--

LOCK TABLES `tbltask_followers` WRITE;
/*!40000 ALTER TABLE `tbltask_followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltask_followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltasks`
--

DROP TABLE IF EXISTS `tbltasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `description` text,
  `priority` int DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `startdate` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `datefinished` datetime DEFAULT NULL,
  `addedfrom` int NOT NULL,
  `is_added_from_contact` tinyint(1) NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int DEFAULT NULL,
  `recurring` int NOT NULL DEFAULT '0',
  `is_recurring_from` int DEFAULT NULL,
  `cycles` int NOT NULL DEFAULT '0',
  `total_cycles` int NOT NULL DEFAULT '0',
  `custom_recurring` tinyint(1) NOT NULL DEFAULT '0',
  `last_recurring_date` date DEFAULT NULL,
  `rel_id` int DEFAULT NULL,
  `rel_type` varchar(30) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `billable` tinyint(1) NOT NULL DEFAULT '0',
  `billed` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_id` int NOT NULL DEFAULT '0',
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `milestone` int DEFAULT '0',
  `kanban_order` int DEFAULT '1',
  `milestone_order` int NOT NULL DEFAULT '0',
  `visible_to_client` tinyint(1) NOT NULL DEFAULT '0',
  `deadline_notified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `milestone` (`milestone`),
  KEY `kanban_order` (`kanban_order`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltasks`
--

LOCK TABLES `tbltasks` WRITE;
/*!40000 ALTER TABLE `tbltasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltasks_checklist_templates`
--

DROP TABLE IF EXISTS `tbltasks_checklist_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltasks_checklist_templates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltasks_checklist_templates`
--

LOCK TABLES `tbltasks_checklist_templates` WRITE;
/*!40000 ALTER TABLE `tbltasks_checklist_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltasks_checklist_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltaskstimers`
--

DROP TABLE IF EXISTS `tbltaskstimers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltaskstimers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int NOT NULL,
  `start_time` varchar(64) NOT NULL,
  `end_time` varchar(64) DEFAULT NULL,
  `staff_id` int NOT NULL,
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `note` text,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltaskstimers`
--

LOCK TABLES `tbltaskstimers` WRITE;
/*!40000 ALTER TABLE `tbltaskstimers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltaskstimers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltaxes`
--

DROP TABLE IF EXISTS `tbltaxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltaxes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltaxes`
--

LOCK TABLES `tbltaxes` WRITE;
/*!40000 ALTER TABLE `tbltaxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltaxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltemplates`
--

DROP TABLE IF EXISTS `tbltemplates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltemplates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `addedfrom` int NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltemplates`
--

LOCK TABLES `tbltemplates` WRITE;
/*!40000 ALTER TABLE `tbltemplates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltemplates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblticket_attachments`
--

DROP TABLE IF EXISTS `tblticket_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblticket_attachments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ticketid` int NOT NULL,
  `replyid` int DEFAULT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblticket_attachments`
--

LOCK TABLES `tblticket_attachments` WRITE;
/*!40000 ALTER TABLE `tblticket_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblticket_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblticket_replies`
--

DROP TABLE IF EXISTS `tblticket_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblticket_replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ticketid` int NOT NULL,
  `userid` int DEFAULT NULL,
  `contactid` int NOT NULL DEFAULT '0',
  `name` text,
  `email` text,
  `date` datetime NOT NULL,
  `message` text,
  `attachment` int DEFAULT NULL,
  `admin` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblticket_replies`
--

LOCK TABLES `tblticket_replies` WRITE;
/*!40000 ALTER TABLE `tblticket_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblticket_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltickets`
--

DROP TABLE IF EXISTS `tbltickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltickets` (
  `ticketid` int NOT NULL AUTO_INCREMENT,
  `adminreplying` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL,
  `contactid` int NOT NULL DEFAULT '0',
  `merged_ticket_id` int DEFAULT NULL,
  `email` text,
  `name` text,
  `department` int NOT NULL,
  `priority` int NOT NULL,
  `status` int NOT NULL,
  `service` int DEFAULT NULL,
  `ticketkey` varchar(32) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text,
  `admin` int DEFAULT NULL,
  `date` datetime NOT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `lastreply` datetime DEFAULT NULL,
  `clientread` int NOT NULL DEFAULT '0',
  `adminread` int NOT NULL DEFAULT '0',
  `assigned` int NOT NULL DEFAULT '0',
  `staff_id_replying` int DEFAULT NULL,
  `cc` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`ticketid`),
  KEY `service` (`service`),
  KEY `department` (`department`),
  KEY `status` (`status`),
  KEY `userid` (`userid`),
  KEY `priority` (`priority`),
  KEY `project_id` (`project_id`),
  KEY `contactid` (`contactid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltickets`
--

LOCK TABLES `tbltickets` WRITE;
/*!40000 ALTER TABLE `tbltickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltickets_pipe_log`
--

DROP TABLE IF EXISTS `tbltickets_pipe_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltickets_pipe_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `email_to` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltickets_pipe_log`
--

LOCK TABLES `tbltickets_pipe_log` WRITE;
/*!40000 ALTER TABLE `tbltickets_pipe_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltickets_pipe_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltickets_predefined_replies`
--

DROP TABLE IF EXISTS `tbltickets_predefined_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltickets_predefined_replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltickets_predefined_replies`
--

LOCK TABLES `tbltickets_predefined_replies` WRITE;
/*!40000 ALTER TABLE `tbltickets_predefined_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltickets_predefined_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltickets_priorities`
--

DROP TABLE IF EXISTS `tbltickets_priorities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltickets_priorities` (
  `priorityid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`priorityid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltickets_priorities`
--

LOCK TABLES `tbltickets_priorities` WRITE;
/*!40000 ALTER TABLE `tbltickets_priorities` DISABLE KEYS */;
INSERT INTO `tbltickets_priorities` VALUES (1,'Low'),(2,'Medium'),(3,'High');
/*!40000 ALTER TABLE `tbltickets_priorities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltickets_status`
--

DROP TABLE IF EXISTS `tbltickets_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltickets_status` (
  `ticketstatusid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `isdefault` int NOT NULL DEFAULT '0',
  `statuscolor` varchar(7) DEFAULT NULL,
  `statusorder` int DEFAULT NULL,
  PRIMARY KEY (`ticketstatusid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltickets_status`
--

LOCK TABLES `tbltickets_status` WRITE;
/*!40000 ALTER TABLE `tbltickets_status` DISABLE KEYS */;
INSERT INTO `tbltickets_status` VALUES (1,'Open',1,'#ff2d42',1),(2,'In progress',1,'#22c55e',2),(3,'Answered',1,'#2563eb',3),(4,'On Hold',1,'#64748b',4),(5,'Closed',1,'#03a9f4',5);
/*!40000 ALTER TABLE `tbltickets_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltodos`
--

DROP TABLE IF EXISTS `tbltodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltodos` (
  `todoid` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `staffid` int NOT NULL,
  `dateadded` datetime NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `datefinished` datetime DEFAULT NULL,
  `item_order` int DEFAULT NULL,
  PRIMARY KEY (`todoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltodos`
--

LOCK TABLES `tbltodos` WRITE;
/*!40000 ALTER TABLE `tbltodos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltracked_mails`
--

DROP TABLE IF EXISTS `tbltracked_mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltracked_mails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(32) NOT NULL,
  `rel_id` int NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `date_opened` datetime DEFAULT NULL,
  `subject` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltracked_mails`
--

LOCK TABLES `tbltracked_mails` WRITE;
/*!40000 ALTER TABLE `tbltracked_mails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltracked_mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltwocheckout_log`
--

DROP TABLE IF EXISTS `tbltwocheckout_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltwocheckout_log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `reference` varchar(64) NOT NULL,
  `invoice_id` int NOT NULL,
  `amount` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `tbltwocheckout_log_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `tblinvoices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltwocheckout_log`
--

LOCK TABLES `tbltwocheckout_log` WRITE;
/*!40000 ALTER TABLE `tbltwocheckout_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltwocheckout_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser_auto_login`
--

DROP TABLE IF EXISTS `tbluser_auto_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser_auto_login` (
  `key_id` char(32) NOT NULL,
  `user_id` int NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser_auto_login`
--

LOCK TABLES `tbluser_auto_login` WRITE;
/*!40000 ALTER TABLE `tbluser_auto_login` DISABLE KEYS */;
INSERT INTO `tbluser_auto_login` VALUES ('01c4bf456b840319a314526968e0f812',1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0','127.0.0.1','2023-05-22 13:10:06',1),('67835383927b481adea77bbb441dbbb8',1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0','127.0.0.1','2023-06-12 20:20:53',1),('97e73c9a2d3ff43f446b6ce10ab51d8c',1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0','127.0.0.1','2023-06-14 13:41:54',1),('f3809edf569cdb8960d4ba906a72f3e4',1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.67','::1','2023-07-05 12:36:58',0),('2ffc0ead92f252f21c72d8810950fc20',1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0','127.0.0.1','2023-07-06 12:15:12',1);
/*!40000 ALTER TABLE `tbluser_auto_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser_meta`
--

DROP TABLE IF EXISTS `tbluser_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser_meta` (
  `umeta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL DEFAULT '0',
  `client_id` bigint unsigned NOT NULL DEFAULT '0',
  `contact_id` bigint unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(191) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser_meta`
--

LOCK TABLES `tbluser_meta` WRITE;
/*!40000 ALTER TABLE `tbluser_meta` DISABLE KEYS */;
INSERT INTO `tbluser_meta` VALUES (1,0,0,1,'consent_key','8b7fd75522a8c4007b6453e3af3866f6-98cde13bd9050208125c3882b7a0e3b9');
/*!40000 ALTER TABLE `tbluser_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblvault`
--

DROP TABLE IF EXISTS `tblvault`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblvault` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `server_address` varchar(191) NOT NULL,
  `port` int DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `description` text,
  `creator` int NOT NULL,
  `creator_name` varchar(100) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `share_in_projects` tinyint(1) NOT NULL DEFAULT '0',
  `last_updated` datetime DEFAULT NULL,
  `last_updated_from` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblvault`
--

LOCK TABLES `tblvault` WRITE;
/*!40000 ALTER TABLE `tblvault` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblvault` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblviews_tracking`
--

DROP TABLE IF EXISTS `tblviews_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblviews_tracking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rel_id` int NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `view_ip` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblviews_tracking`
--

LOCK TABLES `tblviews_tracking` WRITE;
/*!40000 ALTER TABLE `tblviews_tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblviews_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblweb_to_lead`
--

DROP TABLE IF EXISTS `tblweb_to_lead`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblweb_to_lead` (
  `id` int NOT NULL AUTO_INCREMENT,
  `form_key` varchar(32) NOT NULL,
  `lead_source` int NOT NULL,
  `lead_status` int NOT NULL,
  `notify_lead_imported` int NOT NULL DEFAULT '1',
  `notify_type` varchar(20) DEFAULT NULL,
  `notify_ids` mediumtext,
  `responsible` int NOT NULL DEFAULT '0',
  `name` varchar(191) NOT NULL,
  `form_data` mediumtext,
  `recaptcha` int NOT NULL DEFAULT '0',
  `submit_btn_name` varchar(40) DEFAULT NULL,
  `submit_btn_text_color` varchar(10) DEFAULT '#ffffff',
  `submit_btn_bg_color` varchar(10) DEFAULT '#84c529',
  `success_submit_msg` text,
  `submit_action` int DEFAULT '0',
  `lead_name_prefix` varchar(255) DEFAULT NULL,
  `submit_redirect_url` mediumtext,
  `language` varchar(40) DEFAULT NULL,
  `allow_duplicate` int NOT NULL DEFAULT '1',
  `mark_public` int NOT NULL DEFAULT '0',
  `track_duplicate_field` varchar(20) DEFAULT NULL,
  `track_duplicate_field_and` varchar(20) DEFAULT NULL,
  `create_task_on_duplicate` int NOT NULL DEFAULT '0',
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblweb_to_lead`
--

LOCK TABLES `tblweb_to_lead` WRITE;
/*!40000 ALTER TABLE `tblweb_to_lead` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblweb_to_lead` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblwork_shift`
--

DROP TABLE IF EXISTS `tblwork_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblwork_shift` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shift_code` varchar(45) NOT NULL,
  `shift_name` varchar(200) NOT NULL,
  `shift_type` varchar(200) NOT NULL,
  `department` int DEFAULT '0',
  `position` int DEFAULT '0',
  `add_from` int NOT NULL,
  `date_create` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `shifts_detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblwork_shift`
--

LOCK TABLES `tblwork_shift` WRITE;
/*!40000 ALTER TABLE `tblwork_shift` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblwork_shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblworkplace`
--

DROP TABLE IF EXISTS `tblworkplace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblworkplace` (
  `workplace_id` int unsigned NOT NULL AUTO_INCREMENT,
  `workplace_name` varchar(200) NOT NULL,
  PRIMARY KEY (`workplace_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblworkplace`
--

LOCK TABLES `tblworkplace` WRITE;
/*!40000 ALTER TABLE `tblworkplace` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblworkplace` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-13 10:03:21
