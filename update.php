<?php
include 'connection.php';

if (isset($_GET['updateid'])) {
    $id = intval($_GET['updateid']);

    // Fetch existing data
    $sql = "SELECT * FROM crud WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name']; // Full Name
        $mobile = $row['mobile'];
        $email = $row['email'];
        $password = $row['password'];
    } else {
        die("Record not found!");
    }
}

if (isset($_POST['submit'])) {
    $id = intval($_POST['updateid']);
    $name = mysqli_real_escape_string($con, $_POST['name']); // Accepts full name
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "UPDATE crud SET name='$name', mobile='$mobile', email='$email', password='$password' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Full name updated successfully!'); window.location='display.php';</script>";
    } else {
        die("Query Failed: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Update User Full Name</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="updateid" value="<?php echo $id; ?>">

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control" name="mobile" value="<?php echo htmlspecialchars($mobile, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update Full Name</button>
    </form>
</div>

</body>
</html>
