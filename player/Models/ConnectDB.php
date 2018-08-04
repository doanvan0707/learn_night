<?php
// kết nối bằng PDO
class ConnectDB
{
		public static function connect()
    {
        try {
          $dsn = 'mysql:host=localhost; dbname=players_db';
          $userName = 'root';
          $password = '';

          $db = new PDO ($dsn, $userName, $password);
          return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
