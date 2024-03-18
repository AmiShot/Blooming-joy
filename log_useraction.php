<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    #Open db connection
    require('connect_db.php');
   # Get connection, load and validate functions
    require('log_usertools.php');
    #check login
    list($check, $data) = validate ($link, $_POST['email'], $_POST['pass']) ;

  # On success set session data and display logged in page
  if ($check){
    #access session
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id'];
    $_SESSION[ 'first_name'] = $data['first_name'];
    $_SESSION[ 'last_name'] = $data['last_name'];
    load('home.php');
  }# Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $link ) ; 
}

# Continue to display login page on failure.
include ( 'log_user.php' ) ;

?>

