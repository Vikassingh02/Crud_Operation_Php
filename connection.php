<?php
$localhost="localhost";
$username="root";
$userpassword="";
$db = "crudoperation";
$con = mysqli_connect($localhost,$username,$userpassword,$db);
if(!$con) {
    die(mysqli_connect_error());
}



?>