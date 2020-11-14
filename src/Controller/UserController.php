<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(HttpFoundationRequest $request, EntityManagerInterface $manager): Response
    {
        $user = new User();

        $userForm = $this->createForm(RegistrationType::class, $user);

        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $manager->persist($user);
            $manager->flush();

            $this->addFlash("success", "Votre compte a bien été créé ! Merci de vous authentifier.");

            return $this->redirectToRoute('login');
        }

        return $this->render('user_controller/index.html.twig', [
            'userForm' => $userForm->createView()
        ]);
    }
}
