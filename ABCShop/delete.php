<?php
    include_once('config.php');
    $id = $_GET['id'];
    $sql ="Delete from employee where id=:id";
    $query = $conn->prepare($sql);
    $query->execute((array(':id'=>$id)));
    header('Location:index.php');
?>