<?php

    session_start();

    $_SESSION = array();

    session_destroy();
    $_SESSION['user_type'] = '';
    header('location: index.php');

?>