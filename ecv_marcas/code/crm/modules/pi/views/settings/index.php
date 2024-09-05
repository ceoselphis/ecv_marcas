<?php init_head(); ?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-3">
                <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked">
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/contadores"); ?>"> Contadores</a>
                  </li>
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/boletines"); ?>"> Administrador Boletines</a>
                  </li>
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/paises"); ?>"> Administrador de Paises</a>
                  </li>
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/publicaciones"); ?>"> Administrador de Tipos de Publicaciones</a>
                  </li>
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/eventos"); ?>"> Administrador de Tipos de Eventos</a>
                  </li>
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/patentes"); ?>"> Administrador de Tipos de Patentes</a>
                  </li>
                  <li class="settings-group-general ">
                    <a href="<?php echo admin_url("pi/SettingsController/show/signos"); ?>"> Administrador de Tipos de Signos</a>
                  </li>

                </ul>
              </div>
              <?php switch ($id) {
                case 'contadores':
                  echo $this->load->view("includes/contadores");
                  break;
                case 'boletines':
                  echo $this->load->view("includes/boletines");
                  break;
                case 'paises':
                  echo $this->load->view("includes/paises");
                  break;
                case 'publicaciones':
                  echo $this->load->view("includes/publicaciones");
                  break;
                case 'eventos':
                  echo $this->load->view("includes/eventos");
                  break;
                case 'signos':
                  echo $this->load->view("includes/signos");
                  break;
              }
              ?>
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