<div class="modal-content">

  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Детали покупки</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    position: absolute;right: 10px;top: 10px;">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body">
    <div class="row" style="margin: 0">
      ФИО  - <?php echo $checkout->name; ?><br>
      Телефон  - <?php echo $checkout->phone; ?><br>
      Адресс  - <?php echo $checkout->address; ?><br>
      Email  - <?php echo $checkout->email; ?><br>
      Покупа сделано на сумму   - <?php echo $checkout->total; ?> сом<br>

      </div>
    <hr>
    <div class="row" style="margin: 0">

      <?php
      $prize = 0;
      foreach($cart_items as $item ):

        if(!$item){
          continue;
        }
        ?>
        <?php $product  = $productTable->load(
        array('product_id=?',$item->product_id)
      );
        if(!$product){
          continue;
        }
        $prize = $prize +((int)$product->getPrize() * (int)$item->quantity);
        ?>
        <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12  item_<?php echo $item->product_id?>" style="padding: 20px 0;">
          <img src="<?php echo $product->getMainPhoto()?>" style="    float: left;width: 100px; height: 100px;object-fit: cover;">
          <a target="_blank" href="<?php echo BASE_URL . '/product?id='. $product->product_id?>" style="padding-left: 20px;  position: relative; min-height: 50px; float: left; max-width: 45%;"><?php echo $product->name?></a>
          <div style="float: left;padding-left: 20px;">
            <span style=""> Количество <?php echo $item->quantity?></span><br>
            <span style=""> Цена товара <?php echo $product->getPrize()?></span><br>
           <span style="">Цена: <span class="product_prize_<?php echo (int)$product->product_id?>"><?php echo (int)$product->getPrize() * (int)$item->quantity?></span> сом</span>
          </div>
        </div>
      <?php endforeach; ?>

      <!--product end -->

      <div class="row" style="text-align: right; padding-right: 20px">
        Количество товаров - <?php echo count($cart_items)?><br>
        Итого сумма  - <?php echo $prize?> сом
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary" style="color: #fff;" onclick="self.shop.checoutStatus(this,'statuscheckout','<?php echo $checkout->id; ?>')">Доставлено</button>
    <button type="submit" class="btn btn-danger" style="color: #fff;" onclick="self.shop.checoutDelete(this,'removecheckout','<?php echo $checkout->id; ?>')">Удалить</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="censelMOdalBurron">Отмена</button>


  </div>

</div>