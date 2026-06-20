<?php 
    require 'functions.php';

    $server_connection = mysqli_connect("localhost", "root", "", "basecadastros");

    if (!$server_connection) {
        die("Connection failed\n" . mysqli_connect_error());
    }
    else {
        error_log("Successfully connected to the db\n");
    }

    if(isset($_POST['insert_user'])) {
        insert_user($server_connection, $_POST['username'], $_POST['login'], $_POST['email'], $_POST['password']);
    }

    if(isset($_POST['delete_user'])) {
        delete_user($server_connection, $_POST['target']);
    }

    if(isset($_POST['search_single_user'])) {
        search_single_user($server_connection, $_POST['search']);
    }

    if(isset($_POST['search_all_users'])) {
        show_db($server_connection);
    }

    mysqli_close($server_connection);
?>
