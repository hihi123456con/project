<?php
    $conn = mysqli_connect("localhost","root","","lapshop") or die ("connection_fail");


    if(isset($_POST["submit"]))
    {
        // lấy data từ client gửi lên server
        $code = $_POST["code"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $sup = $_POST["supplier"];
        // viết câu lệnh query để insert 
        $sqlInsert = "INSERT INTO Laptop VALUES (?,?,?,?)";
        // tạo đối tượng STMT -- prepare 2 biến --
        $stmt = mysqli_prepare($conn,$sqlInsert);
        // truyền giá trị cho các tham số 
        mysqli_stmt_bind_param($stmt,"ssds",$code,$name,$price,$sup);
        // 1 biến stmt - ssds là kiểu của 4 biến
        // chạy

        if(mysqli_stmt_execute($stmt))
        {
            echo"Insert successfully";
            header("location:index.php");
        } else {
            echo"Insert Fail!!!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <title>FPT SHOP</title>
</head>
<body>
        <?php
            include('header.html');
        ?>
        <div class="container" style="width: 50%;  border:1px solid black; border-radius:10px;" >
            <form action="" method="post" style="padding: 20px;">
            ID <input type="text" name="code" required class="form-control" placeholder="Input LapId"> <br>

            Name <input type="text" name="name" required class="form-control" placeholder="Input LapName"> <br>

            Price <input type="text" name="price" required class="form-control" placeholder="Input Price"> <br>

            Supplier <input type="text" name="supplier" required class="form-control" placeholder="Input Supplier"> <br>
        
            <input type="submit" value="Insert" name="submit" class="btn btn-success">
            <!-- nút nhấn insert trên để chạy insert data vào bảng -->

            <input type="button" value="Back" onclick="window.location='index.php';">
            <!-- nút lui lại -->
        </form>

        </div>
</body>
</html>