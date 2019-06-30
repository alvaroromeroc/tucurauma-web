<?php
// DIC configuration
use Medoo\Medoo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$container = $app->getContainer();

// view renderer
$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer('templates', ['baseUrl' => $settings['base_url']]);
};

// Register component on container // Juntar con lo de arriba
/*$container['view'] = function ($container) {
    //return new \Slim\Views\PhpRenderer('templates',['baseUrl' => '/web/']);
    return new \Slim\Views\PhpRenderer('templates',['baseUrl' => '/tucurauma.cl/web/']);
};*/

// error 404 - 
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render($response->withStatus(404), '404.php', [
            "myError" => "Error"
        ]);
    };
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Medoo
$container['database'] = function ($c) {
    $settings = $c->get('settings')['database'];
    return new Medoo([
		'database_type' => $settings['db_type'],
		'database_name' => $settings['db_name'],
		'server'        => $settings['server'],
		'username'      => $settings['username'],
		'password'      => $settings['password'],
		'charset'       => $settings['charset'],
    ]);
};


//PHPMailer
$container['mailer'] = function ($c) {
    $settings = $c->get('settings')['mailer'];
    $mailer = new PHPMailer(true);
    return $mailer;
};
