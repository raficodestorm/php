<?php
class nana {
    public $a, $b, $c;

    function sum (){
        $this->c = $this->a + $this->b;
        return $this->c;
    }
    function sub (){
        $this->c = $this->a - $this->b;
        return $this->c;
    }
    
}

$d = new nana();
$d->a = 20;
$d->b = 10; 
echo $d->sum()."<br>";
echo $d->sub(); 
?>

A quick brown fox jumps over the lazy dog 
