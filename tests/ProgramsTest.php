<?php

namespace Tests;
use Actions;

class ProgramsTest extends BaseTest 
{	
    
   public function testProgramsDisplayAction()
   {

        $response = $this->runApp('ProgramsDisplayAction','GET', '/programmes/');
        $this->assertEquals(200, $response->getStatusCode());
        //$this->assertContains('Portail', (string)$response->getBody());
        //$this->assertNotContains('Hello', (string)$response->getBody());
    }	

}
