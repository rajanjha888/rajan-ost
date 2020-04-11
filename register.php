<html>
<body bgcolor="powderblue">

<?php

$Username=$_POST['username'];
$Email=$_POST['email'];
$Password=$_POST['password'];

$encrypt_pas=md5($Password);

$server="localhost";
$username="root";
$password="root123";
$database="divya";
$connect=new mysqli($server, $username, $password, $database);
if($connect->connect_error)
 {
   die("connection failed".$connect->connect_error);
 }
else
 {
     $SELECT = "SELECT email From student Where email = ? Limit 1";
     $INSERT = "INSERT Into student (username, email, password) values(?, ?, ?)";
    
     $stmt = $connect->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) 
     {
      $stmt->close();
      $stmt = $connect->prepare($INSERT);
      $stmt->bind_param("sss", $Username, $Email, $encrypt_pas);
      $stmt->execute();
      echo '<span style="color: blue; font-size: 70px;">Successfully Registered  ';
      echo "<br>";
      echo "<br>";
      $link_address1 = 'sign_up.php';
      echo "<a href='$link_address1'>Go to Login Page</a>";

     } 
    else
     { 
      echo '<span style="color:red; font-size:50px;"?>This email id is already registered';
      echo "<br>";
      echo "<br>";
      echo "<a href='$link_address1'>Register with different email id</a>";
     }
     $stmt->close();
     $conn->close();
 }
?>
</body>
</html>
