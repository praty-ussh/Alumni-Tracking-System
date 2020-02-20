<?php
error_reporting(E_ALL);
ini_set("display_errors","1");
/*$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];*/
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$bday = $_POST['bday'];
$rollnumber = $_POST['rollnumber'];
$department = $_POST['Department'];
$gradyear = $_POST['yearselect'];
$collegename = $_POST['college_name'];
$password = $_POST['password'];
//if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone))
if(!empty($firstname)|| !empty($lastname)|| !empty($bday)|| !empty($rollnumber)|| !empty($department)|| !empty($gradyear)|| !empty($collegename)|| !empty($password))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "Pratyush.123";
    $dbname= "test";
    $connection= new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('Connection Error ('.mysqli_connect_errno .')'.mysqli_connect_error);
    }
    else{
        //$SELECT = "SELECT email From youtube Where email = ? Limit 1";
        //$INSERT = "INSERT Into youtube (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
        $select = "SELECT firstname,lastname,dept_name,college_name,bday,gradyear From signup Where rollnumber = $rollnumber LIMIT 1";
        //$insert = "INSERT Into signup (firstname, lastname, dept_name, college_name, password, bday, rollnumber, gradyear) values(?,?,?,?,?,?,?,?)";
        $stmt = $connection->prepare($select);
        //$stmt->bind_param("i",$rollnumber);
        $stmt->execute();
        //$stmt->bind_result($rollnumber);
        $stmt->store_result();
        
        if($stmt->num_rows>0)
        { $stmt->bind_result($firstname1,$lastname1,$department1,$collegename1,$bday1,$gradyear1);
          $stmt->fetch();

          if(strcasecmp($firstname,$firstname1)==0 && strcasecmp($lastname,$lastname1)==0 && $department==$department1 && $collegename==$collegename1 && $bday==$bday1 && $gradyear==$gradyear1)
           {
              header('Location: ./update_info1.html');
              //$stmt->close();
              $insert = "INSERT INTO login (rollnumber, pass) VALUES (?,?)";
              $stmt = $connection->prepare($insert);
              $stmt->bind_param("is",$rollnumber,$password);
              $stmt->execute();
              //$stmt->store_result();
              $stmt->close();

           } 
          else
          {   
            echo "<script type='text/javascript'>
            alert('Incorrect Data')
            location= './newsignup.html'
            </script>";
          }   

        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Details Entered do not Match our Database')
            location= './newsignup.html'
            </script>";

        }
    }
}
else{
    echo "<script type='text/javascript'>
    alert('All fields are required')
    location= './newsignup.html'
    </script>";
}
?>