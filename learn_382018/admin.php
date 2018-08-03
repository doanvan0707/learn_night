<?php
require_once 'Models/Product.php';
$products = new Product;
$products = $products->index();
require_once 'Views/backend/home.php';