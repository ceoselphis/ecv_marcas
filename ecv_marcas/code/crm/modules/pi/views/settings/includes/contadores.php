<div class="col-md-9">
  <div class="row">
    <?php echo validation_errors(); ?>
    <?php echo form_open(admin_url('pi/ContadoresGalenaController/store'), 'form'); ?>
    <div class="col-md-12">
      <?php echo form_label("Contador Marca", "contador_marca", ['class' => 'form_control']); ?>
      <?php echo form_input([
        'id' => 'contador_marca',
        'name' => 'contador_marca',
        'class' => 'form-control',
        'value' => set_value('contador_marca', $contador_marca)
      ]); ?>
    </div>
    <div class="col-md-12">
      <?php echo form_label("Contador Patente", "contador_patente", ['class' => 'form_control']); ?>
      <?php echo form_input([
        'id' => 'contador_patente',
        'name' => 'contador_patente',
        'class' => 'form-control',
        'value' => set_value('contador_patente', $contador_patente)
      ]); ?>
    </div>
    <div class="col-md-12">
      <?php echo form_label("Contador Derecho de Autor", "contador_copyright", ['class' => 'form_control']); ?>
      <?php echo form_input([
        'id' => 'contador_copyright',
        'name' => 'contador_copyright',
        'class' => 'form-control',
        'value' => set_value('contador_copyright', $contador_copyright)
      ]); ?>
    </div>
    <div class="col-md-12">
      <?php echo form_label("Contador Acciones a Tercero", "contador_at", ['class' => 'form_control']); ?>
      <?php echo form_input([
        'id' => 'contador_at',
        'name' => 'contador_at',
        'class' => 'form-control',
        'value' => set_value('contador_at', $contador_at)
      ]); ?>
    </div>
  </div>
  <div class='row'>
    <div class="col-md-12" style="padding-top: 2%">
      <button class="pt-2 btn btn-primary" type="submit"> Guardar</button>
      <button class="pt-2 btn btn-gray" type="reset"> Limpiar</button>
      <a href="<?php echo admin_url(); ?>" class="btn btn-success">Volver atras</a>
    </div>
  </div>
</div>