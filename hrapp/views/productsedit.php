<?php namespace views;?>
<style>
  form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f8f8f8;
  }

  form label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }

  form input[type="text"] {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 100%;
    margin-bottom: 15px;
  }

  form button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    border: none;
    width: 100%;
    margin-top: 10px;
  }

  form button[type="submit"]:hover {
    background-color: #0069d9;
  }
</style>



<?php
require_once(dirname(__DIR__)."/models/product.php");

$product = new \models\Product();

$product_id = $_GET['id'];

$products = $product->getProductById($product_id);

function update(){
    $product = new \models\Product();
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $product->update($id, $name, $description, $price);
        header("location: http://localhost/hrapp/index.php?action=list&resource=product");
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<form method="POST" action=<?php update()?>>
    <div class="form-group">
        <label for="id">Id:</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $products[0]['id'] ?>">
    </div>
    <div class="form-group">
        <label for="name">name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $products[0]['name'] ?>">
    </div>
    <div class="form-group">
        <label for="description">description:</label>
        <input type="text" class="form-control" id="description" name="description" value="<?php echo $products[0]['description'] ?>">
    </div>
    <div class="form-group">
        <label for="price">price:</label>
        <input type="text" class="form-control" id="price" name="price" value="<?php echo $products[0]['price'] ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
