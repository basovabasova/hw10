<?php

require_once 'interfaces.php';

class AnyItem// суперкласс
{
    public $name; 

    public function getQuestion() {}
}

class Car extends AnyItem implements CarInterface
{
    public $color;
    public $price;

    public function __construct($name, $price, $color) 
    {
        $this -> name = $name;
        $this -> color = $color;
        $this -> price = $price;
    }

    public function getCar() 
    {
        $this -> price = 500000;
    }  

    public function getQuestion()
    {
        echo 'Что между нами может быть общего?' . '<br>';
    }

    public function isHighSpeed()
    {
        if ($this -> name !== 'Ferrari') {
            return false;
        } else {
            return true;
        }
    }
}

$skoda = new Car('SCODA Octavia II', 450000, 'white');
$isuzu = new Car('Isuzu Trooper', 800000, 'green');
echo $skoda -> name . ' ' . $skoda -> price . 'руб.' . ' ' . $skoda -> color . '<br>';
$isuzu -> getCar();
echo $isuzu -> name . ' ' . $isuzu -> price . 'руб.' . ' ' . $isuzu -> color . '<br>';
$isuzu -> getQuestion();
if (!$skoda -> isHighSpeed()) echo 'Я не разбираюсь в машинах' . '<br>';
echo '<hr>';

class TV extends AnyItem implements TvInterface
{
    public $type;
    public $screen;
    private $price;

    public function __construct($name, $type, $screen, $price)
    {
        $this -> name = $name;
        $this -> type = $type;
        $this -> screen = $screen; 
        $this -> price = $price;
    }

    public function getTV()
    {
       echo $this -> name . ' ' . $this -> screen . ' ' . $this -> price . 'руб.' . '<br>';
    }

    public function getQuestion()
    {
        echo 'Особенно у телевизора и утки?' . '<br>';
    }

    public function setYear($year)
    {
        $this -> year = $year;
        return $this;
    }
}

$lg = new TV('LG 24LH451U', 'LED', 24, 12489);
$sony = new TV('Sony KD-65A1', 'OLED', 65, 369989);
$lg -> getTV();
$sony -> getTV();
$sony -> getQuestion();
$lg -> setYear(2017);
$arrLg = (array)$lg;
echo $arrLg['year'] . '<br>';
echo '<hr>';

class Pen extends AnyItem implements PenInterface
{
    public $color;
    public $type;
    private $price;
   
    public function __construct($name, $color, $type, $price)
    {
        $this -> name = $name;
        $this -> color = $color;
        $this -> type = $type; 
        $this -> price = $price;
    }

    public function getPen()
    {
        echo "На мой взгляд, {$this -> name} - очень дорогая ручка. {$this -> price}руб., Карл!" . '<br>';
    }

    public function getNewPen()
    {
        if ($this -> price > 30000) {
            echo 'Безобразие.' . '<br>'; 
        }
        else {
            echo 'Все равно дорого.' . '<br>';
        } 
        if ($this -> type !== 'ballpen') {
            echo "В задании же сказано - Шариковая ручка! А {$this -> name} - перьевая." . '<br>';
        } 
    }

    public function getQuestion()
    {
        echo 'Может быть есть что-то между ручками и утками?' . '<br>';
    } 

    public function getDescription()
    {
        echo 'Ну-ка, повтори!' . '<br>';
        $this -> getPen();
    }

}

$parker = new Pen('Parker Premier - Custom Tartan ST', 'black', '
a fountain pen', 45300);
$parker -> getPen();
$parker -> getNewPen();
$waterman = new Pen('Waterman Carene - Contemporary White ST', 'red', 'ballpen', 21400);
$waterman -> getPen();
$waterman -> getNewPen();
$waterman -> getQuestion(); 
$waterman -> getDescription();
echo '<hr>';

class Duck extends AnyItem implements DuckInterface
{
    public $type;
    private $weight = '3кг';

    public function __construct($name, $type)
    {
        $this -> name = $name;
        $this -> type = $type;     
    }

    public function getDuck()
    {
        if ($this -> type == 'home') {
            echo $this -> name . ' весит примерно ' . $this -> weight . '<br>';
        }
        else {
            echo $this -> name . ' - молодец!' . '<br>';
        }
    }

    public function getQuestion()
    {
        return 'Кря!' . '<br>';
    }

    public function isAlive()
    {
        if ($this -> getQuestion()) {
            return true;
        }
    }
}

$trueDuck = new Duck('Настоящая Утка', 'true');
$homeDuck = new Duck('Домашняя Утка', 'home');
$trueDuck -> getDuck();
$homeDuck -> getDuck();
echo $homeDuck -> getQuestion();
if ($homeDuck -> isAlive()) echo 'Живая!' . '<br>';
echo '<hr>';

class Product extends AnyItem implements ProductInterface
{
    public $category;
    private $price;
    private $discount; 

    public function __construct($name, $price, $discount) 
    {
        $this -> name = $name;
        $this -> price = $price;
        $this -> discount = $discount;
    }

    public function getPrice() 
    {
        if ($this -> discount) {
            return round($this -> price - ($this -> price * $this -> discount/100));
        } else {
            return $this -> price;
        }
    }

    public function getQuestion()
    {
        echo 'В любой непонятной ситуации иди есть ';
    }

    public function isTasty()
    {
        echo "вкусные {$this -> name}" . '<br>';
    }
}

$pelmeni = new Product('Пельмени Цезарь "Классические"', 344, 27);
$cookie = new Product('Печенье OREO', 128, 5);
$pelmeni -> getPrice();
$cookie -> getPrice();
echo $pelmeni -> name . ' ' . ' - ' . $pelmeni -> getPrice() . 'руб.' . '<br>';
echo $cookie -> name . ' ' . ' - ' . $cookie -> getPrice() . 'руб.' . '<br>';
$cookie -> getQuestion();
$cookie -> isTasty();
echo '<hr>';

?>



<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Наследование и интерфейсы</title>
</head>
<body>
  <h1>Мое понимание полиморфизма и наследования</h1>
  <p>Полиморфизм  – это свойство системы использовать объекты с одинаковым интерфейсом без информации о типе и внутренней структуре объекта.</p>
  <p>Я могу управлять своей машиной и вашей тоже, потому что принцип действия (интерфейс) у них один - газ, тормоз, сцепление, коробка передач, руль. Но объекты могут быть разные - УАЗ Патриот или Volvo C30. Или дедушкин трактор.  </p>
  <p>Наследование - это свойство системы, позволяющее описать новый класс на основе уже существующего с частично или полностью заимствующейся функциональностью. Класс, от которого производится наследование, называется базовым или родительским. Новый класс – потомком, наследником или производным классом. Каждый производный класс полностью реализует интерфейс родительского класса.</p>
  <p>Выпуск новой модели автомобиля - не нужно проектировать с нуля, можно взять за основу предыдущее поколение и внести ряд конструктивных изменений.</p>

  <h2>Отличие интерфейсов и абстрактных классов</h2>
  <p>В интерфейсах описывается сигнатура методов без их реализации. Методы д.б. публичными. Интерфейсы могут содержать константы. Нельзя описывать свойства. Множественное наследование.
  <p>В абстрактных классах может быть и сигнатура методов и реализация. Можно описывать свойства. Множественное наследование - нет.</p>

</body>
</html>