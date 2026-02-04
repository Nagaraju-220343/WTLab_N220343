<?php 
$email="n22043@rguktn.ac.in";
$password="1234";

// echo "lentgh of th password is " ,strlen($password);
// echo "\t";
// echo str_word_count("my name is nagarajjj");
// echo "\t";
// echo strrev($email);
// echo "\t";
// //case conversion
// echo " ",strtoupper($email);
// echo " ",strtolower(strtoupper($email));
// echo "\t";

// echo str_replace("nagaraj","NAGARAJ","my name is nagaraj");
// echo "\t";
// echo strpos("my name is nagaraj","nagaraj");
// echo "\t";

// echo ucfirst("nagaraj guntreddi");
// echo "\t";
// echo ucwords("nagaraj guntreddi");
// echo "\t";


// //substring &triming
$str="    Hello my name is nagaraj guntreddi   ";
// $substr=substr($str,5,10);
// echo $substr;
// echo "\t";
// $trimmed=rtrim($str);
// echo $trimmed;

// string comparision

echo strcmp("nani","mani");
// if(strcmp("nagaraj","NAGARAJ")===0){
//     echo "strings are equal";
// }
// else{
//     echo "strings are not equal";
// }

echo "\n";
if(strcasecmp("nagaraj","NAGARAJ")===0){
    echo "strings are equal";
}
else{
    echo "strings are not equal";
}

echo "\n";
$text = "<b>Hello</b>";
echo htmlspecialchars($text);

echo "\n";

echo "$text";


echo "\n";
$text = 'He said "Hello"';
echo addslashes($text);
echo "\n";


?>