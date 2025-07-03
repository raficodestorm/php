<?php
class table{
    public static $name = "naman";

    public static function show() {
        echo "This is static method";
        echo self::$name;
    }
}
echo table::$name;
table::show();
class tool extends table{
    public $age = 25;
    
    public function shine() {
        return parent::$name;
        return $age;
    }
}
A quick brown fox jumps over the lazy dog 
A quick brown fox jumps over the lazy dog 
A quick brown fox jumps over the lazy dog 

$nam = new tool();
echo $nam->shine();
?>