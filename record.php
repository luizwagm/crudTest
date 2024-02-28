<?php

require 'vendor/autoload.php';

use App\Configs\SQLiteConnection;
use App\Controller\crudController;

$pdo = (new SQLiteConnection())->connect();
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
