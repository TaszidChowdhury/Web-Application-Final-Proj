<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">
        <title>Calendar</title>
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
        <!-- Main wrapper for the calendar application -->
        <div class="wrapper">
            <div class="container-calendar">
                <h2>CALENDAR</h2>
                <div id="top">
                    <div class="top-background">
                        <h3 id="monthAndYear"></h3>
                        <div class="button-container-calendar">
                            <button id="previous" onclick="previous()">
                                ‹
                            </button>
                            <button id="next" onclick="next()">
                                ›
                            </button>
                        </div>
                        <table class="table-calendar" id="calendar" data-lang="en">
                            <thead id="thead-month"></thead>
                            <!-- Table body for displaying the calendar -->
                            <tbody id="calendar-body"></tbody>
                        </table>
                        <div class="footer-container-calendar">
                            <label for="month">Jump To: </label>
                            <!-- Dropdowns to select a specific month and year -->
                            <select id="month" onchange="jump()">
                                <option value=0>Jan</option>
                                <option value=1>Feb</option>
                                <option value=2>Mar</option>
                                <option value=3>Apr</option>
                                <option value=4>May</option>
                                <option value=5>Jun</option>
                                <option value=6>Jul</option>
                                <option value=7>Aug</option>
                                <option value=8>Sep</option>
                                <option value=9>Oct</option>
                                <option value=10>Nov</option>
                                <option value=11>Dec</option>
                            </select>
                            <!-- Dropdown to select a specific year -->
                            <select id="year" onchange="jump()"></select>
                        </div>
                    </div>
                </div>
                <div id="bottom">
                    <h3 class="bottom-h3">Add Event</h3>
                    <div class="botton-container">
                        <div id="event-section">
                            <input type="date" id="eventDate">
                            <input type="text" id="eventTitle" placeholder="Event Title">
                            <input type="text" id="eventDescription" placeholder="Event Description">
                            <button id="addEvent" onclick="addEvent()">
                                Add
                            </button>
                        </div>
                        <div id="reminder-section">
                            <h3 class="reminder-h3">Reminders</h3>
                            <!-- List to display reminders -->
                            <ul id="reminderList">
                                <li data-event-id="1">
                                    <strong>Event Title</strong>
                                    - Event Description on Event Date
                                    <button class="delete-event" onclick="deleteEvent(1)">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Include the JavaScript file for the calendar functionality -->
        <script src="./script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: ../Login/log.php");
    exit();
}
?>