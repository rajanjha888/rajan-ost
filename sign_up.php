<!DOCTYPE html> 
<?php
$nameError=$name=$namevalidate=$username=$uservalidate=$emailError = $userError= $passError=$conpassError=$passNotMatch=$email=$emailformat= "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $valid = true;

    if(empty($_POST['username']))
    {
      $valid=false;
      $userError="Username is missing";
    }

    if(empty($_POST['email'])){
        $valid=false;
        $emailError = "Email is  missing";
    }
    else
    {
       $email=$_POST['email'];
       if(!filter_var($email,FILTER_VALIDATE_EMAIL))
       {
         $emailformat="Invalid email format";
         $valid=false;
       }
    }
   
   if(empty($_POST['password']))
   {
      $valid=false;
      $passError="Password can't be empty";
   }
   if(empty($_POST['password2']))
   {
      $valid=false;
      $conpassError="Confirm Password can't be empty";
   }
   $password=$_POST['password'];
   $conpassword=$_POST['password2'];
   if($password!=$conpassword)
    {
      $valid=false;
      $passNotMatch="Passwords should be same";
    }
   if($valid){
        include('register.php');
        exit();
    }
}

?>

<html>
    <title> SIGN UP</title>
<style>
 body{
            display: flex;
            flex-direction: row;
            flex-flow: row;  
            font-family: sans-serif;
            background-color: lightgray;
            padding: 100px;
            padding-top: 30px;
        }
      .container{
           display: flex;
           flex-direction: row;
           flex-flow: row;
           margin-top: 2px;
           margin-left: 2px;
           margin-left: 2px;
           margin-right: 2px;

      }
#header1{
    font-weight: normal;
    padding: 5px;
}
h1{
    color: navy;
}
      
h5{
    color: gray;
    font-family: sans-serif;
     
}
h2{
    color: gray;
    font-family: sans-serif;
}
h3{
    color: navy;
    font-family: sans-serif;
}
div.left-box{
             
             width: 60%;
             color: gray;
             margin-right: 50px;
             margin-left: 10px;
             padding: 2px;
             }
div.right-box
             {
           
             width: 60%;
             color: oldlace;
             background-color: navy; 
             margin-bottom: 0px;
            margin-left: 200px;
            margin-right: 40px;
           padding: 2px; 
             
             }
            

a {
 display: inline;
 flex-direction: row;
 justify-content: flex-end;
 font-family: sans-serif;
 color: oldlace;
 margin-left: 260px;
 padding-top: 8px;
 padding-bottom: 5px;
}

form{
    display: flex;
    flex-direction:column;
    justify-content: flex-start;
    font-family: sans-serif;
    margin-right: 2px;
    margin-left: 2px;
}

.textinput{
 padding: 2%;
border: solid;
border-color: red;
width: 450px;
        }    

.textinput1{
    border-color: white;
    padding: 5px;
    width: 400px;
    margin: auto;
}    
.register-btn{
padding: 2%;
background-color: white;
margin-top: 10px;
font-size: 20px;
border: solid;
border-color: navy;
cursor: pointer;
width: 150px;
color: navy;
margin-left: 250px;
}

.login-btn{

    padding: 2%;
background-color: navy;
margin-top: 10px;
font-size: 15px;
border: solid;
border-color: yellow;
cursor: pointer;
width: 150px;
color: white;
margin-left: 250px;

}    


.Remember{
    align-items: flex-start;
    text-align: left;
    margin-top:10px;

}
.myheader{
    display: flex;
    
    color: white;
    text-align: left;
    
}
</style>

</head>
<body>
    

<div id= "header">
        <header>
            <div id="main_title">
    <h1>Enter the System </h1>
<h5>It is necessary to login in Your account in order to sign up for a course. </h5>
</div> 
</header> 

 <div class="container">

  <div class="left-box">
  <h2>ARE YOU NEW?</h2><h3>REGISTER</h3>

  <form action="" method="post">
  
  <tr><td>
  <input type="text" name="username" placeholder="Username" class ="textinput" ><?PHP echo $userError; ?></td> </tr>
  <br>
  <tr><td>
  <input type="email" name="email" placeholder="Email" class ="textinput" ><?PHP echo $emailError; ?> <?PHP echo $emailformat; ?></td></tr>
  <tr><td>
      <br>
  <input type="password" name="password" placeholder="Password" class ="textinput"><?PHP echo $passError; ?></td></tr>
  <tr><td>
      <br>
  <input type="password" name="password2" placeholder="Confirm Password"class ="textinput"><?PHP echo $conpassError; ?><?PHP echo $passNotMatch; ?></td></tr>
  <tr><td>
      <br>
   <input type="submit" name="submit" class="register-btn" value="Register"></td></tr>

</form>
    </div>

    <br>
    
    <div class="right-box">

            <h2 class ="myheader"> ALREADY A STUDENT?</h2>
            <h2 class ="myheader">LOGIN</h2>
            <form action="validation.php" method="post">

          <table>  
              <tr><td>
        <input type="text" name="username" placeholder="Username" class="textinput1" required></td></tr>
        <tr><td>
        <input type="password" name="password" placeholder="Password"class="textinput1" required></td></tr>
        <tr><td>
        <input type="checkbox" class="Remember" name="Remember me?" value="Remember me?">
        <label for="Remember me?" class="Remember"> Remember me?</label></td></tr>
        <br>
        <tr><td>
        <input type="submit" class="login-btn" value="LOGIN"> </td></tr>
        <tr><td>

        <a href="Forgot password.html">Forgot Password?</a></td></tr>
</table>

            </form>
            </div>
    </div>
</body>
</html>
