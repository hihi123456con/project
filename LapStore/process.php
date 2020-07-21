<?php
    $connect = mysqli_connect("localhost","root","","lapshop");
    mysqli_set_charset($connect,"UTF8");
    //nếu kết nối bị lỗi thì xuất báo lỗi vầ thoát
    if(!$connect){
        die("Không kết nối : " . mysqli_connect_error());
        exit();
    }
    $Id = $rows["lapId"];
    $Name = $rows["lapName"];
    $price = $rows["price"];
    $supplier = $rows["supplier"];
    //code xử lý, update dữ liệu vào table dựa theo điều kiện where tại id = $lapId
    $sql = "UPDATE laptop SET LapId ='$Id', LapName='$Name', Price='$price', Supplier= '$supplier'
    WHERE LapId='$Id'";
    if(mysqli_query($connect,$sql)) {
        // nếu kết quả thành công, trở về trang view
        header('Location: update.php?erroe=1');
    }
    //đóng kêt nối database tintuc
    mysqli_close($connect);
?>