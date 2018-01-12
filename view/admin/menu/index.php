<div class="content_page">
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Меню</h1>

      <div class="add-options">
        <a href="#" onclick="self.shop.addMenu('addMenu')">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>


<table class="table">
  <?php foreach ($all_menus as $menu) { ?>
  <tr>
    <td><?php echo $menu['name_menu'];?></td>
    <td><a href="#" class="delete_menu" onclick="self.shop.addMenuDelete(<?php echo $menu['id'];?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
  </tr>
  <?php } ?>
</table>



</div>

