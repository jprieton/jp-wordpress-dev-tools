<?php

namespace JPDevTools\Helpers;

/**
 * If this file is called directly, abort.
 */
if ( !defined( 'ABSPATH' ) ) {
  die( 'Direct access is forbidden.' );
}

/**
 * ArrayHelper class
 *
 * @package        Helpers
 *
 * @since          0.1.0
 *
 * @author         Javier Prieto <jprieton@gmail.com>
 */
class ArrayHelper {

  /**
   * Removes an item from an array and returns the value.
   *
   * @since 0.1.0
   *
   * @param   array    $array
   * @param   string   $key
   * @param   mixed    $default
   *
   * @return  mixed
   */
  public static function extract( &$array, $key, $default = null ) {
    if ( is_array( $array ) && array_key_exists( $key, $array ) ) {
      $response = $array[$key];
      unset( $array[$key] );
    } else {
      $response = $default;
    }

    return $response;
  }

  /**
   * Get item from an array and returns the value.
   *
   * @since 0.1.0
   *
   * @param   array    $array
   * @param   string   $key
   * @param   mixed    $default
   *
   * @return  mixed
   */
  public static function get( &$array, $key, $default = null ) {
    if ( is_array( $array ) && array_key_exists( $key, $array ) ) {
      $response = $array[$key];
    } else {
      $response = $default;
    }

    return $response;
  }

}
