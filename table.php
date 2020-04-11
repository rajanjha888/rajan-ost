<?php
$server="localhost";
$username="root";
$password="root123";
$database="divya";
$connect=new mysqli($server,$username,$password,$database);
if($connect->connect_error)
{
 die("connection failed".$connect->connect_error);
}
else
{
 echo "connection built successfully";
 if($connect->query("create table student(username varchar(20), email varchar(20), password varchar(150));"))
 {
  echo "table student is created";
 }
 else
   echo "error occured";
}
?>

