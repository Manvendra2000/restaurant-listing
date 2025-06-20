
function addCheckoutCartToSession(removed = false) {
   fetch(cartUrl, {
      method: 'POST',
      headers: {
         'Content-Type': 'application/json'
      },
      body: JSON.stringify({ cart })
   })
      .then(response => response.json())
      .then(data => {
         const { data: cartData } = data
         if (data.success) {
            if (Array.isArray(cartData)) {
               if (cartData.length) {
                  generateCheckoutData(cartData)
               }
            }
            showCartAlert(`Product ${removed ? 'removed from' : 'added to'} cart successfully!`, 'success');

         } else {
            showCartAlert('Error saving cart: ' + data.message, 'danger');
         }
      })
      .catch(error => {
         console.error('Error:', error);
         showCartAlert('Something went wrong.', 'danger');
      })

}

function getCartTotal() {
   fetch(cartUrl, {
      method: 'POST',
      headers: {
         'Content-Type': 'application/json'
      },
      body: JSON.stringify({ action: 'checkout-totals' })
   })
      .then(response => response.json())
      .then(data => {
         if (isNonEmptyObject(data)) {
            const { subtotal, tax, total } = data?.data;
            document.getElementById('output-amount').value = total;
            
            document.getElementById('output-amount-mobile').value = total;
            let couponHtml = `
                  <div class="pt-2 pb-2">
                     <div class="hAStGx mb-1">
                       <span class="flyptG">Coupon</span>
                     </div>
                     <div class="bGoSFN">
                       <hr class="WECHv">
                     </div>
                      <div class="container mt-3 pb-4">
                       <div class="row">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Enter coupon code" id="coupon-code" disabled value="YUMMY99">
                              <button class="btn btn-primary"disabled type="button" id="apply-coupon">Apply</button>
                           </div>
                       </div> 
                    </div>   
                  </div>
            `;
            let html = `<div class="pt-2 pb-2">
                           <div class="hAStGx mb-1">
                              <span class="flyptG">Summary</span>
                           </div>
                           <div class="bGoSFN">
                              <hr class="WECHv">
                           </div>

                           <div>
                              <div class="d-flex justify-content-between">
                                 <span>Sub Total</span>
                                 <span>&#8377;${subtotal}</span>
                              </div>
                              <div class="d-flex justify-content-between">
                                 <span>Delivery Charge</span>
                                 <span>Free</span>
                              </div>
                              <div class="d-flex justify-content-between">
                                 <span>Tax</span>
                                 <span>Inclusive</span>
                              </div>

                              ${subtotal > 99 ? `
                                 <div class="d-flex justify-content-between border p-2 rounded my-2 bg-light">
                                 <strong>Promotional Discount</strong>
                                 <span class="text-success">-₹${subtotal - 99}</span>
                                 </div>
                              ` : ''}

                              <div class="d-flex justify-content-between">
                                 <span>Total</span>
                                 <span>&#8377;${total}</span>
                              </div>

                              <hr/>
                           </div>
                           </div>`

            $('.checkout-summary-data').empty();
            $('.checkout-summary-data').append(html);
            $('.checkout-coupon-data').empty();
            $('.checkout-coupon-data').append(couponHtml);
            document.getElementById('output-amount').value = total;
            
            document.getElementById('output-amount-mobile').value = total;
         }

      })
      .catch(error => {
         console.error('Error:', error);
         showCartAlert('Something went wrong in fetching cart totals.', 'danger');
      })
      document.getElementById('checkin-payment').addEventListener('click', function () {
         document.getElementById('razorpay-form').submit();
       });
}





function generateCheckoutData(cartData) {
   let cartHtml = ''
   if (!Array.isArray(cartData)) return;
   if ((Array.isArray(cartData) && cartData.length)) {
      cart = cartData
      restaurantName = cartData[0]['restaurantName'];
      restaurantId = cartData[0]['restaurantId'];
      // restaurant name
      cartHtml = `<div class="hWtdKO pt-4">
                    <div>
                       <div class="hpaNRV d-flex align-items-center">
                       
                          <div class="iLA-DSJ">
                             <span class="cHpRiL">Your cart from</span>
                             <a href="${baseUrl}/restaurant?menuId=${restaurantId}" class="egXQHq">
                                <div class="VrKMr">
                                   <span class="goVetq">${restaurantName}</span>
                                   <i class="bi bi-chevron-right h7"></i>
                                </div>
                             </a>
                          </div>
                       </div>
                    </div>
                   `;
      // restaurant name end


      // Items
      cartHtml += `<div class="hAStGx mb-1">
      <span class="flyptG">Items</span>
      <a href="${baseUrl}/restaurant?menuId=${restaurantId}" class="egXQHq dkqyOZ">
         <span class="SUFDc jONJUs itAsYp">
         
            <div class="gKinpO">
               <i class="bi bi-plus" style="font-size: 1.9rem;"></i><span class="dqXImC">Add more items</span>
            </div>
         
         </span>
      </a>
   </div>
   </div>`
      // Items End

      cartHtml += `<div>`
      cartData.forEach(cartItem => {
         const {
            selectedItem,
            cost,
            itemId,
            quantity, cartId
         } = cartItem
         const { addons, variantsV2 } = selectedItem
         let hasAddons = Array.isArray(addons) || (variantsV2 && isNonEmptyObject(variantsV2))

         let imageUrl = baseUrl + '/images/food-placeholder.jpg';
         if (selectedItem.imageId) {
            imageUrl = 'https://media-assets.swiggy.com/swiggy/image/upload/' + selectedItem.imageId
         }

         let customizable = ''
         if (hasAddons) {
            customizable = `<span class="cart-customizable" style="font-size:0.8rem" data-cart-Id="${cartId}">Customizable</span>`
         }

         let cartItemHtml = $(`<div class="kgQskK">
      <div class="dIlVsC">
         <div class=" bgYphk">
            <div class="eaXeBL cNPvKQ">
               <div style="grid-area: 2 / 1;">
                  <div class="cEvrPo">
                     <div class="iVKwdM">
                        <img class="img-fluid" src="${imageUrl}">
                     </div>
                  </div>
               </div>
               <div class="cJxGCl jYnMxm">
                  <span style="height: 100%; display: flex; align-items: center;" class="laMCcm">
                     <div class="dhyst">
                        <div class="jSaOyI">
                           <span class="cnzVEX">${selectedItem['name']}</span>
                           <span class="idtPLn"></span>
                           <span class="ZNLaC eyuHSB">&#8377;${cost}</span>
                          ${customizable}
                        </div>
                     </div>
                  </span>
               </div>
               <div style="grid-area: 3 / 2;"></div>
               <div style="grid-area: 2 / 3;">
                  <div class="sc-ae4bd58-0 cEvrPo">
                     <div class="buxKGc">
                        <div class="cNjEpU">
                           <div class="dbDkWc">
                              <div class="jAnJQE"><button class="dJQkyG direct-checkout-decrement"  type="button" data-cart-id="${cartId}" data-id="${itemId}" ><i class="bi bi-dash"></i></button></div>
                           </div>
                           <div class="jkCXbu">
                              <span class="dqXImC ipPFp" data-id="${itemId}">${quantity}</span>
                              <div class="sc-3a459591-6 gJtDdY">
                                 <span class="dqXImC gOIicc item-count" data-id="${itemId}">${quantity}</span>
                              </div>
                           </div>
                           <div class="dbDkWc">
                              <div class="jAnJQE prism-theme">
                                 <button class="dJQkyG direct-checkout-increment"  data-id="${itemId}" data-cart-id="${cartId}"  type="button"><i class="bi bi-plus"></i></button>
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
<div class="bGoSFN">
   <hr class="WECHv">
</div>`)
         cartHtml += cartItemHtml.prop('outerHTML');
      })
      cartHtml += `</div>
   `;

   } else {
      cartHtml += `  <div class="d-flex flex-column justify-content-center align-items-center text-center h-100">
                       <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="Empty Cart" class="mb-3" style="max-width: 100px;">
                       <h6 class="mb-2">Your cart is empty</h6>
                       <p class="text-muted mb-3">Looks like you haven't added anything yet.</p>
                       <button  type="button" class="RtaIn mt-5 mb-3">
                       <a href="${baseUrl}/restaurants" >
                             <span class="jONJUs">
                                <span class="ewsJyR" style="color: #fff">GET FOOD</span>
                             </span>
                             </a>
                          </button>
                    </div>`
   }


   // clear the existing cartData html
   $('.checkout-cart-data').empty();
   $('.checkout-cart-data').append(cartHtml);
}


function isValidJSON(str) {
   try {
      JSON.parse(str);
      return true;
   } catch (e) {
      return false;
   }
}

// async function generateDistance(cart) {
//    const restaurantId = cart[0]?.restaurantId;
//    let latitude = null, longitude = null;

//    const coordinates = getCookie('door-dash-user-location');
//    const location = decodeURIComponent(coordinates);
//    if (isValidJSON(location)) {
//       const { lat, lng } = JSON.parse(location);
//       latitude = lat;
//       longitude = lng;
//    }

//    if (restaurantId && latitude && longitude) {
//       const menu = await fetchMenuData(restaurantId, latitude, longitude);
//       const sla = menu?.cards?.[2]?.card?.card?.info?.sla;

//       if (sla) {
//          const deliveryTime = sla.deliveryTime || sla.minDeliveryTime || sla.maxDeliveryTime || '';
//          const timeText = `${deliveryTime} mins`;

//          // Desktop
//          $('#checkin-distance').val(timeText).text(timeText);

//          // Mobile
//          $('#checkin-distance-mobile').val(timeText).text(timeText);
//       }
//    }
// }
async function generateDistance(cart) {
   const restaurantId = cart[0]?.restaurantId;
   const coordinates = getCookie('door-dash-user-location');
   let latitude = null, longitude = null;

   if (coordinates && isValidJSON(decodeURIComponent(coordinates))) {
      const { lat, lng } = JSON.parse(decodeURIComponent(coordinates));
      latitude = lat;
      longitude = lng;
   }

   if (restaurantId && latitude && longitude) {
      const menu = await fetchMenuData(restaurantId, latitude, longitude);
      const sla = menu?.cards?.[2]?.card?.card?.info?.sla;

      if (sla) {
         const deliveryTime = sla.deliveryTime || sla.minDeliveryTime || sla.maxDeliveryTime || '';
         const text = `${deliveryTime} mins`;

         const desktopInput = document.getElementById('checkin-distance');
         const mobileInput = document.getElementById('checkin-distance-mobile');

         if (desktopInput) {
            desktopInput.value = text;
            desktopInput.textContent = text;
         }

         if (mobileInput) {
            mobileInput.value = text;
            mobileInput.textContent = text;
         }
      }
   }
}



$(document).ready(function () {

   if (cart && cart.length) {
      generateCheckoutData(cart)
      getCartTotal()
      generateDistance(cart)
   }
   $('.checkout-cart-data').on('click', '.direct-checkout-increment', async function () {
      let countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
      let currentCount = parseInt(countSpan.text());
      countSpan.text(currentCount + 1);
      const cartId = $(this).data('cart-id');
      cart = updateCartItemQuantity(cart, null, 1, cartId); // Increase by 1
      addCheckoutCartToSession()
      generateCheckoutData(cart); // Re-render the cart after update
      getCartTotal()
   });

   $('.checkout-cart-data').on('click', '.direct-checkout-decrement', async function () {
      const cartId = $(this).data('cart-id');
      let id = $(this).data('id');

      // Update DOM first
      let countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
      let currentCount = parseInt(countSpan.text());
      let newCount = currentCount - 1;

      if (newCount > 0) {
         countSpan.text(newCount);
      }

      let incrementCounters = $(`.direct-increment[data-id="${id}"]`).not(this);
      if (incrementCounters?.length) {
         incrementCounters.each(function () {
            $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count').text(newCount);
            if (newCount === 0) {
               $(this).closest('.item-counter').prev('.add_to_cart')?.removeClass('d-none');
               $(this).closest('.item-counter').addClass('d-none');
            }
         });
      }

      // Now safely update data and re-render
      cart = updateCartItemQuantity(cart, null, -1, cartId);
      addCheckoutCartToSession(true);
      generateCheckoutData(cart);
      getCartTotal()
   });



})
