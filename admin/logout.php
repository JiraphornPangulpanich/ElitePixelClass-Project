<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['name']);

echo"<script>";
echo "window.location='login.php';";
echo "</script>";

?>