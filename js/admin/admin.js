Shop = function () {
  (function () {
  })(this);
};

/*Menu*/

Shop.prototype.addMenu = function (options) {
  console.log(options);
  $.ajax({
    url: '/admin/addMenu',
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};

Shop.prototype.editMenu = function (options) {
  console.log(options);
  $.ajax({
    url: '/admin/editMenu',
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
/*End Menu*/

/*Pages*/
Shop.prototype.pagesOption = function (options) {
  $.ajax({
    type: "POST",
    url: "/admin/"+options,
    data: {cat: options},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
      $(document).ready(function () {
        var intervalID = setInterval(function(){
          if($(".content_page").find(".description_page")[0]){
            tinyMCE.init({
              selector: "#description",
              menubar: false,
              height: 200
            });
            clearInterval(intervalID);
          }
        },1000);
      });
    }
  });
};
Shop.prototype.savePageForm = function () {

  var fd = new FormData;
  var title = $('#name').val();
  var description = tinyMCE.get('description').getContent();
  var enabled = '1';
  var menu_id = $("#menu_id").val();

  fd.append('title', title);
  fd.append('description', description);
  fd.append('enabled', enabled);
  fd.append('menu_id', menu_id);

  $.ajax({
    url: '/admin/savePages',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });

};

Shop.prototype.editPageForm = function () {

  var fd = new FormData;
  var title = $('#name').val();
  var page_id = $('#page_id').val();

  var description = tinyMCE.get('description').getContent();
  var enabled = '1';
  var menu_id = $("#menu_id").val();

  fd.append('page_id', page_id);
  fd.append('title', title);
  fd.append('description', description);
  fd.append('enabled', enabled);
  fd.append('menu_id', menu_id);

  $.ajax({
    url: '/admin/updatePages',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });

};
/*End Pages*/

/*Category*/
Shop.prototype.saveCategoryForm = function () {
  var fd = new FormData;
  var array_photo = [];
  $($("#photo").prop('files')).each(function(index,foto){
    array_photo.push(foto);
    console.log(index);console.log(foto);
  });

  jQuery.each($('#photo')[0].files, function(i, file)  {
    fd.append('file-'+i, file);
  });

  fd.append('img', array_photo);
  fd.append('params', $("#add-new-category").serialize());
  fd.append('name', $("#name").val());

  $.ajax({
    url: '/admin/saveCategoryForm',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
Shop.prototype.categoryOption = function (options) {
  $.ajax({
    url: '/admin/'+options,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
Shop.prototype.categoryEdit = function (options) {
  var fd = new FormData;
  fd.append('id', options);
  $.ajax({
    url: '/admin/editCategoryForm',
    processData: false,
    contentType: false,
    data: fd,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
Shop.prototype.updateCategoryForm = function (options) {
  var fd = new FormData;
  fd.append('id', options);
  fd.append('name', $('#name').val());
  fd.append('parent_category_id', $('#parent_category_id').val());
  var file =  $($("#photo").prop('files'));
  fd.append('file', file[0]);

  $.ajax({
    url: '/admin/updateCategoryForm',
    processData: false,
    contentType: false,
    data: fd,
    type: 'POST',
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
/*End Category*/

/*Products*/
Shop.prototype.updateProducts = function () {
  console.log("updateProducts");
};
Shop.prototype.editProducts = function (options) {

  var fd = new FormData;
  fd.append('id', options);

  $.ajax({
    url: '/admin/editProducts',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function () {
      $(".content_page").html(data);
    }
  });
};
Shop.prototype.deleteProduct = function (options) {
  var fd = new FormData;
  fd.append('id', options);

  $.ajax({
    url: '/admin/deleteProduct',
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function () {
      window.location="/admin/products";
    }
  });
};
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




  fd.append('name', $("#name").val());
  fd.append('description', tinyMCE.get('description').getContent());

  fd.append('img', array_photo);
  fd.append('params', $("#add-new-products").serialize());

  $.ajax({
    url: '/admin/saveProduct',
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
    url: "/admin/"+options,
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
    url: "/admin/productsOfCategory",
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
    url: '/admin/slider-upload',
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
    url: "/admin/"+options,
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
    url: "/admin/"+menu_link,
    data: {cat: menu_link},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
/*End Slide*/

/*FooterMenu*/
Shop.prototype.footer = function (event) {
  $.ajax({
    type: "POST",
    url: "/admin/"+event,
    data: {cat: event},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
Shop.prototype.addInfopagesOption = function () {
  $.ajax({
    type: "POST",
    url: "/admin/addInfopagesOption",
    data: {page: $("#page_info").val()},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
  console.log("addInfopagesOption");
};
Shop.prototype.deleteInfopagesOption = function (id) {
  $.ajax({
    type: "POST",
    url: "/admin/deleteInfopagesOption",
    data: {page: id},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};
/*EndFooterMenu*/






