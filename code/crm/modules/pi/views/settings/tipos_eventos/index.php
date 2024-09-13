<div class="col-md-9">
    <h4 class="tw-font-semibold tw-mt-0 tw-text-neutral-800">
        Clases </h4>
    <div class="panel_s">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo admin_url("pi/TiposEventosController/create");?>" class="btn btn-primary pull-right">Añadir Tipo de Evento</a>
                    <table id="tableResult" class="ultimate table table-responsive">
                        <thead style="text-align: justify;">
                            <tr>
                                <td>Nº</td>
                                <td>Nombre</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($table as $key => $value){?> 
                                <tr>
                                    <td>
                                        <?php echo $value['num'];?>
                                    </td>
                                    <td>
                                        <?php echo $value['nombre'];?>
                                    </td>
                                    <td>
                                        <?php echo $value['acciones'];?>
                                    </td>
                                </tr>
                            <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

<?php init_tail(); ?>

</body>

</html>