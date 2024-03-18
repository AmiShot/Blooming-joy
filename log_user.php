<?php
include ('include/headings2.html');
# Display any error messages if present.
if (isset ($errors) && !empty ($errors)) {
    echo '<p id="err_msg">Oops! There was a problem:<br>';
    foreach ($errors as $msg) {
        echo " - $msg<br>";
    }
    echo 'Please try again or <a href="user_reg.php">Register</a></p>';
}
?>

<!-- Display body section. -->
<div class=container>
    <div class="row">
        <div class="col-sm">
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <h1>Log In</h1>
                </div>
                <div class="card-body">
                    <form action="log_user.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required
                                        placeholder="email@example.com">
                                </div>
                            </div><!--closing col-->
                        </div><!-- closing row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPassword1" class="form-label">Create New Password</label>
                                    <input type="password" class="form-control" name="inputPassword1" required
                                        placeholder="Create New Password">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lg btn-block"
                                        style="background-color: #d63384; color:#FFF">Log in </button>
                                </div><!-- closing row -->
                    </form><!-- closing form -->
                </div><!-- closing card header -->
            </div><!-- closing card -->
        </div><!-- closing col -->
    </div><!-- closing row -->
</div><!-- closing container -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>

</body>

</html>