<div id="product-product" class="container">
  <ul class="breadcrumb">
    <li><a href="/"><i class="fa fa-home"></i></a></li>
    <li><span><?php echo $product->name?></span></li>
  </ul>
  <div class="row">

    <div id="content" class="col-sm-12">
<?php $photos = $product->getPhotoUrl();

?>


      <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-5 product_page-left">
          <div class="product-gallery">
            <div class="row">
              <div class="col-lg-10 pull-right hidden-xs hidden-sm hidden-md text-center product-image">
                <?php if($photos){?>
                <img data-zoom-type="0" width="1000" height="1000" id="productZoom"
                     src="<?php echo BASE_URL . '/' .$photos[0]->url ?>"
                     alt="Фото"
                     data-zoom-image="<?php echo BASE_URL . '/' .$photos[0]->url ?>">
              <?php }else{?>
                  <img data-zoom-type="0" width="1000" height="1000" id="productZoom"
                       src="<?php echo $product->getDefaulImage() ?>"
                       alt="Фото"
                       data-zoom-image="<?php echo $product->getDefaulImage() ?>">
                <?php }?>
              </div>
              <div class="col-lg-2 hidden-xs hidden-sm hidden-md image-thumb">
                <div class="bx-wrapper" style="max-width: 133px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 491px;"><ul id="productGallery" class="image-additional" data-slide-width="133" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                     <?php

                     if($photos) {
                       $i = 0;

                       $count = count($photos);

                       foreach ($photos as $photo) {
                         ?>
                         <li
                           style="float: none; list-style: none; position: relative; width: 113px; margin-bottom: 13px;">
                           <a href="#"
                              data-image="<?php echo BASE_URL . '/' .$photo->url ?>"
                              data-zoom-image="<?php echo BASE_URL . '/' .$photo->url ?>"
                              class="zoomGalleryActive">
                             <img width="133" height="133"
                                  src="<?php echo BASE_URL . '/' .$photo->url ?>"
                                  alt="ФОто продукта">
                           </a>
                         </li>
                         <?php
                       }
                     }?>
                    </ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev disabled" href=""><i class="material-design-drop27"></i></a><a class="bx-next disabled" href=""><i class="material-design-drop25"></i></a></div></div></div>
              </div>
              <div class="col-xs-12 hidden-lg image-thumb">
                <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 0px;"><ul id="productFullGallery" class="image-additional" data-slide-width="133" style="width: 615%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                      <?php

                      if($photos) {
                        $i = 0;

                        $count = count($photos);

                        foreach ($photos as $photo) {
                          ?>
                          <li style="float: left; list-style: none; position: relative; width: 100px;">

                            <a
                              href="<?php echo BASE_URL . '/' .$photo->url ?>">
                              <img width="637" height="637"
                                   src="<?php echo BASE_URL . '/' .$photo->url ?>"
                                   alt="Angel Eye Headlight BMW 3er Limo">
                            </a>
                          </li>
                          <?php
                        }
                      }?>
                    </ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev" href=""><i class="fa fa-chevron-left"></i></a><a class="bx-next" href=""><i class="fa fa-chevron-right"></i></a></div></div></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-7 product_page-right">
          <div class="general_info product-info">
            <h2 class="product-title"><?php echo $product->name?></h2>
            <!--<ul class="list-unstyled">
              <li>Brands <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/manufacturer/info&amp;manufacturer_id=17">Maserati </a></li>
              <li>Product Code: Deluxe</li>
              <li>Availability: In Stock</li>
            </ul>--><br>
            <div class="price">
              <span class="price-new"><?php echo $product->getPrize()?></span>
              <button type="button" id="button-cart" data-loading-text="Loading..."  class="btn-primary" onclick="ajaxAdd($(this),<?php echo $product->product_id?>);">Купить</button>
              <!--<span class="price-old">$97.00</span>-->
            </div>
            <div id="product">
              <hr>
              <h3>О товаре</h3>



              <div class="form-group">
                <div class="quantity">
                  <label class="control-label" for="input-quantity"><?php echo $product->condition>0?'Есть на скалде':'На заказ'?></label>
                 <!-- <a class="counter counter-minus material-design-horizontal39" href="#"></a>
                  <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control">
                  <input type="hidden" name="product_id" value="29">
                  <a class="counter counter-plus material-design-add186" href="#"></a>-->

                </div>
              </div>
              <hr>
              <h3>Описение</h3>
              <?php echo htmlspecialchars_decode($product->description);?>
             <!-- <ul class="product-buttons">
                <li>
                  <button type="button" class="product-btn" onclick="wishlist.add('29');"><i class="fa fa-heart"></i><span>Add to Wish List</span></button>
                </li>
                <li>
                  <button type="button" class="product-btn" onclick="compare.add('29');"><i class="fa fa-exchange"></i><span>Compare this Product</span>
                  </button>
                </li>
              </ul>-->
            </div>
            <hr>
            <!--<div class="rating">
              <p>
                <span class="fa fa-stack"><i class="material-design-bookmark45"></i></span>
                <span class="fa fa-stack"><i class="material-design-bookmark45"></i></span>
                <span class="fa fa-stack"><i class="material-design-bookmark45"></i></span>
                <span class="fa fa-stack"><i class="material-design-bookmark45"></i></span>
                <span class="fa fa-stack"><i class="material-design-bookmark45"></i></span>
                <br>
              </p>
								<span class="review-link review-link-show">
									<a class="link" href="#">1 reviews</a>
								</span><br>
								<span class="review-link review-link-write">
									<a class="link" href="#">Write a review</a>
								</span>

            </div>
-->            <hr>

          </div>
        </div>
      </div>
      <!--<div class="product_tabs">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab-description" data-toggle="tab">
              Описание
            </a>
          </li>
          <li>
            <a href="#tab-specification" data-toggle="tab">
              Спецификации
            </a>
          </li>

        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-description">

           <?php /*echo $product->description*/?>
          </div>
          <div class="tab-pane" id="tab-specification">
            <table class="table table-bordered">
              <thead>
              <tr>
                <td colspan="2"><strong>Accessories</strong></td>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Passenger Car</td>
                <td>Front-Wheel Drive</td>
              </tr>
              <tr>
                <td>All Brands</td>
                <td>Europe</td>
              </tr>
              </tbody>
              <thead>
              <tr>
                <td colspan="2"><strong>Product Details</strong></td>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>For Winter</td>
                <td>Yes</td>
              </tr>
              <tr>
                <td>Material</td>
                <td>Metallic</td>
              </tr>
              <tr>
                <td>Catalog Number</td>
                <td>00986123</td>
              </tr>
              <tr>
                <td>Waterproof</td>
                <td>Yes</td>
              </tr>
              <tr>
                <td>Manufacturer</td>
                <td>Kanada</td>
              </tr>
              <tr>
                <td>Free Shipping</td>
                <td>Yes</td>
              </tr>
              <tr>
                <td>Dimensions</td>
                <td>100x200</td>
              </tr>
              <tr>
                <td>Weight</td>
                <td>2 kg</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>-->
     <!-- <p>
        Tags:
        <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/search&amp;tag=Angel Eye Headlight BMW 3er Limo">Angel Eye Headlight BMW 3er Limo</a>
        <a href=""></a>
      </p>-->

    </div>

  </div>
</div>

<script>
  (function ($) {
    $(document).ready(function () {
      $('.review-link a').click(function (e) {
        e.preventDefault();
        $('.product_tabs a[href="#tab-review"').tab('show');

      });
      $('.review-link-show').click(function () {
        $('html, body').animate({
          'scrollTop': $('.product_tabs').offset().top - ($('#stuck').outerHeight() + 50)
        }, 1000);
      });
      $('.review-link-write').click(function () {
        $('html, body').animate({
          'scrollTop': $('#reviews_form_title').offset().top - ($('#stuck').outerHeight() + 50)
        }, 1000);
        $('#reviews_form_title').addClass('close-tab').parents('#tab-review').find('#reviews_form').slideDown();
      });
      $('.product_tabs li:first-child a').tab('show');

      $('#reviews_form_title').addClass('close-tab');
      $('#reviews_form_title').on("click", function () {
        if ($(this).hasClass('close-tab')) {
          $(this).removeClass('close').parents('#tab-review').find('#reviews_form').slideToggle();
        }
        else {
          $(this).addClass('close-tab').parents('#tab-review').find('#reviews_form').slideToggle();
        }
      });
    });
  })(jQuery);
</script>
<script type="text/javascript">
  document.getElementById('input-quantity').onkeypress = function (e) {
    e = e || event;
    if (e.ctrlKey || e.altKey || e.metaKey) return;
    var chr = getChar(e);
    if (chr == null) return;
    if (chr < '0' || chr > '9') {
      return false;
    }
  }
  function getChar(event) {
    if (event.which == null) {
      if (event.keyCode < 32) return null;
      return String.fromCharCode(event.keyCode)
    }
    if (event.which != 0 && event.charCode != 0) {
      if (event.which < 32) return null;
      return String.fromCharCode(event.which)
    }
    return null;
  }
</script>
<script type="text/javascript">
  $('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
    $.ajax({
      url: 'index.php?route=product/product/getRecurringDescription',
      type: 'post',
      data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
      dataType: 'json',
      beforeSend: function() {
        $('#recurring-description').html('');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();

        if (json['success']) {
          $('#recurring-description').html(json['success']);
        }
      }
    });
  });
</script>
<script type="text/javascript">
  $('#button-cart').on('click', function() {
    $('#button-cart').button('loading');
    cart.add(product_id);
  });
</script>
<script type="text/javascript">
  $('.date').datetimepicker({
    language: 'en-gb',
    pickTime: false
  });

  $('.datetime').datetimepicker({
    language: 'en-gb',
    pickDate: true,
    pickTime: true
  });

  $('.time').datetimepicker({
    language: 'en-gb',
    pickDate: false
  });
</script>
<script type="text/javascript">
  $('#review').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();

    $('#review').fadeOut('slow');

    $('#review').load(this.href);

    $('#review').fadeIn('slow');
  });

  $('#review').load('index.php?route=product/product/review&product_id=29');

  $('#button-review').on('click', function() {
    $.ajax({
      url: 'index.php?route=product/product/write&product_id=29',
      type: 'post',
      dataType: 'json',
      data: $("#form-review").serialize(),
      beforeSend: function() {
        $('#button-review').button('loading');
      },
      complete: function() {
        $('#button-review').button('reset');
      },
      success: function(json) {
        $('.alert-dismissible').remove();

        if (json['error']) {
          $('#review').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
        }

        if (json['success']) {
          $('#review').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

          $('input[name=\'name\']').val('');
          $('textarea[name=\'text\']').val('');
          $('input[name=\'rating\']:checked').prop('checked', false);
        }
      }
    });
  });
</script>
<script src="catalog/view/theme/jetimpex/js/photo-swipe/klass.min.js"></script>
<script src="catalog/view/theme/jetimpex/js/photo-swipe/code.photoswipe-3.0.5.min.js"></script>
<script src="catalog/view/theme/jetimpex/js/jquery.elevatezoom.js" type="text/javascript"></script>