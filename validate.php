<?php
    $rollnumber1 = $_POST['rollnumber'];
    $password = $_POST['password'];
    if(!empty($rollnumber1) || !empty($password)){
        $host = "localhost";
        $dbusername = "";
        $dbpassword = "";
        $dbname= "test";
        $connection= new mysqli($host,$dbusername,$dbpassword,$dbname);
        if(mysqli_connect_error()){
            die('Connection Error ('.mysqli_connect_errno .')'.mysqli_connect_error);
        }
        else{
            $select = "SELECT rollnumber, pass From login Where rollnumber=$rollnumber1 LIMIT 1";
            echo $rollnumber1;
            $stmt = $connection->prepare($select);
            echo $rollnumber1;
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows>0)
            { $stmt->bind_result($rollnumber,$pass);
              $stmt->fetch();
              
              
                if ($password===$pass) 
                {
                    header('Location: ./mainsite1.html');
                    exit();
                } 
                else
                {
                    echo 
                    "<script type = 'text/javascript'>
                    alert('Login Failed from user')
                    location= './login.html'
                    </script>";
                    exit();
                }
            }
            else{
                $stmt->close();
                $select1= "SELECT collegenum, password From collegelog Where collegenum=$rollnumber1 LIMIT 1";
                $stmt = $connection->prepare($select1);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows>0)
                { 
                    $stmt->bind_result($rollnumber2,$pass1);
                    $stmt->fetch();
                
                
                    if ($password===$pass1) 
                    {  
                        
                        header('Location: ./adminmainpage.html');
                        exit();
                    } 
                    else
                    {
                        echo 
                        "<script type = 'text/javascript'>
                        alert('Login Failed lko')
                        location= './login.html'
                        </script>";
                        exit();
                    }
                }
                else
                {
                    echo "<script type = 'text/javascript'>
                    alert('Login Failed from college')
                    location = './login2.html'
                    </script>";
                    exit();
                }
            }
            /*else
            {
                echo "<script type = 'text/javascript'>
                alert('Login Failed overall')
                location = './login.html'
                </script>";
                exit();
            }*/
        }
    } 
?>
