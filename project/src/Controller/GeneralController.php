<?php

namespace App\Controller;

use App\Repository\NavbarMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends AbstractController
{

    public function __construct()
    {
    }


    /**
     * @Route("/{page}", name="pages")
     */
    public function pages($page): Response
    {

        return $this->render("general/$page.html.twig", [
            'controller_name' => $page
        ]);
    }

}
