<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Продукция</h1>
    </div>
</div>

<div class="container col-lg-12">
  <h2>Форма добавления продукции</h2>
  <p>В данной форме вы можете создать новый продукт и присвоить ему свой раздел:</p>
  <form>

    <div class="form-group">
      <label for="product_code">Product_code:</label>
      <input type="text" name="product_code" class="form-control" id="product_code">
    </div>
    <div class="form-group">
      <label for="condition">Condition:</label>
      <input type="text" name="condition" class="form-control" id="condition">
    </div>
    <div class="form-group">
      <label for="part_number">Part_number:</label>
      <input type="text" name="part_number" class="form-control" id="part_number">
    </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="description">Comment:</label>
      <textarea class="form-control" name="description" rows="5" id="description"></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" name="price" class="form-control" id="price">
    </div>



    <div class="form-group">
      <label for="category_id">Example multiple select</label>
      <select multiple class="form-control" id="category_id" name="category_id">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>




  </form>
</div>

