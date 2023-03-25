<?php

namespace App\Controller;

use App\Repository\PistesRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

    #[Route('/restaurant/{id}/vote/{stars}', name: 'app_restaurant_vote')]
    public function restaurantVote(int $id, int $stars, RestaurantRepository $restaurantRepository): Response
    {
        $restaurant = $restaurantRepository->find($id);
        if (is_null($restaurant)) {
            throw new NotFoundHttpException("Restaurant not found");
        }

        $restaurant->vote($stars);
        $restaurantRepository->save($restaurant, true);

        return new JsonResponse(array(
            "star_vote_count" => $restaurant->getStarVoteCount(),
            "stars" => $restaurant->getStars()
        ));
    }

    #[Route('/resort', name: 'app_resort')]
    public function resort(): Response
    {
        return $this->render('resort/index.html.twig');
    }
}
