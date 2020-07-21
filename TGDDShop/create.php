<?php
require_once 'config.php';
$name = $price = $supplier = "";
$nameerr = $priceerr = $suppliererr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $inputname = $_POST['name'];
    if (empty($inputname)) {
        $nameerr = "Pls enter cell Name";
    } else {
        $name = $inputname;
    }
    $inputprice = $_POST['price'];
    if (empty($inputnprice)) {
        $priceerr = "Plssss enter Price";
    } elseif (!ctype_digit($inputnprice)) {
        $priceerr = "Price must be a number !!";
    } else {
        $price = $inputnprice;
    }

    $inputsupplier = $_POST['supplier'];
    if (empty($inputprice)) { //----------
        $suppliererr = "Pls enter Price";
    } else {
         
    }
    // nếu mà tất cả data hợp lệ
    if (empty($nameerr) || empty($priceerr) || empty($suppliererr)) {
        $sql = "Insert into cellphone (cellName, price, supplier)
            values(:name, :price, :supplier)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":price", $param_price);
            $stmt->bindParam(":supplier", $param_supplier);
            $param_name = $name;
            $param_price = $price;
            $param_supplier = $supplier;
            if ($stmt->execute()) {
                header("location:index.php");
                exit();
            } else {
                echo "Something went wrong !!!";
            }
        }
    }
    unset($conn);
    unset($stmt);
}
?>
<!-- ------------------------ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="conatier-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>INSERT NEW CELL PHONE</h2>
                    </div>
                    <p>Please enter information's cell phone</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Cell Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                            <span class="help-block"><?php echo $nameerr ?></span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price ?>">
                            <span class="help-block"><?php echo $priceerr ?></span>
                            <!--  -->
                        </div>

                        <!--  -->
                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" name="supplier" class="form-control" value="<?php echo $supplier ?>">
                            <span class="help-block"><?php echo $suppliererr ?></span>
                        </div>
                        <!--  -->

                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>