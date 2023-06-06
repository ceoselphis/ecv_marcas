<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<?php
$tags = get_styling_areas('tags');
?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-2 picker">
        <!-- Status Cases -->
        <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked" id="theme_styling_areas">
          <li role="presentation" class="active">
            <a href="" aria-controls="tab_admin_styling" role="tab">
              Status 1
            </a>
          </li>
          <li role="presentation">
            <a href="#tab_customers_styling" aria-controls="tab_customers_styling" role="tab" data-toggle="tab">
              <?php echo _l('theme_style_customers'); ?>
            </a>
          </li>
          <li role="presentation">
            <a href="#tab_buttons_styling" aria-controls="tab_buttons_styling" role="tab" data-toggle="tab">
              <?php echo _l('theme_style_buttons'); ?>
            </a>
          </li>
          <li role="presentation">
            <a href="#tab_tabs_styling" aria-controls="tab_tabs_styling" role="tab" data-toggle="tab">
              <?php echo _l('theme_style_tabs'); ?>
            </a>
          </li>
          <li role="presentation">
            <a href="#tab_modals_styling" aria-controls="tab_modals_styling" role="tab" data-toggle="tab">
              <?php echo _l('theme_style_modals'); ?>
            </a>
          </li>
          <li role="presentation">
            <a href="#tab_general_styling" aria-controls="tab_general_styling" role="tab" data-toggle="tab">
              <?php echo _l('theme_style_general'); ?>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="panel_s">
          <div class="panel-body pickers">
            <div class="tab-content">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
var pickers = $('.colorpicker-component');
$(function() {
    $.each(pickers, function() {

        $(this).colorpicker({
            format: "hex"
        });

        $(this).colorpicker().on('changeColor', function(e) {
            var color = e.color.toHex();
            var _class = 'custom_style_' + $(this).find('input').data('id');
            var val = $(this).find('input').val();
            if (val == '') {
                $('.' + _class).remove();
                return false;
            }
            var append_data = '';
            var additional = $(this).data('additional');
            additional = additional.split('+');
            if (additional.length > 0 && additional[0] != '') {
                $.each(additional, function(i, add) {
                    add = add.split('|');
                    append_data += add[0] + '{' + add[1] + ':' + color + ';}';
                });
            }
            append_data += $(this).data('target') + '{' + $(this).data('css') + ':' + color +
                ';}';
            if ($('head').find('.' + _class).length > 0) {
                $('head').find('.' + _class).html(append_data);
            } else {
                $("<style />", {
                    class: _class,
                    type: 'text/css',
                    html: append_data
                }).appendTo("head");
            }
        });
    });
});

function save_theme_style() {
    var data = [];

    $.each(pickers, function() {
        var color = $(this).find('input').val();
        if (color != '') {
            var _data = {};
            _data.id = $(this).find('input').data('id');
            _data.color = color;
            data.push(_data);
        }
    });

    $.post(admin_url + 'theme_style/save', {
        data: JSON.stringify(data),
        admin_area: $('#theme_style_custom_admin_area').val(),
        clients_area: $('#theme_style_custom_clients_area').val(),
        clients_and_admin: $('#theme_style_custom_clients_and_admin_area').val(),
    }).done(function() {
        var tab = $('#theme_styling_areas').find('li.active > a:eq(0)').attr('href');
        tab = tab.substring(1, tab.length)
        window.location = admin_url + 'theme_style?tab=' + tab;
    });
}
</script>
</body>

</html>