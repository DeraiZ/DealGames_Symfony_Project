<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Repository\AnnounceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductListController extends AbstractController
{
    #[Route('/productList', name: 'product_list_show')]
    public function show(AnnounceRepository $announceRepository): Response
    {
        $products = $announceRepository
            ->findAll();

//        return new Response('Check out this great product: '.$product->getProduct());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('product_list/index.html.twig', [
            'products' => $products,
        ]);
    }
}
