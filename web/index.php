<?php
// __DIR__  - волшебная константа PHP указывает на текущую дирректорию
//require_once __DIR__ . '../vendor/brand/core/App.php';
//require_once __DIR__ . '../app/App.php';
//require_once __DIR__ . '../app/Data1.php';
//require_once __DIR__ . '../app/Data2.php';

/**
 * Используем технику автозагрузчика с перехватом исключений
 */
//phpinfo();
function __autoload($class_name){
    echo "Хочу загрузить класс $class_name\n";
    $class_name_pieces = explode('\\', $class_name);
    //var_dump($class_name_pieces);
    switch ($class_name_pieces[0]){
        case 'app': 
            require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $class_name_pieces) . '.php';
            break;
        case 'brand': 
            require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $class_name_pieces) . '.php'; 
            break;
    }
};

try {
    $data1 = new app\Data1();
    $data2 = new app\Data2();
    $data3 = new brand\core\App();
    $app = new app\App();
} catch (Exception $ex) {
    echo $ex->getMessage() . ' Код ошибки: ' . $ex->getCode();
}
$app->run($data1); //Пример полиморфизма - метод объекта способен обрабатывать разные типы данных благодаря интерфейсу - общему названию метода
$app->run($data2);
//$data1->lessons = 'New value'; // демонстрация работы приватного свойства - мы не можем напрямую обратиться к приватным свойствам или методам извне класса