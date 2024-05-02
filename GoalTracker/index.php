<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tracker</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <nav>
            <a href="../HomePage/index.php" id="FUNI-logo">
                <h1>FUNI</h1><img src="../images/IMG_0049.jpg" alt="FUNI logo">
            </a>
            <ul>
                <li><a href="../Calendar/index.php">CALENDAR</a></li>
                <li><a href="../GoalTracker/index.php">GOAL TRACKER</a></li>
                <li class="dropdown">CALCULATORS
                    <div class="dropdown-content">
                        <a href="../Billing/index.php">BUDGET
                            CALCULATOR</a>
                        <a href="../Salary Calc/index.php">SALARY
                            CALCULATOR</a>
                        <a href="../Loan Calc/index.php">LOAN
                            CALCULATOR</a>
                    </div>
                </li>
                <li class="dropdown"><?php echo $_SESSION['user_name']; ?>
                    <div class="dropdown-content">
                        <a href="#">EDIT PROFILE</a>
                        <a href="#">OPTIONS</a>
                        <a href="../Logout/logout.php" id="signOut">LOGOUT</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container">
            <h1>Savings Goal Tracker</h1>
            <form>
                <div class="form-group">
                    <label for="goal-amount">Current Goal: $</label>
                    <input type="number" class="currentgoal" id="currentgoal" name="currentgoal" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="current-amount">Current Savings: $</label>
                    <input type="number" class="currentsavings" id="currentsavings" name="currentsavings" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="add-amount">Add Savings: $</label>
                    <input type="number" class="addsavings" id="addsavings" name="addsavings" step="0.01" required>
                </div>
                <div class="submit-button">
                    <button class="sub-button" type="submit">Update</button>
                </div>
                <div class="form-group">
                    <label for="progress">Goal Completion:</label>
                    <progress class="completionbar" id="completionbar" value="0" max="100"></progress>
                </div>
                <div class="completed-goals">
                    <h2>Completed Goals:</h2>
                    <ul class="completed-goals-list">
                    </ul>
                </div>
            </form>
            <script>
                const form = document.querySelector('form');
                const currentgoal = document.querySelector('.currentgoal');
                const currentsavings = document.querySelector('.currentsavings');
                const addsavingsfromchecking = document.querySelector('.addsavings');
                const progressbar = document.querySelector('.completionbar');
                const completedGoalsList = document.querySelector('.completed-goals-list');
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const goal = parseFloat(currentgoal.value);
                    const savings = parseFloat(currentsavings.value);
                    const add = parseFloat(addsavingsfromchecking.value);
                    const total = savings + add;
                    const percent = Math.min((total / goal) * 100, 100);
                    if (goal <= 0 || goal <= savings) {
                        alert(goal <= 0 ? "Enter a goal greater than zero." : "Goal must be above the current savings amount.");
                        return;
                    }
                    if (percent >= 100) {
                        currentgoal.value = 0;
                        progressbar.value = 0;
                        const date = new Date().toLocaleString();
                        alert("Goal achieved on " + date + "!");
                        const li = document.createElement('li');
                        li.textContent = `Goal achieved: $${goal} on ${date}`;
                        completedGoalsList.appendChild(li);
                    } else {
                        progressbar.value = percent;
                    }
                    currentsavings.value = total;
                });
            </script>

        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ../Login/log.php");
    exit();
}
?>