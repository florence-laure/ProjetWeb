<?php

namespace Actions;
use Models;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProgramsDisplayAction extends Action
{
	public function __invoke(Request $request, Response $response, $args = []) 
	{
		//appel du model
		$programModel = $this->ci->get('progModel');
		$arrayProgs = $programModel->getAllProgrammes();

		return $this->ci->get('renderer')->render($response, 'programmes.php',
			array(
				'arrayProgs'=>$arrayProgs
			)
		);
	}

	
}