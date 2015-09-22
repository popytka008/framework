<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.09.15
 * Time: 1:06
 */
function __autoload($class)
{
  switch (substr($class, 0, 2)) {
    case 'C_':
      require_once 'c/' . $class . '.php';
      break;
    case 'M_':
      require_once 'm/' . $class . '.php';
      break;
    case 'V_':
      require_once 'v/' . $class . '.php';
      break;
    default: {
      if (substr($class, 0, 1) === 'I')
        require_once 'inter/' . $class . '.php';
      elseif (substr($class, 0, 4) === 'Page')
        require_once 'pages/' . $class . '.php';
      else
        require_once 'components/' . $class . '.php';

    }
  }
}