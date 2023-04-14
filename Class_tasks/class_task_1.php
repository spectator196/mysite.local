<?php

class Animal
{
    public string $type;
    public string $feedObj;

    public function showMyAnimal(): string
    {
        if (isset($this->type)) {
            if (isset($this->feedObj)) {
                return 'Животное: ' . $this->type . ' Лакомство: ' . $this->feedObj;
            } else {
                return 'Дикое животное';
            }
        } else {
            return 'Не указаны данные о животном!';
        }
    }
}

$animal1 = new Animal;
$animal1->type = 'Кошка';
$animal1->feedObj = 'Рыба';
print $animal1->showMyAnimal(); // Животное: Кошка Лакомство: Рыба

$animal2 = new Animal;
$animal2->type = 'Зебра';
print $animal2->showMyAnimal(); // Дикое животное

$animal3 = new Animal;
$animal3->type = 123;
$animal3->feedObj = 'Мыло';
print $animal3->showMyAnimal(); // Животное: 123 Лакомство: Мыло (123=>'123')

$animal4 = new Animal;
$animal4->feedObj = 'Резина';
print $animal4->showMyAnimal(); // Не указаны данные о животном!
