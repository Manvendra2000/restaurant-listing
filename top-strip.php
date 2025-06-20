<div id="top-strip" >
  <span> <img class="coupon-icon" src="<?php echo BASE_URL.'/images/gift-card.png';?>" alt="coupon card logo"> Welcome Deal for New Users - Order Worth ₹500, Pay Only ₹99 &nbsp; Ends in <span id="timer"></span></span>
</div>


<script>


(function () {
  const timerElement = document.getElementById("timer");

  function updateTimer() {
    const now = new Date();
    const hour = now.getHours();

    // Set next target: either 12:00 PM or 12:00 AM
    const nextReset = new Date(now);
    if (hour < 12) {
      nextReset.setHours(12, 0, 0, 0); // today at 12:00 PM
    } else {
      nextReset.setHours(24, 0, 0, 0); // today at 12:00 AM (next day)
    }

    const diff = nextReset - now;

    const hours = String(Math.floor(diff / (1000 * 60 * 60))).padStart(2, '0');
    const minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
    const seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');

    timerElement.textContent = `${hours}:${minutes}:${seconds}`;
  }

  updateTimer();
  setInterval(updateTimer, 1000);
})();


</script>
