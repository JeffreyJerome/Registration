<?php

$name =$_POST['Name'];
$fname =$_POST['fname'];
$mname =$_POST['mname'];
$dob =$_POST['dob'];
$pbirth =$_POST['pbirth'];

if(!empty($name)||!empty($fname)||!empty($mname)||!empty(dob)||!empty(pbirth))
{
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "form";

  $conn = new mysqli($host,$username,$password,$dbname);

  if(mysqli_connect_error())
  {
    die('Connection Error');
  }
  else
  {
    $INSERT = "INSERT Into register(name,fname,mname,dob,pbirth)VALUES(?,?,?,?,?)"; 
  //prepare stmt
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssss",$name,$fname,$mname,$dob,$pbirth);
    if($stmt->execute())
    {
      echo "Resgistered Succesfully";
    }
    else
    {
      echo "enter the correct data";
    }
    $stmt->close();
    $conn->close();
}
}
?>