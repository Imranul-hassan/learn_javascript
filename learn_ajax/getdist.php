<?php
    include'connection.php';
    $div = $_REQUEST['div'];
    $query = "SELECT * FROM district WHERE div_id = $div";
    $result = mysqli_query($conn,$query);
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    echo json_encode($data);
?>