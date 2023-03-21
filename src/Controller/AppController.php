<?php

namespace App\Controller;

use App\Repository\PistesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/pistes', name: 'app_piste')]
    public function pistes( PistesRepository $pistesRepository): Response
    {
        return $this->render('pistes/piste.html.twig', [
            'controller_name' => 'AppController',
            'pistes' => $pistesRepository->findAll(),

        ]);
    }


    #[Route('/pistes{id}', name: 'app_pistesId')]
    public function show(int $id, PistesRepository $pistesRepository): Response
    {
        return $this->render('pet/show.html.twig', [
            'piste{id}' => $pistesRepository->findBy(['id' => $id])
        ]);
    }
}
