<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_voitures_')]
final class VoituresController extends AbstractController{
    #[Route('', name: 'index')]
    public function index(VoitureRepository $repository): Response
    {
        $voitures = $repository->findAll();


        return $this->render('voitures/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }
}
