<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $username_email = $_POST['username_email'];
    $password = $_POST['password'];

    if (empty($username_email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $stored_password = $row['hashedpassword_saltpepper'];
                $salt = $row['salt'];
                $pepper = "vellyrod";


                $password_to_check = $pepper . $password . $salt;
                $password_check = password_verify($password_to_check, $stored_password);

                if (!$password_check) {
                    header("Location: ../index.php?error=wrongpassword-" . $salt . "-" . $password . "-" . $stored_password);
                    exit();
                } else {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
