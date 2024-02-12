<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/PropietariosController/create');?>"><i class="fas fa-plus"></i> Nuevo propietario</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/PropietariosController/generateReport');?>"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
                            </div>
                        </div>
                        <div class="row" >
                            
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Pais</th>
                                            <th>Nº Poder</th>
                                            <th>Fecha Creacion</th>
                                            <th>Creado por</th>
                                            <th>Fecha Modificacion</th>
                                            <th>Modificado Por</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body_propietarios">
                                    
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<?php init_tail();?>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable("#tableResult", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>
<script>
    Propietarios();
    function Propietarios() {
        let url = '<?php echo admin_url("pi/PropietariosController/showPropietarios/"); ?>';
        let eliminar = '<?php echo admin_url("pi/PropietariosController/destroy/"); ?>';
        let modificar = '<?php echo admin_url("pi/PropietariosController/edit/");?>'
        console.log(url); 
        let body = ``;
        $.get(url, function(response) {
            let listadomicilio = JSON.parse(response);
            console.log(listadomicilio);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                modificar = modificar + item.id;
                body += `<tr Propietariosid = "${item.id}"> 
                                    <td class="text-center">${item.codigo}</td>
                                    <td class="text-center">${item.nombre}</td>
                                    <td class="text-center">${item.pais}</td>
                                    <td class="text-center">${item.poder_num}</td>
                                    <td class="text-center">${item.fecha_creacion}</td>
                                    <td class="text-center">${item.creado_por}</td>
                                    <td class="text-center">${item.fecha_modificacion}</td>
                                    <td class="text-center">${item.modificado_por}</td>
                                    <form method="DELETE" action="${eliminar}" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                    <td>
                                        <a class="btn btn-light" href="${modificar}"><i class="fas fa-edit"></i>Editar</a>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                    </td>
                                    </form> 
                                </tr>
                            `
            });
            $('#body_propietarios').html(body);
        })
    }

</script>
</body>
</html>