<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
    if(!$_SESSION['logged']){
        header("Location:index.php");
    }