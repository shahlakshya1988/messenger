<?php 
trait Display{
    protected function showThis($message){
        echo $message;
    }
}
trait DisplayMore{
    protected function alsoShowthis(){
        echo "This is from other Trait";
    }
}
class Main{
    use Display;
    use DisplayMore;
    public function displayingData(){
        $this->showThis("My First Trait");
        echo PHP_EOL;
        $this->alsoShowthis();
    }
}
$m1 = new Main();
$m1->displayingData();
echo PHP_EOL;
(new Main())->displayingData();