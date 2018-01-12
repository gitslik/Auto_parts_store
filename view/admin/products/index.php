<style>
  a.delete_product {
    float: right;
  }
</style>
<div id="page-wrapper">
  <div class="content_page col-lg-12">
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
      <div class="add-options">
          <a href="#" onclick="window.location='addProducts'">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>

<ul>
<?php foreach ($all_categories as $category) { ?>
    <?php if ($category->enabled != 0) { ?>
      <?php if ($category->parent_category_id == 0){?>
      <li><a href="#" onclick="self.shop.productsOfCategory(<?php echo $category->category_id; ?>)"><?php echo $category->name; ?></li>
        <ul class="category_product">
        <?php foreach ($all_categories as $category_sub){?>
            <?php if ($category->category_id == $category_sub->parent_category_id){?>
             <li><a href="#" onclick="self.shop.productsOfCategory(<?php echo $category_sub->category_id; ?>)"><?php echo $category_sub->name; ?></li>
            <?php } ?>
        <?php } ?>
        </ul>
      <?php } ?>
    <?php } ?>
 <?php } ?>
</ul>
  </div>
</div>



