<!-- Editar Cambio de Domicilio -->
<div class="modal fade" id="EditCambioDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Editar Cambio de Domicilio</h4>
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
                                    <a href="#Editcamdomstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio de Domicilio</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#Editcamdomstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cambio de Domicilio Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="Editcamdomstep1">
                            <input type="hidden" id="camdomid">
                            <div class="col-md-4">
                                <?php echo form_label('Oficina', 'oficina');?>
                                <?php echo form_dropdown(['name'=>'editoficinaCamDom','id'=>'editoficinaCamDom'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Staff', 'staff');?>  
                                <?php echo form_dropdown(['name'=>'editstaffCamDom','id'=>'editstaffCamDom'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Estado', 'estado');?>
                                <?php echo form_dropdown(['name'=>'editestadoCamDom','id'=>'editestadoCamDom'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                                <?php echo form_input(['name'=>'editnro_solicitudCamDom','id'=>'editnro_solicitudCamDom','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
                                <?php echo form_input([
                                            'id' => 'editfecha_solicitudCamDom',
                                            'name' => 'editfecha_solicitudCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                                <?php echo form_input(['name'=>'editnro_resolucionCamDom','id'=>'editnro_resolucionCamDom','class' => 'form-control'])?>
                                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
                                <?php echo form_input([
                                            'id' => 'editfecha_resolucionCamDom',
                                            'name' => 'editfecha_resolucionCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                                <?php echo form_input(['name'=>'editreferenciaclienteCamDom','id'=>'editreferenciaclienteCamDom'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'evento_comentario');?>
                                <?php echo form_textarea(['name'=>'editcomentarioCamDom','id'=>'editcomentarioCamDom'],'',['class' => 'form-control']);?>
                            </div>
                        </div> <!-- Fin Step 1 -->
                        <!-- step 2 -->
                        <div class="tab-pane" role="tabpanel" id="addcesionstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#Editarcambio_domicilioanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Editarcambio_domicilioanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="btnCambioDomicilioAnterior" class="btn btn-primary pull-right" >Añadir Cambio Domicilio Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Domicilio</th>
                                                                <th>Tipo de Domicilio</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_cambio_domicilio_anterior">
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
                                    <a href="#Editarcambio_domicilioactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Editarcambio_domicilioactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "btnCambioDomicilioActual" class="btn btn-primary pull-right"  >Añadir Cambio Domicilio Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Domicilio</th>
                                                                <th>Tipo de Domicilio</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_cambio_domicilio_actual">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!--Fin step 2 -->
                    </div> <!--Fin tab-content -->
                </div> <!--Fin row -->
            </div> <!--Fin modal_body -->
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="EditCambioDomiciliofrmsubmit" type="button" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
    <?php echo form_close();?>
</div>