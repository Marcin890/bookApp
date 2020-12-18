<?php

declare(strict_types=1);

 

class View
{
   public function render(string $page, array $params = []): void
  {
    $params = $params;

    require_once("templates/layout.php");
  }
}
  ?>