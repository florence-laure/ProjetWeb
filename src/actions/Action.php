<?php
namespace Actions;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

abstract class Action
{
	protected $ci;

	public function __construct($ci)
	{
		$this->ci = $ci;
	}
	
	abstract public function __invoke(Request $request, Response $response, $args = []);

}