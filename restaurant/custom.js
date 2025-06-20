// Get the modal
var modal = document.getElementById("hoteladdpopupbox");
var isLoading = false;
let selectedItemVariantGroupMapper = {}
let selectedVariant = '';
let prevGroupId = 0;


function isNonEmptyObject(value) {
  return value && typeof value === 'object' && !Array.isArray(value) && Object.keys(value).length > 0;
}


// Get the button that opens the modal
var btn = document.getElementById("hoteladdpopup");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
if (btn)
  btn.onclick = function () {
    modal.style.display = "block";
  }

// When the user clicks on <span> (x), close the modal
if (span)
  span.onclick = function () {
    modal.style.display = "none";
  }



function openNav() {
  //alert("ssss");
  var prop = document.getElementById("mySidenav");
  if ($(window).width() > 768) {

    if (prop.style.width == '' || prop.style.width == "5rem") {
      document.getElementById("mySidenav").style.width = "14rem";
      document.getElementById("mySidenav").style.transition = "all .3s";
      document.getElementById("mySidenav").style.background = "#ffffff";
    }
    else {
      document.getElementById("mySidenav").style.width = "5rem";
      document.getElementById("mySidenav").style.transition = "all .3s";
      document.getElementById("mySidenav").style.background = "#ffffff";
    }
  }
  else

    if (prop.style.width == '' || prop.style.width == "14rem") {
      document.getElementById("mySidenav").style.width = "0rem";
      document.getElementById("mySidenav").style.transition = "all .3s";
      document.getElementById("mySidenav").style.background = "#ffffff";
    }
    else {
      document.getElementById("mySidenav").style.width = "14rem";
      document.getElementById("mySidenav").style.transition = "all .3s";
      document.getElementById("mySidenav").style.background = "#ffffff";
    }

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function bigImg() {
  alert("ssss");
  //document.getElementById("mySidenav").style.width = "14rem";
}

if ($(window).width() < 768) {
  if (document.getElementById("mySidenav"))
    document.getElementById("mySidenav").style.width = "0";
}
if ($(window).width() > 768) {
  if (document.getElementById("mySidenav")) {
    document.getElementById("mySidenav").style.width = "5rem";
    document.getElementById("mySidenav").style.background = "#ffffff";
  }
}


function CloseCartPopup() {
  document.getElementById("CartPopup").style.width = "0px";
  document.getElementById("CartPopup").style.transition = "all .3s";
  document.getElementById("CartPopup").style.opacity = 0;

}
function OpenCartPopup() {
  document.getElementById("CartPopup").style.width = "480px";
  document.getElementById("CartPopup").style.transition = "all .3s";
  document.getElementById("CartPopup").style.opacity = 1;
  document.getElementById("CartPopup").style.position = "fixed";
}
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

$("#addressBoxOpen").click(function () {
  $("#myDropdown").show();
});
$("#addressBoxClose").click(function () {
  $("#myDropdown").hide();
});



// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


function showLoader(toggle = true) {
  $('#loader').removeClass(toggle ? 'd-none' : 'd-flex')
  $('#loader').addClass(toggle ? 'd-flex' : 'd-none')
}




function generatePrice(price) {
  return (price / 100)
}

// function generateAddons(addons, selectedItem = false) {
//   const vegImage = baseUrl + '/images/veg-icon.png'
//   const nonVegImg = baseUrl + '/images/non-veg-icon.png'
//   let div = '';
//   let temp = '';
//   let append = false
//   if (prevGroupId > 0) {
//     temp += `<div class=""> 
//                 <div class="item-">
//                   <div class="item-name selected-variant" data-prev-group-Id="${prevGroupId}">
//                     <div class="item-name-icon">
//                       <span class="svg-circle_ "></span>
//                     </div>
//                     <span class="item-variant-name"></span>
//                   </div>  
//                   <div class="item-check-box">
//                     <span class="test-end pop-change-btn">Change</span>
//                   </div>
//                 </div>
//               </div>`
//   }

//   for (const addon of addons) {
//     const { choices, groupName, groupId, maxAddons } = addon;
//     append = false

//     temp += `<div class="main-addon- group">
//               <div class="dhyst bYtiER">
//                <h3 class="icqidx">${groupName}</h3>
//                 <div class="llWHbj">
//                   <div class="fERnCr">
//                     <span class="cHpRiL">(Optional)</span>
//                   </div>`;

//     if (maxAddons != choices.length) {
//       temp += `<span class="ldyIml"></span>
//                 <span class="dRObSZ">Select up to ${maxAddons}</span>`;
//     }

//     temp += `</div>
//           </div>`; // group name end


//     for (const choice of choices) {
//       const { name, price, id, isVeg } = choice;

//       if (selectedItem && selectedItemVariantGroupMapper[selectedItem]
//         && selectedItemVariantGroupMapper[selectedItem]['addons'] &&
//         !selectedItemVariantGroupMapper[selectedItem]['addons'].includes(id)) continue

//       if (selectedItem) append = true

//       const parsedPrice = generatePrice(price || 0)


//       temp += `<div class="kkojBG pb-3 pt-3 bYtiER">
//                   <div class="row">
//                     <div class="col-md-10">
//                       <div class="row">
//                         <div class="col-md-1">
//                           <img style="width:20px" src="${isVeg ? vegImage : nonVegImg}" />
//                         </div>
//                         <div class="col-md-11 item-name">
//                           ${name}
//                         </div>
//                       </div>
//                     </div>
//                     <div class="col-md-2">
//                       <div class="row">
//                         <div class="col-md-8">
//                           +&#8377;${parsedPrice}
//                         </div>
//                         <div class="col-md-2">
//                             <input kind="CHECKBOX" class="meAlJ addons" type="checkbox"
//                           name="${id}"
//                           id="${id}"
//                           data-group-id="${groupId}"
//                           data-variant-id="${id}"
//                           data-max="${maxAddons}"
//                           data-price="${parsedPrice}"
//                           >
//                         </div>
//                       </div>
//                     </div>    

//                   </div>
//                 </div>`;
//     };
//     temp += '</div>'; // main div end
//     if (selectedItem && !append) {
//       temp = ''
//     } else {
//       div += temp
//       temp = ''
//     }
//   };

//   if (div) div = `<div class="tab-pan addon-container">${div}</div>`
//   $('.item-variants').append(div);
// }

function generateAddons(addons, selectedItem = false) {
  const vegImage = baseUrl + '/images/veg-icon.png';
  const nonVegImg = baseUrl + '/images/non-veg-icon.png';
  let div = '';
  let temp = '';
  let append = false;

  if (prevGroupId > 0) {
    temp += `
      <div style="padding: 12px 0; border-bottom: 1px solid #eee;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
          <div style="flex: 1 1 70%; display: flex; align-items: center;">
            <div style="width: 20px; margin-right: 8px;">
              <img style="width: 20px;" src="${vegImage}">
            </div>
            <div style="font-size: 14px;" class="item-name selected-variant" data-prev-group-Id="${prevGroupId}">
              <div class="item-name-icon"><span class="svg-circle_ "></span></div>
              <span class="item-variant-name"></span>
            </div>
          </div>
          <div style="flex: 1 1 30%; display: flex; align-items: center; justify-content: flex-end;">
            <span class="test-end pop-change-btn" style="font-size: 14px;">Change</span>
          </div>
        </div>
      </div>`;
  }

  for (const addon of addons) {
    const { choices, groupName, groupId, maxAddons } = addon;
    append = false;

    temp += `<div class="main-addon- group">
              <div class="dhyst bYtiER">
                <h3 class="icqidx">${groupName}</h3>
                <div class="llWHbj">
                  <div class="fERnCr">
                    <span class="cHpRiL">(Optional)</span>
                  </div>`;

    if (maxAddons != choices.length) {
      temp += `<span class="ldyIml"></span>
               <span class="dRObSZ">Select up to ${maxAddons}</span>`;
    }

    temp += `</div></div>`; // group name end

    for (const choice of choices) {
      const { name, price, id, isVeg } = choice;

      if (
        selectedItem &&
        selectedItemVariantGroupMapper[selectedItem] &&
        selectedItemVariantGroupMapper[selectedItem]['addons'] &&
        !selectedItemVariantGroupMapper[selectedItem]['addons'].includes(id)
      )
        continue;

      if (selectedItem) append = true;

      const parsedPrice = generatePrice(price || 0);

      temp += `
        <div style="padding: 12px 0; border-bottom: 1px solid #eee;">
          <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div style="flex: 1 1 70%; display: flex; align-items: center;">
              <div style="width: 20px; margin-right: 8px;">
                <img style="width: 20px;" src="${isVeg ? vegImage : nonVegImg}" />
              </div>
              <div style="font-size: 14px;">${name}</div>
            </div>
            <div style="flex: 1 1 30%; display: flex; align-items: center; justify-content: flex-end;">
              <div style="font-size: 14px; margin-right: 8px;">+₹${parsedPrice}</div>
              <input kind="CHECKBOX" class="meAlJ addons" type="checkbox"
                name="${id}" id="${id}"
                data-group-id="${groupId}" data-variant-id="${id}"
                data-max="${maxAddons}" data-price="${parsedPrice}">
            </div>
          </div>
        </div>`;
    }

    temp += '</div>'; // main-addon- group close

    if (selectedItem && !append) {
      temp = '';
    } else {
      div += temp;
      temp = '';
    }
  }

  if (div) div = `<div class="tab-pan addon-container">${div}</div>`;
  $('.item-variants').append(div);
}

function clearTempCartItem() {
  tempCartItem = { itemId: 0, restaurantId: 0, restaurantName: '', lat: '', lng: '', addons: [], variants: {}, selectedItem: {}, quantity: 0 }
  prevGroupId = 0;

}


function getPriceFromPricingModels(pricingModel, variantId, groupId) {

  let basePrice = 0;
  for (const model of pricingModel) {
    const { variations, finalPrice, price } = model
    for (const variation of variations) {
      const { groupId: gId, variationId } = variation
      if (groupId == gId && variationId == variantId) {
        if (!!finalPrice && !!finalPrice?.units) {
          basePrice = finalPrice?.units
          break;
        }
        if (!!price) {
          basePrice = generatePrice(price)
          break
        }
      }
    }


  }
  return basePrice
}



function generateSteps(variants, selectedItem = false) {
  const vegImage = baseUrl + '/images/veg-icon.png'
  const nonVegImg = baseUrl + '/images/non-veg-icon.png'
  const { pricingModels, variantGroups } = variants;
  console.log(pricingModels, variantGroups);
  let isDefaultId = 0;
  let div = '';
  if (Array.isArray(variantGroups) && variantGroups.length) {
    $('.item-variants').empty()
    let index = 0;
    for (const variantGroup of variantGroups) {
      const { variations, groupId, name } = variantGroup
      //variant group tab start
      div += `<div class="tab-pan ${index == 0 ? 'active' : ''}">`

      if (index !== 0) {
        div += `<div class=""> 
                  <div class="item-">
                    <div class="item-name selected-variant" data-prev-group-Id="${prevGroupId}">
                      <div class="item-name-icon">
                        <span class="svg-circle_ "></span>
                      </div>
                      <span class="item-variant-name"></span>
                    </div>  
                    <div class="item-check-box">
                      <span class="test-end pop-change-btn">Change</span>
                    </div>
                  </div>
                </div>`
      }
      div += `<div class="pop-divider mt-0"></div>`
      div += `<h3>${name}</h3>`
      div += `<div class="item-container" data-index=${index + 1}>`
      if (Array.isArray(variations)) {
        for (const variation of variations) {
          let {
            name: variationName,
            price,
            id,
            default: isDefault,
            isEnabled,
            isVeg
          } = variation
          if (selectedItem && index == 0) {
            selectedVariant = selectedItem
            isDefault = selectedItem == id
          }

          if (!selectedVariant && isDefault) {
            selectedVariant = id
          }
          if (!!selectedVariant && index > 0) {
            if (selectedItemVariantGroupMapper[selectedVariant]
              && selectedItemVariantGroupMapper[selectedVariant]['variations'] &&
              !selectedItemVariantGroupMapper[selectedVariant]['variations'].includes(id)) continue
          }

          const parsedPrice = getPriceFromPricingModels(pricingModels, id, groupId) || 0
          if (!isEnabled) continue
          if (isDefault && index == 0) isDefaultId = id;

          div += `<div class="item-">`
          div += `<div class="item-name-container">`
          div += `<div class="item-name">`
          div += `<div class="item-name-icon">`
          div += `<img style="width:20px" src="${isVeg ? vegImage : nonVegImg}" />`
          div += `</div>`
          div += `${variationName}`
          div += `</div>`
          if (parsedPrice && variantGroups.length == index + 1) {
            div += `<span class="item-name-price"><div class="item-price-data">&#8377;${parsedPrice}</div></span>`
          }
          div += `</div>`

          div += `<div class="item-check-box">
                        <input 
                          class="variants"
                          type="radio" 
                          name="${groupId}"
                          data-group-id="${groupId}"
                          data-variant-id="${id}"
                          data-price="${variantGroups.length == index ? parsedPrice : 0}"
                          data-variant-name="${variationName}"
                          ${isDefault ? 'checked' : ''} 
                          id="${variationName}">
                        <label for="${variationName}">${variationName}</label>
                    </div>`
          div += `</div>`
        }
      }
      div += `</div>`
      div += `</div>`
      index++;
      prevGroupId = groupId
      // variant grouptab end
    }


  }
  $('#step-count').html(`Step 1/${index}`)
  $('#step-count').attr(`data-total-step`, index)
  $('.item-variants').append(div)
  return isDefaultId

}


function generateSelectedItemVariantsMap(variants) {
  if (isNonEmptyObject(variants)) {
    const { pricingModels, variantGroups } = variants
    if (Array.isArray(pricingModels)) {
      for (const pricingModel of pricingModels) {
        const { addonCombinations, variations, price } = pricingModel;
        index = 0;
        let pVariationId = 0;
        // create dependent variation groups
        for (const variation of variations) {
          const { groupId, variationId } = variation
          if (index == 0) {
            pVariationId = variationId;
          }


          if (selectedItemVariantGroupMapper.hasOwnProperty(pVariationId)) {
            selectedItemVariantGroupMapper[pVariationId]['variations'] = [...selectedItemVariantGroupMapper[pVariationId]['variations'], variationId]
          }
          else {
            selectedItemVariantGroupMapper[pVariationId] = { 'variations': [], 'addons': [] }
          }
          index++;
        }
        // create dependent addon groups
        if (Array.isArray(addonCombinations)) {
          for (const addonCombination of addonCombinations) {
            const { groupId, addonId } = addonCombination

            if (selectedItemVariantGroupMapper.hasOwnProperty(pVariationId)) {
              selectedItemVariantGroupMapper[pVariationId]['addons'] = [...selectedItemVariantGroupMapper[pVariationId]['addons'], addonId]
            } else {
              selectedItemVariantGroupMapper[pVariationId] = { 'variations': [], 'addons': [] }
            }
          }
        }
      }
    }
  }


}

function showCartAlert(message, type = 'success', element = 'cart-alert') {
  const alertBox = document.getElementById(element);
  alertBox.className = `alert alert-${type}`; // Bootstrap alert classes: success, danger, warning, info
  alertBox.innerText = message;
  alertBox.classList.remove('d-none');

  // Auto-hide after 3 seconds (optional)
  setTimeout(() => {
    alertBox.classList.add('d-none');
  }, 3000);
}

function confirmRestaurantSwitch() {
  return new Promise((resolve) => {
    const modal = new bootstrap.Modal(document.getElementById('restaurantSwitchModal'));
    modal.show();

    $('#confirmSwitch').off().on('click', function () {
      modal.hide();
      resolve(true);
    });

    $('#cancelSwitch').off().on('click', function () {
      modal.hide();
      resolve(false);
    });
  });
}

function calculateVariantTotal() {
  const { selectedItem, variants, addons, quantity } = tempCartItem
  let basePrice = selectedItem['finalPrice'] || selectedItem['price'] || selectedItem['defaultPrice'] || 0;
  let variantsCost = []
  if (selectedItem['variantsV2'] && selectedItem['variantsV2']['pricingModels']) {
    for (const model of selectedItem['variantsV2']['pricingModels']) {
      let matched = true;
      const { variations } = model

      for (const variation of variations) {
        const { groupId, variationId } = variation;
        if (!variants[groupId] || variants[groupId] != variationId) {
          matched = false;
          break;
        }
      }

      if (matched) {
        let price = model['finalPrice'] && model['finalPrice']['units'] ? model['finalPrice']['units'] + '00' : (model['price'] ? model['price'] : basePrice);
        variantsCost.push(price);
        break;
      }
    }
  }

  basePrice = variantsCost.length ? Math.max(...variantsCost) : basePrice;

  // calculate the addon cost
  let addonsCost = 0;
  if (selectedItem['addons'] && Array.isArray(addons)) {
    for (const addon of addons) {
      for (const itemAddon of selectedItem['addons']) {
        if (itemAddon['groupId'] == addon['groupId']) {
          const { choices } = itemAddon;
          for (const choice of choices) {
            const { id, isEnabled, inStock, price } = choice
            if (
              id == addon['variantId'] &&
              isEnabled &&
              inStock
            ) {
              addonsCost += price;
            }
          }
        }

      }

    }
  }

  let totalPrice = ((basePrice + addonsCost) * quantity) / 100;
  $('.item-final-cost').html(`&#8377;${totalPrice}`)
  $('.item-final-cost').attr('data-price', totalPrice)

}

function nextStep(index) {
  const nextTab = new bootstrap.Tab(document.querySelectorAll('#stepperTabs button')[index]);
  nextTab.show();
}

function prevStep(index) {
  const prevTab = new bootstrap.Tab(document.querySelectorAll('#stepperTabs button')[index]);
  prevTab.show();
}


$(document).ready(function () {
  // increment
  $(document).on('click', '.increment', function () {
    var countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
    var currentCount = parseInt(countSpan.text());
    countSpan.text(currentCount + 1);
    tempCartItem['quantity'] = tempCartItem['quantity'] + 1
  });

  // Decrement
  $(document).on('click', '.decrement', function () {
    var countSpan = $(this).closest('.dbDkWc').siblings('.jkCXbu').find('.item-count');
    var currentCount = parseInt(countSpan.text());
    if (currentCount > 0) {
      countSpan.text(currentCount - 1);
      tempCartItem['quantity'] = tempCartItem['quantity'] - 1
    }
  });

  // add to cart modal  
  $(document).on('click', '.add_to_cart', async function () {
    const id = $(this).attr('data-id')
    let hasAddons = $(this).data('hasAddons');
    selectedItemVariantGroupMapper = {}
    let triggerId = 0

    if (cart.length && cart[0]['restaurantId'] != restaurantDetails['id']) {
      const confirmed = await confirmRestaurantSwitch();
      if (!confirmed) return; // Exit if user declines
      $('#cart-empty').trigger('click')
    }



    if (id && hasAddons) {
      const selectedMenuItem = menuItemDetails[id]
      tempCartItem['selectedItem'] = selectedMenuItem;
      tempCartItem['quantity'] = 1;
      tempCartItem['itemId'] = id
      tempCartItem['restaurantId'] = restaurantDetails['id']
      tempCartItem['lat'] = restaurantDetails['lat']
      tempCartItem['lng'] = restaurantDetails['lng']
      tempCartItem['restaurantName'] = restaurantDetails['restaurantName']


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
        triggerId = generateSteps(variantsV2)
        hasVariants = true
      }

      if (Array.isArray(addons) && addons.length) {
        generateAddons(addons)
      }
      selectAllAddonsAndVariants(selectedMenuItem)
      //$('#hoteladdpopupModal').show();
      $('#hoteladdpopupbox').show();
      let tabCount = $('.tab-pan').length;
      $('.tb-content > .tab-pan:first-child').addClass('active')
      if (tabCount == 1) {
        if ($('.tab-pan').hasClass('addon-container')) {
          $('#step-count').html(``)
          $('#step-count').attr('data-total-step', 0)
        }
        $('.tb-prev').addClass('hide')
        $('.tb-next').addClass('hide')
        $('.submitbtn').removeClass('hide')
      }
      calculateVariantTotal();

    } else {
      $(this).next('.item-counter').find('.direct-increment').trigger('click');
      $(this).next('.item-counter').removeClass('d-none');
      $(this).addClass('d-none')
    }

    const el = document.querySelector(`.variants[data - variant - id= "${triggerId}"]`);
    if (el) {
      el.dispatchEvent(new Event('change', { bubbles: true }));
    }
  });

  // clear everything
  $('.add-to-cart-close').on('click', function () {
    $('.item-addons').empty();
    $('.item-variants').empty()
    $('.tb-prev').addClass('hide')
    $('.tb-next').removeClass('hide')
    $('.submitbtn').addClass('hide')
    $('#step-count').html(``)
    $('#step-count').attr('data-total-step', 0)
    $('#hoteladdpopupbox').hide();
    $('.item-final-cost').html(0)
    $('.item-final-cost').attr('data-price', 0)
    clearTempCartItem()

  })

  // on variation changes

  $(document).on('change', '.variants', function () {
    let data = $(this).data()

    let keys = Object.keys(selectedItemVariantGroupMapper)

    if (keys.includes(`${data['variantId']}`)) {

      generateSteps(tempCartItem['selectedItem']['variantsV2'], data['variantId'])
      if (Array.isArray(tempCartItem['selectedItem']['addons']) && tempCartItem['selectedItem']['addons'].length) {
        generateAddons(tempCartItem['selectedItem']['addons'], data['variantId'])
      }

    }

    // select default icons
    if ($('.tab-pan').not('.addon-container').length > 0) {
      let tabPans = $('.tab-pan').not('.addon-container');
      for (const tab of tabPans) {
        let items = $(tab).find('.item-container > .item-');
        let isChecked = false
        if (items.length) {
          for (const item of items) {
            if ($(item).find('.item-check-box > .variants').is(':checked')) {
              let groupId = $(item).find('.item-check-box > .variants').data('group-id')
              let variantId = $(item).find('.item-check-box > .variants').data('variant-id')
              let name = $(item).find('.item-check-box > .variants').data('variant-name')
              tempCartItem['variants'] = { ...tempCartItem['variants'], [groupId]: variantId }
              $('.selected-variant[data-prev-group-id="' + groupId + '"] > .item-variant-name').text(name)
              isChecked = true;
            }
          }
          if (!isChecked) {
            $(tab).find('.item-container > .item-:first-child > .item-check-box > .variants').prop('checked', true)
            let groupId = $(tab).find('.item-container > .item-:first-child > .item-check-box > .variants').data('group-id')
            let variantId = $(tab).find('.item-container > .item-:first-child > .item-check-box > .variants').data('variant-id')
            let name = $(tab).find('.item-container > .item-:first-child > .item-check-box > .variants').data('variant-name')
            tempCartItem['variants'] = { ...tempCartItem['variants'], [groupId]: variantId }
            $('.selected-variant[data-prev-group-id="' + groupId + '"] > .item-variant-name').text(name)
          }
        }
      }
    }

    calculateVariantTotal();

  })

  // on addon changes
  $(document).on('change', '.addons', function () {
    const group = $(this).data('group-id');
    const max = parseInt($(this).data('max'));
    const groupCheckboxes = $(`.addons[data - group - id= "${group}"]`);
    const checkedCount = groupCheckboxes.filter(':checked').length;
    if (checkedCount >= max) {
      groupCheckboxes.not(':checked').prop('disabled', true);
    } else {
      groupCheckboxes.prop('disabled', false);
    }
    let data = $(this).data()
    const { groupId, variantId } = data
    // check if addon exists

    tempCartItem['addons'] = tempCartItem['addons'].filter(addon => addon['variantId'] != variantId)
    if ($(this).is(':checked')) {
      tempCartItem['addons'] = [...tempCartItem['addons'], { groupId, variantId }]
    }

    calculateVariantTotal()

  })


  // add cart data to session 
  $('.add-to-cart').on('click', async function () {
    if (tempCartItem['quantity'] > 0) {
      console.log(tempCartItem)
      // check cart already in cart
      if (tempCartItem['cartId']) {
        cart = updateCartByCartId(cart, tempCartItem)
      }
      else {
        cart = upsertCartItem(cart, tempCartItem);
      }
      addCartToSession()
      await loadStore()
    }
    $('.add-to-cart-close').trigger('click')
  })

  // move to checkout

  $(document).on('click', '#cart-continue', function () {
    window.location.href = baseUrl + '/checkout.php'
  })

  // clear cart
  $(document).on('click', '#cart-empty', function () {
    fetch(cartUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ action: 'clear' })
    }).then(response => response.json())
      .then(data => {
        if (data.success) {
          showCartAlert('Cart cleared successfully!', 'success');
          $('.cart-data').empty();
          $('.item-count').text(0)
          addCartCount(0)
          clearCart()
          toggleCartData()
          toggleCartEmptyMsg(false)
        } else {
          showCartAlert('Error clearing cart: ' + data.message, 'danger');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showCartAlert('Something went wrong.', 'danger');
      });

  })

})