<?php 
include 'connection.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO crud (name,mobile,email,password) VALUES ('$name', '$mobile', '$email', '$password')";
    $result = mysqli_query($con, $sql);
    if($result) {
        echo "<script>alert('Data inserted successfully!');</script>";
        header('location:display.php');
    } else {
        die("Query Failed: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="javascriptvalidation.js"></script> -->
</head>
<body>

    <div class="container">
        <div style="
    display: flex
;
    justify-content: end;
    align-items: center;
    margin-top: 50px;"><a href="display.php"><button class="btn btn-primary">View</button></a></div>
        <form id="userForm" action="User.php" method="post" class="mt-5" >
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary"  name="submit" onclick="validationForm(event)">Submit</button>
        </form>
    </div>

</body>
</html>
