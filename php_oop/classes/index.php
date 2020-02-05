<?php 
/*include "Teacher.php";
include "Students.php";
include "Employee.php";*/
/*function __autoload($class_name){
    echo $class_name.PHP_EOL;
    include $class_name.".php";
}*/
spl_autoload_register(function($class_name){
    echo $class_name.PHP_EOL;
    include $class_name.".php";
});
$t1 = new Teacher();
echo PHP_EOL;
$s1 = new Students();
echo PHP_EOL;
$e1 = new Employee();
echo PHP_EOL;