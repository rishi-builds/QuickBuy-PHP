<?php
include 'db.php';
$id = $_GET['id'];

if(!empty($id)){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}
header("Location: index.php");
?>