<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <?php
            echo form_open($this->uri->uri_string(), ['id' => 'invoice-form', 'class' => '_transaction_form invoice-form']);
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

    // Cliente();

    $('#clientid').on('change', function (e) {
        e.preventDefault(); // Evitar la acción predeterminada
        var valor = $(this).val(); // Obtener el valor seleccionado del cliente

        if (valor === "") {
            console.log("La variable está vacía o es falso.");
        } else {
            console.log("Valor del Cliente: ", valor);
            var currency_select = $('#currency');

            // Identificar la opción deseada (por ejemplo, por valor)
            // var opcionDeseada = 'valorDeLaOpcion';

            // // Marcar la opción como seleccionada y actualizar el valor del select
            // $originalSelect.find('option[value="' + opcionDeseada + '"]').prop('selected', true);
         //   $originalSelect.val(opcionDeseada);
            let url_currency = '<?php echo admin_url("invoices/search_client_currency/"); ?>' + valor;
            $.get(url_currency, function (response) {
                let moneda = JSON.parse(response);
                console.log('Moneda obtenida del servidor: ', moneda.default_currency);
                let num = Number(moneda.default_currency);
                let currency = num + 1;
                console.log('Currency ',currency);
                currency_select.find('option[value="' + currency + '"]').prop('selected', true);
                currency_select.val(currency);
                currency_select.selectpicker('refresh');
            })

            // Construir la URL con el valor del cliente
            let url = '<?php echo admin_url("invoices/search_client/"); ?>' + valor;
            console.log(url);

            // Hacer una solicitud GET al servidor
            $.get(url, function (response) {
                // Parsear la respuesta JSON
                let lista = JSON.parse(response);
                console.log("Lista obtenida del servidor: ", lista);

                // Seleccionar el elemento <select> por su id "marcas"
                var selectElement = $("#marcas");

                // Eliminar todas las opciones actuales del select
                selectElement.empty();
                console.log('Opciones eliminadas.');

                // Añadir la opción por defecto
                selectElement.append('<option value="">Seleccione una opción</option>');

                // Recorrer la lista con $.each()
                $.each(lista, function (key, value) {
                    selectElement.append('<option value="' + key + '">' + value + '</option>');
                });
                console.log('Opciones añadidas al select.');

                // Si estás utilizando el plugin selectpicker (Bootstrap), refrescar el select
                selectElement.selectpicker('refresh');
                console.log("El selectpicker ha sido refrescado.");
            });
        }
    });

    $('#marcas').on('change', function () {
        console.log('cambio en marca ');
        var valor = $(this).val(); // Obtener el valor de la opción seleccionada
        if (valor === "") {
            console.log("No se seleccionó ninguna marca.");
        } else {
            console.log("Marca seleccionada: " + valor);
            let url = '<?php echo admin_url("invoices/get_marca/"); ?>';
            url = url + valor;
            console.log(url);
            $.get(url, function (response) {
                let lista = JSON.parse(response);
                console.log(lista);
            });
        }

    });

    // $('#marcas').on('change', function (e) {
    //    // e.preventDefault();
    //     var valor = $(this).val();
    //     console.log("llegue a marcas ");
    //     console.log("Valor de la marca ", valor);
    //     let url = '<?php echo admin_url("invoices/get_marca/"); ?>';
    //     url = url + valor;
    //     console.log(url);
    //     // $.get(url, function (response) {
    //     //     let lista = JSON.parse(response);
    //     //     console.log(lista);
    //     // });
    // });
</script>
</body>

</html>