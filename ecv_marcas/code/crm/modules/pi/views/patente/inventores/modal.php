<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php echo form_open(admin_url('pi/patentes/InventoresController/getInventores'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']); ?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Filtrar por</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?php echo form_label("País", "pais_id"); ?>
                    <?php echo form_dropdown(
                      [
                        "id" => "pais_id",
                        "name" => "pais_id",
                        "class" => "form-control select",
                        "multiple" => "multiple",
                        "options" => $paises,
                      ]
                      ); ?>
                  </div>
                  <div class="col-md-6">
                    <?php echo form_label("Nacionalidad", "nacionalidad"); ?>
                    <?php echo form_input(
                      [
                        "id" => "nacionalidad",
                        "name" => "nacionalidad",
                        "class" => "form-control",	
                      ]
                      ); ?>
                  </div>
                </div>
            </div>
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="limpiar"  type="button" class="btn btn-gray">Limpiar</button>
                <button id="filterSubmit" type="button" class="btn btn-primary" data-dismiss="modal">Buscar</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>