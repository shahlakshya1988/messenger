<?php 
/**
 * we can't overide final method
 */
class Teacher{
    final public function my_name(){
        echo __CLASS__." ".__METHOD__;
    }
}
class Student extends Teacher{
    /**
     * can't be use for variables
     */
    final public $age = "12";
    public function my_name(){
        echo __CLASS__." ".__METHOD__;
    }
}
$s1 = new Student();
$s1->my_name();