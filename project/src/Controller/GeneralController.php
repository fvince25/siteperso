<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends AbstractController
{

    protected $listMenus;

    public function __construct()
    {
        $this->listMenus = [
            [
                'item' => 'home',
                'label' => '<i class="fa-solid fa-house"></i>'
            ], [
                'item' => 'profil',
                'label' => 'Profil'
            ], [
                'item' => 'skills',
                'label' => 'Compétences'
            ], [
                'item' => 'experiences',
                'label' => 'Expériences'
            ], [
                'item' => 'trainings',
                'label' => 'Formations'
            ]
        ];
    }

    /**
     * @Route("/home", name="home_page")
     */
    public function home(): Response
    {
        return $this->render('general/home.html.twig', [
            'controller_name' => 'home',
            'listMenus' => $this->listMenus
        ]);
    }

    /**
     * @Route("/profil", name="profil_page")
     */
    public function profil(): Response
    {
        return $this->render('general/profil.html.twig', [
            'controller_name' => 'profil',
            'listMenus' => $this->listMenus
        ]);
    }

    /**
     * @Route("/skills", name="skills_page")
     */
    public function skills(): Response
    {
        return $this->render('general/skills.html.twig', [
            'controller_name' => 'skills',
            'listMenus' => $this->listMenus
        ]);
    }

    /**
     * @Route("/experiences", name="experiences_page")
     */
    public function experiences(): Response
    {
        return $this->render('general/experiences.html.twig', [
            'controller_name' => 'experiences',
            'listMenus' => $this->listMenus
        ]);
    }

    /**
     * @Route("/trainings", name="trainings_page")
     */
    public function trainings(): Response
    {
        return $this->render('general/trainings.html.twig', [
            'controller_name' => 'trainings',
            'listMenus' => $this->listMenus
        ]);
    }
}
