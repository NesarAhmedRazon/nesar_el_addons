<?php
/**
 * Plugin Name: Elementor Addon for Tallyfy.com
 * Description: Required widgets for Elementor.
 * Version:     1.0.0
 * Author:      Nesar Ahmed
 * Author URI:  https://developers.elementor.com/
 */

 namespace NELW;
 class Widget_Loader{

  private static $_instance = null;

  public static function instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }



  private function include_widgets_files(){
    require_once(__DIR__ . '/widgets/services.php');
  }

  public function register_widgets(){

    $this->include_widgets_files();
    

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Service());

  }



  public function __construct(){
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
  }
}

// Instantiate Plugin Class
Widget_Loader::instance();