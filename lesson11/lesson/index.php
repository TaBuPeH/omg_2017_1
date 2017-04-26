<?php

require_once('model.php');


$product_table = new Model('products');
$store_table = new Model('stores');


/*
$data['id'] = 0;
$data['color_id'] = 2;
$data['price'] = 5;


$product_table->insert($data);


$result = $product_table->getAll();

var_dump($result);

*/

$data['id'] = 3;
$data['city'] = 'Chalgostan';


$store_table->save($data);

$result = $store_table->getAll();

var_dump($result);
