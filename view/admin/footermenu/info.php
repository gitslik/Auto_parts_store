<div class="content_page">
<style>
  div#page-wrapper {
    min-height: 500px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Footer Информация</h1>
      <div class="add-options">
        <a href="#" onclick="self.shop.addInfopagesOption()">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
      </div>
    </div>
</div>

<div class="form-group col-lg-8">
  <select class="form-control" id="page_info" name="page_info">
    <option value="0"></option>
  <?php foreach ($pages as $page){?>
    <option value="<?php echo $page['page_id']?>"><?php echo $page['title'];?></option>
  <?php } ?>
  </select>
</div>
<div class="form-group col-lg-8">
  <ul>
    <?php foreach ($pages_lists as $list) { ?>
      <li>
        <div class="list_info"><?php echo $list['title'];?></div>
        <div class="list_info_delete">
          <a href="#" onclick="self.shop.deleteInfopagesOption('<?php echo $list["page_id"]; ?>')" class="delete_product">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </a>
        </div>
      </li>
    <?php } ?>
  </ul>
</div>
</div>