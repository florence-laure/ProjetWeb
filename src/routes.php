<?php
// Routes
$app->get('/{name}', function ($request, $response, $args) {
	$name = $args['name'];
	$response->getBody()->write("Hello, $name");
	return $response;

    //return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/programmes/', ProgramsDisplayAction::class);
