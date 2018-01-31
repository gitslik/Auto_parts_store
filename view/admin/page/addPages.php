<div id="page-wrapper">
  <div class="content_page col-lg-12">
<style>
  div#page-wrapper {
    min-height: 750px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Страницы</h1>
      <div class="add-slider-options">
        <a href="#" onclick="self.shop.savePageForm('savePages')" class="btn-success save-btn">Добавить страницу</a>
      </div>
    </div>
</div>

<div class="container col-lg-8">
  <h2>Форма создания страниц</h2>
  <p>В данной форме вы можете создать новые страницы:</p>
  <form id="add-new-category" action="/admin/savePages" method="post">

    <div class="form-group">
      <label for="menu_id">Выберите раздел для страницы.</label>
      <select class="form-control" id="menu_id" name="menu_id">
        <option value="0"></option>

<!--        <?php /*print_die($all_menus);*/?>
        <?php /*foreach ($all_menus as $menu){*/?>
          <option value="<?php /*echo $menu['id'];*/?>"><?php /*echo $menu['name_menu'];*/?></option>
        --><?php /*} */?>
      </select>
    </div>

    <div class="form-group">
      <label for="name">Название страницы:</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
      <label for="description">Основной текст страницы:</label>
      <textarea type="text" name="description" class="form-control description_page" id="description"></textarea>
    </div>

    <input type="hidden" id="enabled" name="enabled" value="1">

  </form>
</div>

  </div>
</div>
<script>
  tinyMCE.init({
    selector: "#description",
    menubar: false,
    height: 200,
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
      "table contextmenu directionality emoticons paste textcolor responsivefilemanager "
    ],
    relative_urls: false,
    language: 'ru',

    filemanager_title:"Responsive Filemanager",
    filemanager_crossdomain: true,
    external_filemanager_path:"../../filemanager/",
    external_plugins: {
      "filemanager" : "../../filemanager/plugin.min.js",
      "responsivefilemanager" : "plugins/wysiwyg/tinymce/plugins/responsivefilemanager/plugin.min.js",
    },
    relative_urls: false,
    image_advtab: true,
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview"
  });
</script>