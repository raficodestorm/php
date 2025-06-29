<?php
trait ami {
    public function ai($name) {
        echo "my name is $name";
    }
}

class mama {
    use ami;
    public $name;
    public $salary;
   

    function __construct($n, $b, $e){
        $this->name = $n;
        $this->salary = $b + $e;
    }

    function tomi(){
        echo "mamar nam : ". $this->name."<br>";
        echo "mamar beton : ". $this->salary;

}
}

$jah = new mama("Lal Mia", 1000, 500);
$jah->tomi();
?>