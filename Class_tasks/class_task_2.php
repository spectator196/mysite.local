<?php

class square_checker
{

    public array $part_list;

    public function is_square(): string
    {
        if (!isset($this->part_list)) {
            return 'Не указан массив со сторонами';
        }
        if (count($this->part_list) != 4) {
            return 'Не корректное кол-во элементов фигуры';
        }

        foreach ($this->part_list as $part) {
            if (!is_numeric($part)) {
                return 'Нужно вводить только числа';
            }
            if ($part < 0) {
                return 'Отрицательные числа неприемлемы';
            }
            if ($this->part_list[0] !== $part) {
                return 'Стороны квадрата должны быть равными';
            }
        }

        return '<div style="width:' . ($this->part_list[0]) . 'px;height:' . ($this->part_list[0]) . 'px;border:1px solid;"></div>';

    }
}

$figure_1 = new square_checker;
$figure_1->part_list = [20, 20, 20, 20];
print $figure_1->is_square(); // Квадрат

$figure_2 = new square_checker;
print $figure_2->is_square(); // 'Не указан массив со сторонами'

$figure_3 = new square_checker;
$figure_3->part_list = [20, 20, 20];
print $figure_3->is_square(); // 'Не корректное кол-во элементов фигуры'

$figure_4 = new square_checker;
$figure_4->part_list = [20, 'Двадцать', 20, 20];
print $figure_4->is_square(); // 'Нужно вводить только числа'

$figure_5 = new square_checker;
$figure_5->part_list = [20, 20, 20, -20];
print $figure_5->is_square(); // 'Отрицательные числа неприемлемы'

$figure_6 = new square_checker;
$figure_6->part_list = [20, 20, 30, 20];
print $figure_6->is_square(); // 'Стороны квадрата должны быть равными'