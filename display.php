<?php 
include 'connection.php';
$limit = 2;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$searchQuery = "";
if(isset($_GET['search'])) {
    $user = $_GET['searchuser'];
    $searchQuery = "WHERE name LIKE '%$user%' OR email LIKE '%$user%'";
}

$totalQuery = "SELECT COUNT(*) AS total FROM crud $searchQuery";
$totalResult = mysqli_query($con, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

$sql = "SELECT * FROM crud $searchQuery LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="display:flex;justify-content: end;">
    <form class="d-flex" method="GET" action="">
        <input class="form-control me-2" type="search" placeholder="Search" id="searchuser" name="searchuser" aria-label="Search" autocomplete="off">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        <button class="btn btn-danger" style="margin-left:10px"><a href="display.php" style="text-decoration: none; color: white;">Reset</a></button>
    </form>
</nav>

<button class="btn btn-primary"><a href="User.php" class="text-light" style="text-decoration:none">Add User</a></button>

<div class="container py-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
 
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td>
                        <a href="update.php?updateid=<?= $row['id'] ?>" class="text-light">
                            <button class="btn btn-primary">Update</button>
                        </a>
                        <a href="delete.php?deleteid=<?= $row['id'] ?>" class="text-light">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>&searchuser=<?= isset($_GET['searchuser']) ? $_GET['searchuser'] : '' ?>">Previous</a>
            </li>
            <?php for($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>&searchuser=<?= isset($_GET['searchuser']) ? $_GET['searchuser'] : '' ?>"><?= $i ?></a>
                </li>
            <?php } ?>
            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>&searchuser=<?= isset($_GET['searchuser']) ? $_GET['searchuser'] : '' ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>

</body>
</html>
