<?php include 'config/index.php';

if (isset($_COOKIE['door-dash-place'])) {

  $place = $_COOKIE['door-dash-place'];

  header("Location: ".BASE_URL."/restaurants");

  exit;

}



?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name = "description" content =""> 
    <meta charset="utf-8" />

    <title>Dunzo café</title>
<meta name = "description" content =" Dunzo café – Order Your First Meal for Just 99! Discover Indias smartest food delivery app. Faster delivery, better prices, and unbeatable deals. "> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="icon" href="<?php echo BASE_URL.'images/favicon.png'; ?>" type="image/x-icon">
    <!-- Libraries Stylesheet -->

    <link

      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"

      rel="stylesheet"

    />

    <link

      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"

      rel="stylesheet"

    />

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link ref="icon" href="/images/favicon.png" type="image/x-icon">
    <link href="css/style.css" rel="stylesheet" />

  </head>

  <script>

    const baseUrl = "<?php  echo BASE_URL ?>";

  </script>

  <body>
    <?php include 'top-strip.php'; ?>
    <div class="_tyeid" id="clock"></div>

    <div class="container-fluid bg-white p-0">

      <!-- Navbar & Hero Start -->

      <div class="container-fluid position-relative p-0">

        <nav

          class="navbar navbar-expand-sm navbar-dark bg-dark px-4 px-lg-4 py-1 py-lg-1 hbOgli unique-logo"

        >
        <!-- Show on large screens -->
        <img class="_jjooii d-none d-lg-block" src="images/main-logo.gif" alt="Jio Reliance Logo"/>

        <!-- Show on small screens -->
        <img class="_jjooii d-block d-lg-none" src="images/m.main-logo.gif" alt="Jio Reliance Logo"/>


          <div class="collapse navbar-collapse" id="navbarCollapse" style="display: none !important;"> 
			<?php 
      

      if ($_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/index.php' &&  $_SERVER['REQUEST_URI'] != '/foodpro/') {  ?>
            <button

              class="btn btn-danger py-2 px-2 me-1 Sign-in"

              id="HomePageSignInBoxOpenButton"

            >

              Sign in

            </button>

            <button

              type="button"

              class="btn btn-light py-2 px-2 Sign-Up"

              id="HomePageSignUpBoxOpenButton"

            >

              Sign Up

            </button>
            <?php } ?>

          </div>

        </nav>

        <div class="container-fluid py-5 py-10 hero-header mb-5 kvHRyF">

          <div class="container  my-container">

            <div class="row g-5 align-items-center">
            <!-- left side with input -->
              <div class="col-12 col-lg-6 text-center text-lg-center p-1 bds-c-hero--side-by-side-homepage .bds-c-hero__content-container _xsddc">

                 <div class="eJrhjJ bg-transparent d-md-none">

                 </div>

                  <h4 class="display-6 animated slideInLeft py-2 _trsfg">
                    Get Your First Order @ Just 
                    <span style="font-size: 0.6em; vertical-align: bottom;">₹</span>99 + Free Delivery
                  </h4>


                    <form class="nav-search" action="<?php echo BASE_URL?>/restaurants/">

                          <div

                            class="bg-white p-3 location-form address-search-container rounded-1"

                          >

                              <div class="address-search-container">

                                <div class="did-floating-label-content">
                                  <!-- <ul id="autocomplete_search" class="dropdown-menu  autocomplete"></ul> -->

                                  <input

                                    class="did-floating-input dropdown-toggle address-search-input not-index"

                                    type="text"

                                    id="dropdownMenuButton1"

                                  

                                    aria-expanded="false"

                                  />
                                  <!-- warnining if no place selected -->
                                  <div id="address-error" style="color:red; font-size: 14px; margin-top: 4px; display:none;"></div>

                                  <label class="did-floating-label"

                                    >Enter delivery addreess</label

                                  >

                                  <ul id='autocomplete_search'

                                    class="dropdown-menu _mensd autocomplete hidden-important"

                                    aria-labelledby="dropdownMenuButton1"

                                  >

                                  </ul>

                                  <div class="bds-c-btn-cursor">

                                    <button
                                    disabled
                                      class="bds-c-btn locate-me"

                                      aria-label="Najděte mě"

                                      data-testid="locate-me-with-text"

                                    >

                                      <span class="bds-c-btn__idle-content">

                                        <span class="bds-c-btn__idle-content__prefix">

                                          <span>

                                            <svg

                                              aria-hidden="true"

                                              focusable="false"

                                              class="fl-none"

                                              width="24"

                                              height="24"

                                              viewBox="0 0 24 24"

                                              xmlns="http://www.w3.org/2000/svg"

                                              id="locate-me"

                                            >

                                              <path

                                                fill-rule="evenodd"

                                                clip-rule="evenodd"

                                                d="M12 2C12.4142 2 12.75 2.33579 12.75 2.75L12.7506 3.67925C12.7507 3.88008 12.8998 4.04968 13.0989 4.07562C13.1524 4.08259 13.1986 4.08909 13.2375 4.09514C16.6725 4.62856 19.3848 7.34731 19.9084 10.7855C19.9135 10.8188 19.9189 10.8575 19.9247 10.9019C19.9506 11.1011 20.1204 11.2502 20.3214 11.2502L21.25 11.25C21.6642 11.25 22 11.5858 22 12C22 12.4142 21.6642 12.75 21.25 12.75L20.3212 12.7506C20.1205 12.7507 19.951 12.8995 19.9249 13.0985C19.9211 13.1273 19.9175 13.1532 19.9141 13.1762C19.4013 16.6567 16.647 19.4078 13.1649 19.9158C13.145 19.9187 13.1228 19.9218 13.0984 19.925C12.8995 19.9511 12.7507 20.1206 12.7506 20.3213L12.75 21.25C12.75 21.6642 12.4142 22 12 22C11.5858 22 11.25 21.6642 11.25 21.25L11.2502 20.3213C11.2502 20.1203 11.1011 19.9505 10.9018 19.9246C10.8535 19.9183 10.8115 19.9124 10.7758 19.9069C7.33814 19.379 4.62167 16.6629 4.09327 13.2254C4.08776 13.1896 4.08184 13.1474 4.07552 13.0989C4.04958 12.8997 3.87997 12.7507 3.67912 12.7506L2.75 12.75C2.33579 12.75 2 12.4142 2 12C2 11.5858 2.33579 11.25 2.75 11.25L3.67818 11.2502C3.87895 11.2502 4.04865 11.1015 4.07487 10.9024C4.07777 10.8805 4.08053 10.8604 4.08317 10.8422C4.58738 7.36412 7.32923 4.61075 10.8016 4.08916C10.8307 4.08479 10.8642 4.08013 10.902 4.07519C11.1012 4.04909 11.2502 3.87936 11.2502 3.67848L11.25 2.75C11.25 2.33579 11.5858 2 12 2ZM12 5.5C8.41015 5.5 5.5 8.41015 5.5 12C5.5 15.5899 8.41015 18.5 12 18.5C15.5899 18.5 18.5 15.5899 18.5 12C18.5 8.41015 15.5899 5.5 12 5.5ZM12 8C14.2091 8 16 9.79086 16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8ZM12 9.5C10.6193 9.5 9.5 10.6193 9.5 12C9.5 13.3807 10.6193 14.5 12 14.5C13.3807 14.5 14.5 13.3807 14.5 12C14.5 10.6193 13.3807 9.5 12 9.5Z"

                                              ></path>

                                            </svg>

                                          </span>

                                        </span>

                                        <span class="bds-c-btn__idle-content__label"

                                          ><span></span>

                                        </span>

                                      </span>

                                    </button>

                                  </div>

                                </div>

                              </div>

                              <div

                                class="bds-c-btn-cursor bds-c-btn-cursor--layout-full-width-primary"
                                style="height: 48px;"
                              >
                    
                                <button

                                  type="button"

                                  class="bds-c-btn"

                                  data-testid="homepage_cta"
                                  id="findFoodBtn" 
                                >

                                  <span class="bds-c-btn__idle-content">

                                    <span class="bds-c-btn__idle-content__label"

                                      ><span>Find Food</span></span

                                    ></span

                                  >

                                </button>

                              </div>



                          </div>

                  </form>

              </div>
              <!-- right side with image -->
              <div class="col-12 col-lg-6 _gogox"><img class="img-fluid mt-3 mt-lg-0" style="width: 100%; aspect-ratio: 1/1; animation: none !important; "  src="images/home-screen-img.webp"/></div>

            </div>

          </div>

        </div>

      </div>

      <div class="container-xxl py-md-4 ">

        <div class="container">

          <div class="row g-4">

            <div

              class="col-lg-4 col-sm-6 wow fadeInUp"

              data-wow-delay="0.3s"

              style="

                visibility: visible;

                animation-delay: 0.3s;

                animation-name: fadeInUp;

              "

            >

              <div class="rounded text-center">

                <div class="hbOgli">

                  <div class="iRARhj"><img src="https://ik.imagekit.io/foodpro/scotter.jpg" /></div>

                  <div class="sc-380d932a-4iRARhj">

                    <h2>Free Delivery</h2>

                    <p class="h7">

                    Enjoy fast and free delivery on all orders within a 10 km radius! Get your favorite meals delivered hot and fresh to your doorstepquick, easy, and at no extra cost.

                    </p>

                    <!-- <a

                      href=""

                      class="py-sm-1 px-sm-2 me-3 text-danger h7 fw-bold"

                      >Start earning

                      <i class="bi bi-arrow-right-short text-danger"></i

                    ></a> -->

                  </div>

                </div>

              </div>

            </div>

            <div

              class="col-lg-4 col-sm-6 wow fadeInUp"

              data-wow-delay="0.5s"

              style="

                visibility: visible;

                animation-delay: 0.5s;

                animation-name: fadeInUp;

              "

            >

              <div class="rounded text-center">

                <div class="hbOgli">

                  <div class="iRARhj"><img src="https://ik.imagekit.io/foodpro/jiostore.png" /></div>

                  <div class="sc-380d932a-4iRARhj">

                    <h2>24/7 Better Food</h2>

                    <p class="h7">

                    We’re operational 24/7the one and only. Order anytime on Dunzo café with no surcharges or hidden fees. Great food, delivered round the clock!

                    </p>
<!-- 
                    <a

                      href=""

                      class="py-sm-1 px-sm-2 me-3 text-danger h7 fw-bold"

                      >Sign up for DoorDash

                      <i class="bi bi-arrow-right-short text-danger"></i

                    ></a> -->

                  </div>

                </div>

              </div>

            </div>

            <div

              class="col-lg-4 col-sm-6 wow fadeInUp"

              data-wow-delay="0.7s"

              style="

                visibility: visible;

                animation-delay: 0.7s;

                animation-name: fadeInUp;

              "

            >

              <div class="rounded text-center">

                <div class="hbOgli">

                  <div class="iRARhj">

                    <img src="https://ik.imagekit.io/foodpro/jioph.png" style="height: 154px" />

                  </div>

                  <div class="sc-380d932a-4iRARhj">

                    <h2>Exclusive Launch Offer</h2>

                    <p class="h7">

                    New user offer! Order anything worth up to 500 and pay just 99 — with free delivery. Available exclusively on Dunzo café during our launch. Don’t miss out!

                    </p>

                    <!-- <a

                      href=""

                      class="py-sm-1 px-sm-2 me-3 text-danger h7 fw-bold"

                      >Get the App<i

                        class="bi bi-arrow-right-short text-danger"

                      ></i

                    ></a> -->

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- Service End -->

      <div class="container-xxl py-5 d-sm-block d-none">

        <div class="container">

          <!-- <div class="row g-5 align-items-center">

            <div class="col-lg-6">

              <h2 class="zPRXj">

                Get grocery and convenience store essentials

              </h2>

              <p class="epLkPb mb-5">

                Attract new customers and grow sales, starting with 0%

                commissions for up to 30 days.

              </p>

              <div class="containera mt-3">

                <div id="slick">

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/new.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">New Delhi</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/luck.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Lucknow</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/mum.jpg" class="w-100 img-fluid" />

                    <h3 class="mt-2">Mumbai</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/che.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Chenni</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/kol.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Kolkatta</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/ahd.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Ahmedabad</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/ben.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Bengaluru</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/hyd.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Hyderabad</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/agra.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Agra</h3>

                  </div>

                  <div class="slide">

                    <img src="https://ik.imagekit.io/foodpro/vara.png" class="w-100 img-fluid" />

                    <h3 class="mt-2">Varansi</h3>

                  </div>

                   

                </div>

              </div>

            </div>

            <div class="col-lg-6">

              <div class="text-end">

                <a

                  href=""

                  class="py-sm-2 px-sm-3 me-3 text-light h7 fw-bold btn btn-dange-r"

                  >Sign up for DoorDash

                  <i class="bi bi-arrow-right-short text-light fa-lg"></i

                ></a>

              </div>

              <img class="img-fluid" src="https://ik.imagekit.io/foodpro/map.png" />

            </div>

          </div> -->

        </div>

      </div>

      <div class="container-xxl py-5">

        <h2 class="text-center mb-4">Get more from your neighborhood</h2>

        <div class="container">

          <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item">

              <a

                class="nav-link active"

                id="home-tab"

                data-toggle="tab"

                href="#topcity"

                role="tab"

                aria-controls="home"

                aria-selected="true"

                >Top Cities</a

              >

            </li>

            <li class="nav-item">

              <a

                class="nav-link"

                id="home-tab"

                data-toggle="tab"

                href="#topcuis"

                role="tab"

                aria-controls="menu1"

                aria-selected="true"

                >Top Cuisines</a

              >

            </li>

            <li class="nav-item">

              <a

                class="nav-link"

                id="profile-tab"

                data-toggle="tab"

                href="#topchain"

                role="tab"

                aria-controls="menu2"

                aria-selected="false"

                >Top Chains</a

              >

            </li>

          </ul>

          <div class="tab-content list-inline-tabs">

            <div id="topcity" class="tab-pane fade show active">

              <div class="row g-5 align-items-center">

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">
                  
                    <li>Bangalore</li>

                    <li>Gurgaon</li>

                    <li>Hyderabad</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                    <li>Delhi</li>

                    <li>Mumbai</li>

                    <li>Pune</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                 <li> Kolkata</li>
                  <li>Chennai</li>
                 <li> Ahmedabad</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                  <li>Chandigarh</li>
                <li> Jaipur</li>
                <li>  Kochi</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                 <li> Coimbatore</li>
                 <li> Lucknow</li>
                 <li> Nagpur</li>

                  </ul>

                </div>

              </div>

            </div>

            <div id="topcuis" class="tab-pane fade">

              <div class="row g-5 align-items-center">

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                    <li>Pizza</li>

                    <li>Lunch</li>

                    <li>Asian Food</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                    <li>Chinese Food</li>

                    <li>Seafood</li>

                    <li>Italian Food</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                    <li>Sushi</li>

                    <li>Indian Food</li>

                    <li>Vegan Food</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                    <li>Cafe</li>

                    <li>Dessert</li>

                    <li>Sandwiches</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                    <li>Thai Food</li>

                    <li>Burgers</li>

                    <li>Restaurants</li>

                  </ul>

                </div>

              </div>

            </div>

            <div id="topchain" class="tab-pane fade">

              <div class="row g-5 align-items-center">

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                  <li>  Domino’s Pizza</li>
                   <li> McDonald’s</li>
                  <li>  KFC</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                <li>  Pizza Hut </li>
                 <li> Subway</li>
                <li>  Burger King</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">


                <li>  Haldirams </li>
                 <li> Barbeque Nation</li>
                <li> Wow! Momo</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                 <li> Biryani By Kilo</li>
                 <li> Behrouz Biryani</li>
                 <li> Taco Bell</li>

                  </ul>

                </div>

                <div class="col-lg-2 col-sm-22">

                  <ul class="list-inline">

                <li> Starbucks </li>
                 <li> Café Coffee Day</li>
                 <li> Faasos</li>

                  </ul>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="clearfix"></div>


      <!--Signup Popup start-->

      <div id="HomePageSignUpBoxBox" class="modal py-3">

        <div class="modal-content">

          <div class="modal-body">

            <div class="enSmuu mw-100 top-0">

              <div class="fNfKau">

                <div class="ewPfBk">

                  <div class="kCunvx">

                    <div class="gQdxjz">

                      <div class="kCunvx">

                        <div class="sgQdxjz">

                          <div class="jiFBoj efDMaw">

                            <div class="ithEdY">

                              <button

                                id="HomePageSignUpBoxCloseButton"

                                class="iPUGzV"

                                type="button"

                              >

                                <i class="bi bi-x display-7"></i>

                              </button>

                            </div>

                          </div>

                          <div class="diIYyC"></div>

                        </div>

                      </div>

                      <div class="diIYyC"></div>

                    </div>

                    <div class="flAYFi">

                      <div class="cWZKtF">

                        <h2

                          style="margin: 0px"

                          class="Text-sc-1nm69d8-0 kBERSR"

                        >

                          <span

                            id="modalContent-:r1f:-Title"

                            tabindex="-1"

                            data-prism-modal-initial-focus=""

                            class="Text-sc-1nm69d8-0 DefaultContentHeader__TitleText-sc-1rvapps-0 kBERSR iYENNn"

                            ><span>Sign in or Sign up</span></span

                          >

                        </h2>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="guCsRs p-0 border-0">

                  <div class="sc-dkmUuB GkQVY">

                    <div></div>

                    <div class="cgRxSi">

                      <div><i class="bi bi-stars"></i></div>

                      <div class="cQCjJJ">

                        <span display="block" class="cecQcO"

                          >Sign in to access your credits and discounts</span

                        >

                      </div>

                    </div>

                    <div></div>

                  </div>

                  <div class="kHLhcx border-0">

                    <div

                      style="flex-direction: column"

                      class="bchDmh container d-flex align-items-center justify-content-center p-0"

                    >

                      <div class="boeace card">

                        <div class="hwQNHH text-center mb-0">

                          <div class="bhxwrx">

                            <button

                              size="12"

                              type="button"

                              aria-checked="true"

                              role="radio"

                              class="gnesjP"

                              id="OpenSignInBox"

                              style="background-color: black; color: white"

                            >

                              <span class="bkeugU">

                                <div class="euIzuW dHJRsI">Sign In</div>

                              </span>

                            </button>

                            <button

                              type="button"

                              class="jjTFHX"

                              id="OpenSignUpBox"

                              style="

                                background-color: rgb(231, 231, 231);

                                color: black;

                              "

                            >

                              <span class="bkeugU">

                                <div class="euIzuW dHJRsI">Sign Up</div>

                              </span>

                            </button>

                          </div>

                        </div>

                        <div class="cntkeZ card-body" id="SingnIn">

                          <div class="dhQxsk" id="SocialLiginBox" style="">

                            <div class="cPlEQo">

                              <div class="sc-fhzFiK gYqMHn">

                                <button size="16" class="fZHuuT">

                                  <span class="biShts">

                                    <img

                                      class="img-fluid icon-img"

                                      src="images/google.png"

                                    />

                                    <div style="margin-left: 8px">

                                      Continue with Google

                                    </div>

                                  </span>

                                </button>

                              </div>

                              <div class="sc-jxOSlx jluwHR">

                                <button size="16" class="fZHuuT">

                                  <span class="biShts">

                                    <img

                                      class="img-fluid icon-img"

                                      src="images/fb.png"

                                    />

                                    <div style="margin-left: 8px">

                                      Continue with Facebook

                                    </div>

                                  </span>

                                </button>

                              </div>

                              <div class="sc-kdBSHD fJnxnw">

                                <button size="16" class="fZHuuT">

                                  <span class="biShts">

                                    <img

                                      class="img-fluid icon-img"

                                      src="images/apple.png"

                                    />

                                    <div style="margin-left: 8px">

                                      Continue with Apple

                                    </div>

                                  </span>

                                </button>

                              </div>

                              <div class="gjyTBR">

                                <div class="hjDKCk">

                                  <span class="ZcflS"

                                    >or continue with email</span

                                  >

                                </div>

                              </div>

                            </div>

                            <div class="WxsqL">

                              <div class="cQCjJB">

                                <div class="bYgTjp">

                                  <label class="bBNyru">Email</label>

                                </div>

                                <div class="bbvRuI">

                                  <div class="ctmHIP">

                                    <input

                                      type="email"

                                      placeholder="Required"

                                      class="idveBz"

                                      value="testaaaaar@gmail.com"

                                    />

                                  </div>

                                  <div class="cAcUHR">

                                    <button type="button" class="bpYhff">

                                      <i class="bi bi-x-circle-fill"></i>

                                    </button>

                                  </div>

                                </div>

                              </div>

                            </div>

                            <button type="button" class="RtaIn mt-5 mb-3">

                              <span class="ewsJyR">Continue to Sign In</span>

                            </button>

                            <div class="gjyTBR mb-0">

                              <span class="RoeUH"

                                >By tapping any Continue” button, you agree to

                                Dunzo café's Terms, including a waiver of your

                                jury trial right, and Privacy Policy. We may

                                text you a verification code. Msg &amp; data

                                rates apply.</span

                              >

                            </div>

                          </div>

                        </div>

                        <div

                          class="hssLkF"

                          style="display: none"

                          id="SingupBox"

                        >

                          <div class="dhQxsk">

                            <form>

                              <div

                                class="d-flex justify-content-between"

                                style="

                                  display: flex;

                                  justify-content: space-between;

                                "

                              >

                                <div class="dPoTCS d-block">

                                  <div class="WxsqL1">

                                    <div class="cQCjJB">

                                      <div class="bYgTjp">

                                        <label class="bBNyru">First Name</label>

                                      </div>

                                      <div class="gXQELC">

                                        <div class="kQdeaU gJBGMT">

                                          <div class="ctgegP">

                                            <input

                                              type="text"

                                              autocomplete="given-name"

                                              class="idveBz"

                                              value=""

                                            />

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <div class="dPoTCS">

                                  <div class="WxsqL">

                                    <div class="cQCjJB">

                                      <div class="bYgTjp">

                                        <label class="bBNyru">Last Name</label>

                                      </div>

                                      <div class="gXQELC">

                                        <div class="kQdeaU gJBGMT">

                                          <div class="ctgegP">

                                            <input

                                              type="text"

                                              autocomplete="family-name"

                                              class="idveBz"

                                              value=""

                                            />

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                              <div class="gjyTBR">

                                <div class="WxsqL">

                                  <div class="cQCjJB">

                                    <div class="bYgTjp">

                                      <label class="bBNyru">Email</label>

                                    </div>

                                    <div class="gXQELC">

                                      <div class="kQdeaU gJBGMT">

                                        <div class="ctgegP">

                                          <input

                                            type="email"

                                            autocomplete="email"

                                            class="idveBz"

                                            value=""

                                          />

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                              <div class="gjyTBR">

                                <div class="cQCjJB">

                                  <div class="eBgFNd kQaPQO">

                                    <div class="WxsqL">

                                      <div class="cQCjJB">

                                        <div class="bYgTjp">

                                          <label class="bBNyru">Country</label>

                                        </div>

                                        <div class="gXQELC">

                                          <div class="kQdeaU gJBGMT">

                                            <div class="ctgegP">

                                              <div class="gbreNo">

                                                <select class="idveBz">

                                                  <option value="US">

                                                    +1 (US)

                                                  </option>

                                                  <option value="CA">

                                                    +1 (CA)

                                                  </option>

                                                  <option value="PR">

                                                    +1 (PR)

                                                  </option>

                                                  <option value="AU">

                                                    +61 (AU)

                                                  </option>

                                                  <option value="JP">

                                                    +81 (JP)

                                                  </option>

                                                  <option value="DE">

                                                    +49 (DE)

                                                  </option>

                                                  <option value="TR">

                                                    +90 (TR)

                                                  </option>

                                                  <option value="HR">

                                                    +385(HR)

                                                  </option>

                                                  <option value="IT">

                                                    +39 (IT)

                                                  </option>

                                                  <option value="GR">

                                                    +30 (GR)

                                                  </option>

                                                  <option value="RO">

                                                    +40 (RO)

                                                  </option>

                                                  <option value="NZ">

                                                    +64 (NZ)

                                                  </option>

                                                  <option value="SE">

                                                    +46 (SE)

                                                  </option>

                                                  <option value="IE">

                                                    +353 (IE)

                                                  </option>

                                                  <option value="PL">

                                                    +48 (PL)

                                                  </option>

                                                  <option value="SG">

                                                    +65 (SG)

                                                  </option>

                                                  <option value="RS">

                                                    +381 (RS)

                                                  </option>

                                                  <option value="FR">

                                                    +33 (FR)

                                                  </option>

                                                  <option value="AR">

                                                    +54 (AR)

                                                  </option>

                                                  <option value="ES">

                                                    +34 (ES)

                                                  </option>

                                                  <option value="IN">

                                                    +91 (IN)

                                                  </option>

                                                  <option value="FI">

                                                    +358 (FI)

                                                  </option>

                                                </select>

                                                <div class="hGZTXv">

                                                  <i

                                                    class="bi bi-chevron-down"

                                                  ></i>

                                                </div>

                                              </div>

                                            </div>

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                                    <div class="WxsqL">

                                      <div class="cQCjJB">

                                        <div class="bYgTjp">

                                          <label class="bBNyru"

                                            >Mobile Number</label

                                          >

                                        </div>

                                        <div class="gXQELC">

                                          <div class="kQdeaU gJBGMT">

                                            <div class="ctgegP">

                                              <input

                                                type="tel"

                                                autocomplete="tel"

                                                class="idveBz"

                                                value=""

                                              />

                                            </div>

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                              <div class="gjyTBR">

                                <div class="WxsqL">

                                  <div class="cQCjJB">

                                    <div class="bYgTjp">

                                      <label class="bBNyru">Password</label>

                                      <span class="gVphbR"

                                        ><span class="ZcflS"

                                          >At least 10 characters</span

                                        ></span

                                      >

                                    </div>

                                    <div class="gXQELC">

                                      <div class="kQdeaU gJBGMT">

                                        <div class="ctmHLr">

                                          <input

                                            type="password"

                                            autocomplete="new-password"

                                            id="FieldWrapper-7"

                                            aria-describedby="FieldWrapper-7-description"

                                            class="Input__InputContent-sc-1o75rg4-3 idveBz"

                                            value=""

                                          />

                                        </div>

                                        <div class="lcyKZs">

                                          <button type="button" class="cyoyor">

                                            <span

                                              class="styles__TextElement-sc-3qedjx-0 bBNyru"

                                              >Show</span

                                            >

                                          </button>

                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                              <div class="gjyTBR">

                                <br />

                                <span class="RoeUH"

                                  >By tapping Sign Up” or “Continue with...,

                                  you agree to Dunzo café's <a href="#">Terms</a>,

                                  including a waiver of your jury trial right,

                                  and

                                  <a href="#" target="_blank">Privacy Policy</a

                                  >. We may text you a verification code. Msg

                                  &amp; data rates apply.</span

                                >

                              </div>

                              <button type="submit" class="fZHuuT">

                                <span class="biShts">Sign Up</span>

                              </button>

                            </form>

                            <div class="cGCJLK">

                              <div class="gjyTBR">

                                <div class="hjDKCk">

                                  <span display="block" class="ZcflS">or</span>

                                </div>

                              </div>

                              <div class="sc-fhzFiK gYqMHn">

                                <button size="16" class="fZHuuT">

                                  <span class="biShts">

                                    <img

                                      class="img-fluid icon-img"

                                      src="images/google.png"

                                    />

                                    <div style="margin-left: 8px">

                                      Continue with Google

                                    </div>

                                  </span>

                                </button>

                              </div>

                              <div class="sc-jxOSlx jluwHR">

                                <button size="16" class="fZHuuT">

                                  <span class="biShts">

                                    <img

                                      class="img-fluid icon-img"

                                      src="images/fb.png"

                                    />

                                    <div style="margin-left: 8px">

                                      Continue with Facebook

                                    </div>

                                  </span>

                                </button>

                              </div>

                              <div class="sc-kdBSHD fJnxnw">

                                <button size="16" class="fZHuuT">

                                  <span class="biShts">

                                    <img

                                      class="img-fluid icon-img"

                                      src="images/apple.png"

                                    />

                                    <div style="margin-left: 8px">

                                      Continue with Apple

                                    </div>

                                  </span>

                                </button>

                              </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <!--Signup Popup end-->

      <!-- Footer starts -->
    <?php include 'footer.php'; ?>
    <!-- footer ends -->
    </div>

    <!-- JavaScript Libraries -->

    <script src="js/jquery-3.4.1.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/wow.min.js"></script>

    <script src="js/slick.min.js"></script>

	<script src="js/api.js"></script>

	<script src="js/autocomplete.js"></script>

    <script>

      // $(window).scroll(function () {

      //   if ($(this).scrollTop() > 45) {

      //     $(".navbar").addClass("sticky-top shadow-sm");

      //   } else {

      //     $(".navbar").removeClass("sticky-top shadow-sm");

      //   }

      // });



      var breakpoint = {

        // Small screen / phone

        sm: 576,

        // Medium screen / tablet

        md: 768,

        // Large screen / desktop

        lg: 992,

        // Extra large screen / wide desktop

        xl: 1200,

      };



      // slick slider

      $("#slick").slick({

        autoplay: true,

        autoplaySpeed: 2000,

        pauseOnFocus: false,

        draggable: true,

        infinite: true,

        dots: false,

        arrows: false,

        speed: 1000,

        mobileFirst: true,

        slidesToShow: 3,

        slidesToScroll: 3,

        responsive: [

          {

            breakpoint: breakpoint.sm,

            settings: {

              slidesToShow: 4,

              slidesToScroll: 4,

              arrows: true,

            },

          },

          {

            breakpoint: breakpoint.md,

            settings: {

              slidesToShow: 5,

              slidesToScroll: 5,

              arrows: true,

            },

          },

          {

            breakpoint: breakpoint.lg,

            settings: {

              slidesToShow: 4,

              slidesToScroll: 4,

              arrows: true,

            },

          },

          {

            breakpoint: breakpoint.xl,

            settings: {

              slidesToShow: 4,

              slidesToScroll: 4,

              arrows: true,

            },

          },

        ],

      });



      $(document).ready(function () {

        $(".nav-tabs a").click(function () {

          $(this).tab("show");

        });

      });



      $("#HomePageSignUpBoxOpenButton").click(function () {

        $("#HomePageSignUpBoxBox").show();

        $("#SingupBox").show();

        $("#SocialLiginBox").hide();

        $("#OpenSignUpBox").css("background-color", "black");

        $("#OpenSignUpBox").css("color", "white");

        $("#OpenSignInBox").css("background-color", "rgb(231, 231, 231)");

        $("#OpenSignInBox").css("color", "black");

      });

      $("#HomePageSignUpBoxCloseButton").click(function () {

        $("#HomePageSignUpBoxBox").hide();

        $("#SingnIn").show();

      });



      $("#HomePageSignInBoxOpenButton").click(function () {

        $("#HomePageSignUpBoxBox").show();

      });

      $("#HomePageSignInBoxCloseButton").click(function () {

        $("#HomePageSignUpBoxBox").hide();

      });



      $("#OpenSignInBox").click(function () {

        $("#SocialLiginBox").show();

        $("#SingupBox").hide();

        $("#OpenSignInBox").css("background-color", "black");

        $("#OpenSignUpBox").css("background-color", "rgb(231, 231, 231)");

        $("#OpenSignUpBox").css("color", "black");

        $("#OpenSignInBox").css("color", "white");

      });

      $("#OpenSignUpBox").click(function () {

        $("#SingupBox").show();

        $("#SocialLiginBox").hide();

        $("#OpenSignInBox").css("background-color", "rgb(231, 231, 231)");

        $("#OpenSignUpBox").css("background-color", "black");

        $("#OpenSignUpBox").css("color", "white");

        $("#OpenSignInBox").css("color", "black");

      });

    </script>

  </body>

</html>

