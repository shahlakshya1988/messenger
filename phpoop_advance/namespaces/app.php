<?php 
namespace App;
include "helper.php";

use Helper\Display as HelpDisplay;

class Display{
    public static function getPost(){
        echo PHP_EOL."This is from Display Class getPost".PHP_EOL;
    }
}

Display::getPost();
HelpDisplay::getPost();