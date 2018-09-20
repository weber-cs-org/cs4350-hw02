<?php

namespace App\Controllers;


use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class HomeAction
{
    private $view;
    private $log;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->log = $logger;
    }

    public function __invoke(Request $req, Response $res, $args = [])
    {
        // TODO: Implement __invoke() method.
        $this->log->info('Home page action dispatched');
        $this->view->render($res, 'index.html.twig');
        return $res;
    }

}