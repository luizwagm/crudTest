<?php

require 'vendor/autoload.php';

use App\Configs\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

echo 'teste ok';
