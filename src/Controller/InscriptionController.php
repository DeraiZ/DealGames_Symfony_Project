<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersFormType;
use App\Repository\UsersRepository;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \Datetime;

class InscriptionController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(Request $request, UsersRepository $usersRepository): Response
    {
        $announce = new Users();
        $form = $this->createForm(UsersFormType::class, $announce);
        $form-> handleRequest($request);
        return $this->render('login/index.html.twig', [
            'form' => $form,
        ]);
    }
}
