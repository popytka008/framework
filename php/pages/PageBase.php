<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.09.15
 * Time: 23:31
 */

/**
 * Class PageBase
 * Базовый класс для описания страниц
 * Включает в себя интерфейсы для использования сменяемых контроллёров и видов
 */
class PageBase
{
  protected $_controller;
  protected $_vid;

  protected $_archive;


  /**
   * @param IVisible $_vid
   * @param IControllable $_controller
   */
  public function __construct(IVisible $_vid, IControllable $_controller)
  {
    $this->_vid = $_vid;
    $this->_controller = $_controller;
  }

  /**
   * Определение входных и выходных данных для дальнейшей работы
   * (определение данных для вывода компонентов страницы)
   */
  public function OnInput() {
    $this->_archive['page_title'] = 'Здесь был заголовок страницы';
    $this->_archive['page_header'] = 'Здесь была шапка страницы';
    $this->_archive['page_content'] = 'Здесь была основная часть страницы';
    $this->_archive['page_footer'] = 'Здесь был подвал страницы';

    if($this->_controller)
      $this->_controller->OnInput();
  }

  /**
   * Определение контрольного элемента HTML-страницы как строки
   * вывод компонентов страницы
   */
  public function OnOutput(){
    if($this->_controller)
      $this->_archive['page_content'] = $this->_controller->OnOutput();

    echo $this->_vid->Show('index.html', $this->_archive);
  }

  /**
   * Запуск цикла построения контрольного элемента страницы
   */
  public function Request () {
    $this->OnInput();
    $this->OnOutput();
  }
}