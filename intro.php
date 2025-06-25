<?php
echo "Hello! Mr. Rasel <br/>";

/*==========================================
                variable 
==========================================*/
$name = "Rasel";
echo $name."<br/>";


$name = "Amin";
$id = "3344";
$email = "aminul";

echo "Name: ".$name."<br/>";
echo "ID:".$id."<br/>";
echo "Email".$email."<br/>";

/*==========================================
                Data Type check
==========================================*/

$w = "Ammm";
$p = 30;
$f = 3.21;

var_dump ($w);
var_dump ($p);
var_dump ($f);

/*==========================================
                function
==========================================*/
$many = function($sm, $sn) {
    return $sm + $sn;
};
$many(2, 3);


$info= fn() => "Hello";
echo $info();

/*==========================================
                recursive function
==========================================*/

function Info ($num){
    if($num<=10){
    echo "$num <br>";
    Info($num+1);
    }
}
Info(3);

/*==========================================
               indexed array
==========================================*/

$fruits = array ("mango", "apple", "banana");

echo $fruits[0];

/*==========================================
               Associative array
==========================================*/
$person = array (
    "Name" => "Rafi",
    "age" => "26",
    )
/*==========================================
            Multidimantional  array
==========================================*/
$men = array(
    array("name" => "Rafi", "age" => 26),
    array("name" => "Rasel", "age" => 35),
    array("name" => "Rana", "age" => 26),
);

print_r($men);

echo $men[1];


?>