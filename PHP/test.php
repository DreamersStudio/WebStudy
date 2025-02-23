<?php
/*
$odd_numbers = [1,3,5,7,9];
print_r($odd_numbers);
$first_item = reset($odd_numbers);
echo $first_item;


$oddd_numbers = [1,3,5,7,9];
echo $oddd_numbers;
unset($oddd_numbers[2]); // will remove the 3rd item (5) from the list
print_r($oddd_numbers);

echo "<br>";

$numbers = [4,2,3,1,5];
sort($numbers);
print_r($numbers);


$numbers = [1,2,3,4,5,6];
print_r(array_slice($numbers, 3));

$numbers = [1,2,3,4,5,6];
print_r(array_slice($numbers, 3, 2));

$numbers = [1,2,3,4,5,6];
print_r(array_splice($numbers, 3, 2));
print_r($numbers);


$phone_numbers = [
  "Alex" => "415-235-8573",
  "Jessica" => "415-492-4856",
];

print_r($phone_numbers);
echo "Alex's phone number is " . $phone_numbers["Alex"] . "\n";
echo "Jessica's phone number is " . $phone_numbers["Jessica"] . "\n";

$phone_numbers = [
  "Alex" => "415-235-8573",
  "Jessica" => "415-492-4856",
];

if (array_key_exists("Alex", $phone_numbers)) {
    echo "Alex's phone number is " . $phone_numbers["Alex"] . "\n";
} else {
    echo "Alex's phone number is not in the phone book!";
}

if (array_key_exists("Michael", $phone_numbers)) {
    echo "Michael's phone number is " . $phone_numbers["Michael"] . "\n";
} else {
    echo "Michael's phone number is not in the phone book!";
}



$phone_numbers = [
  "Alex" => "415-235-8573",
  "Jessica" => "415-492-4856",
];

print_r(array_keys($phone_numbers));
print_r(array_values($phone_numbers));





$matrix = [ 
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

foreach ($matrix as $numbers) {
    $sum = 0;
    #print_r($numbers);
    foreach ($numbers as $n){
        #print_r($n."\n");
        $sum += $n;
    }
    echo "{$sum}\n";
}


*/

$first_name = "John";
$last_name = "Doe";
$name = $first_name . " " . $last_name;
echo $name . "\n";
echo strlen($name);


$filename = "image.png";
$extension = substr($filename, strlen($filename) - 3);
echo "\nThe extension of the file is $extension";



function writeName($fname,$punctuation)
{
    echo $fname . " Refsnes" . $punctuation . "<br>";
}
 
echo "My name is ";
writeName("Kai Jim",".");
echo "My sister's name is ";
writeName("Hege","!");
echo "My brother's name is ";
writeName("Ståle","?");



?>