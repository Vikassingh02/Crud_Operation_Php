<?php
    include 'connection.php';
    if(isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];
        echo $id;
        $sql="delete from crud where id = $id";
        $result = mysqli_query($con, $sql);
        if($result) {
           header('location:display.php');
        }
        else{
            die(mysqli_connect_error());
        }
    }

?>