<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
	$data = ['hello' => 'world'];
	$payload = json_encode($data);
	$response->getBody()->write($payload);
	return $response->withHeader('Content-Type', 'application/json');
});
$app->get('/accounts', function (Request $request, Response $response, $args) {
	$data = [
			[ 'name' => 'frank'],
			[ 'name' => 'bill']
		];
	$payload = json_encode($data);
	$response->getBody()->write($payload);
	return $response->withHeader('Content-Type', 'application/json');
});
$app->get('/{catchAll}', function (Request $request, Response $response, $args) {
	$data = ['code' => 404, 'error' => 'Page not found'];
	$payload = json_encode($data);
	$response->getBody()->write($payload);
	return $response->withStatus(404);
});

$app->run();

?>
