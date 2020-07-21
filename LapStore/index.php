<?php
    $conn = mysqli_connect("localhost","root","","lapshop") or die ("Cannot connect");


    $res = mysqli_query($conn, "select * from laptop");

    $data = $res->fetch_all();

    mysqli_free_result($res);
    mysqli_close($conn);

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
    
    <title>LAPTOP SHOP ONLINE</title>
</head>
<body method='get' >
    <h2 style="text-align: center; color: red;" >FPT SHOP</h2>
    <center>
        <?php
            include ('header.html');
        ?>
        <h2>Welcome to Management Web Shop</h2>

        <table border="1" class="table table-striped">
            <thead>
                <tr style="font-weight: bold;">
                    <td>COde</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Supplier</td>
                    <td>Delete</td>
                    <td>Update</td>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($data as $item) {?> <!-- day là mở 2 -->

                        <tr>
                            <td><?php echo$item[0]; ?></td>
                            <td><?php echo$item[1]; ?></td>
                            <td><?php echo$item[2]; ?></td>
                            <td><?php echo$item[3]; ?></td>
                            <td><?php echo '<a href="delete.php?code='.$item[0].'">Delete</a>' ?></td>
                            <td><?php echo '<a href="update.php?code='.$item[0].'">Update</a>' ?></td>
                        </tr>
                    
                
                    <?php }?>
            </tbody>

        </table>
            <a href="insert.php"><input type="button" class="btn btn-success" value="Insert new laptop"></a>
            <a href="search.php"><input type="button" class="btn btn-danger" value="Search a Laptop"></a>
    </center>
    
</body>
</html>