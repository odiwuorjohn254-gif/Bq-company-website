<?php
require_once "database.php";
$company = $conn->query("SELECT * FROM company LIMIT 1")->fetch_assoc();
$services = $conn->query("SELECT * FROM services ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($company["name"]) ?> | Tax, Audit & Advisory</title>
<meta name="description" content="Professional Tax, Audit and Advisory services by BQ Company Limited in Parklands, Nairobi.">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="#home">BQ <span>Company Limited</span></a>
    <button class="menu-toggle" aria-label="Open navigation">☰</button>
    <nav class="nav">
      <a href="#home">Home</a><a href="#about">About</a><a href="#services">Services</a><a href="#contact">Contact</a>
      <a class="nav-cta" href="admin/login.php">Admin</a>
    </nav>
  </div>
</header>

<main>
<section id="home" class="hero">
  <div class="container hero-grid">
    <div>
      <p class="eyebrow">TAX • AUDIT • ADVISORY</p>
      <h1>Practical financial guidance for better business decisions.</h1>
      <p class="hero-text">Professional and reliable Tax, Audit and Advisory services for businesses and organizations.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="#contact">Talk to us</a>
        <a class="btn btn-outline" href="#services">Our services</a>
      </div>
    </div>
    <div class="hero-card">
      <span>Professional business support</span>
      <strong>Tax. Audit. Advisory.</strong>
      <p><?= htmlspecialchars($company["location"]) ?></p>
    </div>
  </div>
</section>

<section id="about" class="section">
  <div class="container two-col">
    <div><p class="eyebrow">ABOUT BQ</p><h2>Helping organizations make confident decisions.</h2></div>
    <div>
      <p><?= nl2br(htmlspecialchars($company["description"])) ?></p>
      <p>Our approach focuses on practical solutions, clear communication and dependable professional support.</p>
    </div>
  </div>
</section>

<section id="services" class="section section-light">
  <div class="container">
    <div class="section-heading">
      <p class="eyebrow">WHAT WE DO</p><h2>Our professional services</h2>
      <p>Services designed to help organizations remain compliant, understand their numbers and plan ahead.</p>
    </div>
    <div class="cards">
      <?php while ($service = $services->fetch_assoc()): ?>
      <article class="card">
        <div class="icon"><?= strtoupper(substr($service["service_name"], 0, 1)) ?></div>
        <h3><?= htmlspecialchars($service["service_name"]) ?></h3>
        <p><?= htmlspecialchars($service["description"]) ?></p>
      </article>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container stats">
    <div><strong>3</strong><span>Core services</span></div>
    <div><strong>Professional</strong><span>Business support</span></div>
    <div><strong>Nairobi</strong><span>Parklands location</span></div>
  </div>
</section>

<section id="contact" class="section contact-section">
  <div class="container contact-grid">
    <div>
      <p class="eyebrow">CONTACT</p><h2>Let's discuss your business needs.</h2>
      <p>Reach BQ Company Limited for Tax, Audit and Advisory enquiries.</p>
    </div>
    <div class="contact-card">
      <p><strong>Location</strong><br><?= htmlspecialchars($company["location"]) ?></p>
      <p><strong>Phone</strong><br><a href="tel:<?= htmlspecialchars($company["phone"]) ?>"><?= htmlspecialchars($company["phone"]) ?></a></p>
      <a class="btn btn-primary full" href="https://wa.me/254794045525" target="_blank" rel="noopener">WhatsApp us</a>
    </div>
  </div>
</section>
</main>

<footer class="footer">
  <div class="container footer-wrap">
    <span>© <?= date("Y") ?> <?= htmlspecialchars($company["name"]) ?></span>
    <span>Tax • Audit • Advisory</span>
  </div>
</footer>
<script src="script.js"></script>
</body>
</html>