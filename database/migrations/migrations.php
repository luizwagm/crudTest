<?php

namespace Database\Migrations;

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Configs\ConnectDB;

$dotenv = Dotenv::createMutable(getcwd());
$dotenv->load();

$pdo = (new ConnectDB($_ENV))->connect();
(new CreatePeopleTable($pdo))->execute();