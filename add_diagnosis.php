<?php
session_start();

include("db/auth.php");
authenticate();
$did = $_SESSION["doctor_id"];
$doctor_name = $_SESSION["doctor_name"];

$db = mysqli_connect("localhost:4308", "root", "", "hospital") or die(mysqli_error($db));

// Retrieve patient names associated with the current doctor
$query = "SELECT patient_id AS patient_id, patient.name 
          FROM patient
          WHERE doctor_id = $did";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Create an associative array to store patient names
$patient_names = [];
while ($row = mysqli_fetch_assoc($result)) {
    $patient_names[$row['patient_id']] = $row['name'];

}

if (isset($_POST["reg"])) {
    
    if(empty($_POST["symptoms"])){
        $err["sms"]="fill in the symptoms";
    }else{
        $symptoms=mysqli_real_escape_string($db,$_POST["symptoms"]);
    }

  
    if(empty($_POST["diagnosis"])){
        $err["dgn"]="Missing field Required";
    }else{
        $diagnosis=mysqli_real_escape_string($db,$_POST["diagnosis"]);
    }

    if(empty($_POST["treatment_plan"])){
        $err["ttp"]="Missing field required";
    }else{
        $treatment_plan=mysqli_real_escape_string($db,$_POST["treatment_plan"]);
    }

    if (empty($_POST["doctor_id"])) {
        $err["did"] = "";
    } else {
        $doctor_id = mysqli_real_escape_string($db, $_POST["doctor_id"]);
    }

 
    if (isset($_POST["patient_id"]) && array_key_exists($_POST["patient_id"], $patient_names)) {
        $patient_id = mysqli_real_escape_string($db, $_POST["patient_id"]);
    } else {
        $err["pid"] = "";
    }

    if (empty($err)) {
        $insert= mysqli_query($db,"INSERT INTO diagnosis VALUES (NULL,
                                                              '" . $symptoms . "',
                                                                '".$diagnosis."',
                                                                 '".$treatment_plan."',
                                                                 '".$doctor_id."',
                                                                 '".$patient_id."'
                                                                ) ")
                                                                or die(mysqli_error($db));

        echo "<h4>Details captured!</h4>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis for Patient Name</title>
</head>
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

<body>
    <h1>Diagnosis for Patient</h1>
    <h4 class="log">Logged in Doctor: Dr. <?php echo $doctor_name; ?></h4>

    <form action="" method="post">
    <label for="symptoms">Symptoms:</label>
        <textarea name="symptoms"  cols="30" rows="10" required></textarea>

        <label for="diagnosis">Diagnosis:</label>
        <input type="text" name="diagnosis"  required>

        <label for="treatment_plan">Treatment Plan:</label>
        <textarea name="treatment_plan"  cols="30" rows="10" required></textarea>

        <!-- Dropdown menu for patient names -->
        <label for="patient_id">Select a patient:</label>
        <select name="patient_id">
            <option value="">Select Patient</option>
            <?php
            foreach ($patient_names as $id => $name) {
                echo "<option value=\"$id\">$name</option>";
            }
            ?>
        </select>

        <input type="hidden" name="doctor_id" value="<?php echo $did; ?>">
        <input type="submit" value="Submit Diagnosis" name="reg">
    </form>
</body>
</html>
