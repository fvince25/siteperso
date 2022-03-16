<?php

namespace App\Controller;

use App\Repository\NavbarMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends AbstractController
{



    public function __construct()
    {
    }

    /**
     * @Route("/home", name="home_page")
     */
    public function home(NavbarMenuRepository $navbarMenuRepository): Response
    {

        $menus = $navbarMenuRepository->findAll();

        return $this->render('general/home.html.twig', [
            'controller_name' => 'home'
        ]);
    }

    /**
     * @Route("/profil", name="profil_page")
     */
    public function profil(): Response
    {
        return $this->render('general/profil.html.twig', [
            'controller_name' => 'profil'
        ]);
    }

    /**
     * @Route("/skills", name="skills_page")
     */
    public function skills(): Response
    {
        return $this->render('general/skills.html.twig', [
            'controller_name' => 'skills'
        ]);
    }

    /**
     * @Route("/experiences", name="experiences_page")
     */
    public function experiences(): Response
    {
        return $this->render('general/experiences.html.twig', [
            'controller_name' => 'experiences'
        ]);
    }

    /**
     * @Route("/trainings", name="trainings_page")
     */
    public function trainings(): Response
    {
        return $this->render('general/trainings.html.twig', [
            'controller_name' => 'trainings'
        ]);
    }
}
