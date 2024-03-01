<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

use App\Configs\ConnectDB;
use App\Controller\crudController;

$pdo = (new ConnectDB($_ENV))->connect();

$getAll = (new crudController($pdo))->get();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getFirst = (new crudController($pdo))->first($id);
}

$page = ! isset($_GET['page']) ? 'view/index.php' : 'view/' . $_GET['page'] . '.php';
include $page;
