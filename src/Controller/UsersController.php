<?php

namespace App\Controller;

use App\Entity\Action;
use App\Form\ActionsType;
use App\Form\ProfileType;
use App\Form\EditProfileType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use App\Repository\ActionRepository;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;





use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(
        UserRepository $userRepository,
        ActionRepository $actionRepository
    )
    {
        return $this->render('user/index.html.twig');
        // 'creator' => $userRepository->findAll(),
        // 'action' => $actionRepository->findAll(),
    }

    /**
     * @Route("/user/action/add", name="user_actions_add")
     */
    public function addAction(Request $request)
    {
        $action =new Action;
        $user =$this->getCreators();

        
        $form =$this->createForm(ActionsType::class, $action, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // La personne connecte , plsu tard rajouter le setActive
            // $action->setCreators($this->getCreators());
            $action->addUser($this->getCreators());
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();
            return $this->redirectToRoute('user');
        }

        return $this->render('user/actions/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/user/profil/edit", name="edit_profil")
     */
    public function editProfil(Request $request)
    {
        $user =$this->getUser();
        $form =$this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // La personne connecte , plsu tard rajouter le setActive
            // $action->setCreators($this->getCreators());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('message', 'Profil mis a jour');
            return $this->redirectToRoute('user');
        }

        return $this->render('user/editprofil.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/user/pass/edit", name="user_pass_edit")
     */
    // public function editPassword(Request $request, UserPasswordHasherInterface $passwordEncoder)
    // {   
    //     if($request->isMethod('POST')){
    //         $em = $this->getDoctrine()->getManager();
    //         $user =$this->getUser();
    //         //on verfie si les 2 mots de passe sont identiques 
             
    //         if($request->request->get('pass') == $request->request->get('pass2')){
    //             $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('pass') ));
    //             $em->flush();
    //             $this->addFlash('message', 'Mot de passe mis a jour avec succes ' );
    //             return $this->redirectToRoute('user');
    //         }else{
    //             $this->addFlash('error', 'les deux mot de passe ne sont pas identiques ' );
    //         }
            
    //     }
    //     else{
    //         $this->addFlash('error', 'la methode post ne fonctionne pas ' );
    //     }
    //     return $this->render('user/editpassword.html.twig');
    // }

    
    /**
     * @Route("/user/pass/edit", name="user_pass_edit")
    */

    public function resetPasswordAction(Request $request, UserPasswordHasherInterface $passwordEncoder)

        {
            $this->passwordEncoder = $passwordEncoder;
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();

            $form = $this->createForm(ResetPasswordType::class, $user);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $passwordEncoder = $this->get('security.password_encoder');
                dump($request->request);die();

                $oldPassword = $request->request->get('')['oldPassword'];

                // Si l'ancien mot de passe est bon

                if ($passwordEncoder->isPasswordValid($user, $oldPassword)) {

                    $newEncodedPassword = $passwordEncoder->encodePassword($user, $user->Password());

                    $user->setPassword($newEncodedPassword);

                    

                    $em->persist($user);

                    $em->flush();

                    $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

                    return $this->redirectToRoute('user');

                } else {

                    $form->addError(new FormError('Ancien mot de passe incorrect'));

                }

            }

            

            return $this->render('user/editpassword.html.twig', array(

                'form' => $form->createView(),

            ));

        }
    }