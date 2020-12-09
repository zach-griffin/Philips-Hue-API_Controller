<?php

if(isset($_SESSION)){}

else{
  session_start();
}

?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <Title>Hue API Connection Error</Title>
  </head>
  <style>
    body {
      text-align: center;
      padding: 40px 0;
      background: #EBF0F5;
    }
    h1 {
      color: #E00022;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-weight: 900;
      font-size: 40px;
      margin-bottom: 10px;
    }
    p {
      color: #E00022;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-size:20px;
      margin: 0;
    }
    i {
      color: #E00022;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
    .redirectBtn{
      background-color:#E00022;
      border-radius:11px;
      display:inline-block;
      cursor:pointer;
      color:#ffffff;
      font-family:Arial;
      font-size:24px;
      font-weight:bold;
      padding:25px 90px;
      text-decoration:none;
    }
    .redirectBtn:hover{
      background-color:#B3001B;
    }
  </style>
  <body>
    <div class="card">
    <div>
      <i style="font-size:60px;" class="fas fa-exclamation-triangle"></i>
    </div>
    <h1>Uh-Oh!</h1>
    <p>An unexpected error occurred.</p>
    <br>
    <hr style="border-color:#E00022;">
    <br>
    <p>We can't guarantee the action was processed.</p>
    <br>
    <p>Please contact the server administrator</p>
    <br>
    <br>
    <a href="/" class="redirectBtn">Go Home</a>
    </div>
  </body>
</html>
