
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>

  .cont {
    width: 100vw;
    height: 100vh;
    background-image: url(./images/babe.jpg);
    background-size: cover;
    background-position: center;
  }

  
  .cont1 {
    width: 96.6%;
    height: 100px;
    border: 1px solid #611c5e;
    background-color: #611c5e;
    display: flex;
    align-items: center; 
    justify-content: space-between; 
    padding: 0 20px;
  }


  a, p {
    text-decoration: none;
    color: white;
    margin: 0 10px; 
    font-size: calc(1rem + 0.5vw); 
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    transition: color 0.3s ease;
  }

  a:hover {
    color: #ffcc00;
     border: 2px dashed gray; 
  }

  h3 {
    font-size: 5rem;
    color: white;
    margin-left: 30px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }

  h6 {
    font-size: 1.5rem; 
    color: white;
    margin-left: 30px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-top: -30px; 
  }

  button, a {
    color: blueviolet;
    padding: 10px 20px; 
  }

body{
    overflow-x: hidden;
}
  .footer {
    background-color: #611c5e;
    width: 99.8%;
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


  @media only screen and (max-width: 768px) {
    h3 {
      font-size: 3rem; /
    }

    h6 {
      font-size: 1rem; 
    }
  }

</style>
<body>
  <div class="cont">
    <div class="cont1">
      <p style="color: white;">24-Hour Urgent Care</p>
      <nav class="nav">
        <a href="sign in.php">Sign in</a>
        <a href="register.php">Register</a>
      </nav>
    </div>
    <h3>YOUR VISIT MAY BE FREE</h3>
    <h6>We partner with these leading health plans and many more <br> to serve millions of members around the country. <br>This means your visit may be completely covered at no <br> cost to you. <br> Insurance is not required. Register  and enter your information <br> to get started.<br>
        <br>
      </h6>
        
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
