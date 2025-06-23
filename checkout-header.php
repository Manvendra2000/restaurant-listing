<?php 
include 'config/index.php';
if (isset($_GET['place']) && !isset($_COOKIE['door-dash-place']) ) {
   $place = $_GET['place'];
   setcookie('door-dash-place', $place, time() + (86400 * 30), "/");
}

session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];   
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Secure Checkout | Dunzo café – Safe & Fast Online Food Ordering </title>
<meta name = "description" content =" Complete your Dunzo café order with confidence. Our secure checkout ensures encrypted payments and hassle-free transactions. Trusted by food lovers across India—better, safer, and faster."> 
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="icon" href="<?php echo BASE_URL.'/images/favicon.png'; ?>" type="image/x-icon">
<link href="css/style.css" rel="stylesheet" />
<!-- Libraries Javascript -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

<!-- Libraries Stylesheet -->    
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/checkout.css" rel="stylesheet">

</head>
<script>
      var baseUrl = "<?php  echo BASE_URL ?>"
      var cart = <?php echo json_encode($cart); ?>;
</script>
<body>
<div class="container-fluid bg-white p-0">
      <?php include 'top-strip.php'; ?>
<header id="header" class="header d-flex align-items-center bg-white  border-bottom py-3">
<div class="container-fluid position-relative d-flex align-items-center justify-content-start">

      <a href="<?php echo  BASE_URL ?>" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="Text-sc-1nm69d8-0 duigup"><i class="bi bi-arrow-left"></i> Back to Store</span>
      </a>

<nav id="navmenu" class="navmen-u d-flex align-items-center justify-content-between">
      <a class="navbar-brand" href="<?php echo  BASE_URL ?>">                   
      <img class="" src="<?php echo BASE_URL.'/images/web-logo.png'; ?>" alt="Jio Reliance Logo" style="width: 125px; margin-right: -20px;margin-left: 50vw;"/>    
</a>    
</nav>


</div>
</header>
<div id="loader" class="d-none justify-content-center align-items-center" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); z-index: 9999;">
	<div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
		<span class="visually-hidden">Loading...</span>
	</div>
</div>
<div id="cart-alert-container" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 90%;">
  	<div id="signupMessage" class="alert d-none" role="alert"></div>
        <div id="cart-alert" class="alert d-none" role="alert"></div>
</div>
  