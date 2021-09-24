<?php

namespace App\Controller;

use App\Repository\ActionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */
    public function about(ActionRepository $actionRepository,
    PaginatorInterface $paginator,
    Request $request): Response
    {
        $data = $actionRepository->findAll();
        $actions = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),2
        );
        return $this->render('about/about.html.twig', [
            'actions' => $actions,
        ]);
    }
    
}
