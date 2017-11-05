<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
      <div class="add-options">
        <a href="#" onclick="self.shop.productOption('addProducts')">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>

<ul>
<?php foreach ($all_categories as $category) { ?>
    <?php if ($category->enabled != 0) { ?>
    <li><a href="#" onclick="self.shop.productsOfCategory(<?php echo $category->category_id; ?>)"><?php echo $category->name; ?></li>
    <?php } ?>
 <?php } ?>
</ul>




