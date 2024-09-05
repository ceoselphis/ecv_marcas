<?php init_head();?>
<?php $CI = &get_instance();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="row">
                          <?php echo validation_errors(); ?>
                          <?php echo form_open(admin_url('pi/ContadoresGalena/update/'.$id), 'form'); ?>
                          <div class="col-md-12">
                              <?php echo form_label("contador_marca", "contador_marca", ['class' => 'form_control']);?>
                              <?php echo form_input([
                                'id' => 'contador_marca',
                                'name' => 'contador_marca',
                                'class' => 'form-control',
                                'value' => set_value('contador_marca', $contador_marca)
                              ]); ?>
                          </div>
                          <div class="col-md-12">
                              <?php echo form_label("contador_patente", "contador_patente", ['class' => 'form_control']);?>
                              <?php echo form_input([
                                'id' => 'contador_patente',
                                'name' => 'contador_patente',
                                'class' => 'form-control',
                                'value' => set_value('contador_patente', $contador_patente)
                              ]); ?>
                          </div>
                          <div class="col-md-12">
                              <?php echo form_label("contador_copyright", "contador_copyright", ['class' => 'form_control']);?>
                              <?php echo form_input([
                                'id' => 'contador_copyright',
                                'name' => 'contador_copyright',
                                'class' => 'form-control',
                                'value' => set_value('contador_copyright', $contador_copyright)
                              ]); ?>
                          </div>
                          <div class="col-md-12">
                              <?php echo form_label("contador_at", "contador_at", ['class' => 'form_control']);?>
                              <?php echo form_input([
                                'id' => 'contador_at',
                                'name' => 'contador_at',
                                'class' => 'form-control',
                                'value' => set_value('contador_at', $contador_at)
                              ]); ?>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail();?>
</body>
</html>