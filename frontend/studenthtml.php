<?php 
    session_start();
    require '../backend/functions.php';

    $server_connection = mysqli_connect("localhost", "root", "", "basecadastros");

    $student_login = $_SESSION["userlogin"];

    $aluno = search_student($server_connection, $student_login);
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

            <div class="card" style="border-left: 5px solid #ffcc00;">
                <h2>Avisos Acadêmicos</h2>
                <p><strong>Atenção:</strong> O prazo para a entrega do projeto de Banco de Dados encerra na próxima sexta-feira.</p> <br>
                <p>Rematrícula para o próximo semestre disponível a partir do dia 10/07.</p>
            </div>

            <form action="../backend/auth.php" method="POST">

                    <button type="submit" name="logout">
                        Finalizar sessão
                    </button>

                </form>
        </main>
        <script>
          const toggleBtn = document.getElementById('toggle');
          const sidebar = document.getElementById('sidebar');
          const darkThemeCheckbox = document.getElementById('dark-theme');

          toggleBtn.addEventListener('click', () => {
              sidebar.classList.toggle('toggled');
          });

          function getCookie(name) {
              let value = "; " + document.cookie;
              let parts = value.split("; " + name + "=");
              if (parts.length === 2) return parts.pop().split(";").shift();
          }

          const themePreference = getCookie("theme");

          if (themePreference === "dark") {
              document.body.classList.add('dark');
              darkThemeCheckbox.checked = true;
          } else {
              document.body.classList.remove('dark');
              darkThemeCheckbox.checked = false;
          }

          darkThemeCheckbox.addEventListener('change', () => {
              if (darkThemeCheckbox.checked) {
                  document.body.classList.add('dark');
                  document.cookie = "theme=dark; max-age=" + (60 * 60 * 24 * 365) + "; path=/";
              } else {
                  document.body.classList.remove('dark');
                  document.cookie = "theme=light; max-age=" + (60 * 60 * 24 * 365) + "; path=/";
              }
          });
        </script>
    </body>

</html>
