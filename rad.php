<?php
session_start();

include("db/auth.php");
authenticate();

$db = mysqli_connect("localhost:4308", "root", "", "hospital") or die(mysqli_error($db));

// Get the logged-in doctor ID
$doctor_id = $_SESSION["doctor_id"];

// Construct a query to retrieve diagnosis details with patient names
$query = "SELECT diagnosis, patient_id AS patient_name
          FROM diagnosis
          WHERE diagnosis.doctor_id = $doctor_id";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Check if there are any diagnoses for the doctor
if (mysqli_num_rows($result) > 0) {
  echo "<h2>Your Diagnosis Records</h2>";

  while ($row = mysqli_fetch_assoc($result)) {
    // Check the contents of $row for debugging (optional)
    echo "<pre>";
    print_r($row);
    echo "</pre>";

    // Extract diagnosis details (verify column names in your database)
    $diagnosis_id = isset($row['id']) ? $row['id'] : ''; // Handle potential missing key
    $symptoms = isset($row['symptoms']) ? $row['symptoms'] : '';
    $diagnosis = isset($row['diagnosis']) ? $row['diagnosis'] : '';
    $treatment_plan = isset($row['treatment_plan']) ? $row['treatment_plan'] : '';
    $patient_name = isset($row['patient_name']) ? $row['patient_name'] : '';

    // Display diagnosis information
    echo "<div class='diagnosis-record'>";
      echo "<h3>Patient: $patient_name</h3>";
      echo "<p><b>Symptoms:</b> $symptoms</p>";
      echo "<p><b>Diagnosis:</b> $diagnosis</p>";
      echo "<p><b>Treatment Plan:</b> $treatment_plan</p>";
      // Add a link for viewing or editing individual diagnosis (optional)
      // echo "<a href='edit_diagnosis.php?id=$diagnosis_id'>View/Edit</a>";
    echo "</div>";
  }
} else {
  echo "<h4>You currently have no diagnosis records.</h4>";
}

mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Diagnosis Records</title>
  <style>
    /* Add your styling here */
    .diagnosis-record {
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 5px;
    }

    .diagnosis-record h3 {
      margin-top: 0;
    }
  </style>
</head>
<body>
  </body>
</html>
