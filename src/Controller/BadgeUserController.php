<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BadgeUserController extends AbstractController
{
    #[Route('/badge_user', name: 'app_badge_user')]
    public function index(): Response
    {
        return $this->render('badge_user/index.html.twig', [
            'controller_name' => 'BadgeUserController',
        ]);
    }
}
