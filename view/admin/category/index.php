<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Категории</h1>
    </div>
</div>


  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Название категорий</th>
      <th>Опции</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($all_categories as $category) { ?>
      <?php if ($category->enabled != 0) { ?>
      <tr>
        <td><?php echo $category->name; ?></td>
        <td>
          <i class="fa fa-pencil" aria-hidden="true"></i>
          <i class="fa fa-trash-o" aria-hidden="true"></i>
        </td>
      </tr>
      <?php } ?>
    <?php } ?>
    </tbody>
  </table>






