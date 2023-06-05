<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\POSTERepository;
use App\Entity\POSTE;
use App\Form\EcrireposteFormType;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

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
    public function show(Request $request, Environment $twig, POSTERepository $posteRepository, PaginatorInterface $paginator): Response
    {

        $query = $posteRepository->createQueryBuilder('e')
            ->orderBy('e.id', 'DESC')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10 // Nombre d'éléments par page
        );

        // Renvoyer la pagination à la vue
        return $this->render('index/index.html.twig', [
            'pagination' => $pagination,
        ]);

    }

    #[Route('/thisposte/{id}', name: 'thisposte_show')]
    public function showthis(Environment $twig, POSTE $poste): Response
    {
        return new Response($twig->render('index/thisposte.html.twig', [
            'poste' => $poste
        ]));
    }

}
