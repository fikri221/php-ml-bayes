<?php
$action = $_GET['action'];

if ($action == "register") {
    require_once '../config.php';
    $name = mysqli_real_escape_string($conn, $_POST['register-form-name']);
    $email = mysqli_real_escape_string($conn, $_POST['register-form-email']);
    $password = mysqli_real_escape_string($conn, $_POST['register-form-password']);

    if (!empty($name) && !empty($email) && !empty($password)) {

        $query = mysqli_query($conn, "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");

        if ($query) {
            echo "<script>alert('Anda berhasil Registrasi'); window.location ='login.php' </script>";
        } else {
            echo "<script>alert('Anda gagal Registrasi'); window.location ='login.php' </script>";
        }
    } else {
        echo "<script>alert('Anda gagal Registrasi'); window.location ='login.php' </script>";
    }
} elseif ($action == "login") {
    include '../config.php';

    $email = mysqli_real_escape_string($conn, $_POST['login-form-email']);
    $password = mysqli_real_escape_string($conn, $_POST['login-form-password']);

    if (!empty($email) && !empty($password)) {
        $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'");
        $result = mysqli_fetch_array($query);

        $name = $result['name'];
        $id = $result['id'];

        $data = mysqli_num_rows($query);

        if ($data == 1) {

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            header('location: ../index.php');
        } else {
            echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";
            session_destroy();
        }
    } else {
        echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";
        session_destroy();
    }
} elseif ($action == "logout") {
    if (!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
    echo "<script>alert('Logout Berhasil!'); window.location ='./index.php' </script>";
}
