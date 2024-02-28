<?php

require 'vendor/autoload.php';

use App\Configs\SQLiteConnection;
use App\Controller\crudController;

$pdo = (new SQLiteConnection())->connect();

$getAll = (new crudController($pdo))->get();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getFirst = (new crudController($pdo))->first($id);
}

$page = ! isset($_GET['page']) ? 'view/index.php' : 'view/' . $_GET['page'] . '.php';
include $page;
