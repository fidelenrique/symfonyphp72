<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Characteristic;
use AppBundle\Form\CharacteristicType;
use AppBundle\Repository\CharacteristicRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CharacteristicController extends BaseController
{
    public function index(CharacteristicRepository $characteristicRepository): Response
    {
        // Récupérer tous les characteristics depuis le repository
        $characteristics = $characteristicRepository->findAll();

        // Passer les characteristics récupérés au template Twig pour affichage
        return $this->render('characteristic/index.html.twig', [
            'characteristics' => $characteristics,
        ]);
    }

    public function create(Request $request): Response
    {
        $characteristic = new Characteristic();
        $form = $this->createForm(CharacteristicType::class, $characteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Utiliser la méthode de sauvegarde de la classe parente
            $this->saveEntity($characteristic);

            // Redirection vers une autre page ou affichage d'un message de succès
            return $this->redirectToRoute('characteristic_index');
        }

        return $this->render('characteristic/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}