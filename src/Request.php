<?php

declare(strict_types=1);


class Request
{
  private array $get = [];
  private array $post = [];
  private array $server = [];

  public function __construct(array $get, array $post, array $server)
  {
    $this->get = $get;
    $this->post = $post;
    $this->server = $server;
  }

  public function getParam(string $name, $default = null)
  {
    return $this->get[$name] ?? $default;
  }

  public function hasPost(): bool
  {
    return !empty($this->post);
  }

  public function postparam(string $name, $default = null)
  {
    return $this->post[$name] ?? $default;
  }

  public function isPost(): bool
  {
    return $this->server['REQUEST_METHOD'] === 'POST';
  }
}