<?php
$source = array( 2, 5, 0, -9, 0, 7, -1, -4, 3 );

$negative = 0;
$positive = 0;
$zeros = 0;

foreach($source as $find) {
    if($find > 0) {
        $positive++;
    } else if($find < 0) {
        $negative++;
    } else {
        $zeros++;
    }
}
echo "The number source is : array( 2, 5, 0, -9, 0, 7, -1, -4, 3 )";
echo "<h3>The total positive number: $positive </h3>";
echo "<h3>The total negative number: $negative </h3>";
echo "<h3>The total zeros: $zeros </h3>";
?>