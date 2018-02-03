Shop = function () {
  (function () {
  })(this);
};

/*Menu*/
Shop.prototype.addMenuSave = function () {
  var menu_name = $("#menu_name").val();
  $.ajax({
    type: "POST",
    url: "/admin/addMenuSave",
    data: menu_name,
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};

Shop.prototype.addMenuDelete = function (options) {
  $.ajax({
    type: "POST",
    url: "/admin/addMenuDelete",
    data: {menu: options},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};


Shop.prototype.addMenu = function (options) {
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
  fd.append('description', $("#description").val());

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
  fd.append('description', $('#description').val());
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

      var element = $(data).find(".content_page");
      console.log(element);
      $(".content_page").html(element);
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
Shop.prototype.checoutStatus = function (element,options,id) {
  var status_name = 1;
  var status_id = 1;
  if($('#status_' + id).html() == 'Активный'){
    status_name ='Обработан';
    status_id = 0;
  }else{
    status_name ='Активный';
    status_id = 1;
    $('#status_' + id).html('Активный');
  }
  $('#status_' + id).html('Изменение...');
  $.ajax({
    type: "POST",
    url: "/admin/"+options,
    data: {'id': id,'status_id': status_id},
    dataType: "html",
    success: function (data) {
      $('#status_' + id).html(status_name);

    }
  });
};Shop.prototype.checoutStatus = function (element,options,id) {
  $('#censelMOdalBurron').click();
  var status_name = 1;
  var status_id = 1;
  if($('#status_' + id).html() == 'Активный'){
    status_name ='Обработан';
    status_id = 0;
  }else{
    status_name ='Активный';
    status_id = 1;
    $('#status_' + id).html('Активный');
  }
  $('#status_' + id).html('Изменение...');
  $.ajax({
    type: "POST",
    url: "/admin/"+options,
    data: {'id': id,'status_id': status_id},
    dataType: "html",
    success: function (data) {
      $('#status_' + id).html(status_name);

    }
  });
};
Shop.prototype.checoutDelete = function (element,options,id) {
  $('#censelMOdalBurron').click();
  $.ajax({
    type: "POST",
    url: "/admin/"+options,
    data: {'id': id},
    dataType: "html",
    success: function (data) {
      $('#status_' + id).parent().remove();
    }
  });
};
Shop.prototype.checkoutView = function (id) {
  $('#showModalForCheckout').click();
  $('.modal-body').html('Загрузка данных...')
  $.ajax({
    type: "POST",
    url: "/admin/checkoutdetails",
    data: {'id': id},
    dataType: "html",
    success: function (data) {
      $('.modal-content').html(data);
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
  console.log("tut");
  if(event == "collbeack"){
    console.log(event);
    window.location.href = "/admin/collbeack";
  }else {
    $.ajax({
      type: "POST",
      url: "/admin/"+event,
      data: {cat: event},
      dataType: "html",
      success: function (data) {
        $(".content_page").html(data);
      }
    });
  }

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

Shop.prototype.deleteYoutubeVideo = function (options) {
  $.ajax({
    type: "POST",
    url: "/admin/deleteYoutube",
    data: {options: options},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};


Shop.prototype.deleteImageProduct = function (options) {
  $.ajax({
    type: "POST",
    url: "/admin/deleteImageProduct",
    data: {options: options},
    dataType: "html",
    success: function (data) {
      $("#block_img_product_"+options).hide();
    }
  });
};

Shop.prototype.submitSaveSubscription = function () {
  var facebook = $("#facebook").val();
  var twitter = $("#twitter").val();
  var instagram = $("#instagram").val();
  $.ajax({
    type: "POST",
    url: "/admin/submitSaveSubscription",
    data: {facebook: facebook,twitter:twitter,instagram:instagram},
    dataType: "html",
    success: function (data) {
      $(".content_page").html(data);
    }
  });
};

Shop.prototype.adminFooterCollbeackUpdate = function () {

  var location = $("#locaion").val();
  var phone =  tinyMCE.get('phone').getContent();
  var email = $("#email").val();

  $.ajax({
    type: "POST",
    url: "/admin/collbeackUpdate",
    data: {location: location,phone:phone,email:email},
    dataType: "html",
    success: function (data) {
      window.location.href="/admin/collbeack";
    }
  });

};



