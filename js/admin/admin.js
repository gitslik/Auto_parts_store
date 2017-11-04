Shop = function () {
  (function () {
    $(document).on('click', '.menu_shopasas', function () {
    // console.log("test");
    });

  })(this);
};


/*Products*/
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
  console.log(options);
  $.ajax({
    type: "POST",
    url: "admin/"+url,
    data: {img: options},
    dataType: "html",
    success: function (data) {
      console.log(data);
    // $(".content_page").html(data);
    }
  });
};

Shop.prototype.slideOption = function (options) {
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






