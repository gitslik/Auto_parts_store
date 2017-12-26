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
          <a href="#" onclick="self.shop.editPageForm('editPageForm')" class="btn-success save-btn">Обновить страницу</a>
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
          </select>
        </div>

        <div class="form-group">
          <label for="name">Название страницы:</label>
          <input type="text" name="name" class="form-control" id="name" value="<?php echo $page_for_update->title;?>">
        </div>

        <div class="form-group">
          <label for="description">Основной текст страницы:</label>
          <textarea type="text" name="description" class="form-control description_page" id="description"><?php echo $page_for_update->description;?></textarea>
        </div>
        <input type="hidden" id="page_id" name="page_id" value="<?php echo $page_for_update->page_id;?>">
        <input type="hidden" id="enabled" name="enabled" value="1">

      </form>
    </div>

  </div>
</div>
<script>
  tinyMCE.init({
    selector: "#description",
    menubar: false,
    height: 200
  });
</script>