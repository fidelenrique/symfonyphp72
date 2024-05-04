<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehicle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ChartController extends AbstractController
{
    public function chart(): ?Response
    {
        $repository = $this->getDoctrine()->getRepository(Vehicle::class);
        $owners = $repository->countVehiclesByOwner();

        return $this->render('chart/index.html.twig', [
            'owners' => $owners,
        ]);
    }
}