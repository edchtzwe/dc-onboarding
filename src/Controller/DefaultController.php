<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return new Response('<html><body><h1>Welcome to Symfony!</h1></body></html>');
    }
}
