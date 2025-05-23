<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection parameters
$servername = "localhost";
$username_db = "root"; // Adjust if needed
$password_db = "";     // Adjust if needed
$dbname = "barangay_db";

try {
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username_db, $password_db, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// You can add dynamic content fetching here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bucandala 1 | Official Website of Barangay Bucandala 1</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="image/imus-logo.png">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/index.css" />
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body>

  <div style="background-color: #0056b3; color: white; display: flex; justify-content: space-between; align-items: center; padding: 5px 20px; font-family: Arial, sans-serif; font-size: 14px;">
      <div>
        <strong>GOVPH</strong> | The Official Website of Barangay Bucandala 1, Imus Cavite
      </div>
      <div style="display: flex; align-items: center; gap: 15px;">
        <a href="#" style="color: white;"><i class="fab fa-facebook-f"></i></a>
        <a href="#" style="color: white;"><i class="fab fa-youtube"></i></a>
        <a href="#" style="color: white;"><i class="fab fa-twitter"></i></a>
        <a href="tel:+464025614" style="color: white;"><i class="fas fa-phone-alt"></i></a>
        <span id="dateTimePH"></span>
        <a href="index.php?action=logout" class="logout-link" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
      </div>
    </div>

  <style>
    .logout-link {
      color: #ff4d4d !important;
      margin-left: 20px;
      text-decoration: underline;
      font-weight: bold;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    .logout-link:hover {
      color: #ff0000 !important;
      text-decoration: none;
    }
  </style>

  <div style="background-color: #12c009; color: black; font-weight: bold; height: 50px; overflow: hidden; display: flex; align-items: center;">
    <marquee behavior="scroll" direction="left" scrollamount="5" style="width: 100%;">
      🔔 Latest Announcement: Barangay Assembly on April 10, 2025 | Free Medical Check-up on April 15, 2025 | Stay Updated with Barangay Bucandala 1!
    </marquee>
  </div>
  
  <nav>
    <a href="index.php">Home</a>
    <div class="dropdown">
      <a href="#" class="dropbtn">Services ▾</a>
      <div class="dropdown-content">
        <a href="barangay-clearance.php">Barangay Clearance</a>
        <a href="certificate-of-indigency.php">Certificate of Indigency</a>
        <a href="certificate-of-residency.php">Certificate of Residency</a>
        <a href="barangay-id.php">Barangay ID</a>
      </div>
    </div>
    <a href="contact.php">About</a>
    <a href="faq.html">FAQs</a>
  </nav>
  
  <div class="hero-section">
    <img src="image/imus-logo.png" alt="" class="hero-image">
    <img src="image/logo.png" alt="" class="hero">
    <div class="text-overlay">
      <h4>Discover The District</h4>
      <h1 class="main-heading"><strong>Barangay Bucandala 1</strong></h1>
      <p>Cavite, get your opportunity to move forward together.</p>
      <a href="https://www.facebook.com/profile.php?id=100085126650282" class="learn-more">Visit Our Facebook Page →</a>
    </div>
  </div>

  <section class="about-section" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-about">
      <div class="about-left">
        <img src="image/team.jpg" alt="Barangay Bucandala 1 Team" class="about-image">
      </div>
      <div class="about-right">
        <h3>About us</h3>
        <h1>If you change your city,<br>you're changing the world.</h1>
        <p>Barangay Bucandala 1 is determined to address everything that hinders its way to be the best.</p>

        <div class="about-buttons">
          <button class="about-btn" onclick="showContent('mission')">Our Mission</button>
          <button class="about-btn" onclick="showContent('vision')">Our Vision</button>
          <button class="about-btn" onclick="showContent('goal')">Our Goal</button>
        </div>

        <p class="about-description" id="content-text">
          A Barangay that is God-centered, competent, orderly, honest, peaceful, credible, gender responsive and abides the Code of Conduct.
        </p>

        <div class="contact-info">
          <p><strong>Call To Ask Any Questions</strong></p>
          <p class="contact-number">+46 40 256 14</p>
          <p><strong>Barangay Captain</strong></p>
          <p class="captain-name" style="font-size: 30px;" >SANTIAGUEL, FERDINAND APOLINAR</p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="map-section"data-aos="fade-up" data-aos-duration="1000">
    <h2 class="map-title"><strong>Barangay Bucandala 1 MAP</strong></h2>
    <div class="map-container">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.3418477936393!2d120.93009625999409!3d14.40744677920732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3b116ec03eb%3A0x4097af86012cb153!2sBarangay%20Hall%20Bucandala%20I!5e0!3m2!1sen!2sph!4v1745208603455!5m2!1sen!2sph" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </section>

      <!-- Contact Form -->
  <section class="contact-section"data-aos="fade-up" data-aos-duration="1000">
    <div class="contact-form">
      <h2>For Inquiries and Concerns, Contact Us</h2>
      <form>
        <div class="form-row">
          <input type="text" placeholder="Name" class="form-input" required>
          <input type="email" placeholder="Email" class="form-input" required>
        </div>
        <input type="text" placeholder="Subject" class="form-input full-width" required>
        <textarea placeholder="Message" class="form-textarea" required></textarea>
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </div>
  
    <!-- Contact Info -->
    <div class="contact-info-block">
      <h2 class="contact-highlight">Contact Information</h2>
      <h4><strong>Barangay Bucandala 1, Imus, Cavite</strong></h4>
      <p>📍 Barangay Hall, Barangay Bucandala 1, Imus, Cavite Philippines 4103</p>
      <p>✉️ <a href="mailto:secretariat@barangay17cagayandeoro.ph">barangaybucana1@gmail.com</a></p>
    </div>
  </section>
  
  <div class="footer">
    <div class="footer-content">
      <img src="image/imus-logo.png" alt="Barangay Logo" class="footer-logo">
      <div class="footer-text">
        <p>Copyright &copy; 2025 The Official Website of Barangay Bucandala 1, Imus Cavite. All Rights Reserved.</p>
        <p>Bucandala 1 Barangay Hall, Imus, Cavite, Philippines 4103.</p>
        <p>Call Us Today: +46 40 256 14</p>
      </div>
    </div>
  </div>
  
  <!-- Chatbot iframe -->
  <iframe src="chatbot.html"
    style="position: fixed; bottom: 10px; right: 10px; width: 340px; height: 800px; border: none; z-index: 999;">
  </iframe>

  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  
</body>
</html>
