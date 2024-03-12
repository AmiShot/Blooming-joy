<!doctype html>
<html lang="en">
  <head>
<title> CRUD Practice!</title>
  </head>
  <body>
<form action="create.php" method="post" enctype="multipart/form-data">
  <label for="name">Item Name:</label>
  <input type="text" id="item_name" name="item_name" required value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> "> <br>

  <label for="description">Description:</label>
  <textarea id="item_desc" name="item_desc" required value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>"></textarea><br>

  <label for="image">Image:</label>
   <input type="text" id="item_img" name="item_img" required value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>"><br>

  <label for="price">Price:</label>
  <input type="number" id="item_price" name="item_price" min="0" step="0.01" required value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>

  <input type="submit" value="Submit">
</form>
</body>
</html>