<?php
require 'vendor/autoload.php';
require 'classes/autoload.php';


$guzzleService  = new \GuzzleHttp\Client();
$apiConnector   = new apiconnector();
$cache          = new hddcache($guzzleService);
$cacheProcessor = new cacheprocessor();