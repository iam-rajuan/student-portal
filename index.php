<!DOCTYPE html>
<html>

<head>
  <title>Student Portal</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
  <h1>
    <marquee behavior="scroll" direction="left">Welcome to student portal of Green University of Bangladesh. Admision open Fall_2024 . Reminder---Final Exam start 25 june 2024</marquee>
  </h1>
</header>
<!-- <header id="header" class="admin_class">

  <div id="clock">
    <div id="time"></div>
    <div id="date"></div>
  </div>
  <script>
    function updateClock() {
      const clockElement = document.getElementById('clock');
      const timeElement = document.getElementById('time');
      const dateElement = document.getElementById('date');
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      const day = days[now.getDay()];
      const date = now.toLocaleDateString();
      const timeString = `${hours}:${minutes}:${seconds}`;
      const dateString = `${day}, ${date}`;
      timeElement.textContent = timeString;
      dateElement.textContent = dateString;
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>
</header> -->

<header id="header" class="admin_class" >

<div id="clock">
        <div id="time"></div>
        <div id="date"></div>
    </div>
<script>
        function updateClock() {
            const clockElement = document.getElementById('clock');
            const timeElement = document.getElementById('time');
            const dateElement = document.getElementById('date');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const day = days[now.getDay()];
            const date = now.toLocaleDateString();
            const timeString = `${hours}:${minutes}:${seconds}`;
            const dateString = `${day}, ${date}`;
            timeElement.textContent = timeString;
            dateElement.textContent = dateString;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</header>

<body style="background-image: url(logo/gub.jpg); background-size: cover;background-repeat: no-repeat;">
  <img src="logo/logo.png" alt="logo" class="logo">
  </div>
  <div>
    <h2 class="body_text">Welcome To Student Portal </h2>
    <div class="log_to_portal">
      <button class="btn_home"><a href="student_signup.php">Create Account</a></button>
      <br>
      <!-- <label style="color: white;"> OR </label> -->
      <button class="btn_home"><a href="student_log.php">Student_Login</a></button>
      <br>
      <!-- <label style="color: white;"> OR </label> -->
      <button class="btn_home"><a href="admin_log.php">Admin_Login</a></button>
      <br>
      <!-- <label style="color: white;"> OR </label> -->
      <button class="btn_home"><a href="Teacher_Home.php">Teacher_Login</a>
    </div></button>
  </div>
  </div>
  <footer style="background-color: #004d00;color: white; padding: 10px; text-align: center; position:initial;width: 100%;bottom: 0; opacity: 65%; ">
    <!-- <footer style="background-color:seagreen;color: white; padding: 10px; text-align: center; position:initial;width: 100%;bottom: 0; "> -->
    <!-- <footer style="background-color: #004d00;color: white; padding: 10px; text-align: center; position:initial;width: 100%;bottom: 0; "> -->
    <p>&copy; 2024 Green University. All rights reserved.</p>
    <p>Contact Us: <a href="mailto:support@greenuniversity.edu" style="color: #ffcc00;">support@greenuniversity.edu</a> | Phone: (123) 456-7890</p>
    <p>Follow Us:
      <a href="https://www.facebook.com/greenuniversitybd" style="color: #ffcc00;">Facebook Page </a> | Or|
      <a href="https://green.edu.bd" style="color: #ffcc00;"> Website </a>
    </p>
  </footer>
</body>

</html>