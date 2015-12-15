    <footer id="footer">

      <ul>
        <li><a href="<?php echo home_url('about-us/'); ?>">About Us</a></li>
        <li><a href="<?php echo home_url('journal/'); ?>">Journal</a></li>
        <li><a href="<?php echo home_url('recipes/'); ?>">Recipes</a></li>
        <li><a href="<?php echo home_url('catering/'); ?>">Catering</a></li>
        <li><a href="<?php echo home_url('friends/'); ?>">Friends</a></li>
        <li><a href="<?php echo home_url('press/'); ?>">Press</a></li>
      </ul>

      <ul>
        <li><a href="https://www.facebook.com/pichondf/" target="_blank">Facebook</a></li>
        <li><a href="https://twitter.com/Pichoooooon" target="_blank">Instagram</a></li>
        <li><a href="" target="_blank">Twitter</a></li>
      </ul>

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
        "http://www.facebook.com/your-profile",
        "http://instagram.com/yourProfile",
        "http://www.linkedin.com/in/yourprofile",
        "http://plus.google.com/your_profile"
        ]
    }
  </script>

  </body>
</html>