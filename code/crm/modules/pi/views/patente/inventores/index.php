<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/patentes/InventoresController/create'); ?>"><i class="fas fa-plus"></i>Registrar Inventor</a>
                        </div>
                    </div>
                    <div class="row">
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
                                    <button class="btn btn-danger delete-patente">
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
</script>




</body>

</html>