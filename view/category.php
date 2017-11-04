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
                                        <h4><?php echo $thisCategory->name?></h4>
                                    </div>
                                    <div class="row">
                                    <?php if(isset($products) && count($products)>0):?>

                                        <div class="product-layout col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-thumb transition  options ">


                                                <div class="image">
                                                    <a class="lazy" href="<?php echo BASE_URL . '/product?id='. $product->product_id?>" style="padding-bottom: 111.11111111111%">
                                                        <img width="270" height="300" alt="<?php echo $product->name?>" title="<?php echo $product->name?>" class="img-primary" data-src="<?php echo $product->getPhotoUrl()?>" src="#"/>
                                                        <img width="270" height="300" alt="<?php echo $product->name?>" title="<?php echo $product->name?>" class="img-secondary" data-src="<?php echo $product->getPhotoUrl()?>" src="#"/>
                                                    </a>


                                                </div>
                          <span class="price">
															<?php echo $product->getPrize()?>
																				</span>
                                                <div class="name"><a href="<?php echo BASE_URL . '/product?id='. $product->product_id?>"><?php echo $product->name?></a></div>
                                                <p class="description"><?php echo $product->getShorDescription()?></p>
                                                <div class="button-group">
                                                    <button type="button" class="btn-primary"  onclick="ajaxAdd($(this),50);" > <i class="fa fa-shopping-cart"></i> <span>Купить</span> </button>
                                                    <button class="btn quickview" type="button" data-rel="details" data-product="50">Детали</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php else:?>
                                        <h5>В данной категории пока нет товаров</h5>
                                        <?php endif?>

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

<div id="common-home" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div id="style_switcher">
                <div class="toggler"></div>
                <p>The customization tool allows you to make color changes in your theme</p>
                <ul id="color-box">
                    <li><div class="color_scheme color_scheme_1" data-scheme="color_scheme_1">&nbsp;</div></li>
                    <li><div class="color_scheme color_scheme_2" data-scheme="color_scheme_2">&nbsp;</div></li>
                    <li><div class="color_scheme color_scheme_3" data-scheme="color_scheme_3">&nbsp;</div></li>
                    <li><div class="color_scheme color_scheme_4" data-scheme="color_scheme_4">&nbsp;</div></li>
                </ul>
            </div>


        </div>

    </div>
</div>