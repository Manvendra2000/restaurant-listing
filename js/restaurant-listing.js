
let locationLat = '';
let collection = '';
let locationLng = '';
let securityToken = '';
let nextPageoffset = ''
let nextWidgetOffset = {}

function generateHeader(header, container = 'restaurantlisting') {
    if (window.location.href.toLowerCase().includes("restaurants") && new URLSearchParams(window.location.search).has("collection_id")) {
        document.title = "Explore " + header.title + " | Jio Eat – Order Your Favorite Cuisines Online";

        let $meta = $('meta[name="description"]');
        const newDescription = "Browse by cuisine, cravings, or mood—Jio Eat brings you handpicked food categories from top restaurants. Whether it's biryani, pizza, or street food, enjoy faster delivery and better deals.";

        if ($meta.length) {
            $meta.attr("content", newDescription);
        } else {
            $('<meta name="description">').attr("content", newDescription).appendTo("head");
        }
    }

    const { title } = header
    const span = `<span class="ifRNUd TjEFb _hh11tt"
 >${title}</span >`
    $(`#${container}`).append(span)
}

/**
 * Returns restaurant details
 * @param {*} restaurants 
 * @returns Array of Restaurants
 */
function getRestuarantData(restaurants) {
    return restaurants.map(res => res.info)
}

function generateRestaurantTileHTML(restaurant, lat, lng) {
    const {
        name = "",
        avgRating = "",
        sla = {},
        totalRatingsString = "",
        cloudinaryImageId = "",
        id,
        cuisines,
        areaName,
    } = restaurant;

    const optimizedImageUrl = cloudinaryImageId
        ? `https://media-assets.swiggy.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_400,h_300,c_fill/${cloudinaryImageId}`
        : '../images/food-placeholder.jpg';

    return `
<div class="unique-box-card col-xs-3 col-sm-6 col-md-3 co-lg-3 px-1" onclick="location.href='${baseUrl}/restaurant?menuId=${id}'" style="cursor: pointer;">
  <div class="button kuSKyA" style="overflow: hidden; border-radius: 0px;">
    <a href="${baseUrl}/restaurant?menuId=${id}" class="sc-db8c6f48-0 egXQHq sc-6065b21f-1 klgOnn" style="display: block;">
      <div style="width: 100%; aspect-ratio: 4/3; overflow: hidden; border-radius: 0px; position: relative;">
        <img loading="lazy" src="${optimizedImageUrl}" alt="" style="width: 100%; height: 100%; object-fit: cover; display: block;" class="styles__StyledImg-sc-1322bgy-0 dfviTz">
        <div style="position: absolute; bottom: -5px; right: -5px; background: white; padding: 4px 8px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); font-size: 12px; text-align: center; line-height: 1.2;">
          <div style="color: #444649;"><strong>${sla.deliveryTime} MINS</strong></div>
          <div style="color: #FF5200; font-size: 11px;"><strong>FREE DELIVERY</strong></div>
        </div>
      </div>
    </a>
  </div>
  <div class="dhyst cWZKtF">
    <div class="VrKMr sc-6065b21f-3">
      <span class="Text-sc-1nm69d8-0 sc-6065b21f-19 icqidx">${name}</span>
    </div>
    <div class="sc-6065b21f-14 fXeQrN">
      <span class="Text-sc-1nm69d8-0 sc-6065b21f-17 fRCMLg">
        <div class="InlineChildren__StyledInlineChildren-sc-6r2tfo-0 fERnCr">
          <div class="sc-e2afe347-2 hAoiGj">
            <div class="llWHbj sc-cfbb81c7-0 gNMzQP">
              <div class="fERnCr">
                 <span class="fRCMLg d-inline-flex align-items-center">${avgRating ? `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true" strokeColor="rgba(2, 6, 12, 0.92)" fillColor="rgba(2, 6, 12, 0.92)"><circle cx="10" cy="10" r="9" fill="url(#StoreRating20_svg__paint0_linear_32982_71567)"></circle><path d="M10.0816 12.865C10.0312 12.8353 9.96876 12.8353 9.91839 12.865L7.31647 14.3968C6.93482 14.6214 6.47106 14.2757 6.57745 13.8458L7.27568 11.0245C7.29055 10.9644 7.26965 10.9012 7.22195 10.8618L4.95521 8.99028C4.60833 8.70388 4.78653 8.14085 5.23502 8.10619L8.23448 7.87442C8.29403 7.86982 8.34612 7.83261 8.36979 7.77777L9.54092 5.06385C9.71462 4.66132 10.2854 4.66132 10.4591 5.06385L11.6302 7.77777C11.6539 7.83261 11.706 7.86982 11.7655 7.87442L14.765 8.10619C15.2135 8.14085 15.3917 8.70388 15.0448 8.99028L12.7781 10.8618C12.7303 10.9012 12.7095 10.9644 12.7243 11.0245L13.4225 13.8458C13.5289 14.2757 13.0652 14.6214 12.6835 14.3968L10.0816 12.865Z" fill="white"></path><defs><linearGradient id="StoreRating20_svg__paint0_linear_32982_71567" x1="10" y1="1" x2="10" y2="19" gradientUnits="userSpaceOnUse"><stop stop-color="#21973B"></stop><stop offset="1" stop-color="#128540"></stop></linearGradient></defs></svg>   <span class="_neonc">
 ${avgRating}` : ''}</span></span></div>
              <span class="Text-sc-1nm69d8-0 sc-cfbb81c7-1 fRCMLg _neonc">${totalRatingsString ? `(${totalRatingsString})•` : ''}</span>
            </div>
          </div>
          <div class="hAoiGj">
            <div class="jjYftL"><span class="Text-sc-1nm69d8-0 sc-6065b21f-17 buvHZf _neonc">${sla.lastMileTravelString || ''}</span></div>
          </div>
        </div>
      </span>
    </div>
    <div class="sc-6065b21f-14 fXeQrN">
      <span class="fRCMLg">${Array.isArray(cuisines) && cuisines.length ? cuisines.join(', ') : ''}</span>
      <span class="fRCMLg">${areaName || ''}</span>
    </div>
    <div class="SiLA-DSJ">
      <div class="sc-6065b21f-14 fXeQrN"></div>
    </div>
  </div>
</div>`;
}
function generateRestaurantTiles(restaurants, location, container = 'restaurantlisting') {
    const listingtitle = document.getElementById(container);
    const { lat, lng } = location;
    if (!listingtitle) return;

    let tilesHTML = '';
    restaurants.forEach(restaurant => {
        tilesHTML += generateRestaurantTileHTML(restaurant, lat, lng);
    });

    $(`#${container}`).append(tilesHTML);
}

/**
 * Generate Restaurant Tiles
 * @param {*} restaurants 
 * @param {*} location 
 * @param {*} container 
 */

// function generateRestaurantTiles(restaurants, location, container = 'restaurantlisting') {

//     const listingtitle = document.getElementById(container)
//     const { lat, lng } = location
//     if (listingtitle) {
//         restaurants.forEach(restaurant => {
//             generateRestaurantTile(restaurant, lat, lng)
//         })
//     }

// }



/**
 * Generate Food Labels Slider
 * @param {*} gridElements 
 */

function generateImageLabel(gridElements) {
    let labelDiv = ''
    gridElements.forEach(gridElement => {
        const { imageId, action } = gridElement
        if (imageId) {
            const labelImageUrl = imageUrl + imageId
            labelDiv += `<div class="slide collection" >
    <a href="${appendParamsToUrl(window.location.href, getParamFromUrl(action?.link))}"><img loading="lazy" src="${labelImageUrl}" class="img-fluid" /></a>
                          </div > `

        }
    })
    const targetDiv = $('#foodmenu')
    if (targetDiv) {
        targetDiv.slick('slickAdd', labelDiv)
    }
}


// for the upper part
/**
 * Generate Food Labels Slider
 * @param {*} gridElements 
 */

function generateImageLabel(gridElements) {
    let labelDiv = ''
    gridElements.forEach(gridElement => {
        const { imageId, action } = gridElement
        if (imageId) {
            const labelImageUrl = imageUrl + imageId
            labelDiv += `<div class="slide collection" >
    <a href="${appendParamsToUrl(window.location.href, getParamFromUrl(action?.link))}"><img loading="lazy" src="${labelImageUrl}" class="" loading="lazy"  /></a>
                          </div > `

        }
    })
    const targetDiv = $('#foodmenu1')
    if (targetDiv) {
        targetDiv.html(labelDiv)
    }
    
}


function showMoreTiles() {
    var hasSent = false;
    // scrolling for restaurant page
    $(window).on("scroll", async function () {
        if (hasSent) return;
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            hasSent = true;
            showLoader();
        //    const { data } = await queuedFetchMoreRestaurants(locationLat, locationLng, nextPageoffset, nextWidgetOffset)

        const res = await fetch('/demo3/php/fetch-restro.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
              offset: nextPageoffset,
              csrfToken: securityToken
            })
          });
          const { data } = await res.json();
            if (data?.cards) {
                const { pageOffset, cards } = data
                nextPageoffset = pageOffset && pageOffset.nextOffset ? pageOffset.nextOffset : ''
                nextWidgetOffset = pageOffset && pageOffset.widgetOffset ? pageOffset.widgetOffset : ''

                cards?.forEach(card => {
                    if (card.card && card.card.card) {
                        const restaurantCards = card.card.card;
                        if (restaurantCards['@type'] === 'type.googleapis.com/swiggy.gandalf.widgets.v2.GridWidget') {
                            const gridElements = restaurantCards['gridElements'];

                            if (gridElements.infoWithStyle && gridElements.infoWithStyle['@type'] == "type.googleapis.com/swiggy.seo.widgets.v1.FoodRestaurantGridListingInfo" && gridElements.infoWithStyle.restaurants) {
                                let restaurantsData = gridElements.infoWithStyle.restaurants
                                generateRestaurantTiles(getRestuarantData(restaurantsData), { lat: locationLat, lng: locationLng }, 'restaurantlisting')
                            }
                        }
                        // show tiles for collection 
                        if (restaurantCards['@type'] == "type.googleapis.com/swiggy.presentation.food.v2.Restaurant") {
                            generateRestaurantTile(restaurantCards.info, locationLat, locationLat)
                        }
                    }
                })
            }
            showLoader(false)
            hasSent = false;
        }
    });
}

$(document).ready(async function () {
    if (window.location.href.toLowerCase().includes("restaurants") && !new URLSearchParams(window.location.search).has("collection_id")) {
        document.title = "Browse Restaurants Near You | Jio Eat – Order Food Online in Minutes";

        let $meta = $('meta[name="description"]');
        const newDescription = "Explore top-rated restaurants near you on Jio Eat. From local favorites to popular chains, discover delicious meals delivered fast. Better prices & deals. —order now!";

        if ($meta.length) {
            $meta.attr("content", newDescription);
        } else {
            $('<meta name="description">').attr("content", newDescription).appendTo("head");
        }
    }


    showLoader()
   // const response = await fetchRestaurantsAtLocation()

//    const response = await fetch('/demo3/php/fetch-restro.php', {
//     method: 'POST',
//     headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
//     body: new URLSearchParams({
//       offset: nextPageoffset,
//       csrfToken: securityToken
//     })
//   });

  const response = await fetch('/demo3/php/fetch-restro.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      offset: nextPageoffset,
      csrfToken: securityToken
    })
  });
  
  const swiggyData = await response.json();
  
  // now safely:
  const { cards, pageOffset } = swiggyData?.data || {};
  
  // const json = await response.json();

    if (!response) {
    console.warn("No response from fetchRestaurantsAtLocation");
    showLoader(false);
    return;
    }
    // const { data, lat, lng } = response
    const { data } = swiggyData || {};
const lat = data?.lat || 0;
const lng = data?.lng || 0;
    setCookie(`door-dash-user-location`, JSON.stringify({ lat, lng }))
    // const { cards, pageOffset } = data
    locationLat = lat
    locationLng = lng
    nextPageoffset = pageOffset && pageOffset.nextOffset ? pageOffset.nextOffset : ''
    nextWidgetOffset = pageOffset && pageOffset.widgetOffset ? pageOffset.widgetOffset : {}
    cards?.forEach(card => {
        if (card.card && card.card.card) {
            const restaurantCards = card.card.card;
            if (restaurantCards['@type'] === 'type.googleapis.com/swiggy.gandalf.widgets.v2.GridWidget') {
                const gridElements = restaurantCards['gridElements'];

                if (gridElements.infoWithStyle && gridElements.infoWithStyle['@type'] == "type.googleapis.com/swiggy.gandalf.widgets.v2.ImageInfoLayoutCard" && gridElements.infoWithStyle['info']) {
                    generateImageLabel(gridElements.infoWithStyle['info'])
                }

                if (gridElements.infoWithStyle && gridElements.infoWithStyle['@type'] == "type.googleapis.com/swiggy.seo.widgets.v1.FoodRestaurantGridListingInfo" && gridElements.infoWithStyle.restaurants) {
                    let restaurantsData = gridElements.infoWithStyle.restaurants
                    generateRestaurantTiles(getRestuarantData(restaurantsData), { lat, lng }, 'restaurantlisting')
                }
            }
            if (restaurantCards['@type'] == "type.googleapis.com/swiggy.seo.widgets.v1.BasicContent" || restaurantCards['@type'] == "type.googleapis.com/swiggy.gandalf.widgets.v2.CollectionMasthead") {
                generateHeader({ title: restaurantCards['title'] }, 'restaurantlisting')
            }

            if (restaurantCards['@type'] == "type.googleapis.com/swiggy.presentation.food.v2.Restaurant") {
                generateRestaurantTile(restaurantCards.info, lat, lng)
            }

        }
    });
    showLoader(false)
    showMoreTiles()
});
