<?php

namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use AppBundle\Entity\Vehicle;

class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    // Méthode pour compter le nombre de véhicules par propriétaire
    public function countVehiclesByOwner()
    {
        $qb = $this->createQueryBuilder('v')
            ->select('COUNT(v) as vehicle_count, o.nameOwner as owner_name')
            ->leftJoin('v.owner', 'o')
            ->groupBy('o.id');

        $query = $qb->getQuery();

        return $query->getResult();
    }
}