<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
    </div>
</div>

<?php if (count($all_products_this_category) != 0 ) { ?>
<table class="table table-bordered">
  <thead>
  <tr>
    <th>Название</th>
    <th>Серийный номер</th>
    <th>Код продукта</th>
    <th>Категория</th>
    <th>Описание</th>
    <th>Цена</th>
    <th>Количество</th>
    <th>Опции</th>
  </tr>
  </thead>

  <tbody>
  <?php foreach ($all_products_this_category as $products){ ?>
  <tr>
    <td><?php echo $products->name; ?></td>
    <td><?php echo $products->part_number; ?></td>
    <td><?php echo $products->product_code; ?></td>
    <td><?php echo $products->category_id; ?></td>
    <td><?php echo $products->description; ?></td>
    <td><?php echo $products->price; ?></td>
    <td><?php echo $products->condition; ?></td>
    <td>
      <i class="fa fa-pencil" aria-hidden="true"></i>
      <i class="fa fa-trash-o" aria-hidden="true"></i>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>
<?php } ?>