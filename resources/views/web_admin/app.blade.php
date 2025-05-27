<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard Admin</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
        }
        
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        
        .dashboard {
            background-color: #009688;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-icon {
            font-size: 24px;
            color: white;
        }
        
        .app-title {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        
        .app-title span:first-child {
            color: #e0f2f1;
        }
        
        .app-title span:last-child {
            color: #212121;
        }
        
        .welcome-card {
            background-color: #e0f2f1;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .welcome-title {
            font-size: 28px;
            font-weight: bold;
            color: #212121;
            margin-bottom: 5px;
        }
        
        .welcome-subtitle {
            font-size: 18px;
            color: #424242;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .stats-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .stats-title {
            font-size: 18px;
            font-weight: bold;
            color: #212121;
            margin-bottom: 15px;
        }
        
        .chart-container {
            width: 100%;
            height: 200px;
        }
        
        .donut-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }
        
        .legend {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            gap: 8px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        
        .legend-label {
            font-size: 14px;
            color: #424242;
        }
        
        /* Media query for responsive design */
        @media (max-width: 768px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
  
    <!-- Sidebar -->
    @include('web_admin.sidebar')
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
  
      <!-- Main Content -->
      <div id="content">
  
        <!-- Topbar -->
        @include('web_admin.navbar')
        <!-- End of Topbar -->
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
  
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>
  
          @yield('contents')
  
          <!-- Content Row -->
        
  
        </div>
        <!-- /.container-fluid -->
  
      </div>
      <!-- End of Main Content -->
  
      <!-- Footer -->
      @include('web_admin.footer')
      <!-- End of Footer -->
  
    </div>
    <!-- End of Content Wrapper -->
  
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>
  @yield('script')
</body>
</html>