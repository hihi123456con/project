<?php
    include_once('config.php');
    $result = $conn->query("Select * from Employee");
?>

<!-- ----------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOPPEE ONLINE</title>
</head>

<body>
    <a href="add.html">Add new Employee</a>
    <br><br>
    <table border="1.75">
        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>Salary</td>
            <td>Update</td>
        </tr>


        <?php

        //FETCH_ASSOC : trả về dữ liệu dạng mảng vs key là tên cột trong bảng
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
            echo "<td><a href =\"edit.php?id=$row[id]\">Edit</a> | 
            // <a href =\"delete.php?id=$row[id]\"
            // onClick=\"return confirm ('Are you sure delete')
            // \">Delete</a></td>";

            echo "<td><a href=\"editupdate.php?id=$row[id]&name=$row[name]&age=$row[age]&salary=$row[salary]\">Edit</a> | <a href=\"delete.php?id=$row[id]\"onClick=\"return confirm('Are you sure delete?')\">Delete</a></td>";

            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>