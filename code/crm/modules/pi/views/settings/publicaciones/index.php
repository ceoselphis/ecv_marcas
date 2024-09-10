<div class="col-md-9">
    <h4 class="tw-font-semibold tw-mt-0 tw-text-neutral-800">
        Publicaciones </h4>
    <div class="panel_s">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="tableResult" class="ultimate table table-responsive display">
                        <thead style="text-align: justify;">
                            <tr>
                                <td>Nº</td>
                                <td>Nombre</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
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


<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo admin_url("pi/SettingsController/getTablePublicaciones"); ?>", 
            method: "get",
            dataType: "json",
            success: function(response) {
                new $('#tableResult').DataTable({
                    data: response.data,
                    destroy: true,
                    dataSrc: '',
                    columns: [
                        { data: 'num' },
                        { data: 'nombre' },
                        { data: 'acciones' }
                    ]
                });
            },
        });
    });
</script>


</body>

</html>