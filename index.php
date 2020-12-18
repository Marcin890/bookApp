<?php
declare(strict_types=1);

declare(strict_types=1);
// autoloader - na podstawie namespace tworzy require_once(),
spl_autoload_register(function (string $classNamespace) {
  $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
  $path = "src/$path.php";
  require_once($path);
});

require_once("src/Utils/debug.php");
require_once("src/Controller/AbstractController.php");
require_once("src/Controller/BookController.php");
require_once("src/Request.php");

$config = require_once("config/config.php");
$request = new Request($_GET, $_POST, $_SERVER);

AbstractController::initConfig($config);

(new BookController($request))->run();



?>