<section class="top">
    <div  class="homebuilder clearfix ">
        <div class="tm-container container " >
            <div class="tm-inner">

                <div class="row row-level-1 ">
                    <div class="row-inner  clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-inner ">
                                <div class="swiper-container swiper-slider" data-loop="true" data-autoplay="5000" data-height="303px" data-min-height="303px" data-slide-effect="fade"
                                     data-slide-speed="800ms" data-keyboard="false" data-mousewheel="false"
                                     data-mousewheel-release="false" style="height: 303px;">

                                    <div class="swiper-wrapper">

                                        <?php foreach ($all_sliders as $slider) { ?>
                                            <div class="swiper-slide slide-1" data-slide-bg="<?php echo $slider['url']?>">
                                                <div class="slide-desc">
                                                    <p><br></p>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>

                                    <div class="swiper-pagination" data-index-bullet="false" data-clickable="true"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-container container " >
            <div class="tm-inner">

                <div class="row row-level-1 ">
                    <div class="row-inner  clearfix">


                        <?php include('menu.php');?>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 ">
                            <div class="col-inner ">

                                <div class="box latest">
                                    <div class="box-heading">
                                        <h4><?php echo $thisCategory?></h4>
                                    </div>
                                    <div class="row" style="margin: 0">

                                    <?php foreach($cart_items as $item ):?>
                                      <?php $product  = $productTable->load(
                                          array('product_id=?',$item->product_id)
                                        ); ?>
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12  item_<?php echo $item->product_id?>" style="padding: 20px 0;">
                                        <img src="<?php echo $product->getMainPhoto()?>" style="    float: left;width: 180px; height: 180px;object-fit: cover;">
                                        <a href="<?php echo BASE_URL . '/product?id='. $product->product_id?>" style="  padding-left: 20px;  font-size: 25px;position: relative;min-height: 50px;float: left;"><?php echo $product->name?></a>
                                        <div style="float: right">
                                           <span style="float: right;"> Количество <input type="number" value="<?php echo $item->quantity?>" min="0" step="1" data-prize="<?php echo (int)$product->getPrize()?>"  class="form-control currency" style="width: 70px;" onchange="changeQuantity(this,<?php echo $item->product_id?>)"/></span>
                                            <br><span style="float: right;    font-size: 20px;padding: 5px;display: inline-block;">Цена: <span class="product_prize_<?php echo (int)$product->product_id?>"><?php echo (int)$product->getPrize() * (int)$item->quantity?></span> сом</span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div>
                                                <a type="button"  href="javascript:void(0)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="font-size: 10px; float: right;  color:#fff; "> <i class="fa fa-shopping-cart"></i> <span>Оформить заказ</span> </a>
                                            </div>
                                        </div>
                                      <!--product end -->
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="/checkout" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оформление заказа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    position: absolute;right: 10px;top: 10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="fio">ФИО</label>
                    <input type="text" class="form-control" id="fio" name="fio" placeholder="Введите ФИО" required>

                </div>
                <div class="form-group">
                    <label for="adress">Ваш адрес</label>
                    <input type="text" class="form-control" id="adress" name="adress" placeholder="Введите Ваш адрес" required>

                </div>
                <div class="form-group">
                    <label for="phone">Введите ваш номер телефона</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите номер телефон" required>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary" style="color: #fff;">Оформить</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function changeQuantity(element,product_id){
        var qquant = $(element).val();
        $('.product_prize_' + product_id).html('Загрузка...')
        $.ajax({
            url: 'cart/updatequantity',
            type: 'post',
            data: {'product_id':product_id,'quantity':qquant},
            success: function (json) {
                $('.product_prize_' + product_id).html((parseInt(qquant) * parseInt($(element).data('prize'))))
            },
            error: function (xhr, ajaxOptions, thrownError) {

            }
        });
    }
</script>