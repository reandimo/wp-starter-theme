<?php

/**
 * Fired during plugin activation
 *
 * @package    EscaleTheme
 */

namespace Escale\Theme; 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Custom
{

  /**
    * Run the actions
  */
  public function run()
  {

    add_action('init', array($this, 'some_example_function'));

  }
 
  public function some_example_function(){
    // ...
  }

}

(new \Escale\Theme\Custom())->run();
