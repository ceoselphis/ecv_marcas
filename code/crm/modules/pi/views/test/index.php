<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/AnexosController/create');?>"><i class="fas fa-plus"></i> Nuevo Anexo</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Archivo</th>
                                            <th>Descripcion</th>
                                            <th>Creado Por</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($marcas)) {?>
                                            <?php foreach ($marcas as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>
                                                    <td><?php echo $row['marcas_id'];?></td>
                                                    <td><?php echo $row['descripcion'];?></td>
                                                    <td><?php echo $row['path'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/AnexosController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/AnexosController/edit/{$row['id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr colspan="3">
                                            <td>Sin Registros</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    th, td {
        text-align: center;
    }
    
</style>

<?php init_tail();?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable(".table", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>


</body>
</html>

                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cambio_domicilio" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio de Domicilio<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cambio_domicilio">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCambioDomicilio">Añadir cambio de domicilio</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Staff</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                </thead>
                                                                    <tbody id = "body_cambio_domicilio">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


<!-- Añadir Cambio de Domicilio -->
<div class="modal fade" id="AddCambioDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Domicilio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="camdomid">
        <div class="col-md-4">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'oficinaCamDom','id'=>'oficinaCamDom'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'staffCamDom','id'=>'staffCamDom'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadoCamDom','id'=>'estadoCamDom'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudCamDom','id'=>'nro_solicitudCamDom','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudCamDom',
                                            'name' => 'fecha_solicitudCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionCamDom','id'=>'nro_resolucionCamDom','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionCamDom',
                                            'name' => 'fecha_resolucionCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclienteCamDom','id'=>'referenciaclienteCamDom'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'comentarioCamDom','id'=>'comentarioCamDom'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
        <div class="all-info-container">
        <div class="list-content">
            <a href="#cambio_domicilioactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio de Domicilio<i class="fa fa-chevron-down"></i></a>
                <div class="collapse" id="cambio_domicilioactual">
                    <div class="list-box">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCambioDomicilio">Añadir cambio de domicilio</button>
                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Oficina</th>
                                                    <th>Staff</th>
                                                    <th>Estado</th>
                                                    <th>Nº de Solicitud</th>
                                                    <th>Fecha de Solicitud</th>
                                                    <th>Nº de Resolucion</th>
                                                    <th>Fecha de Resolucion</th>
                                                    <th>Referencia Cliente</th>
                                                    <th>Comentarios</th>
                                                    <th>Acciones</th>
                                                </tr>
                                        </thead>
                                            <tbody id = "body_cambio_domicilio">
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AddCambioDomiciliofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>