Shop = function () {
  (function () {
    $(document).on('click', '.menu_shopasas', function () {
    // console.log("test");
    });

  })(this);
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


