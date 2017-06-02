    <footer id="footer" class="background-keycolor font-sans">
      <div class="container">
        <div class="grid-row u-align-center">
          <div class="grid-item item-s-8">
            <ul>
            <li><a href="<?php echo home_url('about-me/'); ?>"><?php echo __('[:es]Acerca de[:en]About me'); ?></a></li>
            <li><a href="<?php echo home_url('pichon/'); ?>"><?php echo __('[:es]Pichón[:en]Pichón'); ?></a></li>
            <li><a href="<?php echo home_url('journal/'); ?>"><?php echo __('[:es]Journal[:en]Journal'); ?></a></li>
            <li><a href="<?php echo home_url('recipes/'); ?>"><?php echo __('[:es]Recetas[:en]Recipes'); ?></a></li>
            <li><a href="<?php echo home_url('clients/'); ?>"><?php echo __('[:es]Clientes[:en]Clients'); ?></a></li>
            <li><a href="<?php echo home_url('press/'); ?>"><?php echo __('[:es]Prensa[:en]Press'); ?></a></li>
            </ul>
          </div>

          <div class="grid-item item-s-8">
            <ul>
              <li><a href="https://instagram.com/nikinakazawa/" target="_blank">My Instagram</a></li>
              <li><a href="https://instagram.com/pichondf/" target="_blank">Pichón Instagram</a></li>
              <li><a href="https://instagram.com/netamezcal/" target="_blank">Neta Mezcal Instagram</a></li>
            </ul>
          </div>

          <div class="grid-item item-s-8">
            <ul>
              <li>Niki Nakazawa</li>
              <li><?php echo __('[:es]derechos reservados[:en]copyright'); ?></li>
              <li><?php echo date('Y'); ?></li>
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
      "@type": "Person",
      "name": "Niki Nakazawa",
      "gender": "female",
      "url": "<?php echo home_url(); ?>",
      "sameAs" : [
        "http://instagram.com/nikinakazawa"
      ]
    }
  </script>

  </body>
</html>