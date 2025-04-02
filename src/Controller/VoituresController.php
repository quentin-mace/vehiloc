<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_voitures_')]
final class VoituresController extends AbstractController{
    #[Route('', name: 'index')]
    #[Route('/delete/{id}', name: 'delete', requirements: ['id' => '\d+'])]
    public function index(?Voiture $voiture, EntityManagerInterface $entityManager, VoitureRepository $repository): Response
    {
        if ($voiture) {
            $entityManager->remove($voiture);
            $entityManager->flush();
        }

        $voitures = $repository->findAll();


        return $this->render('voitures/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(Voiture $voiture, VoitureRepository $repository): Response
    {
        return $this->render('voitures/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }
}
