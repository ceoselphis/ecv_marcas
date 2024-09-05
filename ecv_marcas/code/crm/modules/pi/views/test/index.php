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
    <div class="col-md-12">
        <div class="list-content">
            <a href="#cambio_domicilioanterior" id="Alertacambio_domicilioanterior"data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Anterior<i class="fa fa-chevron-down"></i></a>
                <div class="collapse" id="cambio_domicilioanterior">
                    <div class="list-box">
                        <div class="row">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-12">
        <div class="list-content">
            <a href="#cambio_domicilioactual" id="Alertacambio_domicilioactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Actual<i class="fa fa-chevron-down"></i></a>
                <div class="collapse" id="cambio_domicilioactual">
                    <div class="list-box">
                        <div class="row">
                            <div class="col-md-12">
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


<!-- Añadir Fusion -->
<div class="modal fade" id="AddFusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'fusionFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Añadir Fusion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#addfusionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#addfusionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="addfusionstep1">
                            <input type="hidden" id="fusionid">
                            <div class="col-md-6">
                                <?php echo form_label('Oficina', 'oficina');?>
                                <?php echo form_dropdown(['name'=>'oficinaFusion','id'=>'oficinaFusion'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Estado', 'estado');?>
                                <?php echo form_dropdown(['name'=>'estadoFusion','id'=>'estadoFusion'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                                <?php echo form_input(['name'=>'nro_solicitudFusion','id'=>'nro_solicitudFusion','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudFusion',
                                            'name' => 'fecha_solicitudFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                                <?php echo form_input(['name'=>'nro_resolucion','id'=>'nro_resolucionFusion','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionFusion',
                                            'name' => 'fecha_resolucionFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                                <?php echo form_input(['name'=>'referenciaclienteFusion','id'=>'referenciaclienteFusion'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'evento_comentario');?>
                                <?php echo form_textarea(['name'=>'comentarioFusion','id'=>'comentarioFusion'],'',['class' => 'form-control']);?>
                            </div>
                        </div><!-- fin step1 -->
                        <!-- step 2 -->
                        <div class="tab-pane " role="tabpanel" id="addfusionstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#AddFusionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="AddFusionanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="btnFusionAnterior" class="btn btn-primary pull-right" >Añadir Fusion Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Fusion</th>
                                                                <th>Tipo de Fusion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                    <tbody id = "body_Fusion_anterior">
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#AddFusionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="AddFusionactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "btnFusionActual" class="btn btn-primary pull-right"  >Añadir Fusion Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Fusion</th>
                                                                <th>Tipo de Fusion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_Fusion_actual">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- fin step 2  -->
                    </div><!-- fin tab-content -->
                </div><!-- fin row -->
            </div><!-- fin Modal Body -->
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="addfusionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Fusion -->
<div class="modal fade" id="EditFusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Fusion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="fusionid">
        <div class="col-md-6">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'editoficinaFusion','id'=>'editoficinaFusion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadoFusion','id'=>'editestadoFusion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudFusion','id'=>'editnro_solicitudFusion','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_solicitudFusion',
                                            'name' => 'editfecha_solicitudFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucion','id'=>'editnro_resolucionFusion','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_resolucionFusion',
                                            'name' => 'editfecha_resolucionFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclienteFusion','id'=>'editreferenciaclienteFusion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editcomentarioFusion','id'=>'editcomentarioFusion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="list-content">
            <a href="#EditarFusionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Anterior<i class="fa fa-chevron-down"></i></a>
                <div class="collapse" id="EditarFusionanterior">
                    <div class="list-box">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="btnFusionAnterior" class="btn btn-primary pull-right" >Añadir Fusion Anterior</button>
                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Fusion</th>
                                                    <th>Tipo de Fusion</th>
                                                    <th>Propietario</th>
                                                    <th>Acciones</th>
                                                </tr>
                                        </thead>
                                            <tbody id = "body_Fusion_anterior">
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-12">
        <div class="list-content">
            <a href="#EditarFusionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Actual<i class="fa fa-chevron-down"></i></a>
                <div class="collapse" id="EditarFusionactual">
                    <div class="list-box">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id = "btnFusionActual" class="btn btn-primary pull-right"  >Añadir Fusion Actual</button>
                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Fusion</th>
                                                    <th>Tipo de Fusion</th>
                                                    <th>Propietario</th>
                                                    <th>Acciones</th>
                                                </tr>
                                        </thead>
                                            <tbody id = "body_Fusion_actual">
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
        <button id="editfusionfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>