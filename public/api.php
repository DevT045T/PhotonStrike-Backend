<?php

include("../vendor/autoload.php");

use devt045t\Api;
use devt045t\ApiParameter;
use devt045t\DataTypes;
use devt045t\HttpStatusCodes;
use devt045t\HttpMethods;

$api = new Api();

// Define allowed parameters
$param1 = new ApiParameter();
$param1
    ->name('username')
    ->required(true)
    ->type(DataTypes::STRING);

$param2 = new ApiParameter();
$param2
    ->name('password')
    ->required(true)
    ->type(DataTypes::INT);

// Add parameters to API instance
$api
    ->addParameter($param1)
    ->addParameter($param2);

// Set the allowed request methods
$api->setAllowedRequestMethod([HttpMethods::OPTIONS, HttpMethods::POST]);

// Validate parameters
$api->validate();

// Set the response data
$api->setResponse(['message' => 'Parameters received successfully']);

// Set the custom response code (optional)
$api->setResponseCode(HttpStatusCodes::OK);

// Send the response
$api->send();
