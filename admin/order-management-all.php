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
  <title>Order Management</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/order-management-all.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>

<body>
  <?php
  include_once './components/headers/top-header.php';
  include_once './components/headers/navbar.php';
  ?>
  <main>
    <div class="button-container">
      <button id="updateButton" onclick="window.location.href='order-management.php'">Update orders</button>
      <button id="exportButton">Export Data</button>
    </div>
    <h1>All orders list</h1>

    <div id="errorOutput" style="color: red"></div>

    <!-- Containers for categorized orders -->
    <div id="pendingOrders" class="category-container">
      <h2>Pending Orders</h2>
      <div class="grid-container">
        <div class="order-container">
          <p><strong>S.No. :</strong> ${index || ""}</p>
            <p><strong>Order ID:</strong> ${row[0] || ""}</p>
            <p><strong>Product Name:</strong> ${row[1] || ""}</p>
            <p><strong>Product Prices:</strong> ${row[2] || ""}</p>
            <p><strong>Order Date and Time:</strong> ${row[3] || ""}</p>
            <p><strong>Payment Method:</strong> ${row[4] || ""}</p>
            <p><strong>Payment Status:</strong> ${row[5] || ""}</p>
            <p><strong>Shipping Status:</strong> ${row[6] || ""}</p>
            <p><strong>Tracking Number:</strong> ${row[7] || ""}</p>
            <p><strong>Discount Applied:</strong> ${row[8] || ""}</p>
            <p><strong>Tax Amount:</strong> ${row[9] || ""}</p>
        </div>
      </div>
    </div>
    <div id="acceptedOrders" class="category-container">
      <h2>Accepted Orders</h2>
      <div class="grid-container">
        <div class="order-container">
          <p><strong>S.No. :</strong> ${index || ""}</p>
            <p><strong>Order ID:</strong> ${row[0] || ""}</p>
            <p><strong>Product Name:</strong> ${row[1] || ""}</p>
            <p><strong>Product Prices:</strong> ${row[2] || ""}</p>
            <p><strong>Order Date and Time:</strong> ${row[3] || ""}</p>
            <p><strong>Payment Method:</strong> ${row[4] || ""}</p>
            <p><strong>Payment Status:</strong> ${row[5] || ""}</p>
            <p><strong>Shipping Status:</strong> ${row[6] || ""}</p>
            <p><strong>Tracking Number:</strong> ${row[7] || ""}</p>
            <p><strong>Discount Applied:</strong> ${row[8] || ""}</p>
            <p><strong>Tax Amount:</strong> ${row[9] || ""}</p>
        </div>
      </div>
    </div>
    <div id="transitOrders" class="category-container">
      <h2>Transit Orders</h2>
      <div class="grid-container">
        <div class="order-container">
          <p><strong>S.No. :</strong> ${index || ""}</p>
            <p><strong>Order ID:</strong> ${row[0] || ""}</p>
            <p><strong>Product Name:</strong> ${row[1] || ""}</p>
            <p><strong>Product Prices:</strong> ${row[2] || ""}</p>
            <p><strong>Order Date and Time:</strong> ${row[3] || ""}</p>
            <p><strong>Payment Method:</strong> ${row[4] || ""}</p>
            <p><strong>Payment Status:</strong> ${row[5] || ""}</p>
            <p><strong>Shipping Status:</strong> ${row[6] || ""}</p>
            <p><strong>Tracking Number:</strong> ${row[7] || ""}</p>
            <p><strong>Discount Applied:</strong> ${row[8] || ""}</p>
            <p><strong>Tax Amount:</strong> ${row[9] || ""}</p>
        </div>
      </div>
    </div>
    <div id="shippedOrders" class="category-container">
      <h2>Shipped Orders</h2>
      <div class="grid-container">
        <div class="order-container">
          <p><strong>S.No. :</strong> ${index || ""}</p>
            <p><strong>Order ID:</strong> ${row[0] || ""}</p>
            <p><strong>Product Name:</strong> ${row[1] || ""}</p>
            <p><strong>Product Prices:</strong> ${row[2] || ""}</p>
            <p><strong>Order Date and Time:</strong> ${row[3] || ""}</p>
            <p><strong>Payment Method:</strong> ${row[4] || ""}</p>
            <p><strong>Payment Status:</strong> ${row[5] || ""}</p>
            <p><strong>Shipping Status:</strong> ${row[6] || ""}</p>
            <p><strong>Tracking Number:</strong> ${row[7] || ""}</p>
            <p><strong>Discount Applied:</strong> ${row[8] || ""}</p>
            <p><strong>Tax Amount:</strong> ${row[9] || ""}</p>
        </div>
      </div>
    </div>
    <div id="deliveredOrders" class="category-container">
      <h2>Delivered Orders</h2>
      <div class="grid-container">
        <div class="order-container">
          <p><strong>S.No. :</strong> ${index || ""}</p>
            <p><strong>Order ID:</strong> ${row[0] || ""}</p>
            <p><strong>Product Name:</strong> ${row[1] || ""}</p>
            <p><strong>Product Prices:</strong> ${row[2] || ""}</p>
            <p><strong>Order Date and Time:</strong> ${row[3] || ""}</p>
            <p><strong>Payment Method:</strong> ${row[4] || ""}</p>
            <p><strong>Payment Status:</strong> ${row[5] || ""}</p>
            <p><strong>Shipping Status:</strong> ${row[6] || ""}</p>
            <p><strong>Tracking Number:</strong> ${row[7] || ""}</p>
            <p><strong>Discount Applied:</strong> ${row[8] || ""}</p>
            <p><strong>Tax Amount:</strong> ${row[9] || ""}</p>
        </div>
      </div>
    </div>
    <div id="cancelledOrders" class="category-container">
      <h2>Cancelled Orders</h2>
      <div class="grid-container">
        <div class="order-container">
          <p><strong>S.No. :</strong> ${index || ""}</p>
            <p><strong>Order ID:</strong> ${row[0] || ""}</p>
            <p><strong>Product Name:</strong> ${row[1] || ""}</p>
            <p><strong>Product Prices:</strong> ${row[2] || ""}</p>
            <p><strong>Order Date and Time:</strong> ${row[3] || ""}</p>
            <p><strong>Payment Method:</strong> ${row[4] || ""}</p>
            <p><strong>Payment Status:</strong> ${row[5] || ""}</p>
            <p><strong>Shipping Status:</strong> ${row[6] || ""}</p>
            <p><strong>Tracking Number:</strong> ${row[7] || ""}</p>
            <p><strong>Discount Applied:</strong> ${row[8] || ""}</p>
            <p><strong>Tax Amount:</strong> ${row[9] || ""}</p>
        </div>
      </div>
    </div>

  </main>
</body>

</html>