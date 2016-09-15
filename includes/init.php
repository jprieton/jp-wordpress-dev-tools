<?php

/**
 * If this file is called directly, abort.
 */
if ( !defined( 'ABSPATH' ) ) {
  die( 'Direct access is forbidden.' );
}

/**
 * Core classes
 */
require_once __DIR__ . '/abstracts/abstract-singleton.php';
require_once __DIR__ . '/abstracts/abstract-settings-page.php';
require_once __DIR__ . '/core/class-setting-group.php';
require_once __DIR__ . '/factory/class-setting-factory.php';

/**
 * Helper classes
 */
require_once __DIR__ . '/helpers/class-array-helper.php';
require_once __DIR__ . '/helpers/class-html-helper.php';
require_once __DIR__ . '/helpers/class-form-helper.php';

/**
 * Vendor init
 */
require_once __DIR__ . '/vendor/bootstrap/init.php';

use JPDevTools\Core\Factory\SettingFactory;

add_action( 'init', function() {

  /**
   * Register option group.
   * @since 0.1.0
   */
  SettingFactory::register_setting_group( 'jpdevtools-settings' );

  /**
   * Loads the plugin's translated strings.
   * @since 0.1.0
   */
  load_plugin_textdomain( JPDEVTOOLS_TEXTDOMAIN, false, dirname( plugin_basename( __DIR__ ) ) . '/languages' );

  // Plugin settings
  $setting_group = SettingFactory::setting_group( 'jpdevtools-settings' );

  /**
   * Register Carousel Post Type.
   * @since 0.1.0
   */
  if ( $setting_group->get_bool_option( 'slide-post-type-enabled' ) ) {
    include_once __DIR__ . '/post-types/slide.php';
  }

  /**
   * Register Service Post Type.
   * @since 0.1.0
   */
  if ( $setting_group->get_bool_option( 'service-post-type-enabled' ) ) {
    include_once __DIR__ . '/post-types/service.php';
  }

  /**
   * Register Service Post Type.
   * @since 0.1.0
   */
  if ( $setting_group->get_bool_option( 'portfolio-post-type-enabled' ) ) {
    include_once __DIR__ . '/post-types/portfolio.php';
  }

  /**
   * Register Product Post Type.
   * Register Product Category Taxonomy.
   * Register Product Tag Taxonomy.
   * @since 0.1.0
   */
  if ( $setting_group->get_bool_option( 'product-post-type-enabled' ) ) {
    include_once __DIR__ . '/post-types/product.php';
    include_once __DIR__ . '/taxonomies/product_cat.php';
    include_once __DIR__ . '/taxonomies/product_tag.php';
  }
}, 0 );

// Register Theme Features
add_action( 'after_setup_theme', function () {

  // Add theme support for Featured Images
  add_theme_support( 'post-thumbnails' );

  // Add theme support for document Title tag
  add_theme_support( 'title-tag' );
} );

