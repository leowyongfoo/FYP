@extends('layouts.app')
@section('content')
<head>
<title>About us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

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
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.footer{
  padding: 50px;
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
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
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
  <h1>About Us</h1>
  <h3>At-Auto Enterprise</h3>
  <p></p>
  <p>
    At Auto Enterprise is a company of vehicle part supply.
    and its founded by Mr. Leow Yong Aik since year 2015.
  </p>
</div>

<h2 style="text-align:center">Corporate with:</h2>
<h1 style="text-align:center">SUC-19C Tech Sdn.Bhd</h1>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="{{ asset('images/') }}/user.png" alt="Leow" style="width:100%">
      <div class="container">
        <h2>Leow Yong Foo</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>Email: d190152c@sc.edu.my</p>
        <p><button class="button"><a href="https://wa.me/+60127583579"> Contact</a></button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="{{ asset('images/') }}/user.png" alt="Leong" style="width:100%">
      <div class="container">
        <h2>Leong Cheng Yang</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>Email: d190442c@sc.edu.my</p>
        <p><button class="button"><a href="https://wa.me/+60182322001"> Contact</a></button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="{{ asset('images/') }}/user.png" alt="NG" style="width:100%">
      <div class="container">
        <h2>Ng Jian Chong</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>Email: d190343c@sc.edu.my</p>
        <p><button class="button"><a href="https://wa.me/+60108800403">Contact</a></button></p>
      </div>
    </div>
  </div>
</div>
  <div class="footer">
    <h4>Location</h4>
    <p>1662H, Jalan Sultan Abdullah,<br>
      36000, Teluk intan,<br>
      Perak
    </p>
    <h4>Business Hour</h4>
    <p>9.00am - 6.00pm Monday - Sunday<br>
      Closed on Public Holiday
    </p>
    <h4>Contact</h4>
    <p>Mr. Leow Yong Aik - 018-218 1716<br>
      At Auto Enterprise - +6056216363
    </p>
    <h4>Direction</h4> 
    <p>Google Maps : <br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3980.022756784473!2d101.0228645!3d4.0157316!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb151f7427111d%3A0x4190d26198937b7e!2sAt%20Auto%20Enterprise!5e0!3m2!1sen!2smy!4v1631628729117!5m2!1sen!2smy" 
      width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe> <br>
       Plus Code : 228F+74 Teluk Intan, Perak<br>
       Waze : <br>
       <iframe src="https://embed.waze.com/iframe?zoom=16&lat=4.015732&lon=101.022864&ct=livemap" 
        width="400" height="300" allowfullscreen></iframe>
    </p>
  </div>
</body>
@endsection
