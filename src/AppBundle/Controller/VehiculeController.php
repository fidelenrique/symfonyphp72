<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class VehiculeController extends AbstractController
{
    public function index(): Response
    {
        // Code pour gérer la requête de la route "vehicule"
        return $this->render('vehicule/index.html.twig');
    }
}