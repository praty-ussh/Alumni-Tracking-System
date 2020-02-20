<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    if(!empty($name) || !empty($email) || !empty($phone) || !empty($message)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "Pratyush.123";
        $dbname= "test";
        $connection= new mysqli($host,$dbusername,$dbpassword,$dbname);
        if(mysqli_connect_error()){
            die('Connection Error ('.mysqli_connect_errno .')'.mysqli_connect_error);
        }
        else{
              $insert = "INSERT Into feedback (name, email, phone, message) VALUES(?,?,?,?)";
              $stmt = $connection->prepare($insert);
              $stmt->bind_param("ssis",$name,$email,$phone,$message);
              $stmt->execute();
              $stmt->close();
              header("Location: /mainsite.html")
              exit();
        }
    }
?>
