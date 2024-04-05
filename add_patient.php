<?php
session_start();


include("db/auth.php");
authenticate();



$did = $_SESSION["doctor_id"];
$doctor_email = $_SESSION["doctor_email"];
$doctor_name = $_SESSION["doctor_name"];

$db=mysqli_connect("localhost:4308","root","","hospital")or die(mysqli_error($db));

 $sql = "SELECT doctor_id, name FROM doctors";
 $result = mysqli_query($db, $sql);


if(isset($_POST["reg"])){

    if(empty($_POST["name"])){
        $err["fn"]="Enter first name";
    }else{
        $name=mysqli_real_escape_string($db,$_POST["name"]);
    }

  
  
    if(empty($_POST["dob"])){
        $err["dob"]="Enter date of birth";
    }else{
        $dob=mysqli_real_escape_string($db,$_POST["dob"]);
    }
    if(empty($_POST["email"])){
        $err["em"]="Enter email";
    }else{
        $email=mysqli_real_escape_string($db,$_POST["email"]);
    }

    if(empty($_POST["desc"])){
        $err["des"]="Enter description ";
    }else{
        $desc=mysqli_real_escape_string($db,$_POST["desc"]);
    }

 


    if(empty($err)){
        $insert= mysqli_query($db,"INSERT INTO patient VALUES (NULL,
                                                             '".$did."',
                                                                '".$name."',
                                                                 '".$dob."',
                                                                 '".$email."',
                                                                 '".$desc."'
                                                                ) ")
                                                                or die(mysqli_error($db));
    
                       echo"<h4> Details captured!!!!</h4>";                                         
    }
  
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
        }

        form {
            width: 400px; 
            margin: 0 auto;
            padding: 20px;
            border: 20px solid #611c5e;
            border-radius: 5px;
            
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            form {
                width: 90%; 
            }
        }
    </style>
<body>
<!-- <h4 class="log">Logged in Doctor: Dr. <?php echo $doctor_name; ?></h4> -->
  <form action="" method="post">
  <p> Name</p>
  <input type="text" name="name" >
  <p>Date of Birth</p>
  <input type="date" name="dob">
  <p>Email</p>
  <input type="email" name="email">
  <p>Description of your Ailment</p>
  <textarea name="desc" cols="30" rows="10"></textarea>

  
  <input type="submit" value="Add Patient" name="reg">
  </form>
</body>
</html>






