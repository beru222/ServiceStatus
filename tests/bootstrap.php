<?php
/**
 * check server status
 *
 * @package    ServerStatus
 * @version    0.1
 * @author     Kenichi.Koyama
 * @license    MIT License
 * @copyright  2010 - 2013 ANET Corporation.
 */

/**
 * loader.
 *
 */
function loader($class)
{
 $file = $class . '.php';
 require $file;
 if (file_exists($file)) {
  require '../' .$file;
 }
}

spl_autoload_register('loader');