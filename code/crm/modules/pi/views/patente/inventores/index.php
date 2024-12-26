<?php $CI = &get_instance();
init_head(); 
$CI->load->view('marcas/solicitudes/css.php'); ?>
<div id="wrapper">
    <div class="content">
        <!-- Loading Modal -->
        <div class="modal" id="modal-loading" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="loading-spinner mb-2"></div>
                        <div>Cargando...</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4>Lista de Inventores</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/patentes/InventoresController/create'); ?>"><i class="fas fa-plus"></i> Registrar Inventor</a>
                        </div>
                    </div>
                    <div class="row" style="padding: 2%;">
                        <div class="col-md-12">
                            <table class="min-w-full text-left text-sm font-light table" id="tableResult">
                                <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Código</th>
                                        <th scope="col" class="px-6 py-4">Pais</th>
                                        <th scope="col" class="px-6 py-4">Nombre</th>
                                        <th scope="col" class="px-6 py-4">Apellido</th>
                                        <th scope="col" class="px-6 py-4">Nacionalidad</th>
                                        <th scope="col" class="px-6 py-4">Acciones</th>
                                    </tr>
                                </thead>
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
    $('#modal-loading').modal('show');
    $(function() {
        $("#AddAccion").css({
            "padding-left": "7px",
        });
        setTimeout(function() {
            $('#modal-loading').modal('hide');
        }, 3000);
    });
    Patente();
    function Patente(){
        let edit =  "<?php echo admin_url('pi/patentes/InventoresController/edit/'); ?>";
       
        $.ajax({
            url: "<?php echo admin_url('pi/patentes/InventoresController/show'); ?>",
            method: "GET",
            success: function(response) {
                
                console.log("Response ", response);
                data = JSON.parse(response);
                table = data.data;
                console.log(table);
                new DataTable(".table", {
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    },
                    destroy: true,
                    data: data.data,
                    columns: [{
                            data: 'codigo'
                        },
                        {
                            data: 'pais'
                        },
                        {
                            data: 'nombre'
                        },
                        {
                            data: 'apellido'
                        },
                        {
                            data: 'nacionalidad'
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                            editar = edit + row.id;
                            console.log(" edit ",editar);
                            return `
                                <td class="text-center">
                                    <a class="btn btn-light" href="${editar}" style="background-color: white;">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button class="btn btn-danger delete-inventores" data-inventores="${row.id}">
                                        <i class="fas fa-trash"></i> Borrar
                                    </button>
                                </td>`;
                            }
                        }
                    ]
                });

                
            }
        });
    }

    $('.table').on('click', '.delete-inventores', function (e) {
        e.preventDefault();
        console.log(" Llegue a eliminar Inventores")
        let inventores_id = $(this).data('inventores');
        console.log("Legue a elimar la Inventores ", inventores_id);
        var formData = new FormData();
        if (confirm("Quieres eliminar este registro?")) {
            formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
            let url = '<?php echo admin_url("pi/patentes/InventoresController/destroyInventores/"); ?>';
            url = url + inventores_id;
            console.log("url ", url);
                    // $.ajax({
                    //     url : url,
                    //     method: 'POST',
                    //     data: formData,
                    //     processData: false,
                    //     contentType: false
                    // }).then(function (response) {
                    //     console.log("Response ",response);
                    //   //  Patente();
                    //    // alert_float('success', "Eliminado Intentores Correctamente");
                    // }).catch(function (response) {
                    //     alert_float('danger' , "No se pudo Eliminar la Intentores");
                    // });

            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    console.log("Response ", response);
                    Patente();
                    alert_float('success', "Eliminado Inventores Correctamente");
                },
                error: function(response) { 
                    alert_float('danger' , "No se pudo Eliminar la Inventores");
                }
            });
        }
    });
</script>




</body>

</html>