<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema Cadastro</title>
    </head>

    <body>
        <?php 
            session_start();
            require '../backend/functions.php';

            $conexao = mysqli_connect("localhost", "root", "", "basecadastros");

            $student_login = $_SESSION["userlogin"];

            search_student($conexao, $student_login);
        ?>
    </body>

</html>