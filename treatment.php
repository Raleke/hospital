<?php

session_start();

include("db/auth.php");
authenticate();

$did = $_SESSION["doctor_id"];
$doctor_email = $_SESSION["doctor_email"];
$doctor_name = $_SESSION["doctor_name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard</title>
 </head>
 <style>
   body {
  margin: 0;
  padding: 20px;
}


header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: #666;
}

.log {
  margin: 0;
}

nav {
  display: flex;
  list-style: none;
  padding: 0;
}

nav a {
  text-decoration: none;
  color: inherit;
  margin-right: 20px;
  font-weight: bold;
}

nav a:hover {
  color: #d5d; 
}


.footer {
    background-color: #611c5e;
    width: 197%;
    display: flex; 
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px; 
  }

  .testimonial {
    width: calc(33.33% - 40px); 
    text-align: center; 
    margin: 10px; 
  }

  footer, p {
    font-size: 14px;
  }

  footer h4 {
    font-size: 18px; 
    margin-bottom: 5px; 
  }



@media (max-width: 768px) {
  header {
    flex-direction: column; 
    align-items: flex-start; 
  }

  .log {
    margin-bottom: 10px; 
  }

  nav {
    flex-direction: column; 
    margin-top: 10px; 
    width: 100%; 
  }

  nav a {
    margin-right: 0; 
    padding: 10px 0; 
    border-bottom: 1px solid #ddd; 
  }

  nav a:last-child {
    border-bottom: none; 
  }
}



    .content {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px; 
    }

    .content-section {
      width: 95%; 
      background-color: #f5f5f5; 
      padding: 15px;
      border-radius: 5px; 
      margin-bottom: -20px; 
    }

    .medical-writeup h3 {
      margin-bottom: 10px;
    }

    .medical-writeup p {
      line-height: 1.5;
    }

   
     @media (max-width: 768px) {
      .content {
        grid-template-columns: 1fr; 
      }


      .content-section {
        margin-bottom: 20px; 
      }
      nav {
    flex-direction: column; 
    align-items: center; 
    text-align: center; 
  }

  
  nav a {
    margin-bottom: 10px; 
  }
 
}
 </style>
<body>
  <header>
    <h4 class="log">Logged in Doctor: Dr. <?php echo $doctor_name; ?></h4>
    <nav>
      <a href="add_patient.php">Add Patient</a>
       <a href="add_diagnosis.php">Add Diagnosis</a>
       <a href="add_treatment.php">Add Treatment</a>
       <a href="view_patient.php">View Patient</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>
  <marquee><h3>Welcome!!! You are now logged in</h3></marquee>
  <hr>
  
  <div class="content">
    <div class="content-section">
      <h3 class="medical-writeup">Diabetes Management</h3>
      <p>Success Story:  Sarah, a 58-year-old patient with Type 2 Diabetes, struggled with managing her blood sugar levels for years. Through a combination of dietary changes, increased physical activity, and medication adjustments, Sarah has been able to maintain healthy blood sugar levels for the past 6 months. She reports feeling more energetic and has even reduced her dependence on medication.</p>
    </div>
    <div class="content-section">
      <h3 class="medical-writeup">Heart Disease Recovery</h3>
      <p>Success Story: John, a 65-year-old patient, underwent successful bypass surgery to address a blocked coronary artery.  Following a dedicated cardiac rehabilitation program, John has significantly improved his heart function and stamina. He is now able to enjoy activities he previously limited himself from, like playing golf with his friends.</p>
    </div>
    <div class="content-section">
      <h3 class="medical-writeup">Mental Health Improvement</h3>
      <p>Success Story:  Michael, a 32-year-old patient experiencing anxiety and depression, has shown remarkable progress in therapy. Through cognitive-behavioral therapy (CBT) and medication management, Michael has learned strategies to cope with his anxiety and manage his depression symptoms. He reports feeling a renewed sense of optimism and is actively re-engaging in his social life.</p>
    </div>
    <div class="content-section">
        <h3 class="medical-writeup">Weight Loss Transformation</h3>
        <p>Success Story:  Linda, a 42-year-old patient, set a goal to lose weight and improve her overall health. With a personalized diet plan and regular exercise guidance, Linda has lost 30 pounds over the past year. She feels more confident and motivated, and her blood pressure has also improved significantly.</p>
    </div>
    <footer>
<footer class="footer">
    <div class="testimonial">
      <h4>Lauren, Illinois  <br> &#9733;&#9733;&#9733;&#9733;&#9733;</h4> <p>"I love the convenience! When I need to see a doctor there is always one available. Seeing my psychologist and psychiatrist is a breeze too."</p>
    </div>
    
    <div class="testimonial">
      <h4>Lois, New Mexico <br> &#9733;&#9733;&#9733;&#9733;&#9733;</h4>
      <p>"I was able to get a prescription at my local pharmacy and a dr's note stating my return to work date for my employer. Best part, my insurance covered it!"</p>
    </div>
    
    <div class="testimonial">
      <h4>Troy, California <br> &#9733;&#9733;&#9733;&#9733;&#9733;</h4>
      <p>"The doctors are always so helpful and caring. They are very thorough and truly care about your wellbeing."</p>
    </div>
  </footer>
  </body>
</html>
