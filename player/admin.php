<?php
require_once 'Models/Player.php';
$players = new Player;
$players = $players->index();
include_once 'Views/backend/home.php';
