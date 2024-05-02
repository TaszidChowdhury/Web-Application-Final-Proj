<?php
include "../Database/database.php";
if (isset($_POST['username']) && isset($_POST['psw'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['username']);
    $pass = validate($_POST['psw']);

    if (empty($uname)) {
        header("Location: index.php?error=Username is required");
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
    } else {
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['balance'] = $row['balance'];
                header("Location: ../MainPage/index.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect Username or Password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
