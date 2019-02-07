<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Usager;

class HomepageController extends Controller
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    /**
    * @Route("/usager/{nom}", name="usager")
    */
    public function usager($nom)
    {
        $usager = $this->getDoctrine()
        ->getRepository(Usager::class)
        ->findOneByNom($nom);
        if (!$usager) 
            throw $this->createNotFoundException('Usager inconnu');
        return $this->render('homepage/usager.html.twig', [
            'usager' => $usager,
        ]);
    }
}
