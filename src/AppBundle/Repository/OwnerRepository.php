<?php

namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use AppBundle\Entity\Owner;

class OwnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Owner::class);
    }

    // Vos méthodes personnalisées de repository ici...
}