<?php

Class Animal{
    public $type;
    public $feedObj;

    public function showMyAnimal()
    {
        if (isset($this->feedObj)){
            return 'Животное: '.$this->type. ' Лакомство: '.$this->feedObj;
        } else {
            return 'Дикое животное';}
    }

}

$animal_1= new Animal;
$animal_1->type='Кошка';
$animal_1->feedObj='Рыба';

$animal_2= new Animal;
$animal_2->type='Зебра';

$animal_1->showMyAnimal();// Животное: Кошка Лакомство: Рыба
$animal_2->showMyAnimal();// Дикое животное


