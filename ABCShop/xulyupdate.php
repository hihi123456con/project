<?php

include_once('config.php');
  //kiem tra user co nhan nut Submit ?
  if(isset($_POST['btnUpdate']))
  {
    //lay data tu Client gui len server
    $name =$_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $id = $_POST['txtId'];


    //validate du lieu
    if(empty($name) || empty($age) || empty($salary))
    {
      //xet truong name de trong
      if(empty($name))
      {
         echo "<font color='red'>Name is required!!!</font><br/>";
      }
      if(empty($age))
      {
         echo "<font color='red'>Age is required!!!</font><br/>";
      }
      if(empty($salary))
      {
         echo "<font color='red'>Salary is required!!!</font><br/>";
      }
    } else {
        //insert xuong database
        $sql = "update employee set name = ?, age = ?, salary = ? where id = ?";
        //tao prepare statement
        $query = $conn->prepare($sql);
        $query->execute([$name, $age, $salary, $id]);
        //hien thi thong bao
        
    }

    header("location: index.php");
}