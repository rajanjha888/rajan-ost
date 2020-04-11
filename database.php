<?php
$server="localhost";
$username="root";
$password="root123";
$connect=new mysqli($server,$username,$password);
if($connect->connect_error)
{
 die("connection failed".$connect->connect_error);
}
else
{
 echo "connection built successfully";
 if($connect->query("create database divya"))
 {
  echo "database divya is created";
 }
 else
   echo "error occured";
}
?>


