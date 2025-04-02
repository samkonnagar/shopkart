<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Management</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/order-management.css" />
</head>


<body>
  <?php
  include_once './components/headers/top-header.php';
  include_once './components/headers/navbar.php';
  ?>
  <main>
    <div class="button-container">
      <button
        id="allButton"
        onclick="location.href='./order-management-all.php'">
        All orders
      </button>
    </div>

    <!-- Orders Table -->
    <div id="orders-container">
      <h1>Running Orders</h1>
      <table id="orders-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Details</th>
            <th>Product Prices</th>
            <th>Order Date and Time</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>Tracking Number</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>${orderId}</td>
            <td>${orderDetails}</td>
            <td>${productPrices}</td>
            <td>${orderDateTime}</td>
            <td>${paymentMethod}</td>
            <td>${paymentStatus}</td>
            <td>
              <select class="status-dropdown">
                <option value="Pending">Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Shipped">Shipped</option>
                <option value="Transit">Transit</option>
                <option value="Delivered">Delivered</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </td>
            <td><input type="text" class="tracking-input" value="d7siad6dgad762" /></td>
            <td><button class="update-btn">Update</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Delivered Orders Table -->
    <div id="delivered-orders-container">
      <h1>Delivered Orders</h1>
      <table id="delivered-orders-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Details</th>
            <th>Product Prices</th>
            <th>Order Date and Time</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Tracking Number</th>
          </tr>
        </thead>
        <tbody>
          <!-- Delivered orders will be dynamically inserted here -->
        </tbody>
      </table>
    </div>

    <!-- Cancelled Orders Table -->
    <div id="cancelled-orders-container">
      <h1>Cancelled Orders</h1>
      <table id="cancelled-orders-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Details</th>
            <th>Product Prices</th>
            <th>Order Date and Time</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Tracking Number</th>
          </tr>
        </thead>
        <tbody>
          <!-- Cancelled orders will be dynamically inserted here -->
        </tbody>
      </table>
    </div>
  </main>
</body>

</html>