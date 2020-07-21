<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Laptop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container{
            transform: translate(5%,60%);
            width: 50%;
            border: 1px solid black;
            border-radius: 10px;
        }
        form{
            padding: 20px;
        }
    </style>
</head>
<body style="background-image: url(Image/Dell.jpg);">
        <center>
            <div class="form-group container">
                <form action="" method="post">
                    <h2>Search By Price</h2>
                    <input type="number" name="min" placeholder="INPUT MIN PRICE"
                    require class="form-control">
                    <br><br>
                    <input type="number" name="max" placeholder="INPUT MAX PRICE"
                    require class="form-control">
                    <br><br>
                    <input type="submit" name="submit" value="search"
                    class="btn btn-outline-primary">
                    <input type="button" value="Back"
                    onclick="window.location='index.php';"/> 
                    <br><br>
                </form>
        <?php
            //kiểm tra nút submit đã khởi tạo chưa
            if(isset($_POST["submit"]))
            {
                $conn = mysqli_connect("localhost","root","","LapShop")
                or die ("Connect fail, please try again!");
                //laasy data từ client gửi lên server
                $min = $_POST["min"];
                $max = $_POST["max"];
                //viết câu query để select
                $sqlSearch = "SELECT * FROM Laptop WHERE price BETWEEN '$min' AND '$max'";
                $result = mysqli_query($conn,$sqlSearch);
                if($min>=0 && $max >=0){
                    echo "Laptop have Price between $min and $max are";
                    echo '<table border = "1" cellspaceing = "0" cellpadding = "10">';
                    while ($rows = mysqli_fetch_assoc($result)) { //Cẩn thận hàm assoc Lọc Mảng
                            echo "<tr>";
                            echo "<td>{$rows["lapId"]}</td>"; //PHẢI ĐÚNG VỚI TÊN CỘT TRONG DATABASE
                            echo "<td>{$rows["lapName"]}</td>";
                            echo "<td>{$rows["price"]}</td>";
                            echo "<td>{$rows["supplier"]}</td>";
                            echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        ?>
            </div>
        </center>
</body>
</html>