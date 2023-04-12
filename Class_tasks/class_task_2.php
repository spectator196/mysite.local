<?php

Class SquareChecker{
    
    public $part_list;

    public function isSquare()
    {
        if (!isset($this->part_list)) {return 'Не указан массив со сторонами';}
        if (count($this->part_list)!=4) {return 'Не корректное кол-во элементов фигуры';}

        foreach ($this->part_list as $part){
            if (!is_numeric($part)) { return 'Нужно вводить только числа';}
            if ($part<0) {return 'Отрицательные цисла неприемлемы';}
        }
        
        if (!(array_sum($this->part_list)/4==$this->part_list[0])){return 'Стороны квадрата должны быть равными';}

        return '<div style="width:'.($this->part_list[0]).'px;height:'.($this->part_list[0]).'px;border:1px solid;"></div>';

    }
}

$figure_1= new SquareChecker;
$figure_1->part_list=[20,20,20,20];
print $figure_1->isSquare();// Квадрат