<!DOCTYPE html>
<html>

<head>
  <title>Student Portal</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/signup.css">
  <style>
    body {
      background-size: cover;
      background-repeat: no-repeat;
      transition: background-image 1s ease-in-out;
    }
  </style>

</head>

<body id="background-slider" style="background-image: url(logo/gub.jpg); background-size: cover;background-repeat: no-repeat;">
<script>
  const images = [
    // 'logo/gub-bg1.jpg', // Image 1
    'logo/gub-bg2.jpg', // Image 2
    'logo/gub.jpg'  // Image 3
  ];
  
  let currentIndex = 0;

  function changeBackground() {
    const body = document.getElementById('background-slider');
    body.style.backgroundImage = `url(${images[currentIndex]})`;
    currentIndex = (currentIndex + 1) % images.length;
  }

  // Initial call to set the first background
  changeBackground();

  // Change background every 5 seconds
  setInterval(changeBackground, 5000);
</script>
  <header>
    <section id="header1">
      <a href="index.php"><img src="logo/gublogo.jpg" alt=""></a>

      <div>
        <ul id="navbar">
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="student_log.php">Student</a></li>
          <li><a href="admin_log.php">Admin</a></li>
          <li><a href="teacher_log.php">Teacher</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="cart.html"></a><i class="fa-solid fa-bag-shopping"></i></li>
        </ul>
      </div>
    </section>
    <h1>
      <marquee behavior="scroll" direction="left">Welcome to student portal of Green University of Bangladesh. Admision open Fall_2024 . Reminder---Final Exam start 30 Dec 2024</marquee>
    </h1>
  </header>
  <header style="color:black; top: 30px" id="header" class="admin_class">

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



  <!-- <img src="logo/logo.png" alt="logo" class="logo"> -->
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
  <footer style="margin-top: 160px; background-color: #004d00;color: white; padding: 10px; text-align: center; position:initial;width: 100%;bottom: 0; opacity: 65%; ">
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