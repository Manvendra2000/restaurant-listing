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

			<a href="<?php echo  BASE_URL ?>" ><img class="" src="<?php echo BASE_URL.'/images/web-logo.png';?>" alt="Jio Reliance Logo" style="width: 125px; margin-right: -20px;"/>    </a>

		<div class="bBMLPX gUgQbU">		
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
             

					<img class="" src="<?php echo BASE_URL.'/images/web-logo.png';?>" alt="Jio Reliance Logo" style="width: 125px; margin-right: -20px;"/>                
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

