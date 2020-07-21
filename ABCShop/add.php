<?php
include_once('config.php');
//kiểm tra user có nhấn nút submit
if (isset($_POSTS['Submit'])) 
    {
        // lấy data từ client gửi lên server
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        //validate du lieu
        if (empty($name) || empty($age) || empty($salary)) {
            // xét trường hợp name để trống
            if (empty($name)) {
                echo "<font color='red'> Name is reqiured</font><br/>";
            }

            if (empty($age)) {
                echo "<font color='red'> AGE is reqiured</font><br/>";
            }

            if (empty($salary)) {
                echo "<font color='red'> SALARY is reqiured</font><br/>";
            }
        } else {
            // insert xuống database 
            $sql = "Insert into employee(name, age, salary) values(:name,:age,:salary)";
            $query = $conn->prepare($sql);
            $query->bindParam(':name', $name);
            $query->bindParam(':age', $age);
            $query->bindParam(':salary', $salary);
            // thực thi  câu query 
            $query->execute();
            echo "<font color='green' >Add new Employee successfully !!! </font>";
            echo "<br/>";
            echo "<a href='index.php>View Result</a>";
        }
    }
?>

<!-------------------------------------------- - -->
<!-- -------------------------------------------- -->
<!-- <?php
        include_once("config.php");
        //kiểm tra user có nhấn nút Submit?
        if (isset($_POST['Submit'])) {
            //lấy data từ Client gửi lên server
            $name = $_POST['name'];
            $age = $_POST['age'];
            $salary = $_POST['salary'];
            //Validate dữ liệu
            if (empty($name) || empty($age) || empty($salary)) {
                //xét trường hợp name để trống
                if (empty($name)) {
                    echo "<font color = 'red' > Name is required!!! </font><br/>";
                }
                if (empty($age)) {
                    echo "<font color = 'red' > Age is required!!! </font><br/>";
                }
                if (empty($salary)) {
                    echo "<font color = 'red' > Salary is required!!! </font><br/>";
                }
            } else {
                //insert xuống database
                $sql = "Insert into Employee(name, age, salary) values(:name,:age,:salary)";
                //tạo prepare statement
                $query = $conn->prepare($sql);
                //gưans các tham số cho prepare
                $query->bindParam(':name', $name);
                $query->bindParam(':age', $age);
                $query->bindParam(':salary', $salary);
                //thực thi câu query
                $query->execute();
                //hiển thị thông báo
                echo "<font color = 'green'>Add New Employee Successfully!!<font/>";
                echo "<br/>";
                echo "<a href = 'index.php'>View Result</a>";
            }
        }
        ?> -->