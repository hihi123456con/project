<?php
    //đưa file config.php vào
    include_once('config.php');
    $result = $conn -> query("Select * from Employee");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppee ONLINE</title>
</head>
<body>
    <a href="add.html">Add new Employee</a>
    <br/><br/>
    <table border="1">
    <tr>
        <td>Name</td>
        <td>Age</td>
        <td>Salary</td>
        <td>Update</td>
    </tr>


    <?php
        //FETCH_ASSOC: trả về dữ liệu dạng mảng với key là tên cột trong bảng
        while($row = $result -> fetch(PDO :: FETCH_ASSOC)){
            echo "<tr>";
            //echo "<td>".$row['id']."['<td>']";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['salary']."</td>";
            echo "<td><a href = \"edit.php?id=$row[id]\">Edit</a> | 
            <a href = \"delete.php?id=$row[id]\" 
            onClick = \"return confirm('Are you Sure?')
            \">Delete</a><td/>";
            echo "</tr>";

        }

    ?>
    </table>

</body>
</html>