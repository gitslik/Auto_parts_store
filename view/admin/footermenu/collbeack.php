<div id="page-wrapper">
  <div class="content_page col-lg-12">
    <style>
      div#page-wrapper {
        min-height: 560px !important;
      }
    </style>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Footer обратная связь и информация о расположении</h1>
        <div class="add-slider-options">
        </div>
      </div>
    </div>

    <div class="form-group col-lg-8">
      <input type="text" id="locaion" name="location" value="">
    </div>
    <div class="form-group col-lg-8">
      <textarea name="phone" id="phone" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group col-lg-8">
      <input type="text" id="email" name="email" value="">
    </div>
    <div class="form-group col-lg-8">
      <input type="button" id="submit_save_subscription" onclick="self.shop.adminFooterCollbeackUpdate()"
             value="Сохранить">
    </div>


    <script>
      tinyMCE.init({
        selector: "#phone",
        menubar: false,
        height: 200,
        plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
          "table contextmenu directionality emoticons paste textcolor responsivefilemanager "
        ],
        relative_urls: false,
        language: 'ru',

        filemanager_title: "Responsive Filemanager",
        filemanager_crossdomain: true,
        external_filemanager_path: "../../filemanager/",
        external_plugins: {
          "filemanager": "../../filemanager/plugin.min.js",
          "responsivefilemanager": "plugins/wysiwyg/tinymce/plugins/responsivefilemanager/plugin.min.js",
        },
        relative_urls: false,
        image_advtab: true,
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview"
      });

      //
      // Handles message from ResponsiveFilemanager
      //
      function OnMessage(e) {
        var event = e.originalEvent;
        // Make sure the sender of the event is trusted
        if (event.data.sender === 'responsivefilemanager') {
          if (event.data.field_id) {
            var fieldID = event.data.field_id;
            var url = event.data.url;
            $('#' + fieldID).val(url).trigger('change');
            $.fancybox.close();

            // Delete handler of the message from ResponsiveFilemanager
            $(window).off('message', OnMessage);
          }
        }
      }

      // Handler for a message from ResponsiveFilemanager
      $(".opener-class").on('click', function () {
        $(window).on('message', OnMessage);
      });
    </script>

  </div>
</div>



