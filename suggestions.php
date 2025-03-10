<?php
include 'connection.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';

$sql = "SELECT name FROM crud WHERE name LIKE '%$q%' LIMIT 5";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="suggestion">' . $row['name'] . '</div>';
    }
} else {
    echo '<div class="suggestion">No results</div>';
}
?>
