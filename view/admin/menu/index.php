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

Навигация для управиления меню.

<table class="table">
  <?php foreach ($all_menus as $menu) { ?>
  <tr>
    <td><?php echo $menu['name_menu']?></td>
    <td><a href="/admin/slider-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    <td><a href="/admin/slider-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
  </tr>
  <?php } ?>
</table>


