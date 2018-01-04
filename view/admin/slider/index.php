<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Слайдер</h1>
      <div class="add-slider-options">
        <a href="#" onclick="self.shop.slideOption('slider-add',0)">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>

Навигация для управиления слайдов на главной странице.

<table class="table">
  <?php if (isset($all_sliders)){ ?>
  <?php foreach ($all_sliders as $slider) { ?>
  <tr>
    <td><img class="slider_img" src="../<?php echo $slider['url']?>"></td>
    <td><a href="#" onclick="self.shop.slideOption('slider-delete',<?php echo $slider['id']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
  </tr>
  <?php } ?>
  <?php } ?>
</table>


