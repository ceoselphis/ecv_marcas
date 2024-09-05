<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                    <?php $CI = &get_instance();?>
                        <?php echo form_open(admin_url('pi/TiposEventosController/update/'.$id), 'form'); ?>
                        <div class="col-md-6">
                            <?php echo form_label('Nombre de evento', 'descripcion', ['form-label']);?>
                            <?php echo form_input('descripcion', set_value('descripcion', $values[0]['descripcion']), ['class' => 'form-control']);?>
                            <?php echo form_error('descripcion', '<div class="text-danger">', '</div>');?>
                            <br />
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label('Materia', 'materia_id', ['form-label']);?>
                            <?php echo form_dropdown('materia_id', $CI->TiposEventos_model->getAllMaterias() , set_value('materia_id', $values[0]['materia_id']), ['class' => 'form-control']);?>
                            <br />
                        </div>
                        <div class="col-md-3" style="padding-top: 2%;">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <a href="javascript: history.go(-1)" class="btn btn-success">Volver atrás</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>
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
    
  <style>
    th, td {
        text-align: center;
    }
    
</style>


</body>
</html>