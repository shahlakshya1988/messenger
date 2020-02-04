<?php
class Teacher{
    static $min_age = 25;
    static $max_age = 25;
    public function printMinAge(){
        echo PHP_EOL."Print Min Age ::: ".static::$min_age.PHP_EOL;
    }
    public static function demoMethod(){
        echo PHP_EOL."This is Static Demo Method".PHP_EOL;
    }
}
class Student extends Teacher{
    public  function student(){
        echo PHP_EOL."Class :: ".PHP_EOL;
        Teacher::printMinAge();

        echo PHP_EOL."Parent :: ".PHP_EOL;
        Parent::printMinAge();
    }
}
echo Teacher::$min_age.PHP_EOL;
Teacher::$min_age++;
echo Teacher::$min_age.PHP_EOL;
$t1 = new Teacher();
echo $t1->min_age.PHP_EOL;
echo $t1::$min_age.PHP_EOL;
echo $t1->printMinAge();
$t1->demoMethod();
$s1 = new Student();
$s1->student();