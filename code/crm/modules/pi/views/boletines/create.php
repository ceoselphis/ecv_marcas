<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/BoletinesController/store'), 'form'); ?>
                        <div class="col-md-2">
                            
                            <?php echo form_label($labels[0], $labels[0]);?>
                            <br />
                            <?php echo form_input($fields[0], set_value($fields[0]['name']));?>
                            <?php echo form_error($fields[0]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown($fields[1], $paises, set_value($fields[1]['name']), ['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-2">
                            
                            <?php echo form_label($labels[2], $labels[2]);?>
                            <br />
                            <?php echo form_input($fields[3], set_value($fields[3]['name']));?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            
                            <?php echo form_label($labels[3], $labels[3]);?>
                            <br />
                            <?php echo form_input($fields[2], set_value($fields[2]['name']), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-3">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/BoletinesController/');?>" class="btn btn-success">Volver atras</a>
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


        $("input[name=fecha_publicacion]").on('keyup', function(e){
            e.preventDefault();
            $("input[name=fecha_publicacion]").val('');
        })
        $( function() {
            $("input[name=fecha_publicacion]").datetimepicker({
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

    </body>
    </html>

