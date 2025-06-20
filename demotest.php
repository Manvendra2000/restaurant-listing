<!DOCTYPE html>
<html>
<head>
  <title>Food Tiles Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    #foodmenu {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      padding: 10px;
    }
    #foodmenu .collection {
      text-align: center;
    }
    #foodmenu img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }
    @media (max-width: 768px) {
      #foodmenu {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    @media (max-width: 576px) {
      #foodmenu {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>
<body>

<div class="container my-4">
  <div id="foodmenu"></div>
</div>

<script>
const imageUrl = "https://dunzocafe.in/images/"; // base image URL
const dummyData = [
  { imageId: "pizza.png", action: { link: "?label=pizza" } },
  { imageId: "burger.png", action: { link: "?label=burger" } },
  { imageId: "biryani.png", action: { link: "?label=biryani" } },
  { imageId: "cake.png", action: { link: "?label=cake" } },
];

function appendParamsToUrl(url, param) {
  const newUrl = new URL(url);
  for (const key in param) {
    newUrl.searchParams.set(key, param[key]);
  }
  return newUrl.toString();
}

function getParamFromUrl(link) {
  const url = new URL("http://dummy.com" + link);
  const params = {};
  url.searchParams.forEach((value, key) => {
    params[key] = value;
  });
  return params;
}

function generateImageLabel(gridElements) {
  let labelDiv = '';
  gridElements.forEach(gridElement => {
    const { imageId, action } = gridElement;
    if (imageId) {
      const labelImageUrl = imageUrl + imageId;
      labelDiv += `
        <div class="collection">
          <a href="${appendParamsToUrl(window.location.href, getParamFromUrl(action?.link))}">
            <img src="${labelImageUrl}" class="img-fluid" />
          </a>
        </div>`;
    }
  });
  const targetDiv = document.getElementById('foodmenu');
  if (targetDiv) {
    targetDiv.innerHTML = labelDiv; // NO slick, just raw HTML
  }
}

// Initialize
generateImageLabel(dummyData);
</script>

</body>
</html>