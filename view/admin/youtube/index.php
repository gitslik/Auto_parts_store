
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

<div class="content_page">
    <div>
      <form id="youtube_form" action="/admin/addYoutube" method="post">
        <input type="text" name="youtube_name" id="youtube_element">
        <input type="submit"  value="Save">
      </form>
      <input type="button" onclick="self.shop.deleteYoutubeVideo('<?php echo $key_video; ?>')" class="btn btn-danger delete-btn-youtube" value="Удалить видео">
    </div>
    <div id="preview_youtube">
      <?php if (isset($key_video)) {?>
        <div class="video-block-ssw">
          <iframe src="https://www.youtube.com/embed/<?php echo $key_video; ?>" width="60%" height="300" frameborder="0" allowfullscreen=""></iframe>
        </div>
      <?php }?>
    </div>
</div>
<script>


  function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
  }

  $("#youtube_form").submit(function( event ) {
    event.preventDefault();

    var url_video = $('#youtube_element').val();

    if(url_video){

      var productInputs = "<div class='video-block-ssw'><iframe src='https://www.youtube.com/embed/"+youtube_parser(url_video)+"' width='60%' height='300' frameborder='0' allowfullscreen></iframe></div>";

      $("#preview_youtube").html(productInputs);

      $.ajax({
        type: "POST",
        url: "/admin/addYoutube",
        data: {id: youtube_parser(url_video)},
        dataType: "html",
        success: function (data) {
          $(".content_page").html(data);
        }
      });
    }


  });


</script>

