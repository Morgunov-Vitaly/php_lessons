<?php

require_once '../vendor/brand/core/App.php';
require_once '../app/App.php';
require_once '../app/Data1.php';
require_once '../app/Data2.php';

$data1 = new app\Data1();
$data2 = new app\Data2();
$app = new app\App();
$app->run($data1); //Пример полиморфизма - метод объекта способен обрабатывать разные типы данных благодаря интерфейсу - общему названию метода
$app->run($data2);
//$data1->lessons = 'New value'; // демонстрация работы приватного свойства - мы не можем напрямую обратиться к приватным свойствам или методам извне класса
//phpinfo();