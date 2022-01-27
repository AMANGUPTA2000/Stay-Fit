<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


// $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/stayfitweb-app-firebase-adminsdk-grcp8-8b34afe3e4.json');

$firebase = (new Factory)->withServiceAccount(__DIR__.'/stayfitweb-app-firebase-adminsdk-grcp8-8b34afe3e4.json')
    ->withdatabaseUri('https://stayfitweb-app-default-rtdb.firebaseio.com');
$database = $firebase->createDatabase();

// $database = $firebase->getDatabase();

?>