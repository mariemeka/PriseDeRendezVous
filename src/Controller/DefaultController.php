<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
  public function index()
  {
    $content = "Notre propre Hello World !";

    return new Response($content);
  }
}