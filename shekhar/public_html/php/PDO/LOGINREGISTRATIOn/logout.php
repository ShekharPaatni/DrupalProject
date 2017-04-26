<?php
session_start();
unset($_SESSION['username']);
unset($_SESSIOn['password']);
session_destroy();
echo json_encode("Registration.php");
 ?>
