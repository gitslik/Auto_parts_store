<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
  <div class="col-inner ">


    <div class="box category">

      <div class="box-content">
        <div class="box-category">
          <ul class="list-unstyled category_menu">

          <?php foreach($categories as $cat):?>
            <li <?php if(count($cat['child'])>0):?>class="parent"<?php endif;?>>
              <a href="<?php echo BASE_URL . '/category?id='. $cat['menu']->category_id ?>"><?php echo $cat['menu']->name ?></a>
              <?php if(count($cat['child'])>0):?><ul class="list-unstyled">
                <?php foreach($cat['child'] as $child):?>
                <li>
                  <a href="<?php echo BASE_URL . '/category?id='. $child->category_id ?>"><?php echo $child->name ?></a>

                </li>
                <?php endforeach;?>
                </ul><?php endif;?>

            </li>

        <?php endforeach;?>






          </ul>
        </div>
      </div>
    </div>

    <script>
      ;(function ($) {
        $(window).load(function () {
          var o = $('.category_menu');
          o.find('li li li a').each(function () {
            if ($(location).attr('href').indexOf($(this).attr('href')) >= 0){
              $(this).addClass('active');
              return;
            }
          });
          if (jQuery('.category_menu li a').hasClass('active')) { } else {
            o.find('li li a').each(function () {
              if ($(location).attr('href').indexOf($(this).attr('href')) >= 0){
                $(this).addClass('active');
                return;
              }
            });
          }
          if (jQuery('.category_menu li a').hasClass('active')) { } else {
            o.find('li a').each(function () {
              if ($(location).attr('href').indexOf($(this).attr('href')) >= 0){
                $(this).addClass('active');
                return;
              }
            });
          }

          jQuery('.category_menu').find('li.parent').prepend('<i class="fa fa-caret-down"></i>');
          jQuery('.category_menu').find('a.active').closest('li.parent').find('> ul').slideToggle().closest('li.parent').find('>i').removeClass('fa-caret-down').addClass('fa-caret-up');
          jQuery('.category_menu li.parent i').on("click", function(){
            if (jQuery(this).hasClass('fa-caret-up')) {
              jQuery(this).removeClass('fa-caret-up').addClass('fa-caret-down').parent('li.parent').find('> ul').slideToggle(); }  else {
              jQuery(this).removeClass('fa-caret-down').addClass('fa-caret-up').parent('li.parent').find('> ul').slideToggle();
            }
          });

        });
      })(jQuery);
    </script>

<!--    <div id="banner0" class="banners row">

      <div class="col-sm-6 banner-1">
        <div class="banner-box">
          <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-sale-270x287.jpg" alt="banner-1" class="img-responsive" />
          <a class="clearfix link" href="index.php?route=product/special"></a>

          <div class="s-desc"><h2>Special offer</h2>
            <div class="banner-bottom">
              <h2>Save up to 30%</h2>
              <h4>on BRAKE SYSTEMS</h4>
            </div></div>

        </div>
      </div>
    </div>-->



  </div>
</div>