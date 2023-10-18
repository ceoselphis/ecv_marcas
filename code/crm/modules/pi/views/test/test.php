<div class="row">
    <div class="wizard">
        <div class="wizard-inner">
        <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                    <a href="#addcesionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                </li>
                <li role="presentation" >
                    <a href="#addcesionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="main_form">
        <!-- Step 1 -->
        <div class="tab-pane active" role="tabpanel" id="addcesionstep1">
            <input type="hidden" id="cesionid">
            <div class="col-md-3">
                <?php echo form_label('Cliente', 'cliente');?>
                <?php echo form_dropdown(['name'=>'clienteCesion','id'=>'clienteCesion'], $clientes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficina');?>
                <?php echo form_dropdown(['name'=>'oficinaCesion','id'=>'oficinaCesion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'staffCesion','id'=>'staffCesion'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadoCesion','id'=>'estadoCesion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudCesion','id'=>'nro_solicitudCesion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
                <?php echo form_input([
                                            'id' => 'fecha_solicitudCesion',
                                            'name' => 'fecha_solicitudCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitudCesion'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionCesion','id'=>'nro_resolucionCesion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Fecha de Resolucion', 'fecharesolucion');?>
                <?php echo form_input([
                                            'id' => 'fecha_resolucionCesion',
                                            'name' => 'fecha_resolucionCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_resolucionCesion'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclienteCesion','id'=>'referenciaclienteCesion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'comentarioCesion','id'=>'comentarioCesion'],'',['class' => 'form-control']);?>
            </div>
        </div><!-- fin step 1 -->
        <!-- step 2 -->
        <div class="tab-pane " role="tabpanel" id="addcesionstep2">
            <div class="col-md-12">
                <div class="list-content">
                    <a href="#AddCesionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Anterior<i class="fa fa-chevron-down"></i></a>
                    <div class="collapse" id="AddCesionanterior">
                        <div class="list-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="addbtnCesionAnterior" class="btn btn-primary pull-right" >Añadir Cesion Anterior</button>
                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Cesion</th>
                                                <th>Tipo de Cesion</th>
                                                <th>Propietario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "body_Cesion_anterior">
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
                        <a href="#AddCesionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Actual<i class="fa fa-chevron-down"></i></a>
                        <div class="collapse" id="AddCesionactual">
                            <div class="list-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id = "btnCesionActual" class="btn btn-primary pull-right"  >Añadir Cesion Actual</button>
                                        <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Cesion</th>
                                                    <th>Tipo de Cesion</th>
                                                    <th>Propietario</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id = "body_Cesion_actual">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div> <!--fin Step 2-->
    </div> <!--fin tab-content-->
</div> <!--fin row-->



<div class="row">
    <div class="wizard">
        <div class="wizard-inner">
        <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                    <a href="#editcesionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                </li>
                <li role="presentation" >
                    <a href="#editcesionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="main_form">
        <!-- Step 1 -->
        <div class="tab-pane active" role="tabpanel" id="editcesionstep1">
            <input type="hidden" id="cesionid">
            <div class="col-md-3">
                <?php echo form_label('Cliente', 'cliente');?>
                <?php echo form_dropdown(['name'=>'editclienteCesion','id'=>'editclienteCesion'], $clientes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficina');?>
                <?php echo form_dropdown(['name'=>'editoficinaCesion','id'=>'editoficinaCesion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'editstaffCesion','id'=>'editstaffCesion'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadoCesion','id'=>'editestadoCesion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudCesion','id'=>'editnro_solicitudCesion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Fecha de Solicitud', 'fecha_solicitud');?>
                <?php echo form_input([
                                            'id' => 'editfecha_solicitudCesion',
                                            'name' => 'editfecha_solicitudCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucionCesion','id'=>'editnro_resolucionCesion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Fecha de Resolucion', 'fecharesolucion');?>
                <?php echo form_input([
                                            'id' => 'editfecha_resolucionCesion',
                                            'name' => 'editfecha_resolucionCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclienteCesion','id'=>'editreferenciaclienteCesion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editcomentarioCesion','id'=>'editcomentarioCesion'],'',['class' => 'form-control']);?>
            </div>
        </div><!--Fin Step 1 -->
        <!-- step 2 -->
        <div class="tab-pane " role="tabpanel" id="editcesionstep2">                              
            <div class="col-md-12">
                <div class="list-content">
                <a href="#EditarCesionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Anterior<i class="fa fa-chevron-down"></i></a>
                    <div class="collapse" id="EditarCesionanterior">
                        <div class="list-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="btnCesionAnterior" class="btn btn-primary pull-right" >Añadir Cesion Anterior</button>
                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Cesion</th>
                                                <th>Tipo de Cesion</th>
                                                <th>Propietario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                            <tbody id = "body_Cesion_anterior">
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
                <a href="#EditarCesionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Actual<i class="fa fa-chevron-down"></i></a>
                <div class="collapse" id="EditarCesionactual">
                    <div class="list-box">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id = "btnCesionActual" class="btn btn-primary pull-right"  >Añadir Cesion Actual</button>
                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Cesion</th>
                                                <th>Tipo de Cesion</th>
                                                <th>Propietario</th>
                                                <th>Acciones</th>
                                            </tr>
                                    </thead>
                                        <tbody id = "body_Cesion_actual">
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- fin step 2 -->
    </div> <!-- fin tab-content -->
</div> <!-- fin row -->

<!-- Fusion fusion -->
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
            </div>
        </div><!-- fin step 2  -->
    </div><!-- fin tab-content -->
</div><!-- fin row -->