<?php

namespace App\Controller;


use App\Entity\Pistes;
use App\Form\PictureType;
use App\Entity\Stations;
use App\Form\StationsType;
use App\Repository\PistesRepository;
use App\Repository\StationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

    #[Route('/pistes', name: 'app_pistes')]
    public function pistes(PistesRepository $pistesRepository): Response
    {
        return $this->render('pistes/piste.html.twig', [
            'pistes' => $pistesRepository->findAll(),
        ]);
    }

    #[Route('/piste{id}', name: 'app_piste', methods: ['GET'])]

    public function piste_id(Pistes $piste): Response
    {
        return $this->render('piste/piste_id.html.twig', [
            'piste' => $piste,

        ]);
    }



    #[Route('/station', name: 'app_station')]
    public function Nstation( Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager ): Response
    {
        $stations = new Stations();
        $form = $this->createForm(StationsType::class, $stations);
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

}
