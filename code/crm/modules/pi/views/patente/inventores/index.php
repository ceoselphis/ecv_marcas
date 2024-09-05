<?php init_head(); ?>
<?php $CI = &get_instance(); ?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <div class="_buttons">
              <a class="btn btn-primary" href="<?php echo admin_url('pi/patentes/InventoresController/create'); ?>"><i class="fas fa-plus"></i>Registrar Inventor</a>
              <button type="button" class="btn btn-default btn-outline pull-right" data-toggle="modal" data-target="#filterModal"><i class="fas fa-filter"></i> Filtro Avanazado</button>
              <a class="btn btn-primary" href="<?php echo admin_url("pi/patentes/InventoresController/GReport")?>?generate=pdfg" target="_blank"><i class="fas fa-pdf"></i>Generar reporte en pdf</a>
              <a class="btn btn-primary" href="<?php echo admin_url("pi/patentes/InventoresController/GReport")?>?generate=excelg" target="_blank"><i class="fas fa-pdf"></i>Generar reporte en Excel</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="min-w-full text-center text-sm font-light table" id="tableResult">
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
  th {
    text-align: center;
  }
</style>

<?php init_tail(); ?>

<?php echo $CI->load->view('patente/inventores/modal'); ?>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
  $.ajax({
    url: "<?php echo admin_url('pi/patentes/InventoresController/getInventores'); ?>",
    method: "GET",
    success: function(response) {
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
            data: 'acciones'
          }
        ],
      });
    }
  });
</script>




<script>
  $("select[multiple=multiple]").selectpicker({
    liveSearch: true,
    virtualScroll: 600
  });
</script>

<script>
  $(document).on('click', "#filter", function(e) {
    e.preventDefault();
    var formData = new FormData();
    console.log(formData);
    formData.append("pais_id", $("#pais_id").val());
    formData.append("nacionalidad", $('#nacionalidad').val());
    formData.append("csrf_token_name", $("input[name=csrf_token_name]").val());
    $.ajax({
      url: "<?php echo admin_url("pi/patentes/InventoresController/getInventores") ?>",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        data = JSON.parse(response);
        table = data.data;
        $(".table").DataTable().destroy();
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
              data: 'acciones'
            }
          ],
        });
      }
    })
  })
</script>

<script>
  $(document).on('click', "#limpiar", function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    $('#filter').trigger("reset");
  })
</script>

</body>

</html>