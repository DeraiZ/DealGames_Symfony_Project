<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddAnnounceController extends AbstractController
{
    #[Route('/add_announce', name: 'app_add_announce')]
    public function index(): Response
    {
        return $this->render('add_product/index.html.twig', [
            'controller_name' => 'AddProductController',
        ]);
    }
}
