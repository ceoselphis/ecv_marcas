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



    $('#clientid').on('change', function (e) {
        e.preventDefault(); // Evitar la acción predeterminada
        var valor = $(this).val(); // Obtener el valor seleccionado del cliente

        if (valor === "") {
            console.log("La variable está vacía o es falso.");
        } 
        else {
            console.log("Valor del Cliente: ", valor);

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


    $('#marcas').on('change', function (e) {
        e.preventDefault();
        var valor = $(this).val();
        console.log("Valor de la marca ", valor);
        let url = '<?php echo admin_url("invoices/get_marca/"); ?>';
        url = url + valor;
        console.log(url);
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log(lista);
        });
    });
</script>
</body>

</html>