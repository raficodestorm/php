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
                Data Type 
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
?>