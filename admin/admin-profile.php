<?php
session_start();
require_once '../utils/auth.php';
require_once '../utils/message.php';

if(!authenticateAdmin()){
  setMessage('./', "error", "Not Authorized");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Profile</title>
  <link rel="stylesheet" href="./styles/admin-profile.css">
  <link rel="stylesheet" href="./styles/styles.css" />
  <!-- Link dashboard-specific styles -->
</head>

<body>
  <?php
  include_once './components/headers/top-header.php';
  include_once './components/headers/navbar.php';
  ?>
  <!-- Main Dashboard Content -->
  <h1>Admin Profile</h1>
  <main>
    <section class="profile-details">
      <div class="profile-photo-box" style="width: 150px; height: 150px;">
        <img src="./images/logo.png" alt="Profile Photo" class="profile-photo" id="profilePhoto" style="width: 100%; height: 100%; object-fit: cover;">
        <input type="file" id="photoInput" style="display: none;" accept="image/*" onchange="previewPhoto(event)">
        <button onclick="document.getElementById('photoInput').click()" style="background-color: #307974; color: white; padding: 4px 8px; border: none; border-radius: 5px; cursor: pointer; font-size: 12px; margin-top: 3px;">Change Photo</button>
      </div>
      <div class="profile-info">
        <h2>
          <span id="adminName">Saurabh Kumar</span> <span class="verified-badge">✔</span>
        </h2>
        <p id="adminRole">Admin</p>
        <div class="contact-details">
          <p><strong>Email:</strong> <span id="adminEmail">contact@gu-saurabh.tech</span></p>
          <p><strong>Phone:</strong> <span id="adminPhone">+91 9798024301</span></p>
        </div>
        <div class="address">
          <p><strong>Address:</strong> <span id="adminAddress">Sector 16, Noida, 201301, INDIA </span></p>
        </div>

      </div>
    </section>
    <section class="actions">
      <h2>Actions</h2>
      <button onclick="enableEdit()" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Edit Profile</button>
      <button onclick="saveProfile()" style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Save</button>
      <button onclick="window.location.href='logout.php'" style="background-color: #f44336; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
    </section>
    
  </main>
  <!-- Footer -->
  <?php include_once './components/others/footer.php' ?>
</body>

</html>