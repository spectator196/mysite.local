<?php

class Animal
{
    public string $type;
    public string $feedObj;

    public function show_my_animal(): string
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

$animal_1 = new Animal;
$animal_1->type = 'Кошка';
$animal_1->feedObj = 'Рыба';

$animal_2 = new Animal;
$animal_2->type = 'Зебра';

$animal_3 = new Animal;
$animal_3->type = 123;
$animal_3->feedObj = 'Мыло';

$animal_4 = new Animal;
$animal_4->feedObj = 'Резина';

echo $animal_1->show_my_animal(); // Животное: Кошка Лакомство: Рыба
echo $animal_2->show_my_animal(); // Дикое животное
echo $animal_3->show_my_animal(); // Животное: 123 Лакомство: Мыло (123=>'123')
echo $animal_4->show_my_animal(); // Не указаны данные о животном!
