<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\ServiceAccount;
use Firebase\Auth\Token\Exception\InvalidToken;

$factory = (new Factory)
    ->withServiceAccount('makanikapp-f4e0f-firebase-adminsdk-do6is-726b6363bf.json')
    ->withDatabaseUri('https://makanikapp-f4e0f-default-rtdb.firebaseio.com/');

    $database = $factory->createDatabase();
    $auth = $factory->createAuth();

?>