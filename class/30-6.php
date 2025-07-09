<?php
class parants{
    public $name;
    public $age;

    public function __construct($n, $s) {
        $this->beton = $n + $s;
}
    function show(){
        echo "name : $this->name <br> age : $this->age <br> salary : $this->beton";
    }
}

$janan = new parants(5,10);
$janan->name = "mama";
$janan->age = 25;
echo $janan->show();

A quick broun fox jumps over the lazy dog 
A quick brown fox jumps over the lazy dog 
A quick brown fox jumps over the

?>