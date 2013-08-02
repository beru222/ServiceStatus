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
 * The welcome hello world.
 *
 */
namespace ServerStatus;

class HellowWorld
{
 /**
  * @var world
  */
 private $world;

 /**
  *
  * @param string $world
  */
 public function __construct(string $world)
 {
  $this->world = $world;
 }

 public function hello(string $what)
 {
  $val = '';
  if ($what) {
   $val = $what;
  } else {
   $val = $this->world;
  }

  return "Hello $val";
 }
}
