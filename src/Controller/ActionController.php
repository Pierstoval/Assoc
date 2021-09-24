<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ActionRepository;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActionController extends AbstractController
{
    /**
     * @Route("/action", name="action")
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
     /**
     * @Route("/bestactions", name="action_details_category")
     */
    public function details(CategoryRepository $categoryRepository,
    ActionRepository $actionRepository): Response
    {
        return $this->render('action/best.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'actions' => $actionRepository->findAll(),
        ]);
    }
    /**
     * @Route("/bestactions/{slug}", name="action_categorie")
     */
    public function categorie(Category $categorie,
        ActionRepository $actionRepository): Response
    {
        $actions = $actionRepository->findAllPortfolio($categorie);
        return $this->render('action/category.html.twig', [
            'categorie' => $categorie,
            'actions' => $actions,
        ]);
    }
}
