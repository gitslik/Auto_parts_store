<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Заказы</h1>
  </div>
</div>

<?php if (count($chekouts) != 0 ) { ?>
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Статус доставки</th>
      <th>ФИО</th>
      <th>Телефон</th>
      <th>Адресс</th>
      <th>EMail</th>
      <th>Сумма</th>
      <th>Опции</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($chekouts as $products){ ?>
      <tr class="row_hover">
        <td id="status_<?php echo $products->id; ?>"><?php echo  $products->status? 'Активный' : 'Обработан'; ?></td>
        <td><?php echo $products->name; ?></td>
        <td><?php echo $products->phone; ?></td>
        <td><?php echo $products->address; ?></td>
        <td><?php echo $products->email; ?></td>
        <td><?php echo $products->total; ?></td>
        <td>
          <a href="javajscript:void(0)" onclick="self.shop.checoutStatus(this,'statuscheckout','<?php echo $products->id; ?>')" class="edit_product">
            Изменить статус
          </a>
          <a href="javajscript:void(0)" onclick="self.shop.checoutDelete(this,'removecheckout','<?php echo $products->id; ?>')" class="delete_product">
           Удалить
          </a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
<?php } ?>