<?php

namespace App\Controller;


use App\Entity\Announce;
use App\Form\AnnounceFormType;
use App\Repository\AnnounceRepository;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \Datetime;

class AddAnnounceController extends AbstractController
{
    #[Route('/add_announce', name: 'app_add_announce')]
    public function index(Request $request, AnnounceRepository $announceRepository, EntityManagerInterface $entityManager): Response
    {
        $announce = new Announce();
        $form = $this->createForm(AnnounceFormType::class, $announce);
        $form-> handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $announce->setCreatedAt(new \DateTimeImmutable('now', new DateTimeZone('Europe/Paris')));
            $img = $request->files->get('announce_form')['imageFile']['file']->getClientOriginalName();
            $image = strval($img);
            $announce->setImage($image);
            $prod = $request->get('announce_form')['product'];
            $announce->setProduct($prod);
            $desc = $request->get('announce_form')['description'];
            $announce->setDescription($desc);
            $size = $request->files->get('announce_form')['imageFile']['file']->getSize();
            $announce->setImageSize($size);
            $announce->setUserId(1);

            $entityManager->persist($announce);
//
            $entityManager->flush();

        }



        return $this->render('add_product/index.html.twig', [
            'form' => $form,
        ]);

    }



}
