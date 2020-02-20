<?php include ('originalroll.php') ?>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors","1");
    $biography = $_POST['message'];
    $email = $_POST['email'];
    $mobile = $_POST['number'];
    $high = $_POST['high'];
    $grad = $_POST['grad'];
    $other = $_POST['other'];
    $currentposition = $_POST['currentposition'];
    $currentcompany = $_POST['currentcompany'];
    //$from1 = $_POST['from1'];
    //$to1 = $_POST['to1'];
    //$previousposition = $_POST['previousposition'];   
    //$previouscompany = $_POST['previouscompany'];
    //$from2 = $_POST['from2'];
    //$to2 = $_POST['to2'];
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "Pratyush.123";
    $dbname= "test";
    $connection= new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('Connection Error ('.mysqli_connect_errno .')'.mysqli_connect_error);
    }
    else{
        $select = "SELECT biography, email, mobile, high, grad, other, currentposition, currentcompany From profile Where rollnumber = $roll LIMIT 1";
        $stmt = $connection->prepare($select);
        //$stmt->bind_param("i",$rollnumber);
        $stmt->execute();
        //$stmt->bind_result($rollnumber);
        $stmt->store_result();
        
        if($stmt->num_rows>0)
        { $update = "UPDATE 'profile' SET biography=$biography, email=$email, mobile=$mobile, high=$high, grad=$grad, other=$other, currentposition=$currentposition, currentcompany=$currentcompany where rollnumber=$roll";
          $stmt = $connection->prepare($update); 
          //$stmt->bind_param("ssisssss", $biography, $email, $mobile, $high, $grad, $other, $currentposition, $currentcompany);
          $stmt->execute();

        }
        else
        {
        $insert = "INSERT INTO profile (biography, email, mobile, high, grad, other, currentposition, currentcompany,rollnumber) VALUES(?,?,?,?,?,?,?,?,?)";
        //$select = "Select rollnumber From "
        $stmt= $connection->prepare($insert);
        $stmt->bind_param("ssisssssi", $biography, $email, $mobile, $high, $grad, $other, $currentposition, $currentcompany, $roll);
        $stmt->execute();
        $stmt->close();
        }
        //$stmt= $connection->prepare($select);
        header("Location: ./user_profile.php");
        exit();
    }
?>