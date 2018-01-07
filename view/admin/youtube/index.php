<style>
  div#page-wrapper {
    min-height: 500px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Youtube меню</h1>
      <div class="add-slider-options">
      </div>
    </div>
</div>

Навигация для управиления Youtube меню на главной странице.

<div>
  <form id="youtube_form" action="/admin/addYoutube" method="post">
    <input type="text" name="youtube_name" id="youtube_element">
    <input type="submit"  value="Save">
  </form>
</div>

<script>

  $("#youtube_form").submit(function( event ) {
    event.preventDefault();

    var url_video = $('#youtube_element').val();

    console.log(url_video);

    if(url_video){
      var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*!/;
      var match = url_video.match(regExp);

      console.log(match);

/*      var productInputs = "<div class='video-block-ssw'><iframe src='https://www.youtube.com/embed/"+getId(url_video)+"' width='90%' height='360' frameborder='0' allowfullscreen></iframe></div>";
      ssw(ssw(".grid.product-single>div")[0]).append(productInputs);
      var productInputs_mobile = "<div class='video-block-ssw-mobile'><iframe src='https://www.youtube.com/embed/"+getId(url_video)+"' width='100%' height='360' frameborder='0' allowfullscreen></iframe></div>";
      ssw(".description").append(productInputs_mobile);*/

    }


  });


</script>