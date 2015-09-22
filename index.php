<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.09.15
 * Time: 23:49
 */
function __autoload($class)
{
  switch (substr($class, 0, 2)) {
    case 'C_':
      require_once 'php/c/' . $class . '.php';
      break;
    case 'M_':
      require_once 'php/m/' . $class . '.php';
      break;
    case 'V_':
      require_once 'php/v/' . $class . '.php';
      break;
    default: {
      if (substr($class, 0, 1) === 'I')
        require_once 'php/inter/' . $class . '.php';
      elseif (substr($class, 0, 4) === 'Page')
        require_once 'php/pages/' . $class . '.php';
      else
        require_once 'php/components/' . $class . '.php';

    }
  }
}
function main(){

  $page = new PageBase(new V_Projector(), new C_Base());

  $page->Request();

}


main();