<?php
class base{
    public function hell(){
        echo "this is hell<br>";
        return $this;
    }
    public function paradise(){
        echo "this is paradise<br>";
        return $this;
    }
    public function world(){
        echo "this is world<br>";
        
    }
}

$test = new base();

$test->hell()->paradise()->world();
?>