<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OwnerController extends AbstractController
{
    public function index(): Response
    {
        // Code pour gérer la requête de la route "owner"
        return $this->render('owner/index.html.twig');
    }

    public function create(): Response
    {
        return $this->render('owner/create.html.twig');
    }
}