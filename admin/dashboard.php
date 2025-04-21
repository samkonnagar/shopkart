<?php
session_start();
require_once '../utils/auth.php';
require_once '../utils/message.php';
require_once '../config/connection.php';

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
    <link rel="stylesheet" href="./styles/dashboard.css" />
    <link rel="stylesheet" href="../assets/css/popup.css">
    <!-- Link dashboard-specific styles -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body>
    <?php 
    include_once '../utils/message.php';
    getMessage();
    include_once './components/headers/top-header.php';
    include_once './components/headers/navbar.php';
     ?>
   
    <!-- Main Dashboard Content -->
    <main>

      <?php
        $sql1 = "SELECT count(*) as total_category FROM category";
        $res1 = mysqli_query($conn,$sql1);

        $data1 = mysqli_fetch_assoc($res1);
      
      ?>
      <section class="dashboard-overview">
        <div class="overview-card" style="background-color: #e74c3c">
          <h3><?php echo $data1['total_category']; ?></h3>
          <p>Total Categories</p>
        </div>

        <?php
             $sql2 = "SELECT count(*) as total_product FROM products";
             $res2 = mysqli_query($conn,$sql2);
     
             $data2 = mysqli_fetch_assoc($res2);
        
        
        ?>
        <div class="overview-card" style="background-color: #f1c40f">
          <h3><?php echo $data2['total_product']; ?></h3>
          <p>Total Products</p>
        </div>
        <?php
             $sql3 = "SELECT count(*) as total_orders FROM orders";
             $res3 = mysqli_query($conn,$sql3);
     
             $data3 = mysqli_fetch_assoc($res3);
        
        
        ?>

        <div class="overview-card" style="background-color: #2ecc71">
          <h3><?php echo $data3['total_orders']; ?></h3>
          <p>Total Orders</p>
        </div>
        <?php
             $sql4 = "SELECT count(*) as total_customer FROM users WHERE role = 'user'";
             $res4 = mysqli_query($conn,$sql4);
     
             $data4 = mysqli_fetch_assoc($res4);
        
        
        ?>

        <div class="overview-card" style="background-color: #3498db">
          <h3><?php echo $data4['total_customer']; ?></h3>
          <p>Total Customers</p>
        </div>
      </section>

      <!-- Dashboard Charts Section -->
      <section class="dashboard-charts">
        <div class="chart-container">
          <h3>User Statistics</h3>
          <canvas id="userStatisticsChart"></canvas>
        </div>
        <div class="chart-container">
          <h3>Sales Overview</h3>
          <canvas id="salesOverviewChart"></canvas>
        </div>
        <div class="chart-container">
          <h3>Sales Reports Charts</h3>
          <canvas id="salesReportsChart"></canvas>
        </div>
      </section>

      <!-- Traffic and Additional Data Section -->
      <section class="traffic-and-data">
        <div class="chart-container">
          <h3>System Preference</h3>
          <canvas id="trafficChart"></canvas>
        </div>
        <div class="chart-container">
          <h3>Traffic & Analytics</h3>
          <canvas id="analyticsChart"></canvas>
        </div>
        <div class="additional-data">
          <div class="customer">
            <h3>Customer Satisfaction</h3>
            <p class="satisfaction-score">93.13%</p>
            <p>Previous: 79.82 | % Change: +14.29</p>
          </div>
          <div class="browser">
            <h3>Browser Stats</h3>
            <ul>
              <li style="color: red">Google Chrome: 65%</li>
              <li style="color: blue">Internet Explorer: 10%</li>
              <li style="color: orange">Mozilla Firefox: 15%</li>
              <li style="color: green">Safari: 10%</li>
              <li style="color: purple">Opera Browser: 5%</li>
            </ul>
          </div>
        </div>
      </section>
      <button
        id="downloadAllReports"
        style="margin: 20px; padding: 10px 20px; background-color: #a5006b; color: white; border: none; border-radius: 5px; cursor: pointer;"
        onclick="downloadPDF();"
      >
        Download All Reports
      </button>
      <script>
        function downloadPDF() {
          const link = document.createElement('a');
          link.href = './images/Reports Admin.pdf';
          link.download = 'Reports Admin.pdf';
          link.click();
        }
      </script>
    </main>

    <!-- Footer -->
    <?php include_once './components/others/footer.php' ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="./scripts/dashboard.js" defer></script>
    
  </body>
</html>
