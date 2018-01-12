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

                                        <p style="padding-left: 20px; font-size: 25px; position: relative; min-height: 50px; text-align: center; width: 100%; color: green; line-height: normal;"
                                          >Спасибо вам за покупку!<br>
                                            Сумма заказа составила <?php echo $allSum?> сом, в скором времени с Вами свяжутся для уточнения заказа.
                                            <br>
                                            <a style=" padding-left: 20px;  font-size: 25px; " href="<?php echo BASE_URL?>">На главную</a>
                                        </p>
                                        </div>
                                    <script>
                                        setTimeout(function(){
                                            location.href = '<?php echo BASE_URL?>';
                                        },10000)
                                    </script>
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
                <div class="form-group">
                    <label for="email">Введите ваш Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Введите Ваш Email" required>

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