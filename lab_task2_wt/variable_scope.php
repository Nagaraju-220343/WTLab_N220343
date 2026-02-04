<?php 
//task A2
$names=array("Nagaraju","Nani","Mani");
echo "Names are:\n";
echo $names[0];
echo "\n";
$naming=array("one"=>"nagaraju","two"=>"nani","three"=>"mani");
echo $naming["three"];
echo "\n";
echo var_dump($names);
echo "\n";
echo var_dump($naming);
echo "\n";
$was=null;
echo var_dump($was);
echo "\n";



#task A3  ::scope of variables 
// if you want to use global variable in the function you must re-declare it using the global keyword
$number = 10;

// $GLOBALS is an array which stores all global variables; indexes are their names
function scope_test(){
    static $number=5;
    echo "$number";
    $number++;
    
}
scope_test();
echo "\n";
echo "$number";

echo "\n";
scope_test();

// by using $GLOBALS arr
$n1="nagrajjjjj";
$n2="Guntrediiiiii";

function test2(){
    echo $GLOBALS['n2'];
    echo "\n";
    echo $GLOBALS['n1'];
    echo "\n";
}
test2();





?>