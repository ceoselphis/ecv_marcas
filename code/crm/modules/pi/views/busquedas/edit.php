<?php 
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php');  ?>

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
                        <h4>Editar Solicitud de Busqueda de Marca</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open_multipart("", ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
                        <?php echo form_hidden('id', $id);?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Cliente', 'client_id');?>
                                <br />
                                <?php echo form_dropdown('client_id', $clients, set_value('client_id', $values['client_id']), ['id' => 'client_id' , 'class' => 'form-control']);?>
                                <?php echo form_error('client_id', '<div class="text-danger">', '</div>');?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Oficina Tramitante', 'oficina_id' );?>
                                <br />
                                <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id', $values['oficina_id']), ['id' => 'oficina_id' ,'class' => 'form-control']);?>
                                <?php echo form_error('oficina_id', '<div class="text-danger">', '</div>');?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-4">
                                <?php echo form_label('Responsable', 'staff_id');?>
                                <?php echo form_dropdown('staff_id', $staff, set_value('staff_id', $values['staff_id']), ['id' => 'staff_id' , 'class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Marca', 'marca');?>
                                <?php echo form_input('marca', set_value('marca', $values['marca']), ['id' => 'marca' , 'class' => 'form-control', 'maxlength' => '255']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Clase', 'clase_niza_id');?>
                                <?php echo form_dropdown('clase_niza_id', $claseNiza, set_value('clase_niza_id', $values['clase_niza_id']), ['id' => 'clase_niza_id' , 'class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-4">
                                <?php echo form_label('Pais', 'pais_id');?>
                                <?php echo form_dropdown('pais_id', $paises, set_value('pais_id', $values['pais_id']), ['id' => 'pais_id' , 'class' => 'form-control']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Solicitud', 'fecha_solicitud');?>
                                <?php echo form_input('fecha_solicitud', set_value('fecha_solicitud', $values['fecha_solicitud']), ['id' => 'fecha_solicitud' , 'class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Respuesta', 'fecha_respuesta', $values['fecha_respuesta']);?>
                                <?php echo form_input('fecha_respuesta', set_value('fecha_respuesta', $values['fecha_respuesta']), ['id' => 'fecha_respuesta' , 'class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Ref Cliente', 'ref_cliente');?>
                                <?php echo form_input('ref_cliente', set_value('ref_cliente', $values['ref_cliente']), ['id' => 'ref_cliente' , 'class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Interna', 'busqueda_interna_id');?>
                                <?php echo form_dropdown('busqueda_interna_id', $tipoBusqueda, set_value('busqueda_interna_id', $values['busqueda_interna_id']), ['id' => 'busqueda_interna_id' , 'class' => 'form-control']);?>                                
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Externa', 'busqueda_externa_id');?>
                                <?php echo form_dropdown('busqueda_externa_id', $tipoBusqueda, set_value('busqueda_externa_id', $values['busqueda_externa_id']), ['id' => 'busqueda_externa_id' , 'class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-12">
                                <?php echo form_label('Comentarios', 'comentarios');?>
                                <?php echo form_textarea('comentarios', set_value('comentarios', $values['comentarios']), ['id' => 'comentarios' , 'class' => 'form-control' , 'style' => 'height:100px']);?>
                            </div>
                        </div>
                        <div class="row" style="padding: 2%">
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#documentoModal"><i class="fas fa-file"></i> Añadir Documento</button>
                            <div class="col-md-12 table-responsive" style ="padding-top:20px">
                                <table class="table table-striped" id="documentosTabla">
                                    <thead>
                                        <tr>
                                            <th>Descripcion</th>
                                            <th>Comentarios</th>
                                            <th>Archivo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabDocContent">

                                    </tbody>
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
                <?php echo form_label('Descripcion', 'descripcion');?>
                <?php echo form_input('descripcion','', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="padding-top:10px">
                <?php echo form_label('Comentarios', 'comentarios');?>
                <?php echo form_textarea('comentarios','',['class' => 'form-control', 'style' => 'height : 150px', 'id' => 'comentarios']);?>
            </div>
            <div class="col-md-12" style="padding-top:10px">
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css"/>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>

<script>
        $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600,
        });
</script>

<!-- Script Documentos -->
<script>
    $('#modal-loading').modal('show');
    $(function() {
        $("#AddAccion").css({
            "padding-left": "7px",
        });
        
        $('#modal-loading').modal('hide');
    });

    $("#solicitudfrm").on('submit', function(e) {
        e.preventDefault();
        console.log(" Llegue a Solicitud ");
        var formData = new FormData();
        data = {
            'id' : '<?php echo $id; ?>',
            'client_id' : $("#client_id").val(),
            'oficina_id' : $("#oficina_id").val(),
            'staff_id' : $("#staff_id").val(),
            'marca' : $("#marca").val(),
            'clase_niza_id'  : $("#clase_niza_id").val(),
            'pais_id' : $("#pais_id").val(),
            'fecha_solicitud' : $("#fecha_solicitud").val(),
            'fecha_respuesta' : $("#fecha_respuesta").val(),
            'ref_cliente' : $("#ref_cliente").val(),
            'busqueda_interna_id' : $("#busqueda_interna_id").val(),
            'busqueda_externa_id' : $("#busqueda_externa_id").val(),
            'comentarios' : $("#comentarios").val(),
        };
        console.log(" Data ", data);
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('id', data.id);
        formData.append('client_id', data.client_id);
        formData.append('oficina_id', data.oficina_id);
        formData.append('staff_id', data.staff_id);
        formData.append('marca', data.marca);
        formData.append('clase_niza_id', data.clase_niza_id);
        formData.append('pais_id', data.pais_id);
        formData.append('fecha_solicitud', data.fecha_solicitud);
        formData.append('fecha_respuesta', data.fecha_respuesta);
        formData.append('ref_cliente', data.ref_cliente);
        formData.append('busqueda_interna_id', data.busqueda_interna_id);
        formData.append('busqueda_externa_id', data.busqueda_externa_id);
        formData.append('comentarios', data.comentarios);
        let url = '<?php echo admin_url('pi/BusquedasController/updateBusqueda/'); ?>';
        url += data.id;
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(" Response " , response);
                const obj = JSON.parse(response);
                if (obj.code == 200) {
                    alert_float('success', 'Solicitud actualizada con éxito!');
                    let ruta = '<?php echo admin_url("pi/BusquedasController/"); ?>';
                    location.replace(ruta);
                } else if (obj.code == 500) {
                    console.log(" Error en Crear la solicitud ");
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
    });

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
            url: "<?php echo admin_url('pi/DocumentosBusquedasController/store')?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                $.ajax({
                    url:"<?php echo admin_url('pi/DocumentosBusquedasController/index/'.$id)?>",
                    method:"POST",
                    success: function(response){
                        table = JSON.parse(response);
                        $("#documentosTabla").DataTable({
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                            },
                            destroy: true,
                            data: table,
                            columns : [
                                { data: 'descripcion'},
                                { data: 'comentarios'},
                                { data: 'archivo'},
                                { data: 'acciones'},
                            ]
                        });  
                    }
                });
                $("#documentoModal").modal('hide');
            }
        });
    });

   
    $(document).on('click','.btnsubmit', function(e){
        e.preventDefault();
        let docId = $(this).attr('id');
        $.ajax({
            url: "<?php echo admin_url('pi/DocumentosBusquedasController/destroy/')?>"+docId,
            method: "POST",
            success: function(response)
            {
                $.ajax({
                    url:"<?php echo admin_url('pi/DocumentosBusquedasController/index/'.$id)?>",
                    method:"POST",
                    success: function(response){
                        table = JSON.parse(response);
                        $("#documentosTabla").DataTable({
                            destroy: true,
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                            },
                            data: table,
                            dataSrc: '',
                            columns : [
                                { data: 'descripcion'},
                                { data: 'comentarios'},
                                { data: 'archivo'},
                                { data: 'acciones'},
                            ]
                        });  
                    }
                });
            } 
        })
    })


    $(document).ready(function()
    {
        $.ajax({
            url:"<?php echo admin_url('pi/DocumentosBusquedasController/index/'.$id)?>",
            method:"POST",
            success: function(response){
                table = JSON.parse(response);
                $("#documentosTabla").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    destroy: true,
                    data: table,
                    dataSrc: '',
                    columns : [
                        { data: 'descripcion'},
                        { data: 'comentarios'},
                        { data: 'archivo'},
                        { data: 'acciones'},
                    ]
                });  
            }
        });
    });
</script>
</body>
</html>

