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
    <link rel="stylesheet" href="./styles/dashboard.css" />
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
      <section class="dashboard-overview">
        <div class="overview-card" style="background-color: #e74c3c">
          <h3>12,141</h3>
          <p>Visits</p>
        </div>
        <div class="overview-card" style="background-color: #f1c40f">
          <h3>96.41%</h3>
          <p>Bounce Rate</p>
        </div>
        <div class="overview-card" style="background-color: #2ecc71">
          <h3>74,876</h3>
          <p>Pageviews</p>
        </div>
        <div class="overview-card" style="background-color: #3498db">
          <h3>76.43%</h3>
          <p>Growth Rate</p>
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
