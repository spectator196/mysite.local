<?php

class аnimal
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

$animal1 = new аnimal;
$animal1->type = 'Кошка';
$animal1->feedObj = 'Рыба';

$animal2 = new аnimal;
$animal2->type = 'Зебра';

$animal3 = new аnimal;
$animal3->type = 123;
$animal3->feedObj = 'Мыло';

$animal4 = new аnimal;
$animal4->feedObj = 'Резина';

print $animal1->showMyAnimal(); // Животное: Кошка Лакомство: Рыба
print $animal2->showMyAnimal(); // Дикое животное
print $animal3->showMyAnimal(); // Животное: 123 Лакомство: Мыло (123=>'123')
print $animal4->showMyAnimal(); // Не указаны данные о животном!
