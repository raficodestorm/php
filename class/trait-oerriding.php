<?php
trait base{
    private function say(){
        echo "Hello";
    }
}
class bus{
    use base{
        base::say as public;
    }
}

$name = new bus();
$name->say();
?>