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
        $owners = $repository->createQueryBuilder('v')
            ->select('o.nameOwner AS owner_name', 'COUNT(v) AS vehicle_count')
            ->join('v.owner', 'o')
            ->groupBy('o.id')
            ->getQuery()
            ->getResult();

        return $this->render('chart/index.html.twig', [
            'owners' => $owners,
        ]);
    }
}