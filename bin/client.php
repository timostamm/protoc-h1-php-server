<?php /** @noinspection PhpComposerExtensionStubsInspection */

use Example\SearchRequest;
use Example\SearchResponse;

$loader = require __DIR__ . '/../vendor/autoload.php';


if ($argc !== 2) {
    print "Usage: " . $argv[0] . " <url>" . PHP_EOL;
    print $request->serializeToJsonString();
    print PHP_EOL;
}


$request = new SearchRequest();
$request->setText('foo');
print "sending search request:" . PHP_EOL;
print $request->serializeToJsonString();
print PHP_EOL;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request->serializeToString());
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/protobuf'));
$result = curl_exec($ch);

$response = new SearchResponse();
$response->mergeFromString($result);

print "got search response:" . PHP_EOL;
print $response->serializeToJsonString();
print PHP_EOL;


