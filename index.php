<?php 

require_once("vendor/autoload.php");

$app = new \slim\slim();

$app->config('debug', true);

$app->get('/', function() {
    
	echo "OK";

});

$app->run();

 ?>