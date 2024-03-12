<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<div class="container">
    <h1 id="logo">Blooming Joy</h1>

    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-info" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#">New In</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav justify-content-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Plants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Flowers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Vases</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <h2>Products Page</h2>
    <?php
    # Connect to the database.
    require('connect_db.php');

    $q = "SELECT * FROM products;";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) {
        echo '
  <table class="table table-borderless">
 <thead>
 <tr><th>Item ID</th><th>Item Name</th><th>Image</th><th>Description</th><th>Price</th></tr></thead><tbody>';

        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<tr>
 <td>' . $row['item_id'] . ' </td><td>' . $row['item_name'] . ' </td><td><img src="' . $row['item_img'] . '" alt="product" width="70"   height="70"></td><td>' . $row['item_desc'] . '</td><td>' . $row['item_price'] . '</td>
			';
        }

        echo '</tr></table></br><br><a href="create.php">Add Records</a> |  <a href="update.php">Update Record</a>  | <a href="delete.php">Delete Record</a> </div>';
    }

    # Close database connection.
    mysqli_close($link);
    exit();
    ?>