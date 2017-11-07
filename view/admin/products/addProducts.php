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
  <form name="add-new-products" method="post" enctype="multipart/form-data">

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
      <input type="file" name="photos[]" id="photoimg" multiple="true" />
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


