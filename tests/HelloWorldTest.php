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
class HelloWorldTest extends PHPUnit_Framework_TestCase
{

  public function testHello()
  {
    $helloWorld = new HelloWorld();
    $this->assertEquals('Hello World', $helloWorld->hello());
  }

 public function testHelloWorld()
 {
  $helloWorld = new HelloWorld('Jp');
  $this->assertEquals('Hello Jp', $helloWorld->hello());
 }

}
