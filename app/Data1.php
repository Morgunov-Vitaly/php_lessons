<?php

namespace app;

/**
 * Description of Data1
 *
 * @author Моргунов Виталий
 */
class Data1 {
    private $lessons = 'Первые данные';
    public function get() {
        return $this->lessons;
    }
}
