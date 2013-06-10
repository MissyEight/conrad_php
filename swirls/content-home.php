  
<!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 960,
        height: 315,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true
        }
      });
    });
  </script>

<section class="slides-container"> <!-- The container is used to define the width of the slideshow -->
  <section id="slides">
    <img src="images/home-slide1.jpg"  alt="Great for any occasion">
    <img src="images/home-slide2.jpg"  alt="Satisfy your sweet tooth">
    <img src="images/home-slide3.jpg"  alt="Delightfully Decadent">
    <img src="images/home-slide4.jpg"  alt="Fresh handcrafted cupcakes">
  </section>
</section>
<a href="index.php?page=shop-category&amp;shop_cat=1" class="c2a-btn">Shop Best Sellers</a>	

<div class="lowerpage cf">
  <article class="onethird">
  	<a href="index.php?page=shop-category&amp;shop_cat=2"><img src="images/home-choc.jpg" alt="Indulge their chocolate side" ></a>
  </article>

  <article class="onethird">
  	<a href="index.php?page=order"><img src="images/home-ship.jpg" alt="Indulge their chocolate side" ></a>
  </article>

  <article class="onethird">
  	<a href="index.php?page=blog">Swirls Bakery Blog</a>
  </article>
</div>