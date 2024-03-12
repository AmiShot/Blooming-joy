<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Workshop 3 - Practice!</title>
  </head>
  <body>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    #CONNECT TO DB
   # Connect to the database.
   require ('connect_db.php'); 
  
   # Initialize an error array.
   $errors = array();
  #Check for name
  if ( empty( $_POST[ 'item_name' ]))
  { $errors[] = 'Enter the item name.';}
  else
  {$n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ); }
  #Check item description
  if (empty( $_POST[ 'item_desc' ] ) ) 
  { $errors[] = 'Enter the item description';}
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST['item_desc'] ) ) ;}
  #check for an item image
  if(empty($_POST['item_img'])){
    $errors[] = 'Load item image';
  }else{
    $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
  }
  # check for price
  if(empty($_POST['item_price'])){
    $errors[] = 'Enter item price';
  }else{
    $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
  }
# on success add data to database
 if(empty($errors)){
    $q = "INSERT INTO products (item_name, item_desc, item_img, item_price)
    VALUES('$n','$d','$img','$p');";
    $r = @mysqli_query($link,$q);
   if($r){
    echo '<p>New record created successfully</p>
          <a href="create.php"> Add Records</a> |
          <a href="read.php"> Read Records</a>|
          <a href="update.php"> Update Record</a>|
          <a href="delete.php"> Delete Record</a>';
   }
   #Close database connection
   mysqli_close($link);
   exit();
}else {
    # Or report errors 
    echo '<p>The following error(s) occurred:</p>';
    foreach ($errors as $msg){
        echo "$msg<br>";
    } 
    echo '<p>Please try again.</p>';
    mysqli_close($link);
}
}
?>
 
<form action="create.php" method="post" enctype="multipart/form-data">
  <label for="item_name">Item Name:</label>
  <input type="text" id="item_name" name="item_name"  value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> "> <br>

  <label for="item_desc">Description:</label>
  <input type="text"  name="item_desc"  value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?> "><br>

  <label for="item_img">Image:</label>
   <input type="text" id="item_img" name="item_img" required value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?> "><br>

  <label for="item_price">Price:</label>
  <input type="number" id="item_price" name="item_price" min="0" step="0.01" required value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?> "><br>

  <input type="submit" value="Add Record"></p>
</form>
</body>
</html>