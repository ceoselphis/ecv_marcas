<div class="col-md-9">
    <h4 class="tw-font-semibold tw-mt-0 tw-text-neutral-800">
        Contadores </h4>
    <div class="panel_s">
        <div class="panel-body">
            <div class="row">
                <?php echo form_open();?>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-label">Marcas</label>
                            <input id="cont_marcas" name="cont_marcas" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Patentes</label>
                            <input id="cont_patentes" name="cont_patentes" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Derecho de Autor</label>
                            <input id="cont_autor" name="cont_autor" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Acciones a Terceros</label>
                            <input id="cont_act_ter" name="cont_act_ter" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

<?php init_tail(); ?>


<script>

    

</script>


</body>

</html>