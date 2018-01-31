
<footer>
  <div class="container">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 footer_modules">
      <div class="block-info">
        <h3 class="box-heading">Информация</h3>
        <ul class="box-content list-unstyled">
          <?php if (count($pages_info)>0){?>
            <?php foreach ($pages_info as $page_inf){ ?>
              <li><a href="/page/<?php echo $page_inf->page_id;?>?page-info=<?php echo $page_inf->page_id;?>"><?php echo $page_inf->title;?></a></li>
            <?php } ?>
          <?php } ?>
        </ul>
      </div>

    </div>

    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 footer_modules"><div class="module-social">
        <div class="social-block">
          <h3 class="box-heading">Подписка</h3>
          <div class="box-content">





            <ul class="social-list list-unstyled">
              <?php foreach ($all_subscription as $subscription){ ?>
                <?php if ($subscription->type == "facebook" ){?>
                  <li><a href="<?php echo $subscription->subscription;?>" target="_blank"><i class=""></i> Facebook</a></li>
                <?php }?>

                <?php if ($subscription->type == "twitter" ){?>
                  <li><a href="<?php echo $subscription->subscription;?>" target="_blank"><i class=""></i> Twitter</a></li>
                <?php }?>

                <?php if ($subscription->type == "instagram" ){?>
                  <li><a href="<?php echo $subscription->subscription;?>" target="_blank"><i class=""></i> Instagram</a></li>
                <?php }?>
              <?php } ?>
            </ul>		</div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 footer_modules"><div class="">
        <h3 class="box-heading"><span>Обратная связь</span></h3>
        <div class="box-content footer_box">
          <address>
            <ul class="list-unstyled">
              <li class="footer-invert"><a href="https://www.google.com/maps/place/42%C2%B052'30.2%22N+74%C2%B029'42.8%22E/@42.8750554,74.4944464,197m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d42.8750543!4d74.4952186" target="_blank">
                  Наше расположение. </a></li>
              <li class="footer-invert">Позвоните: <a href="callto:0123-456-789">0123-456-789</a></li>
              <li>Email: <a href="mailto:technicavtoservice@gmail.com">technicavtoservice@gmail.com</a></li>
            </ul>
          </address>
        </div>
      </div>
    </div>

  </div>
  <div class="copyright"><div class="container"></div></div><!-- [[%FOOTER_LINK]] -->
</footer>
<div class="ajax-overlay"></div>
<div class="ajax-quickview-overlay">
  <span class="ajax-quickview-overlay__preloader"></span>
</div>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="catalog/view/javascript/jetimpex/swiper/swinit.js" type="text/javascript"></script>
<script src="catalog/view/theme/jetimpex/js/device.min.js" type="text/javascript"></script>
<script src="catalog/view/theme/jetimpex/js/livesearch.min.js" type="text/javascript"></script>
<script src="catalog/view/theme/jetimpex/js/common.js" type="text/javascript"></script>
<script src="catalog/view/theme/jetimpex/js/script.js" type="text/javascript"></script>
</div>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
  (function(){ var widget_id = 'jUVndrPlSv';var d=document;var w=window;function l(){
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>