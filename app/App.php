<?php
namespace app; // определение пространства имен для данного класса
use brand\core\App as ParentApp; // конструкция для переопределения ника для используемых пространств имен
/**
 * Description of App
 *
 * @author Моргунов Виталий
 */
class App extends ParentApp {
    public function __construct() {
        echo "Выполнен метод __construct класса App в папке app";
        echo "<br>";
        parent::__construct(); // вызываем родительский метод
    }
}