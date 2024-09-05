<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Init_model extends App_Model
{
    /**
     * Class to initializate the schema
     */
    protected $primaryKey = '';
    protected $tableName = '';
    protected $DBgroup = '';

    public function initializate()
    {
        $this->db->query(
           "
           CREATE TABLE registros_grupos (
                           grupo_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (grupo_id)
           );
           
           ALTER TABLE registros_grupos COMMENT 'Tabla de almacenaje de los grupos';
           
           
           CREATE TABLE expediente (
                           exp_id INT AUTO_INCREMENT NOT NULL,
                           solicitud VARCHAR(255) NOT NULL,
                           fecha_solicitud DATE NOT NULL,
                           registro VARCHAR(255) NOT NULL,
                           fecha_registro DATE NOT NULL,
                           certificado VARCHAR(255) NOT NULL,
                           fecha_emision_certificado DATE NOT NULL,
                           fecha_vencimiento_certificado DATE NOT NULL,
                           PRIMARY KEY (exp_id)
           );
           
           ALTER TABLE expediente COMMENT 'Tabla de almacenamiento de Expedientes';
           
           
           CREATE TABLE acciones_terceros_expedientes (
                           acc_ter_id INT AUTO_INCREMENT NOT NULL,
                           ref_interna VARCHAR(255) NOT NULL,
                           ref_cliente VARCHAR(255) NOT NULL,
                           comentarios VARCHAR(4096) NOT NULL,
                           exp_id INT NOT NULL,
                           PRIMARY KEY (acc_ter_id)
           );
           
           ALTER TABLE acciones_terceros_expedientes COMMENT 'Tabla de almacenaje de los expedientes de terceros';
           
           
           CREATE TABLE materias (
                           materia_id INT AUTO_INCREMENT NOT NULL,
                           descripcion VARCHAR(255) NOT NULL,
                           PRIMARY KEY (materia_id)
           );
           
           ALTER TABLE materias COMMENT 'Tabla maestra de las materias';
           
           
           CREATE TABLE servicios (
                           codigo INT AUTO_INCREMENT NOT NULL,
                           materia_servicios INT NOT NULL,
                           created_by INT NOT NULL,
                           descripcion VARCHAR(255) NOT NULL,
                           created_at DATETIME NOT NULL,
                           modified_at DATETIME NOT NULL,
                           PRIMARY KEY (codigo)
           );
           
           ALTER TABLE servicios COMMENT 'Tabla de almacenaje de los servicios';
           
           ALTER TABLE servicios MODIFY COLUMN created_by INTEGER COMMENT 'FK with staff_id';
           
           
           CREATE TABLE estados (
                           estado_id INT AUTO_INCREMENT NOT NULL,
                           tipo_materia INT NOT NULL,
                           descripcion VARCHAR(255) NOT NULL,
                           created_at DATE NOT NULL,
                           last_modified DATE NOT NULL,
                           created_by INT NOT NULL,
                           PRIMARY KEY (estado_id)
           );
           
           ALTER TABLE estados COMMENT 'Tabla maestra de estados';
           
           ALTER TABLE estados MODIFY COLUMN created_by INTEGER COMMENT 'FK to staff_id';
           
           
           CREATE TABLE tipos_patentes (
                           tip_pat_id INT AUTO_INCREMENT NOT NULL,
                           nombre_tipo VARCHAR(255) NOT NULL,
                           PRIMARY KEY (tip_pat_id)
           );
           
           ALTER TABLE tipos_patentes COMMENT 'Tabla maestra de tipos de patentes';
           
           
           CREATE TABLE documentos (
                           doc_id INT AUTO_INCREMENT NOT NULL,
                           doc_hash VARCHAR(64) NOT NULL,
                           path VARCHAR(4096) NOT NULL,
                           descripcion VARCHAR(512) NOT NULL,
                           comentarios VARCHAR(4096) NOT NULL,
                           created_at DATE NOT NULL,
                           created_by INT NOT NULL,
                           PRIMARY KEY (doc_id)
           );
           
           ALTER TABLE documentos COMMENT 'Tabla de almacenaje de rutas de documentos';
           
           ALTER TABLE documentos MODIFY COLUMN doc_hash VARCHAR(64) COMMENT 'Must be sha256 or sha512';
           
           ALTER TABLE documentos MODIFY COLUMN created_by INTEGER COMMENT 'FK with Staff member';
           
           
           CREATE TABLE tipo_anexo (
                           tip_ax_id INT AUTO_INCREMENT NOT NULL,
                           nombre_anexo VARCHAR(255) NOT NULL,
                           PRIMARY KEY (tip_ax_id)
           );
           
           ALTER TABLE tipo_anexo COMMENT 'Tabla con los tipos de anexos';
           
           
           CREATE TABLE part_id (
                           tipo_part_id INT AUTO_INCREMENT NOT NULL,
                           nombre_tipo VARCHAR(255) NOT NULL,
                           anexo_tipo INT NOT NULL,
                           PRIMARY KEY (tipo_part_id)
           );
           
           ALTER TABLE part_id COMMENT 'Tabla de almacenamiento de los tipos de participacion';
           
           
           CREATE TABLE oficinas (
                           oficina_id INT NOT NULL,
                           direccion VARCHAR(512) NOT NULL,
                           PRIMARY KEY (oficina_id)
           );
           
           ALTER TABLE oficinas COMMENT 'Tabla de almacenamiento de Oficinas';
           
           
           CREATE TABLE registros (
                           reg_num INT NOT NULL,
                           staff_id INT NOT NULL,
                           client_id INT NOT NULL,
                           oficina INT NOT NULL,
                           ref_interna VARCHAR(255) NOT NULL,
                           ref_cliente VARCHAR(255) NOT NULL,
                           carpeta VARCHAR(4096) NOT NULL,
                           libro INT NOT NULL,
                           tomo INT NOT NULL,
                           folio INT NOT NULL,
                           comentarios VARCHAR(4096) NOT NULL,
                           PRIMARY KEY (reg_num)
           );
           
           ALTER TABLE registros COMMENT 'Tabla de almacenaje de los elementos basicos de las solicitudes';
           
           ALTER TABLE registros MODIFY COLUMN staff_id INTEGER COMMENT 'FK to staff_id';
           
           ALTER TABLE registros MODIFY COLUMN client_id INTEGER COMMENT 'FK with Client_id';
           
           
           CREATE TABLE contacto_registro (
                           con_reg_id INT AUTO_INCREMENT NOT NULL,
                           num_reg INT NOT NULL,
                           client_id INT NOT NULL,
                           contact_id VARCHAR(255) NOT NULL,
                           PRIMARY KEY (con_reg_id)
           );
           
           ALTER TABLE contacto_registro COMMENT 'Tabla de almacenaje de los contactos de los clientes en los registros';
           
           
           CREATE TABLE oficinas_contactos (
                           ofi_cont_id INT AUTO_INCREMENT NOT NULL,
                           oficina INT NOT NULL,
                           contact_id INT NOT NULL,
                           PRIMARY KEY (ofi_cont_id)
           );
           
           ALTER TABLE oficinas_contactos COMMENT 'Tabla de almacenamiento de contactos de oficinas';
           
           
           CREATE TABLE estados_solicitudes (
                           cod_estado INT AUTO_INCREMENT NOT NULL,
                           descripcion VARCHAR(4096),
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (cod_estado)
           );
           
           ALTER TABLE estados_solicitudes COMMENT 'Tabla maestra de estados de solicitudes';
           
           
           CREATE TABLE anexos (
                           nro_anexo INT AUTO_INCREMENT NOT NULL,
                           customer_id INT NOT NULL,
                           oficina_gestora INT NOT NULL,
                           fecha_resolucion DATE NOT NULL,
                           nro_resolucion INT NOT NULL,
                           estado_exp INT NOT NULL,
                           PRIMARY KEY (nro_anexo)
           );
           
           ALTER TABLE anexos COMMENT 'Tabla de almacenamiento de los anexos de las solicitudes y patentes';
           
           
           CREATE TABLE anexo_participante (
                           ax_part_id INT AUTO_INCREMENT NOT NULL,
                           anexo_id INT NOT NULL,
                           nombre_participante VARCHAR(255) NOT NULL,
                           tipo_participacion INT NOT NULL,
                           PRIMARY KEY (ax_part_id)
           );
           
           ALTER TABLE anexo_participante COMMENT 'Tabla de participantes en los anexos';
           
           
           CREATE TABLE tipo_evento (
                           tipo_eve_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           tipo_materia INT NOT NULL,
                           created_at DATE NOT NULL,
                           modified_at DATE NOT NULL,
                           created_by INT NOT NULL,
                           PRIMARY KEY (tipo_eve_id)
           );
           
           ALTER TABLE tipo_evento COMMENT 'Tabla maestra  de eventos';
           
           ALTER TABLE tipo_evento MODIFY COLUMN created_by INTEGER COMMENT 'FK with staff_id';
           
           
           CREATE TABLE eventos (
                           eve_id INT AUTO_INCREMENT NOT NULL,
                           tipo_evento INT NOT NULL,
                           created_at DATE NOT NULL,
                           created_by INT NOT NULL,
                           PRIMARY KEY (eve_id)
           );
           
           ALTER TABLE eventos COMMENT 'Tabla de almacenaje de eventos';
           
           ALTER TABLE eventos MODIFY COLUMN created_by INTEGER COMMENT 'FK with Staff_id';
           
           
           CREATE TABLE tipo_publicacion (
                           tipo_pub_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (tipo_pub_id)
           );
           
           ALTER TABLE tipo_publicacion COMMENT 'Tabla maestra de tipo de publicacion';
           
           
           CREATE TABLE tipo_solicitud (
                           tipo_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (tipo_id)
           );
           
           ALTER TABLE tipo_solicitud COMMENT 'Tabla Maestra de tipo de solicitudes';
           
           
           CREATE TABLE solicitantes (
                           solicit_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (solicit_id)
           );
           
           ALTER TABLE solicitantes COMMENT 'Tabla de almacenamiento de los solicitantes';
           
           
           CREATE TABLE tipos_signos (
                           tipos_signos INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (tipos_signos)
           );
           
           ALTER TABLE tipos_signos COMMENT 'Tabla maestra de los tipos de signos';
           
           
           CREATE TABLE marcas_solicitudes (
                           solicitud_id INT AUTO_INCREMENT NOT NULL,
                           reg_num INT NOT NULL,
                           tipo_solicitud INT NOT NULL,
                           est_solicitud INT NOT NULL,
                           tipo_solicitud_1 INT NOT NULL,
                           primer_uso DATE NOT NULL,
                           prueba_uso DATE NOT NULL,
                           carpeta VARCHAR(255) NOT NULL,
                           numero_solicitud VARCHAR(255) NOT NULL,
                           fecha_solicitud DATE NOT NULL,
                           fecha_registro DATE,
                           fecha_certificado DATE,
                           num_certificado VARCHAR(255) NOT NULL,
                           fecha_vencimiento DATE NOT NULL,
                           PRIMARY KEY (solicitud_id)
           );
           
           ALTER TABLE marcas_solicitudes COMMENT 'Tabla de almacenamiento de las solicitudes';
           
           
           CREATE TABLE anexos_solicitudes (
                           anx_sol_id INT AUTO_INCREMENT NOT NULL,
                           nro_solicitud INT NOT NULL,
                           num_anexo INT NOT NULL,
                           PRIMARY KEY (anx_sol_id)
           );
           
           ALTER TABLE anexos_solicitudes COMMENT 'Tabla de union entre solicitudes y los anexos';
           
           
           CREATE TABLE solicitudes_eventos (
                           sol_eve_id INT AUTO_INCREMENT NOT NULL,
                           evento_sol INT NOT NULL,
                           nro_solicitud INT NOT NULL,
                           PRIMARY KEY (sol_eve_id)
           );
           
           ALTER TABLE solicitudes_eventos COMMENT 'Tabla de registro de los eventos en las solicitudes';
           
           
           CREATE TABLE marcas_expedientes (
                           mar_exp_id INT AUTO_INCREMENT NOT NULL,
                           exp_id INT NOT NULL,
                           nro_solicitud INT NOT NULL,
                           PRIMARY KEY (mar_exp_id)
           );
           
           ALTER TABLE marcas_expedientes COMMENT 'Tabla de expedientes de marcas';
           
           
           CREATE TABLE marcas_solicitantes (
                           mar_sol_id INT AUTO_INCREMENT NOT NULL,
                           marca INT NOT NULL,
                           solicitante INT NOT NULL,
                           PRIMARY KEY (mar_sol_id)
           );
           
           ALTER TABLE marcas_solicitantes COMMENT 'Tabla de marcas de solicitantes';
           
           
           CREATE TABLE doc_solicitud (
                           doc_sol_id INT AUTO_INCREMENT NOT NULL,
                           nro_solicitud INT NOT NULL,
                           nro_documento INT NOT NULL,
                           PRIMARY KEY (doc_sol_id)
           );
           
           ALTER TABLE doc_solicitud COMMENT 'Tabla de almacenamiento de documentos de solicitudes';
           
           
           CREATE TABLE signos_solicitud (
                           signos_solicitud_id INT AUTO_INCREMENT NOT NULL,
                           tipo_solicitud_id INT NOT NULL,
                           tipo_signo INT NOT NULL,
                           descripcion VARCHAR(4096) NOT NULL,
                           clasificacion VARCHAR(255) NOT NULL,
                           PRIMARY KEY (signos_solicitud_id)
           );
           
           ALTER TABLE signos_solicitud COMMENT 'Tabla de almacenamiento de signos';
           
           
           CREATE TABLE paises (
                           pais_id INT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (pais_id)
           );
           
           ALTER TABLE paises COMMENT 'Tabla maestra de paises';
           
           
           CREATE TABLE registros_sanitarios (
                           reg_san_id INT AUTO_INCREMENT NOT NULL,
                           num_reg INT NOT NULL,
                           staff_id INT NOT NULL,
                           pais_reg INT NOT NULL,
                           grupo_registro INT NOT NULL,
                           PRIMARY KEY (reg_san_id)
           );
           
           ALTER TABLE registros_sanitarios COMMENT 'Tabla de almacenaje de los registros sanitarios';
           
           
           CREATE TABLE patentes_inventores (
                           inventor_id INT AUTO_INCREMENT NOT NULL,
                           pais_inventor INT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           apellid VARCHAR(255) NOT NULL,
                           direccion VARCHAR(4096) NOT NULL,
                           PRIMARY KEY (inventor_id)
           );
           
           ALTER TABLE patentes_inventores COMMENT 'Tabla maestra de inventores';
           
           
           CREATE TABLE solicitud_patentes (
                           sol_pat_id INT AUTO_INCREMENT NOT NULL,
                           tipo_patente INT NOT NULL,
                           pais_pat INT NOT NULL,
                           titulo VARCHAR(255) NOT NULL,
                           descripcion VARCHAR(4096) NOT NULL,
                           clasificacion VARCHAR(255) NOT NULL,
                           reg_num INT NOT NULL,
                           PRIMARY KEY (sol_pat_id)
           );
           
           ALTER TABLE solicitud_patentes COMMENT 'Tabla de solicitudes de patentes';
           
           
           CREATE TABLE doc_patentes (
                           doc_pat_id INT AUTO_INCREMENT NOT NULL,
                           nro_doc INT NOT NULL,
                           nro_patente INT NOT NULL,
                           PRIMARY KEY (doc_pat_id)
           );
           
           ALTER TABLE doc_patentes COMMENT 'Tabla de union de documentos y las patentes';
           
           
           CREATE TABLE anexos_patentes (
                           anx_pat_id INT AUTO_INCREMENT NOT NULL,
                           num_anexo INT NOT NULL,
                           nro_patente INT NOT NULL,
                           PRIMARY KEY (anx_pat_id)
           );
           
           ALTER TABLE anexos_patentes COMMENT 'Tabla de union entre los anexos y las patentes';
           
           
           CREATE TABLE patentes_eventos (
                           eve_pat_id INT AUTO_INCREMENT NOT NULL,
                           evento_id INT NOT NULL,
                           pat_evento INT NOT NULL,
                           PRIMARY KEY (eve_pat_id)
           );
           
           ALTER TABLE patentes_eventos COMMENT 'Tabla de almacenaje de los eventos de patentes';
           
           
           CREATE TABLE patentes_expediente (
                           pat_exp_id INT AUTO_INCREMENT NOT NULL,
                           exp_id INT NOT NULL,
                           sol_pat_id INT NOT NULL,
                           nro_soli_pat VARCHAR(255) NOT NULL,
                           fecha_solicitud DATE NOT NULL,
                           nro_publicacion VARCHAR(255) NOT NULL,
                           fecha_publicacion DATE NOT NULL,
                           PRIMARY KEY (pat_exp_id)
           );
           
           ALTER TABLE patentes_expediente COMMENT 'Tabla de almacenaje de los expedientes';
           
           ALTER TABLE patentes_expediente MODIFY COLUMN nro_soli_pat VARCHAR(255) COMMENT 'Nro solicitud SAPI';
           
           
           CREATE TABLE patentes_prioridad (
                           pri_pat_id INT AUTO_INCREMENT NOT NULL,
                           nro_sol_pat INT NOT NULL,
                           fecha DATE NOT NULL,
                           pais_id INT NOT NULL,
                           PRIMARY KEY (pri_pat_id)
           );
           
           ALTER TABLE patentes_prioridad COMMENT 'Tabla de almacenamiento de las prioridades de patentes';
           
           
           CREATE TABLE patentes_solicitantes (
                           pat_solic_id INT AUTO_INCREMENT NOT NULL,
                           patente INT NOT NULL,
                           solicitud INT NOT NULL,
                           PRIMARY KEY (pat_solic_id)
           );
           
           ALTER TABLE patentes_solicitantes COMMENT 'Tabla de almacenamiento de los solicitantes de patentes';
           
           
           CREATE TABLE paises_designados (
                           pais_design_id INT AUTO_INCREMENT NOT NULL,
                           solicitud_nro INT NOT NULL,
                           pais_designado INT NOT NULL,
                           PRIMARY KEY (pais_design_id)
           );
           
           ALTER TABLE paises_designados COMMENT 'tabla de paises designados';
           
           
           CREATE TABLE boletines (
                           boletin_id INT AUTO_INCREMENT NOT NULL,
                           fecha_publicacion DATE NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           pais_boletin INT NOT NULL,
                           PRIMARY KEY (boletin_id)
           );
           
           ALTER TABLE boletines COMMENT 'tabla de almacenamiento de boletines';
           
           
           CREATE TABLE patentes_publicaciones (
                           pat_pub_id INT AUTO_INCREMENT NOT NULL,
                           tipo_pub_id INT NOT NULL,
                           boletin_id INT NOT NULL,
                           tomo INT NOT NULL,
                           pagina INT NOT NULL,
                           nro_patente INT NOT NULL,
                           PRIMARY KEY (pat_pub_id)
           );
           
           ALTER TABLE patentes_publicaciones COMMENT 'Tabla de almacenamiento de las publicaciones de patentes.';
           
           
           CREATE TABLE marcas_publicaciones (
                           pub_id INT AUTO_INCREMENT NOT NULL,
                           boletin_publicacion INT NOT NULL,
                           tomo VARCHAR(255) NOT NULL,
                           pagina VARCHAR(255) NOT NULL,
                           tipo_publicacion INT NOT NULL,
                           nro_solicitud INT NOT NULL,
                           PRIMARY KEY (pub_id)
           );
           
           ALTER TABLE marcas_publicaciones COMMENT 'Tabla de manejo de publicaciones';
           
           
           CREATE TABLE marcas_prioridad (
                           prioridad_id INT AUTO_INCREMENT NOT NULL,
                           pais_prioridad INT NOT NULL,
                           num_prioridad VARCHAR(255) NOT NULL,
                           fecha_prioridad DATE NOT NULL,
                           prioridad_solicitud INT NOT NULL,
                           PRIMARY KEY (prioridad_id)
           );
           
           ALTER TABLE marcas_prioridad COMMENT 'tabla de prioridad de la solicitud de marcas';
           
           
           CREATE TABLE tipo_busqueda (
                           tipo_busq_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (tipo_busq_id)
           );
           
           ALTER TABLE tipo_busqueda COMMENT 'Tabla maestra de los tipo de busqueda';
           
           
           CREATE TABLE clasNiza (
                           niza_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           PRIMARY KEY (niza_id)
           );
           
           ALTER TABLE clasNiza COMMENT 'Tabla de almacenamiento de las clases de niza';
           
           
           CREATE TABLE solicitudes_clases (
                           sol_cla_id INT AUTO_INCREMENT NOT NULL,
                           nro_solicitud INT NOT NULL,
                           clase_niza INT NOT NULL,
                           PRIMARY KEY (sol_cla_id)
           );
           
           ALTER TABLE solicitudes_clases COMMENT 'Tabla de almacenamiento de las clases de niza en las solicitudes';
           
           
           CREATE TABLE niza_productos (
                           prod_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           clase_niza INT NOT NULL,
                           PRIMARY KEY (prod_id)
           );
           
           ALTER TABLE niza_productos COMMENT 'Tabla de productos permitidos por la clase niza';
           
           
           CREATE TABLE marcas (
                           marca_id INT AUTO_INCREMENT NOT NULL,
                           nombre VARCHAR(255) NOT NULL,
                           clase_niza INT NOT NULL,
                           PRIMARY KEY (marca_id)
           );
           
           ALTER TABLE marcas COMMENT 'Tabla de marcas';
           
           
           CREATE TABLE registros_solicitantes (
                           reg_sol_id INT AUTO_INCREMENT NOT NULL,
                           nro_reg_sol INT NOT NULL,
                           fabricante_pais INT NOT NULL,
                           marca_producto INT NOT NULL,
                           client_id INT NOT NULL,
                           fabricante_nombre VARCHAR(255) NOT NULL,
                           fabricante_ciudad VARCHAR(255) NOT NULL,
                           fecha_orden_muestra DATE NOT NULL,
                           fecha_presentacion_muestra DATE NOT NULL,
                           comentarios VARCHAR(4096) NOT NULL,
                           PRIMARY KEY (reg_sol_id)
           );
           
           ALTER TABLE registros_solicitantes COMMENT 'Tabla de almacenamiento de los registros de los solicitantes';
           
           ALTER TABLE registros_solicitantes MODIFY COLUMN client_id INTEGER COMMENT 'FK to client_id';
           
           
           CREATE TABLE documentos_registros (
                           doc_reg_id INT AUTO_INCREMENT NOT NULL,
                           nro_reg INT NOT NULL,
                           nro_doc INT NOT NULL,
                           PRIMARY KEY (doc_reg_id)
           );
           
           ALTER TABLE documentos_registros COMMENT 'Tabla de registros de los documentos';
           
           
           CREATE TABLE registros_eventos (
                           reg_eve_id INT AUTO_INCREMENT NOT NULL,
                           reg_sol INT NOT NULL,
                           eve_reg INT NOT NULL,
                           PRIMARY KEY (reg_eve_id)
           );
           
           ALTER TABLE registros_eventos COMMENT 'Tabla de almacenamiento de eventos de los registros sanitarios';
           
           
           CREATE TABLE expedientes_registros (
                           exp_reg_id INT AUTO_INCREMENT NOT NULL,
                           reg_sol_id INT NOT NULL,
                           nro_exp INT NOT NULL,
                           PRIMARY KEY (exp_reg_id)
           );
           
           ALTER TABLE expedientes_registros COMMENT 'Tabla de almacenaje de los expedientes de los registros';
           
           
           CREATE TABLE accion_id (
                           accion_id INT NOT NULL,
                           tipo_solicitud INT NOT NULL,
                           oficina_tramitante INT NOT NULL,
                           marca_base INT NOT NULL,
                           marca_opuesta INT NOT NULL,
                           boletin_opuesta INT NOT NULL,
                           customer_id INT NOT NULL,
                           staff_id INT NOT NULL,
                           PRIMARY KEY (accion_id)
           );
           
           ALTER TABLE accion_id COMMENT 'Tabla de acciones a terceros';
           
           
           CREATE TABLE acciones_terceros_eventos (
                           acc_ter_id INT AUTO_INCREMENT NOT NULL,
                           accion_id INT NOT NULL,
                           evento_accion INT NOT NULL,
                           PRIMARY KEY (acc_ter_id)
           );
           
           ALTER TABLE acciones_terceros_eventos COMMENT 'Tabla de almacenaje de los eventos de marcas de terceros';
           
           
           CREATE TABLE doc_acc_ter (
                           doc_acc_id INT AUTO_INCREMENT NOT NULL,
                           nro_accion INT NOT NULL,
                           nro_documento INT NOT NULL,
                           PRIMARY KEY (doc_acc_id)
           );
           
           ALTER TABLE doc_acc_ter COMMENT 'Tabla de almacenamiento de documentos de terceros';
           
           
           CREATE TABLE marcas_busqueda (
                           busq_id INT AUTO_INCREMENT NOT NULL,
                           customer_id INT NOT NULL,
                           fecha_solicitud DATE NOT NULL,
                           fecha_respuesta DECIMAL NOT NULL,
                           has_backgrounds BOOLEAN NOT NULL,
                           comentarios TEXT(4096) NOT NULL,
                           pais_busqueda INT NOT NULL,
                           PRIMARY KEY (busq_id)
           );
           
           ALTER TABLE marcas_busqueda COMMENT 'Tabla de busqueda de marcas';
           
           
           CREATE TABLE busqieda_tipo (
                           busq_tipo_id INT NOT NULL,
                           busq_id INT NOT NULL,
                           tipo_busq_id INT NOT NULL,
                           PRIMARY KEY (busq_tipo_id)
           );
           
           ALTER TABLE busqieda_tipo COMMENT 'Tabla que almacena que tipo de busqueda por cada busqueda';
           
           
           ALTER TABLE registros_sanitarios ADD CONSTRAINT registros_grupos_registros_sanitarios_fk
           FOREIGN KEY (grupo_registro)
           REFERENCES registros_grupos (grupo_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_expedientes ADD CONSTRAINT expediente_marcas_expedientes_fk
           FOREIGN KEY (exp_id)
           REFERENCES expediente (exp_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_expediente ADD CONSTRAINT expediente_patentes_expediente_fk
           FOREIGN KEY (exp_id)
           REFERENCES expediente (exp_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE acciones_terceros_expedientes ADD CONSTRAINT expediente_acciones_terceros_expedientes_fk
           FOREIGN KEY (exp_id)
           REFERENCES expediente (exp_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE expedientes_registros ADD CONSTRAINT expediente_expedientes_registros_fk
           FOREIGN KEY (nro_exp)
           REFERENCES expediente (exp_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE estados ADD CONSTRAINT materias_estados_fk
           FOREIGN KEY (tipo_materia)
           REFERENCES materias (materia_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE tipo_evento ADD CONSTRAINT materias_tipo_evento_fk
           FOREIGN KEY (tipo_materia)
           REFERENCES materias (materia_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE servicios ADD CONSTRAINT materias_servicios_fk
           FOREIGN KEY (materia_servicios)
           REFERENCES materias (materia_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitud_patentes ADD CONSTRAINT tipos_patentes_solicitud_patentes_fk
           FOREIGN KEY (tipo_patente)
           REFERENCES tipos_patentes (tip_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE doc_solicitud ADD CONSTRAINT documentos_doc_solicitud_fk
           FOREIGN KEY (nro_documento)
           REFERENCES documentos (doc_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE doc_acc_ter ADD CONSTRAINT documentos_doc_acc_ter_fk
           FOREIGN KEY (nro_documento)
           REFERENCES documentos (doc_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE doc_patentes ADD CONSTRAINT documentos_doc_patentes_fk
           FOREIGN KEY (nro_doc)
           REFERENCES documentos (doc_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE documentos_registros ADD CONSTRAINT documentos_documentos_registros_fk
           FOREIGN KEY (nro_doc)
           REFERENCES documentos (doc_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE part_id ADD CONSTRAINT tipo_anexo_part_id_fk
           FOREIGN KEY (anexo_tipo)
           REFERENCES tipo_anexo (tip_ax_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexo_participante ADD CONSTRAINT part_id_anexo_participante_fk
           FOREIGN KEY (tipo_participacion)
           REFERENCES part_id (tipo_part_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE oficinas_contactos ADD CONSTRAINT oficinas_oficinas_contactos_fk
           FOREIGN KEY (oficina)
           REFERENCES oficinas (oficina_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexos ADD CONSTRAINT oficinas_anexos_solicitudes_fk
           FOREIGN KEY (oficina_gestora)
           REFERENCES oficinas (oficina_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE accion_id ADD CONSTRAINT oficinas_accion_id_fk
           FOREIGN KEY (oficina_tramitante)
           REFERENCES oficinas (oficina_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros ADD CONSTRAINT oficinas_registros_fk
           FOREIGN KEY (oficina)
           REFERENCES oficinas (oficina_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE contacto_registro ADD CONSTRAINT registros_contacto_registro_fk
           FOREIGN KEY (num_reg)
           REFERENCES registros (reg_num)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_solicitudes ADD CONSTRAINT registros_marcas_solicitudes_fk
           FOREIGN KEY (reg_num)
           REFERENCES registros (reg_num)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitud_patentes ADD CONSTRAINT registros_solicitud_patentes_fk
           FOREIGN KEY (reg_num)
           REFERENCES registros (reg_num)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_sanitarios ADD CONSTRAINT registros_registros_sanitarios_fk
           FOREIGN KEY (num_reg)
           REFERENCES registros (reg_num)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_solicitudes ADD CONSTRAINT estados_solicitudes_solicitudes_fk
           FOREIGN KEY (est_solicitud)
           REFERENCES estados_solicitudes (cod_estado)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexos ADD CONSTRAINT estados_solicitudes_anexos_solicitudes_fk
           FOREIGN KEY (estado_exp)
           REFERENCES estados_solicitudes (cod_estado)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexo_participante ADD CONSTRAINT anexos_solicitudes_anexo_participante_fk
           FOREIGN KEY (anexo_id)
           REFERENCES anexos (nro_anexo)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexos_solicitudes ADD CONSTRAINT anexos_anexos_solicitudes_fk
           FOREIGN KEY (num_anexo)
           REFERENCES anexos (nro_anexo)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexos_patentes ADD CONSTRAINT anexos_anexos_patentes_fk
           FOREIGN KEY (num_anexo)
           REFERENCES anexos (nro_anexo)
           ON DELETE NO ACTION
           ON UPDATE NO ACTION;
           
           ALTER TABLE eventos ADD CONSTRAINT tipo_evento_eventos_fk
           FOREIGN KEY (tipo_evento)
           REFERENCES tipo_evento (tipo_eve_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitudes_eventos ADD CONSTRAINT eventos_solicitudes_eventos_fk
           FOREIGN KEY (evento_sol)
           REFERENCES eventos (eve_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_eventos ADD CONSTRAINT eventos_patentes_eventos_fk
           FOREIGN KEY (evento_id)
           REFERENCES eventos (eve_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE acciones_terceros_eventos ADD CONSTRAINT eventos_acciones_terceros_eventos_fk
           FOREIGN KEY (evento_accion)
           REFERENCES eventos (eve_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_eventos ADD CONSTRAINT eventos_registros_eventos_fk
           FOREIGN KEY (eve_reg)
           REFERENCES eventos (eve_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_publicaciones ADD CONSTRAINT tipo_publicacion_publicaciones_fk
           FOREIGN KEY (tipo_publicacion)
           REFERENCES tipo_publicacion (tipo_pub_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_publicaciones ADD CONSTRAINT tipo_publicacion_patentes_publicaciones_fk
           FOREIGN KEY (tipo_pub_id)
           REFERENCES tipo_publicacion (tipo_pub_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_solicitudes ADD CONSTRAINT tipo_solicitud_solicitudes_fk
           FOREIGN KEY (tipo_solicitud)
           REFERENCES tipo_solicitud (tipo_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE accion_id ADD CONSTRAINT tipo_solicitud_accion_id_fk
           FOREIGN KEY (tipo_solicitud)
           REFERENCES tipo_solicitud (tipo_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_solicitantes ADD CONSTRAINT solicitantes_patentes_solicitantes_fk
           FOREIGN KEY (solicitud)
           REFERENCES solicitantes (solicit_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_solicitantes ADD CONSTRAINT solicitantes_marcas_solicitantes_fk
           FOREIGN KEY (solicitante)
           REFERENCES solicitantes (solicit_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE signos_solicitud ADD CONSTRAINT tipos_signos_signos_solicitud_fk
           FOREIGN KEY (tipo_signo)
           REFERENCES tipos_signos (tipos_signos)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE paises_designados ADD CONSTRAINT tipo_solicitud_paises_designados_fk
           FOREIGN KEY (solicitud_nro)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE signos_solicitud ADD CONSTRAINT tipo_solicitud_signos_fk
           FOREIGN KEY (tipo_solicitud_id)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitudes_clases ADD CONSTRAINT solicitudes_solicitudes_clases_fk
           FOREIGN KEY (nro_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_prioridad ADD CONSTRAINT solicitudes_prioridad_fk
           FOREIGN KEY (prioridad_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE doc_solicitud ADD CONSTRAINT solicitudes_doc_solicitud_fk
           FOREIGN KEY (nro_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_solicitantes ADD CONSTRAINT solicitudes_marcas_solicitantes_fk
           FOREIGN KEY (marca)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_publicaciones ADD CONSTRAINT marcas_solicitudes_marcas_publicaciones_fk
           FOREIGN KEY (nro_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_expedientes ADD CONSTRAINT marcas_solicitudes_marcas_expedientes_fk
           FOREIGN KEY (nro_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitudes_eventos ADD CONSTRAINT marcas_solicitudes_solicitudes_eventos_fk
           FOREIGN KEY (nro_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexos_solicitudes ADD CONSTRAINT marcas_solicitudes_anexos_solicitudes_fk
           FOREIGN KEY (nro_solicitud)
           REFERENCES marcas_solicitudes (solicitud_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_busqueda ADD CONSTRAINT paises_marbusq_fk
           FOREIGN KEY (pais_busqueda)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_prioridad ADD CONSTRAINT paises_prioridad_fk
           FOREIGN KEY (pais_prioridad)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE boletines ADD CONSTRAINT paises_boletines_fk
           FOREIGN KEY (pais_boletin)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE paises_designados ADD CONSTRAINT paises_paises_designados_fk
           FOREIGN KEY (pais_designado)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitud_patentes ADD CONSTRAINT paises_solicitud_patentes_fk
           FOREIGN KEY (pais_pat)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_prioridad ADD CONSTRAINT paises_patentes_prioridad_fk
           FOREIGN KEY (pais_id)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_inventores ADD CONSTRAINT paises_patentes_inventores_fk
           FOREIGN KEY (pais_inventor)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_sanitarios ADD CONSTRAINT paises_registros_sanitarios_fk
           FOREIGN KEY (pais_reg)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_solicitantes ADD CONSTRAINT paises_registros_solicitantes_fk
           FOREIGN KEY (fabricante_pais)
           REFERENCES paises (pais_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_solicitantes ADD CONSTRAINT registros_sanitarios_registros_solicitantes_fk
           FOREIGN KEY (nro_reg_sol)
           REFERENCES registros_sanitarios (reg_san_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_solicitantes ADD CONSTRAINT solicitud_patentes_patentes_solicitantes_fk
           FOREIGN KEY (patente)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_prioridad ADD CONSTRAINT solicitud_patentes_patentes_prioridad_fk
           FOREIGN KEY (nro_sol_pat)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_publicaciones ADD CONSTRAINT solicitud_patentes_patentes_publicaciones_fk
           FOREIGN KEY (nro_patente)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_expediente ADD CONSTRAINT solicitud_patentes_patentes_expediente_fk
           FOREIGN KEY (sol_pat_id)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_eventos ADD CONSTRAINT solicitud_patentes_patentes_eventos_fk
           FOREIGN KEY (pat_evento)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE anexos_patentes ADD CONSTRAINT solicitud_patentes_anexos_patentes_fk
           FOREIGN KEY (nro_patente)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE doc_patentes ADD CONSTRAINT solicitud_patentes_doc_patentes_fk
           FOREIGN KEY (nro_patente)
           REFERENCES solicitud_patentes (sol_pat_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas_publicaciones ADD CONSTRAINT boletines_publicaciones_fk
           FOREIGN KEY (boletin_publicacion)
           REFERENCES boletines (boletin_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE accion_id ADD CONSTRAINT boletines_accion_id_fk
           FOREIGN KEY (boletin_opuesta)
           REFERENCES boletines (boletin_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE patentes_publicaciones ADD CONSTRAINT boletines_patentes_publicaciones_fk
           FOREIGN KEY (boletin_id)
           REFERENCES boletines (boletin_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE busqieda_tipo ADD CONSTRAINT tipo_busqueda_busqieda_tipo_fk
           FOREIGN KEY (tipo_busq_id)
           REFERENCES tipo_busqueda (tipo_busq_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE marcas ADD CONSTRAINT clasniza_marcas_fk
           FOREIGN KEY (clase_niza)
           REFERENCES clasNiza (niza_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE niza_productos ADD CONSTRAINT clasniza_niza_productos_fk
           FOREIGN KEY (clase_niza)
           REFERENCES clasNiza (niza_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE solicitudes_clases ADD CONSTRAINT clasniza_solicitudes_clases_fk
           FOREIGN KEY (clase_niza)
           REFERENCES clasNiza (niza_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE accion_id ADD CONSTRAINT marcas_accion_id_fk
           FOREIGN KEY (marca_base)
           REFERENCES marcas (marca_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE accion_id ADD CONSTRAINT marcas_accion_id_fk1
           FOREIGN KEY (marca_opuesta)
           REFERENCES marcas (marca_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_solicitantes ADD CONSTRAINT marcas_registros_solicitantes_fk
           FOREIGN KEY (marca_producto)
           REFERENCES marcas (marca_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE expedientes_registros ADD CONSTRAINT registros_solicitantes_expedientes_registros_fk
           FOREIGN KEY (reg_sol_id)
           REFERENCES registros_solicitantes (reg_sol_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE registros_eventos ADD CONSTRAINT registros_solicitantes_registros_eventos_fk
           FOREIGN KEY (reg_sol)
           REFERENCES registros_solicitantes (reg_sol_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE documentos_registros ADD CONSTRAINT registros_solicitantes_documentos_registros_fk
           FOREIGN KEY (nro_reg)
           REFERENCES registros_solicitantes (reg_sol_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE doc_acc_ter ADD CONSTRAINT accion_id_doc_acc_ter_fk
           FOREIGN KEY (nro_accion)
           REFERENCES accion_id (accion_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE acciones_terceros_eventos ADD CONSTRAINT accion_id_acciones_terceros_eventos_fk
           FOREIGN KEY (accion_id)
           REFERENCES accion_id (accion_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;
           
           ALTER TABLE busqieda_tipo ADD CONSTRAINT mar_busq_busqueda_tipo_fk
           FOREIGN KEY (busq_id)
           REFERENCES marcas_busqueda (busq_id)
           ON DELETE CASCADE
           ON UPDATE CASCADE;"
        );
    }

    public function drop()
    {
        $this->db->query(
            "DROP TABLE IF EXISTS registros_grupos,
            expediente,
            acciones_terceros_expedientes,
            materias,
            servicios,
            estados,
            tipos_patentes,
            documentos,
            tipo_anexo,
            part_id,
            oficinas,
            registros,
            contacto_registro,
            oficinas_contactos,
            estados_solicitudes,
            anexos,
            anexo_participante,
            tipo_evento,
            eventos,
            tipo_publicacion,
            tipo_solicitud,
            solicitantes,
            tipos_signos,
            marcas_solicitudes,
            anexos_solicitudes,
            solicitudes_eventos,
            marcas_expedientes,
            doc_solicitud,
            signos_solicitud,
            paises,
            registros_sanitarios,
            patentes_inventores,
            solicitud_patentes,
            doc_patentes,
            anexos_patentes,
            patentes_eventos,
            patentes_expediente,
            patentes_prioridad,
            patentes_solicitantes,
            paises_designados,
            boletines,
            patentes_publicaciones,
            marcas_publicaciones,
            marcas_prioridad,
            tipo_busqueda,
            clasNiza,
            solicitudes_clases,
            niza_productos,
            marcas,
            registros_solicitantes,
            documentos_registros,
            registros_eventos,
            expedientes_registros,
            accion_id,
            acciones_terceros_eventos,
            doc_acc_ter,
            marcas_busqueda,
            busqieda_tipo;"
        );
    }

    

}