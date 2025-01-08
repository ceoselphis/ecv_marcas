<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <?php // echo form_open($this->uri->uri_string() , ['id' => 'invoice-form', 'class' => '_transaction_form invoice-form']);
            echo form_open($this->uri->uri_string() , ['id' => 'invoice-form', 'class' => '_transaction_form invoice-form']);
            echo form_hidden("marcaid", key_exists('marca_id', $_GET) ? $_GET['marca_id'] : '');
            echo form_hidden("edit_marca", key_exists('edit_marca', $_GET) ? $_GET['edit_marca'] : '');
            if (isset($invoice)) {
                echo form_hidden('isedit');
            }
            ?>
            <div class="col-md-12">
                <h4
                    class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        <?php echo isset($invoice) ? format_invoice_number($invoice) : _l('create_new_invoice'); ?>
                    </span>
                    <?php echo isset($invoice) ? format_invoice_status($invoice->status) : ''; ?>
                </h4>
                <?php $this->load->view('admin/invoices/invoice_template'); ?>
            </div>
            <?php echo form_close(); ?>
            <?php $this->load->view('admin/invoice_items/item'); ?>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
    $(function () {
        validate_invoice_form();
        // Init accountacy currency symbol
        init_currency();
        // Project ajax search
        init_ajax_project_search_by_customer_id();
        // Maybe items ajax search
        init_ajax_search('items', '#item_select.ajax-search', undefined, admin_url + 'items/search');
    });

    // function Cliente() {
    //     let cliente = $('#clientid').val();
    //     if (cliente === "") {
    //         console.log("La variable está vacía o es falso.");
    //     } else {
    //         console.log("Valor del Cliente: ", cliente);

    //         // Construir la URL con el valor del cliente
    //         let url = '<?php echo admin_url("invoices/search_client/"); ?>' + cliente;
    //         console.log(url);

    //         // Hacer una solicitud GET al servidor
    //         $.get(url, function (response) {
    //             // Parsear la respuesta JSON
    //             let lista = JSON.parse(response);
    //             console.log("Lista obtenida del servidor: ", lista);

    //             // Seleccionar el elemento <select> por su id "marcas"
    //             var selectElement = $("#marcas");

    //             // Eliminar todas las opciones actuales del select
    //             selectElement.empty();
    //             console.log('Opciones eliminadas.');

    //             // Añadir la opción por defecto
    //             selectElement.append('<option value="">Seleccione una opción</option>');

    //             // Recorrer la lista con $.each()
    //             $.each(lista, function (key, value) {
    //                 selectElement.append('<option value="' + key + '">' + value + '</option>');
    //             });
    //             console.log('Opciones añadidas al select.');

    //             // Si estás utilizando el plugin selectpicker (Bootstrap), refrescar el select
    //             selectElement.selectpicker('refresh');
    //             console.log("El selectpicker ha sido refrescado.");
    //         });
    //     }
    // }

    

    item_select = "";
    marcas = "";
    cliente = "";
    taxname = "";
    nombre_marca = "";
    lista_items = 1;
    item_grupo = "";

    $(function() {
    var lastPageLoadTime = null;

        $(window).on('load', function() {
            var currentTime = new Date().getTime();
        
            if (lastPageLoadTime !== null) {
                // La página se está recargando
                console.log('La página se está recargando');

                // Aquí puedes agregar tu lógica para cuando la página se recarga
            } else {
                localStorage.removeItem('expediente');
                lastPageLoadTime = currentTime;
                console.log('La página se está cargando por primera vez o ha terminado de cargar');
            }
        });
    });


    $('#clientid').on('change', function (e) {
        e.preventDefault(); // Evitar la acción predeterminada
        var valor = $(this).val(); // Obtener el valor seleccionado del cliente
        cliente = $(this).val();
        if (valor === "") {
            console.log("La variable está vacía o es falso.");
        } else {
            console.log("Valor del Cliente: ", valor);
            var currency_select = $('#currency');
            let url_currency = '<?php echo admin_url("invoices/search_client_currency/"); ?>' + valor;
            $.get(url_currency, function (response) {
                let moneda = JSON.parse(response);
               // console.log('Moneda obtenida del servidor: ', moneda.default_currency);
                let num = Number(moneda.default_currency);
                let currency = num + 1;
              //  console.log('Currency ',currency);
                currency_select.find('option[value="' + currency + '"]').prop('selected', true);
                currency_select.val(currency);
                currency_select.selectpicker('refresh');
            })

            // Construir la URL con el valor del cliente
            // let url = '<?php echo admin_url("invoices/search_client/"); ?>' + valor;
            // console.log(url);

            // // Hacer una solicitud GET al servidor
            // $.get(url, function (response) {
            //     let lista = JSON.parse(response);
            //     console.log("Lista obtenida del servidor: ", lista);
            //     var selectElement = $("#marcas");
            //     selectElement.empty();
            //     console.log('Opciones eliminadas.');
            //     selectElement.append('<option value="">Seleccione una opción</option>');
            //     $.each(lista, function (key, value) {
            //         selectElement.append('<option value="' + key + '">' + value + '</option>');
            //     });
            //     console.log('Opciones añadidas al select.');
            //     selectElement.selectpicker('refresh');
            //     console.log("El selectpicker ha sido refrescado.");
            // });
        }
    });

    

    $('#item_select').on('change', function () {
        console.log(" Item Seleccionado ");
        item_select = $(this).val();
        if (item_select === "") {
            console.log("No se seleccionó ninguna Item.");
        } else {
            console.log("Item seleccionado: " + item_select);
            let expediente = {
                "expediente_id": item_select,
                "cliente_id": cliente
            };
            console.log("==== Cambios en el tipo Item Select ", expediente);    
            var formData = new FormData();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('cliente_id', expediente.cliente_id);
            formData.append('expediente_id', expediente.expediente_id);
            let url = '<?php echo admin_url("invoices/buscar_cliente_expediente"); ?>'
            $.ajax({
                url : url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function (response) {
                let lista = JSON.parse(response);
                console.log(" $$$$$ Lista $$$$$ ", lista);
                item_grupo = lista.grupo_expediente;
                console.log(" $$$$$ Item Grupo $$$$$ ", item_grupo)
                var selectElement = $("#marcas");
                selectElement.empty();
                console.log('Opciones eliminadas.');
                selectElement.append('<option value="">Seleccione una opción</option>');
                $.each(lista.lista_expediente, function (key, value) {
                    selectElement.append('<option value="' + key + '">' + value + '</option>');
                });
                console.log('Opciones añadidas al select.');
                selectElement.selectpicker('refresh');
                console.log("El selectpicker ha sido refrescado.");
                console.log(" =====&&& response grupo item ", response);
                
         
            }).catch(function (response) {
                console.log(response);
            
            });
            // let url = '<?php //echo admin_url("invoices/get_marca/"); ?>';
            // url = url + valor;
            // console.log(url);
            // $.get(url, function (response) {
            //     let lista = JSON.parse(response);
            //     console.log(lista);
            // });
        }
    });

   
    

   

    $('#marcas').on('change', function () {
        
        marcas = $(this).val();
        var valor = $(this).val(); // Obtener el valor de la opción seleccionada
        if (valor === "") {
            console.log("No se seleccionó ninguna marca.");
        } else {

            //get_expediente_items
            var formData = new FormData();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('item_grupo', item_grupo);
            formData.append('marcas', valor);
            let url = '<?php echo admin_url("invoices/get_expediente_items"); ?>'
            $.ajax({
                url : url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function (response) {
                console.log(" #####3 Nombre Expediente  ####### ", response);
                nombre_marca = JSON.parse(response);
         
            }).catch(function (response) {
                console.log(response);
            
            });
            //console.log("Marca seleccionada: " + nombre_marca);
            // let url = '<?php //echo admin_url("invoices/get_marca/"); ?>';
            // url = url + valor;
            // console.log(url);
            // $.get(url, function (response) {
            //     let lista = JSON.parse(response);
            //     console.log(" Lista de Marcas ", lista);
            //     nombre_marca = lista.nombre_marca;
            // });


        }

    });

    $('#taxname').on('change', function () {
        taxname = $(this).val(); // Obtén los valores seleccionados
        console.log("texname  ", taxname); // Muestra en consola

    });

    $("#save_item").on("click", function() {
      
        console.log("Guardar Item");
        let newitems = 'input[name="newitems['+lista_items+'][order]"]';
        console.log("El valor de items_indicator es: ", newitems);
        if ($(newitems).val() !== undefined) {
            console.log(" tiene Valor ");
            console.log(" marcas  ", $('#marcas').val());
            $('select[name="newitems['+lista_items+'][taxname][]"]').val(taxname);
            $('span[name="newitems['+lista_items+'][info]"]').text(nombre_marca);
           // $('#item_informacion').text(nombre_marca);
        } else {
            console.log(" No tiene Valor ");
        }

        let expediente = {
            "expediente_id": item_select,
            'grupo_expediente_id': item_grupo,
            "marca_id": marcas,
            "cliente_id": cliente
        };

        console.log("------------- Expediente:  ---- ", expediente);


        if (localStorage.getItem('expediente') !== null) {
            let valor_viejo = JSON.parse(localStorage.getItem('expediente'));
            console.log('El dato existe:', valor_viejo);

            // Agregar el nuevo expediente al inicio del array
            valor_viejo.unshift(expediente);

            // Actualizar el localStorage
            localStorage.setItem('expediente', JSON.stringify(valor_viejo));
            console.log('Array actualizado:', valor_viejo);
        } else {
            let array_expediente = [expediente];
            let exp = JSON.stringify(array_expediente);
            console.log("Expediente:", exp);
            localStorage.setItem('expediente', exp);
        }

        lista_items++;
    });

   


    $('.invoice-form-submit').on("click", function(e) {
        e.preventDefault();
        console.log('Voy a enviar  ');
        let valor = localStorage.getItem('expediente');
        var formData = new FormData();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('expediente', valor);
        let url = '<?php echo admin_url("invoices/save_expediente"); ?>'
        $.ajax({
            url : url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
         
            console.log("response ", response);
            alert_float('success', "Factura Generada Correctamente");
         
        }).catch(function (response) {
            console.log(response);
            alert_float('success'," No se pudo Generar la Factura");
        });

        localStorage.removeItem('expediente');
        
    });

   
</script>
</body>

</html>