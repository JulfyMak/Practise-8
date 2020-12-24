<?php
    header('Location: pages/main.php');
    session_start();
    $_SESSION['auth'] = 'false';
    $_SESSION['admin_id'] = '0';
    $_SESSION['admin'] = 'false';
?>
