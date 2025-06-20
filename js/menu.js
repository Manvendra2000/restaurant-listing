let restaurantDetails = {}
let menuItemDetails = {};
let menuId = '';
let selectedMenuItem = {}

let tempCartItem = {
    itemId: 0,
    restaurantId: 0,
    restaurantName: '',
    lat: '',
    lng: '',
    addons: [],
    variants: {},
    selectedItem: {},
    quantity: 0
}

function creatMenuItem(menuItem) {
    const defaultImage = baseUrl + '/images/food-placeholder.jpg'
    const vegImage = baseUrl + '/images/veg-icon.png'
    const nonVegImg = baseUrl + '/images/non-veg-icon.png'
    const {
        id = 0,
        name = "",
        ratings = {},
        price = 0,
        defaultPrice = 0,
        finalPrice = 0,
        description = "",
        variantsV2,
        addons,
        imageId,
        isVeg,
        isBestseller
    } = menuItem
    menuItemDetails[id] = menuItem

    let hasAddons = Array.isArray(addons) || (variantsV2 && isNonEmptyObject(variantsV2))
    let hasMultiples = false
    let itemInCart = cart.find(cartItem => cartItem.itemId == id)
    let quantity = 0
    if (hasAddons) {
        let items = cart.filter(cartItem => cartItem.itemId == id)
        if (items.length > 1) hasMultiples = true
        quantity = items.reduce((a, c) => a + c.quantity, quantity)
    } else {
        quantity = itemInCart?.quantity
    }

    let parsedPrice = generatePrice(finalPrice || price || defaultPrice || 0)

    let divHtml = `<div class="col-xs-3 col-sm-12 col-md-6 co-lg-3 px-1 mb-2">   
    <div class="EuBJE giaTF">
       <div class="sc-25f4613c-0 kdueWe">
                <div class="bJJcJQ ${isBestseller ? '' : 'd-none'}">
                   <div class="feKgxz">
                      <span class="dRObSZ">Bestseller</span>
                   </div>
                </div>
          <div class="hdJcwp">
             <div class="gBYSqa">
                <span class="dTphbq fLCULA"><img style="width:20px" src="${isVeg ? vegImage : nonVegImg}" /> ${name}</span>
             </div>
          </div>
          <div class="bmcPch">
             <span class="bvPxgl">${description}</span>
          </div>
          <div class="llWHbj">
             <div class="bmcPch">
                <div class="iFDmLn cEzhgx">
                   <span class="hSwXML">
                    &#8377;${generateDiscountPrice(parsedPrice)} <s>&#8377;${parsedPrice}</s>
                    </span>
                   &nbsp;`
    if (ratings.aggregatedRating.rating) {
        divHtml += `<span class="Text-sc-1nm69d8-0 ihwIef">
                      <div class="VrKMr">
                         <span class="fNDtuN">
                            <i class="bi bi-star-fill"></i>
                             
                            ${ratings.aggregatedRating.rating || 0}
                         </span>
                      </div>
                   </span>`
    }
    divHtml += `</div>
             </div>
          </div>
          <div class="iFDmLn sc-62c92bd3-1 bYrinO">
             <div class="gyNqUs">
                <div style="float: right;margin-left: 10px;">`

    divHtml += `<button class="eVspj-z add_to_cart ${itemInCart && quantity ? 'd-none' : ''}" data-has-addons="${!!hasAddons}" data-id="${id}" type="button">ADD</button>`

    // item-counter
    divHtml += `<div class="${itemInCart && quantity ? '' : 'd-none'} item-counter cNjEpU _oopptt" >
                     <div class="dbDkWc">
                         <div class="jAnJQE">
                         ${hasMultiples
            ? `<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="This item has multiple customizations added. Remove the correct item from the cart.">
                                 <button class="dJQkyG direct-decrement" disabled data-id="${id}" type="button" style="pointer-events: none;">
                                   <i class="bi bi-dash"></i>
                                 </button>
                               </span>`
            : `<button class="dJQkyG decrease-btn direct-decrement" data-has-addons="${!!hasAddons}" data-id="${id}" type="button">
                                 <i class="bi bi-dash"></i>
                               </button>`}  
                         </div>
                     </div>
                     <div class="jkCXbu">
                         <span class="dqXImC ipPFp">0</span>
                         <div class="sc-3a459591-6 gJtDdY">
                             <span class="dqXImC gOIicc item-count" data-menu-item-id="${id}">${itemInCart ? quantity : 0}</span>
                         </div>
                     </div>
                     <div class="dbDkWc">
                         <div class="jAnJQE prism-theme">
                             <button class="dJQkyG increase-btn direct-increment" type="button" data-has-addons="${!!hasAddons}" data-id="${id}">
                                 <i class="bi bi-plus"></i>
                             </button>
                         </div>
                     </div>
                 </div>`
    // item counter

    if (hasAddons) {
        divHtml += `<span style="font-size:0.8rem">Customizable</span>`
    }
    divHtml += `</div>
                
             </div>
          </div>
       </div>`;
    if (imageId) {
        divHtml += `
         <div class="dBDJfH">
            <div class="nbyWw">
                <div class="ratio ratio-1x1">
                <img src="${!!imageId ? imageUrl + imageId : defaultImage}">
                </div>
            </div>
       </div>`
    }
    divHtml += `</div>
 </div>`
    return divHtml
}


function createMenuRow(categories, menuItems) {


    Object.values(categories).forEach(category => {

        const { id, title } = category
        const menu = menuItems[id]
        let divHtml = `<div class="row mb-3 g-3">`

        divHtml += ` <div class="eRuPEEs" id="${id}">
                            <span class="ifRNUd TjEFb _hh11t2">${title}
                                <p tabindex="-1" class="Text-sc-1nm69d8-0 ihwIef"></p>
                            </span>
                    </div>`;


        menu.forEach((menuItem, index) => {
            divHtml += creatMenuItem(menuItem)
        })

        divHtml += `</div>`


        $('#restaurant-menu').append(divHtml)

    })
}


function generateHours(nextCloseTime) {
    let date = new Date(nextCloseTime);
    let hours = date.getHours();
    let minutes = date.getMinutes().toString().padStart(2, '0');
    let period = hours >= 12 ? 'pm' : 'am';
    let hour12 = hours % 12 || 12; // convert 0  12
    let formattedTime = `${hour12}:${minutes} ${period}`;
    return formattedTime
}


function generateStoreInfo(data) {
    const {
        id = 0,
        name = "Unknown Restaurant",
        cuisines = [],
        costForTwoMessage = "Cost for Two: Unknown",
        cloudinaryImageId = "",
        availability = {},
        avgRating = "N/A",
        sla = {},
        badges = {},
        aggregatedDiscountInfo = {},
        areaName = "Unknown Area",
        latLong = '',
        totalRatingsString = "No ratings",
    } = data?.cards[2]?.card?.card?.info || {};

    const url = window.location.href.toLowerCase();


    // Set Page Title
    if (name) {
        document.title = `${name} | Dunzo café – Premium Food Delivery Experience`;

        // Meta Description
        const description = `Discover ${name} handpicked selection of India’s finest restaurants on Dunzo café. Experience gourmet flavors, exclusive deals, and lightning-fast delivery.`;

        // Update or add meta description
        let $meta = $('meta[name="description"]');
        if ($meta.length) {
            $meta.attr("content", description);
        } else {
            $('<meta name="description">').attr("content", description).appendTo("head");
        }
    }


    let latLongData = latLong.split(',');
    restaurantDetails['id'] = id;
    restaurantDetails['lat'] = latLongData[0];
    restaurantDetails['lng'] = latLongData[1];
    restaurantDetails['restaurantName'] = name;
    menuId = id

    const {
        deliveryTime = "Unavailable",
        lastMileTravelString = "Unknown distance",
        minDeliveryTime = 0
    } = sla;
    const imgUrl = `https://media-assets.swiggy.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_660/${cloudinaryImageId}`
    let today = new Date();
    today.setHours(23, 59, 59, 0);
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const day = String(today.getDate()).padStart(2, '0');

    const dateTimeString = `${year}-${month}-${day} 23:59:59`;

    const { nextCloseTime = dateTimeString, opened, nextOpenTime } = availability

    $('#restaurant-name').html(name)
    $('#restaurant-name-info').html(name)
    $('#restaurant-breadcrumb').html(name)

    $('#restaurant-rating').html(avgRating)
    $('#restaurant-total-rating').html(`(${totalRatingsString})`)
    $('#restaurant-search').attr('placeholder', `Search ${name}`)
    $('#restaurant-image').attr('src', imgUrl)
    $('#restaurant-delivery-time').html(`Delivers by ${generateHours(nextCloseTime)}`)
    $('#restaurant-cuisines').html(cuisines.join(' ,'))
    $('#restaurant-distance').html(lastMileTravelString)
    if (opened) {
        $('#restaurant-status').html("Open")
        let time = generateHours(nextCloseTime)
        $('#restaurant-delivery-time').html(`Delivers by ${time}`)
    }
}


function generateCategories(data) {
    let categories = data?.cards[4]?.groupedCard?.cardGroupMap?.REGULAR?.cards.filter(
        (c) =>
            c.card?.card?.["@type"] ===
            "type.googleapis.com/swiggy.presentation.food.v2.ItemCategory"
    );


    return Array.isArray(categories) && categories.length ? categories : []

}


function injectMenuSlider(menuCategories) {
    const container = document.getElementById('foodmenuresponsiveslider1');
    if (!container) return;
  
    container.innerHTML = ''; // Optional: clear old items
    const currentParams = window.location.search;
    const basePath = window.location.pathname;
  
    menuCategories.forEach(({ title, id }) => {
      const categoryUrl = `${basePath}${currentParams}#${id}`;
      const html = `
        <a href="${categoryUrl}" class="category-link">
          <h5 class="mt-2 text-secondary " style="font-size: 14px; font-weight: 200;" >${title}</h5>
        </a>`;
      container.insertAdjacentHTML('beforeend', html);
    });
  }




async function fetchMenu(menuId, lat, lng, query = null) {
    if (!menuId) return;
    let menuCategories = {};
    let menu = {};
    $('#restaurant-menu').empty();
    $('#restaurant-categories').empty()
    try {

        const data = await queuedFetchMenuData(menuId, lat, lng, query)

        if (data) {
            if (query) {
                let divHtml = `<div class="row mb-3">`;
                data?.cards.forEach(card => {

                    const dishCard = card?.card?.card

                    if (dishCard["@type"] == "type.googleapis.com/swiggy.presentation.food.v2.Dish") {
                        divHtml += creatMenuItem(dishCard['info'])
                    }

                })
                divHtml += '</div>';
                $('#restaurant-menu').append(divHtml)
                return
            }

            generateStoreInfo(data)
            let categories = generateCategories(data)
            if (categories) {
                menuCategories = categories.map((category, index) => ({
                    title: category?.card?.card?.title, id: category?.card?.card?.categoryId
                }
                ))
                categories.forEach((category, index) => {
                    const items = category?.card?.card?.itemCards
                    const id = category?.card?.card?.categoryId
                    items.forEach(item => {
                        if (item.card['@type'] == "type.googleapis.com/swiggy.presentation.food.v2.Dish") {
                            if (menu[id]) {
                                menu[id] = [...menu[id], item.card.info]
                            } else {
                                menu[id] = [item.card.info]
                            }
                        }
                    })
                })
            }

            Object.values(menuCategories).forEach((category) => {
                const { title, id } = category
                const currentParams = window.location.search; // includes ? and params
                const basePath = window.location.pathname;
                const categoryUrl = `${basePath}${currentParams}#${id}`;
                const divHTML = `<li><a href="${categoryUrl}">${title}</a></li>`
                // const responsiveHtml = `<div class="slide"><h3 class="mt-2 JtOXi">${title}</h3></div>`
                const responsiveHtml = `<div class="slide"><a href="${categoryUrl}"><h3 class="mt-2 text-secondary JtOXi">${title}</h3></a></div>`;

                $('#foodmenuresponsiveslider').append(responsiveHtml)
                // injectMenuSlider(menuCategories);
                $('#restaurant-categories').append(divHTML)

            })
            injectMenuSlider(menuCategories);
            createMenuRow(menuCategories, menu)
        }

    } catch (error) {
        console.error('Error fetching Menu:', error);
        //resultsBox.hidden = true;
    }
}



function getParams() {
    const urlParams = new URLSearchParams(window.location.search);
    const menuId = urlParams.get('menuId');
    const coordinates = getCookie('door-dash-user-location');
    const location = decodeURIComponent(coordinates);
    const { lat, lng } = JSON.parse(location)
    return { menuId, lat, lng }
}


$(document).ready(async function () {
    const { menuId, lat, lng } = getParams()

    showLoader()
    await fetchMenu(menuId, lat, lng)
    showLoader(false)

    $('#restaurant-search').on('keyup', async function () {
        let query = $(this).val().trim();
        const { menuId, lat, lng } = getParams()
        if (query.length < 2) {
            query = null
        }

        try {
            $('#restaurant-categories').empty()
            $('#restaurant-menu').empty();

            showLoader()
            await fetchMenu(menuId, lat, lng, query)
            showLoader(false)
        } catch (error) {
            console.error('Error fetching menu data data:', error);
        }

    });
    $(".tb-next").click(function (event) {
        event.preventDefault();
        let cur = $(this).closest("#tabArea").find(".tab-pan.active");
        if ($(cur).next().length > 0) {
            $(".tb-prev").addClass("hide");
            $(".tab-pan").removeClass("active");
            $(cur).next().addClass("active");
            if (!$(cur).next().hasClass('addon-container')) {
                let index = $(cur).next().find('.item-container').data('index')
                let totalSteps = $('#step-count').data('total-step')
                $('#step-count').html(`Step ${index}/${totalSteps}`)
            } else {
                $('#step-count').html(``)
            }
        }
        if ($(cur).next().next().length == 0) {
            $(".tb-next").addClass("hide");
            $(".submitbtn").removeClass("hide");
        }
    });

    $(".tb-prev").click(function (event) {
        event.preventDefault();
        let cur = $(this).closest("#tabArea").find(".tab-pan.active");
        if ($(cur).prev().length > 0) {
            $(".submitbtn").addClass("hide");
            $(".tb-next").removeClass("hide");
            $(".tab-pan").removeClass("active");
            $(cur).prev().addClass("active");

            let index = $(cur).prev().find('.item-container').data('index')
            let totalSteps = $('#step-count').data('total-step')
            $('#step-count').html(`Step ${index}/${totalSteps}`)
        }
        if ($(cur).prev().prev().length == 0) {
            $(".tb-prev").addClass("hide");
        }
    });
    $(document).on('click', ".pop-change-btn", function (event) {
        event.preventDefault();
        let cur = $(this).closest("#tabArea").find(".tab-pan.active");
        if ($(cur).prev().length > 0) {
            $(".submitbtn").addClass("hide");
            $(".tb-next").removeClass("hide");
            $(".tab-pan").removeClass("active");
            $(cur).prev().addClass("active");
        }
        if ($(cur).prev().prev().length == 0) {
            $(".tb-prev").addClass("hide");
        }
    });

})