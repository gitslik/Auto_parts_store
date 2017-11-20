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

                                        <?php
                                        $empty = 'В ДАННОЙ КАТЕГОРИИ ПОКА НЕТ ТОВАРОВ';
                                        include('products_list.php');?>


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

<!--<div id="common-home" class="container">
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
</div>-->