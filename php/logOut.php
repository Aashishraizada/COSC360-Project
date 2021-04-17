<?php
session_start();
unset($_SESSION["error"]);
unset($_SESSION["username"]);
header("Location:index.php");
?>