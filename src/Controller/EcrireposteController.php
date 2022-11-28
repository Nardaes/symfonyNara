<?php

namespace App\Controller;

use App\Entity\POSTE;
use App\Entity\User;
use App\Form\EcrireposteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EcrireposteController extends AbstractController
{
    #[Route('/ecrireposte', name: 'app_ecrireposte')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $poste = new POSTE();
        $form = $this->createForm(EcrireposteFormType::class, $poste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password

            $poste->setDatePoste(new \DateTime(date('Y-m-d')));
            $poste->setStatusPoste("Auteur");
            $poste->setNombreReponse(0);
            $poste->setUser($this->getUser());



            $entityManager->persist($poste);
            $entityManager->flush();
            // do anything else you need here, like send an email
            return $this->redirect($this->generateUrl('app_index'));
            // return $this->redirectToRoute('');
        }

        return $this->render('ecrireposte/index.html.twig', [
            'ecrireposte' => $form->createView(),
        ]);
    }
}
