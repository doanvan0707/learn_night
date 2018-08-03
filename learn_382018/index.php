<?php
require_once 'Models/Product.php';
$categories = new Product;
$categories = $categories->showCategory();
$products = new Product;
$products = $products->index();
require_once 'views/frontend/index.php';