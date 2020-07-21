<?php 
    include_once("config.php");
    //kiểm tra user có nhấn nút Submit?
    if(isset($_POST['Submit']))
    {
        //lấy data từ Client gửi lên server
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];

        //Validate dữ liệu
        if(empty($name) || empty($age) || empty($salary))
        {
            //xét trường hợp name để trống
            if(empty($name))
            {
                echo "<font color = 'red' > Name is required!!! </font><br/>";
            }
            if(empty($age))
            {
                echo "<font color = 'red' > Age is required!!! </font><br/>";
            }
            if(empty($salary))
            {
                echo "<font color = 'red' > Salary is required!!! </font><br/>";
            }
        }else{
            //insert xuống database
            $sql = "Insert into Employee(name, age, salary) values(:name,:age,:salary)";
            //tạo prepare statement
            $query = $conn -> prepare($sql);
            //gưans các tham số cho prepare
            $query -> bindParam(':name',$name);
            $query -> bindParam(':age',$age);
            $query -> bindParam(':salary',$salary);

            //thực thi câu query
            $query -> execute();

            //hiển thị thông báo
            echo "<font color = 'green'>Add New Employee Successfully!!<font/>";
            echo "<br/>";
            echo "<a href = 'index.php'>View Result</a>";
        }
    }
