<?php

$db=mysqli_connect("localhost:4308","root","","hospital")or die(mysqli_error($db));


if(isset($_POST["reg"])){

    if(empty($_POST["name"])){
        $err["name"]="Enter missing field for name";
    }else{
        $name=mysqli_real_escape_string($db,($_POST["name"]));
    }

    if(empty($_POST["specialty"])){
        $err["spe"]="Enter missing field for specialty";
    }else{
       $specialty=mysqli_real_escape_string($db,$_POST["specialty"]);
    }

    if(empty($_POST["email"])){
        $err["em"]="Enter missing field for email";
    }else{
        $email=mysqli_real_escape_string($db,$_POST["email"]);
    }

    if(empty($_POST["phone"])){
        $err["ph"]="Enter missing field for phone";
    }else{
        $phone=mysqli_real_escape_string($db,($_POST["phone"]));
    }

    if(empty($_POST["address"])){
        $err["add"]="Enter missing field for address";
    }else{
        $address=mysqli_real_escape_string($db,($_POST["address"]));
    }

    if(empty($_POST["pword"])){
        $err["pd"]="Enter missing field for password";
    }else{
        $pword=mysqli_real_escape_string($db,($_POST["pword"]));
    }
       if(empty($err)){
        $insert=mysqli_query($db,"INSERT INTO doctors VALUES(NULL,
                                                            '".$name."',
                                                             '".$specialty."',
                                                             '".$email."',
                                                             '".$phone."',
                                                             '".$address."',
                                                             '".$pword."'
                                                             ) ")
                                                             or die(mysqli_error($db));

                                                             echo "<h4> Account created!!!!!</h4>";
  

                                                            }else{
                                                              echo "<h4> Account Creation Failed</h4>";
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
   
    div {
      border: 5px solid #611c5e;
      width: 80%; 
      margin: 0 auto; 
      padding: 20px;
      border-radius: 10px;
    }

    h2 {
      font-size: 2rem; 
      text-align: center;
    }

    .form {
      border: none;
      margin-left: auto;
      margin-right: auto; 
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%; 
      height: 35px;
      border-radius: 5px; 
      padding: 5px;
      margin-bottom: 10px; 
    }

   
    input[type="submit"] {
      background-color: #611c5e;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%; 
    }

    input[type="submit"]:hover {
      background-color: #5ce45c;
    }
  </style>
</head>
<body>
  <div>
    <h2>Join and
      Get access to medical and mental health experts <br> 24 hours a day, 365 days a year.</h2>

    <form action="" method="post">
      <div class="form">
        <p>
          Name <br>
          <input type="text" name="name">
        </p>
        <p>
          Specialty <br>
          <select name="specialty">
            <option value="">Select Your Specialty</option>
            <option value="Dermatology">Dermatology</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Oncology">Oncology</option>
            <option value="Ophthalmology">Ophthalmology</option>
            <option value="Anesthesiology">Anesthesiology</option>
          </select>
        </p>
        <p>
          Email <br>
          <input type="email" name="email">
        </p>
        <p>
          Phone <br>
          <input type="text" name="phone">
        </p>
        <p>
          Address <br>
          <input type="text" name="address">
        </p>
        <p>
          Password <br>
          <input type="password" name="pword">
        </p>
        <input type="submit" value="Create Account" name="reg">
        <p>
          Already a member?
          <a href="sign in.php">Sign in</a>
        </p>
      </div>
    </form>
  </div>
</body>
</html>
