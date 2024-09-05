<?php init_head(); ?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body" style="padding-bottom: 0%;">
                        <?php echo form_open(admin_url('pi/patentes/InventoresController/update/'.$id), 'form'); ?>
                        <div class="col-md-2">
                            <?php echo form_label('Código', 'codigo', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'codigo',
                                'name' => 'codigo',
                                'value' => set_value('codigo', str_pad($values[0]['codigo'], 4, '0', STR_PAD_LEFT)),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label('Pais', 'pais_id', ['class' => 'form-label']); ?>
                            <select id="pais_id" name="pais_id" class="form-control">
                                <option>Seleccione</option>
                                <?php foreach ($paises as $key => $value) { ?>
                                    <?php if(intval($values[0]['pais_id']) == $key){ ?>
                                        <option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>    
                                    <?php } ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label('Nombre', 'nombre', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'nombre',
                                'name' => 'nombre',
                                'value' => set_value('nombre', $values[0]['nombre']),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label('Apellido', 'apellido', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'apellido',
                                'name' => 'apellido',
                                'value' => set_value('apellido', $values[0]['apellido']),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_label('Direccion', 'direccion', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'direccion',
                                'name' => 'direccion',
                                'value' => set_value('direccion', $values[0]['direccion']),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_label('Nacionalidad', 'nacionalidad', ['class' => 'form-label']); ?>
                            <?php echo form_input([
                                'id' => 'nacionalidad',
                                'name' => 'nacionalidad',
                                'value' => set_value('nacionalidad', $values[0]['nacionalidad']),
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
                                'value' => set_value('comentarios', $values[0]['comentarios']),
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-gray" type="reset">Limpiar</button>
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