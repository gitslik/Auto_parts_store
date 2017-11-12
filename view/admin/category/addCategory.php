<style>
  div#page-wrapper {
    min-height: 500px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Категории</h1>
      <div class="add-slider-options">
        <a href="#" onclick="self.shop.saveCategoryForm()" class="btn-success save-btn">Добавить категорию</a>
      </div>
    </div>
</div>

<div class="container col-lg-8">
  <h2>Форма создания категорий</h2>
  <p>В данной форме вы можете создать новые категории:</p>
  <form id="add-new-category" action="/admin/saveCategoryForm" method="post">

    <div class="form-group">
      <label for="name">Название категории:</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
      <label for="category_id">Фото категории</label>
      <input type="file" name="photo" id="photo" />
    </div>

    <div class="form-group">
      <label for="category_id">Опция для создания под категории выберите главный раздел</label>
      <select class="form-control" id="category_id" name="parent_category_id">
        <option value="0"></option>
        <?php foreach ($all_sub_categories as $category) { ?>
          <option value="<?php echo $category->category_id; ?>"><?php echo $category->name; ?></option>
        <?php } ?>
      </select>
    </div>

    <input type="hidden" id="enabled" name="enabled" value="1">

  </form>
</div>


