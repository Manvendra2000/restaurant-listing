
const serverUrl = baseUrl + '/server.php';

const cartUrl = baseUrl + '/cart.php';

const imageUrl = 'https://media-assets.swiggy.com/swiggy/image/upload/'

/**
 * getCookie Value
 * @param {*} name 
 * @returns 
 */
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return decodeURIComponent(parts.pop().split(';').shift());
}

function setCookie(name, value, days = 30, path = "/") {
    const expires = new Date(Date.now() + days * 86400 * 1000).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=${path}`;
}

/**
 * This function is used to get response for various api calls
 * @param {*} method 
 * @param {*} data 
 * @returns 
 */

async function generateResponse(method = 'GET', data = {}) {
    let targetUrl = `${serverUrl}`;
    let payload = { method };

    if (method === 'GET' && Object.keys(data).length > 0) {
        const queryParams = new URLSearchParams(data).toString();
        targetUrl += `?${queryParams}`;
    }

    if (method === 'POST') {
        payload['body'] = JSON.stringify(data);
        payload['headers'] = {
            'Content-Type': 'application/json',
        };
    }

    try {
        const response = await fetch(targetUrl, payload);
        const jsonResponse = await response.json();
        console.log(jsonResponse);
        if (jsonResponse.success) {
            return jsonResponse?.data || jsonResponse.success;
        } else {
            return { data: {} };
        }
    } catch (err) {
        return { data: [] };
    }
}


async function addCheckInDetails(details) {
    let body = {
        action: "checkin",
        "fullname": details['checkin-name'],
        "email": details['checkin-email'],
        "phone": details['checkin-phone'],
        "home": details['checkin-house'],
        "road": details['checkin-road'],
        "saveas": details['saveAs'],
    }
    try {
        const response = await generateResponse(
            'POST',
            body
        )
        return response;

    } catch (error) {
        console.error('Error fetching Location:', error);
    }

}




/**
 * This is to run show more for restaurants
 * @param {*} locationLat 
 * @param {*} locationLng 
 * @param {*} nextPageoffset 
 * @param {*} nextWidgetOffset 
 * @returns 
 */

class RequestQueue {
    constructor() {
        this.queue = Promise.resolve();
    }

    add(task) {
        this.queue = this.queue.then(() => task()).catch(() => {});
        return this.queue;
    }
}

const requestQueue = new RequestQueue();

async function fetchMoreRestaurants(locationLat, locationLng, nextPageoffset, nextWidgetOffset) {
    const params = getParamFromUrl(window.location.href);
    let body = {
        action: "fetch-more-restaurants",
        lat: locationLat,
        lng: locationLng,
        nextOffset: nextPageoffset,
        widgetOffset: nextWidgetOffset,
        page_type: "DESKTOP_WEB_LISTING",
        filters: {},
    };
    if (params['collection_id']) body['collection'] = params['collection_id'];
    if (params['tags']) body['tags'] = params['tags'];
    if (params['type']) body['type'] = params['type'];

    try {
        const response = await generateResponse('POST', body);
        return response;
    } catch (error) {
        console.error('Error fetching restaurants:', error);
    }
}

function queuedFetchMoreRestaurants(...args) {
    return requestQueue.add(() => fetchMoreRestaurants(...args));
}


async function fetchMenuData(menuId, lat, lng, search = null) {
    try {
        const params = {
            lat,
            lng,
            restaurantId: menuId,
            action: 'fetch-menu',
        };

        if (search) {
            params.action = 'fetch-menu-search';
            params.isMenuUx4 = true;
            params.query = search;
            params.submitAction = 'Enter';
        } else {
            params['complete-menu'] = true;
            params['page-type'] = 'REGULAR_MENU';
        }

        const { data } = await generateResponse('GET', params);
        return data;
    } catch (error) {
        console.error('Error fetching menu:', error);
    }
}

function queuedFetchMenuData(...args) {
    return requestQueue.add(() => fetchMenuData(...args));
}

/**
 * Get param value from url string
 * @param {*} urlString 
 * @param {*} key 
 * @returns 
 */

function getParamFromUrl(urlString, key = 'all') {


    const url = new URL(urlString);
    if (key == 'all') {
        const params = {};
        for (const [key, value] of url.searchParams.entries()) {
            params[key] = value;
        }
        return params;
    }

    return url.searchParams.get(key);
}

/**
 * This functon will apend params to url
 * @param {string} url 
 * @param {Object} params 
 */

function appendParamsToUrl(url, params) {
    url = new URL(url);
    for (const key in params) {
        url.searchParams.set(key, params[key]);
    }
    return url.toString();

}


/**
 * This function is used to fetch restaurant cards. 
 * @param {*} location 
 * @returns  Object have restaurant details
 */

async function fetchRestaurants(location, additionalParams = null) {
    const { lat, lng } = location

    try {
        let params = {
            action: 'fetch-restaurants',
            lat,
            lng,
            "is-seo-homepage-enabled": true,
            "page_type": "DESKTOP_WEB_LISTING"
        }

        if (isNonEmptyObject(additionalParams)) {
            params = { ...params, ...additionalParams }
        }
        const { data } = await generateResponse('GET', params)
        return { data, lat, lng };

    } catch (error) {
        console.error('Error fetching Location:', error);
    }
}

/**
 * This function is called to get the coordinates of a location
 * @param {*} id Id of the location
 * @returns Object having location coordinates lat and long
 */

async function getCoordinates(id) {
    try {
        const { data } = await generateResponse('GET', { action: 'get-coordinates', place_id: id })
        if (Array.isArray(data) && data.length && data[0].geometry) {
            const { location } = data[0].geometry
            return location
        }
        return data;

    } catch (error) {
        console.error('Error fetching Location:', error);
    }

}

/**
 * This is used to fetch place details 
 * @param {*} query 
 * @returns 
 */

async function fetchPlaces(query) {
    try {
        const { data } = await generateResponse('GET', { action: 'fetch-places', input: query })
        return data
    } catch (error) {
        console.error('Error fetching Location:', error);
    }
}


/**
 * Main function to fetch restaurants from the get parameter (place)
 * @returns 
 */

async function fetchRestaurantsAtLocation() {

    let place = getCookie('door-dash-place')
    place = decodeURIComponent(place)
    let rest = {};

    //const { place, ...rest } = params
    //rest['collection'] = rest['collection_id']
    if (!place) return

    const data = await fetchPlaces(place)
    if (data.length) {
        const params = getParamFromUrl(window.location.href)
        if (params['collection_id']) {
            params['collection'] = params['collection_id'];
        }
        rest = { ...rest, ...params }
        const { place_id } = data[0];
        const coordinates = await getCoordinates(place_id)

        return await fetchRestaurants(coordinates, rest)
    }
    return null;
}