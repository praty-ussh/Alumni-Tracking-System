<?php
    $college = $_POST['college'];
    $eventdetail = $_POST['eventdetail'];
    $eventdate = $_POST['eventdate'];
    if(!empty($college) || !empty($collegedetail) || !empty($eventdate)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "Pratyush.123";
        $dbname= "test";
        $connection= new mysqli($host,$dbusername,$dbpassword,$dbname);
        if(mysqli_connect_error()){
            die('Connection Error ('.mysqli_connect_errno .')'.mysqli_connect_error);
        }
        else{
            $insert = "INSERT Into event (college, detail, date) VALUES(?,?,?)";
            $stmt = $connection->prepare($insert);
            $stmt->bind_param("ssi",$college,$collegedetail,$eventdate);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: /adminsidelog.html");
            exit();
    }
?>