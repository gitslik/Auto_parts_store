<div class="content_page">
  <style>
    div#page-wrapper {
      min-height: 500px!important;
    }
  </style>
  <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Footer соц сети подписки</h1>
        <div class="add-slider-options">
        </div>
      </div>
  </div>


  <div id="socseti">
      <?php if (isset($all_subscription) && count($all_subscription)>0){ ?>
        <?php foreach ($all_subscription as $subscription){ ?>
        <div class="form-group">
          <label for="name"><?php echo $subscription->type;?></label>
              <input type="text" id="<?php echo $subscription->type;?>" data-id="<?php echo $subscription->id;?>" data-type="<?php echo $subscription->type; ?>" value="<?php echo $subscription->subscription; ?>">
        </div>
        <?php } ?>
        <input type="button" id="submit_save_subscription" onclick="self.shop.submitSaveSubscription()" value="Сохранить">
      <?php } ?>
  </div>
</div>




