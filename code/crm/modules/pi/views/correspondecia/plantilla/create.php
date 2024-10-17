<?php init_head(); ?>
<!--../../../../../assets/gutenberg/vendor/gutenberg/wp-block-editor.js-->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/gutenberg/vendor/gutenberg/styles/wp-block-editor/style.css'); ?>">
<script src="../../../../../tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // tinymce.init({
    //     selector: '#mytextarea'
    // });

</script>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="modal-body">
                            <?php echo form_open(admin_url('pi/CorrespondeciaPlantillaController/store')); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <?php echo form_label($labels[1], $labels[1]); ?>
                                    <?php echo form_input($fields[1], set_value($fields[1]['name'])); ?>
                                    <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="col-md-4">
                                    <?php echo form_label($labels[2], $labels[2]); ?>
                                    <?php echo form_dropdown(['name' => 'staff_id', 'class' => 'form-control', 'id' => 'staff_id'], $staffid); ?>
                                    <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="col-md-4">
                                    <?php echo form_label('Materia', 'materia'); ?>
                                    <?php echo form_dropdown(['name' => 'materia_id', 'class' => 'form-control', 'id' => 'materia_id'], $materia); ?>
                                    <?php echo form_error('materia', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding-top: 15px;">
                                    <?php echo form_label($labels[3], $labels[3]); ?>
                                    <?php echo form_textarea("g-editor", set_value($fields[3]['name']),['class'=>'form-control', 'id'=>'g-editor']); ?>
                                    <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="row" style="padding-top:20px;">
                                <div class="col-md-4">
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
<!--code\crm\assets\gutenberg\vendor\gutenberg\wp-editor.js-->
<script src="<?= base_url('assets/gutenberg/vendor/gutenberg/wp-editor.js'); ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editorElement = document.getElementById('g-editor');
        
        if (editorElement) {
            // Aquí inicializas el editor
            const editor = new GEditor({
                element: editorElement
            });
        }
    });
</script>

<!-- <script src="C:\wamp64\www\ecv_marcas\code\crm\assets\plugins\tinymce\tinymce.min.js"></script> -->

<!--
<script src="https://cdn.tiny.cloud/1/ce4zhhy5lb5vndptqligurhagsxf21159a1gxczjjybvh3ib/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>-->
<script>
    // tinymce.init({
    //     selector: 'textarea',
    //     plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    //     tinycomments_mode: 'embedded',
    //     tinycomments_author: 'Author name',
    //     mergetags_list: [
    //         { value: 'First.Name', title: 'First Name' },
    //         { value: 'Email', title: 'Email' },
    //     ],
    //     ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    // });


</script>
</body>

</html>