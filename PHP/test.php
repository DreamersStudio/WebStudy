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



$rest = substr("abcdef", 1); 
echo $rest;



$fruits = "apple,banana,orange";
$fruit_list = explode(",", $fruits);
print_r($fruit_list);

$fruit_list = implode("-", $fruit_list);
print_r($fruit_list);


#多位数组求和所有值
$matrix = [ 
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];
$sum = 0;
foreach ($matrix as $numbers) {

    for ($i=0; $i<count($numbers); $i=$i+1) {
        
        #echo $numbers[$i] . "\n";
        $sum += $numbers[$i];
    }
    
}
echo $sum;




$num = [1,2,3,4,5,6,7,8,9,10];
$even_num = [];

foreach ($num as $key => $value) {
    #echo $key . " " . $value . "\n";
    if ($value % 2 == 0) {
        #$num[$key] = $value;
        #echo "$num[$key]\n";
        array_push($even_num, $value);
    } else {
        echo "not even number\n";
    }
}

print_r($even_num);


$counter = 0;

while ($counter < 10) {
    $counter += 1;

    if ($counter % 2 == 0) {
        echo "Skipping number $counter because it is even.\n";
        continue;
    }

    echo "Executing - counter is $counter.\n";
}



$counter = 0;

while ($counter < 10) {
    $counter += 1;

    if ($counter > 8) {
        echo "counter is larger than 8, stopping the loop.\n";
        break;
    }

    if ($counter % 2 == 0) {
        echo "Skipping number $counter because it is even.\n";
        continue;
    }

    echo "Executing - counter is $counter.\n";
}





$numbers = [53, 65, 26, 86, 66, 34, 78, 74, 67, 18, 34, 73, 45, 67, 75, 10, 60, 80, 74, 16, 86, 34, 12, 23, 42, 72, 36, 3, 73, 9, 92, 81, 94, 54, 97, 74, 45, 55, 70, 94, 96, 81, 86, 86, 84, 4, 32, 8, 96, 86, 87, 18, 84, 87, 59, 48, 32, 90, 17, 22, 82, 79, 66, 28, 17, 14, 80, 83, 66, 36, 21, 89, 68, 2, 51, 65, 20, 87, 48, 5, 1, 16, 60, 53, 84, 90, 16, 2, 37, 73, 57, 70, 57, 69, 68, 1, 24, 40, 72, 97];
$c = 0;
while ($c < count($numbers)-1) {
    $num = $numbers[$c];
    #echo $num . "--\n";

    $c++;
    #++$c;
    #echo $c . "--\n";

    if ($num % 2 == 0) {
        continue;    
    } else {
       echo $num . "\n";
    }
    #echo $c . "--\n";
}




include("sum.php");

$numbers = [53, 65, 26, 86, 66, 34, 78, 74, 67, 18, 34, 73, 45, 67, 75, 10, 60, 80, 74, 16, 86, 34, 12, 23, 42, 72, 36, 3, 73, 9, 92, 81, 94, 54, 97, 74, 45, 55, 70, 94, 96, 81, 86, 86, 84, 4, 32, 8, 96, 86, 87, 18, 84, 87, 59, 48, 32, 90, 17, 22, 82, 79, 66, 28, 17, 14, 80, 83, 66, 36, 21, 89, 68, 2, 51, 65, 20, 87, 48, 5, 1, 16, 60, 53, 84, 90, 16, 2, 37, 73, 57, 70, 57, 69, 68, 1, 24, 40, 72, 97];
$numbers = [1, 2, 3];

echo sum($numbers);



#类和继承
class Student {
    // constructor
    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        #echo $first_name;
    }

    public function say_name() {
        #$fn = $this->first_name;
        echo "My name is " . $this->first_name . " " . $this->last_name . ".\n";
    }
}

$alex = new Student("Alex", "Jones");
$alex->say_name();

class MathStudent extends Student {
    function sum_numbers($first_number, $second_number) {
        $sum = $first_number + $second_number;
        echo $this->first_name . " says that " . $first_number . " + " . $second_number . " is " . $sum;
    }
}

$eric = new MathStudent("Eric", "Chang");
$eric->say_name();
$eric->sum_numbers(3, 5);

*/

#练习题
/*
Exercise
Create a class called Car with a constructor that receives the brand and make year of the car, and a function called print_details that prints out the details of the car.

For example, for a 2006 Toyota car, the following line would be printed out:

This car is a 2006 Toyota.

// TODO: Implement the Car class here
class Car {

    public function __construct($brand, $year) {

        $this->brand = $brand;
        $this->year = $year;
        
    }

    public function print_details() {

        echo "This car is a $this->year $this->brand.";

    }
}


$car = new Car("Toyota", 2006);
$car->print_details();





#Exceptions
try {
  echo 2 / 0;
} #catch (Exception $e) {
  catch (Error $e) {  
  echo "Caught Error: " . $e->getMessage();
}
*/

/*
try {
    #echo @(2 / 0); // 使用 @ 符号抑制警告信息
    echo 2 / 0;
} catch (Error $e) {
    echo "Caught error: " . $e->getMessage();
}

try {
    // 尝试执行除零运算，这将触发一个 DivisionByZeroError 错误
    $result = 2 / 0;
    echo $result; // 这行代码不会被执行，因为错误会在之前被抛出
} catch (Error $e) {
    // 捕获 Error 类型的错误，包括 DivisionByZeroError
    echo "Caught error: " . $e->getMessage(); // 输出错误信息
}



phpinfo();



try {
    2 / 0;
} catch (Error $e) {
    echo "Caught error: " . $e->getMessage();
}



try {
  echo 4/0;
} catch (Exception $e) {
  echo "Divided by zero!";
} finally {
  echo "\nThis will be outputed even if exception will happen!";
}
*/

#Exercise
/*
Use a try-catch-finally block to first catch the exception and print out Exception caught! and then finally print out Done!. Your final output should look like: Exception caught! Done!

# This function will throw an exception!
function throw_exception() {
  try {
    throw new Exception("Exception!");
  } catch (Exception $e) {
    echo "Exception caught! ";
  } finally {
    echo "Done!";
  }
}

# Surround the statement in a try-catch-finally block!
throw_exception();



$y=10; 
echo ++$y;
echo "\n";
echo $y;

*/

$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43"); 
sort($age); 
print_r($age); 


$arr = array("apple", "banana", "cherry");
var_dump($arr);




?>