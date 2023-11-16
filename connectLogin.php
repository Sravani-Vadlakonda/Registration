<?php
  $username=$_POST['uname'];
  $password=$_POST['pwd'];
 
  // database connection

   $conn= new mysqli("localhost", "root", "", "techpixe");
    if($conn->connect_error){
      die("Failed to connect  : ".$conn->connect_error);
    }else{
      $stmt= $conn->prepare("select * from registration where uname=?");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $stmt_result=$stmt->get_result();
      if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['pwd'] === $password)
        {
            
          header('Location:profilePage.php');
          exit();

        }
        else{
            echo "<h2>Invalid Email or Password</h2>";

        }
      }
      else{
        echo "<h2>Invalid Email or Password</h2>";

       }
    }
?>