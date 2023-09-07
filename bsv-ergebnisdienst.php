<?php 
      /*
      Plugin Name: DG-Services BSV-Ergebnisdienst Plugin
      Plugin URI: https://www.dg-services.de/
      Description: Plugin to display a teams players
      Author: D. Gerstner
      Author URI: https://dg-services.de
      Licence: Copyright (C) DG-Services - All Rights Reserved
      Version: 0.9.9
      */

      // Direkten Aufruf verhindern


    //require_once ( plugin_dir_path( __FILE__ )."includes/functions.php"); 


    function bsvErgebnisdienstPlugin_list_viewer(){
      ob_start() ;
       include( plugin_dir_path( __FILE__ ).'bsv-ergebnisdienst_list_viewer.php' );
      return ob_get_clean();
    } 

    add_shortcode('showBSVErgebnisdienstMannschaft','bsvErgebnisdienstPlugin_list_viewer');  

    

   // CSS
   wp_enqueue_style( 'style-css', plugins_url( 'assets/css/style.css', __FILE__ ));
   wp_enqueue_style( 'style-css2', plugins_url( 'assets/css/tailwind.css', __FILE__ ));

    // function bsvErgebnisdienstPlugin_custom_post_type() {
    //   $labels = array(
    //      'name' => 'Portfolio Einträge',
    //      'singular_name' => 'Portfolio',
    //      'menu_name' => 'Portfolio',
    //      'parent_item_colon' => '',
    //      'all_items' => 'Alle Einträge',
    //      'view_item' => 'Eintrag ansehen',
    //      'add_new_item' => 'Neuer Eintrag',
    //      'add_new' => 'Hinzufügen',
    //      'edit_item' => 'Eintrag bearbeiten',
    //      'update_item' => 'Update Eintrag',
    //      'search_items' => '',
    //      'not_found' => '',
    //      'not_found_in_trash' => '',
    //   );
    //   $rewrite = array(
    //      'slug' => 'PortfolioPlugin',
    //      'with_front' => true,
    //      'pages' => true,
    //      'feeds' => false,
    //   );
    //   $args = array(
    //      'labels' => $labels,
    //      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
    //      'taxonomies' => array( 'post_tag' ),
    //      'hierarchical' => false,
    //      'public' => true,
    //      'show_ui' => true,
    //      'show_in_menu' => true,
    //      'show_in_nav_menus' => true,
    //      'show_in_admin_bar' => true,
    //      'menu_position' => 5,
    //      'can_export' => false,
    //      'has_archive' => true,
    //      'exclude_from_search' => false,
    //      'publicly_queryable' => true,
    //      'rewrite' => $rewrite,
    //      'capability_type' => 'page',
    //   );
    //   register_post_type( 'portfolio', $args );
    //   }
      // // Hook into the 'init' action
      // add_action( 'init', 'portfolioPlugin_custom_post_type', 0 );

    // Admin Functions
    function bsvErgebnisdienstPlugin_admin() {
        include( plugin_dir_path( __FILE__ ).'assets/admin/bsv-ergebnisdienst_admin.php' );
    }
    function bsvErgebnisdienstPlugin_admin_actions() {
        add_options_page("DG-Services BSV-Ergebnisdienst Plugin", "DG-Services BSV-Ergebnisdienst Plugin", 1, "DG-Services BSV-Ergebnisdienst Plugin", "bsvErgebnisdienstPlugin_admin");
    }
    add_action('admin_menu', 'bsvErgebnisdienstPlugin_admin_actions');

    // Set default values here
    function bsvErgebnisdienstPlugin_default_values(){
      add_option('bsvErgebnisdienstClubID','10617');
    }
    add_action( 'name_plugin_default_options', 'bsvErgebnisdienstPlugin_default_values' );
