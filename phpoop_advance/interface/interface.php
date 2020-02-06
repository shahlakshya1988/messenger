<?php
interface DisplayInterface{
    public function displayDemo(array $data);
}
class Display implements DisplayInterface{
    public function displayDemo(array $data){
        echo "<pre>",print_r($data),"</pre>".PHP_EOL;
        echo __CLASS__." ".__METHOD__;
    }
}
$d1 = new Display();
$data = array("1","2","3","4");
$d1->displayDemo($data);