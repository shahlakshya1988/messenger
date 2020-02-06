<?php 
abstract class Cars{
    protected $brand ="BMW";
    public function showBrand(){
        return $this->brand;
    }
    public function setBrand($newBrand){
        $this->brand =  $newBrand;
        return $this;
    }
    abstract public function wheels($wheels);
}
class BMW extends Cars{
    public function wheels($wheels){
        return $this->brand." ".$wheels;
    }
}
class Audi extends Cars{
    public function wheels($wheels){

    }
}
echo (new BMW())->showBrand();
echo PHP_EOL;
echo (new BMW())->wheels(5);
echo PHP_EOL;
echo (new Audi())->setBrand("Audi")->showBrand();
// (new Cars())->showBrand();