<?php 
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php'); 
?>
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
                        <h4>Lista de Solicitud de Busqueda de Marca</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            
                            <a class="btn btn-primary pull-right" href="<?php echo admin_url('pi/BusquedasController/create');?>"><i class="fas fa-plus"></i> Nueva búsqueda</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding: 2%">
                                <table class="table table-responsive" id="tableResult" >                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Marca</th>
                                            <th>Clase</th>
                                            <th>Pais</th>
                                            <th>Responsable</th>
                                            <th>Búsqueda Interna</th>
                                            <th>Búsqueda General</th>
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
    th, td {
        text-align: center;
    }
    
</style>

<?php init_tail();?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css"/>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
<script>
    $('#modal-loading').modal('show');
    $(function() {
        $("#AddAccion").css({
            "padding-left": "7px",
        });
        setTimeout(function() { 
            $('#modal-loading').modal('hide');
        }, 5000);
    });

    $(document).ready(function()
    {
        $.ajax({
            url:"<?php echo admin_url('pi/BusquedasController/getBusquedas/')?>",
            method:"GET",
            success: function(response){
                table = JSON.parse(response);
                $("#tableResult").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    destroy: true,
                    data: table,
                    dataSrc: '',
                    columns : [
                        { data: 'id'},
                        { data: 'marca'},
                        { data: 'clase'},
                        { data: 'pais'},
                        { data: 'responsable'},
                        { data: 'busqueda_interna'},
                        { data: 'busqueda_general'},
                        { data: 'acciones'},
                    ]
                });  
            }
        });
    });
    
</script>


</body>
</html>