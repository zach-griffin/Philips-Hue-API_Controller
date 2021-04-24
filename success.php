<?php
  
  if(isset($_SESSION)){}
  
  else{
    session_start();
  }
  
  $apikey = "APIKEY";
  $bridgeIP = "X.X.X.X";
  
  $lightnum = $_GET["lightid"];
  
  $url = "http://$bridgeIP/api/$apiKey/lights/";
  $url .= $lightnum;
  $arr = file_get_contents($url);
  $json_decoded = json_decode($arr, true);
  $state = $json_decoded["state"]["on"];
  $reachable = $json_decoded["state"]["reachable"];
  if ($state == "1"){
    $lightstatus = "on";
  }
  else {
    $lightstatus = "off";
  }
  
  $name = $json_decoded["name"];
  
  if ($name == "") {
    $name = "The light";
  }
  
  if ($lightstatus == "") {
    $lightstatus = "changed";
  }
  
  $msg= "Success!";
  $icon = "<i class='fas fa-thumbs-up'></i>";
  
  $strOut = $name." is now ".$lightstatus.".";
  
  $btn = "<a href='/' class='redirectBtn'>Go Home Now</a>";
  
  if ($reachable <> "true"){
    $msg = "Unreachable";
    $strOut = "$name cannot be reached<br>It is most likely powered off at the switch or outlet<br><br>Please power on the device and try again";
    $icon = "<i class='fas fa-question-circle'></i>";
  }
  
?>

<html>
  <head>
    <Title>Success!</Title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/successpage.css">
    <script src="https://kit.fontawesome.com/key.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="card">
      <div>
        <?php
          echo $icon
        ?>
      </div>
      <h1><?php echo $msg ?></h1>
      <p><?php echo $strOut ?></p>
      <br>
      <?php echo $btn ?>
    </div>
  </body>
</html>
