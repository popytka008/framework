<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.09.15
 * Time: 1:11
 */
class C_Base implements IControllable{
  protected $_content;
  protected $_error;

  public function OnInput()
  {
    $this->_content ='Здесь был контент';
  }

  public function OnOutput()
  {
    return $this->_content;
  }

}
