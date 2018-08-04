<?php
require_once 'ConnectDB.php';

Class Player 
{
    public $name;
    public $age;
    public $national;
    public $position;
    public $salary;

    public $db;

    function __construct()
    {
        $this->db = ConnectDB::connect();
    }

    public function index()
    {
    		try {
            $query = "select * from players";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $players = $statement->fetchAll();
            $statement->closeCursor();
            return $players ? $players : [];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}