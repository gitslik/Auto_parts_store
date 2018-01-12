<style>
  div#page-wrapper {
    min-height: 700px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Категории</h1>
      <div class="add-slider-options">
        <a href="#" onclick="self.shop.updateCategoryForm(<?php echo $options['info_category']->category_id; ?>)" class="btn-success save-btn">Обновить категорию</a>
      </div>
    </div>
</div>

<div class="container col-lg-8">
  <h2>Форма редактирования категорий</h2>
  <p>В данной форме вы можете редактировать категории:</p>
  <form id="add-new-category" action="/admin/saveCategoryForm" method="post">

    <div class="form-group">
      <label for="name">Название категории:</label>
      <input type="text" name="name" class="form-control" id="name" value="<?php echo $options['info_category']->name;?>">
    </div>
    <?php if (count($file_for_edit)!=0) {?>
    <div class="form-group">
      <label for="category_id">Фото категории</label>
      <input type="file" name="photo" id="photo" />
    </div>
      <img src="<?php echo BASE_URL."/".$file_for_edit[0]->url; ?>" style="width: 50px;height: 50px;" >
    <?php } ?>
    <div class="form-group">
      <label for="category_id">Опция для создания под категории выберите главный раздел</label>
      <select class="form-control" id="parent_category_id" name="parent_category_id">
        <option value="0"></option>
        <?php foreach ($options['all_sub_categories'] as $category) { ?>
            <option value="<?php echo $category->category_id; ?>" <?php if ($options['info_category']->parent_category_id ==  $category->category_id) { echo "selected"; }?>>
              <?php echo $category->name; ?>
            </option>
        <?php } ?>
      </select>
    </div>


    <div class="form-group">
      <label for="description">Описание категории</label>
      <textarea name="description" id="description" rows="10" class="col-lg-12"><?php echo $category->description; ?></textarea>
    </div>

    <input type="hidden" id="id_category" name="category_id" value="<?php echo $options['info_category']->category_id; ?>">
    <input type="hidden" id="enabled" name="enabled" value="1">

  </form>
</div>


