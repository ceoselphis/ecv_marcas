<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/TiposEventosController/store'), 'form'); ?>
                        <div class="col-md-4">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_input($fields[2]['name'], set_value($fields[2]['name']), ['class' => "form-control"]);?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger has-error">', '</div>');?>
                            <br />
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_dropdown('materia_id', $materias, set_value('materia_id', $fields[1]['name']), ['class' => 'form-control']);?>
                        </div>
                        <div class="col-2">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <a href="<?php echo admin_url('pi/SettingsController/menu?group=eventos');?>" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>
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
  </script>
