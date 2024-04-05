<?php

session_start();

unset($_SESSION["doctor_id"]);
unset($_SESSION["doctor_email"]);

header("location:index.php");

?>