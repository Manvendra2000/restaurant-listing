function showResults(places) {
  
  if (!places || places.length === 0) {
    $('#autocomplete_search').removeClass('show').css('opacity', '0');
    return;
}

    $('.autocomplete').empty()
    let listElement = ``

    for (const item of places) {
        const { structured_formatting, description } = item
        if (structured_formatting) {
            const { main_text, secondary_text } = structured_formatting;

            listElement += `<li data-place="${description}">
                              <a class="dropdown-item">
                                 <div class="bYtiER cNPvKQ p-0">
                                   <div class="cJxGCl jYnMxm">
                                      <span class="laMCcm">
                                          <span class="eXHxDy">${main_text}</span>
                                      </span>
                                      <span class="griaXr">
                                           <span class="ihwIef">${secondary_text}</span>
                          </span>
                                   </div>
                                   <div size="24" class="hDUGcc"><i class="bi bi-chevron-right"></i></div>
                                  </div>
                                </a>
                               <div class="bdHLIo">
                                   <hr class="WECHv">
                                </div>
                             </li>`
}

    };
    $('.autocomplete').prepend(listElement);
     $('#autocomplete_search').css('opacity', '1');

    //  to prevent unnecessary dropdown
     if (places.length === 0) {
      $('#autocomplete_search').removeClass('show').css('opacity', '0');
      return;
    }

}

function debounce(fn, delay) {
  let timer;
  return function (...args) {
      clearTimeout(timer);
      timer = setTimeout(() => fn.apply(this, args), delay);
  };
}

function autoComplete() {
  $('.address-search-input').on('keyup', debounce(async function () {
    const query = $(this).val().trim();

    if (query.length <= 1) {
        $('#autocomplete_search').removeClass('show').css('opacity', '0');
        return;
    }

    try {
        const data = await fetchPlaces(query);
        showResults(data);
    } catch (error) {
        $('#autocomplete_search').removeClass('show').css('opacity', '0');
        console.error('Error fetching autocomplete data:', error);
        $('#autocompleteResults').addClass('d-none');
    }
}, 400));
}


const placeCache = {};

async function fetchPlaces(query) {
  if (placeCache[query]) return placeCache[query]; // 🗂️ return cached if exists

  const basePath = window.location.pathname.split('/')[1]; // gets 'demo3' or ''
  const prefix = basePath && basePath !== 'restaurants' ? `/${basePath}` : '';
  const res = await fetch(`${prefix}/server.php?action=fetch-places&input=${encodeURIComponent(query)}`);
  const json = await res.json();
  const result = json.data?.data || [];

  placeCache[query] = result; // 🗃️ store in cache
  return result;
}

$(document).ready(function () {
    const searchBox = $('.address-search-input');

    const autocomplete_search = $('#autocomplete_search').removeClass('show');

// $('#dropdownMenuButton1').on('focus', function() {
//        $('#autocomplete_search').css('opacity', '0');
//   });

//   $('#dropdownMenuButton1').on('click', function() {
//      $('#autocomplete_search').css('opacity', '0');
//   });

  $('#dropdownMenuButton1').on('input', function () {
    const val = $(this).val();
    if (val.length > 0) {
      $('#autocomplete_search').css('opacity', '1').show(); // Show dropdown
    } else {
      $('#autocomplete_search').css('opacity', '0').hide(); // Hide if input is empty
    }
  });

    if (searchBox) {
        autoComplete()
    }

    $(document).on('click', '.autocomplete li', function () {
        let location = $(this).data('place')
        setCookie(`door-dash-place`, encodeURIComponent(location))
        $('.address-search-input').val(location)
        if ($('.address-search-input').hasClass('not-index')) {
            $('form.nav-search').submit()
        }
    })

})


$('#findFoodBtn').on('click', function () {
  const error = $('#address-error');
  error.stop(true, true).text('Type and search a valid place from dropdown').fadeIn(200);

  setTimeout(() => {
    error.fadeOut(500);
  }, 2500);
});
