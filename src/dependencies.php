<?php
// DIC configuration
$container = $app->getContainer();
// View Renderer
$container['renderer'] = function() use ($container) {
    $settings = $container->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path'], $settings['twig']);
    return $view;
};
// monolog
$container['logger'] = function() use ($container) {
    $settings = $container->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
// HomeAction
$container['HomeAction'] = function() use ($container) {
    return new App\Controllers\HomeAction($container['renderer'], $container['logger']);
};
// Error Handlers
$container['errorHandler'] = function() use ($container) {
    return function($req, $res, $exception) use ($container) {
        return $container['renderer']->render($res->withStatus(500), 'errors/500.html.twig');
    };
};
$container['notFoundHandler'] = function() use ($container) {
    return function($req, $res) use ($container) {
        return $container['renderer']->render($res->withStatus(404), 'errors/404.html.twig');
    };
};