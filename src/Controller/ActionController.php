<?php

namespace App\Controller;

use App\Repository\ActionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActionController extends AbstractController
{
    /**
     * @Route("/action", name="action_on")
     */
    public function actions(ActionRepository $actionRepository,
    PaginatorInterface $paginator,
    Request $request): Response
    {
        $data = $actionRepository->findAll();
        $actions = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),2
        );
        return $this->render('action/actions.html.twig', [
            'actions' => $actions,
        ]);
    }
}
