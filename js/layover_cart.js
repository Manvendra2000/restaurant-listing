
  document.querySelector('.unique-view-cart').onclick = () => {
    document.getElementById('cartDialog').classList.remove('hidden');
  };

  function closeDialog() {
    document.getElementById('cartDialog').classList.add('hidden');
  }

  // Optional: click outside to close
  document.getElementById('cartDialog').addEventListener('click', e => {
    if (e.target.id === 'cartDialog') closeDialog();
  });



  document.addEventListener("DOMContentLoaded", function () {
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

    updateCartButtonVisibility(); // Call on page load
  });
