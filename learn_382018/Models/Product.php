<?php
require_once 'ConnectDB.php';
Class Product 
{
    public $code;
    public $name;
    public $description;
    public $image;
    public $price;

    public $db;

    function __construct()
    {
        $this->db = ConnectDB::connect();
    }

    public function index()
    {
        try {
            $query = "select p.id, p.code, p.name, p.description, p.price, c.name as category_name from products as p join categories as c on p.category_id = c.id";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            return $products ? $products : [];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function showCategory()
    {
         try {
            $query = "select * from categories";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $categories = $statement->fetchAll();
            $statement->closeCursor();
            return $categories ? $categories : [];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }

    public function insert($code, $name, $description, $price, $category_id)
    {
        try {
            $query = "insert into products
              (code, name, description, price, category_id) values
              (:code, :name, :description, :price, :category_id)";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':code', $code);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function showProductById($id)
    {
        try {
            $query = "select * from products where id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $product = $statement->fetch();
            $statement->closeCursor();
            return $product ? $product : [];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function showProductByCateId($cate_id)
    {
        try {
            $query = "select p.id, p.code, p.name, p.description, p.price, c.name as category_name from products as p join categories as c on p.category_id = c.id where c.id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $cate_id);
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            return $products ? $products : [];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function showDetailById($id)
    {
        try {
            $query = "select p.id, p.code, p.name, p.description, p.price, c.name as category_name from products as p join categories as c on p.category_id = c.id where p.id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $products = $statement->fetch();
            $statement->closeCursor();
            return $products ? $products : [];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($code, $name, $description, $price, $category_id, $id)
    {
        try {
            $query = "UPDATE products SET code = :code, name = :name, description = :description, price = :price, category_id = :category_id WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':code', $code);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function search($search)
    {
        try {
            $query = "select * from products
            where name like :search or description like :search";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':search', "%$search%");
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            return $products;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    
    public function delete($id)
    {
        try {
            $query = "delete from products where id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}