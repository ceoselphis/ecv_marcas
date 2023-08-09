<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/BusquedasController/update/'.$id), 'form'); ?>
                        <?php echo form_hidden('id', $id);?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Cliente', 'client_id');?>
                                <br />
                                <?php echo form_dropdown('client_id', $clients, set_value('client_id', $values['client_id']), ['class' => 'form-control']);?>
                                <?php echo form_error('client_id', '<div class="text-danger">', '</div>');?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Oficina Tramitante', 'oficina_id' );?>
                                <br />
                                <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id', $values['oficina_id']), ['class' => 'form-control']);?>
                                <?php echo form_error('oficina_id', '<div class="text-danger">', '</div>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_label('Responsable', 'staff_id');?>
                                <?php echo form_dropdown('staff_id', $staff, set_value('staff_id', $values['staff_id']), ['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Marca', 'marca');?>
                                <?php echo form_input('marca', set_value('marca', $values['marca']), ['class' => 'form-control', 'maxlength' => '255']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Clase', 'clase_niza_id');?>
                                <?php echo form_dropdown('clase_niza_id', $claseNiza, set_value('clase_niza_id', $values['clase_niza_id']), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_label('Pais', 'pais_id');?>
                                <?php echo form_dropdown('pais_id', $paises, set_value('pais_id', $values['pais_id']), ['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Solicitud', 'fecha_solicitud');?>
                                <?php echo form_input('fecha_solicitud', set_value('fecha_solicitud', $values['fecha_solicitud']), ['class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Respuesta', 'fecha_respuesta', $values['fecha_respuesta']);?>
                                <?php echo form_input('fecha_respuesta', set_value('fecha_respuesta', $values['fecha_respuesta']), ['class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Ref Cliente', 'ref_cliente');?>
                                <?php echo form_input('ref_cliente', set_value('ref_cliente', $values['ref_cliente']), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Interna', 'busqueda_interna_id');?>
                                <?php echo form_dropdown('busqueda_interna_id', $tipoBusqueda, set_value('busqueda_interna_id', $values['busqueda_interna_id']), ['class' => 'form-control']);?>                                
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Externa', 'busqueda_externa_id');?>
                                <?php echo form_dropdown('busqueda_externa_id', $tipoBusqueda, set_value('busqueda_externa_id', $values['busqueda_externa_id']), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_label('Comentarios', 'comentarios');?>
                                <?php echo form_textarea('comentarios', set_value('comentarios', $values['comentarios']), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding: 1%">
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#documentoModal"><i class="fas fa-file"></i> Añadir Documento</button>
                            <div class="col-md-12 table-responsive">
                                <table class="table table-striped" id="documentosTabla">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Archivo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row pull-right" style="padding: 1%">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit" >Guardar</button>
                                <button class="btn btn-gray" type="reset" >Limpiar</button>
                                <a href="<?php echo admin_url('pi/BusquedasController/');?>" class="btn btn-success">Volver atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="documentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'documentFrm']);?>
    <?php echo form_hidden('busquedas_id', $id);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'archivo');?>
                <?php echo form_input([
                    'id' => 'archivo',
                    'name' => 'archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                    'accept' => 'application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf, image/*'
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion');?>
                <?php echo form_input('descripcion','', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentarios');?>
                <?php echo form_textarea('comentarios','',['class' => 'form-control', 'id' => 'comentarios']);?>
            </div>
            
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="documentfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<?php init_tail();?>

<script>
        $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600,
        });
</script>

<!-- Script Documentos -->
<script>
    $("#documentfrmsubmit").on('click', function(e)
    {
        e.preventDefault();
        formData = new FormData();
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('archivo' , document.getElementById('archivo').files[0]);
        formData.append('descripcion', $("input[name=descripcion]").val());
        formData.append('comentarios', $("#comentarios").val());
        formData.append('busquedas_id', $("input[name=busquedas_id]").val());
        $.ajax({
            url: "<?php echo admin_url('pi/BusquedasController/documents')?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
        }).then(function(response){
            if(response.ok){
                $("#documentosTabla").DataTable({
                    ajax: {
                        url: "<?php echo admin_url('pi/BusquedasController/getDocuments/'.$id)?>",
                        dataSrc: ''
                    },
                    columns: [
                        'fecha',
                        'descripcion',
                        'archivo',
                        'acciones'
                    ]
                });
                $("#documentoModal").modal('hide');
            }
        })

    })
</script>
</body>
</html>