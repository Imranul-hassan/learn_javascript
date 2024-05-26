<?php
include 'connection.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query = "SELECT * FROM service WHERE category = '$id'";
    $result = mysqli_query($conn, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}
?>