<?php 
    session_start();
    require '../backend/functions.php';

    $server_connection = mysqli_connect("localhost", "root", "", "basecadastros");

    $student_login = $_SESSION["userlogin"];

    search_student($server_connection, $student_login);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema Cadastro - Área do Aluno</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header class="top_header">
            <button id="toggle">☰</button>
        </header>
        
            <aside id="sidebar" class="sidebar">
                <form action="../backend/bancoDados.php" method="POST">
                    <input type="checkbox" name="dark-theme" id="dark-theme">   
                    <label for="dark-theme"><strong>Enable dark mode</strong></label>
                </form>
            </aside>

        <main class="student-content">
            <h1>Área do Aluno</h1>

            <br>

            <div class="card">
                <h2>Aluno</h2>

                <p><strong>Nome do Aluno:</strong> <?php echo isset($aluno['nome']) ? $aluno['nome'] : 'Nome não encontrado'; ?></p>

                <p><strong>RA / RU (ID):</strong> <?php echo isset($aluno['id']) ? $aluno['id'] : 'RA não encontrado'; ?></p>
            </div>

            <div class="card">
                <h2>Curso</h2>
                <p>Técnico em Análise e Desenvolvimento de Sistemas</p>
            </div>

            <div class="card">
                <h2>Disciplinas</h2>
                <ul>
                    <li>Linguagem de Programação (C)</li>

                    <li>Sistemas da Informação</li>

                    <li>Engenharia de Software</li>
                </ul>
            </div>
        </main>
        <script>
            const toggleBtn = document.getElementById('toggle');
            const sidebar = document.getElementById('sidebar');
            const darkMode = document.getElementById('dark-theme');

            toggleBtn.addEventListener('click', () => {sidebar.classList.toggle('toggled');});
            darkMode.addEventListener('change', () => {document.body.classList.toggle('dark');});
        </script>
    </body>

</html>
