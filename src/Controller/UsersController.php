<?php

namespace App\Controller;

use App\Entity\Action;
use App\Form\ActionsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @Route("/user/actions/add", name="user/actions_ad")
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
