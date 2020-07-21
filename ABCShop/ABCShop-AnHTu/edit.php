<?php 
    include_once("config.php");
    //kiểm tra user có nhấn nút Submit?
    if(isset($_POST['Submit']))
    {
        //lấy data từ Client gửi lên server
        $id = $_POST['id'];
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
            //Update xuống database
            $sql = "Update Employee Set name = :name, age = :age, salary = :salary
            where id = :id";
            //tạo prepare statement
            $query = $conn -> prepare($sql);
            //gưans các tham số cho prepare
            $query -> bindParam(':id',$id);
            $query -> bindParam(':name',$name);
            $query -> bindParam(':age',$age);
            $query -> bindParam(':salary',$salary);

            //thực thi câu query
            $query -> execute();

            //hiển thị thông báo
            echo "<font color = 'green'>Update Employee Successfully!!<font/>";
            echo "<br/>";
            echo "<a href = 'index.php'>View Result</a>";
        }
    }
