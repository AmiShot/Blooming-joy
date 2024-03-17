<?php
include ('include/headings.html');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  # Connect to DB
  require ('connect_db.php');

  #Initialise an error array
  $errors = array();

  #check for first name
  if (empty ($_POST['first_name'])) {
    $errors[] = 'Enter your First Name';
  } else {
    $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
  }
  #check for last name
  if (empty ($_POST['last_name'])) {
    $errors[] = 'Enter your Last Name';
  } else {
    $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
  }
  #check for email
  if (empty ($_POST['inputEmail4'])) {
    $errors[] = 'Enter your email address';
  } else {
    $e = mysqli_real_escape_string($link, trim($_POST['inputEmail4']));
  }
  #check for password
  # Check for a password and matching input passwords.
  if (!empty ($_POST['inputPassword1'])) {
    if ($_POST['inputPassword1'] != $_POST['inputPassword2']) {
      $errors[] = 'Passwords do not match';
    } else {
      $p = mysqli_real_escape_string($link, trim($_POST['inputPassword1']));
    }
  }else{
    $errors[] = "Please enter a Password";
  }

  #Now check if email address is registered
  if (empty ($errors)) {
    $q = "SELECT user_id FROM users where email ='$e' ";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) {
      $errors[] = 'Email address already registered. <a class= "alert-link" href= "log_user.php">Sign In Now</a>';
    }
  }
  # If not already registered, register user into DB
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn', '$ln', '$e', '$p', NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="container">
			<div class="alert alert-secondary" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
				<h4 class="alert-heading"Registered!</h4>
				<p>You are now registered.</p>
				<a class="alert-link" href="login.php">Login</a>'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<div class="container">
			<div class="alert alert-secondary" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>


<div class=container>
  <div class="row">
    <div class="col-sm">
      <div class="card bg-light mb-3">
        <div class="card-header">
          <h1>Create Account</h1>
        </div>
        <div class="card-body">
			<form action="user_reg.php" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputfirst_name">First Name</label>
                      <input type="text" name="first_name" class="form-control" required placeholder="First Name "
                        value="<?php if (isset ($_POST['first_name']))
                          echo $_POST['first_name']; ?>">
                    </div>
                  </div><!--closing col-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="last_name" class="form-label">Last Name</label>
                      <input type="text" class="form-control" name="last_name" required placeholder="Last Name" value="<?php if (isset ($_POST['last_name']))
                        echo $_POST['last_name']; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="inputEmail4" id="inputEmail4" required
                    placeholder="email@example.com" value="<?php if (isset ($_POST['inputEmail4']))
                      echo $_POST['inputEmail4']; ?>">
                </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputPassword1" class="form-label">Create New Password</label>
                    <input type="password" class="form-control" name="inputPassword1" required
                      placeholder="Create New Password" value="<?php if (isset ($_POST['inputPassword1']))
                        echo $_POST['inputPassword1']; ?>">
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputPassword2" class="form-label">Confirm Password</label> 
                    <input type="password" class="form-control" name="inputPassword2" required
                      placeholder="Confirm Password" value="<?php if (isset ($_POST['inputPassword2']))
                        echo $_POST['inputPassword2']; ?>">
                  </div>
                </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-block" style="background-color: #d63384; color:#FFF">Create Account Now </button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>