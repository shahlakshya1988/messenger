<?php
/**
 *public -> Can be accessed from any where [Inisde, Child, Outside(using objects)]
 *protected -> Can be accessed from Inside, child only
 *private -> Can be accessed only Inside the class
 *  */ 
class Human{
    public $gender;
    public $name;
    protected $email;
    private $mobile;
    
    public function printGender(){
        echo PHP_EOL;
        var_dump($this->gender);
    }
    public function printName(){
        echo PHP_EOL;
        var_dump($this->name);
    }
    public function printEmail(){
        echo PHP_EOL;
        var_dump($this->email);
    }
    public function printMobile(){
        echo PHP_EOL;
        var_dump($this->mobile);
    }

}

class Students extends Human{
    public function __construct(){
        echo $this->gender="Male".PHP_EOL;
        echo $this->name="Some Name".PHP_EOL;
        echo $this->email="example@example.com".PHP_EOL;
        echo $this->mobile="789654123".PHP_EOL;
    }
}

$s1 = new Students();
$s1->printGender();
$s1->printName();
$s1->printEmail();
$s1->printMobile(); //NULL

$h1 = new Human();
// $h1->email = "1234";  protected
// $h1->mobile = "1234"; private