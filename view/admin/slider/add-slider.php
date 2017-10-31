<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Добавление сладера</h1>
    </div>
</div>

<form class="form-horizontal">
  <div class="container">
    <div class="col-md-6">
      <div class="form-group">
        <label>Загрузка картинки</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Добавление… <input type="file" name="file" id="imgInp">
                </span>
            </span>
          <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload'>
      </div>
    </div>
  </div>

  <a href="#" onclick="self.shop.slideAddItem('slider-upload')" class="btn-success save-btn">Добавить картинку в слайдер</a>
</form>

<script>
  $(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

      var input = $(this).parents('.input-group').find(':text'),
        log = label;

      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }

    });
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#img-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function(){
      readURL(this);
    });
  });
</script>