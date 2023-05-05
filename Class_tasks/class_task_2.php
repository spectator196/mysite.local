<?php

class SquareChecker
{

    public array $partList;

    public function is_square(): string
    {
        if (!isset($this->partList)) {
            return 'Не указан массив со сторонами';
        }
        if (count($this->partList) != 4) {
            return 'Не корректное кол-во элементов фигуры';
        }

        foreach ($this->partList as $part) {
            if (!is_numeric($part)) {
                return 'Нужно вводить только числа';
            }
            if ($part < 0) {
                return 'Отрицательные числа неприемлемы';
            }
            if ($this->partList[0] !== $part) {
                return 'Стороны квадрата должны быть равными';
            }
        }

        return '<div style="width:' . ($this->partList[0]) . 'px;height:' . ($this->partList[0]) . 'px;border:1px solid;"></div>';

    }
}

$figure1 = new SquareChecker;
$figure1->partList = [20, 20, 20, 20];
print $figure1->is_square(); // Квадрат

$figure2 = new SquareChecker;
print $figure2->is_square(); // 'Не указан массив со сторонами'

$figure3 = new SquareChecker;
$figure3->partList = [20, 20, 20];
print $figure3->is_square(); // 'Не корректное кол-во элементов фигуры'

$figure4 = new SquareChecker;
$figure4->partList = [20, 'Двадцать', 20, 20];
print $figure4->is_square(); // 'Нужно вводить только числа'

$figure5 = new SquareChecker;
$figure5->partList = [20, 20, 20, -20];
print $figure5->is_square(); // 'Отрицательные числа неприемлемы'

$figure6 = new SquareChecker;
$figure6->partList = [20, 20, 30, 20];
print $figure6->is_square(); // 'Стороны квадрата должны быть равными'
