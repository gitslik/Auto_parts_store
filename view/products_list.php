<?php if(isset($products['subset']) && count($products['subset'])>0):?>
  <?php foreach($products['subset'] as $product):?>
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
        <p class="description"><?php echo strip_tags($product->getShorDescription());?></p>
        <div class="button-group">
          <button type="button" class="btn-primary"  onclick="ajaxAdd($(this),<?php echo $product->product_id?>);" > <i class="fa fa-shopping-cart"></i> <span>Купить</span> </button>
          <button class="btn " type="button" onclick="details_go('<?php echo BASE_URL . '/product?id='. $product->product_id?>')">Детали</button>
        </div>
      </div>
    </div>
  <?php endforeach;?>
  <div class="row">
    <div class="col-sm-6 text-left">
      <ul class="pagination">
        <?php if ($products['pos'] > 1): ?>
          <li>
            <a href="<?php echo BASE_URL . '/category?id=' . $thisCategory->category_id  ?>">|&lt;</a>
          </li>
          <li><a href="<?php echo BASE_URL . '/category?id=' . $thisCategory->category_id . '&page=' . ($products['pos']-1) ?>">&lt;</a>
          </li>
        <?php endif; ?>
  <?php for($i=0; $i<$products['count'];$i++): ?>
    <?php if ($i == $products['pos']): ?>
      <li class="active"><span><?php echo $products['pos'] + 1;?></span></li>
      <?php else: ?>
      <li><a href="<?php echo  BASE_URL . '/category?id=' . $thisCategory->category_id . '&page='.($i) ?>"><?php echo $i+1;?></a></li>
        <?php endif; ?>

    <?php endfor;?>
        <?php if($products['count']>3):?>
        <li><a href="<?php echo BASE_URL . '/category?id=' . $thisCategory->category_id . '&page=' . ($products['pos'] + 1) ?>">&gt;</a></li>
        <li><a href="<?php echo BASE_URL . '/category?id=' . $thisCategory->category_id . '&page='.($products['count']) ?>">&gt;|</a></li>
    <?php endif;?>
      </ul>
    </div>
    <div class="col-sm-6 text-right tx-results">Показано <?php echo $products['limit']?> продукта из <?php echo $products['total']?> (Всего страниц <?php echo $products['count']?>)</div>
  </div>

<?php else:?>
  <h5><?php echo $empty;?></h5>
<?php endif?>