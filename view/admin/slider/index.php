<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Слайдер</h1>
    </div>
</div>

Навигация для управиления слайдов на главной странице.

<table class="table">
  <?php foreach ($all_sliders as $slider) { ?>
  <tr>
    <td><img class="slider_img" src="<?php echo $slider['url']?>"></td>
    <td><a href="#" onclick="self.shop.slideOption('slider-edit')"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    <td><a href="#" onclick="self.shop.slideOption('slider-delete')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
  </tr>
  <?php } ?>
</table>


