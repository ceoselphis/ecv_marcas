<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary"
                                href="<?php echo admin_url('pi/CorrespondeciaPlantillaController/create'); ?>"><i
                                    class="fas fa-plus"></i> Nueva Correspondencia Plantilla</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pre-scrollable">
                            <table class="table" id="tableResult">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Descripcion</th>
                                        <th>Staff</th>
                                        <th>Contenido</th>
                                        <th>Materia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

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
    th,
    td {
        text-align: center;
    }
</style>

<?php init_tail(); ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $('#tableResult').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            ajax: {
                url: '<?php echo admin_url('pi/CorrespondeciaPlantillaController/loadData') ?>',
                method: 'POST',
                data: {
                    "csrf_token_name": $("input[name=csrf_token_name]").val()
                }/* ,
                dataSrc: function (response) {
                    return response;
                } */
            },
            destroy: true,
            columns: [
                {data: 'id' },
                {data: 'descripcion' },
                {data: 'staff_id' },
                {data: 'content' },
                {data: 'materia' },
                {data: 'acciones' }
            ]

        });
    });
</script>


</body>

</html>