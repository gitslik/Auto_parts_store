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
              <button type="button" id="button-cart" data-loading-text="Loading..." class="btn-primary">Купить</button>
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
              <?php echo $product->description?>
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
            <div class="product-share">
              <!-- AddThis Button BEGIN -->
              <div class="addthis_sharing_toolbox" data-url="<?php echo BASE_URL . '/product?id=' . $product->product_id?>" data-title="<?php echo $product->name?>" style="clear: both;"><div id="atstbx" class="at-share-tbx-element addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-b122a35a-f043-4d8c-9b70-b82526d57d4c" role="region"><span id="at-b122a35a-f043-4d8c-9b70-b82526d57d4c" class="at4-visually-hidden">AddThis Sharing Buttons</span><div class="at-share-btn-elements"><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 0%;"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-1" class="at-icon at-icon-twitter" style="width: 32px; height: 32px;"><title id="at-svg-twitter-1">Twitter</title><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 0%;"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-2" class="at-icon at-icon-facebook" style="width: 32px; height: 32px;"><title id="at-svg-facebook-2">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-vk" style="background-color: rgb(99, 131, 168); border-radius: 0%;"><span class="at4-visually-hidden">Share to Vkontakte</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-vk-3" class="at-icon at-icon-vk" style="width: 32px; height: 32px;"><title id="at-svg-vk-3">Vkontakte</title><g><path d="M26.712 10.96s-.167-.48-1.21-.348l-3.447.024a.785.785 0 0 0-.455.072s-.204.108-.3.37a22.1 22.1 0 0 1-1.28 2.695c-1.533 2.61-2.156 2.754-2.407 2.587-.587-.372-.43-1.51-.43-2.323 0-2.54.382-3.592-.756-3.868-.37-.084-.646-.144-1.616-.156-1.232-.012-2.274 0-2.86.287-.396.193-.695.624-.515.648.227.036.742.143 1.017.515 0 0 .3.49.347 1.568.13 2.982-.48 3.353-.48 3.353-.466.252-1.28-.167-2.478-2.634 0 0-.694-1.222-1.233-2.563-.097-.25-.288-.383-.288-.383s-.216-.168-.527-.216l-3.28.024c-.504 0-.683.228-.683.228s-.18.19-.012.587c2.562 6.022 5.483 9.04 5.483 9.04s2.67 2.79 5.7 2.597h1.376c.418-.035.634-.263.634-.263s.192-.214.18-.61c-.024-1.843.838-2.12.838-2.12.838-.262 1.915 1.785 3.065 2.575 0 0 .874.6 1.532.467l3.064-.048c1.617-.01.85-1.352.85-1.352-.06-.108-.442-.934-2.286-2.647-1.916-1.784-1.665-1.496.658-4.585 1.413-1.88 1.976-3.03 1.796-3.52z" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-google_plusone_share" style="background-color: rgb(220, 78, 65); border-radius: 0%;"><span class="at4-visually-hidden">Share to Google+</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-google_plusone_share-4" class="at-icon at-icon-google_plusone_share" style="width: 32px; height: 32px;"><title id="at-svg-google_plusone_share-4">Google+</title><g><path d="M12 15v2.4h3.97c-.16 1.03-1.2 3.02-3.97 3.02-2.39 0-4.34-1.98-4.34-4.42s1.95-4.42 4.34-4.42c1.36 0 2.27.58 2.79 1.08l1.9-1.83C15.47 9.69 13.89 9 12 9c-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.72-2.84 6.72-6.84 0-.46-.05-.81-.11-1.16H12zm15 0h-2v-2h-2v2h-2v2h2v2h2v-2h2v-2z" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-compact" style="background-color: rgb(255, 101, 80); border-radius: 0%;"><span class="at4-visually-hidden">Share to More</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-5" class="at-icon at-icon-addthis" style="width: 32px; height: 32px;"><title id="at-svg-addthis-5">Addthis</title><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span></a></div></div></div>
              <!-- Go to www.addthis.com/dashboard to customize your tools -->
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55e053ac02ebd38e" async="async"></script>
              <!-- AddThis Button END -->
            </div>
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
    $.ajax({
      url: 'index.php?route=checkout/cart/add',
      type: 'post',
      data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
      dataType: 'json',
      beforeSend: function() {
        $('#button-cart').button('loading');
      },
      complete: function() {
        $('#button-cart').button('reset');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();
        $('.form-group').removeClass('has-error');

        if (json['error']) {
          if (json['error']['option']) {
            for (i in json['error']['option']) {
              var element = $('#input-option' + i.replace('_', '-'));

              if (element.parent().hasClass('input-group')) {
                element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
              } else {
                element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
              }
            }
          }

          if (json['error']['recurring']) {
            $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
          }

          $('.text-danger').parent().addClass('has-error');
        }

        if (json['success']) {
          $('.breadcrumb').after('<div class="alert alert-success alert-dismissible">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

          $('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');

          $('#cart > ul').load('index.php?route=common/cart/info ul li');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
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