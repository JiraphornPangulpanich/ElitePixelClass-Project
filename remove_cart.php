<?php
session_start();
if (isset($_GET['Iditem'])) {
    $id = $_GET['Iditem'];
    unset($_SESSION['cart'][$id]);
}
header("Location: view_cart.php");
exit();
?>
