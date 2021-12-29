<?php

require 'vendor/autoload.php';


session_start();



spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$user = new User();

$user->getUser($_SESSION['user']);

use Carbon\Carbon;

use Stripe\StripeClient;

$stripe = new StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");




echo Carbon::now()->format('Y-m-d');


/*
 $petko = new User();
$petko->setName('Petko');
$petko->setAgree(true);
$petko->setEmail('petko@pingdevs.com');
$petko->setPassword('temp12345');
$petko->setImage('https://cdn.pixabay.com/photo/2017/09/14/11/06/water-2748638__480.png');
$petko->setEmployed('2021-01-01');
// $petko->save();
*/



/*
$verce = new User();

$product = new Products();

$product->getProduct(4);

$product->setName('Product 102');
$product->setQuantity('40');
// var_dump($product);

$product->updateProduct();

var_dump($product->getName());



// $verce->save();

// var_dump($verce);
// var_dump($martin);



$user = new User();

// $user->getUser('14');


// $user->setEmail('sasho@gmail.com');
// $user->updateUser();

// var_dump($user->email);


// $user->deleteUser();
$users = $user->getUsers();



foreach($users as $user)
{
   // var_dump($user->email);
}


$product2 = new Products();
$product->setName('Product 3999');
$product->setImage('http://google.com');
$product->setQuantity('20');
$product->setPrice('10');
$product->setDescription('<p> Neshto </p>');
// $product->save();


$products = $product->getProducts();

foreach($products as $product) {

    var_dump($product->getName());
}


//var_dump($user->email);

//echo $armen->getPassword();


$posleden = new Products();
$posleden->getProduct(8);
// $posleden->deleteProduct();

*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>

<h1></h1>


</body>
</html>
