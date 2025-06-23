<?php 
include 'config/index.php';
if (isset($_GET['place']) && !isset($_COOKIE['door-dash-place'])) {
   $place = $_GET['place'];
   setcookie('door-dash-place', $place, time() + (86400 * 30), "/");
}

session_start();
if (strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'ADMIN') {
        header("Location: " . BASE_URL);
        exit;
    }
}
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];   


?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Dunzo café</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="icon" href="<?PHP echo BASE_URL.'/images/favicon.png';?>" type="image/x-icon">

<!-- Libraries Javascript -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

<!-- Libraries Stylesheet -->    
<link href="<?php echo  BASE_URL.'/css/bootstrap.min.css'?>" rel="stylesheet">
<link href="<?php echo  BASE_URL.'/css/style.css'?>" rel="stylesheet">

<!-- Preconnecting stuff -->   
<link rel="preconnect" href="https://res.cloudinary.com">
<link rel="preconnect" href="https://media-assets.swiggy.com">
</head>
<script>
      var baseUrl = "<?php  echo BASE_URL ?>"
      var currentLocation = "<?php  echo isset($_GET['place']) ? urldecode($_GET['place']): (isset($_COOKIE['door-dash-place']) ?  $_COOKIE['door-dash-place'] : '') ?>"
      var cart = <?php echo json_encode($cart); ?>;
   </script>

   <script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".address-search-input");

    if (searchInput) {
      searchInput.addEventListener("input", function () {
        if (this.value.length > 100) {
          this.value = this.value.slice(0, 100); // Trim to 100 characters
        }
      });
    }
  });
</script>
<script>
	function openDialog() {
  document.getElementById('cartDialog').classList.remove('hidden');
}</script>

<body id="restuant">
<div class="container-fluid bg-white p-0">

<?php include 'top-strip.php'; ?>
<header data-testid="Header" class="cUNlxH d-md-none">
	<div class="bzAKfa">
		<div class="gbAjIQ">
			<!-- <div class="bXkLEz">
				<div class="WcJQY">
					<button class="iPUGzV" type="button" onclick="openNav()">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="#f44322" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="styles__StyledInlineSvg-sc-12l8vvi-0 iIiQzo fetched-icon"><path fill-rule="evenodd" clip-rule="evenodd" d="M4 8C3.45 8 3 7.55 3 7C3 6.45 3.45 6 4 6H20C20.55 6 21 6.45 21 7C21 7.55 20.55 8 20 8H4ZM4 13H20C20.55 13 21 12.55 21 12C21 11.45 20.55 11 20 11H4C3.45 11 3 11.45 3 12C3 12.55 3.45 13 4 13ZM4 18H20C20.55 18 21 17.55 21 17C21 16.45 20.55 16 20 16H4C3.45 16 3 16.45 3 17C3 17.55 3.45 18 4 18Z" fill="currentColor"></path></svg>
					</button>
				</div>
				<button kind="BUTTON/PLAIN" aria-label="Search stores, dishes, products" class="styles__ButtonRoot-sc-1ldytso-0 cvFqUQ" type="button"><a href="<?php echo BASE_URL ?>"><svg aria-hidden="true" width="32" height="18" viewBox="0 0 99.5 56.5" fill="#f44322"><path d="M95.64,13.38A25.24,25.24,0,0,0,73.27,0H2.43A2.44,2.44,0,0,0,.72,4.16L16.15,19.68a7.26,7.26,0,0,0,5.15,2.14H71.24a6.44,6.44,0,1,1,.13,12.88H36.94a2.44,2.44,0,0,0-1.72,4.16L50.66,54.39a7.25,7.25,0,0,0,5.15,2.14H71.38c20.26,0,35.58-21.66,24.26-43.16"></path></svg>
				</a>
				</button>
				<div data-testid="HomeLogo">
					<a href="<?php echo BASE_URL ?>" class="sc-db8c6f48-0 egXQHq" data-accessibility-id="header-homepage-link" aria-label="DoorDash Home Page"><div class="InlineChildren__StyledInlineChildren-sc-6r2tfo-0 jiFBoj">
					<svg aria-hidden="true" width="120" height="18" viewBox="0 0 361.1 42" fill="red"><path d="M8.62,8.66V33.38h6.32A12.21,12.21,0,0,0,27,21,12,12,0,0,0,14.94,8.66ZM14.94.91C26.72.91,35.63,9.81,35.63,21S26.72,41.14,14.94,41.14H1a1,1,0,0,1-1-1V1.95a1,1,0,0,1,1-1Z"></path><path d="M66,34.24A13.22,13.22,0,1,0,52.82,21,13.24,13.24,0,0,0,66,34.24M66,0C78.4,0,87.88,9.53,87.88,21S78.4,42,66,42,44.2,32.52,44.2,21,53.68,0,66,0"></path><path d="M118,34.24A13.22,13.22,0,1,0,104.75,21,13.24,13.24,0,0,0,118,34.24M118,0c12.36,0,21.84,9.48,21.84,21S130.32,42,118,42,96.12,32.52,96.12,21,105.6,0,118,0"></path><path d="M168.75,8.66h-8.91V19.3h8.91a5.22,5.22,0,0,0,5.46-5.17,5.28,5.28,0,0,0-5.46-5.46M151.22,1.95a1,1,0,0,1,1-1H169c8,0,13.79,5.86,13.79,13.22a13,13,0,0,1-7.18,11.78l7.74,13.68a1,1,0,0,1-.91,1.56h-6.79a1,1,0,0,1-.91-.54l-7.46-13.54h-7.47v13a1,1,0,0,1-1,1h-6.54a1,1,0,0,1-1-1Z"></path><path d="M205.26,8.85V33.57h6.32a12.21,12.21,0,0,0,12.07-12.36A12,12,0,0,0,211.58,8.85Zm6.32-7.76c11.78,0,20.69,8.91,20.69,20.12s-8.91,20.12-20.69,20.12h-13.9a1,1,0,0,1-1-1V2.14a1,1,0,0,1,1-1Z"></path><path d="M258.56,10.92l-4.89,13.22h9.77Zm-7.76,20.69-3.2,8.8a1,1,0,0,1-1,.69h-6.94a1,1,0,0,1-1-1.42l15-38.15a1,1,0,0,1,1-.66h7.77a1,1,0,0,1,1,.66l15,38.15a1,1,0,0,1-1,1.42h-6.94a1,1,0,0,1-1-.69l-3.2-8.8Z"></path><path d="M286.48,11.78C286.48,5.46,291.94,0,300.56,0a17.84,17.84,0,0,1,12.51,4.71,1,1,0,0,1,0,1.47L309.22,10a1,1,0,0,1-1.42,0,10.12,10.12,0,0,0-6.67-2.63c-3.45,0-6,2-6,4.31,0,7.47,20.38,3.16,20.38,17.53C315.5,36.49,310,42,300.27,42a20.41,20.41,0,0,1-14.54-5.84,1,1,0,0,1,0-1.47l3.72-3.72a1,1,0,0,1,1.45,0,12.85,12.85,0,0,0,8.79,3.58c4.31,0,7.15-2.3,7.15-5.18,0-7.47-20.37-3.16-20.37-17.53"></path><path d="M352.47,1.9V17H335.22V1.9a1,1,0,0,0-1-1h-6.54a1,1,0,0,0-1,1V40.05a1,1,0,0,0,1,1h6.54a1,1,0,0,0,1-1V24.71h17.24V40.05a1,1,0,0,0,1,1H360a1,1,0,0,0,1-1V1.9a1,1,0,0,0-1-1h-6.54A1,1,0,0,0,352.47,1.9Z"></path></svg>

					</div>
					</a>
				</div>
			</div> -->
			<a href="<?php echo  BASE_URL ?>" ><img class="" src="../images/web-logo.png" alt="Jio Reliance Logo" style="width: 125px; margin-right: -20px;"/>    </a>

		<div class="bBMLPX gUgQbU">
			<!-- <a class="eVspjz" href="#">
				<span class="SUFDc jONJUs">
					<span class="bKlOJC">
						<span class="kXCksQ">
							<span class="jfCVbo">Login</span>
						</span>
					</span>
				</span>
			</a>
			<a class="juMwhg" href="#">
				<span class="SUFDc jONJUs">
					<span class="bKlOJC">
						<span class="kXCksQ">
							<span class="itAsYp">Open App</span>
						</span>
					</span>
				</span>
			</a> -->
			<div class="nav-link d-flex">
		   <?php  if (!isset($_SESSION['user_id'])): ?>
				<button class="eVspjz jfCVbo SUFDc jONJUs itAsYp" type="button" id="HomePageSignInBoxOpenButton">Sign in</button>
				<button class="eVspjz jfCVbo SUFDc jONJUs itAsYp unique-color" type="button" id="HomePageSignUpBoxOpenButton">Sign Up</button>
			<?php else:  ?>	
				<button class="eVspjz jfCVbo SUFDc jONJUs itAsYp" type="button" id="logout">Logout</button>
			<?php endif; ?>	
		  </div>
		</div>
		</div>
<div class="bdHLIo"><hr class="WECHv _uplix"></div>
	<div class="gbAjLy">
		<div class="hWpMqj">
			<div class="ePJSkU">
				<button  class="kPALqG" type="button">
					<span class="jONJUs">
						<span class="bKlOJC">
							<span class="kXCksQ">
								<span class="duSLDd">
									<div class="kMfDET">
										<div class="jjYftL">
										<span class="bhEuhh unique-trimmed-text "><?php  echo isset($_COOKIE['door-dash-place']) ?  urldecode($_COOKIE['door-dash-place']) : '' ?></span>
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="iIiQzo fetched-icon" data-testid="AddressTextButtonChevronIcon"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.29289 5.79289C3.68342 5.40237 4.31658 5.40237 4.70711 5.79289L8 9.08579L11.2929 5.79289C11.6834 5.40237 12.3166 5.40237 12.7071 5.79289C13.0976 6.18342 13.0976 6.81658 12.7071 7.20711L8.70711 11.2071C8.51957 11.3946 8.26522 11.5 8 11.5C7.73479 11.5 7.48043 11.3946 7.29289 11.2071L3.29289 7.20711C2.90237 6.81658 2.90237 6.18342 3.29289 5.79289Z" fill="currentColor"></path>
											</svg>
										</div>
									</div>
								</span>
							</span>
						</span>
					</span>
				</button>
			</div>
		</div>
<div class="eRuPEE d-none">
	<!-- <button class="juMwhg" type="button" aria-hidden="false" onclick="OpenCartPopup()"> -->
	<button class="juMwhg" type="button" aria-hidden="false" onclick="openDialog();">
		<span class="SUFDc jONJUs">
			<span class="bKlOJC">
				<span class="kMnvDH">
					<span class="hJzGat">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="styles__StyledInlineSvg-sc-12l8vvi-0 iIiQzo fetched-icon"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.29308 2.00051C1.52334 2.00051 1.64438 2.00109 1.73175 2.00729L1.74007 2.00791L1.74295 2.01574C1.77291 2.09804 1.80672 2.21427 1.86998 2.43567L3.4407 7.93322L2.67819 9.71243C2.1126 11.0321 3.08063 12.5002 4.51642 12.5002H12.4996C13.0519 12.5002 13.4996 12.0525 13.4996 11.5002C13.4996 10.9479 13.0519 10.5002 12.4996 10.5002L4.51642 10.5002L5.15926 9.00028H11.225L11.3139 9.00054C11.6342 9.00193 12.0361 9.00367 12.4 8.8592C12.7139 8.73463 12.991 8.53264 13.2057 8.27204C13.4547 7.96981 13.5762 7.58677 13.673 7.28139L13.6999 7.19666L14.2908 5.36026C14.3943 5.03849 14.4915 4.73655 14.5493 4.48041C14.6104 4.20932 14.6587 3.86671 14.5635 3.49916C14.4362 3.00749 14.1266 2.58267 13.6976 2.3109C13.3768 2.10775 13.0359 2.04874 12.7591 2.0239C12.4976 2.00043 12.1804 2.00046 11.8424 2.00049L3.82561 2.00049L3.79296 1.88624L3.76796 1.79773C3.67862 1.47969 3.56662 1.08099 3.31814 0.764783C3.10398 0.492272 2.82269 0.280091 2.50183 0.149045C2.12953 -0.0030142 1.71539 -0.00117188 1.38505 0.000297811L1.29308 0.000574368H0.999969C0.447702 0.000574368 0 0.448276 0 1.00054C0 1.55281 0.447702 2.00051 0.999969 2.00051H1.29308Z" fill="#ffffff"></path><path d="M5.99982 14.7501C5.99982 15.4404 5.44019 16.0001 4.74986 16.0001C4.05952 16.0001 3.49989 15.4404 3.49989 14.7501C3.49989 14.0598 4.05952 13.5001 4.74986 13.5001C5.44019 13.5001 5.99982 14.0598 5.99982 14.7501Z" fill="#ffffff"></path><path d="M11.2497 16.0001C11.94 16.0001 12.4996 15.4404 12.4996 14.7501C12.4996 14.0598 11.94 13.5001 11.2497 13.5001C10.5593 13.5001 9.99969 14.0598 9.99969 14.7501C9.99969 15.4404 10.5593 16.0001 11.2497 16.0001Z" fill="#fffffff"></path>
						</svg>
					</span>
				</span>
			<span class="kXCksQ">
				<span class="Text-sc-1nm69d8-0 itAsYp">
					<div data-testid="OrderCartIconButtonBadge">0</div>
				</span>
			</span>
			</span>
	</span>
	</button>
</div>
</div>
<div class="bdHLIo"><hr class="WECHv"></div>
</div>
</header>


<header class="d-none d-lg-block d-md-block">
  <!-- Sidebar -->



  <!-- Sidebar -->

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg bg-white  border-bottom shadow-none">
    <!-- Container wrapper -->
  

      <!-- Brand -->
	  <span class="Medium-lga WcJQY" style="font-size:30px;cursor:pointer;" onclick="openNav()"><i class="bi bi-list"></i></span>
      <a class="navbar-brand" href="<?php  echo BASE_URL; ?>">
             
<!--                    
					<div class="px-1 gKinpO"><svg aria-hidden="true" width="30" height="30" viewBox="0 0 99.5 56.5" fill="red"><path d="M95.64,13.38A25.24,25.24,0,0,0,73.27,0H2.43A2.44,2.44,0,0,0,.72,4.16L16.15,19.68a7.26,7.26,0,0,0,5.15,2.14H71.24a6.44,6.44,0,1,1,.13,12.88H36.94a2.44,2.44,0,0,0-1.72,4.16L50.66,54.39a7.25,7.25,0,0,0,5.15,2.14H71.38c20.26,0,35.58-21.66,24.26-43.16"></path></svg><div class="styles__LogoTextContainer-sc-uv595k-0 ciWLJB"><svg aria-hidden="true" width="120" height="18" viewBox="0 0 361.1 42" fill="red"><path d="M8.62,8.66V33.38h6.32A12.21,12.21,0,0,0,27,21,12,12,0,0,0,14.94,8.66ZM14.94.91C26.72.91,35.63,9.81,35.63,21S26.72,41.14,14.94,41.14H1a1,1,0,0,1-1-1V1.95a1,1,0,0,1,1-1Z"></path><path d="M66,34.24A13.22,13.22,0,1,0,52.82,21,13.24,13.24,0,0,0,66,34.24M66,0C78.4,0,87.88,9.53,87.88,21S78.4,42,66,42,44.2,32.52,44.2,21,53.68,0,66,0"></path><path d="M118,34.24A13.22,13.22,0,1,0,104.75,21,13.24,13.24,0,0,0,118,34.24M118,0c12.36,0,21.84,9.48,21.84,21S130.32,42,118,42,96.12,32.52,96.12,21,105.6,0,118,0"></path><path d="M168.75,8.66h-8.91V19.3h8.91a5.22,5.22,0,0,0,5.46-5.17,5.28,5.28,0,0,0-5.46-5.46M151.22,1.95a1,1,0,0,1,1-1H169c8,0,13.79,5.86,13.79,13.22a13,13,0,0,1-7.18,11.78l7.74,13.68a1,1,0,0,1-.91,1.56h-6.79a1,1,0,0,1-.91-.54l-7.46-13.54h-7.47v13a1,1,0,0,1-1,1h-6.54a1,1,0,0,1-1-1Z"></path><path d="M205.26,8.85V33.57h6.32a12.21,12.21,0,0,0,12.07-12.36A12,12,0,0,0,211.58,8.85Zm6.32-7.76c11.78,0,20.69,8.91,20.69,20.12s-8.91,20.12-20.69,20.12h-13.9a1,1,0,0,1-1-1V2.14a1,1,0,0,1,1-1Z"></path><path d="M258.56,10.92l-4.89,13.22h9.77Zm-7.76,20.69-3.2,8.8a1,1,0,0,1-1,.69h-6.94a1,1,0,0,1-1-1.42l15-38.15a1,1,0,0,1,1-.66h7.77a1,1,0,0,1,1,.66l15,38.15a1,1,0,0,1-1,1.42h-6.94a1,1,0,0,1-1-.69l-3.2-8.8Z"></path><path d="M286.48,11.78C286.48,5.46,291.94,0,300.56,0a17.84,17.84,0,0,1,12.51,4.71,1,1,0,0,1,0,1.47L309.22,10a1,1,0,0,1-1.42,0,10.12,10.12,0,0,0-6.67-2.63c-3.45,0-6,2-6,4.31,0,7.47,20.38,3.16,20.38,17.53C315.5,36.49,310,42,300.27,42a20.41,20.41,0,0,1-14.54-5.84,1,1,0,0,1,0-1.47l3.72-3.72a1,1,0,0,1,1.45,0,12.85,12.85,0,0,0,8.79,3.58c4.31,0,7.15-2.3,7.15-5.18,0-7.47-20.37-3.16-20.37-17.53"></path><path d="M352.47,1.9V17H335.22V1.9a1,1,0,0,0-1-1h-6.54a1,1,0,0,0-1,1V40.05a1,1,0,0,0,1,1h6.54a1,1,0,0,0,1-1V24.71h17.24V40.05a1,1,0,0,0,1,1H360a1,1,0,0,0,1-1V1.9a1,1,0,0,0-1-1h-6.54A1,1,0,0,0,352.47,1.9Z"></path></svg></div></div> -->
					<img class="" src="../images/web-logo.png" alt="Jio Reliance Logo" style="width: 125px; margin-right: -20px;"/>                
      </a>
      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-aut-o my-auto eqOEeN Medium nav-search" action="<?php echo BASE_URL?>/restaurants">
	  <div class="eqOEeN hKAWWp fgcOrU">
	  <span class="input-grou-p-text borde-r-0"><i class="fas fa-search"></i></span>
        <input autocomplete="off" type="search" class="form-contro-l dropdown-toggle not-index rounde-d fgcOrU address-search-input" id="dropdownMenuButton1"
        data-bs-toggle="dropdown" placeholder='Search' style="min-width: 225px;"
        />
        <ul
                          class="dropdown-menu w-100 autocomplete"
                          aria-labelledby="dropdownMenuButton1"
                        >
                        </ul>
		</div>
        
      </form>

      <!-- Right links -->
      <ul class="navbar-nav list-inline ms-auto d-flex flex-row bKlOJC">
        <!-- Notification dropdown -->
        <li>
 	<div class="dropdown dkqyOZ SUFDc d-flex"><i class="bi bi-geo-alt-fill"></i>
	 <button class="dropbtn dkqyOZ dropdown-toggle unique-trimmed-text" style="pointer-events: none;" disabled=""><?php  echo isset($_COOKIE['door-dash-place']) ?  urldecode($_COOKIE['door-dash-place']) : '' ?></button>
	 <!-- <i class="bi bi-chevron-down"></i> -->
		<div class="dropdown-menu position-absolute" aria-labelledby="dropdownMenuButton1">
			<hr class="bDCnEQ">
		<div>
	</div>			
</div>
			</div>
					   
        </li>

        <!-- Icon -->
        <li class="nav-item"> 
		 <div class="hwQNHH text-center">
				<div class="bhxwrx d-flex">
					<button size="12" type="button" aria-checked="true" role="radio" class="gnesjP" id="DeliveryButton">
						<span class="bkeugU">
						<div class="euIzuW dHJRsI">Delivery</div>
						</span>
					</button>
					<button type="button" class="jjTFHX" id="PickupButton"><span class="bkeugU">
						<div class="euIzuW dHJRsI">Pickup</div>
						</span>
					</button>
				</div>
			</div>
        </li>
        <!-- Icon -->
        <li class="nav-item me-3 me-lg-0">          
            <div class="nav-link" style="display:inline-flex">
			<!-- <button class="juMwhg" type="button" aria-hidden="false" onclick="OpenCartPopup();"> -->
			<button class="juMwhg" type="button" aria-hidden="false" onclick="openDialog();">
			<span class="SUFDc jONJUs">
			<span class="bKlOJC"><i class="bi bi-cart3"></i>
			<span class="kXCksQ">
			<span class="itAsYp cart-count"><div><?php echo !empty($cart) ? count($cart) : 0  ?></div>
			</span></span></span></span></button></div>          
        </li>
        <li class="nav-item me-3 me-lg-0">


			<!-- desktop signup and signin -->
			<div class="nav-link d-flex">
			<?php  if (!isset($_SESSION['user_id'])): ?>
					<button class="eVspjz jfCVbo SUFDc jONJUs itAsYp" type="button" id="HomePageSignInBoxOpenButton" onclick="document.getElementById('HomePageSignInBoxOpenButton')?.click();">Sign in</button>
					<button class="eVspjz jfCVbo SUFDc jONJUs itAsYp unique-color" type="button" id="HomePageSignUpBoxOpenButton" onclick="document.getElementById('HomePageSignUpBoxOpenButton')?.click();">Sign Up</button>


				<?php else:  ?>	
					<button class="eVspjz jfCVbo SUFDc jONJUs itAsYp" type="button" id="logout">Logout</button>
				<?php endif; ?>	
			</div>
			</li>
		</ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>

<div id="loader" class="d-none justify-content-center align-items-center" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); z-index: 9999;">
	<div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
		<span class="visually-hidden">Loading...</span>
	</div>
</div>
<div id="cart-alert-container" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 90%;">
  	<div id="cart-alert" class="alert d-none" role="alert"></div>
</div>

<script>

var breakpoint = {

// Small screen / phone

sm: 576,

// Medium screen / tablet

md: 768,

// Large screen / desktop

lg: 992,

// Extra large screen / wide desktop

xl: 1200

};





$('#foodmenu').slick({

  autoplay: false,

  autoplaySpeed: 1000,

  pauseOnFocus: false,

  draggable: false,

  infinite: false,

  dots: false,

  arrows: false,

  speed: 1000,

  mobileFirst: true,

  slidesToShow: 5,

  slidesToScroll: 5,

  responsive: [{

	  breakpoint: breakpoint.sm,

	  settings: {

		slidesToShow: 8,

		slidesToScroll: 8,

		arrows: false

	  }

	},

	{

	  breakpoint: breakpoint.md,

	  settings: {

		slidesToShow: 10,

		slidesToScroll: 10,

		arrows: false

	  }

	},

	{

	  breakpoint: breakpoint.lg,

	  settings: {

		slidesToShow: 10,

		slidesToScroll: 10,

		arrows: false

	  }

	},

	{

	  breakpoint: breakpoint.xl,

	  settings: {

		slidesToShow: 15,

		slidesToScroll: 15,

		arrows: false

	  }

	}

  ]

});



$("#DeliveryButton").click(function(){

  $("#DeliveryButton").css("background-color", "black");

  $("#PickupButton").css("background-color", "rgb(231, 231, 231)");

  $("#PickupButton").css("color", "black");

   $("#DeliveryButton").css("color", "white");

});

$("#PickupButton").click(function(){

  $("#DeliveryButton").css("background-color", "rgb(231, 231, 231)");

  $("#PickupButton").css("background-color", "black");

  $("#PickupButton").css("color", "white");

  $("#DeliveryButton").css("color", "black");

});



$("#HomePageSignUpBoxOpenButton").click(function(){

   $("#HomePageSignUpBoxBox").show();

   $("#SingupBox").show();

   $("#SocialLiginBox").hide();

   $("#OpenSignUpBox").css("background-color", "black");

   $("#OpenSignUpBox").css("color", "white");

   $("#OpenSignInBox").css("background-color", "rgb(231, 231, 231)");

   $("#OpenSignInBox").css("color", "black");

  

});

$("#HomePageSignUpBoxCloseButton").click(function(){

   $("#HomePageSignUpBoxBox").hide();

   $("#SingnIn").show();

  

});



$("#HomePageSignInBoxOpenButton").click(function(){

  $("#HomePageSignUpBoxBox").show();

  

});

$("#HomePageSignInBoxCloseButton").click(function(){

  $("#HomePageSignUpBoxBox").hide();

  

});



$("#OpenSignInBox").click(function(){

  $("#SocialLiginBox").show();

  $("#SingupBox").hide();

  $("#OpenSignInBox").css("background-color", "black");

  $("#OpenSignUpBox").css("background-color", "rgb(231, 231, 231)");

  $("#OpenSignUpBox").css("color", "black");

   $("#OpenSignInBox").css("color", "white");

});

$("#OpenSignUpBox").click(function(){

  $("#SingupBox").show();

  $("#SocialLiginBox").hide();

  $("#OpenSignInBox").css("background-color", "rgb(231, 231, 231)");

  $("#OpenSignUpBox").css("background-color", "black");

  $("#OpenSignUpBox").css("color", "white");

  $("#OpenSignInBox").css("color", "black");

});
function showSignUpBoxDesktop() {
  if ($(window).width() >= 992) { // lg breakpoint (desktop)
    $('#HomePageSignUpBoxBox').show();
  }
}

</script>

