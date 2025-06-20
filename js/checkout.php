<?php
   include 'checkout-header.php';
   $name = '';
   $email = '';

   if (isset($_SESSION['firstname'])) {
      $name = $_SESSION['firstname'];
   }

   if (isset($_SESSION['lastname'])) {
      $name .= ' '. $_SESSION['lastname'] ;
   }

   if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
   }

   ?>


<div class="container-fluid" style="background-color: hsl(0, 0%, 90%);">
   <div class="row ">
      <div class="col-md-8 mt-3">
      <div class="accordion accordion-flush" id="accordionFlushExample">
         <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
               <button class="accordion-button collapsed" type="button" >
               Location
               </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="kHLhcx">   
                     <!-- <div class="dmAFKF">issue on layout>950px -->
                        <div>
                     <div class="" id="locationDetails">


                           <div class="gjyTBR d-none d-sm-block">
                              <div class="WxsqL">
                                 <div class="cQCjJB">
                                 <div class="row">
                                    <!-- Left Column: Location + Address -->
                                    <div class="col-6">

                                       <!-- Location Info -->
                                       <div class="cQCjJB">
                                       <div class="bYgTjp d-flex align-items-center gap-2">
                                          <img src="../images/locatio_icon.png" style="width: 25px;">
                                          <label class="bBNyru">
                                             <span class="text-secondary d-inline-block text-break" style="max-width: 100%;">
                                             <?php echo isset($_COOKIE['door-dash-place']) ? urldecode($_COOKIE['door-dash-place']) : '' ?>
                                             </span>
                                          </label>
                                       </div>
                                       <div class="p-3 my-3 rounded" style="background: #fff8ec; border: 1px solid #fae4c5; color: #a05d15; font-weight: 500;">
                                          A detailed address will help our Delivery Partner reach your doorstep easily
                                       </div>
                                       </div>

                                       <!-- House Input -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="text" id="checkin-house" placeholder="House / Flat / Block" class="idveBz" value="">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Road / Area Textarea -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <textarea id="checkin-road" placeholder="Apartment / Road / Area" class="idveBz" rows="3" cols="60"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Save As -->
                                       <div class="cQCjJB">
                                       <div class="bYgTjp">
                                          <label class="bBNyru">Save as</label>
                                       </div>
                                       <div class="gXQEQG">
                                          <div class="ctgegP d-flex align-items-center gap-1">
                                             <input type="radio" class="btn-check" checked name="save-as" id="home" autocomplete="off" value="home">
                                             <label class="btn btn-outline-primary" for="home">Home</label>
                                             <input type="radio" class="btn-check" name="save-as" id="work" autocomplete="off" value="work">
                                             <label class="btn btn-outline-primary" for="work">Work</label>
                                             <input type="radio" class="btn-check" name="save-as" id="friends" autocomplete="off" value="friends">
                                             <label class="btn btn-outline-primary" for="friends">Friends</label>
                                             <input type="radio" class="btn-check" name="save-as" id="others" autocomplete="off" value="others">
                                             <label class="btn btn-outline-primary" for="others">Others</label>
                                          </div>
                                       </div>
                                       </div>
                                    </div>

                                    <!-- Right Column: User Details -->
                                    <div class="col-6">

                                       <!-- Full Name -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="text" placeholder="Full Name" id="checkin-name" class="idveBz" value="<?php echo $name ?>">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Email -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="email" placeholder="Email" id="checkin-email" class="idveBz" value="<?php echo $email ?>">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Phone -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="text" id="checkin-phone" placeholder="Phone" class="idveBz" value="">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                    </div>
                                 </div>

                                 <!-- Delivery In -->
                                 <div class="cQCjJB">
                                 <div class="d-flex align-items-center gap-2">
                                       <h6 class="mb-0 text-black" style="white-space: nowrap; gap: 10px;">Delivery in</h6>
                                       <input type="text" id="checkin-distance" disabled placeholder="..." class="idveBz text-black" value="">
                                       </div>
                                 </div>

                                 


                                 
                                 <!-- Submit Button -->
                                 <button type="button" id="checkin-payment" class="RtaIn mt-5 mb-3" style="max-width: 600px;">
                                    <span class="jONJUs">
                                       <span class="ewsJyR">Continue to Payment</span>
                                    </span>
                                 </button>

                                 </div>
                              </div>
                           </div>

<!-- for mobile -->

                           <div class="gjyTBR d-block d-sm-none">
                              <div class="WxsqL">
                                 <div class="cQCjJB">
                                 <div class="row">
                                    <!-- Left Column: Location + Address -->
                                    <div class="">

                                       <!-- Location Info -->
                                       <div class="cQCjJB">
                                       <div class="bYgTjp d-flex align-items-center gap-2">
                                          <img src="../images/locatio_icon.png" style="width: 25px;">
                                          <label class="bBNyru">
                                             <span class="text-secondary d-inline-block text-break" style="max-width: 100%;">
                                             <?php echo isset($_COOKIE['door-dash-place']) ? urldecode($_COOKIE['door-dash-place']) : '' ?>
                                             </span>
                                          </label>
                                       </div>
                                       <div class="p-3 my-3 rounded" style="background: #fff8ec; border: 1px solid #fae4c5; color: #a05d15; font-weight: 500;">
                                          A detailed address will help our Delivery Partner reach your doorstep easily
                                       </div>
                                       </div>

                                       <!-- House Input -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="text" id="checkin-house" placeholder="House / Flat / Block" class="idveBz" value="">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Road / Area Textarea -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <textarea id="checkin-road" placeholder="Apartment / Road / Area" class="idveBz" rows="3" cols="60"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Save As -->
                                       <div class="cQCjJB">
                                       <div class="bYgTjp">
                                          <label class="bBNyru">Save as</label>
                                       </div>
                                       <div class="gXQEQG">
                                          <div class="ctgegP d-flex align-items-center gap-1">
                                             <input type="radio" class="btn-check" checked name="save-as" id="home" autocomplete="off" value="home">
                                             <label class="btn btn-outline-primary" for="home">Home</label>
                                             <input type="radio" class="btn-check" name="save-as" id="work" autocomplete="off" value="work">
                                             <label class="btn btn-outline-primary" for="work">Work</label>
                                             <input type="radio" class="btn-check" name="save-as" id="friends" autocomplete="off" value="friends">
                                             <label class="btn btn-outline-primary" for="friends">Friends</label>
                                             <input type="radio" class="btn-check" name="save-as" id="others" autocomplete="off" value="others">
                                             <label class="btn btn-outline-primary" for="others">Others</label>
                                          </div>
                                       </div>
                                       </div>
                                    </div>

                                    <!-- Right Column: User Details -->
                                    <div class="">

                                       <!-- Full Name -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="text" placeholder="Full Name" id="checkin-name" class="idveBz" value="<?php echo $name ?>">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Email -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="email" placeholder="Email" id="checkin-email" class="idveBz" value="<?php echo $email ?>">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Phone -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="text" id="checkin-phone" placeholder="Phone" class="idveBz" value="">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                    </div>
                                 </div>

                                 <!-- Delivery In -->
                                 <div class="cQCjJB">
                                 <div class="d-flex align-items-center gap-2">
                                       <h6 class="mb-0 text-black" style="white-space: nowrap; gap: 10px;">Delivery in</h6>
                                       <input type="text" id="checkin-distance" disabled placeholder="..." class="idveBz text-black" value="">
                                       </div>
                                 </div>

                                 


                                 
                                 <!-- Submit Button -->
                                 <!-- <button type="button" id="checkin-payment" class="RtaIn mt-5 mb-3">
                                    <span class="jONJUs">
                                       <span class="ewsJyR">Continue to Payment</span>
                                    </span>
                                 </button> -->
                                 <button type="button" id="checkin-payment" class="RtaIn mt-5 mb-3">
                                       <span class="jONJUs"><span class="ewsJyR">Continue to Payment</span></span>
                                    </button>

                                 </div>
                              </div>
                           </div>

                           <!-- for mobile end  -->
                
                           <form id="razorpay-form" method="POST" action="https://digiglobaltech.in/api/rozorpay-secure-pay/aHR0cDovL2xvY2FsaG9zdC90ZXN0Lw" style="display: none;">
                           <input type="hidden" id="output-amount" name="amount" value="<?php echo $grosstotal; ?>">
                           </form>
                           </div>
                     </div>   
                     
                  </div>
            </div>
         </div>
         <div class="accordion-item mt-2">
            <h2 class="accordion-header" id="flush-headingThree">
               <button class="accordion-button collapsed" type="button" disabled  data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Payment
               </button>
            </h2>
            <!-- accordian body -->
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
               <div class="Inset__StyledInset-sc-1phi2ey-0 bYtiER styles__ListCellContentContainer-sc-7lv6ab-0 cNPvKQ">
                  <div size="24" class="styles__IconContainer-sc-7lv6ab-4 fmuOZm">
                     <i class="bi bi-credit-card-2-back"></i>
                  </div>
                  <div class="StackChildren__StyledStackChildren-sc-5x3aej-0 cJxGCl styles__MiddleContainer-sc-7lv6ab-1 jYnMxm">
                     <span class="Text-sc-1nm69d8-0 laMCcm">
                     <span class="Text-sc-1nm69d8-0 eXHxDy">Credit/Debit Card</span></span>
                     <span class="Text-sc-1nm69d8-0 griaXr">
                     </span>
                  </div>
                  <div size="24" class="styles__IconContainer-sc-7lv6ab-4 hDUGcc">
                     <i class="bi bi-chevron-right"></i>
                  </div>
                  <div type="InsetBorder" class="styles__GridSeparatorContainer-sc-7lv6ab-5 kozddz">
                     <div class="styles__InsetBorderContainer-sc-1h9nxop-2 bdHLIo">
                        <hr class="styles__Border-sc-1h9nxop-1 WECHv">
                     </div>
                  </div>
               </div>
               <div class="Inset__StyledInset-sc-1phi2ey-0 bYtiER styles__ListCellContentContainer-sc-7lv6ab-0 cNPvKQ">
                  <div size="24" class="styles__IconContainer-sc-7lv6ab-4 fmuOZm">
                     <div class="bwZSgE"></div>
                  </div>
                  <div class="StackChildren__StyledStackChildren-sc-5x3aej-0 cJxGCl styles__MiddleContainer-sc-7lv6ab-1 jYnMxm">
                     <span class="Text-sc-1nm69d8-0 laMCcm">
                     <span class="Text-sc-1nm69d8-0 eXHxDy">Paypal</span></span>
                     <span class="Text-sc-1nm69d8-0 griaXr">
                     </span>
                  </div>
                  <div size="24" class="styles__IconContainer-sc-7lv6ab-4 hDUGcc">
                     <i class="bi bi-chevron-right"></i>
                  </div>
                  <div type="InsetBorder" class="styles__GridSeparatorContainer-sc-7lv6ab-5 kozddz">
                     <div class="styles__InsetBorderContainer-sc-1h9nxop-2 bdHLIo">
                        <hr class="styles__Border-sc-1h9nxop-1 WECHv">
                     </div>
                  </div>
               </div>
               <div class="Inset__StyledInset-sc-1phi2ey-0 bYtiER styles__ListCellContentContainer-sc-7lv6ab-0 cNPvKQ">
                  <div size="24" class="styles__IconContainer-sc-7lv6ab-4 fmuOZm">
                     <div class="bwZSgE"></div>
                  </div>
                  <div class="StackChildren__StyledStackChildren-sc-5x3aej-0 cJxGCl styles__MiddleContainer-sc-7lv6ab-1 jYnMxm">
                     <span class="Text-sc-1nm69d8-0 laMCcm">
                     <span class="Text-sc-1nm69d8-0 eXHxDy">Afterpay</span></span>
                     <span class="Text-sc-1nm69d8-0 griaXr">
                     </span>
                  </div>
                  <div size="24" class="styles__IconContainer-sc-7lv6ab-4 hDUGcc">
                     <i class="bi bi-chevron-right"></i>
                  </div>
                  <div type="InsetBorder" class="styles__GridSeparatorContainer-sc-7lv6ab-5 kozddz">
                     <div class="styles__InsetBorderContainer-sc-1h9nxop-2 bdHLIo">
                        <hr class="styles__Border-sc-1h9nxop-1 WECHv">
                     </div>
                  </div>
               </div>
            </div>

            <!-- accordian end -->
         </div>
         </div>
      </div>
      <!-- col-md-3 -->   
      <div class="col-md-4 mt-3">
         <div class="bd-highlight">
            <div class="">
               <div class="cuFOqm px-3 checkout-cart-data">
               </div>
               <div class="cuFOqm px-3 checkout-coupon-data">
               </div>
               <div class="cuFOqm px-3 checkout-summary-data">
               </div>
            </div>
         </div> 
        
      </div> 
      <!-- col-md-3-end -->
   </div>
   <!-- row  end -->
</div>

<?php include 'footer.php'; ?>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/api.js"></script>
<script src="js/custom.js"></script>
<script src="js/cart.js"></script>
<script src="js/auth.js"></script>
<script src="js/checkout.js"></script>
<script>
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


<script>
document.getElementById('checkin-payment').addEventListener('click', function () {
   document.getElementById('razorpay-form').submit();
});
</script>

</body>
</html>

      