<?php

declare(strict_types=1);


require_once(dirname(__DIR__) . "\View.php");
require_once(dirname(__DIR__) . "\Model\AbstractModel.php");


class AbstractController
{
  protected const DEFAULT_ACTION = 'list';

  private static array $config = [];
  protected Request $request;
  protected View $view;
  protected AbstractModel $abstractModel;

  public static function initConfig(array $config): void
  {
    self::$config = $config;
  }

  public function __construct(Request $request)
  {
    $this->abstractModel = new AbstractModel(self::$config['db']);
    $this->request = $request;
    $this->view = new View();
  }
  final public function run(): void
  {
    $action = $this->action() . 'Action';
    // var_dump($action);
    $this->$action();
  }

  final private function action(): string
  {
    return $this->request->getParam('action', self::DEFAULT_ACTION);
  }
}