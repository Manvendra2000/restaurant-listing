function compareItems(item1, item2) {
   if (
      item1.itemId !== item2.itemId ||
      item1.restaurantId !== item2.restaurantId
   ) {
      return false;
   }

   const v1 = item1.variants || {};
   const v2 = item2.variants || {};
   if (
      Object.keys(v1).length !== Object.keys(v2).length ||
      Object.keys(v1).some(key => v1[key] !== v2[key])
   ) {
      return false;
   }

   const formatAddons = (addons) =>
      (addons || [])
         .map(a => `${a.groupId}:${a.variantId}`)
         .sort()
         .join(',');

   return formatAddons(item1.addons) === formatAddons(item2.addons);
}

function updateCartByCartId(cart, newItem) {
   return cart.map(item => {
      if (item.cartId === newItem.cartId) {
         return newItem; // Replace with the new object
      }
      return item;
   });
}


function upsertCartItem(cart, newItem) {
   const index = cart.findIndex(cartItem => compareItems(cartItem, newItem));

   if (index !== -1) {
      // Item exists, update quantity
      const updatedCart = [...cart];
      updatedCart[index] = {
         ...updatedCart[index],
         quantity: (updatedCart[index].quantity || 1) + (newItem.quantity || 1)
      };
     //  updateCartButtonVisibility();
      return updatedCart;
   } else {
      // Item doesn't exist, add to front
      // updateCartButtonVisibility();
      return [{ ...newItem, quantity: newItem.quantity || 1, cartId: cart.length + 1 }, ...cart];
   }
   
}

function updateCartItemQuantity(cart, targetItem = null, delta, cartId = null) {

   let existingItemIndex = -1
   if (cartId) {
      existingItemIndex = cart.findIndex(cartItem => cartItem.cartId == cartId);
   } else {
      existingItemIndex = cart.findIndex(cartItem => compareItems(cartItem, targetItem));
   }

   if (existingItemIndex !== -1) {
      // updateCartButtonVisibility();
      return cart.map((cartItem, index) => {
         if (index === existingItemIndex) {
            const newQuantity = (cartItem.quantity || 1) + delta;
            console.log(newQuantity)
            if (newQuantity > 0) {
              //  updateCartButtonVisibility();
               return { ...cartItem, quantity: newQuantity };
            } else {
              //  updateCartButtonVisibility();
               return null;
            }
         }
         return cartItem;
      }).filter(item => item !== null);
   } else if (targetItem && delta > 0) {
      const newItem = { ...targetItem, quantity: Math.max(1, delta) };
     //  updateCartButtonVisibility();
      return [...cart, newItem];
   }
}


function selectAllAddonsAndVariants(selectedItem, cartTriggered = false) {

   if (!cartTriggered) {
      const { addons, variantsV2 } = selectedItem
      if (isNonEmptyObject(variantsV2)) {
         const { variantGroups } = variantsV2

         if (Array.isArray(variantGroups) && variantGroups.length) {
            for (const variantGroup of variantGroups) {
               const { variations } = variantGroup
               for (const variation of variations) {
                  if (variation.default) {
                     $('.variants[name="' + variation.id + '"]').prop('checked', true).trigger('change');
                  }
                  continue
               }
            }
         }

      }

      return;
   }

   const { addons: includeAddons, variants } = selectedItem
   if (Array.isArray(variants) && variants.length) {

      for (const variantId of Object.values(variants)) {

         $('.variants[name="' + variantId + '"]').prop('checked', true).trigger('change');
      }

   }

   if (Array.isArray(includeAddons) && includeAddons.length) {

      for (const addon of includeAddons) {
         const { variantId: addonId } = addon
         $('.addons[name="' + addonId + '"]').prop('checked', true).trigger('change');
      }

   }



}


function addCartCount(count = 0) {
   $('.cart-count').empty()
   $('.cart-count').text(count)
   updateCartButtonVisibility();
}

function clearCart() {
   cart = []
}


function toggleCartEmptyMsg(hide = true) {
   if (hide) {
      $('.cart-empty-msg').removeClass('d-flex')
      $('.cart-empty-msg').addClass('d-none')
   } else {
      $('.cart-empty-msg').removeClass('d-none')
      $('.cart-empty-msg').addClass('d-flex')
   }
}

function toggleCartData(hide = true) {
   if (hide) {
      $('.cart-data').hide()
   } else {
      $('.cart-data').show()
   }
}


function addCartToSession(removed = false) {
   fetch(cartUrl, {
      method: 'POST',
      headers: {
         'Content-Type': 'application/json'
      },
      body: JSON.stringify({ cart: cart })
   })
      .then(response => response.json())
      .then(data => {
         const { data: cartData } = data
         if (data.success) {
            if (Array.isArray(cartData)) {
               if (cartData.length) {
                  generateCartData(cartData)
               } else {
                  $('#cart-empty').trigger('click')
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
      }).finally(() => {
         clearTempCartItem()
      });

}


function generateCartData(cartData) {

   if (!Array.isArray(cartData) || (Array.isArray(cartData) && !cartData.length)) return;

   cart = cartData
   restaurantName = cartData[0]['restaurantName'];

   let cartHtml = `<div>
                           <div class="hpaNRV">
                              <span class="cHpRiL">Your cart from</span>
                              <a href="#" class="egXQHq">
                                 <div class="VrKMr">
                                    <span class="goVetq cart-restaurant-name">${restaurantName}</span>
                                    <i class="bi bi-chevron-right"></i>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div>
                           <div>
                              <div class="bGoSFN">
                                 <hr class="WECHv">
                              </div>
                               <div style="max-height: 300px; overflow-y: scroll;">`;
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
                        <div class="cNjEpU _oopptt">
                           <div class="dbDkWc">
                              <div class="jAnJQE"><button class="dJQkyG decrease-btn direct-decrement"  type="button" data-cart-id="${cartId}" data-id="${itemId}" ><i class="bi bi-dash"></i></button></div>
                           </div>
                           <div class="jkCXbu">
                              <span class="dqXImC ipPFp" data-id="${itemId}">${quantity}</span>
                              <div class="sc-3a459591-6 gJtDdY">
                                 <span class="dqXImC gOIicc item-count" data-id="${itemId}">${quantity}</span>
                              </div>
                           </div>
                           <div class="dbDkWc">
                              <div class="jAnJQE prism-theme">
                                 <button class="dJQkyG increase-btn direct-increment"  data-id="${itemId}" data-cart-id="${cartId}"  type="button"><i class="bi bi-plus"></i></button>
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


   let subtotal = 0;
   cartData.forEach(cartItem => {
      const cost = parseFloat(cartItem.cost);
      if (!isNaN(cost)) {
         subtotal += cost;
      }
   });
 
   let promoDiscount = 0;
   let total = subtotal;
   
   if (subtotal > 99 && subtotal <= 500) {
       total = 99;
       promoDiscount = subtotal - total;
   } else if (subtotal > 500) {
       total = 99 + (subtotal - 500);
       promoDiscount = subtotal - total;
   }

   cartHtml += `</div>
                <div class="sc-2f5ed6f4-1 hpaNRV">
                                 <div class="mb-2">
                                    <div class="d-flex justify-content-between">
                                       <span>Sub Total:</span>
                                       <span>₹${subtotal}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                       <span>Delivery Fee:</span>
                                       <span>Free</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                       <span>Tax:</span>
                                       <span>Inclusive</span>
                                    </div>
             
                                      ${subtotal > 99 ? `
                                 <div class="d-flex justify-content-between border p-2 rounded my-2 bg-light">
                                 <strong>Promotional Discount</strong>
                                 <span class="text-success">-₹${subtotal - 99}</span>
                                 </div>
                              ` : ''}
                                    <div class="d-flex justify-content-between">
                                       <span>Total:</span>
                                       <span>₹${total}</span>
                                    </div>
                              </div>   
                              <div class="ScvwBbO">
                                 <a class="jtKXkg">
                                    <span class="SUFDc jONJUs">
                                       <span class="bKlOJC">
                                          <span class="kXCksQ">
                                             <span class="duSLDd">
                                                <div class="bnzjku">
                                                   <div id="cart-continue">Continue</div>
                                                </div>
                                                
                                             </span>
                                          </span>
                                       </span>
                                    </span>
                                 </a>
                                 <a class="jtKXkg mt-2 d-none">
                                    <span class="SUFDc jONJUs">
                                       <span class="bKlOJC">
                                          <span class="kXCksQ">
                                             <span class="duSLDd">
                                                <div class="bnzjku">
                                                   <div id="cart-empty">Clear Cart</div>
                                                </div>
                                                
                                             </span>
                                          </span>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                           </div>  
                        </div>
                     </div>
                  </div>`;

   // clear the existing cartData html
   $('.cart-data').empty();
   $('.cart-data').append(cartHtml);
   addCartCount(cartData.length)
   toggleCartData(false)
   toggleCartEmptyMsg();
   toggleCartPopupVisibility();
}


async function loadStore() {

   const { menuId, lat, lng } = getParams()
   showLoader()
   await fetchMenu(menuId, lat, lng)
   showLoader(false)

}

jQuery(document).ready(function () {
   if (cart && cart.length) {
      generateCartData(cart)
   }

   $('.cart-data').on('click', '.cart-customizable', function () {
      let cartId = $(this).data('cart-id');
      if (cartId) {
         let cartItem = cart.find(item => item.cartId == cartId);
         console.log(cartItem)

         tempCartItem = { ...cartItem }
         const selectedMenuItem = tempCartItem['selectedItem']
         let hasVariants = false
         const { variantsV2, addons } = selectedMenuItem

         let price = selectedMenuItem['finalPrice'] ? selectedMenuItem['finalPrice'] : (selectedMenuItem['price'] ? selectedMenuItem['price'] : selectedMenuItem['defaultPrice'])
         let rating = selectedMenuItem['ratings']?.aggregatedRating?.rating || 0
         let description = selectedMenuItem['description'] || ''
         let imageId = selectedMenuItem['imageId']
         const defaultImage = baseUrl + '/images/food-placeholder.jpg'
         let image = !!imageId ? imageUrl + imageId : defaultImage
         $('.item-title').html(selectedMenuItem.name)
         $('.item-price').html(generatePrice(price))
         $('.item-rating').html(rating)
         $('.item-description').html(description)
         $('.item-description').html(description)
         $('.item-image').attr('src', image)



         if (isNonEmptyObject(variantsV2)) {
            generateSelectedItemVariantsMap(variantsV2)
            generateSteps(variantsV2)
            hasVariants = true
         }

         if (Array.isArray(addons) && addons.length) {
            generateAddons(addons)
         }
         selectAllAddonsAndVariants(tempCartItem, true)
         $('#hoteladdpopupbox').show();
         calculateVariantTotal()
      }
   })
   // For cart increment click
   $('.cart-data').on('click', '.direct-increment', async function () {
      let countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
      let currentCount = parseInt(countSpan.text());
      countSpan.text(currentCount + 1);
      const cartId = $(this).data('cart-id');
      cart = updateCartItemQuantity(cart, null, 1, cartId); // Increase by 1
      addCartToSession()
      generateCartData(cart); // Re-render the cart after update
      await loadStore()
   });

   $('.cart-data').on('click', '.direct-decrement', async function () {
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
      addCartToSession();
      generateCartData(cart);
      await loadStore()
   });

   // For cart increment clicks
   $('#restaurant-menu').on('click', '.direct-increment', async function () {
      let id = $(this).data('id')
      let hasAddons = $(this).data('has-addons')

      if (hasAddons) {
         $(`.add_to_cart[data-id="${id}"]`).trigger('click');
         return
      }

      let countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
      let currentCount = parseInt(countSpan.text());
      countSpan.text(currentCount + 1);
      const selectedMenuItem = menuItemDetails[id]
      tempCartItem['selectedItem'] = selectedMenuItem;
      tempCartItem['quantity'] = 1;
      tempCartItem['itemId'] = id
      tempCartItem['restaurantId'] = restaurantDetails['id']
      tempCartItem['lat'] = restaurantDetails['lat']
      tempCartItem['lng'] = restaurantDetails['lng']
      tempCartItem['restaurantName'] = restaurantDetails['restaurantName']
      cart = upsertCartItem(cart, tempCartItem)

      addCartToSession()
      generateCartData(cart);
      await loadStore()
   })
   $('#restaurant-menu').on('click', '.direct-decrement', async function () {
      let id = $(this).data('id')
      let hasAddons = $(this).data('has-addons')
      console.log(id, hasAddons)
      let countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
      let currentCount = parseInt(countSpan.text());
      if (currentCount > 1) {
         countSpan.text(currentCount - 1);
      }
      if (!hasAddons) {
         const selectedMenuItem = menuItemDetails[id]

         tempCartItem['selectedItem'] = selectedMenuItem;
         tempCartItem['quantity'] = 1;
         tempCartItem['itemId'] = id
         tempCartItem['restaurantId'] = restaurantDetails['id']
         tempCartItem['lat'] = restaurantDetails['lat']
         tempCartItem['lng'] = restaurantDetails['lng']
         tempCartItem['restaurantName'] = restaurantDetails['restaurantName']
      } else {
         tempCartItem = cart.find((cartItem) => cartItem.itemId == id)
      }

      cart = updateCartItemQuantity(cart, tempCartItem, -1);
      addCartToSession()
      generateCartData(cart);
      await loadStore()
   })

})


 function toggleCartPopupVisibility() {
   if (cart.length > 0) {
      $('.cart-popup').removeClass('d-none');
   } else {
      $('.cart-popup').addClass('d-none');
   }
}


function updateCartButtonVisibility() {
   const cartCountEl = document.querySelector('.cart-count');
   const viewCartBtn = document.getElementById('viewCartBtn');
   const cartCount = parseInt(cartCountEl?.textContent.trim() || '0', 10);

   if (cartCount === 0) {
     viewCartBtn.classList.add('d-none');
   } else {
     viewCartBtn.classList.remove('d-none');
   }
 }


 