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
                            <?php echo form_dropdown($fields[3], $paises, [0], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-2">
                            
                            <?php echo form_label($labels[2], $labels[2]);?>
                            <br />
                            <?php echo form_input($fields[2], set_value($fields[2]['name']));?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            
                            <?php echo form_label($labels[3], $labels[3]);?>
                            <br />
                            <?php echo form_input($fields[1], set_value($fields[1]['name']), ['datepicker','form-control']);?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>');?>
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

    </body>
    </html>

