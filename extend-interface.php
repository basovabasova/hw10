<?php
// echo внутри классов не использовать или минимально
class Bird // суперкласс
{
    public $sound; // пока никакого звука
    public $color = 'black';
    
    public function fly()
    {
        echo 'я летаю' . '<br>';
    }
    
    public function makeSomeSound()
    {
        echo "я издаю звук {$this -> sound}" . '<br>';
    }
}

class Duck extends Bird
{
    public $sound = 'Кря'; // наследует все свойства и методы Bird
}

class AlbinoDuck extends Duck
{
    // наследует все свойства и методы Duck + Bird 
    public $color = 'white';// переопределяем свойство
    public function makeSomeSound() // переопределяем метод
    {
        echo "а я говорю Мяу!" . '<br>';
    } 
}

$duck = new Duck();
$duck -> fly(); 
$duck -> makeSomeSound(); 
echo $duck -> color . '<br>';
$albinoDuck = new AlbinoDuck();
$albinoDuck -> makeSomeSound();
echo $albinoDuck -> color . '<br>';

abstract class Product 
{//класс, содержаший абстрактные методы, является абстрактным. Нельзя создать объект абстрактного класса
    protected $price;
    public $title;

    public function __construct($title, $price)
    { 
        $this -> price = $price;
        $this -> title = $title;
    }
    
    public function getTitle()
    {
        return $this -> title;
    }
    
    public function getPrice()
    {
        return $this -> price;
    }

    public function getFullDescription()
    {
        echo 'Цена: ' . $this -> price . '. '; // по умолчанию в описании мы выводим цену
        $this -> getDescription(); // обращаемся к РЕАЛИЗАЦИИ абстрактного метода
    }
    
    abstract public function getDescription();//абстрактный метод, у которого нет тела. нет return
}

class Book extends Product
{
   // цена и название наследуются от Product
    public $pages;
    public $author;
    public $year;

    public function setAuthor($author)// сеттер - присваивание значения свойству
    {
        $this -> author = $author;
        return $this;
    }
    
    public function setPages($pages)
    {
        $this -> pages = $pages;
        return $this;
    }
    
    public function setYear($year)
    {
        $this -> year = $year;
        return $this;
    }

    public function getDescription()
    {
        echo 'Хорошая книга ' . '<br>';
    }
   
}
$book = new Book('Мастер и Маргариtа', 500);
$book -> setAuthor('Булгаков')
    -> setPages(200)
    -> setYear(2015);
$book -> getDescription();
echo '<pre>';
print_r($book);


final class Flash extends Product 
{//теперь никто не сможет наследовать методы и свойства данного класса
    private $memory;

    public function getDescription()
    {//работает при public $memory = 800;
        echo "Флешка на {$this -> memory} мегабайт" . '<br>';
    }

    public function setMemory($memory)
    {
        $this -> memory = $memory;
        return $this;
    }

    public function getDiscount()
    {
        return round($this -> price * 20 / 100);
    }
}

$fleshka = new Flash('Sony', 700);
$fleshka -> getFullDescription();
//$fleshka -> memory = 2000; // выдаст ошибку, пытаемся изменить приватное свойство
$fleshka -> setMemory(2000);
echo '<pre>';
print_r($fleshka);
//echo $fleshka -> price;
echo $fleshka -> getDiscount();








?>



<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Наследование и интерфейсы</title>
</head>
<body>
  <p>hello</p>
</body>
</html>