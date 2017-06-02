<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php get_template_part('partials/seo'); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.png">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

  <div class="loading-overlay"></div>

  <section id="main-container">

  <!-- start content -->
  <div class="border-bottom u-overflow-hidden">
    <header id="header" class="container">
      <div class="grid-row">
        <div class="grid-item item-s-24 item-m-8 item-l-7 flex-center flex-left-align">
          <a href="<?php echo home_url(); ?>"><h1 id="site-title">Niki Nakazawa</h1></a>
        </div>
        <div id="menu-holder" class="grid-item item-s-24 item-m-16 item-l-17 flex-center background-keycolor border-left font-sans ">
          <ul id="menu">
            <?php
              $active_slug = get_active_slug();
              $show_journal = IGV_get_option('_igv_show_journal');
            ?>
            <li <?php menu_active('about-me', $active_slug, 'menu-item'); ?>><a href="<?php echo home_url('about-me/'); ?>"><?php echo __('[:es]Acerca de[:en]About me'); ?></a></li>
            <li <?php menu_active('pichon', $active_slug, 'menu-item'); ?>><a href="<?php echo home_url('pichon/'); ?>"><?php echo __('[:es]Pichón[:en]Pichón'); ?></a></li>
            <?php
              if ($show_journal) {
            ?>
            <li <?php menu_active(array('journal', 'post'), $active_slug, 'menu-item'); ?>><a href="<?php echo home_url('journal/'); ?>"><?php echo __('[:es]Journal[:en]Journal'); ?></a></li>
            <?php
              }
            ?>
            <li <?php menu_active(array('recipe', 'ingredient', 'recipe_category'), $active_slug, 'menu-item'); ?>><a href="<?php echo home_url('recipes/'); ?>"><?php echo __('[:es]Recetas[:en]Recipes'); ?></a></a></li>
            <li <?php menu_active('client', $active_slug, 'menu-item'); ?>><a href="<?php echo home_url('clients/'); ?>"><?php echo __('[:es]Clientes[:en]Clients'); ?></a></li>
            <li <?php menu_active('press', $active_slug, 'menu-item'); ?>><a href="<?php echo home_url('press/'); ?>"><?php echo __('[:es]Prensa[:en]Press'); ?></a></li>
          </ul>
          <?php echo qtranxf_generateLanguageSelectCode('both'); ?>
        </div>
      </div>
    </header>
  </div>