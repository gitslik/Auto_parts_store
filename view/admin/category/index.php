<style>
  div#page-wrapper {
    min-height: 800px!important;
  }

</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Категории</h1>
      <div class="add-options">
        <a href="#" onclick="self.shop.categoryOption('addCategoryForm')">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>


  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Название категорий</th>
      <th style="width: 65px;">Опции</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($all_categories as $category) { ?>
      <?php if ($category->enabled != 0) { ?>
      <tr class="row_hover">
        <td><?php echo $category->name; ?></td>
        <td style="width: 65px;text-align: center;">
          <a href="#" onclick="self.shop.categoryEdit('<?php echo $category->category_id; ?>')" class="edit_cat"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <a href="#" onclick="self.shop.categoryOption('deleteCategory/delete_id=<?php echo $category->category_id; ?>')" class="delete_cat" data-id="<?php echo $category->category_id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <?php } ?>
    <?php } ?>
    </tbody>
  </table>






