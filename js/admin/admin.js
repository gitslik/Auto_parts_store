Shop = function () {
  (function () {
    $(document).on('click', '.menu_shopasas', function () {
    // console.log("test");
    });

  })(this);
};


/*Products*/
Shop.prototype.productAddItem = function () {
  var fd = new FormData;
  var array_photo = [];
  $($("#photo").prop('files')).each(function(index,foto){
    array_photo.push(foto);
    console.log(index);console.log(foto);
  });

  jQuery.each($('#photo')[0].files, function(i, file) {
    fd.append('file-'+i, file);
  });

  console.log(array_photo);
  fd.append('img', array_photo);
  fd.append('params', $("#add-new-products").serialize());

  $.ajax({
    url: 'admin/saveProduct',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });

};

Shop.prototype.productOption = function (options) {
  $.ajax({
    type: "POST",
    url: "admin/"+options,
    data: {cat: options},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
Shop.prototype.productsOfCategory = function (id) {
  $.ajax({
    type: "POST",
    url: "admin/productsOfCategory",
    data: {id: id},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
/*End Products*/

/*Slide*/
Shop.prototype.slideAddItem = function (options) {

  var $input = $("#imgInp");
  var fd = new FormData;

  fd.append('img', $input.prop('files')[0]);

  $.ajax({
    url: 'admin/slider-upload',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });


};

Shop.prototype.slideOption = function (options, id) {
  $.ajax({
    type: "POST",
    url: "admin/"+options,
    data: {cat: options, id: id},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};

Shop.prototype.indexPageTest = function (menu_link) {
  $.ajax({
    type: "POST",
    url: "admin/"+menu_link,
    data: {cat: menu_link},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
/*End Slide*/






