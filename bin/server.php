<?php

use Example\SearchServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use TS\Protobuf\HttpHandler;
use TS\Protobuf\SearchService;

$loader = require __DIR__ . '/../vendor/autoload.php';


$request = Request::createFromGlobals();
$handler = HttpHandler::create(SearchServiceInterface::class, new SearchService());
$response = $handler->handle('search', $request);
$response->prepare($request);
$response->send();

