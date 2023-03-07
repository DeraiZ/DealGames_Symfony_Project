<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Repository\AnnounceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'product_show')]
    public function show(int $id, AnnounceRepository $productRepository): Response
    {
        $product = $productRepository
            ->find($id);

        // or render a template
        // in the template, print things with {{ product.name }}
         return $this->render('product/index.html.twig', ['product' => $product]);
    }
}