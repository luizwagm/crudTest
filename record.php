<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

use App\Controller\crudController;
use App\Configs\ConnectDB;

$pdo = (new ConnectDB($_ENV))->connect();
$exec = (new crudController($pdo));

$getAction = $_GET['action'];

switch ($getAction)
{
    case 'update':
    case 'create':
        $exec->store($_REQUEST);
        header("Refresh:0; url=index.php");
        break;
    case 'edit':
        header("Refresh:0; url=index.php?page=edit");
        break;
    case 'delete':
        $exec->delete($_GET['id']);
        header("Refresh:0; url=index.php");
        break;
    default:
        $exec->get();
        header("Refresh:0; url=index.php");
        break;
}
