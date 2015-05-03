<?php
    /**
     * Lemon includes
     *
     * The $lemon_includes array determines the code library included in your theme.
     * Add or remove files to the array as needed. Supports child theme overrides.
     *
     * Please note that missing files will produce a fatal error.
     *
     * @package Lemon
     */
    $lemon_includes = array(
      'inc/setup.php',                      // Initial theme setup and constants.
      'inc/widgets.php',                    // Register widget areas.
      'inc/fonts-url.php',                  // Load fonts url.
      'inc/scripts.php',                    // Enqueue scripts and styles.    
      'inc/extras.php',                     // Custom functions that act independently of the theme templates.
      'inc/jetpack.php',                    // Load Jetpack compatibility file.
      'inc/wp_bootstrap_navwalker.php',     // Load WordPress nav walker class.
      'inc/breadcrumb-trail.php',           // Load WordPress nav walker class.
      'inc/template-tags.php',              // Custom template tags for this theme.
      'inc/hook.php'                        // Load Lemon hook.      
    );
    foreach ($lemon_includes as $file) {
      if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'lemon'), $file), E_USER_ERROR);
      }
      require_once $filepath;
    }
    unset($file, $filepath);