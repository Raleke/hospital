<?php

session_start();

$db=mysqli_connect("localhost:4308","root","","hospital")or die(mysqli_error($db));

if(isset($_POST["reg"])){
    $error=array();

    if(empty($_POST["email"])){
        $err["em"]="please fill the missing field email";
    }else{
        $email=mysqli_real_escape_string($db,$_POST["email"]);
    }

    if(empty($_POST["pword"])){
        $err["pd"]="please fill the missing field password";
    }else{
        $pword=mysqli_real_escape_string($db,$_POST["pword"]);
    }

    
if(empty($error)){
    $query= mysqli_query( $db,"SELECT * FROM doctors WHERE email='".$email."' AND password='".$pword."'") or die(mysqli_error($db));

if(mysqli_num_rows($query)== 1){

    $r=mysqli_fetch_array($query);

    

    $_SESSION["doctor_id"]= $r["0"];
    $_SESSION["doctor_email"]= $r["3"];
    $_SESSION["doctor_name"] = $r["1"];

    header("location:treatment.php");
}else{
$err_msg= "Invalid Email Address and/or password";
header("location:sign in.php?err_msg=$err_msg");
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
 
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0; 
      padding: 20px; 
    }

    div {
      width: 80%; 
      max-width: 400px; 
      border-radius: 10px;
      border: 5px solid #666;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    h3 {
      font-size: 2rem;
      text-align: center;
    }

 
    h4 {
      margin-top: -10px;
      font-size: 18px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    input[type="email"],
    input[type="password"],
    input[type="submit"] {
      width: 100%; 
      margin-bottom: 10px;
      height: 35px;
      border-radius: 10px;
    }
    div input[type="submit"] {  
    background-color: aquamarine;
}

div input[type="submit"]:hover {
    background-color: #666; 
    cursor: pointer; 
}



    p {
      text-align: center;
    }
  </style>
</head>
<body>
    <form action="" method="post">
  <h3>Welcome!!! </h3>
  <div>
    <h4>Sign in to your account</h4>
    Email <br>
    <input type="email" name="email">
    <br>
    password <br>
    <input type="password" name="pword">
    <br><br>
    <input type="submit" value="Sign In" name="reg">
    <br>
    <p>Don't have an account yet? <a href="register.php">Create an Account</a></p>
  </div>
  </form>
</body>
</html>
