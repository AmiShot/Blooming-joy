<?php
include('include/headings.html');
if($_SERVER['REQUEST_METHOD'] =="POST"){
  # Connect to DB
  require('connect_db.php');

  #Initialise an error array
  $errors = [];

  #check for first name
  if(empty($_POST['first_name'])){
    $errors[] = 'Enter your First Name';
  }else{
    $fn =  mysqli_real_escape_string($link, trim($_POST['first_name']));
  }
  #check for last name
  if(empty($_POST['last_name'])){
    $errors[] = 'Enter your Last Name';
  }else{
    $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
  }
 #check for email
 if(empty($_POST['inputEmail4'])){
  $errors[] = 'Enter your email address';
 }else{
  $e = mysqli_real_escape_string($link, trim($_POST['inputEmail4']));
 }
 #check for password
 # Check for a password and matching input passwords.
 if(!empty($_POST['inputPassword1'])){
  if($_POST['inputPassword1']!=$_POST['inputPassword4']){
    $errors[] = "Passwords do not match";
  }else{
    $pass = mysqli_real_escape_string($link, trim($_POST['inputPassword1']));
  }
 }$errors[] = "Please enter a Password";

 #Now check if email address is registered
  if(empty($errors)){
    $q = "SELECT user_id FROM users where email ='$e' ";
    $r = @mysqli_query ($link, $q);
    if (mysqli_num_rows( $r ) != 0) {
       $errors[] = 'Email address already registered. <a class= "alert-link" href= "log_user.php">Sign In Now</a>';
    }
  }
  # If not already registered, register user into DB
  if (empty($errors)){
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date )
    VALUES ($fn, $ln, $e, $pass, NOW() )";
    $r = @mysqli_query($link, $q);
    if($r)
      { echo '<div class="container">
        <div class="alert alert-secondary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          
          <h4 class="alert-heading"Registered!</h4>
          <p>You are now registered.</p>
          <a class="alert-link" href="login.php">Login</a>'; 
        }

          #Close DB connection
          mysqli_close($link);
    }else{
      echo '<div class="container">
        <div class="alert alert-secondary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          
          <h4 class="alert-heading"Registered!</h4>
          <p>The account could not be registered for the following reason(s)</p>'; 
          foreach($errors as $msg){
            echo " -$msg<br>";
          }
          echo '<p>Please try again!</p>';
          mysqli_close($link);
    }
  }
?>


  
    <form class="row g-3">
        <div class="col-md-6">
            <label for="first_name" class="form-label" placeholder="First Name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required value = "<?php if(isset($_POST[first_name])) echo $_POST['first_name']; ?>"> 
				</div>>
          </div>
          <div class="col-md-6">
            <label for="last_name" class="form-label" placeholder="Last Name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required value= "<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
          </div>
        <div class="col-md-12">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" name="inputEmail4" id="inputEmail4" required placeholder="email@example.com" value="<?php if(isset($_POST['inputEmail4'])) echo $_POST['inputEmail4']; ?>">
        </div>
        <div class="col-md-6">
          <label for="inputPassword1" class="form-label">Create New Password</label>
          <input type="password" class="form-control" name="inputPassword1" id="inputPassword1" required placeholder="Create New Password" value= "<?php if(isset(S_POST['inputPassword1'])) echo $_POST['inputPassword1']; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputPassword2" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="inputPassword2" id="inputPassword2" required placeholder="Confirm Password" value = "<?php if(isset($_POST['inputPassword2'])) echo $_POST['inputPassword2']; ?>">
          </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Create Account Now </button>
        </div>
      </form>
    
</body>

</html>