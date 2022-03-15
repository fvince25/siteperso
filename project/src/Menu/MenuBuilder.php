<?php


namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root', ['attributes' => ['class' => "navbar-nav me-auto"]]);

        $menu->addChild('Home',
            ['route' => 'home_page', 'attributes' => ['class' => "nav-item", "currentClass" => "active"]]);
        $menu->addChild('Profil', ['route' => 'profil_page', 'attributes' => ['class' => "nav-item", "currentClass" => "active"]]);
        $menu->addChild('Skills', ['route' => 'skills_page', 'attributes' => ['class' => "nav-item", "currentClass" => "active"]]);
        $menu->addChild('Experiences', ['route' => 'experiences_page', 'attributes' => ['class' => "nav-item", "currentClass" => "active"]]);
        $menu->addChild('Trainings', ['route' => 'trainings_page', 'attributes' => ['class' => "nav-item", "currentClass" => "active"]]);


        return $menu;
    }
}