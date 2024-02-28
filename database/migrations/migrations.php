<?php

namespace Database\Migrations;

require 'vendor/autoload.php';

use App\Configs\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

(new CreatePeopleTable($pdo))->execute();