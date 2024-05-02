<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Budget Calculator</title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti"></script>
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
        <div class="budgeting">
            <h2 class="fade-in">BUDGET CALCULATOR</h2>
            <div class="balance-container">
                <h3>Enter your budget and bills to calculate your remaining
                    budget for the period</h3>
                <div class="budget">
                    <label for="budgetInput">Enter your budget for the
                        selected
                        period:</label>
                    <input type="number" id="budgetInput" placeholder="Enter amount">
                </div>
                <div id="billContainer">
                    <h4>Bills:</h4>
                    <div class="bill-entry-wrapper">
                        <div class="bill-entry">
                            <input type="text" placeholder="Bill Name" class="bill-name">
                            <input type="number" placeholder="Amount" class="bill-amount">
                            <button onclick="deleteBill(this)">Delete</button>
                        </div>
                    </div>
                    <div id="buttonsContainer">
                        <button onclick="addBill()">Add More Bills</button>
                        <button onclick="calculateBudget()">Calculate</button>
                    </div>
                </div>

                <div>
                    <h4 class="border-result">RESULTS</h4>
                    <div class="bill-results">
                        <p>Total Bills for the period: <b>$</b><span id="totalBills">0</span></p>
                        <p>Remaining Budget for the period: <b>$</b><span id="remainingBudget">0</span></p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function addBill() {
                const billContainer = document.getElementById('billContainer');
                const newBill = document.createElement('div');
                newBill.className = 'bill-entry';
                newBill.innerHTML = `
                    <input type="text" placeholder="Bill Name" class="bill-name">
                    <input type="number" placeholder="Amount" class="bill-amount">
                    <button onclick="deleteBill(this)">Delete</button>`;
                billContainer.insertBefore(newBill, billContainer.lastElementChild);
                setTimeout(() => {
                    newBill.classList.add('show');
                }, 50);
                moveButtons();
            }

            function moveButtons() {
                const buttonsContainer = document.getElementById('buttonsContainer');
                const billContainer = document.getElementById('billContainer');
                billContainer.appendChild(buttonsContainer);
            }

            function showBillInputs() {
                const billEntries = document.querySelectorAll('.bill-entry');
                billEntries.forEach(entry => {
                    entry.style.display = 'flex';
                });
            }

            function deleteBill(element) {
                const billEntry = element.parentNode;
                billEntry.parentNode.removeChild(billEntry);
            }

            function calculateBudget() {
                const budget = parseFloat(document.getElementById('budgetInput').value);
                const amounts = document.querySelectorAll('.bill-amount');
                let totalBills = 0;

                amounts.forEach(amount => {
                    if (amount.value !== "") {
                        totalBills += parseFloat(amount.value) || 0;
                    }
                });

                const remainingBudget = budget - totalBills;

                document.getElementById('totalBills').textContent = totalBills.toFixed(2);
                document.getElementById('remainingBudget').textContent = remainingBudget.toFixed(2);

                confetti({
                    particleCount: 100,
                    spread: 85,
                    origin: {
                        y: 0.55
                    }
                });

                setTimeout(function() {
                    document.getElementById('totalBills').style.opacity = '1';
                    document.getElementById('remainingBudget').style.opacity = '1';
                }, 200);
            }

            document.addEventListener('DOMContentLoaded', function() {
                var fadeElems = document.querySelectorAll('.fade-in, .balance-container');

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

            document.addEventListener("DOMContentLoaded", function() {
                var dropdown = document.querySelector('.dropdown');
                var dropdownContent = document.querySelector('.dropdown-content');

                dropdown.addEventListener('mouseenter', function() {
                    dropdownContent.style.display = 'block';
                });

                dropdown.addEventListener('mouseleave', function() {
                    dropdownContent.style.display = 'none';
                });

                dropdownContent.addEventListener('mouseenter', function() {
                    dropdownContent.style.display = 'block';
                });

                dropdownContent.addEventListener('mouseleave', function() {
                    dropdownContent.style.display = 'none';
                });
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