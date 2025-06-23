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
      <div class="col-md-8 mt-3" style="min-height: 74vh;">
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


                  <!-- warning for fields -->
                     <div id="form-warning" style="display: none; background: #fff3cd; color: #856404; padding: 10px; border: 1px solid #ffeeba; border-radius: 4px; margin-bottom: 15px;">
                           ⚠️ Please fill in all the required fields correctly before continuing to payment.
                        </div>

                        <!-- desktop starts -->
                           <div class="gjyTBR d-none d-sm-block">
                              <div class="WxsqL">
                                 <div class="cQCjJB">
                                 <div class="row">
                                    <!-- Left Column: Location + Address -->
                                    <div class="col-6">

                                       <!-- Location Info -->
                                       <div class="cQCjJB">
                                       <div class="bYgTjp d-flex align-items-center gap-2">
                                          <img src="<?php echo BASE_URL.'/images/locatio_icon.png';?>" style="width: 25px;">
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
                                       <input type="text" id="checkin-distance" disabled placeholder="30 - 40 mins" class="idveBz text-black" value="">
                                       </div>
                                 </div>

                                 


                                 
                                 <!-- Submit Button -->
                 <!-- Submit Button -->
                        <button type="button" id="checkin-payment" class="RtaIn mt-5 mb-3" style="max-width: 600px; background-color: #018352;">
                           <span class="jONJUs">
                              <span class="ewsJyR">Continue to Payment</span>
                           </span>
                        </button>

                        <form id="razorpay-form-desktop" method="POST" action="https://digiglobaltech.in/a/api/rozorpay-secure-pay/aHR0cDovL2xvY2FsaG9zdC90ZXN0Lw" style="display: none;">
                           <input type="hidden" id="output-amount" name="amount" value="">
                        </form>

                                 </div>
                              </div>
                           </div>

               <!-- for mobile -->
                        <div id="form-warning-mobile" style="display: none; background: #fff3cd; color: #856404; padding: 10px; border: 1px solid #ffeeba; border-radius: 4px; margin-bottom: 15px;">
                           ⚠️ Please fill in all the required fields correctly before continuing to payment.
                        </div>

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
                                             <input type="text" id="checkin-house-mobile" placeholder="House / Flat / Block" class="idveBz" value="">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Road / Area Textarea -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <textarea id="checkin-road-mobile" placeholder="Apartment / Road / Area" class="idveBz" rows="3" cols="60"></textarea>
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
                                             <input type="text" placeholder="Full Name" id="checkin-name-mobile" class="idveBz" value="<?php echo $name ?>">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Email -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="email" placeholder="Email" id="checkin-email-mobile" class="idveBz" value="<?php echo $email ?>">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                       <!-- Phone -->
                                       <div class="cQCjJB">
                                       <div class="gXQEQG">
                                          <div class="bbvRuI">
                                             <div class="ctmHIP">
                                             <input type="tel" id="checkin-phone-mobile" placeholder="Phone" class="idveBz" inputmode="numeric" pattern="[0-9]*">
                                             </div>
                                          </div>
                                       </div>
                                       </div>

                                    </div>
                                 </div>

                                 <!-- Delivery In -->
                             <!-- Delivery In -->
                              <div class="cQCjJB">
                              <div class="d-flex align-items-center gap-2">
                                 <h6 class="mb-0 text-black" style="white-space: nowrap;">Delivery in</h6>
                                
                                 <!-- Add this inside your mobile-specific layout -->
<input type="text" id="checkin-distance-mobile" disabled placeholder="30 - 40 mins" class="idveBz text-black" value="">
                              </div>
                              </div>

                                 


                          <!-- Submit Button -->
                          <button type="button" id="checkin-payment-mobile" class="RtaIn mt-5 mb-3" style="max-width: 600px; background-color: #018352;">
                           <span class="jONJUs">
                              <span class="ewsJyR">Continue to Payment</span>
                           </span>
                        </button>

                        <form id="razorpay-form-mobile" method="POST" action="https://digiglobaltech.in/a/api/rozorpay-secure-pay/aHR0cDovL2xvY2FsaG9zdC90ZXN0Lw" style="display: none;">
                           <input type="hidden" id="output-amount-mobile" name="amount" value="">
                        </form>

                                 </div>
                              </div>
                           </div>

                           <!-- for mobile end  -->
                
                  
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

<!-- desktop -->
<!-- <script>
  function showWarning(message) {
    const warning = document.getElementById("form-warning");
    warning.textContent = "⚠️ " + message;
    warning.style.display = "block";
    setTimeout(() => warning.style.display = "none", 5000);
  }

  document.getElementById("checkin-payment").addEventListener("click", function () {
    const name = document.getElementById("checkin-name").value.trim();
    const email = document.getElementById("checkin-email").value.trim();
    const phone = document.getElementById("checkin-phone").value.trim();
    const house = document.getElementById("checkin-house").value.trim();
    const apartment = document.getElementById("checkin-road").value.trim();

    if (!name || !email || !phone || !house || !apartment) {
      showWarning("Please fill in all the required fields before continuing to payment.");
      return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9]{10}$/;

    if (!emailRegex.test(email)) {
      showWarning("Please enter a valid email address.");
      return;
    }

    if (!phoneRegex.test(phone)) {
      showWarning("Please enter a valid 10-digit phone number.");
      return;
    }

    //  Only submit after validation:
  
   document.getElementById("razorpay-form").submit();
  
  });
</script> -->

<script>
  function showWarning(message) {
    const warning = document.getElementById("form-warning");
    warning.textContent = "⚠️ " + message;
    warning.style.display = "block";
    setTimeout(() => warning.style.display = "none", 5000);
  }

  document.getElementById("checkin-payment").addEventListener("click", function () {
    const name = document.getElementById("checkin-name").value.trim();
    const email = document.getElementById("checkin-email").value.trim();
    const phone = document.getElementById("checkin-phone").value.trim();
    const house = document.getElementById("checkin-house").value.trim();
    const apartment = document.getElementById("checkin-road").value.trim();

    if (!name || !email || !phone || !house || !apartment) {
      showWarning("Please fill in all the required fields before continuing to payment.");
      return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9]{10}$/;

    if (!emailRegex.test(email)) {
      showWarning("Please enter a valid email address.");
      return;
    }

    if (!phoneRegex.test(phone)) {
      showWarning("Please enter a valid 10-digit phone number.");
      return;
    }

    // ✅ Submit form after all validation passes
    document.getElementById("razorpay-form-desktop").submit();
  });
</script>

<script>
document.getElementById('output-amount').value = total;
</script>

<!-- testing -->
<script>
function setupCheckoutHandler(buttonId) {
    const button = document.getElementById(buttonId);
    if (!button) return;

    button.addEventListener('click', function () {
        const name = document.getElementById('checkin-name-mobile').value.trim();
        const email = document.getElementById('checkin-email-mobile').value.trim();
        const phone = document.getElementById('checkin-phone-mobile').value.trim();
        const house = document.getElementById('checkin-house-mobile').value.trim();
        const road = document.getElementById('checkin-road-mobile').value.trim();

        const warning = document.getElementById('form-warning-mobile');

        if (!name || !email || !phone || !house || !road) {
            warning.textContent = "⚠️ All fields are required.";
            warning.style.display = 'block';
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^[0-9]{10}$/;

        if (!emailRegex.test(email)) {
            warning.textContent = "️ Please enter a valid email address.";
            warning.style.display = 'block';
            return;
        }

        if (!phoneRegex.test(phone)) {
            warning.textContent = "⚠️ Please enter a valid 10-digit phone number.";
            warning.style.display = 'block';
            return;
        }

        // Validation passed
        warning.style.display = 'none';
        getCartTotal();
        // document.getElementById('output-amount-mobile').value = "999"; // replace with actual amount
        document.getElementById('razorpay-form-mobile').submit();
    });
}

setupCheckoutHandler('checkin-payment-mobile');
</script>

</body>
</html>

      