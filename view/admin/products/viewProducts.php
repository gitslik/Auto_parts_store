<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
    </div>
</div>
<?php if (count($all_products_this_category) != 0 ) { ?>
<ul>
<?php foreach ($all_products_this_category as $products){ ?>
    <li><?php echo $products->name; ?>
    <?php echo $products->description; ?>
    <?php echo $products->price; ?>
    <?php echo $products->product_code; ?>
    <?php echo $products->condition; ?>
    <?php echo $products->part_number; ?>
    <?php echo $products->photo_id; ?>
    <?php echo $products->category_id; ?></li>
<?php } ?>
</ul>
<?php } ?>