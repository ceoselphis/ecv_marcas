<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <h4 class="tw-font-semibold tw-mt-0 tw-text-neutral-800">
                    Ajustes </h4>
                <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked">
                    <li class="settings-group-general active">
                        <a href="http://localhost:8080/pi/SettingsController/menu?group=contadores" data-group="general">
                            <i class="fa fa-cog menu-icon"></i>
                            Contadores

                        </a>
                    </li>
                    <li class="settings-group-company">
                        <a href="http://localhost:8080/pi/SettingsController/menu?group=publicaciones" data-group="company">
                            <i class="fa-solid fa-bars-staggered menu-icon"></i>
                            Publicaciones
                        </a>
                    </li>
                    <li class="settings-group-localization">
                        <a href="http://localhost:8080/pi/SettingsController/menu?group=clases" data-group="localization">
                            <i class="fa-solid fa-globe menu-icon"></i>
                            Clases

                        </a>
                    </li>
                </ul>
            </div>
            