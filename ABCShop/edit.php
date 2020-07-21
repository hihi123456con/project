<!-- <?php
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
</head>

<body>
    <h2 style="color: blue;">Update employee</h2><br><br>
    <form action="edit.php" method="post">
        <table border="1">
            <!-- <tr>
                <td>ID</td>
                <?php
                $id = $_GET['id'];
                echo "<td><input type='text' name='id' value = $id readonly></td>";
                ?>
            </tr> -->
            <tr>
                <td>Name</td>
                <?php
                $name_update = $_GET['name'];
                echo "<td><input type='text' name='name' value = $name_update></td>";
                ?>
            </tr>
            <tr>
                <td>Age</td>
                <?php
                $age_update = $_GET['age'];
                echo "<td><input type='text' name='age' value = $age_update></td>";
                ?>
            </tr>
            <tr>
                <td>Salary</td>
                <?php
                $salary_update = $_GET['salary'];
                echo "<td><input type='text' name='salary' value = $salary_update></td>";
                ?>
            </tr>
        </table>
        <input type="submit" value="Update" name="submit">
    </form>
</body>

</html> -->

