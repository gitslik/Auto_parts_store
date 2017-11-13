<style>
  div#page-wrapper {
    min-height: 500px!important;
  }
</style>
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Категории</h1>
      <div class="add-slider-options">
        <a href="#" onclick="self.shop.savePageForm()" class="btn-success save-btn">Добавить страницу</a>
      </div>
    </div>
</div>

<div class="container col-lg-8">
  <h2>Форма создания страниц</h2>
  <p>В данной форме вы можете создать новые страницы:</p>
  <form id="add-new-category" action="/admin/saveCategoryForm" method="post">

    <div class="form-group">
      <label for="name">Название категории:</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
      <label for="category_id">Фото категории</label>
      <input type="file" name="photo" id="photo" />
    </div>

    <input type="hidden" id="enabled" name="enabled" value="1">

  </form>
</div>


