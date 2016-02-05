    <footer id="footer" class="background-green">
      <div class="container">
        <div class="row u-align-center">
          <div class="col s-col8">
            <ul>
            <li><a href="<?php echo home_url('about-us/'); ?>"><?php echo __('[:es]Acerca de[:en]About us'); ?></a></li>
            <li><a href="<?php echo home_url('journal/'); ?>"><?php echo __('[:es]Journal[:en]Journal'); ?></a></a></li>
            <li><a href="<?php echo home_url('recipes/'); ?>"><?php echo __('[:es]Recetas[:en]Recipes'); ?></a></a></li>
            <li><a href="<?php echo home_url('catering/'); ?>"><?php echo __('[:es]Catering[:en]Catering'); ?></a></a></li>
            <li><a href="<?php echo home_url('friends/'); ?>"><?php echo __('[:es]Amigos[:en]Friends'); ?></a></a></li>
            <li><a href="<?php echo home_url('press/'); ?>"><?php echo __('[:es]Prensa[:en]Press'); ?></a></a></li>
            </ul>
          </div>

          <div class="col s-col8">
            <ul>
              <li><a href="https://www.facebook.com/pichondf/" target="_blank">Facebook</a></li>
              <li><a href="https://twitter.com/Pichoooooon" target="_blank">Instagram</a></li>
              <li><a href="" target="_blank">Twitter</a></li>
            </ul>
          </div>

          <div class="col s-col8">
            <ul>
              <li>Pichón.mx</li>
              <li><?php echo __('[:es]derechos reservados[:en]copyright'); ?> <?php echo date('Y'); ?>
            </ul>
          </div>
        </div>
      </div>
    </footer>

  </section>

  <?php get_template_part('partials/scripts'); ?>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "http://www.example.com",
      "logo": "http://www.example.com/images/logo.png",
      "contactPoint" : [
        { "@type" : "ContactPoint",
          "telephone" : "+1-877-746-0909",
          "contactType" : "customer service",
          "contactOption" : "TollFree",
          "areaServed" : "US"
        } , {
          "@type" : "ContactPoint",
          "telephone" : "+1-505-998-3793",
          "contactType" : "customer service"
        } ],
      "sameAs" : [
        "http://www.facebook.com/pichondf",
        "http://instagram.com/yourProfile",
        "http://twitter.com/Pichoooooon",
        ]
    }
  </script>

  </body>
</html>