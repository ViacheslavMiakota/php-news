<div class="upward" onclick="scrollTopTop()"></div>

<script>
  window.addEventListener('scroll', function() {
    const scroll = document.querySelector('.upward');
    scroll.classList.toggle('active', window.scrollY > 200 && window.scrollY !== 0);
  });

  function scrollTopTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  }
</script>