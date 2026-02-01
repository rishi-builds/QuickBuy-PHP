<?php
$conn = mysqli_connect("localhost","root","","ecommerce_db");
if(!$conn){ die("DB Error"); }

session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
?>