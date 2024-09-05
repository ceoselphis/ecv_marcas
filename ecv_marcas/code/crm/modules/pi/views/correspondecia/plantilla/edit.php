<?php init_head(); ?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/CorrespondeciaPlantillaController/update/' . $id), 'form'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_label($labels[1], $labels[1]); ?>
                                <?php echo form_input(
                                    array(
                                        'name' => 'descripcion',
                                        'id' => 'descripcion',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['descripcion']
                                    )
                                ); ?>
                                <?php echo form_error('descripcion', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label($labels[2], $labels[2]); ?>
                                <?php echo form_dropdown(['name' => 'staff_id', 'class' => 'form-control', 'id' => 'staff_id'], $staffid, $values[0]['staff_id']); ?>
                                <?php echo form_error('staff_id', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Materia', 'materia'); ?>
                                <?php echo form_dropdown(['name' => 'materia_id', 'class' => 'form-control', 'id' => 'materia_id'], $materia, $values[0]['materia_id']); ?>
                                <?php echo form_error('materia', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 15px;">
                                <?php echo form_label($labels[3], $labels[3]); ?>
                                <?php echo form_textarea(
                                    array(
                                        'name' => 'content',
                                        'id' => 'content',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['content']
                                    )
                                ); ?>
                                <?php echo form_error('content', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <br />
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-gray" type="reset">Limpiar</button>
                                <a href="<?php echo admin_url('pi/CorrespondeciaPlantillaController/'); ?>"
                                    class="btn btn-success">Volver atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php init_tail(); ?>
<script src="https://cdn.tiny.cloud/1/ce4zhhy5lb5vndptqligurhagsxf21159a1gxczjjybvh3ib/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
</script>