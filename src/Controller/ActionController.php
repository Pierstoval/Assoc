<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\Category;
use App\Form\ActionsType;
use App\Repository\ActionRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActionController extends AbstractController
{
    /**
     * @Route("/actions", name="action")
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
     * @Route("/actions/{id}", name="actions_show", methods={"GET","POST"})
     */
    // public function actionShow(Action $actions, ActionRepository $actionRepository,
    // Request $request): Response
    // {
    //     return $this->redirectToRoute('action', ['id'=> $actions->getId()]);
    //     if ($form->isSubmitted() && $form->isValid()) {

    //         $form->setCreatedAt(new \DateTime())
    //                 ->setExperience($experience);
    //         $manager->persist($comment);
          
    //         $manager->flush();

    
    //     return $this->render('action/actions-show.html.twig', [
            
    //         'actions' => $actionRepository->findAll(),
    //     ]);    
    // }
    
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

    /**
     * @Route("/action/new", name="create_action")
     * @Route("/action/{id}/edit", name="action_edit")
     */
    public function createAction(Action $action = null, Request $request, EntityManagerInterface $manager,
        ActionRepository $actionRepository)

    {
        if(!$action){

            $action = new Action();
        }
         // creates a action object and initializes some data for this example
         $form = $this->createForm(ActionsType::class, $action);
         $form->handleRequest($request);
         
         if($form->isSubmitted() && $form->isValid()){
             if(!$action->getId()){
                 $action->setCreatedAt(new \DateTime());

             }
             $manager->persist($action);
             $manager->flush();

             return $this->redirectToRoute('action', ['id'=> $action->getId()

                ]);
           
               

         }
        return $this->render('action/action-form.html.twig', [
           
          'form'=> $form->createView(),
          'editMode'=> $action->getId() !== null
        ]);
    }
}
