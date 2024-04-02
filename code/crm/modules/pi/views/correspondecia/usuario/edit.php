<?php init_head(); ?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/CorrespondeciaUsuarioController/update/' . $id), 'form'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Clientes', 'cliente'); ?>
                                <?php echo form_dropdown(['name' => 'cliente', 'class' => 'form-control', 'id' => 'cliente'], $clientes, $values[0]['cliente']); ?>
                                <?php echo form_error('cliente', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label($labels[2], $labels[2]); ?>
                                <br />
                                <?php echo form_input(
                                    array(
                                        'name' => 'expediente',
                                        'id' => 'expediente',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['expediente']
                                    )
                                ); ?>
                                <?php echo form_error('expediente', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="padding-top: 15px;">
                                <?php echo form_label($labels[3], $labels[3]); ?>
                                <br />
                                <?php echo form_dropdown(['name' => 'staff_id', 'class' => 'form-control', 'id' => 'staff_id'], $staffid, $values[0]['staff_id']); ?>
                                <?php echo form_error('staff_id', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6" style="padding-top: 15px;">
                                <?php echo form_label($labels[4], $labels[4]); ?>
                                <br />
                                <?php echo form_dropdown(['name' => 'plantilla_id', 'class' => 'form-control', 'id' => 'plantilla_id'], $plantilla, $values[0]['plantilla_id']); ?>
                                <?php echo form_error('plantilla_id', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <br />
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-gray" type="reset">Limpiar</button>
                                <a href="<?php echo admin_url('pi/CorrespondeciaUsuarioController/'); ?>"
                                    class="btn btn-success">Volver atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail(); ?>