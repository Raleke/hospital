<?php
session_start();

include("db/auth.php");
authenticate();

$did = $_SESSION["doctor_id"];

$db = mysqli_connect("localhost:4308", "root", "", "hospital") or die(mysqli_error($db));

// Retrieve patient ID from the query parameter
if (isset($_GET["patient_id"])) {
    $patient_id = mysqli_real_escape_string($db, $_GET["patient_id"]);

    // Fetch patient name for the specified patient
    $name_query = "SELECT name FROM patient WHERE `patient_id` = $patient_id";
    $name_result = mysqli_query($db, $name_query) or die(mysqli_error($db));

    // Get patient name
    if ($row = mysqli_fetch_assoc($name_result)) {
        $patient_name = $row['name'];
    } else {
        $patient_name = "Unknown Patient";
    }

    // Fetch diagnosis, symptoms, and treatment data for the specified patient
    $diagnosis_query = "SELECT diagnosis FROM diagnosis WHERE patient_id = $patient_id";
    $drugs_query = "SELECT drugs  FROM treatment WHERE patient_id = $patient_id";
    $initial_date_query = "SELECT initial_date FROM treatment WHERE patient_id = $patient_id";
    $end_date_query = "SELECT end_date FROM treatment WHERE patient_id = $patient_id";
    $treatment_query = "SELECT treatment_plan FROM treatment WHERE patient_id = $patient_id";

    $diagnosis_result = mysqli_query($db, $diagnosis_query) or die(mysqli_error($db));
    $drugs_result = mysqli_query($db, $drugs_query) or die(mysqli_error($db));
    $initial_date_result = mysqli_query($db, $initial_date_query) or die(mysqli_error($db));
    $end_date_result = mysqli_query($db, $end_date_query) or die(mysqli_error($db));
    $treatment_result = mysqli_query($db, $treatment_query) or die(mysqli_error($db));

    // Fetch data
    $diagnosis = mysqli_fetch_assoc($diagnosis_result)['diagnosis'] ?? "No diagnosis available for this patient.";
    $drugs = mysqli_fetch_assoc($drugs_result)['drugs'] ?? "No drugs available for this patient.";
    $initial_date = mysqli_fetch_assoc($initial_date_result)['initial_date'] ?? "No start date available for this patient.";
    $end_date = mysqli_fetch_assoc($end_date_result)['end_date'] ?? "No end date available for this patient.";
    $treatmentplan = mysqli_fetch_assoc($treatment_result)['treatment_plan'] ?? "No treatment plan available for this patient.";
} else {
    // Handle case when patient ID is not provided
    $patient_name = "Please select a patient.";
    $diagnosis = "";
    $drugs = "";
    $initial_date = "";
    $end_date = "";
    $treatmentplan = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Treatment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
        }

        h4 {
            color: #666;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        pre {
            white-space: pre-wrap;
            font-family: monospace;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Treatment for Patient</h1>
        <h4>Logged in Doctor: Dr. <?php echo $_SESSION["doctor_name"]; ?></h4>

        <p>Patient Name: <?php echo $patient_name; ?></p>

        <p>Patient ID: <?php echo $patient_id; ?></p>
        <p>Diagnosis:</p>
        <pre><?php echo $diagnosis; ?></pre>
        <p>Drugs:</p>
        <pre><?php echo $drugs; ?></pre>
        <p>Start Date:</p>
        <pre><?php echo $initial_date; ?></pre>
        <p>End date:</p>
        <pre><?php echo $end_date; ?></pre>
        <p>Treatment plan:</p>
        <pre><?php echo $treatmentplan; ?></pre>
    </div>
</body>
</html>
