<?php
  session_start();
  $_SESSION['inout'] = "false";
  session_destroy();
  header('Location: /');
  exit;
?>
