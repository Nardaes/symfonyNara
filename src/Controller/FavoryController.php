<?php

namespace App\Controller;


use App\Entity\Favory;
use App\Entity\User;
use App\Entity\POSTE;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FavoryController extends AbstractController
{
    #[Route('/favoryUpdate/{id}', name: 'app_favupdate')]
    public function favoryUpdate(Request $request, EntityManagerInterface $entityManager, POSTE $poste): Response
    {
        $favory = new Favory();
            
        

        $favory->setFavUser($this->getUser());
        $favory->setFavPoste($poste);

        $entityManager->persist($favory);
        $entityManager->flush();

        

        return $this->redirect($this->generateUrl('app_index'));
    }


    #[Route('/showAllFav', name: 'app_favshow')]
    public function show(Request $request, Environment $twig, FavoryRepository $FavoryRepository): Response
    {
        return new Response($twig->render('index/index.html.twig', [
            
        ]));
    }

}