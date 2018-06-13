<?php

// __DIR__  - волшебная константа PHP указывает на текущую дирректорию
//require_once __DIR__ . '/../vendor/brand/core/App.php';
//require_once __DIR__ . '/../app/App.php';
//require_once __DIR__ . '/../app/Data1.php';
//require_once __DIR__ . '/../app/Data2.php';

/**
 * Используем технику автозагрузчика с перехватом исключений
 */
//phpinfo();

function MyAutoload($class_name) {
    echo "Хочу загрузить класс $class_name\n";
    $class_name_pieces = explode('\\', $class_name);
    switch ($class_name_pieces[0]) {
        case 'app':
            require __DIR__ . '\\..\\' . implode('\\', $class_name_pieces) . '.php';
            break;
        case 'brand':
            require __DIR__ . '\\..\\vendor\\' . implode('\\', $class_name_pieces) . '.php';
            break;
        //class directories
    }
}

spl_autoload_register('MyAutoload', TRUE, TRUE);

$data1 = new app\Data1();
$data2 = new app\Data2();
$app = new app\App();
$app->run($data1); //Пример полиморфизма - метод объекта способен обрабатывать разные типы данных благодаря интерфейсу - общему названию метода
$app->run($data2);
//$data1->lessons = 'New value'; // демонстрация работы приватного свойства - мы не можем напрямую обратиться к приватным свойствам или методам извне класса