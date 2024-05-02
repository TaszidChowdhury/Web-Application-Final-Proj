<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <nav>
            <a href="../HomePage/home.html" id="FUNI-logo">
                <h1>FUNI</h1><img src="../images/IMG_0049.jpg" alt="FUNI logo">
            </a>
            <ul>
                <li><a href="../Calendar/calendar.html">CALENDAR</a></li>
                <li><a href="../GoalTracker/goal.html">GOAL TRACKER</a></li>
                <li class="dropdown">CALCULATORS
                    <div class="dropdown-content">
                        <a href="../Billing/budget_calc.html">BUDGET
                            CALCULATOR</a>
                        <a href="../Salary Calc/salary_calc.html">SALARY
                            CALCULATOR</a>
                        <a href="../Loan Calc/loan_calc.html">LOAN
                            CALCULATOR</a>
                    </div>
                </li>
                <li><a href="../Login/index.php">LOGIN</a></li>
                <li><a href="../Sign Up/signup.php">SIGN UP</a></li>
            </ul>
        </nav>
        <form autocomplete="off" action="login.php" method="post" id="registration-form">
            <div class="registration-login">
                <h2>Sign in to get started</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="username-login">
                    <input type="text" placeholder=" " id="username" name="username">
                    <label for="username">Username</label>
                </div>
                <div class="password-login">
                    <input type="password" placeholder=" " id="password" name="psw">
                    <label for="psw">Password</label>
                    <p>Don't have an account yet?&#160<a href="../Sign Up/signup.php" class="register-acc">Click here to register
                            now!</a></p>
                    <button class="login-button" type="submit">Sign
                        In</button>
                </div>
            </div>
        </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var fadeElems = document.querySelectorAll('.registration-login');

                function checkFade() {
                    fadeElems.forEach(function(elem) {
                        var distance = elem.getBoundingClientRect().top;
                        var windowHeight = window.innerHeight;

                        if (distance < windowHeight * 0.8) {
                            elem.classList.add('show');
                        } else {
                            elem.classList.remove('show');
                        }
                    });
                }

                checkFade();
                window.addEventListener('scroll', checkFade);
            });
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: ../Login/index.php");
    exit();
}
?>