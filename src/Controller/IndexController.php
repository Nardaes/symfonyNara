<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\POSTERepository;
use App\Entity\POSTE;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    // #[Route('/', name: 'app_index')]
    // public function index(): Response
    // {
    //     return $this->render('index/index.html.twig', [
    //         'controller_name' => 'IndexController',
    //     ]);
    // }

    // #[Route('/poste', name: 'poste_show')]
    // public function show(Environment $twig, POSTERepository $posteRepository): Response
    // {
    //     return new Response($twig->render('index/index.html.twig', [
    //         'postes' => $posteRepository->findAll()
    //     ]));
    // }
    
    #[Route('/', name: 'app_index')]
    #[Route('/poste', name: 'poste_show')]
    public function show(Request $request, Environment $twig, POSTERepository $posteRepository): Response
    {

        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $posteRepository->getPostePaginator($offset);

        


        return new Response($twig->render('index/index.html.twig', [
            'postes' => $paginator,
            'previous' => $offset - POSTERepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + POSTERepository::PAGINATOR_PER_PAGE),
        ]));
    }

    #[Route('/thisposte/{id}', name: 'thisposte_show')]
    public function showthis(Environment $twig, POSTE $poste): Response
    {
        return new Response($twig->render('index/thisposte.html.twig', [
            'poste' => $poste
        ]));
    }

}
