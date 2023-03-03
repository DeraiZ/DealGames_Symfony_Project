<?php

namespace App\Controller;

use App\Entity\Announce;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{


    #[Route('/product/{id}', name: 'product_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Announce::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        ;

        // or render a template
        // in the template, print things with {{ product.name }}
         return $this->render('product/index.html.twig', ['product' => $product]);
    }
}