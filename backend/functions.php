<?php
    function insert_user($server_connection, $username, $login, $email, $password) {
        if(!ctype_alpha(str_replace(' ','',$username))) {
            error_log("Name is invalid");
            echo 
            "<script>
                alert('Numbers are not allowed in name field!');
                window.location.href='../frontend/admin.html';
            </script>";
            exit;
        }

        for ($i = 0; $i < strlen($login); $i++) {
            if ($login[$i] == " ") {
                error_log("Login is invalid");
                echo 
                "<script>
                    alert('Spaces are not allowed in the login field!');
                    window.location.href='../frontend/admin.html';
                </script>";
                exit;
            }
        }

        $insert_user_string = "INSERT INTO cadastros(username, login, email, password) VALUES('$username', '$login','$email', '$password')";
        $result = mysqli_query($server_connection, $insert_user_string);

        if (!$result) {
            echo "Failed to insert user<br>";
            echo "<script>setTimeout(function(){window.location.href='../frontend/admin.html';}, 3000);</script>";
        } else {
            echo "User inserted successfully<br>";
            echo "<script>setTimeout(function(){window.location.href='../frontend/admin.html';}, 3000);</script>";
        }

        return $result;
    }

    function delete_user($server_connection, $login) {
        $erase_user = "DELETE FROM cadastros WHERE login = '$login'";
        $result = mysqli_query($server_connection, $erase_user);
        if (!$result) {
            echo "Failed to delete user<br>";
        } else {
            echo "User deleted successfully<br>";
        }
        return $result;
    }

    function search_single_user($server_connection, $login) {

        $search_user = "SELECT * FROM cadastros WHERE login = '$login'";
        $query_result = mysqli_query($server_connection, $search_user);

        if (!$query_result) {
            echo "User not in the database<br>";
        }
        while ($row = mysqli_fetch_assoc($query_result)) {
            echo "Username: " . $row['nome'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
        }
    }

    function search_student($server_connection, $student_login) {

        $search_user = "SELECT * FROM cadastros WHERE login = '$student_login'";
        $query_result = mysqli_query($server_connection, $search_user);

        if (!$query_result) {
            echo "Student not in the database<br>";
        }
        while ($row = mysqli_fetch_assoc($query_result)) {
            echo "Username: " . $row['nome'] . "<br>";
            echo "RA: " . $row['id'] . "<br>";
        }
    }

    function show_db($server_connection) {

        $search_user = "SELECT * FROM cadastros";
        $query_result = mysqli_query($server_connection, $search_user);

        echo "<table border = '1'>";

        echo"
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>";

        while ($row = mysqli_fetch_assoc($query_result)) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
            </tr>";
        }
        echo "</table>";

        echo"<br>";

        echo "<a href='../frontend/admin.html'>Voltar</a>";
    }

    function retrieve_userID($server_connection, $login) {
        $search_user = "SELECT id FROM cadastros WHERE login = '$login'";
        return $search_user;
    }

    function admin_auth($login, $password, $admin_login, $admin_password) {
        if ($login == $admin_login && $password == $admin_password) {
            return true;
        }
        return false;
    }

    function student_auth($server_connection, $student_login, $student_password) {
        $student_login_query = mysqli_query($server_connection, "SELECT * FROM cadastros WHERE login = '$student_login'");
        $student_password_query = mysqli_query($server_connection, "SELECT * FROM cadastros WHERE password = '$student_password'");

        if (mysqli_num_rows($student_login_query) == 0 || mysqli_num_rows($student_password_query) == 0) {
            return false;
        }

        return true;
    }
?>
