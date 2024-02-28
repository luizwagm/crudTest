<?php

require 'vendor/autoload.php';

use App\Configs\SQLiteConnection;
use App\Controller\crudController;

$pdo = (new SQLiteConnection())->connect();
$exec = (new crudController($pdo));

switch ($getAction)
{
    case 'update':
    case 'create':
        $exec->store($_INPUT);
        break;
    case 'show':
        $exec->first($_GET['id']);
        break;
    case 'delete':
        $exec->delete($_GET['id']);
        break;
    default:
        $exec->get();
        break;
}
