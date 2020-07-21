<?php
    include_once "config.php";
    try {
        $sql = "select * from employee where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET["id"]]);
        $row = $stmt->fetch();
        // var_dump($row);
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form action="xulyupdate.php" method="post">
        <input type="hidden" name="txtId" value="<?php echo $_GET["id"]; ?>">
    <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>" /></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $row["age"]; ?>" /></td>
            </tr>
            <tr>
                <td>Salary</td>
                <td><input type="text" name="salary" value="<?php echo $row["salary"]; ?>" /></td>
            </tr>
        </table>
        <input type="submit" value="Update" name="btnUpdate" />
    </form>
</body>
</html>