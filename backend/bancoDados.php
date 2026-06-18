<?php 
    require 'functions.php';

    $conexao = mysqli_connect("localhost", "root", "", "basecadastros");

    if (!$conexao) {
        die("Connection failed\n" . mysqli_connect_error());
    }
    else {
        error_log("Successfully connected to the db\n");
    }
    
    if(isset($_POST['dark-theme'])) {
        echo 
        "
        <script> 
            document.getElementById('content').href = 'style.css';
        </script>
        ";
    }

    if(isset($_POST['insert_user'])) {
        insert_user($conexao, $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha']);
    }

    if(isset($_POST['delete_user'])) {
        delete_user($conexao, $_POST['target']);
    }

    if(isset($_POST['search_single_user'])) {
        search_single_user($conexao, $_POST['search']);
    }

    if(isset($_POST['search_all_users'])) {
        show_db($conexao, $_POST['search_all_users']);
    }

    mysqli_close($conexao);
?>