<?php
class Teacher{
    public $name;
    public $age;
    public $address;
   
    public function __construct($name,$age,$address){
        echo PHP_EOL."Contructer Is Called Automatically Called".PHP_EOL;
        $this->address = $address;
        $this->age = $age;
        $this->name = $name;
    }
    public function teacherName(){
        return ($this->name) ? $this->name : "Name Not Set";
    }
    public function teacherAddress(){
        return ($this->address) ? $this->address : "Address Not Set";
    }
}
$obj1 = new Teacher("somename",32,"Address Goes Here");
echo $obj1->teacherName();
echo PHP_EOL;
echo $obj1->teacherAddress();
?>