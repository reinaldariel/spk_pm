<?php 
session_start();
session_unset();
session_destroy();

header("Location: /spk_pm/index.php");
?>