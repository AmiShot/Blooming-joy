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
	
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

# Check for a item name.
  if ( empty( $_POST[ 'item_id' ] ) )
  { $errors[] = 'Update item ID.' ; }
  else
  { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'item_id' ] ) ) ; }
  
  # Check for a item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for a item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

# Check for a item price.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }
 if ( empty( $errors ) ) 
  {
    $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: read.php");
    } else {
        echo "Error updating record: " . $link->$error;
    }
  
    # Close database connection.
    
	mysqli_close($link); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' 
	<p>' ;
    foreach ( $errors as $msg )
    { echo "$msg " ; }
    echo 'Please try again.")</p>';
    # Close database connection.
    mysqli_close( $link );
  } 
  

}
?>

<form action="update.php" method="post">
  <label for="item_id">Update Item ID</label>
  <input type="text" name="item_id" value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>"> 
 <br>
  <label for="item_name">Update Item Name</label>
  <input type="text" name="item_name" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>"> 
 <br>
  <label for="item_desc">Update Item Description</label>
  <input type="text" name="item_desc" value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
 <br>
  <label for="item_img">Update Item Image</label>
  <input type="text" name="item_img" value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
 <br>
  <label for="item_desc">Update Item Price</label>
  <input type="text" name="item_price" value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">
 <br>
  <input type="submit" value="Update Record"></p>
</form><!-- closing form -->
 <br>
  <a href="create_record.php">Add Records</a>  |  <a href="read_table.php">Read Records</a>  |  <a href="update_record.php">Update Record</a>  | <a href="delete_record.php">Delete Record</a>
  </body>
</html>