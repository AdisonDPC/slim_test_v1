<?php

namespace Controller;

use Psr\Container\ContainerInterface,

    Psr\Http\Message\ServerRequestInterface as Request,
    Psr\Http\Message\ResponseInterface as Response;

class Home_Controller {

    protected $ciContainer;

    public function __construct (ContainerInterface $ciContainer) { 
        
        $this -> ciContainer = $ciContainer; 
    
    }

    public function getHome (Request $rRequest, Response $rResponse) {

        $aParameters = [
            'aPage' =>  [
                'strTitle' => 'Welcome - Slim + Twig',
                'strDescription' => 'Welcome to the oficial page Slim + Twig.'
            ]
        ];

        return $this -> ciContainer -> get('view') -> render($rResponse, 'welcome.twig', $aParameters);

    }

}
