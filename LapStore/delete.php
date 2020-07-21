<?php
    $conn = mysqli_connect("localhost","root","","lapshop") or die ("Connection_fail");

    $LapId =$_GET['code']; 
    $sql ="DELETE from laptop where LapId=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$LapId);
    if(mysqli_stmt_execute($stmt))
    {    
        header("Location: index.php");
    } else {
        echo"delete fail";
    }
    // dòng các kết nối lại
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>