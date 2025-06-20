<?php 
include 'header.php';
?>
<main style="margin-top: 64px;">
   <div class="container-fluid pt-1">
      <section class="fiSfaG jiFBoj mt-2">
         <div class="dyodcX"><a href="#" class="cxjiTB"><span class="cmGkJP">Home</span></a></div>
         <span class="fAxWqx">/</span>
         <div class="dyodcX"><a href="<?php echo BASE_URL.'/list.php?place='.$_GET['place'] ?>" class="cxjiTB"><span class="cmGkJP">Restaurants</span></a></div>
         <span class="fAxWqx">/</span>
         <div class="dyodcX"><a href="#" class="cxjiTB" id="restaurant-breadcrumb"><span class="cmGkJP"></span></a></div>
      </section>
      <section class="dPeNGN px-1">
         <div class="kgVpKV">
            <img id="restaurant-image" class="isHrde" alt="" src="images/banner.jpg" />
         </div>
         <!-- <div class="container hqIPIp">
            <div class="cfQlyQ"><img alt="" src="images/dragon.jpg" /></div>
         </div> -->
      </section>
      <!-- Search and  Mobile view -->
      <div class="row align-items-center mt-3 mb-3 hlISu">
         <div class="col-12 col-md-auto order-md-1 d-flex align-items-center justify-content-center mb-4 mb-md-0">
            <form class="d-none d-md-flex input-group w-aut-o my-auto eqOEeN">
               <div class="eqOEeN hKAWWp fgcOrU">
               <span class="input-grou-p-text borde-r-0"><i class="fas fa-search"></i></span>
                  <input autocomplete="off" type="search" class="form-contro-l rounde-d fgcOrU" style="min-width: 225px;" id="restaurant-search" placeholder="Search ">
               </div>        
            </form>           
         </div>
         <div class="col-12 col-md order-md-0 text-center text-md-start">
            <h4 id="restaurant-name"></h4>
            <!-- Responsive Category here -->
            <div id="foodmenuresponsiveslider" class="bg-white d-md-none p-2">
               
            </div>  
            <!-- Responsive Category here --> 
         </div>
      </div>
       <!-- Search and  Mobile view End -->
      <!--- StoreInfo --> 
      <div class="row">
         <div class="col-md-12 col-sm-12 col-lg-12 col-xl-3 d-none d-xl-block">
            <div>
               <div data-testid="storeInfo" class="cWZKtF d-none d-xl-block">
                  <!-- <span class="goVetq hmLdlr">Store Info</span> -->
                  <div class="fERnCr">
                     <img src="images/logo-icon.png" style="width: 24px;">		
                     <span id="restaurant-name-info"  class="gZNeeE"></span>
                  </div>
                  <div class="fRoQMe">
                     <div class="fERnCr">
                        <div class="hAoiGj">
                           <div class="fERnCr">
                              <i class="bi bi-clock"></i>		
                              <span id="restaurant-status" class="hliogJ">Closed</span>
                           </div>
                        </div>
                        <span class="ZNLaC ibQVHe">•</span>
                        <div class="sc-e2afe347-2 hAoiGj">
                           <span  id="restaurant-delivery-time"class="fRCMLg"></span>
                        </div>
                     </div>
                  </div>
                  <div class="fERnCr">
                     <div class="fERnCr">
                        <span data-testid="storeRatingInfo" id="restaurant-rating"  class="fRCMLg">0</span>
                        <i class="bi bi-star-fill"></i>		
                        <span id="restaurant-total-rating" class="fRCMLg">(0 ratings)</span>
                        <span class="ZNLaC gueDWR">•</span>
                     </div>
                     <span data-testid="storeInfoDistance" id="restaurant-distance" class="bHfLvF gDrhwn">1 mi</span>
                  </div>
               <div class="fERnCr">
                  <span class="fRCMLg">$$</span>
                  <span class="fRCMLg gueDWR">•</span>
                  <span class="fRCMLg eFbZEI" id="restaurant-cuisines"></span>
               </div>
               <div class="kbJqiC">
                  <div class="eXscct">		
                     <a class="ciJrlW" href="#">See More</a>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="kPUjuZ">
            <div class="CnEhr">
               <div class="VrKMr">
                  <span class="Text-sc-1nm69d8-0 fKlSdx">All Day Menu</span>
                  <div style="display:inline-flex">		
                     <i class="bi bi-chevron-down lcrvua"></i>
                  </div>
               </div>
               <span class="bHfLvF">11:15 am - 9:25 pm</span>
            </div>
            <div class="iKxKgI">
               <ul id="restaurant-categories" class="list-inline comIGV">	
               </ul>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-sm-12 col-lg-12 col-xl-9" id="restaurant-menu">
         <!-- menu listing -->
         <!-- menu listing end -->
      </div> 
      </div>
      </div>      
   </div>
      <!--- row StoreInfo End--> 
      </main>
      <!--Main layout-->
      <div class="clearfix"></div>
      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-light footer pt-0 mt-0 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
         <div class="container py-5 text-bottom-footer">
            <div class="row">
               <h6 class="section-title ff-secondary text-white fw-normal5 mb-2">Popular Categories</h6>
               <div class="col-lg-3 col-md-6">
                  <a href="#" class="btn btn-link">Alcohol Australia</a>
                  <a href="#" class="btn btn-link">Alcohol Delivery Australia</a>
                  <a href="#" class="btn btn-link">Back To School Delivery</a>
                  <a href="#" class="btn btn-link">Battle Of The Brands</a>
                  <a href="#" class="btn btn-link">Beauty Stores</a>
                  <a href="#" class="btn btn-link">Beauty Supply</a>
                  <a href="#" class="btn btn-link">Catering Near Me</a>
                  <a href="#" class="btn btn-link">Chips Ahoy Big Cookie</a>
               </div>
               <div class="col-lg-3 col-md-6">                        
                  <a href="#" class="btn btn-link">Convenience Stores Canada</a> 
                  <a href="#" class="btn btn-link">Dashmart Near Me</a> 
                  <a href="#" class="btn btn-link">Deck The Doorstep</a> 
                  <a href="#" class="btn btn-link">Diageo Holiday</a> 
                  <a href="#" class="btn btn-link">Drugstores Canada</a> 
                  <a href="#" class="btn btn-link">Flower Delivery</a> 
                  <a href="#" class="btn btn-link">Grocery Delivery Canada</a> 
                  <a href="#" class="btn btn-link">Haleon Well Within Reach</a> 
               </div>
               <div class="col-lg-3 col-md-6">                        
                  <a href="#" class="btn btn-link">Halloween</a>
                  <a href="#" class="btn btn-link">Holiday Hosting</a>
                  <a href="#" class="btn btn-link">Hsa Bank</a>
                  <a href="#" class="btn btn-link">Hsa Fsa Store</a>
                  <a href="#" class="btn btn-link">Large Group Orders</a>
                  <a href="#" class="btn btn-link">Local Eats Deserve Pepsi</a>
                  <a href="#" class="btn btn-link">Make It Date Night</a>
                  <a href="#" class="btn btn-link">Medicine Delivery</a>
               </div>
               <div class="col-lg-3 col-md-6">                        
                  <a href="#" class="btn btn-link">Mothers Day</a> 
                  <a href="#" class="btn btn-link">Pet Store Near Me</a> 
                  <a href="#" class="btn btn-link">Play For An Ultra</a> 
                  <a href="#" class="btn btn-link">Retail Stores Near Me</a> 
                  <a href="#" class="btn btn-link">Seasonal Holidays</a> 
                  <a href="#" class="btn btn-link">Snap Ebt</a> 
                  <a href="#" class="btn btn-link">Valentines Day</a> 
                  <a href="#" class="btn btn-link">Winter Holidays</a> 
               </div>
            </div>
            <div class="row mt-5">
               <div class="col-lg-2 col-md-6">
                  <h6 class="section-title ff-secondary text-white fw-normal5 mb-2">Get to Know Us</h6>
                  <a class="btn btn-link" href="">Careers</a>
                  <a class="btn btn-link" href="">Company Blog</a>
                  <a class="btn btn-link" href="">Engineering Blog</a>
                  <a class="btn btn-link" href="">Merchant Blog</a>
                  <a class="btn btn-link" href="">Gift Cards</a>
                  <a class="btn btn-link" href="">Package Pickup</a>
                  <a class="btn btn-link" href="">Dasher Central</a>
                  <a class="btn btn-link" href="">LinkedIn</a>
                  <a class="btn btn-link" href="">Glassdoor</a>
                  <a class="btn btn-link" href="">Accessibility</a>
                  <a class="btn btn-link" href="">Newsroom</a>
               </div>
               <div class="col-lg-2 col-md-6">
                  <h6 class="section-title ff-secondary text-white fw-normal5 mb-2">Let Us Help You</h6>
                  <a class="btn btn-link" href="">Account Details</a>
                  <a class="btn btn-link" href="">Order History</a>
                  <a class="btn btn-link" href="">Help</a>
               </div>
               <div class="col-lg-4 col-md-6">
                  <h6 class="section-title ff-secondary text-white fw-normal5 mb-2">Doing Business</h6>
                  <a class="btn btn-link" href="">Become a Dasher</a>
                  <a class="btn btn-link" href="">DoorDash Merchant</a>
                  <a class="btn btn-link" href="">Get Dashers for Deliveries</a>
                  <a class="btn btn-link" href="">Get DoorDash for Business</a>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="rounded float-lg-end clearfix"><img class="img-fluid" src="images/app.png"></div>
                  <div class="clearfix"></div>
                  <div class="rounded float-lg-end clearfix mt-1"><img class="img-fluid" src="images/google.jpg"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer End -->
      </div>
      <!-- restaurnat Switch modal -->
      <div class="modal fade" id="restaurantSwitchModal" tabindex="-1" aria-labelledby="restaurantSwitchModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="restaurantSwitchModalLabel">Switch Restaurant?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body px-4 py-3">
                  Your cart already contains items from a different restaurant. If you continue, your current cart will be cleared.
                  <br><br>
                  Would you like to start a new order from this restaurant?
               </div>
               <div class="modal-footer" style="background: #fff">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelSwitch">No</button>
                  <button type="button" class="btn btn-primary" id="confirmSwitch">Yes, Clear Cart</button>
               </div>
            </div>
         </div>
      </div>
      <!-- restaurnat Switch modal -->
   



      <!-- The Modal -->
      <div id="hoteladdpopupbox" class="modal hotel-add-popup eAZySs">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <div class="modal-title" id="hoteladdpopupModalLabel">
                     <p><span class="item-title"></span> <span class="dot">•</span> <span class="item-price"> </span></p>
                     <div class="modal-title-heading">Customise as per your taste</div>     
                  </div>   
                  <button type="button" class="btn-close add-to-cart-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
                 <!-- Modal Header End-->
                  <!--Modal Body-->
               <div class="modal-body">
                  <div class="main-wrap">
                     <div class="form-card container">
                        <div class="form-body">
                              <div id="tabArea">
                                 <!-- tab content variants -->
                                 <div class="tb-content item-variants">
                                 </div>
                                 <!-- tab content variants end --> 
                                  <!-- tab content addons -->
                                 <!-- tab content  addons end -->   
                                 <!-- tab nav  -->
                                 <div class="tab-nav row">
                                    <div class="col-6">
                                       <span id="step-count" data-total-step="0"></span>
                                       <div class="price-calc">
                                             <span ></span> <span class="item-final-cost" data-price="0"><strong></strong></span>
                                             <p>View Customized Item</p>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                       <button class="tb-prev sw-btn-next hide">Prev</button>
                                       <button class="tb-next sw-btn-next">Next</button>
                                       <button class="submitbtn sw-btn-next hide add-to-cart">Add to Cart</button>
                                    </div>
                                 </div>  
                                  <!-- tab nav end -->   
                              </div>  
                        </div>   
                     </div>
                  </div>   
               </div>
               <!--Modal Body end -->
            </div>   
         </div>
      </div>
      <!-- New Model end just remove this -->



         <!-- <div class="exMoeW">
            <div class="modal-content enSmuu">
               <span class="close hpaNRV border-bottom add-to-cart-close">&times;</span>
               <div class="fNfKau">
                  <div class="kdueWe bYtiER mt-2">
                     <span class="dTphbq fLCULA item-title"></span>	
                     <div class="llWHbj">
                        <div class="bmcPch">
                           <div class="iFDmLn cEzhgx">
                              <span class="hSwXML item-price"></span>
                              <span class="ihwIef">
                                 <div class="VrKMr">
                                    <span class="fNDtuN">
                                    &nbsp;<i class="bi bi-star-fill"></i>
                                    <span class="item-rating"></span>
                                    </span>
                                 </div>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="bmcPch">
                        <span class="bvPxgl item-description"></span>
                     </div>
                  </div>
                  <div class="NOEGv bYtiER">
                     <img class="img-fluid item-image" src="">
                  </div>
                  <div class="item-variants">
                  </div>
                  <div class="item-addons">
                  </div>   
               </div>
               <div>
                  <div class="iZksw">
                     <div data-testid="itemFooter" class="sc-3a0fc291-1 gUnHMu">
                        <div class="gsRztx">
                           <div class="gIkpec bZDkVI">
                            <div class="cNjEpU d-flex justify-content-center">
                              <span class="item-final-cost" data-price="0">0<span>
                            </div>
                              <div class="dqWmIX">
                                 <button class="jtKXkg add-to-cart" type="button">
                                 <span class="SUFDc jONJUs">
                                 <span class="bKlOJC">
                                 <span class="kXCksQ">
                                 <span class="duSLDd">Add to cart</span>
                                 </span>
                                 </span>
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
      </div> -->
      <!-- The Modal End-->
      <!--Signup Popup start-->
      <div id="HomePageSignUpBoxBox" class="modal py-3">
        <div id="cart-alert-container" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 90%;">
  	         <div id="signupMessage" class="alert d-none" role="alert"></div>
         </div>
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
                                          <button id="HomePageSignUpBoxCloseButton" class="iPUGzV" type="button">
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
                                 <h2 style="margin: 0px;" class="Text-sc-1nm69d8-0 kBERSR"><span id="modalContent-:r1f:-Title" tabindex="-1" data-prism-modal-initial-focus="" class="Text-sc-1nm69d8-0 DefaultContentHeader__TitleText-sc-1rvapps-0 kBERSR iYENNn"><span>Sign in or Sign up</span></span></h2>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="guCsRs p-0 border-0">
                        <div class="kHLhcx border-0">
                           <div style="flex-direction: column;" class="bchDmh container d-flex align-items-center justify-content-center p-0">
                              <div class="boeace card">
                                 <div class="hwQNHH text-center mb-0">
                                    <div class="bhxwrx">
                                       <button size="12" type="button" aria-checked="true" role="radio" class="gnesjP" id="OpenSignInBox" style="background-color: black; color: white;">
                                          <span class="bkeugU">
                                             <div class="euIzuW dHJRsI">Sign In</div>
                                          </span>
                                       </button>
                                       <button type="button" class="jjTFHX" id="OpenSignUpBox" style="background-color: rgb(231, 231, 231); color: black;">
                                          <span class="bkeugU">
                                             <div class="euIzuW dHJRsI">Sign Up</div>
                                          </span>
                                       </button>
                                    </div>
                                 </div>
                                 <div class="cntkeZ card-body" id="SingnIn">
                                    <div class="dhQxsk" id="SocialLiginBox" style="">
                                       <div class="cPlEQo">               
                                       </div>
                                       <div class="WxsqL">
                                          <div class="cQCjJB">
                                             <div class="bYgTjp">
                                                <label class="bBNyru">Email</label>
                                             </div>
                                             <div class="bbvRuI">
                                                <div class="ctmHIP">
                                                   <input type="email" placeholder="Required" class="idveBz" value="testaaaaar@gmail.com" id="signin-email">
                                                </div>
                                                <div class="cAcUHR">
                                                   <button type="button" class="bpYhff"><i class="bi bi-x-circle-fill"></i></button>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="cQCjJB">
                                             <div class="bYgTjp">
                                                <label class="bBNyru">Password</label>
                                             </div>
                                             <div class="bbvRuI">
                                                <div class="ctmHIP">
                                                   <input type="password" placeholder="Required" class="idveBz" id="signin-password">
                                                </div>
                                                <div class="cAcUHR">
                                                   <button type="button" class="bpYhff"><i class="bi bi-x-circle-fill"></i></button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="button" class="RtaIn mt-5 mb-3" id="signIn">
                                       <span class="ewsJyR">Continue to Sign In</span>
                                       </button>
                                       <div class="gjyTBR mb-0">
                                          <span class="RoeUH">By tapping any “Continue button, you agree to Dunzo café's Terms, including a waiver of your jury trial right, and Privacy Policy. We may text you a verification code. Msg &amp; data rates apply.</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="hssLkF" style="display: none;" id="SingupBox">
                                    <div class="dhQxsk">
                                          <div class="d-flex justify-content-between" style="display: flex; justify-content: space-between;">
                                             <div class="dPoTCS d-block">
                                                <div class="WxsqL1">
                                                   <div class="cQCjJB">
                                                      <div class="bYgTjp">
                                                         <label class="bBNyru">First Name</label>
                                                      </div>
                                                      <div class="gXQELC">
                                                         <div class="kQdeaU gJBGMT">
                                                            <div class="ctgegP">
                                                               <input type="text" autocomplete="given-name" id="firstname" class="idveBz" value="">
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
                                                            <div class="ctgegP"><input type="text" id="lastname" autocomplete="family-name" class="idveBz" value="">
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
                                                            <input type="email" autocomplete="email" id="email" class="idveBz" value="">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- <div class="gjyTBR">
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
                                                                     <select class="idveBz" id="countryCode">
                                                                        <option value="US">+1 (US)</option>
                                                                        <option value="CA">+1 (CA)</option>
                                                                        <option value="PR">+1 (PR)</option>
                                                                        <option value="AU">+61 (AU)</option>
                                                                        <option value="JP">+81 (JP)</option>
                                                                        <option value="DE">+49 (DE)</option>
                                                                        <option value="TR">+90 (TR)</option>
                                                                        <option value="HR">+385(HR)</option>
                                                                        <option value="IT">+39 (IT)</option>
                                                                        <option value="GR">+30 (GR)</option>
                                                                        <option value="RO">+40 (RO)</option>
                                                                        <option value="NZ">+64 (NZ)</option>
                                                                        <option value="SE">+46 (SE)</option>
                                                                        <option value="IE">+353 (IE)</option>
                                                                        <option value="PL">+48 (PL)</option>
                                                                        <option value="SG">+65 (SG)</option>
                                                                        <option value="RS">+381 (RS)</option>
                                                                        <option value="FR">+33 (FR)</option>
                                                                        <option value="AR">+54 (AR)</option>
                                                                        <option value="ES">+34 (ES)</option>
                                                                        <option value="IN">+91 (IN)</option>
                                                                        <option value="FI">+358 (FI)</option>
                                                                     </select>
                                                                     <div class="hGZTXv"><i class="bi bi-chevron-down"></i></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="WxsqL">
                                                      <div class="cQCjJB">
                                                         <div class="bYgTjp">
                                                            <label class="bBNyru">Mobile Number</label>
                                                         </div>
                                                         <div class="gXQELC">
                                                            <div class="kQdeaU gJBGMT">
                                                               <div class="ctgegP">
                                                                  <input type="tel" id="phone" autocomplete="tel" class="idveBz" value="">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div> -->
                                          <div class="gjyTBR">
                                             <div class="WxsqL">
                                                <div class="cQCjJB">
                                                   <div class="bYgTjp">
                                                      <label class="bBNyru">Password</label>
                                                      <span class="gVphbR"><span class="ZcflS">At least 10 characters</span></span>
                                                   </div>
                                                   <div class="gXQELC">
                                                      <div class="kQdeaU gJBGMT">
                                                         <div class="ctmHLr">
                                                            <input type="password" id="password" autocomplete="new-password" id="FieldWrapper-7" aria-describedby="FieldWrapper-7-description" class="Input__InputContent-sc-1o75rg4-3 idveBz" value="">
                                                         </div>
                                                         <div class="lcyKZs">
                                                            <button type="button" class="cyoyor">
                                                            <span class="styles__TextElement-sc-3qedjx-0 bBNyru">Show</span></button>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="gjyTBR"><br>
                                             <span class="RoeUH">By tapping “Sign Up” or “Continue with...,” you agree to Dunzo café's <a href="#">Terms</a>, including a waiver of your jury trial right, and <a href="#" target="_blank">Privacy Policy</a>. We may text you a verification code. Msg &amp; data rates apply.</span>
                                          </div>
                                          <button type="submit" class="fZHuuT" id="signupForm">
                                          <span class="biShts">Sign Up</span>
                                          </button>
                                      
                                       <div class="cGCJLK">
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
      <!-- Cart Design start-->
      <div class="ClsCartPopup cuFOqm" id="CartPopup">
         <div class="jOlHeh">
            <div class="fHDYoC">
                  <div class="fZHVOZ">
                     <div class="gtcyoB">
                        <button class="iPUGzV"  type="button" onclick="CloseCartPopup();"><i class="bi bi-x display-7"></i></button>
                     </div>
                  </div>
                  <div class="kxJkBa">
                     <div class="sc-59e4b807-0 hWtdKO cart-data"  style="<?php echo empty($cart) ?'display:none' : '' ?>"></div>
                     <div class="<?php echo !empty($cart) ?'' : 'd-flex' ?> justify-content-center align-center cart-empty-msg" style="<?php echo !empty($cart) ?'display:none' : '' ?>"> Your Cart is Empty</div>
                  </div>
            </div>
            <div style="position: fixed; opacity: 0; pointer-events: none;" data-prism-focus-guard="true" tabindex="0"></div>
         </div>
      </div>
      <!-- Cart Design end-->
      <!-- JavaScript Libraries -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/slick.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
      <script src="js/main.js"></script>
      <script src="js/api.js"></script>
      <script src="js/autocomplete.js"></script>
      <script src="js/cart.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/menu.js"></script>
      <script src="js/auth.js"></script>
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
         
         $('#foodmenuresponsiveslider').slick({
           autoplay: false,
           autoplaySpeed: 1000,
           pauseOnFocus: false,
           draggable: true,
           infinite: false,
           dots: false,
           arrows: true,
           speed: 1000,
           mobileFirst: true,
           slidesToShow: 5,
           slidesToScroll: 5,
           responsive: [{
               breakpoint: breakpoint.sm,
               settings: {
                 slidesToShow: 6,
                 slidesToScroll: 6,
                 arrows: true
               }
             },
             {
               breakpoint: breakpoint.md,
               settings: {
                 slidesToShow: 6,
                 slidesToScroll: 6,
                 arrows: true
               }
             },
             {
               breakpoint: breakpoint.lg,
               settings: {
                 slidesToShow: 6,
                 slidesToScroll: 6,
                 arrows: true
               }
             },
             {
               breakpoint: breakpoint.xl,
               settings: {
                 slidesToShow: 9,
                 slidesToScroll: 9,
                 arrows: true
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
         
         $("#DeliveryButton2").click(function(){
           $("#DeliveryButton2").css("background-color", "black");
           $("#PickupButton2").css("background-color", "rgb(231, 231, 231)");
           $("#PickupButton2").css("color", "black");
            $("#DeliveryButton2").css("color", "white");
         });
         $("#PickupButton2").click(function(){
           $("#DeliveryButton2").css("background-color", "rgb(231, 231, 231)");
           $("#PickupButton2").css("background-color", "black");
           $("#PickupButton2").css("color", "white");
           $("#DeliveryButton2").css("color", "black");
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
      </script>
   </body>
</html>

      
                  