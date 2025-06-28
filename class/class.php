<?php
class Fun {
    public $name = "Rasel";
    public $color = "red";

    public function din($name) {
        $this->name = $name;
        return $this -> name;
    }

}
$nana = new Fun();

echo "<br>";
echo $nana->din("Rasel");
?>