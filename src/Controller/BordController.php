<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BordController extends AbstractController
{
    /**
     * @Route("/bord", name="bord")
     */
    public function index(): Response
    {
        return $this->render('bord/index.html.twig', [
            'controller_name' => 'BordController',
        ]);
    }
}
