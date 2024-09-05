<?php 
$CI = &get_instance();
init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open(admin_url('pi/PropietariosController/store'),['id' => 'propietariosFrm' , 'name' => 'propietariosFrm']);?>
                <?php echo form_hidden('id', $id);?>
                    <div class="panel_s">
                        <div class="panel-body">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                        <li role="presentation" class="active">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Propietario</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Poder</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Notas</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Documentos</i></a>
                                        </li>
                                    </ul>
                            </div>
                            
                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Código', 'codigo');?>
                                            <?php echo form_input([
                                                'id' => 'codigo',
                                                'name' => 'codigo',
                                                'required' => 'required',
                                                'class' => 'form-control',
                                                'value' => set_value('codigo', $id),
                                            ]);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Pais', 'pais_id');?>
                                            <?php echo form_dropdown('pais_id', $paises ,set_value('pais_id', ''), ['class' => 'form-control'])?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Propietario', 'propietario')?>
                                            <?php echo form_input('nombre_propietario', set_value('propietario', ''),['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Estado Civil',);?>
                                            <?php echo form_dropdown('estado_civil', ['Soltero(a)', 'Casado(a)', 'Divorciado(a)', 'Viudo(a)', 'Concubinato(a)'], set_value('estado_civil', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Representante Legal','representante_legal');?>
                                            <?php echo form_input('representante_legal',  set_value('representante_legal', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo form_label('Direccion','direccion');?>
                                            <?php echo form_textarea('direccion',  set_value('direccion', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Ciudad','ciudad');?>
                                            <?php echo form_input('ciudad',  set_value('ciudad', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Estado','estado');?>
                                            <?php echo form_input('estado',  set_value('estado', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Código Postal','codigo_postal');?>
                                            <?php echo form_input('codigo_postal',  set_value('codigo_postal', ''), ['class' => 'form-control']);?>
                                        </div> 
                                        <div class="col-md-6">
                                            <?php echo form_label('Actividad Comercial','actividad_comercial');?>
                                            <?php echo form_input('actividad_comercial',  set_value('actividad_comercial', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo form_label('Datos Registro','actividad_comercial');?>
                                            <?php echo form_textarea('datos_registro',  set_value('datos_registro', ''), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for>Datos registro</label>
                                            <select name="datosRegistro">
                                                <option value="">Seleccione una opcion</option>
                                                <option value="empresa constituida y existente conforme a las leyes de , domiciliada en ">Persona Juridica</option>
                                                <option value="">Persona Natural</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="col-md-2">
                                        <?php echo form_label('Número','poder_num');?>
                                        <?php 
                                        echo form_input('numero',  set_value('numero', ''), ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Fecha','fecha');?>
                                        <?php 
                                        echo form_input('fecha',  set_value('fecha', ''), ['class' => 'form-control calendar']);?>
                                    </div>
                                    <div class="col-md-8">
                                        <?php echo form_label('Apoderados', 'apoderados');?>
                                        <?php echo form_dropdown('apoderados', $staff ,set_value('apoderados', ''), ['class' => 'form-control', 'multiple' => 'multiple'])?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php echo form_label('Origen','origen');?>
                                        <?php 
                                        echo form_textarea('origen',  set_value('origen', ''), ['class' => 'form-control']);?>
                                    </div>
                                    
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="col-12">
                                        <?php echo form_label('Notas', 'notas');?>
                                        <?php echo form_textarea('notas', set_value('notas', ''), ['class' => 'form-control'])?>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 4 -->
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="col-md-12" style="padding-top: 1.5%" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#documentos" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Documentos<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="documentos">
                                                    <div class="list-box">
                                                        <div class="col-12" >
                                                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#documentosModal">Añadir</button>
                                                        </div>
                                                        <div class="col-md-12" style="padding: 1% 1% 1% 0%;">    
                                                            <table class="table table-striped text-justify" id="docTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Documento</th>
                                                                    </tr>
                                                                </thead>
                                                            </table> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Documentos Modal -->
<div class="modal fade" id="documentosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'documentosApoderadosFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir documentos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo form_label('Descripcion', 'descripcion');?>
                <?php echo form_input('descrpcion', set_value('descripcion'), ['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Archivo', 'archivo');?>
                <?php echo form_input([
                    'id' => 'archivo',
                    'name' => 'archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                    "accept"=> ".pdf"
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'Comentarios');?>
                <?php echo form_textarea('comentarios', set_value('comentarios'), ['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="documentoFrmSubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>


<?php init_tail();?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css"/>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>

    <script>
    function fecha(){
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if(dd<10){
            dd = '0'+dd;
        }
        else if(mm<10){
            mm = '0'+mm;
        }
        fecha = dd+"/"+mm+"/"+yy;
        return fecha;
    }


    $(".calendar").on('keyup', function(e){
        e.preventDefault();
        $(".calendar").val('');
    })
    $( function() {
        $(".calendar").datetimepicker({
            maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker:false,
        });
    });
    </script>
    <script>
        $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600,
        })
        $("select[multiple=multiple]").selectpicker({
            liveSearch:true,
            virtualScroll: 600
        });
    </script>
    <!--<script>

        new DataTable(".table-responsive", {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            }
        });
    </script>-->

    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        body{
            font-family: 'Roboto', sans-serif;
        }
        * {
            margin: 0;
            padding: 0;
        }
        i {
            margin-right: 10px;
        }

        /*------------------------*/
        input:focus,
        button:focus,
        .form-control:focus{
            outline: none;
            box-shadow: none;
        }
        .form-control:disabled, .form-control[readonly]{
            background-color: #fff;
        }
        /*----------step-wizard------------*/
        .d-flex{
            display: flex;
        }
        .justify-content-center{
            justify-content: center;
        }
        .align-items-center{
            align-items: center;
        }

        /*---------signup-step-------------*/
        .bg-color{
            background-color: #333;
        }
        .signup-step-container{
            padding: 150px 0px;
            padding-bottom: 60px;
        }




            .wizard .nav-tabs {
                position: relative;
                margin-bottom: 0;
                border-bottom-color: transparent;
            }

            .wizard > div.wizard-inner {
                position: relative;
            }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 90%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 30px;
            height: 30px;
            line-height: 30px;
            display: inline-block;
            border-radius: 50%;
            background: #fff;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 16px;
            color: #0e214b;
            font-weight: 500;
            border: 1px solid #ddd;
        }
        span.round-tab i{
            color:#555555;
        }
        .wizard li.active span.round-tab {
                background: rgb(29 78 216);
            color: #fff;
            border-color: rgb(29 78 216);
        }
        .wizard li.active span.round-tab i{
            color: #5bc0de;
        }
        .wizard .nav-tabs > li.active > a i{
            color: rgb(29 78 216);
        }

        .wizard .nav-tabs > li {
            width: 25%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: red;
            transition: 0.1s ease-in-out;
        }



        .wizard .nav-tabs > li a {
            width: 30px;
            height: 30px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
            background-color: transparent;
            position: relative;
            top: 0;
        }
        .wizard .nav-tabs > li a i{
            position: absolute;
            top: -15px;
            font-style: normal;
            font-weight: 400;
            white-space: nowrap;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            font-weight: 700;
            color: #000;
        }

            .wizard .nav-tabs > li a:hover {
                background: transparent;
            }

        .wizard .tab-pane {
            position: relative;
            padding-top: 20px;
        }


        .wizard h3 {
            margin-top: 0;
        }
        .prev-step,
        .next-step{
            font-size: 13px;
            padding: 8px 24px;
            border: none;
            border-radius: 4px;
            margin-top: 30px;
        }
        .next-step{
            background-color: #0db02b;
        }
        .skip-btn{
            background-color: #cec12d;
        }
        .step-head{
            font-size: 20px;
            text-align: center;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .term-check{
            font-size: 14px;
            font-weight: 400;
        }
        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 40px;
            margin-bottom: 0;
        }
        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 40px;
            margin: 0;
            opacity: 0;
        }
        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: 40px;
            padding: .375rem .75rem;
            font-weight: 400;
            line-height: 2;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }
        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 38px;
            padding: .375rem .75rem;
            line-height: 2;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 .25rem .25rem 0;
        }
        .footer-link{
            margin-top: 30px;
        }
        .all-info-container{

        }
        .list-content{
            margin-bottom: 10px;
        }
        .list-content a{
            padding: 10px 15px;
            width: 100%;
            display: inline-block;
            background-color: #f5f5f5;
            position: relative;
            color: #565656;
            font-weight: 400;
            border-radius: 4px;
        }
        .list-content a[aria-expanded="true"] i{
            transform: rotate(180deg);
        }
        .list-content a i{
            text-align: right;
            position: absolute;
            top: 15px;
            right: 10px;
            transition: 0.5s;
        }
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            background-color: #fdfdfd;
        }
        .list-box{
            padding: 10px;
        }
        .signup-logo-header .logo_area{
            width: 200px;
        }
        .signup-logo-header .nav > li{
            padding: 0;
        }
        .signup-logo-header .header-flex{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /*-----------custom-checkbox-----------*/
        /*----------Custom-Checkbox---------*/
        input[type="checkbox"]{
            position: relative;
            display: inline-block;
            margin-right: 5px;
        }
        input[type="checkbox"]::before,
        input[type="checkbox"]::after {
            position: absolute;
            content: "";
            display: inline-block;   
        }
        input[type="checkbox"]::before{
            height: 16px;
            width: 16px;
            border: 1px solid #999;
            left: 0px;
            top: 0px;
            background-color: #fff;
            border-radius: 2px;
        }
        input[type="checkbox"]::after{
            height: 5px;
            width: 9px;
            left: 4px;
            top: 4px;
        }
        input[type="checkbox"]:checked::after{
            content: "";
            border-left: 1px solid #fff;
            border-bottom: 1px solid #fff;
            transform: rotate(-45deg);
        }
        input[type="checkbox"]:checked::before{
            background-color: #18ba60;
            border-color: #18ba60;
        }

        .btn-primary {
            background-color: rgb(29 78 216);
        }

        @media (max-width: 767px){
            .sign-content h3{
                font-size: 40px;
            }
            .wizard .nav-tabs > li a i{
                display: none;
            }
            .signup-logo-header .navbar-toggle{
                margin: 0;
                margin-top: 8px;
            }
            .signup-logo-header .logo_area{
                margin-top: 0;
            }
            .signup-logo-header .header-flex{
                display: block;
            }
        }

        th, td {
            text-align: center;
        }


        
    </style>
    <script>
        $("#documentoFrmSubmit").on('click', function(e)
        {
            e.preventDefault();
            var formData = new FormData();
            formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
            formData.append('descripcion', $("input[name=descripcion]").val());
            formData.append('archivo' , document.getElementById('archivo').files[0]);
            formData.append('comentarios', $("input[name=comentarios]").val());
            $.ajax({
                url:'<?php echo admin_url('pi/PropietariosController/storeDocument/');?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                $("#documentosModal").modal('hide');
            }).catch(function(response){
                <?php if(ENVIRONMENT != 'production') { ?>
                    alert_float('success', response.message);
                <?php } else { ?>
                    alert_float('success', response.message);
                <?php } ?>
            });
        });

        function getDocument()
        {
            $.ajax({
                url: "<?php echo admin_url('pi/PropietariosController/getDocument/'.$id);?>",
                method: "POST",
                success: function(response){
                    res = JSON.parse(response);
                    data = res.data;
                    
                    $('#docTable').DataTable( {
                        destroy: true,
                        data: data,
                        columns: [
                            { data: 'id' },
                            { data: 'descripcion' },
                            { data: 'archivo' },
                            { data: 'acciones'}
                        ],
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                        }
                    } );
                }
            });
        }

        // ------------step-wizard-------------
        $(document).ready(function () {
            $('.nav-tabs > li a[title]').tooltip();
            
            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);
            
                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }

    </script>

    <script>
        $(document).on('change', 'select[name=datosRegistro]', function(e)
        {
            e.preventDefault();
            var val = $(this).val();
            $("textarea[name=datos_registro]").val(val);
        });
    </script>

<script>
    $(document).on('submit', '#propietariosFrm', function(e)
    {
        e.preventDefault();
        var data = {
            "id"                 : $("input[name=id]").val(),
            "codigo"             : $("input[name=codigo]").val(),
            "pais_id"            : $("select[name=pais_id]").val(),
            "nombre_propietario" : $("input[name=nombre_propietario]").val(),
            "estado_civil"       : $("select[name=estado_civil]").val(),
            "representante_legal": $("input[name=representante_legal]").val(),
            "direccion"          : $("textarea[name=direccion]").val(),
            "estado"             : $("input[name=estado]").val(),
            "ciudad"             : $("input[name=ciudad]").val(),
            "codigo_postal"      : $("input[name=codigo_postal]").val(),
            "actividad_comercial": $("input[name=actividad_comercial").val(),
            "datos_registro"     : $("textarea[name=datos_registro]").val(),
            "numero"             : $("input[name=numero]").val(),
            "fecha"              : $("input[name=fecha]").val(),
            "apoderados"         : $("select[name=apoderados]").val(),
            "origen"             : $("textarea[name=origen]").val(),
            "notas"              : $("textarea[name=notas]").val(),
        }
        $.ajax({
            url: "<?php echo admin_url('pi/PropietariosController/store');?>",
            method: "POST",
            data: {
                data: JSON.stringify(data),
                "csrf_token_name": $("input[name=csrf_token_name]").val()
            },
            success: function(response)
            {
                if(response.code = 200)
                {
                    location.href = "<?php echo admin_url('pi/PropietariosController/edit/'.$id);?>";
                }
                else
                {
                    alert_float('error', 'No se ha podido guardar');
                }
            }
        });
    });
</script>
</body>
</html>