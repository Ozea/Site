<?php
$name = "Саша";
$age = "17";
 echo "Меня зовут: $name", "<br />";
 echo "\nМне $age лет";
 unset($age);
?>

<?php
define("MY_CONST", "name");
echo defined("MY_CONST");
echo  "<h2>,MY_CONST,</h2>"
?>

<?php
$age1 = "0";
if ($age1 >=18 and $age1 <60) {
    echo "You have 1";
}
elseif($age1 >=1 and $age1 < 18) {
    echo "You have 2";
}
elseif($age1 >= 60) {
    echo "You have 3";
}
else{
    echo "Invalid";
}
?>


<?php
$bmw = array(
    "model"=> "X5",
    "speed"=> "120",
    "doors"=> "5",
    "year"=> "2006"
);
$toyota = array(
    "model"=> "Carina",
    "speed"=> "130",
    "doors"=> "4",
    "year"=> "2007"
);
$opel = array(
    "model"=> "Corsa",
    "speed"=> "140",
    "doors"=> "5",
    "year"=> "2007"
);
$cars = array();
$cars[] = $bmw;
$cars[] = $toyota;
$cars[] = $opel;
 echo "<p>BMW - ",$bmw["model"]," - ",$bmw["speed"]," - ",$bmw["doors"]," - ",$bmw["year"],"</p>";
 echo "<p>Toyota - ",$toyota["model"]," - ",$toyota["speed"]," - ",$toyota["doors"]," - ",$toyota["year"],"</p>";
 echo "<p>Opel - ",$opel["model"]," - ",$opel["speed"]," - ",$opel["doors"]," - ",$opel["year"],"</p>";

 ?>






























