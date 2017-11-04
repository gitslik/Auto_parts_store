<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
    </div>
</div>
<?php if (count($all_products_this_category) != 0 ) { ?>
<ul>
<?php foreach ($all_products_this_category as $products){ ?>
    <li><?php echo $products->description; ?></li>
<?php } ?>
</ul>
<?php } ?>