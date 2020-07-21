<?php
    $conn = mysqli_connect("localhost","root","","lapshop");

    if(!$conn) {
        echo "Fail to connect!";
        exit();
    }
    mysqli_set_charset($conn,"UTF8"); // hiển thị tiếng việt
    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];
        $sqlSelect = "SELECT * from laptop where lapId ='id'";
        $result = mysqli_query($conn,$sqlSelect);
        while($row =  mysqli_fetch_array($result)){
            $lapId = $rows["lapId"];
            $lapName = $rows["lapName"];
            $price = $rows["price"];
            $supplier = $rows["supplier"];
        }
    }
?>



