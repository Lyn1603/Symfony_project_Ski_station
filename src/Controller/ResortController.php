<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResortController extends AbstractController
{
    #[Route('/resort', name: 'app_resort')]
    public function index(): Response
    {
        return $this->render('resort/index.html.twig', [
            'controller_name' => 'ResortController',
        ]);
    }
}
