<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE GIOI DI DONG SHOP</title>
    <!--gõ bootstrap bs3-cdn-->
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2 {
            margin-top: 0;
        }
        table tr td:last-child a {
            margin-right: 15px;
        }
        
        
    </style>
    <script type="text/javascipt">
        $(document).ready(funtion(){
        $('[data-toggle = "tooltip"]').tooltip();
    });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header-clearfix">
                        <h2 class="pull-left">CELL PHONE DATA</h2>
                        <a href="create.php" class="btn btn-danger" style="float:right;"> Add new Collection</a>
                    </div>
                    <?php
                        include_once("config.php");
                        $sql = "Select * from cellPhone";
                        if($result = $conn -> query($sql)){
                            if($result -> rowCount() > 0 )
                            {
                                echo "<table class = 'table table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>CellName</th>";
                                echo "<th>Price</th>";
                                echo "<th>Supplier</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";    
                                echo "<tbody>";
                                while($row=$result->fetch()){
                                    echo "<tr>";
                                    echo "<td>".$row['cellName']."</td>";
                                    echo "<td>".$row['price']."</td>";
                                    echo "<td>".$row['supplier']."</td>";
                                    echo "<td>";

                                    echo "<a href='detail.php?id=".$row['id']."'>
                                    <span class='glyphicon glyphicon-eye-open'>
                                    </span></a>";

                                    // delete
                                    echo "<a href='delete.php?id=".$row['id']."'>
                                    <span class='glyphicon glyphicon-trash'>
                                    </span></a>";
                                    
                                    // update
                                    echo "<a href='delete.php?id=".$row['id']."'>
                                    <span class='glyphicon glyphicon-pencil'>
                                    </span></a>";

                                    // down
                                    echo "<a href='delete.php?id=".$row['id']."'>
                                    <span class='glyphicon glyphicon-download-alt'>
                                    </span></a>";

                                    // quét mã
                                    echo "<a href='delete.php?id=".$row['id']."'>
                                    <span class='glyphicon glyphicon-qrcode'>
                                    </span></a>";

                                    
                                    
                                }
                            }
                        }
                    ?>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>