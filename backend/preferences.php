<?php
    function set_theme() {
        if ($_COOKIE['theme'] == "dark-mode") {
            echo
            "
            <script> 
                document.getElementById('body.dark').href = 'style.css';
                document.getElementById('body.dark .sidebar').href = 'style.css';
                document.getElementById('body.dark .top_header').href = 'style.css';
                window.location.href='../frontend/admin.html';
            </script>
            ";
            setcookie("theme", "dark-mode", time()+3600);
        }
        else {
            echo
            "
            <script> 
                document.getElementById('body').href = 'style.css';
                window.location.href='../frontend/admin.html';
            </script>
            ";
            setcookie("theme", "light-mode", time()+3600);
        }
    }
?>
