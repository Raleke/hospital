<?php
session_start();

include("db/auth.php");
authenticate();

$did = $_SESSION["doctor_id"];

$db = mysqli_connect("localhost:4308", "root", "", "hospital") or die(mysqli_error($db));


$sql = "SELECT * FROM patient WHERE doctor_id = $did";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients</title>
</head>
<style>
    .btn {
    display: inline-block;
   
    font-size: 14px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 5px;
    padding: 20px;
    
}

.btn:hover {background-color: #3e8e41}

.btn:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}


body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1{
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse; 
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
                overflow-x: auto;
            }
        }

</style>
<body>
    <h1>My Patients</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Description</th>
                <th>Diagnosis</th>
                <th>Treatment</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['patient_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
    <?php if (isset($row['diagnosis'])) : ?>
        <?php echo $row['diagnosis']; ?>
    <?php else : ?>
        <a href="view_diagnosis.php?patient_id=<?php echo $row['patient_id']; ?>" class="btn">View diagnosis data</a>
    <?php endif; ?>
</td>
<td>
    <?php if (isset($row['treatment'])) : ?>
        <?php echo $row['treatment']; ?>
    <?php else : ?>
        <a href="view_treatment.php?patient_id=<?php echo $row['patient_id']; ?>" class="btn">View treatment data</a>
    <?php endif; ?>
</td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
