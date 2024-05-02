<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Owner;
use AppBundle\Form\OwnerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OwnerController extends AbstractController
{
    public function index(): Response
    {
        // Code pour gérer la requête de la route "owner"
        return $this->render('owner/index.html.twig');
    }

    // Action pour afficher le formulaire d'ajout de propriétaire
    public function create(Request $request): Response
    {
        $owner = new Owner();
        $form = $this->createForm(OwnerType::class, $owner);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder le propriétaire en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($owner);
            $entityManager->flush();

            // Redirection vers une autre page ou affichage d'un message de succès
            return $this->redirectToRoute('owner_index');
        }

        return $this->render('owner/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}