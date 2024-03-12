<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Workshop 3 - Practice!</title>
  </head>
  <body>
	<div class="container">
	<?php 
 # Connect to the database.
  require ('connect_db.php'); 

    $q = "SELECT * FROM products;" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) {
		echo '
			<table class="table">
			<h1>Delete Item</h1>
			<thead>
			<tr><th>ID</th><th>Item Name</th><th>Item Price</th><th>Delete</th></tr></thead><tbody>';
			
			while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
			echo'<tr>
			<td>'.$row['item_id'].' </td><td>'.$row['item_name'].'</td><td>'.$row['item_price'].'</td><td>
					<a href="delete_now.php?item_id='.$row['item_id'].'">Delete Item</a><br>
			';
		}
    
		echo'</tr></table></br><br><a href="create.php">Add Records</a>  |  <a href="read.php">Read Records</a>  |  <a href="update.php">Update Record</a>  | <a href="delete.php">Delete Record</a>';
 }
	
    # Close database connection.
    mysqli_close($link); 

    exit();
    
 ?>
  </div>
  </body>
 </html>