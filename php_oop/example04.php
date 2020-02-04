<?php 
class Teacher{
    public $name;
    public $address;
    public function __construct(){
        echo PHP_EOL.PHP_EOL."This is From TEACHER class Constructer".PHP_EOL.PHP_EOL;
    }
    public function name(){
        echo PHP_EOL."From  Class ".__CLASS__."  ".__METHOD__.PHP_EOL;
        if(isset($this->name)){
            echo PHP_EOL.$this->name.PHP_EOL;
        }
    }
    public function address(){
        echo PHP_EOL."From  Class ".__CLASS__."  ".__METHOD__.PHP_EOL;
        if(isset($this->address)){
            echo PHP_EOL.$this->address.PHP_EOL;
        }
    }
}
class Student extends Teacher{
    public function name(){
        echo PHP_EOL."From  Class ".__CLASS__."  ".__METHOD__.PHP_EOL;
        parent::name();
    }
    public function printDetails(){
        $this->name();
        $this->address();
    }
}
$s1 = new Student;
$s1->name();
echo PHP_EOL."*************************".PHP_EOL;
$s1->name = "Name has been set by Student Object";
$s1->address = "Address has be set by Student Object";
$s1->name();
echo PHP_EOL."*************************".PHP_EOL;
$s1->address();

echo PHP_EOL."*************************".PHP_EOL;
$s1->printDetails();