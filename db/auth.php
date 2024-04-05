<?php


include("db_config.php");

function authenticate() {
    if (!isset($_SESSION["doctor_id"]) && !isset($_SESSION["doctor_email"])) {
      header("location: sign in.php?err_msg=Please+login+first"); 
    }

    if (!isset($_SESSION["doctor_name"])) {
        header("location: sign in.php?err_msg=name+missing"); 
      }
    }
  
  

?>