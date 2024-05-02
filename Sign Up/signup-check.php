<?php
session_start();
include "../Database/database.php";
if (
    isset($_POST['username']) && isset($_POST['psw'])
    && isset($_POST['email']) && isset($_POST['repsw'])
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['username']);
    $pass = validate($_POST['psw']);

    $repass = validate($_POST['repsw']);
    $email = validate($_POST['email']);

    $user_data = 'username=' . $uname . '&email=' . $email;

    echo $user_data;

    if (empty($uname)) {
        header("Location: signup.php?error=Username is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($repass)) {
        header("Location: signup.php?error=Confirming Password is required&$user_data");
        exit();
    } else if (empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    } else if ($pass !== $repass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {

        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE user_name='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO users(user_name, password, email) VALUES('$uname', '$pass', '$email')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
        //     $row = mysqli_fetch_assoc($result);
        //     if ($row['user_name'] === $uname && $row['password'] === $pass) {
        //         $_SESSION['user_name'] = $row['user_name'];
        //         $_SESSION['email'] = $row['email'];
        //         $_SESSION['id'] = $row['id'];
        //         header("Location: ../MainPage/signup.php");
        //         exit();
        //     } else {
        //         header("Location: signup.php?error=Incorrect Username or Password");
        //         exit();
        //     }
        // } else {
        //     header("Location: signup.php?error=Incorrect Username or Password");
        //     exit();
        // }
    }
} else {
    header("Location: signup.php");
    exit();
}
