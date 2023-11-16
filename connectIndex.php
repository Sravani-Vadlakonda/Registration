<?php

$name=$_POST['name'];
$addr=$_POST['addr'];
$edu=$_POST['edu'];
$skills=$_POST['skills'];
$goal=$_POST['goal'];
$img=$_POST['image'];
$dream=$_POST['dream'];
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];


$conn=new mysqli('localhost', 'root', '', 'techpixe');
if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : " .$conn->connect_error);

}else{
  $stmt=$conn->prepare("insert into registration(name,addr,edu,skills,goal,image,dream,uname,pwd) values(?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssssss",$name,$addr,$edu,$skills,$goal,$img,$dream,$uname,$pwd);
  $execval = $stmt->execute();
  echo $execval;
  echo "Registration Successfull.....";
  $stmt->close();
  $conn->close();
}

?>