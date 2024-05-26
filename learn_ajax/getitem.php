<?php
    include'connection.php';
    $id = $_REQUEST['id'];
    $query = "SELECT * FROM item WHERE category = '$id' ";
    $result = mysqli_query($conn,$query);
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    echo json_encode($data);
    
?>