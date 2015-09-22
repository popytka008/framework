<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.09.15
 * Time: 0:55
 */
class V_Projector implements IVisible{
  public function Show($template = 'index.html', $archive)
  {
    ob_start();

    foreach($archive as $key => $value){
      $$key = $value;
    }
    include 'php/templates/' . $template;
    return ob_get_clean();
  }

}