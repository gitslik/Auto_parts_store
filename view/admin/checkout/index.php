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
      <tr class="row_hover" style="cursor: pointer;">
        <td  onclick="self.shop.checkoutView(<?php echo $products->basket; ?>)" id="status_<?php echo $products->id; ?>"><?php echo  $products->status? 'Активный' : 'Обработан'; ?></td>
        <td  onclick="self.shop.checkoutView(<?php echo $products->basket; ?>)"><?php echo $products->name; ?></td>
        <td  onclick="self.shop.checkoutView(<?php echo $products->basket; ?>)"><?php echo $products->phone; ?></td>
        <td  onclick="self.shop.checkoutView(<?php echo $products->basket; ?>)"><?php echo $products->address; ?></td>
        <td  onclick="self.shop.checkoutView(<?php echo $products->basket; ?>)"><?php echo $products->email; ?></td>
        <td   onclick="self.shop.checkoutView(<?php echo $products->basket; ?>)"><?php echo $products->total; ?></td>
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
<a type="button"  id="showModalForCheckout" href="javascript:void(0)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="opacity: 0"> </a>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Детали покупки</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    position: absolute;right: 10px;top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        </div>

    </div>
  </div>
</div>
