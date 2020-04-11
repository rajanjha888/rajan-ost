<html>
<body bgcolor="powderblue">
<?php
$Username=$_POST['username'];
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
   $SELECT="select username from student where username=?";
   $stmt=$connect->prepare($SELECT);
   $stmt->bind_param("s",$Username);
   $stmt->execute();
   $stmt->bind_result($Username);  
   $stmt->store_result();
   $rnum=$stmt->num_rows;
   if($rnum==0)
   {
       echo '<span style="color:red; font-size: 70px;">Username does not exist';
      $link_address1 = 'sign_up.php';
      echo '<br>';
      echo '<br>';
      echo "<a href='$link_address1'>Register here</a>";

   }
   else
   {
     $select="select password from student where password=?";
     $stmt=$connect->prepare($select);
     $stmt->bind_param("s",$encrypt_pas);
     $stmt->execute();
     $stmt->bind_result($encrypt_pas);
     $stmt->store_result();
     $rnum=$stmt->num_rows;
     if($rnum==0)
     {
      echo '<span style="color:red; font-size: 70px;">Passwords do not match, Try again';
      $link_address1 = 'sign_up.php';
      echo '<br>';
      echo '<br>';
      echo "<a href='$link_address1'>Go to Login Page</a>";
     }
     else
     {
      echo '<span style="color:blue; font-size: 70px;"> Welcome '.$Username;
     }
   }
   $stmt->close();
   $connect->close();
}

?>
</body>
</html>
