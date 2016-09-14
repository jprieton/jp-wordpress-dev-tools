<?php

namespace JPDevTools\Abstracts;

/**
 * If this file is called directly, abort.
 */
if ( !defined( 'ABSPATH' ) ) {
  die( 'Direct access is forbidden.' );
}

/**
 * Singleton abstract class
 *
 * @package        Core
 * @subpackage     Abstracts
 *
 * @since          0.1.0
 *
 * @author         Javier Prieto <jprieton@gmail.com>
 */
abstract class Singleton {

  /**
   * @since   0.1.0
   *
   * @return  static
   */
  public static function &get_instance() {
    if ( !isset( static::$instance ) ) {
      static::$instance = new static;
    }

    return static::$instance;
  }

  /**
   * @since   0.1.0
   *
   * @return  static
   */
  protected function __construct() {

  }

  /**
   * @since   0.1.0
   *
   * @return  static
   */
  private function __clone() {

  }

  /**
   * @since   0.1.0
   *
   * @return  static
   */
  private function __wakeup() {

  }

  /**
   * PHP5 style destructor and will run when object is destroyed.
   *
   * @since 0.1.0
   * @return true
   */
  public function __destruct() {
    return true;
  }

}
