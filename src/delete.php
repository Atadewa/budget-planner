<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    if (isset($_SESSION['expenses'][$id])) {
        
        unset($_SESSION['expenses'][$id]);

        $_SESSION['expenses'] = array_values($_SESSION['expenses']);
    }
}

header('Location: index.php');
exit;