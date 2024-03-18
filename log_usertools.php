<?php # LOGIN HELPER FUNCTIONS.
# Function to load specified or default URL
function load($page = "log_user.php"){
    $url = 'http://'. $_SERVER[ 'HTTP_POST' ]. dirname($_SERVER[ 'PHP_SELF']);

    #Remove trailing slashes then append page name to URL.
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;

    #Execute redirect then quit
    header("Location: $url");
    exit();
}
function validate($link, $email = '', $pwd = ''){
    #Initialise errors array
    $errors = array();
    #check email
    if(empty($email)){
        $errors[] = 'Please Enter an email';
    }else{
        $e = mysqli_real_escape_string($link, trim($email));
    }
    #check password

    if(empty($pwd)){
        $errors[] = 'Please Enter a password';
    }else{
        $p = mysqli_real_escape_string($link, trim($pwd));
    }
    #On success retrieve user_id, first_name, last-name
    if(empty($errors)){
        $q = "SELECT user_id, first_name, last_name FROM users WHERE email='$e' AND pass='$p' ";
        $r = @mysqli_query($link, $q);
        if(@mysqli_num_rows($r) ==1){
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);
        }else{
            $errors[] = "Email and password not found.";
        }
    } # On failure retrieve error message/s.
    else{
       return array(false, $errors);
    }
}
?>
