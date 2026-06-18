<?php 
    require 'functions.php';

    if(isset($_POST['insert_user'])) {
        insert_user($server_connection, $_POST['username'], $_POST['login'], $_POST['email'], $_POST['password']);
    }
?>
