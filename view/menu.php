<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
  <div class="col-inner ">


    <div class="box category">

      <div class="box-content">
        <div class="box-category">
          <ul class="list-unstyled category_menu">


            <li class="parent">
              <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42">Exhaust Tips</a>
              <ul class="list-unstyled">
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42_49">Catalytic Converter</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42_50">Mufflers</a>

                  <ul class="list-unstyled">

                    <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42_50_59"> - Muffler - 2-1/4&quot; ID Inlet</a></li>

                    <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42_50_61"> - Muffler - 2-1/2&quot; ID Inlet</a></li>

                    <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42_50_63"> - Muffler - 3&quot; ID Inlet</a></li>

                  </ul>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=42_51">Exhaust Pipes</a>

                </li>

              </ul>
            </li>




            <li class="parent">
              <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=43">Bumpers &amp; Components</a>
              <ul class="list-unstyled">
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=43_68">Audi Bumper</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=43_69">BMW Bumper</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=43_52">Ford Bumper</a>

                </li>

              </ul>
            </li>




            <li class="parent">
              <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=44">Mirrors &amp; Components</a>
              <ul class="list-unstyled">
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=44_53">Outside Mirror Cover</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=44_54">Mirror Replacement Glass</a>

                </li>

              </ul>
            </li>




            <li class="parent">
              <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=45">Grilles &amp; Components</a>
              <ul class="list-unstyled">
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=45_55">Audi grille</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=45_65">BMW grille</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=45_66">Buick grille</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=45_67">Cadillac grille</a>

                </li>

              </ul>
            </li>




            <li class="parent">
              <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=46">Brake Discs</a>
              <ul class="list-unstyled">
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=46_60">Mazda Brake Disc</a>

                </li>
                <li>
                  <a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=46_62">Toyota Brake Disc</a>

                </li>

              </ul>
            </li>




            <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=47">Calipers</a></li>




            <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=48">Shocks, Struts</a></li>




            <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=58">Car Covers</a></li>




            <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=56">Seats, Seat Covers</a></li>




            <li><a href="https://livedemo00.template-help.com/opencart_65320/index.php?route=product/category&amp;path=64">Carpet Kits</a></li>



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

    <div id="banner0" class="banners row">

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
    </div>



  </div>
</div>