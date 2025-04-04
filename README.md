
# 💰 Funi - A Web-Based Personal Financial Planner

**Funi** is a comprehensive personal financial planning web application designed to help users effectively manage their money, track goals, calculate loan payments, and stay on top of upcoming financial events. With a modular structure and seamless user experience, Funi combines clean front-end design with robust PHP and MySQL-powered backend functionality.

---

## 🧠 Overview

This application is structured around five core features:

1. **Budget Calculator**
2. **Calendar Reminder System**
3. **Goal Tracker**
4. **Loan Calculator**
5. **Home Dashboard and Navigation**

Each of these modules communicates with a centralized MySQL database via PHP scripts for data persistence and retrieval. The project emphasizes simplicity, usability, and real-world financial utility.

---

## 🚀 Features and Architecture

---

### 🏠 Home Page

**Path:** `/HomePage/home.html`  
**Tech Stack:** HTML, CSS

- Acts as the landing page and central navigation hub.
- Offers clear buttons/links to access each module.
- Styled with CSS for a modern and inviting look.

---

### 📊 Budget Calculator

**Paths:**
- Front-End: `/Billing/budget_calc.html`
- Back-End: `/Billing/index.php`
- Styles: `/Billing/styles.css`

#### 🧾 Front-End Details:
- Input fields for:
  - Monthly Income
  - Expenses (e.g., rent, groceries, utilities, transport)
- Real-time calculation of remaining balance.
- Form validation to ensure all fields are filled correctly.
- Designed for simplicity and accessibility.

#### 🛠️ Back-End Details:
- Form submission triggers `index.php`, which:
  - Sanitizes user inputs using PHP.
  - Stores user input in a MySQL table for long-term tracking.
  - Retrieves previous records (if any) to allow users to compare past vs. current budgets.
- Built to support multi-user environments with potential login integration in the future.

---

### 📅 Calendar Reminder System

**Paths:**
- Front-End: `/Calendar/calendar.html`, `/Calendar/script.js`
- Back-End: `/Calendar/index.php`
- Styles: `/Calendar/styles.css`

#### 🧾 Front-End Details:
- Fully functional JavaScript calendar built with native DOM manipulation.
- Users can:
  - Click on a date to add a reminder.
  - View upcoming events visually.
  - Add labels for events (e.g., "Pay rent", "Transfer savings").
- Dynamically styled cells and modal popups for smooth UX.

#### 🛠️ Back-End Details:
- PHP script (`index.php`) handles:
  - Event creation with date-time stamps.
  - Storing events in a MySQL table (e.g., `calendar_events`).
  - Retrieving events when the calendar is loaded.
- Option to expand with color-coded categories or email reminders.

---

### 🎯 Goal Tracker

**Paths:**
- Front-End: `/GoalTracker/goal.html`
- Back-End: `/GoalTracker/index.php`
- Styles: `/GoalTracker/styles.css`

#### 🧾 Front-End Details:
- Clean form for users to input:
  - Goal Name (e.g., "Save for vacation")
  - Target Amount
  - Target Date
  - Notes or progress updates
- Display of active goals with dynamic progress tracking bars.

#### 🛠️ Back-End Details:
- PHP file processes submissions to:
  - Create new financial goals in the database (`goals` table).
  - Edit or delete existing goals.
  - Fetch and render goal data dynamically.
- Designed with scalability in mind to support user authentication and filtering.

---

### 💸 Loan Calculator

**Path:** `/Loan Calc/index.php`

#### 🧾 Front-End Details:
- Users input:
  - Loan Amount
  - Interest Rate (Annual)
  - Loan Duration (Years)
- Uses standard amortization formula to calculate:
  - Monthly Payment
  - Total Interest Paid
  - Total Amount Paid

#### 🛠️ Back-End Details:
- All logic handled within a single PHP file.
- PHP functions process form data, validate it, and perform:
  ```php
  $monthly_rate = $interest / 1200;
  $months = $years * 12;
  $monthly_payment = ($loan * $monthly_rate) / (1 - pow(1 + $monthly_rate, -$months));
  ```
- Results are displayed back to the user without navigating away.

---

### 🗃️ Database Connectivity

**Path:** `/Database/database.php`  
**Tech Stack:** PHP, MySQL

- Centralized script to connect to the MySQL database.
- Uses `mysqli` or `PDO` (based on your version) for querying.
- Shared across modules to ensure DRY (Don’t Repeat Yourself) principles.
- Designed to be extended with user login system and session management.

---

## 🛠️ Technology Stack

| Component     | Technology           |
|---------------|----------------------|
| Front-End     | HTML5, CSS3, JavaScript |
| Back-End      | PHP                  |
| Database      | MySQL                |
| Development   | Localhost (XAMPP/WAMP) |

---

## 📂 Folder Structure

```
Web-Application-Final-Proj-main/
├── Billing/              # Budget Calculator
│   ├── budget_calc.html
│   ├── index.php
│   └── styles.css
├── Calendar/             # Event Calendar
│   ├── calendar.html
│   ├── index.php
│   ├── script.js
│   └── styles.css
├── GoalTracker/          # Goal Tracking Module
│   ├── goal.html
│   ├── index.php
│   └── styles.css
├── Loan Calc/            # Loan Calculator
│   └── index.php
├── HomePage/             # Landing Page
│   ├── home.html
│   └── styles.css
├── Database/             # DB Connection
│   └── database.php
```

---

## 🧪 How to Run Locally

1. Clone or download the project folder.
2. Move it into your local server directory:
   - For XAMPP: `htdocs/`
   - For WAMP: `www/`
3. Start Apache and MySQL from your local server control panel.
4. Import the SQL database (if provided) via phpMyAdmin or the MySQL CLI.
5. Navigate to the app at: `http://localhost/Web-Application-Final-Proj-main/HomePage/home.html`

---

## 📌 Potential Enhancements

- 🔐 User authentication with session management.
- 📊 Dashboard with charts and graphs for expenses vs. savings.
- 📤 Export data to CSV or PDF.
- 📱 Mobile-first responsive design improvements.
- 🧠 AI budgeting assistant integration.

---

## 👨‍💻 Author

Developed by **Taszid Chowdhury** **Arbid Chowdhury** **MD Hossain** **Mir Khair**
Student Developer | Stockton University

---

## 📬 Contact

Questions or feedback? Reach out via GitHub or email.

