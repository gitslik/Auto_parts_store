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


                  <div id="banner1" class="banners row" style="    width: 100%;">

                    <?php
                    $counter  = 0;
                    global $db;
                    foreach($categories_main as $cat):

                      $file_obj = new Files($db);

                      $file_for_edit = $file_obj->find(array('product_id =? and type = 1',$cat['menu']->category_id));
                      if(count($file_for_edit)<=0){
                        continue;
                        $img_url_hehe = 'https://www.bmw-m.com/content/dam/bmw/marketBMW_M/common/topics/magazine-article-pool/bmw-m-performance-parts/bmw-mpp-sg-01-xl-03-silencer-system-m5-m6.jpg/_jcr_content/renditions/cq5dam.resized.img.1185.large.time1489574734489.jpg';
                      }else{
                        $img_url_hehe = $file_for_edit[0]->url;
                      }
                      if($counter>=6){
                        continue;
                      }
                      ?>
                    <div class="col-sm-6 banner-1" style="width: 48%;">
                      <div class="banner-box" style="height: 128px;">
                        <img style="max-width: 150px; float: right; height: 100%; object-fit: cover;" src="<?php echo $img_url_hehe ?>" alt="banner-1" class="img-responsive" />
                        <a class="clearfix link" href="<?php echo BASE_URL . '/category?id='. $cat['menu']->category_id ?>"></a>

                        <div class="s-desc">						<h2><?php echo $cat['menu']->name ?></h2>
                         <!-- <h4>SYSTEMS</h4>-->
                          <p><?php echo $cat['menu']->description ?></p>
                        </div>

                      </div>
                    </div>
                    <?php
                      $counter ++;
                    endforeach;?>
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

