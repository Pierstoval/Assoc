<?php

namespace App\Controller;

use App\Entity\Action;
use App\Form\ActionsType;
use App\Repository\UserRepository;
use App\Repository\ActionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(UserRepository $userRepository,
    ActionRepository $actionRepository): Response
    
    {
        return $this->render('user/index.html.twig',[
        'creator' => $userRepository->findAll(),
        'action' => $actionRepository->findAll(),
        ]);
    }
    /**
     * @Route("/user/actions/add", name="useractions_ad")
     */
    public function addAction(Request $request)
    {   
        $action = new Action;

        $form =$this->createForm(ActionsType::class, $action);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // La personne connecte , plsu tard rajouter le setActive
            // $action->setCreators($this->getCreators());
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();
            return $this->redirectToRoute('user');

        }

        return $this->render('user/actions/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
