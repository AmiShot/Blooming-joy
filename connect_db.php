<?php
#Connect to mysql DB
$link = mysqli_connect('localhost','root','','BloomingJoy');
if(!$link){
    die('Could not connect to SQL: ' .mysqli_connect_error());
}
echo 'Connected to database successfully';
?>