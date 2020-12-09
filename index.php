<?php

if(isset($_SESSION)){}

else{
	session_start();
}

$bridgeIP = "X.X.X.X"
$apiKey = "ENTERKEY"

   function callAPI ($status, $lightnum){
   if ($status == 'on'){
	$data = '{"on":true}';
	$lightstatus = 1;
   }
   if ($status == 'off'){
	$data = '{"on":false}';
	$lightstatus = 0;
   }
   $url = "http://$bridgeIP/api/$apiKey/lights/";
   $url .= $lightnum;
   $url .= "/state";
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
   	'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

   curl_exec($curl);
   curl_close($curl);

        if(successcheck($lightstatus,$lightnum) == 0){
                echo "<script> location.href='/error.php'; </script>";
        }

   return $result;
}

	function successcheck ($lightstatus, $lightnum) {
        $url = "http://$bridgeIP/api/$apiKey/lights/";
        $url .= $lightnum;
        $arr = file_get_contents($url);
        $json_decoded = json_decode($arr, true);
	if ($lightstatus == 1){
		if ($json_decoded["state"]["on"] == 1){
			return 1;
		}
		else {
			return 0;
		}
	}
	else {
		if ($json_decoded["state"]["on"] != 1){
			return 1;
		}
		else {
			return 0;
		}
	}
}
	$year = date("Y");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Light Controller</title>
		<meta charset="UTF-8">
	</head>
	<link rel="stylesheet" type="text/css" href="/main.css">
	<body>

                <?php
			                  if(isset($_POST['l11'])) {
				                        callAPI('on',1);
                                echo "<script> location.href='/success.php?lightid=1'; </script>";
			                  }
			                  if(isset($_POST['l10'])) {
				                        callAPI('off',1);
                                echo "<script> location.href='/success.php?lightid=1'; </script>";
			                  }
			                  if(isset($_POST['l21'])) {
				                        callAPI('on',2);
                                echo "<script> location.href='/success.php?lightid=2'; </script>";
			                  }

                        if(isset($_POST['l20'])) {
                                callAPI('off',2);
                                echo "<script> location.href='/success.php?lightid=2'; </script>";
                        }

                        if(isset($_POST['l31'])) {
				                        callAPI('on',3);
				                        echo "<script> location.href='/success.php?lightid=3'; </script>";
                        }
                        if(isset($_POST['l30'])) {
                                callAPI('off',5);
				                        echo "<script> location.href='/success.php?lightid=3'; </script>";
                        }
			                  if(isset($_POST['logout'])) {
                                echo "<script> location.href='/logout.php'; </script>";
                        }

                ?>

			<div>
				<h1><b>Welcome to the Light Show</b></h1>
				<br><br>
				<h1>Light Num 1</h1>
				<hr>
				<br>
				<div class="centerButtons">
					<form method="post">
                        			<input type="submit" name="l11" value="Turn On" class="onBtn" />
                        			<input type="submit" name="l10" value="Turn Off" class="offBtn"/>
                        		</form>
				</div>
				<br>
				<div>
					<h1>Light Num 2</h1>
					<hr>
					<br>
					<div class="centerButtons">
                        		<form method="post">
                        			<input type="submit" name="l21" value="Turn On" class="onBtn" />
                              <input type="submit" name="l20" value="Turn Off" class="offBtn" />
                        		</form>
					</div>
				</div>
				<br>
				<div>
					<h1>Light Num 3</h1>
					<hr>
					<br>
					<div class="centerButtons">
 						<form method="post">
        						<input type="submit" name="l31" value="Turn On" class="onBtn" />
        						<input type="submit" name="l30" value="Turn Off" class="offBtn"/>
    						</form>
					<br>
					</div>
				</div>
				<div>
					<div class="centerButtons">
					<br>
						<form method="post">
							<input type="submit" name="logout" value="Log Out" class="logoutBtn"/>
						</form>
					<br>
					<?php
						echo "<p style='font-family: sans-serif'>&copy; $year by YOURNAME</p>"
					?>
					</div>
				</div>
			</body>
		</html>
