<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Страницы</h1>
      <div class="add-options">
        <a href="#" onclick="self.shop.pagesOption('addPages')">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>


<table class="table">
  <?php foreach ($all_pages as $page) { ?>
    <tr>
      <td><?php echo $page->title; ?></td>
      <td><a href="/admin/page-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
      <td><a href="/admin/page-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
    </tr>
  <?php } ?>

</table>


