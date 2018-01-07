<?php if(isset($news) && count($news)>0):?>
  <?php foreach($news as $product):?>
    <div class="product-layout col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="product-thumb transition  options ">


        <div class="image">
          <a class="lazy" href="<?php echo BASE_URL . '/product?id='. $product->product_id?>" style="padding-bottom: 111.11111111111%">
            <?php
            $photos = $product->getPhotoUrl();
            if($photos){
              $i = 0;

                $count = count($photos);

              foreach($photos as $photo){
                $i++; if($i>=3){ continue; }
              ?>
              <img width="270" height="300" alt="<?php echo $product->name?>" title="<?php echo $product->name?>" class="<?php echo $i==1?'img-primary':'img-secondary' ?>" data-src="<?php echo BASE_URL . '/' .$photo->url ?>" src="#"/>
              <?php if($count == 1){
?>

                  <img width="270" height="300" alt="<?php echo $product->name?>" title="<?php echo $product->name?>" class="img-secondary" data-src="<?php echo BASE_URL . '/' .$photo->url ?>" src="#"/>
                  <?php
                }?>

            <?php } }else{ ?>
              <img width="270" height="300" alt="<?php echo $product->name?>" title="<?php echo $product->name?>" class="img-primary" data-src="<?php echo $product->getDefaulImage()?>" src="#"/>

            <?php }?>
          </a>


        </div>
                          <span class="price">
															<?php echo $product->getPrize()?>
																				</span>
        <div class="name"><a href="<?php echo BASE_URL . '/product?id='. $product->product_id?>"><?php echo $product->name?></a></div>
        <p class="description"><?php echo $product->getShorDescription()?></p>
        <div class="button-group">
          <button type="button" class="btn-primary"  onclick="ajaxAdd($(this),<?php echo $product->product_id?>);" > <i class="fa fa-shopping-cart"></i> <span>Купить</span> </button>
          <button class="btn quickview" type="button" data-rel="details" data-product="50">Детали</button>
        </div>
      </div>
    </div>
  <?php endforeach;?>
 

<?php else:?>
  <h5><?php echo $empty;?></h5>
<?php endif?>