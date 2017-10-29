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
  </tr>
  <?php } ?>
</table>


