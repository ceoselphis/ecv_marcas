<?php 
$CI = &get_instance();
init_head(); 
$CI->load->view('marcas/solicitudes/css.php'); ?>

<div id="wrapper">
    <div class="content">
        <!-- Loading Modal -->
        <div class="modal" id="modal-loading" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="loading-spinner mb-2"></div>
                        <div>Cargando...</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4>Crear Inventor</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body" style="padding-bottom: 0%;">
                        <?php //echo form_open(admin_url('pi/patentes/InventoresController/store'), 'form'); ?>
                        <?php echo form_open_multipart("", ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
                        <?php echo form_hidden('id', $id); ?>
                        <div class="col-md-2">
                            <?php echo form_label('Código', 'codigo', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'codigo',
                                'name' => 'codigo',
                                'value' => set_value('codigo', str_pad((intval($codigo) + 1), 4, '0', STR_PAD_LEFT)),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label('Pais', 'pais_id', ['class' => 'form-label']); ?>
                            <select id="pais_id" name="pais_id" class="form-control">
                                <option value="0">Seleccione</option>
                                <?php foreach ($paises as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label('Nombre', 'nombre', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'nombre',
                                'name' => 'nombre',
                                'value' => set_value('nombre', ''),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label('Apellido', 'apellido', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'apellido',
                                'name' => 'apellido',
                                'value' => set_value('apellido', ''),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-6" style ="padding-top : 20px">
                            <?php echo form_label('Direccion', 'direccion', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'direccion',
                                'name' => 'direccion',
                                'value' => set_value('direccion', ''),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-6" style ="padding-top : 20px">
                            <?php echo form_label('Nacionalidad', 'nacionalidad', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'nacionalidad',
                                'name' => 'nacionalidad',
                                'value' => set_value('nacionalidad', ''),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <?php echo form_label('Comentarios', 'comentarios', ['class' => 'form-label']); ?>
                            <?php echo form_textarea([
                                'id' => 'comentarios',
                                'name' => 'comentarios',
                                'value' => set_value('comentarios', ''),
                                'class' => 'form-control',
                                'style' => 'height: 150px'
                            ]); ?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <button class="btn btn-primary" style = "padding-right : 15px;" type="submit">Guardar</button>
                            <button class="btn btn-gray" style = "padding-right : 15px;"type="reset">Limpiar</button>
                            <a href="<?php echo admin_url('pi/patentes/InventoresController'); ?>" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php init_tail(); ?>

<script>
    $('#modal-loading').modal('show');
    $(function() {
        $("#AddAccion").css({
            "padding-left": "7px",
        });
        setTimeout(function() {
            $('#modal-loading').modal('hide');
        }, 3000);
    });

    $("#solicitudfrm").on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData();

        console.log(" LLegue a Enviar de Autores");
        data = {
            
            'id' : $("input[name=id]").val(),
            'codigo' :  $("#codigo").val(),
            'pais_id' : $("#pais_id").val(),
            'nombre' : $("#nombre").val(),
            'apellido' : $("#apellido").val(),
            'direccion' : $("#direccion").val(),
            'nacionalidad' : $("#nacionalidad").val(),
            'comentarios' : $("#comentarios").val(),
        };
        console.log(" Data ", data);
        if (data.pais_id == 0){
            alert("Por favor Seleccione un pais ");
        } else {

            formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
            formData.append('id', data.id);
            formData.append('codigo', data.codigo);
            formData.append('pais_id', data.pais_id );
            formData.append('nombre', data.nombre);
            formData.append('apellido', data.apellido);
            formData.append('direccion', data.direccion);
            formData.append('nacionalidad', data.nacionalidad);
            formData.append('comentarios', data.comentarios); 
            //##################################################
    
    
    
            $.ajax({
                url: '<?php echo admin_url('pi/patentes/InventoresController/insertInventores'); ?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(" Response " , response);
                    const obj = JSON.parse(response);
                    if (obj.code == 200) {
                        let id = data.id;
                        alert_float('success', 'Inventor guardado con éxito!');
                        let ruta = '<?php echo admin_url("pi/patentes/InventoresController/edit/"); ?>';
                        ruta = ruta + id;
                        location.replace(ruta);
                    } else if (obj.code == 500) {
                        console.log(" ")
                        alert_float('danger', 'No se Pudo Guardar la Solicitud ');
                    }
                },
                fail: function(request) {
                    <?php if (ENVIRONMENT != 'production') { ?>
                        alert(response);
                    <?php } else { ?>
                        alert('ha ocurrido un error');
                    <?php } ?>
                }
            });
        }
    });

    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600,
    })
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });
</script>

</body>

</html>