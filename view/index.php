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

                  <?php if (isset($key_video)) {?>
                  <div id="youtube_block">
                    <div class="video-block-ssw">
                      <iframe src="https://www.youtube.com/embed/<?php echo $key_video; ?>" width="100%" height="360" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                  </div>
                  <?php } ?>


                  <div id="banner1" class="banners row">


                    <div class="col-sm-6 banner-1">
                      <div class="banner-box">
                        <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-1-418x128.jpg" alt="banner-1" class="img-responsive" />
                        <a class="clearfix link" href="index.php?route=product/category&amp;path=48"></a>

                        <div class="s-desc">						<h2>SUSPENSION</h2>
                          <h4>SYSTEMS</h4>
                          <p>Nowadays we have great opportunities to satisfy your demands with the high quality products.</p>
                        </div>

                      </div>
                    </div>


                    <div class="col-sm-6 banner-2">
                      <div class="banner-box">
                        <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-2-418x128.jpg" alt="banner-2" class="img-responsive" />
                        <a class="clearfix link" href="index.php?route=product/category&amp;path=47"></a>

                        <div class="s-desc">						<h2>BRAKE</h2>
                          <h4>SYSTEMS</h4>
                          <p>Nowadays we have great opportunities to satisfy your demands with the high quality products.</p>
                        </div>

                      </div>
                    </div>


                    <div class="col-sm-6 banner-3">
                      <div class="banner-box">
                        <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-3-418x128.jpg" alt="banner-3" class="img-responsive" />
                        <a class="clearfix link" href="index.php?route=product/category&amp;path=58"></a>

                        <div class="s-desc">						<h2>HALO</h2>
                          <h4>HEADLIGHTS</h4>
                          <p>Nowadays we have great opportunities to satisfy your demands with the high quality products.</p>
                        </div>

                      </div>
                    </div>


                    <div class="col-sm-6 banner-4">
                      <div class="banner-box">
                        <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-4-418x128.jpg" alt="banner-4" class="img-responsive" />
                        <a class="clearfix link" href="index.php?route=product/category&amp;path=56"></a>

                        <div class="s-desc">						<h2>AIR</h2>
                          <h4>INTAKES</h4>
                          <p>Nowadays we have great opportunities to satisfy your demands with the high quality products.</p>
                        </div>

                      </div>
                    </div>


                    <div class="col-sm-6 banner-5">
                      <div class="banner-box">
                        <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-5-418x128.jpg" alt="banner-5" class="img-responsive" />
                        <a class="clearfix link" href="index.php?route=product/category&amp;path=64"></a>

                        <div class="s-desc">						<h2>turbine</h2>
                          <h4>SYSTEMS</h4>
                          <p>Nowadays we have great opportunities to satisfy your demands with the high quality products.</p>
                        </div>

                      </div>
                    </div>


                    <div class="col-sm-6 banner-6">
                      <div class="banner-box">
                        <img src="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/banner-6-418x128.jpg" alt="banner-6" class="img-responsive" />
                        <a class="clearfix link" href="index.php?route=product/category&amp;path=42"></a>

                        <div class="s-desc">						<h2>EXHAUST</h2>
                          <h4>SYSTEMS</h4>
                          <p>Nowadays we have great opportunities to satisfy your demands with the high quality products.</p>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="box featured">
                    <div class="box-heading">
                      <h4>Рекомендуемые</h4>
                    </div>
                    <div class="row">
                     <?php include 'recomended.php'?>
                    </div>
                  </div>
                  <!-- RD Parallax -->
                  <div id="parallax_0" class="rd-parallax">
                    <div class="rd-parallax-layer" data-type="media" data-speed=".2" data-direction="normal" data-url="https://livedemo00.template-help.com/opencart_65320/image/cache/catalog/parallax-871x474.jpg" data-blur="false">
                    </div>

<!--                    <div class="rd-parallax-layer layer-1" data-type="html" data-speed="0" data-fade="false" data-direction="inverse"  >
                      <div class="parallax-block">
                        <h2>AUTO LIGHTING</h2>
                        <h4>50 % off</h4>
                        <p>We are honored to present you our products. We provide auto spare parts and our main goal is to satisfy all of our customers.</p>
                        <a href="index.php?route=product/product&amp;product_id=29" class="btn-primary">Shop now</a>
                      </div>
                    </div>-->


                  </div>
                  <script>
                    jQuery(document).ready(function () {
                      jQuery("#parallax_0").RDParallax();
                    });
                  </script>
                  <!-- END RD Parallax-->
                  <div class="box latest">
                    <div class="box-heading">
                      <h4>Новые поступления</h4>
                    </div>
                    <div class="row">
                      <?php include 'news.php';?>
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

