<?php
require_once '../Models/Product.php';
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
		case 'add': {
				header('Location: ../Views/backend/add.php');
				break;
		}
		case 'insert': {
				$code = filter_input(INPUT_POST, 'code');
				$name = filter_input(INPUT_POST, 'name');
				$description = filter_input(INPUT_POST, 'description');
				$price = filter_input(INPUT_POST, 'price');
				$category_id = filter_input(INPUT_POST, 'category_id');
				$products = new Product;
				$products->insert($code, $name, $description, $price, $category_id);
				header('Location: ../admin.php');
				break;
		}
		case 'edit': {
				$id = filter_input(INPUT_GET, 'id');
				header('Location: ../Views/backend/edit.php?id=' . $id);
				break;
		}
		case 'update': {
				$id = filter_input(INPUT_GET, 'id');				
				$code = filter_input(INPUT_POST, 'code');
				$name = filter_input(INPUT_POST, 'name');
				$description = filter_input(INPUT_POST, 'description');
				$price = filter_input(INPUT_POST, 'price');
				$category_id = filter_input(INPUT_POST, 'category_id');
				$products = new Product;
				$products->update($code, $name, $description, $price, $category_id, $id);
				header('Location: ../admin.php');
				break;
		}
		case 'detail': {
				$id = filter_input(INPUT_GET, 'id');
				header('Location: ../Views/backend/detail.php?id=' . $id);
				break;
		}
		case 'showproduct': {
				$cate_id = filter_input(INPUT_GET, 'cate_id');
				$showproducts = new Product;
				$showproducts = $showproducts->showProductByCateId($cate_id);
				include '../Views/frontend/indexByCategory.php';
				break;
		}
		case 'search': {
				$search = filter_input(INPUT_GET, 'search');
				$products = new Product;
        $products = $products->search($search);
        // get category
        $categories = new Product;
        $categories = $categories->showCategory();
        include('../Views/frontend/search.php');
        break;
		}
		case 'delete': {
				$id = filter_input(INPUT_GET, 'id');
				$products = new Product;
				$products->delete($id);
				header('Location: ../admin.php');
				break;
		}
}