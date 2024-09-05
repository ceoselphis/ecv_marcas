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
<script>
    function getFormData(){
            var config = {};
            $('input').each(function () {
                config[this.name] = this.value;
            });
            $("select").each(function()
            {
                config[this.name] = this.value;
            });
            return config;
    }
    $("#solicitudfrm").on('submit', function(e)
    {
        var formData = new FormData();
        e.preventDefault();
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('id' , $("input[name=id]").val());
        formData.append('tipo_registro_id', $("select[name=tipo_registro_id]").val());
        formData.append('client_id', $("select[name=client_id]").val());
        formData.append('oficina_id', $("select[name=oficina_id]").val());
        formData.append('staff_id', $("select[name=staff_id]").val());
            //Pais_id fill
            pais_id = JSON.stringify($("select[name=pais_id]").val());
            formData.append('pais_id', pais_id);
            //Clase_niza_id fill
            clase_niza = JSON.stringify($("select[name=clase_niza_id]").val());
            formData.append('clase_niza', clase_niza);
            //solicitantes fill
            solicitantes = JSON.stringify($("select[name=solicitantes_id]").val());
            formData.append('solicitantes_id', solicitantes);
            formData.append('tipo_solicitud_id', $("select[name=tipo_solicitud_id]").val());
            formData.append('ref_interna', $("input[name=ref_interna]").val());
            formData.append('ref_cliente', $('input[name=ref_cliente]').val());
            formData.append('primer_uso', $('input[name=primer_uso').val());
            formData.append('prueba_uso', $('input[name=prueba_uso]').val());
            formData.append('carpeta', $("input[name=carpeta]").val());
            formData.append('libro', $("input[name=libro]").val());
            formData.append('tomo', $("input[name=tomo]").val());
            formData.append('folio', $("input[name=folio]").val());
            formData.append('comentarios', $("textarea[name=comentarios]").val());
            formData.append('estado_id', $("select[name=estado_id]").val());
            formData.append('solicitud', $("input[name=num_solicitud]").val());
            formData.append('fecha_solicitud', $("input[name=fecha_solicitud]").val());
            formData.append('registro', $("input[name=num_registro]").val());
            formData.append('fecha_registro', $("input[name=fecha_registro]").val());
            formData.append('certificado', $("input[name=num_certificado]").val());
            formData.append('fecha_certificado', $("input[name=fecha_certificado]").val());
            formData.append('fecha_vencimiento', $("input[name=fecha_vencimiento]").val());
            formData.append('signo_archivo', $('input[name=signo_archivo]')[0].files[0]);
            formData.append('signonom', $("input[name=signonom]").val());
            formData.append('descripcion_signo', $("textarea[name=descripcion_signo]").val());
            formData.append('comentario_signo', $("input[name=comentario_signo]").val());
            formData.append('tipo_signo_id', $('select[name=tipo_signo_id]').val());
            $.ajax({
                url:'<?php echo admin_url('pi/MarcasSolicitudesController/store');?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(response)
                {
                    location.replace('<?php echo admin_url("pi/MarcasSolicitudesController/edit/{$id}");?>');   
                },
                fail: function(request)
                {
                        <?php if(ENVIRONMENT != 'production') { ?>
                            alert(response);
                            <?php } else { ?>
                                alert('ha ocurrido un error');
                        <?php } ?>
                }
            });
        });


        $("#prioridadfrmsubmit").on('click', function(e){
            e.preventDefault();
            data = {
                'pais_prioridad' : $("select[name=pais_prioridad").val(),
                'fecha_prioridad': $("input[name=fecha_prioridad]").val(),
                'nro_prioridad'  : $("input[name=nro_prioridad").val(),
                'solicitud_id'   : $("input[name=solicitud_id").val(),
            }
            $.ajax({
                url: '<?php echo admin_url("pi/MarcasPrioridadController/addPrioridad");?>',
                method: 'POST',
                data : data
            }).then(function(response){
                new DataTable("#prioridadTbl", {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    ajax: JSON.parse(response.data),
                }
                });
                $("#prioridadModal").modal('hide');
            }).catch(function(response){
                alert("No puede agregar una prioridad sin registro de la solicitud");
            });
        });

        


        






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

        // $(".next-step").click(function (e) {

        //     var $active = $('.wizard .nav-tabs li.active');
        //     $active.next().removeClass('disabled');
        //     nextTab($active);

        // });
        // $(".prev-step").click(function (e) {

        //     var $active = $('.wizard .nav-tabs li.active');
        //     prevTab($active);

        // });
    

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
        //---------------------
        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }

</script>

<script>
   $(document).on('change', '#clase_niza_id', function(e){
        e.preventDefault();
        var idClase = $("#clase_niza_id").val();
        if(idClase != ''){
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasSolicitudesController/getClaseDescripcion');?>",
                method: 'POST',
                data : {
                    'clase_niza_id'   : idClase,
                    'csrf_token_name' : $("input[name=csrf_token_name]").val()
                },
                success: function(response)
                {
                    res = JSON.parse(response);
                    $("#clase_descripcion").val(res.data.descripcion);
                }
            });
        }
   });

   $(document).on('click', '#claseFrmSubmit', function(event){
        event.preventDefault();
        $.ajax({
            url: "<?php echo admin_url('pi/MarcasSolicitudesController/setClaseMarca');?>",
            method: 'POST',
            data: {
                'csrf_token_name'  : $("input[name=csrf_token_name]").val(),
                'clase_niza_id'    : $("#clase_niza_id").val(),
                'clase_descripcion': $("#clase_descripcion").val(),
                'marcas_id'        : "<?php echo $id; ?>"
            },
            success: function(response){
                $('#claseFrm')[0].reset();
                $("#claseModal").modal('hide');
            }
        })
   })
</script>