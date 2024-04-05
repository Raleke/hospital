<?php
session_start();


include("db/auth.php");
authenticate();
$did = $_SESSION["doctor_id"];
$doctor_name = $_SESSION["doctor_name"];


$db=mysqli_connect("localhost:4308","root","","hospital")or die(mysqli_error($db));
$query = "SELECT patient_id AS patient_id, patient.name 
          FROM patient
          WHERE doctor_id = $did";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Create an associative array to store patient names
$patient_names = [];
while ($row = mysqli_fetch_assoc($result)) {
    $patient_names[$row['patient_id']] = $row['name'];

}


if(isset($_POST["submit"])){

  
    if(empty($_POST["treatment_plan"])){
        $err["ttp"]="Missing field Required";
    }else{
        $treatment_plan=mysqli_real_escape_string($db,$_POST["treatment_plan"]);
    }
    if(empty($_POST["drugs"])){
      $err["drg"]="Enter the drugs";
    }else{
      $drugs=mysqli_real_escape_string($db,$_POST["drugs"]);
    }

    if(empty($_POST["sdate"])){
      $err["sda"]="Enter start date of treatment duration";
    }else{
     $sdate=mysqli_real_escape_string($db, $_POST["sdate"]);
    }

    if(empty($_POST["edate"])){
      $err["eda"]="Enter end date of treatment duration";
    }else{
      $edate=mysqli_real_escape_string($db,$_POST["edate"]);
    }

      
    if(empty($_POST["doctor_id"])){
        $err["did"]="";
    }else{
        $doctor_id=mysqli_real_escape_string($db,$_POST["doctor_id"]);
    }

    if (isset($_POST["patient_id"]) && array_key_exists($_POST["patient_id"], $patient_names)) {
      $patient_id = mysqli_real_escape_string($db, $_POST["patient_id"]);
  } else {
      $err["pid"] = "";
  }

    if(empty($err)){
        $insert= mysqli_query($db,"INSERT INTO treatment VALUES (NULL,
                                                                 '".$treatment_plan."',
                                                                 '".$drugs."',
                                                                 '".$sdate."',
                                                                 '".$edate."',
                                                                 '" . $doctor_id. "',
                                                                 '".$patient_id."'
                                                                ) ")
                                                                or die(mysqli_error($db));
    
                       echo"<h4> Details captured!!!!</h4>";                                         
    }
    if (!$insert) {
        echo "Error inserting Diagnosis: " . mysqli_error($db);
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Treatment Plan</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    p {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    textarea,
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 15px;
    }

    .date-field {
    margin-bottom: 15px; 
  }

  .date-field label {
    display: block; 
    margin-bottom: 5px; 
  }

  .date-field input[type="date"] {
    padding: 5px 10px; 
    border: 1px solid #ccc 
    border-radius: 4px; 
  }


  .form-group {
      margin-bottom: 15px; /* Add some space between form elements */
    }
    @media (max-width: 768px) {
      .form-group {
        margin-bottom: 10px;
      }

      label {
        font-size: 0.8em;
      }

      textarea,
      input[type="text"] {
        font-size: 0.9em;
      }
    }
  </style>
</head>
<body>
  <h1>Add Treatment Plan</h1>
  <h4 class="log">Logged in Doctor: Dr. <?php echo $doctor_name; ?></h4>

  <form action="" method="post">
  <div class="form-group">
    <label for="treatment_plan">Treatment Plan:</label>
    <textarea name="treatment_plan" cols="30" rows="10" required></textarea>

    <label for="drugs prescribed">Drugs Prescribed</label>
    <input type="text" name="drugs">

    <label for="start_date">Start Date</label>
<input type="date" name="sdate" class="date-field">

<label for="end_date">End date</label>
<input type="date" name="edate" class="date-field">
<br>
    <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['doctor_id']; ?>">
 
    <label for="patient_id">Select a patient:</label>
        <select name="patient_id">
            <option value="">Select Patient</option>
            <?php
            foreach ($patient_names as $id => $name) {
                echo "<option value=\"$id\">$name</option>";
            }
            ?>
        </select>
        </div>
    <input type="submit" value="Add Treatment Plan" name="submit">
  </form>

</body>
</html>