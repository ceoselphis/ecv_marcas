<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="_filters _hidden_inputs hidden">
                        <?php echo render_select('states', ["Todos", "Estado 1"], ["form-control"]);?>
                    </div>

                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/materias/create');?>"><i class="fas fa-plus"></i> Nueva Materia</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/clase_niza/create');?>"><i class="fas fa-plus"></i> Nueva Clase Niza</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/pais/create');?>"><i class="fas fa-plus"></i> Nuevo Pais</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/anexos/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Anexo</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/tipo_solicitud/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Solicitud</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/tipo_solicitud/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Busqueda</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                
                            </div>
                            <div class="col-4">
                                
                            </div>
                            <div class="col-4">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
</body>
</html>
