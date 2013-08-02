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
 * Example
 *
 */
namespace ServerStatus;
use CLI;

include 'libs/php-cli-framework/cli.php';

class Example extends CLI
{
 function __construct($appname = null, $author = null, $copyright = null)
 {
  parent::__construct('CLI Framework Example', 'Author Name', '(c) 2012 Etopian Inc.');
 }

 /**
  * You are responsible for defining variables (class attributes) which will be used by
  * $this->main() to do its job.
  *
  * You can use arguments, flags, and options functions (methods) explained later
  * to define these variables (class attributes).
  * First they are set using args, flags, and options functions, and then main() is called.
  */
 private $optionvar1 = 'example opt var';
 private $flagvar2 = 'bar';
 private $argumentvar = 'argvar';

 /**
  * The main() function gets called if at least one argument is present.
  * If no arguments are present, the automatically generated help is displayed.
  *
  * The main functions job to do the main work of the script.
  *
  */
 public function main()
 {
  //how to use the $this->getInput() function to get specific input from the user.
  $input = '';
  while ($input != 'yes') {
   $input = $this->getInput('Type yes to continue. Type no to exit.');
   if ($input == 'no') {
    exit();
   }
  }
  //you may color the output like so.
  print $this->colorText("flagvar2: ".$this->flagvar2."\n", "YELLOW");
  print $this->optionvar1."\n";
  //print $this->argumentvar."\n";

 }

 /**
  * Now we define flags, arguments and options.
  * Notice each one of the defintions for these functions must be public.
  *
  *  The basic naming convention is:
  *    public function flag_NAME
  *    public function option_NAME
  *    public function argument_NAME
  *
  * In the function we define the help using:
  *  if ($opt == 'help') {  return 'help message'. }
  *
  * We then follow up code to process that argument, flag, or option.
  *
  * There are no return values expected from any of the following functions.
  *
  */

 /**
  * Define the flag -e, so if you run './example -e' this function will be called
  * Flags do not handle values, to handle values ($opt) use option_ for that.
  */
 public function flag_e($opt = null)
 {
  if ($opt == 'help') {
   return 'Help for the flag -e';
  }
  print "\n".'flag_e was just called and $opt was: '.$opt."\n";
  $this->flagvar2 = 'flag var is now set';
 }

 /**
  * Argument is like flag, but just a string.
  * ./example.php example
  */
 public function argument_example($opt = null)
 {
  if ($opt == 'help') {
   return 'Help for the argument \'example\'';
  }

  print "\n".'argument_example was just called and $opt was: '.$opt."\n";
  $this->argumentvar = 'example';

 }

 /**
  * ./example.php --example=test
  *
  * Will output $opt = test when this function is called.
  *
  */
 public function option_example($opt = null)
 {
  if ($opt == 'help') {
   return 'Help for the option --example=value';
  }
  print "\n".'option_example was just called and $opt was: '.$opt."\n";
  $this->optionvar1 = $opt;

  //you can also call $this->getInput('message');
  //from within these functions to get input associated with the given option.

 }

 /**
  * Print out help for this program.
  * The help is auto generated using various variables.
  */
 public function help($args = array())
 {
  // print $this->colorText($this->appname, "LIGHT_RED")."\n";
  // print $this->colorText($this->author.' - '.$this->copyright, "LIGHT_RED")."\n";

  // for ($i=0; $i < strlen($this->appname.$this->author.$this->copyright); $i++) { print '-'; }
  // print "\n";

  $methods = get_class_methods(get_class($this));
  foreach ($methods as $method) {
   if (substr($method,0, 4) == 'flag') {
    $flag = str_replace('flag_', '', $method);
    $flags_help[$flag] = $this->$method('help');
   } elseif (substr($method,0, 8) == 'argument') {
    $argument = str_replace('argument_', '', $method);
    $arguments_help[$argument] = $this->$method('help');
   } elseif (substr($method,0, 6) == 'option') {
    $option = str_replace('option_', '', $method);
    $options_help[$option] = $this->$method('help');
   }
  }

  // print $this->colorText(' Flags:', "BLUE")."\n";
  foreach ($flags_help as $flag => $desc) {
   $spaces = 20 - strlen($flag);
   printf("  -%s%".$spaces."s%s\n", $flag,'', $desc);
  }
  // print "\n".$this->colorText(' Arguments:', "BLUE")."\n";
  foreach ($arguments_help as $arg => $desc) {
   $spaces = 20 - strlen($arg) + 1;

   printf("  %s%".$spaces."s%s\n", $arg,'', $desc);
  }
  // print "\n".$this->colorText(' Options:', "BLUE")."\n";
  foreach ($options_help as $opt => $desc) {
   $spaces = 20 - strlen($opt) - strlen($opt) - 4;
   printf("  --%s;%s=?%".$spaces."s%s\n",$opt, $opt,'', $desc);
  }
  print "\n";
  exit();
 }

 /**
  * Output coloized text to the terminal
  */
 public function colorText($text, $color="NORMAL", $back=1)
 {
  $out = $this->_colors[$color];
  if ($out == "") {
   $out = "[0m";
  }
  if ($back) {
   return chr(27)."$out$text".chr(27)."[0m";#.chr(27);
  } else {
   echo chr(27)."$out$text".chr(27).chr(27)."[0m";#.chr(27);
  }
 }
}

/**
 *IMPORTANT, instantiate your class! i.e. new Classname();
 */
new Example();
