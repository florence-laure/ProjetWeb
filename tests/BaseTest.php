<?php

namespace Tests;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;
use PHPUnit\Framework\TestCase;

use Actions;
use PDO;

class BaseTest extends TestCase
{
	public function runApp($act, $requestMethod, $requestUri, $requestData = null)
    {
    
        // Create a mock environment for testing with
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri
            ]
        );
        // Set up a request object based on the environment
        $request = Request::createFromEnvironment($environment);
        // Add request data, if it exists
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }
        // Set up a response object
        $response = new Response();

		// Use the application settings
        $settings = require __DIR__ . '/../src/settings.php';

        // Instantiate the application
        $app = new App($settings);

        $container = $app->getContainer();

        // Set up dependencies
        require __DIR__ . '/../src/dependencies.php';

        $dsn = 'mysql:host=your_db_host;dbname=your_db_name;charset=utf8';
        $usr = 'your_db_username';
        $pwd = 'your_db_password';

        $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);


        // Register routes
        require __DIR__ . '/../src/routes.php';

        //$action = new $act.'::class'.($container);
        $action = new Actions\ProgramsDisplayAction($container);
        
        //run the controller action
        $response = $action($request,$response,[]);
        
        return $response;
       
    }
}