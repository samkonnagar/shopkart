<?php
session_start();
require_once '../utils/auth.php';
require_once '../utils/message.php';

if(!authenticateAdmin()){
  setMessage('../', "error", "Not Authorized");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/customer-management.css" />
  <!-- Link dashboard-specific styles -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <?php
  include_once './components/headers/top-header.php';
  include_once './components/headers/navbar.php';
  ?>
  <!-- Main Dashboard Content -->
  <main>
    <div class="button-container">
      <button id="addCustomerButton">Add Customer</button>
      <button id="exportButton">Download Customers Data</button>
    </div>
    <h1>Customer Management</h1>

    <!-- Active Customers Section -->
    <div id="activeCustomers" class="category-container">
      <div class="grid-container">
        <div class="customer-container">
          <p><strong>ID:</strong> ${row[0] || ""}</p>
          <p><strong>Name:</strong> ${row[1] || ""}</p>
          <p><strong>Email:</strong> ${row[2] || ""}</p>
          <p><strong>Phone:</strong> ${row[3] || ""}</p>
          <div class="button-container">
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
          </div>
        </div>
      </div>
    </div>

  </main>
</body>

</html>