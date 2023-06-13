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
                            <button type="button" class="btn btn-primary" data-dropdown-toggle="dropdown" id="dropdwnMenu"><i class="fas fa-plus"></i> Agregar</button>
                                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul aria-labelledby="dropdwnMenu" class="">
                                    <li>
                                        <a href="#">Materia</a>
                                        <a href="#">Clase Niza</a>
                                        <a href="#">Estatus</a>
                                    </li>
                                </ul>
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
