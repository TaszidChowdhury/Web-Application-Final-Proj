<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Sign Up</title>
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
    <div>
        <form autocomplete="off" action="signup-check.php" method="post" id="registration-form">
            <div class="registration-signup">
                <h2>Create an account</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <div class="username-signup">
                    <?php if (isset($_GET['username'])) { ?>
                        <input type="text" placeholder="ex. (Johndoe)" id="username" name="username" value="<?php echo $_GET['username']; ?>">
                    <?php } else { ?>
                        <input type="text" placeholder="ex. (Johndoe)" id="username" name="username">
                    <?php } ?>
                    <label for="username">Username</label>
                </div>
                <div class="email">
                    <?php if (isset($_GET['email'])) { ?>
                        <input type="email" placeholder="ex. (JohnDoe@gmail.com)" name="email" value="<?php echo $_GET['email']; ?>">
                    <?php } else { ?>
                        <input type="email" placeholder="ex. (JohnDoe@gmail.com)" name="email">
                    <?php } ?>
                    <label for="Email">Email</label>
                </div>
                <div class="password-signup">
                    <?php if (isset($_GET['psw'])) { ?>
                        <input type="password" placeholder="(ex. 'Brownfox1')" id="password" name="psw" value="<?php echo $_GET['psw']; ?>">
                    <?php } else { ?>
                        <input type="password" placeholder="(ex. 'Brownfox1')" id="password" name="psw">
                    <?php } ?>
                    <label for="psw">Password</label>
                </div>
                <div class="repassword-signup">
                    <?php if (isset($_GET['psw'])) { ?>
                        <input type="password" placeholder="(ex. 'Brownfox1')" id="repassword" name="repsw" value="<?php echo $_GET['psw']; ?>">
                    <?php } else { ?>
                        <input type="password" placeholder="(ex. 'Brownfox1')" id="repassword" name="repsw">
                    <?php } ?>
                    <label for="repsw">Confirm Password</label>
                </div>
                <p>Have an account?&#160<a href="../Login/index.php" class="login-acc">Click here to sign in!</a></p>
                <button class="signup-button" type="submit">Register</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fadeElems = document.querySelectorAll('.registration-signup');

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