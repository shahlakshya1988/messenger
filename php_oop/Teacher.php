<?php 
class Teacher{
    // public means variables can be accessed outside and inside freely
    // outside use an object
    public $name;
    public $age;
    public $address;

    public function teacherName(){
        return ($this->name) ? $this->name : "Name Not Set";
    }
    public function teacherAddress(){
        return ($this->address) ? $this->address : "Address Not Set";
    }
}
$t1 = new Teacher();
$t1->name = "Some Teacher Name";
echo $t1->teacherName();
echo PHP_EOL;
echo $t1->teacherAddress();
echo PHP_EOL;
$t1->address = "Gujarat, India";
echo $t1->teacherAddress();
echo PHP_EOL."New Object Created".PHP_EOL;
$t2 = new Teacher();
echo $t2->teacherName();
echo PHP_EOL;
echo $t2->teacherAddress();