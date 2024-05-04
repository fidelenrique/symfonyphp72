<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Owner;
use AppBundle\Form\OwnerType;
use AppBundle\Repository\OwnerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OwnerController extends BaseController
{
    public function index(OwnerRepository $ownerRepository): Response
    {
        // Récupérer tous les propriétaires depuis le repository
        $owners = $ownerRepository->findAll();

        // Passer les propriétaires récupérés au template Twig pour affichage
        return $this->render('owner/index.html.twig', [
            'owners' => $owners,
        ]);
    }

    // Action pour afficher le formulaire d'ajout de propriétaire
    public function create(Request $request): Response
    {
        $owner = new Owner();
        $form = $this->createForm(OwnerType::class, $owner);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Utiliser la méthode de sauvegarde de la classe parente
            $this->saveEntity($owner);

            // Redirection vers une autre page ou affichage d'un message de succès
            return $this->redirectToRoute('owner_index');
        }

        return $this->render('owner/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}