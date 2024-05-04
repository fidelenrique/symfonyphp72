<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehicle;
use AppBundle\Form\VehicleType;
use AppBundle\Repository\VehicleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VehiculeController extends BaseController
{
    public function index(VehicleRepository $vehicleRepository): Response
    {
        // Récupérer tous les véhicules depuis le repository
        $vehicules = $vehicleRepository->findAll();

        // Passer les véhicules récupérés au template Twig pour affichage
        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }

    public function create(Request $request): Response
    {
        $vehicule = new Vehicle();
        $form = $this->createForm(VehicleType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Utiliser la méthode de sauvegarde de la classe parente
            $this->saveEntity($vehicule);

            // Redirection vers une autre page ou affichage d'un message de succès
            return $this->redirectToRoute('vehicule_index');
        }

        return $this->render('vehicule/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }    
}