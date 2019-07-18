<?php 
session_start();

if (isset($_SESSION['login_gudang'])) {
    
    unset($_SESSION['login_gudang']);

}

if (isset($_SESSION['login_kasir'])) {
    
    unset($_SESSION['login_kasir']);

}

if (isset($_SESSION['login_manajer'])) {
    
    unset($_SESSION['login_manajer']);
    
}

unset($_SESSION['status']);
session_destroy();
header('location: ../inventori/');
?>