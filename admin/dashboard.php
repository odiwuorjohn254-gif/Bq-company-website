<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../database.php';

// Handle company info update
if (isset($_POST['update_company'])) {
    $stmt = $pdo->prepare("UPDATE company SET name=?, tagline=?, description=?, email=?, phone=?, address=? WHERE id=1");
    $stmt->execute([$_POST['name'], $_POST['tagline'], $_POST['description'], $_POST['email'], $_POST['phone'], $_POST['address']]);
}

// Handle add service
if (isset($_POST['add_service'])) {
    $stmt = $pdo->prepare("INSERT INTO services (title, description) VALUES (?, ?)");
    $stmt->execute([$_POST['title'], $_POST['description']]);
}

// Handle delete service
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM services WHERE id=?");
    $stmt->execute([$_GET['delete']]);
}

$company = $pdo->query("SELECT * FROM company WHERE id=1")->fetch();
$services = $pdo->query("SELECT * FROM services")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard – BQ Company</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<nav class="navbar">
  <div class="nav-brand">BQ Admin</div>
  <a href="logout.php" class="nav-logout">Logout</a>
</nav>
<div class="dashboard">
  <h2>Edit Company Info</h2>
  <form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($company['name']) ?>" placeholder="Company Name" required>
    <input type="text" name="tagline" value="<?= htmlspecialchars($company['tagline']) ?>" placeholder="Tagline">
    <textarea name="description" placeholder="Description"><?= htmlspecialchars($company['description']) ?></textarea>
    <input type="email" name="email" value="<?= htmlspecialchars($company['email']) ?>" placeholder="Email">
    <input type="text" name="phone" value="<?= htmlspecialchars($company['phone']) ?>" placeholder="Phone">
    <input type="text" name="address" value="<?= htmlspecialchars($company['address']) ?>" placeholder="Address">
    <button type="submit" name="update_company">Update Company</button>
  </form>

  <h2>Add Service</h2>
  <form method="POST">
    <input type="text" name="title" placeholder="Service Title" required>
    <textarea name="description" placeholder="Service Description"></textarea>
    <button type="submit" name="add_service">Add Service</button>
  </form>

  <h2>Current Services</h2>
  <?php foreach ($services as $s): ?>
  <div class="service-item">
    <strong><?= htmlspecialchars($s['title']) ?></strong>
    <p><?= htmlspecialchars($s['description']) ?></p>
    <a href="?delete=<?= $s['id'] ?>" onclick="return confirm('Delete this service?')">Delete</a>
  </div>
  <?php endforeach; ?>
</div>
</body>
</html>
