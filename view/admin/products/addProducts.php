<div id="page-wrapper">
  <div class="content_page col-lg-12">
<style>
  div#page-wrapper {
    min-height: 1060px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
      <div class="add-slider-options">
        <a href="#" onclick="self.shop.productAddItem()" class="btn-success save-btn">Добавить продукт</a>
      </div>
    </div>
</div>

<div class="container col-lg-8">
  <h2>Форма добавления продукции</h2>
  <p>В данной форме вы можете создать новый продукт и присвоить ему свой раздел:</p>
  <form id="add-new-products" action="/admin/saveProduct" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="name">Название товара:</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
      <label for="category_id">Выбор категории</label>
      <select class="form-control" id="category_id" name="category_id">
       <?php foreach ($all_category as $category) { ?>
        <option value="<?php echo $category->category_id; ?>"><?php echo $category->name; ?></option>
       <?php } ?>
      </select>
    </div>


    <div class="form-group">
      <label for="category_id">Фото продукта</label>
      <input type="file" name="photos[]" id="photo" multiple="true" />
    </div>


    <div class="form-group">
      <label for="product_code">Код продукта:</label>
      <input type="text" name="product_code" class="form-control" id="product_code">
    </div>

    <div class="form-group">
      <label for="part_number">Серийный номер:</label>
      <input type="text" name="part_number" class="form-control" id="part_number">
    </div>

    <div class="form-group">
      <label for="description">Описание товара:</label>
      <textarea class="form-control" name="description" rows="5" id="description"></textarea>
    </div>

    <div class="form-group">
      <label for="condition">Количество:</label>
      <input type="text" name="condition" class="form-control" id="condition">
    </div>

    <div class="form-group">
      <label for="price">Цена:</label>
      <input type="text" name="price" class="form-control" id="price">
    </div>

  </form>
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
  </div>
</div>