<?php

namespace App\Controller;


use App\Form\PictureType;
use App\Entity\Stations;
use App\Repository\PistesRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/station', name: 'app_station')]
    public function Nstation( Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager ): Response
    {
        $stations = new Stations();
        $form = $this->createForm(PictureType::class, $stations);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $imageFile = $form->get('image')->getData();
            if($imageFile){
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $stations->setImage($newFilename);
            }
            $entityManager->persist($stations);
            $entityManager->flush();
            return $this->redirectToRoute('app_station');
        }

        return $this->render('stations/station.html.twig', [
            'stations' => $stations,

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
