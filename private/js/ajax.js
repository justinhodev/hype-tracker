const products = document.getElementById('show_product');
const searchResult = document.getElementById('search_result');
const searchBox = document.getElementById('sneaker_search');
const brandSelector = document.getElementById('brand');

document.onreadystatechange = function () {
  if (document.readyState === 'complete') {
    searchBox.addEventListener('input', filterBySearch);
    brandSelector.addEventListener('change', filterByBrand)
  }
}

/*
 *
 * Limit Products by Brand buttons
 *
 * @param {integer} brand - brand id
 * @return {void} updates product html
 *
 */
function filterByBrand(brand) {
  brandId = brand.target.value;
  const sneakers = await searchSneaker('brand_id', brandId);
  if (sneakers === null) return;
  products.innerHTML = sneakers;
}

/*
 * Limit Products by Search Phrase
 *
 * @param {string} search - value from input
 * @return {void} updates search result html
 *
 */
function filterBySearch(search) {

  let searchValue = search.target.value;

  if (searchValue.length <= 0) {
    searchResult.style.display = 'none';
    products.style.display = 'block';
    return;
  }
  
  const sneakers = await searchSneaker('search_data', searchValue);

  if (sneakers !== "") {
    searchResult.innerHTML = sneakers;
    return;
  }

  searchResult.innerHTML = "<div class=\"row pl-3\"><div class=\"col-3\">No Result Found...</div></div>";
}

/*
 * Send an async request with search term
 *
 * @param {string} type - search type
 * @param {string} value - search value
 * @return {text} the formatted HTML with data
 *
 */
async function searchSneaker(type, value) {
  
  let searchData = new FormData();
  searchData.append(type, value);

  const response = await fetch('./load_data.php', {
    method: 'POST',
    mode: 'same-origin',
    cache: 'no-cache',
    credentials: 'omit',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    redirect: 'error',
    body: searchData
  })
  .catch(() => console.error('Cannot reach server'));

  return response.text();
}
