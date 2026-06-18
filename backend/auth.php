<?php

    require 'functions.php';

    $conexao = mysqli_connect("localhost", "root", "", "basecadastros");

    $admin = "root";
    $admin_password = "123";

    $login = $_POST["login"];
    $password = $_POST["password"];

    $admin_fail = false;
    $student_fail = false;

    if (admin_auth($login, $password, $admin, $admin_password)) {
        session_start();
        $_SESSION["userlogin"] = $login;
        $_SESSION["password"] = $password;
        $_SESSION["logintime"] = time();

        echo 
        "<script>
            window.location.href='../frontend/admin.html';
        </script>";
    }
    else {
        $admin_fail = true;
    }

    if (student_auth($conexao, $login, $password)) {
        session_start();
        $_SESSION["userlogin"] = $login;
        $_SESSION["password"] = $password;
        $_SESSION["logintime"] = time();

        echo 
        "<script>
            window.location.href='../frontend/studenthtml.php';
        </script>";
    }
    else {
        $student_fail = true;
    }

    if($admin_fail && $student_fail) {
        echo
        "<script> 
            alert('Wrong username or password');
            window.location.href='../index.html';
        </script>";
    }

    if(isset($_POST['logout'])) {
        session_destroy();
        echo 
        "<script>
            window.location.href='../index.html';
        </script>";
    }

?>