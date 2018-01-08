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
<div id="preview_youtube"></div>

<script>


  function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
  }

  $("#youtube_form").submit(function( event ) {
    event.preventDefault();

    var url_video = $('#youtube_element').val();

    console.log(url_video);

    if(url_video){

      var productInputs = "<div class='video-block-ssw'><iframe src='https://www.youtube.com/embed/"+youtube_parser(url_video)+"' width='60%' height='300' frameborder='0' allowfullscreen></iframe></div>";

      $("#preview_youtube").html(productInputs);


    }


  });


</script>