<div class="col-md-9">
    <h4 class="tw-font-semibold tw-mt-0 tw-text-neutral-800">
        Contadores </h4>
    <div class="panel_s">
        <div class="panel-body">
            <div class="row">
                <?php echo form_open("", [
                    "id" => "contadores",
                    "method" => "POST"
                ]); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo form_label("Marcas", "cont_marcas", ["class" => "form-label"]); ?>
                        <?php echo form_input([
                            'id' => 'cont_marcas',
                            'name' => 'cont_marcas',
                            'class' => 'form-control',
                            'value' => set_value('cont_marcas', $marcas['contador'])
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo form_label("Patentes", "cont_patentes", ["class" => "form-label"]); ?>
                        <?php echo form_input([
                            'id' => 'cont_patentes',
                            'name' => 'cont_patentes',
                            'class' => 'form-control',
                            'value' => set_value('cont_patentes', $patentes['contador'])
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo form_label("Derecho de Autor", "cont_autor", ["class" => "form-label"]); ?>
                        <?php echo form_input([
                            'id' => 'cont_autor',
                            'name' => 'cont_autor',
                            'class' => 'form-control',
                            'value' => set_value('cont_autor', $autor['contador'])
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo form_label("Acciones a Terceros", "cont_act_ter", ["class" => "form-label"]); ?>
                        <?php echo form_input([
                            'id' => 'cont_act_ter',
                            'name' => 'cont_act_ter',
                            'class' => 'form-control',
                            'value' => set_value('cont_act_ter', $acciones_terceros['contador'])
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" id="send" type="submit">Guardar</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

<?php init_tail(); ?>


<script>

//Script para guardar

$(document).on('submit', "#contadores", function(e){
    e.preventDefault();
    var data = {
        "marcas" : $("#cont_marcas").val(),
        "patentes": $("#cont_patentes").val(),
        "derecho_autor": $("#cont_autor").val(),
        "acc_terceros" : $("#cont_act_ter").val(),
        "csrf_token_name": $("input[name=csrf_token_name]").val()
    }
    $.ajax({
        url: "<?php echo admin_url("pi/SettingsController/saveOrUpdateContadores");?>",
        method:"POST",
        data: data,
        success: function (response)
        {
            alert_float('success', 'Registro guardado exitosamente');
        }
    });
});


</script>


</body>

</html>