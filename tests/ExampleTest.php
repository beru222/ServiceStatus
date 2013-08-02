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
 * Example Test Class.
 *
 */
namespace ServerStatus;

class ExampleTest extends PHPUnit_Framework_TestCase
{

 public function testFlag_e()
 {
  global $argv;
  $this->expectOutputString('-e                   Help for the flag -e');
  $argv[1]='-e';
  $example = new Example();
  //$example.flg_e();
 }

}