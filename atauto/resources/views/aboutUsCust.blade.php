<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AT Auto IMS</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  margin: 5vh 5vh 0 5vh;
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
  border-radius: 10px;
}

.footer{
  padding: 3vh;
  margin: 0 5vh 0 5vh;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  background-color: #1e1f21;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #27292b;
}

a {
  color: white;
}

a:hover {
  text-decoration: none;
  color: white;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <div style="text-align: left; margin-top: -2vh;">
    <a href="/customer.clientView">Back to Home</a>
  </div>
  <h2><u>About Us</u></h2>
  <br>
  <h1>ATAuto Enterprise</h1>
  <br>
  <h5>
    Vehicle Parts Supply Company
    <br>
    <br>
    Founded by Mr. Leow Yong Aik since year 2015
  </h5>
</div>
<br>

<div class="row mx-5">
  <img src="{{ asset('images/') }}/ATAutoEnterprise2.jpeg" alt="Leow" style="width: 50%; margin-left: auto; margin-right: auto;">
</div>
<br>
<div class="row mx-5">
  <div class="col-md-4">
  
  </div>

  <div class="col-md-4">
    <div class="card bg-dark text-white" style="border-radius: 10px;">
      <img src="{{ asset('images/') }}/user.png" alt="Leow" style="width: 50%; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Mr. Leow Yong Aik</h2>
        <p class="title">CEO & Founder</p>
        <p>Founder of ATAuto.</p>
        <p>Email: example@gmail.com</p>
        <p><button class="button" style="border-radius: 10px;"><a href="">Contact</a></button></p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
  
  </div>
</div>

<br>
<h2 style="text-align:center">Corporated with:</h2>
<h1 style="text-align:center">SUC-19C Tech Sdn Bhd</h1>
<br>

<div class="row mx-5">
  <div class="column">
    <div class="card bg-dark text-white" style="border-radius: 10px;">
      <img src="{{ asset('images/') }}/user.png" alt="Leow" style="width: 50%; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Leow Yong Foo</h2>
        <p class="title">CEO & Founder</p>
        <p>A student from Southern University College.</p>
        <p>Email: D190152C@sc.edu.my</p>
        <p><button class="button" style="border-radius: 10px;"><a href="https://wa.me/+60127583579"> Contact</a></button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card bg-dark text-white" style="border-radius: 10px;">
      <img src="{{ asset('images/') }}/user.png" alt="Leong" style="width: 50%; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Leong Cheng Yang</h2>
        <p class="title">Art Director</p>
        <p>A student from Southern University College.</p>
        <p>Email: D190442C@sc.edu.my</p>
        <p><button class="button" style="border-radius: 10px;"><a href="https://wa.me/+60182322001"> Contact</a></button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card bg-dark text-white" style="border-radius: 10px;">
      <img src="{{ asset('images/') }}/user.png" alt="NG" style="width: 50%; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Ng Jian Chong</h2>
        <p class="title">Designer</p>
        <p>A student from Southern University College.</p>
        <p>Email: D190343C@sc.edu.my</p>
        <p><button class="button" style="border-radius: 10px;"><a href="https://wa.me/+60108800403">Contact</a></button></p>
      </div>
    </div>
  </div>
</div>

<div class="footer row" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
  <div class="col-sm-3">
    <h3>Location</h3>
    <p>1662H, Jalan Sultan Abdullah,<br>
      36000, Teluk Intan,<br>
      Perak
    </p>
  </div>
  <div class="col-sm-3">
    <h3>Business Hour</h3>
    <p>9.00am - 6.00pm Monday - Sunday<br>
      Closed on Public Holiday
    </p>
  </div>
  <div class="col-sm-3">
    <h3>Contact</h3>
    <p>Mr. Leow Yong Aik: 018-218 1716<br>
      AT Auto Enterprise: 05-6216363
    </p>
  </div>
  <div class="col-sm-3">
    <h3>Direction</h3> 
    <p>Google Maps: <br>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3980.022756784473!2d101.0228645!3d4.0157316!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb151f7427111d%3A0x4190d26198937b7e!2sAt%20Auto%20Enterprise!5e0!3m2!1sen!2smy!4v1631628729117!5m2!1sen!2smy" 
        width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe> <br>
        Plus Code : 228F+74 Teluk Intan, Perak
    </p>
  </div>
</body>
</html>
