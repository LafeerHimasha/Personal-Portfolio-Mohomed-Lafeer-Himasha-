<?php
// --- Database Connection ---
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "portfolio_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch profile details
$sql = "SELECT * FROM profile LIMIT 1";
$result = $conn->query($sql);
$profile = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $profile['name']; ?> - Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <style>
    /* ===== RESET ===== */
    * {margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body {background: linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));;color:#333;}
    a {text-decoration:none;color:inherit;}

    /* ===== NAVBAR ===== */
    nav {position:fixed;top:0;left:0;width:100%;background:linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));color:#fff;
         display:flex;justify-content:space-between;align-items:center;padding:15px 50px;z-index:100;}
    nav .logo {font-size:1.5rem;font-weight:bold;}
    nav ul {display:flex;list-style:none;}
    nav ul li {margin:0 15px;}
    nav ul li a {transition:.3s;}
    nav ul li a:hover {color:#0dcaf0;}

    /* ===== HERO ===== */
    /* ===== HERO ===== */
.hero {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
  padding: 0 20px;
  background: linear-gradient(to right, rgba(72, 72, 72, 0.7), rgba(157, 156, 156, 0.3)),
              url('HeroImg/WhatsApp Image 2025-08-24 at 20.59.35.jpeg') no-repeat center center/cover;
}

.hero-content {
  animation: fadeInUp 1s ease-in-out;
}

.hero h1 {
  font-size: 3rem;
  margin-bottom: 15px;
}

.hero h2 {
  font-size: 1.6rem;
  margin-bottom: 15px;
  height: 40px;
}

.gradient-text {
  background: linear-gradient(to right, #043d4aff, #8007b8ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.cursor {
  color: #0dcaf0;
  animation: blink 0.8s infinite;
}

.tagline {
  font-size: 1.1rem;
  margin-bottom: 30px;
  opacity: 0.85;
}

/* Buttons */
.hero-buttons {
  display: flex;
  gap: 15px;
  justify-content: center;
  margin-bottom: 30px;
}

.btn {
  padding: 12px 28px;
  border-radius: 30px;
  font-weight: bold;
  transition: 0.3s;
  text-decoration: none;
}

.btn-primary {
  background: linear-gradient(to right, rgb(121, 20, 144), rgb(65, 12, 130));
  color: #fff;
}

.btn-primary:hover {
  background: #0dcaf0;
  color: #fff;
}

.btn-secondary {
  background: transparent;
  border: 2px solid #fff;
  color: #fff;
}

.btn-secondary:hover {
  background: #0dcaf0;
  border-color: #0dcaf0;
}

/* Social Links with Glass Effect */
.social-links.glass {
  display: flex;
  gap: 20px;
  justify-content: center;
  padding: 12px 20px;
  border-radius: 15px;
  backdrop-filter: blur(8px);
  background: rgba(255, 255, 255, 0.1);
  box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.social-links a {
  font-size: 2rem;
  color: #fff;
  transition: 0.3s;
}

.social-links a:hover {
  color: #0dcaf0;
  transform: scale(1.2);
}

/* Animations */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes blink {
  50% { opacity: 0; }
}

/* Responsive */
@media (max-width: 768px) {
  .hero h1 { font-size: 2.2rem; }
  .hero h2 { font-size: 1.2rem; }
  .hero-buttons { flex-direction: column; gap: 10px; }
}

/* ===== ABOUT SECTION ===== */
.about {
  display: flex;  font-family: 'Times New Roman', Times, serif;
  justify-content: center;
  align-items: center;
  padding: 80px 20px;
  background: linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));
}

.about-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  max-width: 1000px;
  background: #fff;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.1);
}

.about-img img {
  width: 100%;
  max-width: 400px;
  border-radius: 50%;
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.about-content h1 span {

  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}


.about-details p {
  margin: 8px 0;
  font-size: 1rem;
}

.skills {
  margin: 20px 0;
}

.badge {
  display: inline-block;
  background: #0dcaf0;
  color: #fff;
  padding: 8px 14px;
  border-radius: 20px;
  margin: 5px;
  font-size: 0.9rem;
  transition: 0.3s;
}

.badge:hover {
  background: #7a1ca4;
  transform: scale(1.1);
}

.cv-btn {
  margin-top: 20px;
}

.cv-btn .btn {
  background: #0dcaf0;
  color: #fff;
  font-size: 1.1rem;
  padding: 12px 30px;
  border-radius: 8px;
  font-weight: bold;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: 0.3s;
}

.cv-btn .btn:hover {
  background: #430d82;
}

/* Responsive */
@media (max-width: 768px) {
  .about-container {
    grid-template-columns: 1fr;
    text-align: center;
  }
  .about-img img {
    margin: 0 auto;
  }
}
/* ===== SKILLS ===== */
.skills { 
  padding: 80px 20px;
  background: linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));
  text-align: center;
}
.skills .section-header h1 {
  font-family: 'Times New Roman', Times, serif;
}
.skills .section-header h1 span {
 
  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.skills-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 60px; width: 100%;
  margin-top: 30px;
  text-align: left;
}

.skill-category h2 {
  font-size: 1.5rem;
  margin-bottom: 15px;
  color: #430d82;
}

.skill {
  margin-bottom: 15px;
}

.skill p {
  margin-bottom: 5px;
  font-weight: bold;
}

.skill-bar {
  width: 100%;
  height: 12px;
  background: #ddd;
  border-radius: 8px;
  overflow: hidden;
}

.skill-bar div {
  height: 100%;
  background: linear-gradient(to right, rgb(121, 20, 144), rgb(65, 12, 130));
  border-radius: 8px;
  transition: width 1s ease-in-out;
}

/* Animate skill bars when in view */
.skill-bar div {
  width: 0;
}

.skills-container .skill-bar div.animate {
  width: attr(data-width '%');
}

    /* ===== PROJECTS ===== */
    #projects h1 {text-align:center;margin-bottom:40px;font-size:2rem;span {
  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}}
    .grid {display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:30px;}
    .card {background:#fff;border-radius:15px;box-shadow:0 5px 20px rgba(0,0,0,.1);padding:20px;transition:.3s;}
    .card:hover {transform:translateY(-10px);}
    .card img {width:100%;border-radius:10px;margin-bottom:15px;}
     .btn {text-align:center; align-items:bottom !important;background:linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));color:#fff;padding:12px;border:none;border-radius:8px;font-weight:bold;cursor:pointer;}
.projects {
  padding: 80px 20px;
}/* ===== QUALIFICATION ===== */
.qualification {
  padding: 80px 20px;
  background:linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));
  text-align: center;
}

.qualification .section-header h1 span {
  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.qualification-container {
  margin-top: 50px;
}

.timeline {
  position: relative;
  padding-left: 30px;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 15px;
  top: 0;
  width: 2px;
  height: 100%;
  background: #022931ff;
}

.timeline-item {
  position: relative;
  margin-bottom: 30px;
}

.timeline-icon {
  position: absolute;
  left: -2px;
  top: 0;
  font-size: 1.5rem;
  background: #55189cff;
  color: #fff;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.timeline-content {
  background: #f9f9f9;
  padding: 15px 20px;
  border-radius: 10px;
  margin-left: 40px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.timeline-content h3 {
  margin-bottom: 5px;
  color: #121212;
}

.timeline-content span {
  font-size: 0.9rem;
  color: #555;
}

.timeline-content p {
  font-size: 0.9rem;
  color: #333;
  margin-top: 5px;
}/* ===== EXPERIENCE ===== */
.experience {
  padding: 80px 20px;
  background:linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));
  ;
  text-align: center;
}

.experience .section-header h1 span {
    font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.experience-container {
  margin-top: 50px;
}

.timeline {
  position: relative;
  padding-left: 30px;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 15px;
  top: 0;
  width: 2px;
  height: 100%;
  background: #0dcaf0;
}

.timeline-item {
  position: relative;
  margin-bottom: 30px;
}

.timeline-icon {
  position: absolute;
  left: -2px;
  top: 0;
  font-size: 1.5rem;
  background: #430d82;
  color: #fff;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.timeline-content {
  background: #fff;
  padding: 15px 20px;
  border-radius: 10px;
  margin-left: 40px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  text-align: left;
}

.timeline-content h3 {
  margin-bottom: 5px;
  color: #121212;
  font-size: 1.1rem;
}

.timeline-content span {
  font-size: 0.9rem;
  color: #555;
}

.timeline-content ul {
  margin-top: 10px;
  padding-left: 20px;
}

.timeline-content ul li {
  font-size: 0.9rem;
  color: #333;
  margin-bottom: 5px;
}

/* ===== SERVICES ===== */
.services {
  padding: 80px 20px;
  background: linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));
  text-align: center;
}

.services .section-header h1 span {
  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.services-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.service-card {
  background: #fff;
  padding: 25px 20px;
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.service-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.service-icon {
  font-size: 3rem;
  color: #430d82;
  margin-bottom: 15px;
}

.service-card h3 {
  margin-bottom: 10px;
  font-size: 1.2rem;
  color: #121212;
}

.service-card p {
  font-size: 0.95rem;
  color: #555;
  line-height: 1.5;
}
/* ===== TESTIMONIALS ===== */
.testimonials {
  padding: 80px 20px;
  background::linear-gradient(to right,rgba(177, 158, 180, 1),rgba(232, 220, 247, 1));
  text-align: center;
}

.testimonials .section-header h1 span {

  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.testimonial-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.testimonial-card {
  background: #f9f9f9;
  padding: 25px 20px;
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.testimonial-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.testimonial-card img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 15px;
}

.testimonial-card h3 {
  margin-bottom: 5px;
  font-size: 1.1rem;
  color: #121212;
}

.testimonial-card span {
  font-size: 0.9rem;
  color: #555;
  display: block;
  margin-bottom: 10px;
}

.testimonial-card p {
  font-size: 0.9rem;
  color: #333;
  line-height: 1.5;
}

    /* ===== CONTACT ===== */
    #contact h1 {text-align:center;margin-bottom:40px;font-size:2rem; span {
  font-size: 30px;
  font-family:'times new roman';
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));
  padding: 15px 40px;
  transform: skew(-20deg);
  display: inline-block;
  text-transform: uppercase;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}}
    form {max-width:600px;margin:auto;display:flex;flex-direction:column;gap:15px;}
    input, textarea {padding:12px;border:1px solid #ddd;border-radius:8px;}
    button {align:center;background:linear-gradient(to right,rgb(121, 20, 144),rgb(65, 12, 130));color:#fff;padding:12px;border:none;border-radius:8px;font-weight:bold;cursor:pointer;}
    button:hover {background:#0bb4d8;}

    /* ===== FOOTER ===== */
    footer {text-align:center;padding:20px;background:#111;color:#aaa;}
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="logo"><?php echo $profile['name']; ?></div>
  <ul>
    <li><a href="#hero">Home</a></li>
    <li><a href="#about">About</a></li>
     <li><a href="#skills">Skills</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#qualification">Qualifications</a></li>
    <li><a href="#experience">Experiences</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#testimonials">Testimonials</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
</nav>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-content">
    <h1>Hi, I'm <span class="gradient-text"><?php echo $profile['name']; ?></span></h1>
    <h2><span id="typing"></span><span class="cursor">|</span></h2>
    <p class="tagline">Passionate about building user-focused digital solutions</p>

    <!-- CTA Buttons -->
    <div class="hero-buttons">
      <a href="#projects" class="btn btn-primary">View My Work</a>
      <a href="#contact" class="btn btn-secondary">Hire Me</a>
    </div>

    <!-- Social Media Links -->
    <div class="social-links glass">
      <a href="https://www.linkedin.com/in/lafeer-himasha-132b80216" target="_blank"><i class="ri-linkedin-box-fill"></i></a>
      <a href="https://github.com/LafeerHimasha" target="_blank"><i class="ri-github-fill"></i></a>
      <a href="https://www.facebook.com/profile.php?id=100070521488309" target="_blank"><i class="ri-facebook-circle-fill"></i></a>
      <a href="https://instagram.com/laf.hima" target="_blank"><i class="ri-instagram-fill"></i></a>
      <a href="mailto:hima7666234@gmail.com"><i class="ri-mail-fill"></i></a>
    </div>
  </div>
</section>



<!-- ABOUT -->
<section id="about" class="about">
  <div class="about-container">
    
    <!-- Left: Profile Image -->
    <div class="about-img">
      <img src="<?php echo $profile['photo']; ?>" alt="Profile Photo">
    </div>

    <!-- Right: Content -->
    <div class="about-content">
      <h1><span>About</span> Me</h1> <br>
      <p><?php echo $profile['about']; ?></p>

       <!-- CV Button -->
      <div class="cv-btn">
        <a href="Resume-1.pdf" download class="btn">
          Download CV <i class="ri-download-2-line"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- SKILLS -->
<section id="skills" class="skills">
  <div class="section-header">
    <h1>My <span> Skills</span></h1><br>
    <p>Here are some of my technical skills and expertise</p>
  </div>

  <div class="skills-container">

    <!-- Category: Programming Languages -->
    <div class="skill-category">
      <h2>Programming Languages</h2>
      <div class="skill">
        <p>Java</p>
        <div class="skill-bar"><div style="width:85%;"></div></div>
      </div>
      <div class="skill">
        <p>PHP</p>
        <div class="skill-bar"><div style="width:80%;"></div></div>
      </div>
      <div class="skill">
        <p>C#</p>
        <div class="skill-bar"><div style="width:70%;"></div></div>
      </div>
    </div>

    <!-- Category: Web Development -->
    <div class="skill-category">
      <h2>Web Development</h2>
      <div class="skill">
        <p>HTML</p>
        <div class="skill-bar"><div style="width:95%;"></div></div>
      </div>
      <div class="skill">
        <p>CSS</p>
        <div class="skill-bar"><div style="width:90%;"></div></div>
      </div>
      <div class="skill">
        <p>JavaScript</p>
        <div class="skill-bar"><div style="width:85%;"></div></div>
      </div>
    </div>

    <!-- Category: Graphics & Design -->
    <div class="skill-category">
      <h2>Graphics & Design</h2>
      <div class="skill">
        <p>Canva</p>
        <div class="skill-bar"><div style="width:90%;"></div></div>
      </div>
      <div class="skill">
        <p>Photoshop</p>
        <div class="skill-bar"><div style="width:75%;"></div></div>
      </div>
      <div class="skill">
        <p>Figma</p>
        <div class="skill-bar"><div style="width:80%;"></div></div>
      </div>
    </div>

  </div>
</section>


<!-- PROJECTS -->
<section id="projects">
<h1>MY <span>Projects</span></h1>
  <div class="grid">
    <div class="card">
      <img src="PrjctImg/Capture.PNG" alt="Project 1">
      <h3>FixItNow (Smart Digital Platform for Managing Community Complaints)</h3>
      <p>FixItNow is a web-based complaint management system designed to streamline
         the process of reporting, tracking, and resolving community or organizational issues.
          The platform enables users to easily submit complaints, while administrators and technicians
           can efficiently manage, assign, and resolve them through a centralized dashboard.</P>
<br>

  Key Features:
<ul>
  <li>📌 User-friendly interface for complaint submission</li>
<li>👤 Secure user authentication and profile management</li>
<li>🛠 Technician registration and qualification verification</li>
<li>📊 Admin dashboard with filtering, sorting, charting, and export options</li>
<li>🔔 Real-time notifications for updates and status changes</li>
<li>🌙 Dark mode for better accessibility</li>
<li>📂 File uploads for evidence (images, certificates, etc.)</li>
<li>📧 Email-based password reset and secure login system</li>
<br>
<p>Technologies Used:</p>
<li>Frontend: HTML, CSS, JavaScript
<li>Backend: PHP
<li>Database: MySQL
<li>Libraries/Tools: Chart.js, Tailwind CSS, LocalStorage</p>
<br>
  <!-- GitHub Button -->
  <a href="https://github.com/LafeerHimasha/FixItNow-Smart-Digital-Platform-for-Managing-Community-Complaints-.git" target="_blank" class="btn">View More</a>
</div>
    
    <div class="card">
      <img src="PrjctImg/Capture1.PNG" alt="Project 2">
      <h3>EMart (Online Grocery Website)</h3>
       <p>E-Mart is a modern and responsive frontend web application for an online grocery store. It provides users with a clean and intuitive shopping experience where they can browse products, view categories, and explore offers in a visually engaging layout.
<br>
<br>
Key Features:
<ul>
<li>🖥️ Responsive and mobile-friendly design</li>
<li>🛍️ Product listing with categories and pricing</li>
<li>🔎 Search and filter options for quick navigation</li>
<li>⭐ Featured products and promotions section</li>
<li>📱 Optimized UI/UX for seamless user interaction</li>
</ul>
<br>
Technologies Used:
<ul>
<li>HTML5 – Semantic and structured content</li>
<li>CSS3 – Modern styling with grid and flexbox</li>
<li>JavaScript – Dynamic interactions and validation</li>
</ul>
</p>
<br>
    <!-- GitHub Button -->
  <a href="  https://github.com/LafeerHimasha/E-Mart-Online-Grocery-Website-.git" target="_blank" class="btn">View More</a>
</div>
    
    <div class="card">
      <img src="PrjctImg/Capture2.PNG" alt="Project 3">
      <h3>Momenttum (Travel Websitet)</h3>
     <p>Momenttum is a modern, responsive frontend web application for a travel agency platform. It allows users to explore destinations, browse travel packages, and access travel-related information through an attractive and interactive interface.
<br>
<br>
Key Features:
<ul>
  <li>🌍 Responsive design optimized for desktops and mobile devices</li>
<li>🏖️ Browse destinations and travel packages with images and details</li>
<li>🔍 Search and filter functionality for destinations</li>
<li>🖼️ Image galleries for popular destinations</li>
<li>📱 Interactive UI elements for a seamless user experience</li>
<br>
Technologies Used:
<ul>
  <li>HTML5 – Semantic and structured markup</li>
  <li>CSS3 – Modern layout design, animations, and responsiveness</li>
  <li>JavaScript – Dynamic UI elements and interactive features</li>
</ul>
</p>
    <br>
    <!-- GitHub Button -->
  <a href="  https://github.com/LafeerHimasha/Momenttum-Travel-Web-Site-.git" target="_blank" class="btn">View More</a>
</div>
     <div class="card">
      <img src="PrjctImg/Capture4.PNG" alt="Project 4">
      <h3>Health Ok (Hospital Management System)</h3>
      <p>Health OK is a database-driven hospital management system developed using Microsoft Access. It streamlines the management of patient records, appointments, staff, and hospital resources, providing an organized and efficient workflow for healthcare facilities.
<br>
<br>
Key Features:
<ul>
  <li>👤 Patient management: store patient details, medical history, and visit records</li>
<li>🗓️ Appointment scheduling for doctors and patients</li>
<li>🏥 Staff and department management</li>
<li>💊 Medicine and inventory tracking</li>
<li>📄 Reports generation for patients, staff, and hospital activities</li>
<li>🔒 Secure data storage with relational database structure</li>
</ul>
<br>
Technologies Used:
<ul>
<li>Microsoft Access – Relational database design</li>
  <li>Tables, Queries, Forms, Reports – For data entry, retrieval, and reporting</li>
  <li>VBA (optional) – For automated workflows and simple validations
</li>
</ul>
<br>
    <!-- GitHub Button -->
  <a href=" https://github.com/LafeerHimasha/Health-Ok-Hospital-Management-System-.git" target="_blank" class="btn">View More</a>
</div>

<div class="card">
      <img src="" alt="Project 5">
      <h3>Swastha (Ayurvedic Website)</h3>
      <p>Swastha is a full-stack web application designed for an Ayurvedic healthcare and wellness center. The platform enables users to explore treatments, book appointments, and access herbal product information while allowing administrators to manage services, doctors, and patient interactions through a secure backend.
<br>
<br>
Key Features:
<ul>
  <li>🏷️ Information pages for Ayurvedic treatments and herbal products</li>
  <li>👨‍⚕️ Doctor profiles with specialization details</li>
  <li>📅 Appointment booking system with confirmation</li>
  <li>👤 User authentication & profile management</li>
  <li>📂 Admin dashboard for managing patients, services, and content</li>
  <li>📊 Database-driven records for patients, doctors, and appointments</li>
</ul>
<br>
Technologies Used:
<ul>
  <li>Frontend: HTML5, CSS3, JavaScript</li>
  <li>Backend: PHP</li>
  <li>Database: MySQL</li>
</ul>
</p>
    <br>
    <!-- GitHub Button -->
  <a href=" https://github.com/LafeerHimasha/Swastha-Ayurvedic-Website-.git" target="_blank" class="btn">View More</a>
</div>

<div class="card">
      <img src="" alt="Project 6">
      <h3>Gift Hub (Online Gift Shop)</h3>
      <p>Gift Hub is a user-friendly e-commerce platform that allows customers to browse and purchase a wide variety of gifts for different occasions. The website features a modern design, secure payment options, and an intuitive interface for a seamless shopping experience.
<br>
<br>
Key Features:
<ul>
  <li>🎁 Extensive catalog of gifts for all occasions</li>
  <li>🔍 Search and filter options for quick navigation</li>
  <li>⭐ Featured products and promotions section</li>
  <li>📱 Optimized UI/UX for seamless user interaction</li>
</ul>
<br>
Technologies Used:
<ul>
  <li>HTML5 – Semantic and structured content</li>
  <li>CSS3 – Modern styling with grid and flexbox</li>
  <li>JavaScript – Dynamic interactions and validation</li>
</ul>
</p>
<br>
    <!-- GitHub Button -->
  <a href="  https://github.com/LafeerHimasha/Gift-Hub-online-Gift-Shop-.git" target="_blank" class="btn">View More</a>
</div>

<div class="card">
      <img src="PrjctImg/sql code.PNG" alt="Project 7">
      <h3>Life Flow (Blood Donation Management System - DataBase)</h3>
      <p>A relational database built to manage blood donors, donations, stock, and hospital requests. It ensures secure donor records, real-time blood unit tracking, request handling, and transparent transactions between blood banks and hospitals.
<br>
<br>
Tech Used: MySQL | SQL Queries | Relational Mapping
<br> <br>
    <!-- GitHub Button -->
  <a href=" https://github.com/LafeerHimasha/Life-Flow-Blood_Donation-Management--System-.git" target="_blank" class="btn">View More</a>
</div>
    

    <div class="card">
      <img src="" alt="Project 8">
      <h3>Flora (E-Commerce Platform for Fresh Flowers -Ongoing)</h3>
      <p>Flora is a vibrant e-commerce platform dedicated to providing a wide variety of fresh flowers and floral arrangements for all occasions. The website offers an intuitive shopping experience, allowing users to easily browse, select, and order their favorite blooms.
<br>
<br>
Key Features:
<ul>
  <li>🌸 Extensive catalog of fresh flowers and arrangements</li>
  <li>🛒 User-friendly shopping cart and checkout process</li>
  <li>📦 Order tracking and delivery notifications</li>
  <li>💳 Secure payment options</li>
  <li>📱 Mobile-responsive design for on-the-go shopping</li>
</ul>
<br>
Technologies Used:
<ul>
  <li>Frontend: HTML5, CSS3, JavaScript</li>
  <li>Backend: PHP</li>
  <li>Database: MySQL</li>
</ul>
</p>
<br>
    <!-- GitHub Button -->
  <a href="" target="_blank" class="btn">View More</a>
</div>
    </section>
<!-- QUALIFICATION -->
<section id="qualification" class="qualification">
  <div class="section-header">
    <h1>My <span>Qualification</span></h1><br>
    <p>Academic background and achievements</p>
  </div>

  <div class="qualification-container">

    <div class="timeline">

      <!-- HNDIT -->
      <div class="timeline-item">
        <div class="timeline-icon">🎓</div>
        <div class="timeline-content">
          <h3>Sri Lanka Institute of Advanced Technological Education- Ratnapura</h3>
          <span>Higher National Diploma in Information Technology | 2023 - 2025</span>
          <p>Comprehensive diploma program focused on software development, database management, web technologies, and IT project management. Emphasized practical application of programming and system analysis.</p>
        </div>
      </div>

      <!-- Diploma in English -->
      <div class="timeline-item">
        <div class="timeline-icon">🎓</div>
        <div class="timeline-content">
          <h3>CCAS City Campus- Matale</h3>
          <span>Diploma in English | 2023</span>
        </div>
      </div>

      <!-- Diploma in Spoken English -->
      <div class="timeline-item">
        <div class="timeline-icon">🎓</div>
        <div class="timeline-content">
          <h3>CCAS City Campus- Matale</h3>
          <span>Diploma in Spoken English | 2021 - 2022</span>
        </div>
      </div>

      <!-- Advanced Level -->
      <div class="timeline-item">
        <div class="timeline-icon">🎓</div>
        <div class="timeline-content">
          <h3>R/Nivi/Kahawatta Muslim Maha Vidyalaya- Kahawatta</h3>
          <span>Advanced Level | 2018 - 2020</span>
        </div>
      </div>

      <!-- Ordinary Level -->
      <div class="timeline-item">
        <div class="timeline-icon">🎓</div>
        <div class="timeline-content">
          <h3>R/Nivi/Kahawatta Muslim Maha Vidyalaya- Kahawatta</h3>
          <span>Ordinary Level | 2017</span>
        </div>
      </div>

    </div>

  </div>
</section> <!-- EXPERIENCE -->
<section id="experience" class="experience">
  <div class="section-header">
    <h1>My <span>Experience</span></h1><br>
    <p>Professional work and volunteering history</p>
  </div>

  <div class="experience-container">

    <div class="timeline">

      <!-- Allianz Advisor -->
      <div class="timeline-item">
        <div class="timeline-icon">💼</div>
        <div class="timeline-content">
          <h3>Allianz, Kahawatta — Advisor</h3>
          <span>Jan 2022 - Jun 2023</span>
          <ul>
            <li>Built and managed long-term client relationships</li>
            <li>Promoted life, health, and general insurance products</li>
            <li>Achieved monthly sales and performance targets</li>
          </ul>
        </div>
      </div>

      <!-- Sun Flower Academy Tutor -->
      <div class="timeline-item">
        <div class="timeline-icon">💼</div>
        <div class="timeline-content">
          <h3>Sun Flower Academy — Tutor</h3>
          <span>Jan 2021 - Jun 2023</span>
          <ul>
            <li>Provided personalized tutoring in English and Sinhala for students in grades 4 to 9</li>
            <li>Helped improve grammar, writing, reading, and comprehension skills</li>
            <li>Adapted lessons to suit individual learning styles and school syllabi</li>
          </ul>
        </div>
      </div>

      <!-- Volunteer -->
      <div class="timeline-item">
        <div class="timeline-icon">💼</div>
        <div class="timeline-content">
          <h3>R/Nivi/Kahawatta Muslim Maha Vidyalaya, Kahawatta — Volunteer</h3>
          <span>2021 - 2022</span>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- SERVICES -->
<section id="services" class="services">
  <div class="section-header">
    <h1>My <span>Services</span></h1><br>
    <p>What I can do for you</p>
  </div>

  <div class="services-container">
    <!-- Service 1 -->
    <div class="service-card">
      <i class="ri-code-s-slash-line service-icon"></i>
      <h3>Web Development</h3>
      <p>Building responsive, modern, and user-friendly websites using HTML, CSS, JavaScript, and PHP.</p>
    </div>

    <!-- Service 2 -->
    <div class="service-card">
      <i class="ri-database-2-line service-icon"></i>
      <h3>Database Management</h3>
      <p>Designing and managing databases with MySQL for web applications and business solutions.</p>
    </div>

    <!-- Service 3 -->
    <div class="service-card">
      <i class="ri-paint-brush-line service-icon"></i>
      <h3>UI/UX Design</h3>
      <p>Creating modern, clean, and intuitive user interfaces for web and mobile applications.</p>
    </div>

    <!-- Service 4 -->
    <div class="service-card">
      <i class="ri-mobile-line service-icon"></i>
      <h3>Frontend Development</h3>
      <p>Developing interactive, responsive, and accessible web pages with modern frontend technologies.</p>
    </div>

    <!-- Service 5 -->
    <div class="service-card">
      <i class="ri-settings-3-line service-icon"></i>
      <h3>Project Management</h3>
      <p>Planning and managing IT projects efficiently with a focus on deadlines, quality, and communication.</p>
    </div>

  </div>
</section>
<!-- TESTIMONIALS -->
<section id="testimonials" class="testimonials">
  <div class="section-header">
    <h1><span>Testimonials</span></h1><br>
    <p>What people say about me</p>
  </div>

  <div class="testimonial-container">
    <!-- Testimonial 1 -->
    <div class="testimonial-card">
      <img src="TestiImg/male24.jpg" alt="Client 1">
      <h3>John Doe</h3>
      <span>Project Manager</span>
      <p>"Himasha delivered the project on time with outstanding quality. His skills in web development and database management are impressive."</p>
    </div>

    <!-- Testimonial 2 -->
    <div class="testimonial-card">
      <img src="TestiImg/f6 - Copy.jpg" alt="Client 2">
      <h3>Jane Smith</h3>
      <span>Team Lead</span>
      <p>"Very professional and reliable. Himasha's ability to understand requirements and implement solutions is excellent."</p>
    </div>

    <!-- Testimonial 3 -->
    <div class="testimonial-card">
      <img src="TestiImg/male4.jpg" alt="Client 3">
      <h3>Michael Brown</h3>
      <span>Client</span>
      <p>"Himasha is creative, detail-oriented, and easy to work with. I highly recommend him for any IT projects."</p>
    </div>
  </div>
</section>


 <!-- CONTACT -->
<section id="contact">
  <h1><span>Contact</span> Me</h1>
  <form method="POST" action="send_message.php">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
  </form>
</section><br><br>
<!-- FOOTER -->
<footer>
  &copy; <?php echo date("Y"); ?> <?php echo $profile['name']; ?> | All Rights Reserved
</footer>

<script>
  // Typing effect
const roles = <?php echo json_encode(explode(",", $profile['roles'])); ?>;
let i = 0, j = 0, current = "", isDeleting = false;
const typingEl = document.getElementById("typing");

function typeEffect() {
  if (i < roles.length) {
    if (!isDeleting && j <= roles[i].length) {
      current = roles[i].substring(0, j++);
      typingEl.textContent = current;
      setTimeout(typeEffect, 120);
    } else if (isDeleting && j >= 0) {
      current = roles[i].substring(0, j--);
      typingEl.textContent = current;
      setTimeout(typeEffect, 60);
    } else {
      isDeleting = !isDeleting;
      if (!isDeleting) i++;
      if (i === roles.length) i = 0; // Restart properly
      setTimeout(typeEffect, 800);
    }
  }
}
typeEffect();
const skillBars = document.querySelectorAll('.skill-bar div');

window.addEventListener('scroll', () => {
  const triggerBottom = window.innerHeight * 0.9;

  skillBars.forEach(bar => {
    const barTop = bar.getBoundingClientRect().top;
    if(barTop < triggerBottom){
      const width = bar.getAttribute('style').match(/\d+%/)[0];
      bar.style.width = width;
    }
  });
});
</script>
</body>
</html>