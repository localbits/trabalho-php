<?php
    require 'functions.php';

    $hostname = "127.0.0.1"; // localhost for MyPhpAdmin
    $username = "dev"; // root for MyPhpAdmin
    $password = "dev"; // "" for MyPhpAdmin
    $database = "basecadastros";
    $port = "3307"; // Does not need to be given as a parameter for myphpadmin

    $server_connection = mysqli_connect($hostname, $username, $password, $database, $port);
    
    if (!$server_connection) {
        die("Connection failed\n" . mysqli_connect_error());
    }
    else {
        error_log("Successfully connected to the db\n");
    }
    
    /* TODO: implement dark theme with usage of web cookies
      if(isset($_POST['dark-theme'])) {
        echo 
        "
        <script> 
            document.getElementById('content').href = 'style.css';
        </script>
        ";
    } */

    if(isset($_POST['insert_user'])) {
        insert_user($server_connection, $_POST['username'], $_POST['login'], $_POST['email'], $_POST['passwords']);
    }

    if(isset($_POST['delete_user'])) {
        delete_user($server_connection, $_POST['target']);
    }

    if(isset($_POST['search_single_user'])) {
        search_single_user($server_connection, $_POST['search']);
    }

    if(isset($_POST['search_all_users'])) {
        show_db($server_connection, $_POST['search_all_users']);
    }

    mysqli_close($server_connection);
?>
