<script>
    id = '<?php echo $cod_id ?>';
    informacion_inicio = {};
    informacion_marca_base = {};
    informacion_marca_opuesta = {};
    informacion_expediente = {};

    // Cargar información del localStorage al cargar la página 
    $(document).on('click', '#ValidadorInicio', function (e) {
        console.log("Validar Inicio");
        e.preventDefault();
        var tipo_solicitud_id = $('#tipo_solicitud_id').val();
        var client_id = $('#client_id').val();
        var oficina_id = $('#oficina_id').val();
        var staff_id = $('#staff_id').val();
        // Verificar si todas las variables están llenas
        if (tipo_solicitud_id && client_id && oficina_id && staff_id) {
            // Crear objeto JSON con las variables válidas
            informacion_inicio = {
                tipo_solicitud_id: tipo_solicitud_id,
                client_id: client_id,
                oficina_id: oficina_id,
                staff_id: staff_id
            };
            console.log("Informacion Inicio: ", informacion_inicio);
            // Convertir el objeto JSON a una cadena JSON
            var jsonString = JSON.stringify(informacion_inicio);
            // Insertar la cadena JSON en localStorage
            localStorage.setItem('inicio_acc_tercero', jsonString);
            console.log("Datos almacenados en localStorage");
        } else {
            alert('Por favor, rellene todos los campos.');
        }
    });

    $(document).on('click', '#ValidadorMarcaBase', function (e) {
        console.log("Validar Marca Base");
        e.preventDefault();
        var marcas_id = $('#marcas_id').val();
        var clase_id = $('#clase_id').val();
        var pais_id = $('#pais_id').val();
        var nro_solicitud = $('#nro_solicitud').val();
        var fecha_solicitud = $('#fecha_solicitud').val();
        var fecha_registro = $('#fecha_registro').val();
        var propietario_id = $('#propietario_id').val();
        var ciudad_propietario = $('#ciudad_propietario').val();
        var fundamento = $('#fundamento').val();
        // Verificar si todas las variables están llenas
        if (marcas_id && clase_id && pais_id && nro_solicitud && fecha_solicitud && fecha_registro &&
            propietario_id &&
            ciudad_propietario &&
            fundamento) {
            // Crear objeto JSON con las variables válidas
            informacion_marca_base = {
                marcas_id: marcas_id,
                clase_id: clase_id,
                pais_id: pais_id,
                nro_solicitud: nro_solicitud,
                fecha_solicitud: fecha_solicitud,
                fecha_registro: fecha_registro,
                propietario_id: propietario_id,
                ciudad_propietario: ciudad_propietario,
                fundamento: fundamento
            };
            console.log("Informacion Marca Base: ", informacion_marca_base);
            // Convertir el objeto JSON a una cadena JSON
            var jsonString = JSON.stringify(informacion_marca_base);
            // Insertar la cadena JSON en localStorage
            localStorage.setItem('marca_base_acc_tercero', jsonString);
            console.log("Datos almacenados en localStorage");
        } else {
            alert('Por favor, rellene todos los campos.');
        }
    });

    $(document).on('click', '#ValidarMarcaOpuesta', function (e) {
        console.log("Validar Marca Opuesta");
        e.preventDefault();
        var marca_opuesta = $('#marca_opuesta').val();
        var clase_niza = $('#clase_niza').val();
        var pais_id_opuesta = $('#pais_id_opuesta').val();
        var nro_solicitud_opuesta = $('#nro_solicitud_opuesta').val();
        var fecha_solicitud_opuesta = $('#fecha_solicitud_opuesta').val();
        var nro_registro = $('#nro_registro').val();
        var fecha_registro_opuesta = $('#fecha_registro_opuesta').val();
        var propietario_opuesta = $('#propietario_opuesta').val();
        var ciudad_propietario_opuesta = $('#ciudad_propietario_opuesta').val();
        var pais_propietario_opuesta = $('#pais_propietario_opuesta').val();
        var agente = $('#agente').val();
        var boletin = $('#boletin').val();
        var fecha_boletin = $('#fecha_boletin').val();

        // Verificar si todas las variables están llenas
        if ( 
            marca_opuesta &&
            clase_niza &&
            pais_id_opuesta &&
            nro_solicitud_opuesta &&
            fecha_solicitud_opuesta &&
            nro_registro &&
            fecha_registro_opuesta &&
            propietario_opuesta &&
            ciudad_propietario_opuesta &&
            pais_propietario_opuesta &&
            agente &&
            boletin &&
            fecha_boletin 
        ) {
        // Crear objeto JSON con las variables válidas
        informacion_marca_opuesta = {
            marca_opuesta : marca_opuesta,
            clase_niza : clase_niza,
            pais_id_opuesta  : pais_id_opuesta,
            nro_solicitud_opuesta : nro_solicitud_opuesta,
            fecha_solicitud_opuesta : fecha_solicitud_opuesta,
            nro_registro : nro_registro,
            fecha_registro_opuesta : fecha_registro_opuesta,
            propietario_opuesta  : propietario_opuesta,
            ciudad_propietario_opuesta : ciudad_propietario_opuesta,
            pais_propietario_opuesta : pais_propietario_opuesta,
            agente : agente,
            boletin : boletin,
            fecha_boletin : fecha_boletin
        };
        console.log("Informacion Marca Opuesta:", informacion_marca_opuesta);
        // Convertir el objeto JSON a una cadena JSON
        var jsonString = JSON.stringify(informacion_marca_opuesta);
        // Insertar la cadena JSON en localStorage
        localStorage.setItem('marca_opuesta_acc_tercero', jsonString);
        console.log("Datos almacenados en localStorage");
        } else {
            alert('Por favor, rellene todos los campos.');
        }
    });

    $(document).on('click', '#ValidarExpediente', function (e) {
        console.log("Validar Expediente");
        e.preventDefault();
        var estado_id = $('#estado_id').val();
        var comentarios = $('#comentarios').val();
        // Verificar si todas las variables están llenas
        if ( 
            estado_id &&
            comentarios  
        ) {
        // Crear objeto JSON con las variables válidas
        informacion_expediente = {
            estado_id : estado_id,
            comentarios : comentarios
        };
        console.log("Informacion  Expediente:", informacion_expediente);
        // Convertir el objeto JSON a una cadena JSON
        var jsonString = JSON.stringify(informacion_expediente);
        // Insertar la cadena JSON en localStorage
        localStorage.setItem('expediente_acc_tercero', jsonString);
        console.log("Datos almacenados en localStorage");
        } else {
            alert('Por favor, rellene todos los campos.');
        }
    });


</script>