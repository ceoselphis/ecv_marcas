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
        e.preventDefault();
        var valor = $(this).val();
        console.log("Valor del Cliente ", valor);

        var formData = new FormData();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('clientid', valor);

        let url = '<?php echo admin_url("invoices/search_client"); ?>';
        console.log(url);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            try {
                console.log(response)
                // Quitar todas las opciones actuales
                $('#mySelect').empty();

// Añadir las nuevas opciones al select
nuevasOpciones.forEach(function(opcion) {
    $('#mySelect').append(new Option(opcion.text, opcion.value));
});
                // Si la respuesta es un JSON string, lo convertimos en objeto
                //let data = JSON.parse(response);
                //console.log("Respuesta ", data);
                // if (data.message) {
                //     //console.log(data.message);
                // } else {
                //     // Manejar la data que viene en el array combinado
                //     console.log("Datos obtenidos: ", data);
                // }
            } catch (e) {
                console.error("Error al procesar la respuesta: ", e);
            }
        }).catch(function (response) {
            console.log("Error ", response);
        });
    });
</script>
</body>

</html>