<?php
session_start();
if (isset($_SESSION['username'])) {
    include 'navbar_gamer.php';
}else{
    include 'navbar.php';
}
?>